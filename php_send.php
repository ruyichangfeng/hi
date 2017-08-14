<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/8/22
 * Time: 上午10:59
 */
include './vendor/autoload.php';
$exchangeName = 'demo';
$queueName    = 'hello';
$routingKey   = 'hello';
$message      = 'Hello World!';

$conn = new \PhpAmqpLib\Connection\AMQPConnection('localhost',15672,'guest','guest');
try{
    $channel = $conn->channel();
    $channel->exchange_declare($exchangeName,AMQP_EX_TYPE_DIRECT);
    $channel->queue_declare($queueName);
    $channel->basic_publish($message,'');
}catch(Exception $e){

}