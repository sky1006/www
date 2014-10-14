<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-26
 * Time: 上午11:37
 * 数据类型转换及强制类型转换
 * 1、强制转换
 *      var_dump();
 *      getType(变量);
 *      a、setType(变量，类型); ---是将原变量给转换
 *      b、在变量使用时，前面加上类型符号， 转---是在赋值时给新变量一个新类型，
 *          原变量类型不变.$b = (int)$int;
 *      c、intval(),floatval(),strval();
 * 2、自动转换
 *
 */
$int = "1000";
settype($int, "string");
echo gettype($int), "<br>";

$a = $int;
echo gettype($a), "<br>";
$b = (int)$int;
echo gettype($b), "<br>";

$c = intval($int);
echo gettype($c), "<br>";

$d = floatval($int);
echo gettype($d), "<br>";

$e = 10;
$f = 24.5;

$g = $e + $f;
var_dump($g);

$h = 100;
$i = (float)$h;

var_dump($i);

if (is_null($a)) {

}

if (is_string($a)) {

}