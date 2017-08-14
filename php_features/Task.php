<?php

/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/8/31
 * Time: 下午2:17
 */
class Task
{
    protected $taskId;
    protected $coroutine;
    protected $sendValue = null;
    protected $beforeFirstYield = true;
	
	/**
	 * Task constructor.
	 * @param $taskId
	 * @param Generator $coroutine
	 */
	public function __construct($taskId, Generator $coroutine)
    {
        $this->taskId = $taskId;
        $this->coroutine = $coroutine;
    }
	
	/**
	 * 获取task_id
	 * @return mixed
	 */
	public function getTaskId(){
        return $this->taskId;
    }
	
	/**
	 * @param $value
	 */
	public function setSendValue($value){
        $this->sendValue = $value;
    }
	
	/**
	 * @return mixed
	 */
	public function run(){
        if($this->beforeFirstYield){
            $this->beforeFirstYield = false;
            return $this->coroutine->current();
        }else{
            $retval = $this->coroutine->send($this->sendValue);
            $this->sendValue = NULL;
            return $retval;
        }
    }
	
	/**
	 * @return bool
	 */
	public function isFinished(){
        return !$this->coroutine->valid();
    }
}