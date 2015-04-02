<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/2
 * Time: 14:47
 */

//开启会话session
$sid = !empty($_GET[session_name()]) ? $_GET[session_name()] : '';
if ($sid != '') {
    session_id($sid);
}
//可以设置一下用已有的sid开启会话
session_start();

//多余的
$username = $_SESSION['username'];

//unset($_SESSION['username']);

//就可以删除数组中的所有内容，即session对应的这个用户文件的内容空了
$_SESSION = array();

//3、删除客户端cookie中的sessionid
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), "", time() - 3600, "/");
}


//4、销毁session
session_destroy();

echo "再见:{$username}";

/*
 * php.ini
 * session.gc_probability=1
 * session.gc_divisor=10
 * session.gc_probability/session.gc_divisor    启动垃圾回收机制的概率；建议值为（1/1000～5000）
 * session.gc_maxlifetime=15    设置过期session时间，最大保留15秒
 * session.cookie_lifetime=0    关闭浏览器相应的cookie文件即被删除
 */