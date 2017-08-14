<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/7/11
 * Time: 下午5:03
 */

namespace Test\My;


class PHPUnitDemoTest extends \PHPUnit_Framework_TestCase
{
    public function testPushAndPop()
    {
        $stack = [];
        $this->assertEquals(2, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }

}