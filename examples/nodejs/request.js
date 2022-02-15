// Node.js - Request
// https://github.com/artlevitan/KILO.Push-API

var request = require('request');
var options = {
    'method': 'POST',
    'url': 'https://push.kilo.chat/v1/messages/send',
    'headers': {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        "to": "USER_TOKEN", // Recipient: User Token
        "token": "CHANNEL_TOKEN", // Sender: Channel Token
        "secret": "SECRET_KEY", // Sender: Channel Secret Key
        "message": "Hello world!", // Your message
        "url": "https://34devs.ru/", // Hyperlink (http:// or https://)
    })

};
request(options, function (error, response) {
    if (error) throw new Error(error);
    console.log(response.body);
});