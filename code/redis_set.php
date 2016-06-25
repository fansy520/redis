<?php
header('Content-Type: text/html;charset=utf-8');
//1 实例化redis对象
$redis = new Redis();
//2 连接redis服务器
$redis->connect('127.0.0.1');


$name = '张三';
//3 向redis服务器写入一个变量
$redis->set('name',$name);

echo '写入成功!';
