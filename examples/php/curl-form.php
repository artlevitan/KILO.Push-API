<?php

/**
 * PHP - cURL
 * form-data
 * https://github.com/artlevitan/KILO.Push-API
 */

$request_body = [
    "to" => "USER_TOKEN", // Recipient: User Token
    "token" => "CHANNEL_TOKEN", // Sender: Channel Token
    "secret" => "SECRET_KEY", // Sender: Channel Secret Key
    "message"  => "Hello world!", // Your message
    "url" => "https://34devs.ru/", // Hyperlink (http:// or https://)
    "important" => "1", // Add push notification: 0 - no, 1 - yes
];
$fields = http_build_query($request_body);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://push.kilo.chat/v1/messages/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Recommended to remove it in production development if you use SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // Recommended to remove it in production development if you use SSL
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
$response = curl_exec($ch);
curl_close($ch);

echo $response;
