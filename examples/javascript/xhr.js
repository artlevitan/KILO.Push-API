// JavaScript - XMLHttpRequest
// https://github.com/artlevitan/KILO.Push-API

var data = JSON.stringify({
    "to": "USER_TOKEN", // Recipient: User Token
    "token": "CHANNEL_TOKEN", // Sender: Channel Token
    "secret": "SECRET_KEY", // Sender: Channel Secret Key
    "message": "Hello world!", // Your message
    "url": "https://34devs.ru/", // Hyperlink (http:// or https://)
    "important": "1", // Add push notification: 0 - no, 1 - yes
});

var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
    if (this.readyState === 4) {
        console.log(this.responseText);
    }
});

xhr.open("POST", "https://push.kilo.chat/v1/messages/send");
xhr.setRequestHeader("Content-Type", "application/json");

xhr.send(data);