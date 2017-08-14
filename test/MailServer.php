<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/7/25
 * Time: 上午11:19
 */

namespace Test\My;

use Test\My\Mail as MyMail;

class MailServer
{

    private $logger = '';

    private $server = '';

    private $mailer;

    public function __construct()
    {
        $this->mailer = new MyMail('liu.duanwang@yuapt.com');
        $this->server = new \swoole_server('127.0.0.1',9501);
        $this->server->set(array(
            'worker_num'      => 4,
            'task_worker_num' => 4,
            'daemonize'       => false,
            'max_request'     => 10000,
            'dispatch_mode'   => 2,
            'debug_mode'      => 1
        ));
        $this->server->on('Start',array($this,'onStart'));
        $this->server->on('Connect',array($this,'onConnect'));
        $this->server->on('Receive',array($this,'onReceive'));
        $this->server->on('Task',array($this,'onTask'));
        $this->server->on('Close',array($this,'onClose'));
        $this->server->on('WorkerStart',array($this,'onWorkerStart'));
        $this->server->on('Finish',array($this,'onFinish'));
        $this->server->start();
    }
    public function onStart(){
        echo 'Server start..';
    }
    public function onConnect(\swoole_server $server, $fd, $fromId){
        echo 'Server connect,fd is '.$fd.',fromId is '.$fromId;
    }
    public function onReceive(\swoole_server $server, $fd, $fromId, $data){
        $mailData = json_decode($data,true);
        echo 'Receive data:'.$data.',fd is '.$fd.',fromId is '.$fromId;
        $result = $this->sendMail($mailData);
        $server->send($fd,'mail send OK!',$fromId);
    }
    public function onTask(\swoole_server $server,$task_id,$from_id,$data){
        echo "on task now \n";
        echo "taskId is ".$task_id."\n";
        echo "fromId is ".$from_id."\n";
        echo "data is ".$data."\n";
        return "I'm OK";
    }
    public function onClose(\swoole_server $server, $fromId){
        echo 'Server closed..';
    }
    public function onWorkerStart(\swoole_server $server,$workerId){

        echo "master_id:".$server->master_pid."\n";
        echo "manager_pid:".$server->manager_pid."\n";
        echo "worker_id:".$server->worker_id."\n";
        echo "worker_pid:".$server->worker_pid."\n";
        //var_dump(get_included_files());
    }
    public function sendMail(array $msg){
        $this->mailer->title($msg['title']);
        $this->mailer->content($msg['content']);
        $this->mailer->send();
    }
    public function onFinish(\swoole_server $server,$task_id,$data){
        echo "task id {$task_id} finished,data is {$data}";
    }
}