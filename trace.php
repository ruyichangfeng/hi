<?php
function logger($fileName) {
	$fileHandle = fopen($fileName, 'a');
	while (true) {
		fwrite($fileHandle, yield . "\n");
	}
}

$logger = logger(__DIR__ . '/log');
$logger->send('Foo');
$logger->send('Bar');

function gen() {
	$ret = (yield 'yield1');
	var_dump('res1:'.$ret);
	$ret = (yield 'yield2');
	var_dump('res2:'.$ret);
}

$gen = gen();
var_dump($gen->current());
var_dump($gen->send('ret1'));
var_dump($gen->send('ret2'));