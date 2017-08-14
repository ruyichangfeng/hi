<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/8/29
 * Time: 下午6:34
 */
include '../Workerman/Autoloader.php';

$http_worker = new \Workerman\Worker("http://0.0.0.0:2345");

$http_worker->count = 4;

$http_worker->onMessage = function($connection,$data){
    $connection->send('hello world!11111');
};

\Workerman\Worker::runAll();