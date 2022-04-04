<?php

namespace App\Traits;

use Illuminate\Support\Facades\Config;

trait Notification
{
     public function single($firebaseToken, $title, $body)
     {
          $SERVER_API_KEY = Config::get('value.FCM_SERVER_KEY', null);
          if ($firebaseToken) {
               $headers = [
                    'Authorization: key=' . $SERVER_API_KEY,
                    'Content-Type: application/json',
               ];

               $data = [
                    "to" => $firebaseToken,
                    "notification" => [
                         "title" => $title,
                         "body" => $body,
                    ]
               ];

               $ch = curl_init();
               $dataString = json_encode($data);

               curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
               curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
               curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
               $response = curl_exec($ch);
               return true;
          }
          return false;
     }

     public function many(array $firebaseToken, $title, $body)
     {
          $SERVER_API_KEY = Config::get('value.FCM_SERVER_KEY', null);
          if ($firebaseToken) {
               $headers = [
                    'Authorization: key=' . $SERVER_API_KEY,
                    'Content-Type: application/json',
               ];

               $data = [
                    "registration_ids" => $firebaseToken,
                    "notification" => [
                         "title" => $title,
                         "body" => $body,
                    ]
               ];

               $ch = curl_init();
               $dataString = json_encode($data);

               curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
               curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
               curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
               $response = curl_exec($ch);
               return true;
          }
          return false;
     }
}
