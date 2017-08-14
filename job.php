<?php

	$array = array(array('name' => 'test','broker' => array()),array('name'=> 'test1','broker' => array('name'=> 11)));

	array_walk($array,function($val,$key) use(&$array){
            if(empty($val['broker'])){
                unset($array[$key]);
            }
           
        });
	var_dump($array);		
?>