// JavaScript - jQuery
// https://github.com/artlevitan/KILO.Push-API

var settings = {
    "url": "https://push.kilo.chat/v1/messages/send",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Content-Type": "application/json"
    },
    "data": JSON.stringify({
        "to": "USER_TOKEN", // Recipient: User Token
        "token": "CHANNEL_TOKEN", // Sender: Channel Token
        "secret": "SECRET_KEY", // Sender: Channel Secret Key
        "message": "Hello world!", // Your message
        "url": "https://34devs.ru/", // Hyperlink (http:// or https://)
    }),
};

$.ajax(settings).done(function (response) {
    console.log(response);
});