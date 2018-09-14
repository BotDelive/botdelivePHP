<?php


namespace BotDelive;

/**
 * Class Constants
 * @package BotDelive
 */

abstract class Constants
{
    const Endpoint = 'https://botdelive.com/api/';
    const VerifyUserUrl = Endpoint.'verifyAC';
    const AuthenticateUrl = Endpoint.'sendAuth';
    const PushNotificationUrl = Endpoint.'sendPush';
}
