// Node.js - Native
// https://github.com/artlevitan/KILO.Push-API

var https = require('follow-redirects').https;
var fs = require('fs');

var options = {
    'method': 'POST',
    'hostname': 'push.kilo.chat',
    'path': '/v1/messages/send',
    'headers': {
        'Content-Type': 'application/json'
    },
    'maxRedirects': 20
};

var req = https.request(options, function (res) {
    var chunks = [];

    res.on("data", function (chunk) {
        chunks.push(chunk);
    });

    res.on("end", function (chunk) {
        var body = Buffer.concat(chunks);
        console.log(body.toString());
    });

    res.on("error", function (error) {
        console.error(error);
    });
});

var postData = JSON.stringify({
    "to": "USER_TOKEN", // Recipient: User Token
    "token": "CHANNEL_TOKEN", // Sender: Channel Token
    "secret": "SECRET_KEY", // Sender: Channel Secret Key
    "message": "Hello world!", // Your message
    "url": "https://www.34devs.ru/", // Hyperlink (http:// or https://)
});

req.write(postData);

req.end();