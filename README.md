# KILO.Push

<img src="/editor/images/logos/logo.png" alt="KILO.Push" align="center" style="max-width:100%">

<div align="center">

[![App Store](/editor/images/download/appstore.png)](https://apps.apple.com/us/app/kilo-push/id1512247485)
[![Google Play](/editor/images/download/googleplay.png)](https://play.google.com/store/apps/details?id=chat.kilo)

</div>

KILO.Push is a free platform for sending and receiving messages with push notifications to your phone or tablet from a variety of sources. From the server side, we provide an HTTP API for delivering messages to devices that are addressed using tokens. Mobile app based on iOS and Android receives these push messages and shows them to the user.

1. Install our mobile app on your [iPhone/iPad](https://apps.apple.com/us/app/kilo-push/id1512247485 "iPhone/iPad") or [Android](https://play.google.com/store/apps/details?id=chat.kilo "Android") device.
2. After launching the application, you will receive a unique User Token to receive messages.
3. Create a channel to send messages to yourself or other users.

Programmers can easily integrate sending messages to KILO.Push from your services, IoT, feedback forms, or anything else that uses our API.

## Scope of application

- News and promotions.
- Security alerts (two-factor authentication, alarm, etc.).
- IoT notifications and smart home automation.
- Anonymous prize draws.
- Complete replacement of paid SMS.
- And much more…

## Get started

Programmers can easily integrate sending messages to KILO.Push from your services, IoT, feedback forms, or anything else that uses our API. See [examples](https://github.com/artlevitan/KILO.Push-API/tree/main/examples "examples") in popular programming languages.

### Users

<details>
<summary>Click to expand for more information</summary>

When you first launch the mobile app, you will be assigned a unique **User Token**, which is an identifier, like a personal phone number or email address.

The **User Token** consists of random letters and numbers of the English alphabet with a length of 42 characters. Starts with the prefix `u_`, for example:

`u_282c0a20f0520a152c89d8c0489426c0668ca495`

User Token is used to receive messages. Do not share your Token with third parties without the necessity, this may cause you to receive unwanted messages, and then you will have to add such channels to the blacklist.

> If you reinstall the app, you will receive a new User Token — you will not be able to restore the old Token.
> Each user receives a unique Token. If you know the user's personal Token, you can send messages to them.
</details>

### Channels

<details>
<summary>Click to expand for more information</summary>

You need to create a channel to send messages to yourself or other users.

Each channel has a name, a logo, a unique **Channel Token**, and a **Channel Secret Key**.

The **Channel Token** consists of random numbers and letters of the English alphabet with a length of 42 characters. Starts with the prefix `c_`, for example:

`c_5baa8b3d74852e1d6709f6068fbdd07fe1b73c2b`

The **Channel Secret Key** consists of random numbers and letters of the English alphabet with a length of 64 characters, for example:

`4fc82b26aecb47d2868c4efbe3581732a3e7cbcc6c2efb32062c08170a05eeb8`

You can find the Channel Token and Channel Secret Key in My channels section.

Do not share your Channel's Token and Secret Key with anyone, otherwise attackers will be able to send messages without your knowledge.

> If your channel data has been compromised, update your Secret Key immediately so that attackers can't send messages. The Channel Secret Key can be updated at any time.
> Create channels for sending messages. Do not share your Channel's Token and Secret Key with third parties. If data is compromised, update the Channel Secret Key.

#### Blocked channels

Annoying channels can be added to the blacklist to avoid receiving messages from them. To do this, select notification in the mobile app and click Block channel. Manage blocked channels in the auxiliary menu of the mobile app.

> Messages from blocked channels won't disturb you anymore.
</details>

### Limitations

<details>
<summary>Click to expand for more information</summary>

The app imposes certain restrictions in order to use resources efficiently, monitor security, and control spam.

- Notification text and links no more than 1000 characters;
- Maximum 5 channels per user;
- Sending no more than 300 messages per day from each channel;
- Verified channels have no restrictions on the number of messages sent.

</details>

## Sending messages

**POST** an HTTPS request to <https://push.kilo.chat/v1/messages/send> with the following parameters:

| Key       | Required | Type   | Decription                             |
| --------- | -------- | ------ | -------------------------------------- |
| to        | yes      | string | Recipient: User Token                  |
| token     | yes      | string | Sender: Channel Token                  |
| secret    | yes      | string | Sender: Channel Secret Key             |
| message   | yes      | string | Your message                           |
| url       | no       | string | Hyperlink (http:// or https://)        |
| important | no       | string | Add push notification: 0 - no, 1 - yes |

### HTTP Request Headers

- for JSON `Content-Type: application/json`
- for HTML Form `Content-Type: application/x-www-form-urlencoded`

## Responses

### 200 OK

Successful request. The message has been sent.

```json
{
    "response": {
        "status": 200
    }
}
```

### 400 Bad request

The message could not be sent for any reason `response->status`:

- **4000** Invalid request headers.
- **4003** Forbidden: restricted access rights or actions with the object.
- **4005** Invalid or forbidden values passed.
- **4023** Target user or channel is blocked.
- **4024** The user added the channel to the blacklist.
- **4029** Exceeded the daily limit for sending messages.

```json
{
    "response": {
        "status": 4000,
        "message": "Invalid request headers."
    }
}
```

#### 500 Internal Server Error

Internal server error please try again later.

## Authors

All rights reserved to [34devs.ru](https://34devs.ru/ "34devs.ru").
