<?php

/**
 * PHP
 * Start List
 * Forms a sequential order of recipients
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

// Additional shuffle
shuffle($recipients);

// Sending notifications
$ch = curl_init();
$cnt = 1; // Counter
foreach ($recipients as $recipient) {
    $request_body = [
        "to" => $recipient, // Recipient: User Token
        "token" => "CHANNEL_TOKEN", // Sender: Channel Token
        "secret" => "SECRET_KEY", // Sender: Channel Secret Key
        "message"  => "Your position is {$cnt}", // Your message
        "url" => "https://34devs.ru/", // Hyperlink (http:// or https://)
        "important" => "1", // Add push notification: 0 - no, 1 - yes
    ];
    $fields = json_encode($request_body);
    curl_setopt($ch, CURLOPT_URL, 'https://push.kilo.chat/v1/messages/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Recommended to remove it in production development if you use SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // Recommended to remove it in production development if you use SSL
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $response = curl_exec($ch);
    echo $response;
    $cnt++; // Increasing the counter value
}
curl_close($ch); // foreach
