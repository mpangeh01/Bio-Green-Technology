<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;

class NotificationService
{
    public function sendNotification($recipientId, $title, $body)
    {
        $user = User::find($recipientId);

        if (!$user || !$user->fcm_token) {
            return false;
        }

        $firebaseToken = $user->fcm_token;
        $serverApiKey = env('FCM_SERVER_KEY');
        $data = [
            "to" => $firebaseToken,
            "notification" => [
                "title" => $title,
                "body" => $body,
            ]
        ];

        $response = Http::withHeaders([
            'Authorization' => 'key=' . $serverApiKey,
            'Content-Type' => 'application/json',
        ])->post('https://fcm.googleapis.com/fcm/send', $data);

        if ($response->successful()) {
            return true;
        } else {
            return false;
        }
    }
}
