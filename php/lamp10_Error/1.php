<?php
//error_reporting(E_ALL & ~E_NOTICE);
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-17
 * Time: 下午3:36
 */
//在php中注册一个函数，来处理错误报告，而不按原来的方式处理了
set_error_handler("myerrorfun");
//自己的错误报告处理函数
$mess = "";
function myerrorfun($error_type, $error_message, $error_file, $error_line)
{
    global $mess;
    $mess .= "发生错误级别为{$error_type}类型，错误消息<b>{$error_message}</b>,在文件<font color='red'>{$error_file}</font>中，第{$error_line}行。<br>";

}

getType($a);
echo "11111111111111<br>";
getType();
echo "2222222222<br>";
//gettype3();
echo "3333333<br>";

echo "-----------------------------------<br>";
echo $mess;





