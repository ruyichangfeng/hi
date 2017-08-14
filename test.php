<?php
/**
 * yaf framework test
 * Created by PhpStorm.
 * User: liu
 * Date: 16/6/12
 * Time: 下午5:41
 */

$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$redis->set('Aozq2tjrYzTwhwh4NRyRbbMz-82MA','');
var_dump($res);
exit;
$current_day = date('Ymd');
$user_id = 123456;
$product_id = 123;
$members = $redis->sMembers($user_id);
//foreach ($members as $member){
//	$m = json_decode($member,true);
//	var_dump($m);exit;
//	foreach ($m as $v){
//		var_dump(in_array(13,$v));exit;
//	}
//	var_dump(in_array(123,$m));exit;
//}
//var_dump($members);exit;
if(empty($members)){
	$redis->sAdd($user_id,json_encode(array($current_day => array($product_id))));
	$redis->sAdd($user_id,json_encode(array('20170608' => array(345))));
}
$members = $redis->sGetMembers($user_id);
var_dump($members);exit;
//setcookie('test','hello');

// $arr1 = array('one' => 1,'two' => 2);
// $arr2 = array('one' => 3,'two' => 4);
// var_dump($arr1+$arr2);
// var_dump(array_merge($arr1,$arr2));


// $obj  = new stdClass();
// $obj->name = 'ls';
// $obj->age  = 100;
// $obj2 = array('name' => 'zs');
// var_dump($obj,$obj2->name);
// exit;

//  function xrange($start,$end){
//     for ($i=$start; $i<$end ; $i++) { 
//         yield $i;
//     }
// }

// function yield_test(){
//     $arr_data = array(
//     'testData' => array(
//     'beijing' => array(
//         'tiananmeng' => array(
//             'desc' => '伟大北京天安门'
//             ),
//         'changcheng' => array(
//             'desc' => '长城是很好的地方')
//         ),
//     'shanghai' => array(
//         'lujiazui' => array(
//             'desc' => '国际金融中心'),
//         'xujiahui' => array(
//             'desc' => '上海市中心')
//         )
//     )
// );
//  $data = array();
//  foreach ($arr_data as $key => $value) {
//      foreach ($value as $key1 => $value1) {
//          $data[$key1] = $value1;
//      }
//  }
//  yield $data;
// }

// $t_data = yield_test();
// foreach ($t_data as $key => $value) {
//     var_dump($value);
// }
// exit;
// $data = array();
// $t1 = microtime(true);
// foreach ($json_str as $key => $value) {
//         $json_tmp = json_decode($value,true);
//         $cityData = empty($json_tmp['beijing']) ? array() : $json_tmp['beijing'];
//         $data[$key] = $cityData;
// }
// $t2 = microtime(true);
// echo "use time is ",($t2-$t1);
// var_dump($data);
// exit;


// $arr = xrange(1,3000);
// $data = array();
// $t1 = microtime(true);
// $m1 = memory_get_usage();
// foreach ($arr as $key => $value) {
//     # code...
//     $tmp = $value*2;
//     $data[$key] = $tmp;
// }
// $t2 = microtime(true);
// $m2 = memory_get_usage();
// echo "one time use is ",($t2-$t1),'memory usage is ',($m2-$m1);

// $arr = xrange(1,3000);
// $data = array();
// $t3 = microtime(true);
// $m3 = memory_get_usage();
// foreach ($arr as $key1 => $value1) {
//     # code...
//     $data[$key1] = $value1*2;
// }
// $t4 = microtime(true);
// $m4 = memory_get_usage();
// echo "two time use is ",($t4-$t3),'memory usage is ',($m4-$m3);
// exit;
$r = mt_rand(-1,1);
var_dump($r);exit;
$var1 = "Hell";
$var2 = "hello";
var_dump(strcasecmp($var1,$var2));exit;
$arra = array(1002=>'test',1004=>'good');
$arrb = array(1003=>'good','1004'=> 'test');
var_dump(array_merge($arra+$arrb));exit;
$data = json_encode(array(
    'city' => array(
        'shanghai','beijing','shenzheng'),
    'deployment' => array(
        'shanghai' => array(
            'title' => 'no1'),
        'beijing' => array(
            'title' => 'no2'))
    ));

