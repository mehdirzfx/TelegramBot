# TelegramBot
* Template Telegram Bot 

 
**The host must support HTTPS in order for this to work.**

## Create Telegram Bot

Start a conversation with the *BotFather*:

```
GLOBAL SEARCH -> BotFather
```

> **BotFather**: The *BotFather* is the one bot to rule them all. Use it to create new bot accounts and manage your existing bots.

Create a new bot:

`/newbot`

Choose a user-friendly name for your bot, for example:

`BotName`

Choose a unique username for your bot (must ends with “bot”), for example:

`BotUsername_bot`

Once the bot is created, you will get a token to access the Telegram API.

> TOKEN: The token is a string that is required to authorize the bot and send requests to the Telegram API, e.g. 4334584910:AAEPmjlh84N62Lv1jGWEgOftlxxAfMhB1gs

## Get The Chat ID

> CHAT_ID: To send a message through the Telegram API, the bot needs to provide the ID of the chat it wishes to speak in. The chat ID will be generated once you start the first conversation with your bot.
Start a conversation with your bot:

`🔍 GLOBAL SEARCH -> MY_BOT_NAME -> START`

Send the /start command:

`/start`

To get the chat ID, open the following URL in your web-browser: https://api.telegram.org/bot**TOKEN**/getUpdates (replace **«TOKEN»** with your bot token).


## Set the Webhook

To set the webhook to your telegram bot you only need to access the following url with the bot token and the url to your webhook https://api.telegram.org/bot**TOKEN**/setwebhook?url=https://example.domain/path/to/bothook.php (replace **«TOKEN»** with your bot token and the webhook url to your own).

example: 
```
https://api.telegram.org/bot4334584910:AAEPmjlh84N62Lv3jGWEgOftlxxAfMhB1gs/setwebhook?url=https://yourdomain.com/5277d6cf9f917a1da0ef9e55f3ae9f8f/bothook.php
```

More help on how to create a webhook [here](https://core.telegram.org/bots/webhooks).