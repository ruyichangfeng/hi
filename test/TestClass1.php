<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/7/12
 * Time: 下午3:01
 */
namespace Test\My;

class TestClass1 {
    public function hello(TestInterface $interface){
        echo $interface->test3();
    }
}