<?php
/** 可变变量
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-19
 * Time: 下午4:53
 */
$hello = "world";
$$hello = "你好";
$$$hello = "age";
$$$$hello = "sex";

echo $hello, "<br>"; //world
echo $$hello, "<br>"; //你好
echo $world, "<br>"; //你好
echo $$$hello, "<br>"; //age
echo $$$$hello, "<br>"; //sex
echo $age, "<br>"; //sex

