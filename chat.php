<?php
require_once 'vendor/autoload.php';
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
$botman = BotManFactory::create();
// Give the bot something to listen for.
$botman->hears('hi', function (BotMan $bot) {
    $bot->reply('Hello and welcome');
});
$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});
// Start listening
$botman->listen();