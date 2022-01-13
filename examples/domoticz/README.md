# Domoticz

[Domoticz](https://www.domoticz.com/ "Domoticz") is a lightweight Home Automation System. KILO.Push can be used to receive notifications from Domoticz.

## What are Notifications?

Notifications can be used when you want to know if a switch is pressed (for example a doorbell), or when a temperature is below/above a certain degree, or when you power usage is above xxx Watt, etc.

Each device has different parameters for notifications, a switch might have an On/Off state, a temperature device might have a temperature/humidity and a wind meter might have wind force/speed, etc.

## A simple example

Open and fill Custom HTTP/Action block (Settings > Notifications) the following parameters:

FIELD1 `token` Sender: Channel Token

FIELD2 `secret` Sender: Channel Secret Key

FIELD3 `url` Hyperlink (http:// or https://)

FIELD4 `important` Add push notification: 0 - no, 1 - yes

TO `to` Recipient: User Token

URL/Action `https://push.kilo.chat/v1/messages/send`

POST Data `to=#TO&token=#FIELD1&secret=#FIELD2&url=#FIELD3&important=#FIELD4&message=#SUBJECT #MESSAGE`

POST Content-Type `application/x-www-form-urlencoded`
