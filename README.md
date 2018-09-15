![botdelive](https://botdelive.com/images/logo.png)

About
-------------

**BotDelive** is a Push Notification and 2-factor authentication API service that works over the chat bots (Telegram and Messenger).

        composer require botdelive/botdelive

Requirements
-------------

1. [Create an account](https://botdelive.com/login).
2. Create an app on the dashboard to get appId and secretKey credentials.
3. cURL.
4. PHP 5.6+

Usage
-------------

Let's initialize the library first. Don't forget to replace `<YOUR_APP_ID>` and `<YOUR_SECRET_KEY>`.
```php
use BotDelive\BotDelive;

$bd = new BotDelive('<YOUR_APP_ID>', '<YOUR_SECRET_KEY>');
```

**Verify the "Access Code":**
```php
$bd->verify('<BOT_GENERATED_ACCESS_CODE>');
```

**Send 2-factor authentication request (long polling):**
```php
$bd->auth('<USER_ID>');
```

**Send Push Notification request:**
```php
$bd->push('<USER_ID>', '<MESSAGE>');
```

Documentation
-------------

Complete documentation available at: [https://botdelive.com/docs](https://botdelive.com/docs)
