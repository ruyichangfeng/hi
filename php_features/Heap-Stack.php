<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2017/8/14
 * Time: 下午2:27
 */

//栈,后入先出，LIFO
$stack = new SplStack();
//入栈
$stack->push('a');
$stack->push('b');
//出栈
echo "栈实现:";
echo $stack->pop();
echo $stack->pop();

//队列实现,先进先出
$queue = new SplQueue();
//入队列
$queue->enqueue('a');
$queue->enqueue('b');
$queue->enqueue('c');
//出队列
echo "队列实现";
echo $queue->dequeue();
echo $queue->dequeue();
echo $queue->dequeue();

//最小堆实现
$heap = new SplMinHeap();
//插入到堆
$heap->insert('a');
$heap->insert('b');
//从堆中提取数据
echo "堆实现:";
echo $heap->extract();
echo $heap->extract();