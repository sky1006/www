<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-10-13
 * Time: 下午5:22
 * 数组与数据结构
 */
$zhan = array();
array_push($zhan,"1","2","3");
print_r($zhan);
echo "<br>--------------------------<br>";
array_pop($zhan)."<br>";
print_r($zhan);
echo "<br>--------------------------<br>";

$dl = array();
array_unshift($dl,1);
array_unshift($dl,4);
array_unshift($dl,5);
print_r($dl);
array_shift($dl).'<br>';
print_r($dl);
echo "<br>--------------------------<br>";

/*
 * array_rand -- s随机从数组中取出一个或多个单元
 * shuffle -- 将数组打乱
 *
 */
$arr = array("a","b","c","d");
var_dump(array_rand($arr));
echo "<br>--------------------------<br>";
shuffle($arr);
print_r($arr);
echo "<br>--------------------------<br>";
$arr1 =array(1,2,3,4,5,6,7,8);
echo array_sum($arr1);
echo "<br>--------------------------<br>";
$arr2 = range(1,10,3);
print_r($arr2);
echo "<br>--------------------------<br>";
$arr3 = array_fill(0,9,"hello");
print_r($arr3);