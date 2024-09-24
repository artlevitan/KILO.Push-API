<?php

/**
 * PHP
 * Mailing
 * Sends push notifications to users
 * https://github.com/artlevitan/KILO.Push-API
 */

// Recipients
// Array values must be User tokens
$recipients = [
    "USER_TOKEN_1",
    "USER_TOKEN_2",
    "USER_TOKEN_3",
    "USER_TOKEN_4",
    "USER_TOKEN_5",
    "USER_TOKEN_6",
    "USER_TOKEN_7",
    "USER_TOKEN_8",
    "USER_TOKEN_9",
];

// Sending notifications
$ch = curl_init();
foreach ($recipients as $recipient) {
    $request_body = [
        "to" => $recipient, // Recipient: User Token
        "token" => "CHANNEL_TOKEN", // Sender: Channel Token
        "secret" => "SECRET_KEY", // Sender: Channel Secret Key
        "message"  => "Hello. You are our subscriber and we have news for you.", // Your message
        "url" => "https://www.34devs.ru/", // Hyperlink (http:// or https://)
    ];
    $fields = json_encode($request_body);
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
}
curl_close($ch); // foreach
