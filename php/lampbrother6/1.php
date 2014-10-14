<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-10-8
 * Time: 下午5:03
 * 数组的概述
 * 数组声明：
 * 1、直接赋值的方式声明数组；
 *      一个数组中存的是多个内容，数组中的内容叫做“元素”；每个元素都是由 键和值 组成的 key/value key--下标
 *      $a = array("one"=>"11111","two"=>"2222");  通过key使用值
 *      下标有两种类型：一种是整数(索引数组），一种是字符串（关联数组）
 *      []来操作下标，也可以使用{}进行互换,建议使用[]来指定下标
 *      在使用下标时，如果是关联数组，一定要使用引号，不要使用常量名称
 *      数组的自动增长下标，默认是从0开始的，自动增长的都是出现过的最大值加1；
 *      关联数组的字符串下标，不会影响索引下标的排列规则！
 */
/*$arr[0] = 1;
$arr[1] = 2;
$arr[2] = 3;*/
$arr['one'] = 1;
$arr['two'] = 2;
$arr['three'] = 3;
print_r($arr);
echo "<br>" . $arr{'one'};

/*
 * 2、使用array()函数声明数组,默认是索引的下标，是从0开始的；
 *  使用=>符合指定下标
 *  php5.4以后，可以像其他语言一样声明数组了
 */
$a = array();
for ($i = 0; $i < 10; $i++) {
    $a[] = $i * $i;
}
echo '<pre>';
print_r($a);
echo '</pre>';

$arr = array("aaa", "two" => "bbb", 8 => "ccc", "ddd");
print_r($arr);
echo "<br>";
$arr2 = [1, 2, 3, 4, 5, 6, "ttt", "hhhh"];
print_r($arr2);
echo "<br>";

function demo()
{
    return array("one", "two", "three");
}

echo demo()[1];
echo "<br>";

/*
 *unset()函数允许删除数组中的某个键，但要注意数组将不会重建索引。如果需要删除后重建索引，
 * 可以用array_values()函数。
 */
$b = ["aa", "bb", "cc", "dd"];
unset($b[2]);
$b = array_values($b);
/*if (isset($b[2])) {
    echo "存在";
}else {
    echo "不存在";
}*/
print_r($b);
echo "<br>";

function xdw($m, $n)
{
    $arr = array();
    $a1 = "a";
    for ($i = 0; $i < $m; $i++) {
        $arr[] = $a1++;
    }
    //print_r($arr);
    $i = 0;
    while (count($arr) > 1) {
        if ($i % $n == 0) {
            unset($arr[$i]);
        } else {
            $arr[] = $arr[$i];
            unset($arr[$i]);
        }
        $i++;
    }
    return $arr;
}

print_r(xdw(40, 7));

/*
 * 二维数组（数组的数组）的声明与应用
 *
 */
$a1 = array("name" => "zs", "age" => 23, "sex" => "女", "email" => "aa@ddd.com");
$a2 = array("name" => "ls", "age" => 24, "sex" => "女", "email" => "bb@ddd.com");
$a3 = array("name" => "ww", "age" => 22, "sex" => "男", "email" => "cc@ddd.com");

$a4 = array($a1, $a2, $a3);
var_dump($a4[1]);

$a5 = array(
    array("name" => "zs", "age" => 23, "sex" => "女", "email" => "aa@ddd.com"),
    array("name" => "ls", "age" => 24, "sex" => "女", "email" => "bb@ddd.com"),
    array("name" => "ww", "age" => 22, "sex" => "男", "email" => "cc@ddd.com")
);
var_dump($a5);
echo $a5[1]['email'];
echo "<br>";

/*
 * 三维数组
 */
$class = [
    [
        ["name" => "zs", "age" => 23, "sex" => "女", "email" => "aa@ddd.com"],
        ["name" => "ls", "age" => 24, "sex" => "女", "email" => "bb@ddd.com"],
        ["name" => "ww", "age" => 22, "sex" => "男", "email" => "cc@ddd.com"]
    ],
    [
        ["name" => "zs", "age" => 23, "sex" => "女", "email" => "aa@ddd.com"],
        ["name" => "ls", "age" => 80, "sex" => "女", "email" => "bb@ddd.com"],
        ["name" => "ww", "age" => 22, "sex" => "男", "email" => "cc@ddd.com"]
    ],
    [
        ["name" => "zs", "age" => 23, "sex" => "女", "email" => "aa@ddd.com"],
        ["name" => "ls", "age" => 24, "sex" => "女", "email" => "bb@ddd.com"],
        ["name" => "ww", "age" => 22, "sex" => "男", "email" => "cc@ddd.com"]
    ]
];
echo '<pre>';
print_r($class);
echo '</pre>';
echo "<br>";
echo $class[1][1]['age'];
