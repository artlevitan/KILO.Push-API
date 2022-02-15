<?php

/**
 * PHP
 * Weather
 * https://openweathermap.org/api
 * Sends push notifications about Weather to users
 * https://github.com/artlevitan/KILO.Push-API
 */

$weather_API_KEY = '22e93ed72040273239166549f781ed17'; // Your API key https://home.openweathermap.org/api_keys
$cityName = 'London'; // City name, state code and country code divided by comma

// Getting Weather Information
$cityID = ''; // City ID
$weatherData = [
    "temp" => 0,
    "feels_like" =>  0,
    "temp_min" =>  0,
    "temp_max" =>  0,
    "pressure" =>  0,
    "humidity" =>  0,
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.openweathermap.org/data/2.5/weather?q={$cityName}&appid={$weather_API_KEY}"); // https://openweathermap.org/current
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // Recommended to remove it in production development if you use SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // Recommended to remove it in production development if you use SSL
$json = curl_exec($ch);
curl_close($ch);
$result = $json !== false ? json_decode($json) : null;
if (isset($result->main)) {
    $cityID = $result->id;
    $weatherData["temp"] = isset($result->main->temp) ? ceil($result->main->temp - 273.15) : 0;
    $weatherData["feels_like"] = $result->main->feels_like;
    $weatherData["temp_min"] = $result->main->temp_min;
    $weatherData["temp_max"] = $result->main->temp_max;
    $weatherData["pressure"] = $result->main->pressure;
    $weatherData["humidity"] = $result->main->humidity;
} else {
    exit('Could not get weather data.');
}

// Recipients
// Array values must be User tokens
$recipients = [
    "USER_TOKEN_1",
    "USER_TOKEN_2",
    "USER_TOKEN_3",
    "USER_TOKEN_4",
    "USER_TOKEN_5",
];

// Sending notifications
$ch = curl_init();
foreach ($recipients as $recipient) {
    $request_body = [
        "to" => $recipient, // Recipient: User Token
        "token" => "CHANNEL_TOKEN", // Sender: Channel Token
        "secret" => "SECRET_KEY", // Sender: Channel Secret Key
        "message"  => "The weather is in {$cityName} now. Temperature {$weatherData["temp"]} °C, Atmospheric pressure {$weatherData["pressure"]}hPa, Humidity {$weatherData["humidity"]}%", // Your message
        "url" => "https://openweathermap.org/city/{$cityID}", // Hyperlink (http:// or https://)
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
}
curl_close($ch); // foreach
