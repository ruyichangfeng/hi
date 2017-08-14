<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/8/24
 * Time: 下午5:03
 */
include 'vendor/autoload.php';
$channel = \Test\Util\MqDbUtil::getChannel();
$channel->queue_declare('confirm_test',false,true,false,false);
$callback = function($msg){
    echo '[@@] Receive data ,msg is ',$msg->body,"\n";
    sleep(substr_count($msg->body,'.'));
    echo 'done',"\n";
    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};
$channel->basic_consume('confirm_test','',false,false,false,false,$callback);
while(count($channel->callbacks)){
    $channel->wait();
}
\Test\Util\MqDbUtil::close();