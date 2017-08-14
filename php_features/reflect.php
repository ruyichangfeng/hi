<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/9/2
 * Time: 下午2:04
 */
include 'TestReflection.php';
$demo = new ReflectionClass('TestReflection');
$properties = $demo->getProperties();
var_export($properties);