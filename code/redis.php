<?php
// 实例化redis对象
$redis = new Redis();
// 连接redis服务器
$redis->connect('127.0.0.1');

//工作中,redis怎么使用

//1秒钟,有1W用户访问

//用户访问JD首页的时候,判断redis里面有没有cate_str
$cate_str = $redis->get('cate_str');
if($cate_str === false){//如果没有,从数据库里面获取,转换为字符串,然后保存到redis里面

    //第一个用户访问JD的首页,需要从数据库获取商品分类信息,然后保存到redis里面
    //1.连接数据库,从商品分类表里面获取商品分类信息,保存到$cate变量里面
    $cate = array(
        array('id'=>1,'name'=>'手机'),
        array('id'=>2,'name'=>'家用电器')
    );
    //序列化$cate数组,转换为字符串
    $cate_str = serialize($cate);
    //将$cate_str字符串,保存到redis,对应key的cate_str
    $redis->set('cate_str',$cate_str);
    echo '从数据库获取';
}else{//如果有,直接从redis里面获取cate_str,并且转换为cate数组
    //第2-1W个用户,从redis里面获取商品分类
//    $cate_str = $redis->get('cate_str');
    $cate = unserialize($cate_str);
    echo '从redis获取';
}
var_dump($cate);






