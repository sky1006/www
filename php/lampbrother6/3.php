<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-10-10
 * Time: 下午5:34
 * 超全局数组（预定义变量），在PHP的脚本中，已经声明完的变量，你可以直接去使用即可
 * 变量的名字已经规定好的了
 * $_SERVER
 * $_ENV
 * $_GET
 * $_POST
 * $_REQUEST
 * $_FILES
 * $_COOKIE
 * $_SESSION
 * $GLOBALS
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
