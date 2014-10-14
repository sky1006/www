<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-10-10
 * Time: 下午5:34
 * 超全局数组（预定义变量），在PHP的脚本中，已经声明完的变量，你可以直接去使用即可
 * 变量的名字已经规定好的了
 * $_SERVER     服务器变量       HTTP_SERVER_VARS
 * $_ENV        环境变量         HTTP_ENV_VARS
 * $_GET        http get变量      HTTP_GET_VARS
 * $_POST       http post变量
 * $_REQUEST    request变量
 * $_FILES      http文件上传变量
 * $_COOKIE     http cookies
 * $_SESSION    session变量
 * $GLOBALS     global变量
 *  超   全局  数组
 * 1、数组（关联数组），就和你自己声明的数组是一样的操作方式
 * 2、全局
 * 3、每个预定义的数组都有自己独特的能力
 */
/*echo count($_SERVER).'<br>';
foreach ($_SERVER as $key => $value) {
    echo "{$key} => {$value}<br>";
}*/
$_GET = array("妹子","崇明");
function demo() {
    echo $_GET[0]."和".$_GET[1].'<br>';
    $_GET['username'] = "admin";
}
demo();
print_r($_GET);
echo "+++++++++++++--------------+++++++++++++++++++++++++++++++<br>";
echo $_SERVER['HTTP_USER_AGENT'].'<br>';
/*echo '<pre>';
print_r($_SERVER);
echo '</pre>';*/
function getip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'].'<br>';
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'].'<br>';
    }else if (!empty($_SERVER['REMOTE_ADDR'])) {
        return $_SERVER['REMOTE_ADDR'].'<br>';
    } else {
        return '未知IP';
    }
}
echo getip();
print_r($_ENV);
echo '<br>';
echo "+++++++++++++--------------+++++++++++++++++++++++++++++++<br>";
/*
 * $_GET 接收用户通过URL想服务器传的参数 get
 * $_POST 接收用户通过http协议向服务器传的参数 http post
 * $_REQUEST
 */
setcookie("name","燕子",time()+3600,"/");
print_r($_COOKIE);
echo '<br>';
echo "+++++++++++++--------------+++++++++++++++++++++++++++++++<br>";
session_start();
$_SESSION['name']="hello";
print_r($_SESSION);
echo '<br>';
echo "+++++++++++++--------------+++++++++++++++++++++++++++++++<br>";
echo '<pre>';
print_r($GLOBALS);
echo '</pre>';
echo "+++++++++++++--------------+++++++++++++++++++++++++++++++<br>";
