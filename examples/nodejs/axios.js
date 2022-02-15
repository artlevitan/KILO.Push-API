// Node.js - Axios
// https://github.com/artlevitan/KILO.Push-API

var axios = require('axios');
var data = JSON.stringify({
    "to": "USER_TOKEN", // Recipient: User Token
    "token": "CHANNEL_TOKEN", // Sender: Channel Token
    "secret": "SECRET_KEY", // Sender: Channel Secret Key
    "message": "Hello world!", // Your message
    "url": "https://34devs.ru/", // Hyperlink (http:// or https://)
});

var config = {
    method: 'post',
    url: 'https://push.kilo.chat/v1/messages/send',
    headers: {
        'Content-Type': 'application/json'
    },
    data: data
};

axios(config)
    .then(function (response) {
        console.log(JSON.stringify(response.data));
    })
    .catch(function (error) {
        console.log(error);
    });