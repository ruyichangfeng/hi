<?php
	require_once(__DIR__.'/'.'vendor/autoload.php');
	use PhpAmqpLib\Connection\AMQPStreamConnection;
	use PhpAmqpLib\Message\AMQPMessage;
	$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
	$channel = $connection->channel();
// 	$channel->queue_declare('hello',fasle,false,false,false);
    $msg = trim($argv[1]) ? : 'Hello World! This is test for mq!';
    $channel->exchange_declare('logs','fanout');
    $channel->queue_declare('hello', false, false, false, false);
	$msg = new AMQPMessage($msg);
	$channel->basic_publish($msg, 'logs', '');
	echo " [x] Sent 'Hello World!'\n";
	$channel->close();
	$connection->close();