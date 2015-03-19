<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/19
 * Time: 15:29
 *
 * memcache分布式存取
 *
 */
//创建memcache对象
$mem = new Memcache();

//连接memcache服务器
//$mem->addserver("localhost", 11211);
$mem->addserver("115.28.100.155", 11211);

class Test
{
    public $a = 1;
    public $b = 2;
    public $c = 3;
}

//操作
$mem->add("one", "this is memcache test!", MEMCACHE_COMPRESSED, time() + 60 * 60 * 24 * 31);
$mem->add("two", array("111", "222", "333"), MEMCACHE_COMPRESSED, 0);
$mem->add("three", new Test(), MEMCACHE_COMPRESSED, 0);
$mem->add("four", 100, MEMCACHE_COMPRESSED, 0);

$mem->set("five", "this is demo!", MEMCACHE_COMPRESSED, 100);


/*var_dump($mem->get("one"));
echo '<br>';
var_dump($mem->get("two"));
echo '<br>';
var_dump($mem->get("three"));
echo '<br>';
var_dump($mem->get("four"));
echo '<br>';
var_dump($mem->get("five"));
echo '<br>';*/

//var_dump($mem->get(array("one","four")));

//$mem->delete("one");
var_dump($mem->getstats());
//关闭连接
$mem->close();