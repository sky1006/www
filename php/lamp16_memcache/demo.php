<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/19
 * Time: 15:29
 *
 * memcache是完全在PHP框架内开发的，原生实现，是OO和非OO两套接口并存
 *
 * memcached是使用libmemcached开发的，C写的，效率更高，方法也多，
 *  只支持OO接口，随着libmemcached服务器端的改进，会马上更新。还有个
 *  值得称赞的地方，就是flag不是在操作的时候设置，而是有一个统一的
 *  setOption()
 *
 */
//创建memcache对象
$mem = new Memcache();

//连接memcache服务器
$mem->connect("115.28.100.155", 11211);

class Test
{
    public $a = 1;
    public $b = 2;
    public $c = 3;
}

//操作
/*$mem->add("one","this is memcache test!",MEMCACHE_COMPRESSED,time()+60*60*24*31);
$mem->add("two",array("111","222","333"),MEMCACHE_COMPRESSED,0);
$mem->add("three",new Test(),MEMCACHE_COMPRESSED,0);
$mem->add("four",100,MEMCACHE_COMPRESSED,0);

$mem->set("five","this is demo!",MEMCACHE_COMPRESSED,100);*/


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