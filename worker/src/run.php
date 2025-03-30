<?php

require_once __DIR__ . '/../vendor/autoload.php';

$game = new Game();
$game->setName('Hello');

$serialized = $game->serializeToString();

dump($serialized);
