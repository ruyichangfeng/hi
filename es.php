<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
	require 'vendor/autoload.php';




 function unique($parameters){
	$uniqueKey = array();

	foreach ($parameters as $key => $value) {
		if (is_scalar($value)) {
			$uniqueKey[] = $key . ':' . $value;
		} else {
			if (is_array($value)) {
				$uniqueKey[] = $key . ':[' . unique($value) .']';
			}
		}
	}
	return join(',', $uniqueKey);
};

echo unique(array(1,'a',array('1','A' => array('aa',253))));
exit;
    //$client = new \Elastica\Client();
//	$params = array();
//	//创建
//	//$params['body']  = array('testField1' => 'abc');
//	$params['index'] = 'my_index1';
//	$params['type']  = 'my_type1';
//	$params['id']    = 'my_id1';
//	//$result = $client->index($params);
//	$result = $client->get($params);
//	var_dump($result);
//先定义handler ,handler可以共用
$streamHandler = new \Monolog\Handler\StreamHandler('test.log');
$rotatingHandler = new \Monolog\Handler\RotatingFileHandler('./dayLog/My_log7.log',5,\Monolog\Logger::DEBUG,true,0777);
//$mailHandler   = new \Monolog\Handler\NativeMailerHandler('liu.duanwang@yujianjia.com','testog','18645100715@163.com');
$firePHP       = new \Monolog\Handler\FirePHPHandler();
$log = new Monolog\Logger('my_log');
//$log->pushHandler($streamHandler,Monolog\Logger::WARNING);
$log->pushHandler($firePHP,Monolog\Logger::DEBUG);
$log->pushHandler($rotatingHandler,Monolog\Logger::DEBUG);
$log->addDebug('Foo');
$rotatingHandler->pushProcessor(function($record){
	$record['extra']['test'] = 'fasf';
	return $record;
});
//$log->pushProcessor(function ($record){
//	$record['2'] = 0;
//	return $record;
//});
//$test = new \Test\My\Foo();
//$test->test();
