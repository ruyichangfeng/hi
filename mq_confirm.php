<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/8/24
 * Time: 下午3:55
 */
include 'vendor/autoload.php';
$channel = \Test\Util\MqDbUtil::getChannel();
$channel->queue_declare('confirm_test',false,true,false,false);
$channel->confirm_select();
$i = 0;
while($i<5){
    $i++;
    $channel->basic_publish(\Test\Util\MqDbUtil::getMessage('hello..',array('deliveryMode' => 2)),'','confirm_test');
}
$result = $channel->confirm_select(5);
//echo $channel->wait_content();
//$channel->queue_delete('confirm_test');
\Test\Util\MqDbUtil::close();