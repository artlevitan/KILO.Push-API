// JavaScript - Fetch
// https://github.com/artlevitan/KILO.Push-API

var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
    "to": "USER_TOKEN", // Recipient: User Token
    "token": "CHANNEL_TOKEN", // Sender: Channel Token
    "secret": "SECRET_KEY", // Sender: Channel Secret Key
    "message": "Hello world!", // Your message
    "url": "https://www.34devs.ru/", // Hyperlink (http:// or https://)
});

var requestOptions = {
    method: 'POST',
    headers: myHeaders,
    body: raw,
    redirect: 'follow'
};

fetch("https://push.kilo.chat/v1/messages/send", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));