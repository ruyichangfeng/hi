<?php

/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/8/31
 * Time: 下午3:04
 */
//include "Task.php";
//include "Schedule.php";
class SystemCall
{
    protected $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function __invoke(Task $task,Schedule $schedules)
    {
        // TODO: Implement __invoke() method.
        $callback = $this->callback;
        stream_select();
        return $callback($task,$schedules);

    }
}