// Arduino sketch
// https://github.com/artlevitan/KILO.Push-API

#include <HttpClient.h>

const char *USER_TOKEN = "USER_TOKEN";       // Recipient: User Token
const char *CHANNEL_TOKEN = "CHANNEL_TOKEN"; // Sender: Channel Token
const char *SECRET_KEY = "SECRET_KEY";       // Sender: Channel Secret Key
const char *MESSAGE = "Hello world!";        // Your message
const char *IMPORTANT = "1";                 // Add push notification: 0 - no, 1 - yes

void setup() {}

void loop()
{
    HTTPClient http;

    String postData = "to=" + String(USER_TOKEN) +
                      "&token=" + String(CHANNEL_TOKEN) +
                      "&secret=" + String(SECRET_KEY) +
                      "&message=" + String(MESSAGE) +
                      "&important=" + String(IMPORTANT);

    http.begin("https://push.kilo.chat/v1/messages/send");
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    int httpCode = http.POST(postData); // Send the request
    String payload = http.getString();  // Get the response payload

    Serial.println(httpCode); // Print Response Status
    Serial.println(payload);  // Print Response data
    delay(30000);             // Delay 30 sec
}