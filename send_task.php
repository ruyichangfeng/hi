<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/8/23
 * Time: 下午2:46
 */
include 'vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
$connection = new AMQPStreamConnection('localhost',5672,'guest','guest');
$channel    = $connection->channel();
$channel->queue_declare('task_queue',false,true,false,false);
$data       = implode(' ',array_slice($argv,1));
if(empty($data)){
    $data = 'Task message!';
}
$msg = new AMQPMessage($data,array('deliveryMode' => 2));//make message persistent
$rest = $channel->basic_publish($msg,'','task_queue');
echo " [x] Sent ",$data,"\n";
//var_dump($rest);
$channel->close();
$connection->close();