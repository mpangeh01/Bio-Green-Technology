<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    //
    public function sendNotification(Request $request)
    {
        $recipientId = $request->user_id;

        $user = User::find($recipientId);

        if (!$user || !$user->fcm_token) {
            return response()->json(['error' => 'User not found or device token not available.'], 404);
        }

        $firebaseToken = $user->fcm_token;

        $SERVER_API_KEY = env('FCM_SERVER_KEY');

        $data = [
            "to" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];

        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($httpCode != 200) {
            return response()->json(['error' => 'Failed to send notification. HTTP code: ' . $httpCode], $httpCode);
        }

        $responseData = json_decode($response, true);
        if (isset($responseData['success']) && $responseData['success'] == 1) {
            return response()->json(['message' => 'Notification sent successfully.'], 200);
        } else {
            return response()->json(['error' => 'Failed to send notification. Response: ' . $response], 500);
        }
    }

    public function getNotifications()
    {
        // Find the user by ID
        $user = Auth::user();

        // Check if the user exists
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        // Retrieve the notifications for the user
            $notifications = $user->notifications()
                           ->orderBy('created_at', 'desc')
                           ->get()
                           ->map(function ($notification) {

                                // Format the timestamp to display in the format "12:00"
                                $notificationTime = Carbon::parse($notification->created_at);
                                $timeDifference = $notificationTime->diffForHumans();

                                $notification->time_difference = $timeDifference;
                                $notification->formatted_time =$notificationTime ->format('H:i');
                                return $notification;
                            });

        // Return the notifications as JSON response
    return response()->json(['notifications' => $notifications], 200);
    }


}
