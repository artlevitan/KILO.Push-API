<?php

/**
 * PHP - cURL
 * JSON
 * https://github.com/artlevitan/KILO.Push-API
 */

$request_body = [
    "to" => "USER_TOKEN", // Recipient: User Token
    "token" => "CHANNEL_TOKEN", // Sender: Channel Token
    "secret" => "SECRET_KEY", // Sender: Channel Secret Key
    "message"  => "Hello world!", // Your message
    "url" => "https://www.34devs.ru/", // Hyperlink (http:// or https://)
];
$fields = json_encode($request_body);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://push.kilo.chat/v1/messages/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Recommended removing it in production development if you use SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // Recommended removing it in production development if you use SSL
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
$response = curl_exec($ch);
echo $response;

curl_close($ch);
