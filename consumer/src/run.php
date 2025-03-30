<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Aws\Sqs\SqsClient;
use Aws\Exception\AwsException;

$sqsClient = new SqsClient([
    'version' => 'latest',
    'region'  => 'us-east-1',
    'endpoint' => 'http://localhost:4566', 
]);

$queueUrl = 'http://sqs.us-east-1.localhost.localstack.cloud:4566/000000000000/testing-queue';

try {

    $result = $sqsClient->receiveMessage([
        'QueueUrl' => $queueUrl,
        'MaxNumberOfMessages' => 1,
        'VisibilityTimeout' => 0,
        'WaitTimeSeconds' => 0,
    ]);

    $messages = $result->get('Messages');

    if (! $messages) {
        dd('No messages');
    }

    foreach ($messages as $message) {

        $gameDeserialized = new Game();
        $gameDeserialized->mergeFromString($message['Body']);

        echo 'game found : ' . $gameDeserialized->getName() . PHP_EOL;
    }

} catch (AwsException $e) {
    dump($e->getMessage());
}
