// DART - http
// https://github.com/artlevitan/KILO.Push-API

var headers = {
    'Content-Type': 'application/json'
};
var request = http.Request('POST', Uri.parse('https://push.kilo.chat/v1/messages/send'));
request.body = json.encode({
    "to": "USER_TOKEN", // Recipient: User Token
    "token": "CHANNEL_TOKEN", // Sender: Channel Token
    "secret": "SECRET_KEY", // Sender: Channel Secret Key
    "message": "Hello world!", // Your message
    "url": "https://34devs.ru/", // Hyperlink (http:// or https://)
});
request.headers.addAll(headers);

http.StreamedResponse response = await request.send();

if (response.statusCode == 200) {
    print(await response.stream.bytesToString());
}
else {
    print(response.reasonPhrase);
}