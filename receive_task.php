<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/8/23
 * Time: 下午2:55
 */
include "vendor/autoload.php";
use PhpAmqpLib\Connection\AMQPStreamConnection;
$connection = new AMQPStreamConnection('localhost',5672,'guest','guest');
$channel = $connection->channel();
$channel->queue_declare('task_queue',false,true,false,false);
echo ' [*] Waiting for message,to exit press Ctrl+C!',"\n";

//callback function
$callback = function($msg){
    echo 'Receive message :',$msg->body,"\n";
    sleep(substr_count($msg->body,'.'));
    echo 'done',"\n";
    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

//consume queue
$channel->basic_qos(null,1,null);
$channel->basic_consume('task_queue','',false,false,false,false,$callback);
while(count($channel->callbacks)){
    $channel->wait();
}