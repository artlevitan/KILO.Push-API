# Python - Requests
# https://github.com/artlevitan/KILO.Push-API

import requests
import json

url = "https://push.kilo.chat/v1/messages/send"

payload = json.dumps(
    {
        "to": "USER_TOKEN",  # Recipient: User Token
        "token": "CHANNEL_TOKEN",  # Sender: Channel Token
        "secret": "SECRET_KEY",  # Sender: Channel Secret Key
        "message": "Hello world!",  # Your message
        "url": "https://www.34devs.ru/",  # Hyperlink (http:// or https://)
    }
)
headers = {"Content-Type": "application/json"}

response = requests.request("POST", url, headers=headers, data=payload)

print(response.text)
