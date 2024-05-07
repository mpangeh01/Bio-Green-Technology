<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class SMSService
{
    public function sendSMS($username, $password, $message, $senderId, $phoneNumber)
    {
        $response = Http::get('https://www.smszambia.com/smsservice/httpapi', [
            'username' => $username,
            'password' => $password,
            'msg' => $message,
            'sender_id' => $senderId,
            'phone' => $phoneNumber,
        ]);

        $responseCode = $response->body(); // Assuming the response body contains the code

        switch ($responseCode) {
            case '100':
                $description = 'Message Sent';
                break;
            case '101':
                $description = 'Insufficient credit';
                break;
            case '102':
                $description = 'Invalid user';
                break;
            case '0':
                $description = 'Failed';
                break;
            default:
                $description = 'Unknown response';
                break;
        }

        return [
            'code' => $responseCode,
            'description' => $description
        ];
    }
}
