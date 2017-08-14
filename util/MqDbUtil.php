<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/8/24
 * Time: 下午3:58
 */

namespace Test\Util;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
class MqDbUtil
{
    private static $connection;
    private static $channel;

    public static function getInstance(){
        if(self::$connection == NULL){
            $config = include '/Users/liu/www/test/config/config.php';
            self::$connection = new AMQPStreamConnection($config['mq']['host'],$config['mq']['port'],$config['mq']['user'],$config['mq']['pwd']);

        }
        return self::$connection;
    }

    public static function getChannel(){
        if(self::$channel == NULL){
            self::$channel = self::getInstance()->channel();
        }
        return self::$channel;
    }
    public static function getMessage($msg,$properties){
        if(is_array($msg)){
            $msg = json_encode($msg);
        }
       return new AMQPMessage($msg,$properties);
    }

    public static function close()
    {
        if(self::$channel){
            self::$channel->close();
        }
        if(self::$connection){
            self::$connection->close();
        }
    }

}