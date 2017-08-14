<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/8/31
 * Time: 上午11:08
 */

//$m = memory_get_usage()/1024/1024;
//echo 'before usage is ',$m,"\n";
//$data = range(1,1000000);
//$m1 = memory_get_usage()/1024/1024;
//echo 'after usage is ',$m1,"\n";
//foreach($data as $d){
//}
//exit;

//yield作为值返回
//function logger($fileName){
//    $fileHandle = fopen($fileName,'a');
//    while(true){
//        fwrite($fileHandle,yield. "\n");
//    }
//}
//
//$logger = logger(__DIR__.'/log.log');
//$logger->send(json_encode(array('hello','test')));
//$logger->send('Bar');
//同时接收和发送
include 'Schedule.php';
//include 'Task.php';
include 'SystemCall.php';
function getTaskId(){
    return new SystemCall(function(Task $task,Schedule $schedule){
        $task->setSendValue($task->getTaskId());
        $schedule->schedule($task);
    });
}

//function task1(){
//    for($i=0;$i<100000;$i++){
//        echo 'this is task1 iterator '.$i."\n";
//        yield;
//    }
//}
//
//function task2(){
//    for($i=0;$i<50000;$i++){
//        echo 'this is task2 iterator '.$i."\n";
//        yield;
//    }
//}

function task($max){
    $tid = (yield getTaskId());
    for($i=1;$i<$max;++$i){
        echo "this is task {$tid} generator {$i},\n";
        yield;
    }
}
$start = microtime(true);
$schedule = new Schedule();
echo 'memory usage '.memory_get_usage()/1024/1024,"\n";
$schedule->newTask(task(10));
echo 'memory usage '.memory_get_usage()/1024/1024,"\n";
$schedule->newTask(task(5));
echo 'memory usage '.memory_get_usage()/1024/1024,"\n";
$schedule->run();
echo 'memory usage '.memory_get_usage()/1024/1024,"\n";
echo 'total use time '.(microtime(true)-$start);
exit;













function gen(){
    $ret = (yield 'yield1');
    var_dump($ret);
    $ret = (yield 'yield2');
    var_dump($ret);
}

$gen = gen();
echo $gen->current();
var_dump($gen->send('ret1'));
//exit;
var_dump($gen->send('ret2'));
exit;
function xrange($start,$limit,$step = 1){
    for($i=$start;$i<$limit;$i += $step){
        yield $i+1 => $i;
    }
}

$m = memory_get_usage()/1024/1024;
echo 'before usage is ',$m,"\n";
$data = xrange(1,10);
while($data->valid()){
    echo $data->current(),"\n";
    $data->next();
}
echo $data->current(),"\n";
$m1 = memory_get_usage()/1024/1024;
echo 'after usage is ',$m1,"\n";
//foreach($data as $d){
//}
exit;