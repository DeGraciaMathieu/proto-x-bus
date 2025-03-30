<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Aws\Sqs\SqsClient;
use Aws\Exception\AwsException;

$sqsClient = new SqsClient([
    'version' => 'latest',
    'region'  => 'us-east-1',
    'endpoint' => 'http://localhost:4566',
]);

$game = new Game();
$game->setName('Dino Crisis 2');

$queueUrl = 'http://sqs.us-east-1.localhost.localstack.cloud:4566/000000000000/testing-queue';

try {

    $result = $sqsClient->sendMessage([
        'QueueUrl'    => $queueUrl,
        'MessageBody' => $game->serializeToString(),
    ]);

    echo "message sent with id: " . $result->get('MessageId');

} catch (AwsException $e) {
    dump($e->getMessage());
}
