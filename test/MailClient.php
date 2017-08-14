<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/7/25
 * Time: 下午1:05
 */

namespace Test\My;


use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MailClient
{
    private $client;
    private $logger;
    public function __construct()
    {
        $this->client = new \swoole_client(SWOOLE_SOCK_TCP);
        $streamHandler = new StreamHandler('/Users/liu/www/test/swoole.log');
        $firePHPHandler = new FirePHPHandler();
        $this->logger = new Logger('swoole_client');
        $this->logger->pushHandler($streamHandler,Logger::INFO);
        $this->logger->pushHandler($firePHPHandler,Logger::INFO);
    }

    public function connect(){
        if(!$this->client->connect('127.0.0.1',9501,1)){
            throw new \Exception(sprintf('Swoole Error:%s',$this->client->errCode));
        }
    }

    public function send($data){
        if($this->client->isConnected()){
            if(!is_string($data)){
                $data = json_encode($data);
            }
            $this->logger->addInfo('start to send Data:'.$data);
            $res = $this->client->send($data);
            $this->logger->addInfo('receive data from serve',array('data' => $this->client->recv()));
            return $res;
        }else{
            throw new \Exception('Swoole Server does not connect');
        }
    }
    public function close(){
        $this->client->close();
    }
}