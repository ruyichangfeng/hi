<?php
	require 'vendor/autoload.php';
	use PhpAmqpLib\Connection\AMQPStreamConnection;
	$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();
$channel->exchange_declare('logs','fanout');
//$channel->queue_declare('hello', false, false, false, false);
list($queueName) = $channel->queue_declare('',false,false,true);
echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";

$callback = function($msg) {
    echo " [x] Received ", $msg->body, "\n";
	sleep(1);
};

$res = $channel->basic_consume('hello', '', false, true, false, false, $callback);
while(count($channel->callbacks)) {
    $channel->wait();
}