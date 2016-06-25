<?php
header('Content-Type: text/html;charset=utf-8');
//1 实例化redis对象
$redis = new Redis();
//2 连接redis服务器
$redis->connect('127.0.0.1');

//3 读取redis服务器上的name
$name = $redis->get('name');
var_dump($name);



