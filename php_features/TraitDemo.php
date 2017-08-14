<?php

/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/6/24
 * Time: 下午5:09
 */
include 'trait1.php';
class TraitDemo
{
    use trait1;
}
$demo1 = new TraitDemo();
$demo1->sayHello();