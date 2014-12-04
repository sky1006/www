<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-21
 * Time: 上午11:08
 * 对象串行化
 *
 */
include "toString.php";
$p = new Person("张三",10,"男");
//将对象串行化
$str = serialize($p);
//将字符串保存在文件objstr.txt中
file_put_contents("objstr.txt",$str);
echo "对象转完字符串，保存到文件中成功！<br>";