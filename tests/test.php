<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BotDelive\BotDelive;

$secretKey = '';
$appId = '';
$accessCode = '';
$userId = '';

$bd = new BotDelive($appId,$secretKey);
//print_r($bd->verify($accessCode));
//print_r($bd->auth($userId));
//print_r($bd->push($userId,'Hello World'));