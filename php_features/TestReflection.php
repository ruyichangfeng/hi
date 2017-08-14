<?php

/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/9/2
 * Time: 下午2:03
 */
class TestReflection
{
    private $t1;
    private $t2;

    /**
     * @return mixed
     */
    public function getT1()
    {
        return $this->t1;
    }

    /**
     * @param mixed $t1
     */
    public function setT1($t1)
    {
        $this->t1 = $t1;
    }

    /**
     * @return mixed
     */
    public function getT2()
    {
        return $this->t2;
    }

    /**
     * @param mixed $t2
     */
    public function setT2($t2)
    {
        $this->t2 = $t2;
    }

}