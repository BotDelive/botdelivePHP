![botdelive](https://botdelive.com/images/logo.png)

About
-------------

**BotDelive** is a Push Notification and 2-factor authentication API service that works over the chat bots (Telegram and Messenger).

        composer require botdelive/botdelive

Requirements
-------------

1. Create [an account](https://botdelive.com/login).
2. Visit "Create App" menu on the dashboard and create one.
3. Keep the secret key of the created app safe and save the app ID.
4. cURL.
5. PHP 5.6+

Usage
-------------

Let's initialize the library first. Don't forget to replace `<YOUR_APP_ID>` and `<YOUR_SECRET_KEY>`.
```php
use BotDelive\BotDelive;

$bd = new BotDelive(<YOUR_APP_ID>,<YOUR_SECRET_KEY>);
```

**Verify the "Access Code":**
```php
$bd->verify(<USER_GENERATED_ACCESS_CODE_HERE>));
```

**Send 2-factor authentication request (long polling):**
```php
$bd->auth(<USER_ID_HERE>);
```

**Send Push Notification request:**
```php
$bd->push('<USER_ID_HERE>', '<MESSAGE_HERE>');
```

Documentation
-------------

Complete documentation available at: [https://botdelive.com/docs](https://botdelive.com/docs)