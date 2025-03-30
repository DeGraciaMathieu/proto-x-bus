# proto-x-bus

Creating prototypes :
```
protoc --proto_path=proto/ --php_out=worker/Protos game.proto
protoc --proto_path=proto/ --php_out=consumer/Protos game.proto
```

Starting bus :
```
docker run -d -p 4566:4566 -p 4510-4559:4510-4559 localstack/localstack
```

Creating queue :
```
aws --endpoint-url=http://localhost:4566 --region us-east-1 sqs create-queue --queue-name testing-queue
```

Usage :
```
php worker/src/run.php
php consumer/src/run.php
```