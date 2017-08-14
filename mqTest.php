<?php
	require 'vendor/autoload.php';
	use PhpAmqpLib\Connection\AMQPConnection;
	use PhpAmqpLib\Message\AMQPMessage;
	$connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
	$channel = $connection->channel();
	$channel->queue_declare('hello',false,false,false,false);
	$msg = new AMQPMessage('hello world');
	$channel->basic_publish($msg,'','hello');
	echo " [x] Sent 'Hello World!'\n";
	//var_dump($msg);
	$channel->close();
	$connection->close();