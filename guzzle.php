<?php
include 'vendor/autoload.php';
error_reporting(1);
ini_set('display_errors', 'On');

$header = array('Content-Type' => 'application/json', 'UID' => '5567f448caa821b8268b456a');

$baseUri = 'http://10.188.10.2:7100/caigou/purchase_order/list?page=1&pagesize=1000';
$client = new GuzzleHttp\Client(array('base_uri' => $baseUri,'timeout' => 5));
$t1 = microtime(true);
$res1 = $client->get('',array('headers' => $header));
//var_export($res1->getBody()->getContents());
//var_export(json_decode($res1->getBody()->getContents(),true));
//$res = $client->get('caigou/advice_payment/list?page=1',array('headers' => $header));
//$res = $client->get('caigou/advice_payment/list?page=1',array('headers' => $header));
//var_export(\GuzzleHttp\json_decode($res->getBody()));
echo 'use time is ',microtime(true)-$t1,"\n";
$t2 = microtime(true);
$requests = function ($total) use($client,$header){
    for($i=0;$i<$total;$i++){
        yield function () use($client,$header){
            return $client->request('GET','',array('headers' => $header));
        };
    }
};
$pool = new \GuzzleHttp\Pool($client,$requests(1),
    array(
        'concurrency' => 5,
        'fulfilled' => function($response,$index){
            //var_export($response->getBody()->getContents());
            echo $index,"\n";
        },
        'rejected' => function(){

        }));
$pool->promise()->wait();
echo "async use time is ",microtime(true)-$t2,"\n";


/*//unirest
$t3 = microtime(true);
//$request = new \Unirest\Request();
//$request->jsonOpts(true);
//$request->timeout(5);
\Unirest\Request::jsonOpts(true);
\Unirest\Request::timeout(5);
$response = \Unirest\Request::get($baseUri,$header);
echo 'unirest time is ',microtime(true)-$t3,"\n";*/