$data1 = array(
    'city' => json_encode(array(
        'shanghai','beijing','shenzheng'))
    );


$d1 = json_decode($data);
$d2 = json_decode($data1);


exit;

class T1 
{
  public $name;
  public $age;
  public $expire = array(
        'name' => 'test',
        'age'  => 12
    );
}

class T2
{

  /**
  *@param T1  
  */
  public function test(T1 $t1)
  {
    echo $t1->name;
  }
}
$t1 = new T1();
var_dump($t1->expire->name);
exit;
$t2 = new T2();
$obj = new stdClass();
$obj->name = 'hello';
$t2->test($obj);
exit;
class TestItClass implements Iterator
{
    
    public function current()
    {

    }

    public function key()
    {

    }

    public function next()
    {

    }

    public function rewind()
    {

    }

    public function valid()
    {

    }
}







setcookie('a','dddd',60);
echo 'dd';
exit;
$closureFunc = function($arg1,$arg2){
  return $arg1 + $arg2;
};
var_dump($closureFunc(1,2));;exit;
$type = 'SORT_DESC';
echo constant($type);exit;
$str = '10年林';
echo strtr($str,array('年' => '余额','林' => '很难'));
exit;
abstract class A{
    public function __construct(){
        echo "this is class A";
        $this->say();
        var_dump($this);

    }

    public function say(){
        echo 'hello !';
    }
}

abstract class B extends A {
    public function say(){
        echo "hello B";
    }
}

class C extends B {
    public function say(){
        echo "hello C";
    }
}

$b = new C();

$b->say();


function call($args1,$args2){
    echo __METHOD__.',args is '.$args1.'-'.$args2;
}

class Foo {
    static function call($args1,$args2){
        echo __METHOD__.',args is '.$args1.'-'.$args2;
    }
}
call_user_func_array('call', array('hello','world'));

call_user_func_array(array('Foo','call'), array('hello1','world1'));
openlog("test", 1, 2);
syslog(1, 'nihao');
closelog();

exit;

















$className = 'Foo_Bar';
$tmp = explode('_',$className);
$int = 2147483648;
echo sizeof($int);
var_dump(lcfirst($tmp[(count($tmp)-1)]));exit;
$array = array(array('price' => 10),array('price' => 20),array('price' => 5));
usort($array,function($pre,$next){
 return $pre['price'] < $next['price'] ? 1 : -1;
});
var_dump($array);
exit;
$mem = memory_get_usage(true)/1024;
var_dump($mem);exit;
$tem = '42.00';
$patern = '/(\d+\.?\d?)/';
$matches = array();
preg_match($patern,$tem,$matches);
var_dump($matches);
exit;



var_dump(floatval($tem));
var_dump(empty(floatval($tem)));
exit;
$a = -1;
echo 1-$a;exit;
echo $_COOKIE['test'];exit;
$f1 = '0.33';
$f2 = '0.00';
var_dump($f2 == null);exit;
$f3 = '0.3461212';
echo sprintf('%0.2f',$f3);
$test1 = '2,4,5,3,3';
$ts = explode(',',$test1);
$t = array_search('2',$ts);
$arr1 = array("C","PHP");
$arr2 = array("JAVA","PHP");
print_r($arr1+$arr2);exit;
var_dump($t);
//unset($ts[$t]);
//var_dump($ts);exit;
var_dump($f2 == 0);exit;

if(!defined('BASE_PATH')){
    define('BASE_PATH',realpath('.'));
}
require 'vendor/autoload.php';
try{
    $client = new \Test\My\MailClient();
    $client->connect();
    $data   = array(
        'title'   => '系统测试..',
        'content' => '<h1>Hello Swoole</h1>'
    );
    $res = $client->send($data);
    $client->close();
}catch(\Nette\InvalidArgumentException $e){
    echo  json_encode(array('resultCode' => 1,'resultMsg' => $e->getMessage()));
}catch(Exception $e){
    echo $e->getMessage();
}
echo 'haa';exit;
use Test\My\PHPUnitDemoTest;
$testUnit = new PHPUnitDemoTest();
$testUnit->testPushAndPop();
exit;
class Index_Controller extends Yaf_Controller_Abstract{
    public function indexAction(){
        echo $this->getRequest()->getQuery('hello');
    }
}
$index = new Index_Controller();
$index->indexAction();
