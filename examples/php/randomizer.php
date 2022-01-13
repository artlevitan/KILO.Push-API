<?php

/**
 * PHP
 * Randomizer
 * Selects and sends a push notification to a random users
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

// How many recipients to choose
$cnt = 2;

// Selecting recipients
$selectedRecipients = array_slice($recipients, 0, $cnt);

// Sending notifications
$ch = curl_init();
foreach ($selectedRecipients as $selectedRecipient) {
    $request_body = [
        "to" => $selectedRecipient, // Recipient: User Token
        "token" => "CHANNEL_TOKEN", // Sender: Channel Token
        "secret" => "SECRET_KEY", // Sender: Channel Secret Key
        "message"  => "You are the winner!", // Your message
        "url" => "https://34devs.ru/", // Hyperlink (http:// or https://)
        "important" => "1", // Add push notification: 0 - no, 1 - yes
    ];
    $fields = json_encode($request_body);
    curl_setopt($ch, CURLOPT_URL, 'https://push.kilo.chat/v1/messages/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // It is recommended to remove it in production development if you use SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // It is recommended to remove it in production development if you use SSL
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $response = curl_exec($ch);
    echo $response;
}
curl_close($ch); // foreach
