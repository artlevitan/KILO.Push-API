
# KILO.Push
###### Communicate with me!

KILO.Push is a free platform for sending and receiving messages with push notifications to your phone or tablet from a variety of sources. From the server side, we provide an HTTP API for delivering messages to devices that are addressed using tokens. Mobile app based on iOS and Android receives these push messages and shows them to the user.

1. Install our mobile app on your iPhone/iPad or Android device.
2. After launching the application, you will receive a unique User Token to receive messages.
3. Create a channel to send messages to other users.

Programmers can easily integrate sending messages to KILO.Push from your services, IoT, feedback forms, or anything else that uses our API.

KILO.Push is perfect for sending news and promotions, security alerts, IoT notifications and smart home automation.

## Scope of application
- News and promotions;
- Security alerts (two-factor authentication, alarm, etc.);
- IoT notifications and smart home automation;
- Anonymous prize draws;
- Complete replacement of paid SMS;
- And much more…

## Get started
Programmers can easily integrate sending messages to KILO.Push from your services, IoT, feedback forms, or anything else that uses our API. Examples in different programming languages can be found below.

### Users
When you first launch the mobile app, you will be assigned a unique **User Token**, which is an identifier, like a personal phone number or email address.

The **User Token** consists of random letters and numbers of the English alphabet with a length of 42 characters. Starts with the prefix `u_`, for example:

`u_282c0a20f0520a152c89d8c0489426c0668ca495`

User Token is used to receive messages. Do not share your Token with third parties without the necessity, this may cause you to receive unwanted messages, and then you will have to add such channels to the blacklist.

> If you reinstall the app, you will receive a new User Token — you will not be able to restore the old Token.

> Each user receives a unique Token. If you know the user's personal Token, you can send messages to them.

### Channels
You need to create a channel to send messages to other users.

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

### Limitations
The app imposes certain restrictions in order to use resources efficiently, monitor security, and control spam.
- Notification text and links no more than 1000 characters;
- Maximum 10 channels per user;
- Sending no more than 500 messages per day from each channel;
- Verified channels have no restrictions on the number of messages sent.

## Sending messages
POST an HTTPS request to https://push.kilo.chat/v1/messages/send with the following parameters:

| Key | Required | Type | Decription |
|--|--|--|--|
| to | yes | string | Recipient: User Token |
| token | yes | string | Sender: Channel Token |
| secret | yes | string | Sender: Channel Secret Key |
| message | yes | string | Your message |
| url | no | string | Hyperlink (http:// or https://) |
| important | no | string | Add push notification: 0 - no, 1 - yes |

### HTTP Request Headers:
- for JSON `Content-Type: application/json`
- for HTML Form `Content-Type: application/x-www-form-urlencoded`