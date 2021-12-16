# Python - http.client
# https://github.com/artlevitan/KILO.Push-API

import http.client
import json

conn = http.client.HTTPSConnection("push.kilo.chat")
payload = json.dumps(
    {
        "to": "USER_TOKEN",  # Recipient: User Token
        "token": "CHANNEL_TOKEN",  # Sender: Channel Token
        "secret": "SECRET_KEY",  # Sender: Channel Secret Key
        "message": "Hello world!",  # Your message
        "url": "https://34devs.ru/",  # Hyperlink (http:// or https://)
        "important": "1",  # Add push notification: 0 - no, 1 - yes
    }
)
headers = {"Content-Type": "application/json"}
conn.request("POST", "/v1/messages/send", payload, headers)
res = conn.getresponse()
data = res.read()
print(data.decode("utf-8"))
