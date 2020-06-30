<?php
include_once("./queue.php");
$queue = new Queue(10);
$queue->push('harry');
$queue->push('test');
$queue->push('finish');
$queue->push('no');
$queue->push('yes');
$queue->pop();
$queue->push('harry');
$queue->push('test');
$queue->push('finish');
$queue->push('no');
$queue->push('yes');

$res = $queue->getQueue();
var_dump($res);