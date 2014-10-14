<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-19
 * Time: 下午4:11
 */
/*
  * 1.变量名字以 $ 开始
  * 2.变量的名称声明时一定要有意义
  * 3.不合法的变量名：不能以数字开头，不能有运算符号（关键字可以作为php的变量名使用）
 * 4.变量名严格区分大小写(驼峰式命名方式)one two three $oneTwoThree
 * empty()  unset()  isset()  var_dump()
  */
$name = "毕福剑";
$age = 20;

$int = 10;
$INT = 20;

echo $int, "<br>";
echo $INT, "<br>";
$a = $b = $c = $d = 10;
var_dump(10);
$bool = isset($a);
var_dump($bool);

unset($c);
$bool = isset($c);
var_dump($bool);

var_dump(empty($a));
/*
 * if(isset($w) {
 *
 * }else {
 *
 *
 * }
 *
 * */

