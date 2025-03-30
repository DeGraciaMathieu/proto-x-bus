## bus

# localstack

```
docker run -d -p 4566:4566 -p 4510-4559:4510-4559 localstack/localstack
```

```
$ aws configure
AWS Access Key ID [None]: test
AWS Secret Access Key [None]: test
Default region name [None]: us-east-1
Default output format [None]: json
```

```
aws --endpoint-url=http://localhost:4566 --region us-east-1 sqs create-queue --queue-name testing-queue
```

```
aws --endpoint-url=http://localhost:4566 --region us-east-1 sqs send-message --queue-url http://sqs.us-east-1.localhost.localstack.cloud:4566/000000000000/testing-queue --message-body "qsdsqdsqdsqdsqq"
```

```
aws --endpoint-url=http://localhost:4566 --region us-east-1 sqs receive-message --queue-url http://sqs.us-east-1.localhost.localstack.cloud:4566/000000000000/testing-queue

```