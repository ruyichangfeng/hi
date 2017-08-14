<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/7/11
 * Time: 下午5:27
 */
//function test1(){
//    for($i=0;$i<100000;$i++){
//        echo 'this is task1 iterator '.$i."\n";
//    }
//}
//
//function test2(){
//    for($i=0;$i<50000;$i++){
//        echo 'this is task2 iterator '.$i."\n";
//    }
//}
//$start = microtime(true);
//echo 'memory usage '.memory_get_usage()/1024/1024,"\n";
//test1();
//echo 'memory usage '.memory_get_usage()/1024/1024,"\n";
//test2();
//echo 'memory usage '.memory_get_usage()/1024/1024,"\n";
//echo 'total use time '.(microtime(true)-$start);
function gen(){
      echo yield 3,"\n";
     echo yield 2,"\n";
//    yield 'Foo';
//    yield 'Bar';
}

//$string = gen()->current();
var_dump(gen()->send('hello'));
//gen()->send('hello1');
//var_dump($string);
