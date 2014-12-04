<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-10-13
 * Time: 下午4:47
 * 拆分、合并、分解与结合数组
 */
$arr1 = array("a","b","c","d","e");
$narr1 = array_slice($arr1,2,2,true);
print_r($narr1);
echo "<br>--------------------------------<br>";

$arr2 = array("a","b","c","d","e");
array_splice($arr2,2,2,array("hello","world"));
print_r($arr2);
echo "<br>--------------------------------<br>";

$arr3 = array("os","webserver","db","language","e");
$arr4 = array("Linux","apache","mysql","php","d");
$na = array_combine($arr3,$arr4);
print_r($na);
echo "<br>--------------------------------<br>";

//下标相同的会覆盖，是前面的覆盖后面的
$arr5 = array("a","b","c","d","e");
$arr6 = array(6=>10,23,3,4,5);
$sa = array_merge($arr5,$arr6);
var_dump($sa);
echo "<br>--------------------------------<br>";

$arr7 = array(10,11,12,13,14);
$arr8 = array(9,12,13,15,16);
print_r(array_intersect($arr7,$arr8));
echo "<br>--------------------------------<br>";

$arr9 = array(1,2,10,11,12,13,14);
$arr10 = array(1,2,9,12,13,15,16);
$min = (count($arr9)>count($arr10)) ? count($arr10):count($arr9);
$nar = array();
for ($i=0;$i<$min;$i++) {
    if ($arr9[$i] == $arr10[$i]) {
        $nar[] = $arr9[$i];
    }else {
        break;
    }
}
print_r($nar);
echo "<br>--------------------------------<br>";

$arr11 = array(1,2,10,11,12,13,14);
$arr12 = array(1,2,9,12,13,15,16);
print_r(array_diff($arr11,$arr12));