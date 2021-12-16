// Node.js - Unirest
// https://github.com/artlevitan/KILO.Push-API

var unirest = require('unirest');
var req = unirest('POST', 'https://push.kilo.chat/v1/messages/send')
    .headers({
        'Content-Type': 'application/json'
    })
    .send(JSON.stringify({
        "to": "USER_TOKEN", // Recipient: User Token
        "token": "CHANNEL_TOKEN", // Sender: Channel Token
        "secret": "SECRET_KEY", // Sender: Channel Secret Key
        "message": "Hello world!", // Your message
        "url": "https://34devs.ru/", // Hyperlink (http:// or https://)
        "important": "1", // Add push notification: 0 - no, 1 - yes
    }))
    .end(function (res) {
        if (res.error) throw new Error(res.error);
        console.log(res.raw_body);
    });