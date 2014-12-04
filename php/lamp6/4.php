<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-10-11
 * Time: 下午2:26
 * 数组的相关处理函数
 * 数组的键/值操作函数
 */
$lamp = array("os" => "linux", "webserver" => "Nginx", "db" => "MySQL", "language" => "PHP");
print_r($lamp);
echo '<br>';
//$arr = array_values($lamp);
print_r(array_values($lamp));
echo '<br>';
list($os, $webserver, $db, $language) = array_values($lamp);
echo $os . '<br>';
echo $webserver . '<br>';
echo $db . '<br>';
echo $language . '<br>';

print_r(array_keys($lamp, "Nginx"));
echo '<br>';

if (in_array("MySQL", $lamp)) {
    echo "在数组中";
} else {
    echo "不在数组中";
}
echo '<br>';
echo array_search("MySQL", $lamp);
echo '<br>';

if (array_key_exists("db", $lamp)) {
    echo "键在数组中";
} else {
    echo "键不在数组中";
}
echo '<br>';
if (isset($lamp['hello'])) {
    echo "键在数组中";
} else {
    echo "键不在数组中";
}
echo '<br>';

$arr = array_flip($lamp);
print_r($arr);
echo '<br>';

print_r(array_reverse($lamp));
echo '<br>';

/*
 * 统计 数组元素的个数与唯一性的函数
 */
echo count($lamp) . '<br>';
$web = array(
    "lamp" => array("os" => "linux", "webserver" => "Nginx", "db" => "MySQL", "language" => "PHP"),
    "JavaEE" => array("os" => "Unix", "webserver" => "Tomcat", "db" => "Oracle", "language" => "JSP")
);
echo count($web, 1) . '<br>';

$lamp2 = array("os" => "linux", "linux", "webserver" => "Nginx", "Nginx", "db" => "MySQL", "language" => "PHP");
print_r(array_count_values($lamp2)); //统计数组中所有值出现的次数
echo '<br>';

print_r(array_unique($lamp2)); //移除数组中重复的值
echo '<br>';

/*
 * 使用回调函数处理数组的函数
 * array_filter 用回调函数过滤数组中的单元
 */
$arr2 = array(1, 2, -3, "", null, 4, 84, 5, 6, 7, 8, 9, 9, 5, 0);
print_r($arr2);
echo '<br>';
var_dump(array_filter($arr2));
function myfun($value)
{
    if ($value >= 0) {
        return true;
    } else {
        return false;
    }
}

var_dump(array_filter($arr2, "myfun"));

var_dump(array_filter($arr2, function ($value) {
    return !($value % 2 == 0);
}));

var_dump(array_values(array_filter($arr2, function ($value) {
    return !($value % 2 == 0);
})));

/*
 * array_walk() 对数组中的每个成员应用用户函数
 * bool array_walk  ( array &$array  , callable  $funcname  [, mixed  $userdata  = NULL    ] )
 */
$arr3 = array(1, 2, 3, 4);
function a3(&$value)
{
    $value = $value * $value;
}

print_r($arr3);
echo '<br>';
array_walk($arr3, "a3");
print_r($arr3);
echo '<br>';

$arr4 = array("one" => 1, "two" => 2, "three" => 3, "four" => 4);
function a4($value, $key)
{
    echo "{$key} =====> {$value} <br>";
}

print_r($arr4);
echo '<br>';
array_walk($arr4, "a4");
print_r($arr4);
echo '<br>';

array_walk($arr4, function ($value, $key, $str) {
    echo "{$key} {$str} {$value} <br>";
}, "########");
echo '<br>';

/*
 * array_map()  将回调函数作用到给定数组的单元上
 * array array_map  ( callable  $callback  , array $arr1  [, array $...  ] )
 */
$arr5 =array(1,2,3,4,5);
$brr = array("one","two","three","four","five");
print_r($arr5);
echo '<br>';
function a5($v,$bv) {
   // return $v*$v*$v;
    echo "$v --- $bv <br>";
    return 1;
}
$rar = array_map("a5",$arr5,$brr);

print_r($rar);
echo '<br>';

$rar2 = array_map(null,$arr5,$brr);
echo '<pre>';
print_r($rar2);
echo '</pre>';