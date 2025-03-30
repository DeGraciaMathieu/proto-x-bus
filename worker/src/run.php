<?php

require_once __DIR__ . '/../vendor/autoload.php';

$game = new Game();
$game->setName('Dino Crisis 2');

$serialized = $game->serializeToString();

dump($serialized);
