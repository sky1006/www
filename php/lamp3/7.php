<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-19
 * Time: 下午5:35
 * 变量的类型
 * 四种标量类型：布尔型（boolean）；整型（integer）；浮点型（float）也做double；字符串（string）；
 * 两种复合类型：数组（array）；对象（object）；
 * 两种特殊类型：资源（resource）；NULL；
 */
echo "以下是4种标量：<br>";
$var = true;

var_dump($var); //bool
echo "<br>";


$var = 10;

var_dump($var); //int
echo "<br>";


$var = 10.12;

var_dump($var); //float
echo "<br>";


$var = "hello world";

var_dump($var); //string
echo "<br>";

echo "以下是两种复合类型：<br>";

$var = array("one", "two", "three");

var_dump($var); //array
echo "<br>";


class demo
{
    var $one = 10;
    var $two = 20;
    var $three = 30;
}

$var = new demo;

var_dump($var); //object
echo "<br>";

echo "以下输出两种特殊类型：<br>";
$link = mysql_connect("localhost", "root", "");

var_dump($link); //resource
echo "<br>";
if ($link) {
    echo "这个变量是真值";
} else {
    echo "这个变量是假值";
}

$link = null;

var_dump($link); //null
echo "<br>";
