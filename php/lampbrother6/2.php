<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-10-9
 * Time: 下午5:28
 * 数组的遍历
 * 使用for语句循环遍历数组：保证数组一定要是下标连续的索引数组
 * 优点：效率最高，就是数组的访问方式，只不过通过循环去取值
 *      count(数组)获取数组的长度，是数组的实际元素的个数
 * 不足：数组下标不一定是连续的；关联数组for不能遍历出值；
 */
$arr = array("aa", "bb", "cc", "dd", "ee", "ff", "gg", "hh", "ii");
$nums = count($arr);
for ($i = 0; $i < $nums; $i++) {
    echo $i . '、' . $arr[$i] . '<br>';
}
echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";
/*
 * 使用foreach语句遍历数组
 * foreach()语法：
 *  1、foreach（数组 as 自定义变量）{ }
 *  数组有多少个元素，foreach就循环多少次;foreach会将数组中的元素，在每次循环中，依次将元素的值给自定义变量，
 *  在每次循环中用到这个变量，即用到了当前的数组中的元素
 *  2、foreach（数组 as 下标变量 => 值变量）{ }
 */
$arr1 = array("aa", "bb", "cc", "three" => "dd", 9 => "ee", "ff", "gg", "hh", "ii");
foreach ($arr1 as $value) {
    echo "####{$value}<br>";
}
echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";

$arr2 = array("aa", "bb", "cc", "three" => "dd", 9 => "ee", "ff", "gg", "hh", "ii");
foreach ($arr2 as $ke => $va) {
    echo "{$ke}====>{$va}<br>";
}
echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";
$group = [
    ["name" => "zs", "age" => 23, "sex" => "女", "email" => "aa@ddd.com"],
    "price" => 890,
    ["name" => "ls", "age" => 24, "sex" => "女", "email" => "bb@ddd.com"],
    ["name" => "ww", "age" => 22, "sex" => "男", "email" => "cc@ddd.com"],
    ["name" => "zs", "age" => 23, "sex" => "女", "email" => "aa@ddd.com"],
    ["name" => "ls", "age" => 24, "sex" => "女", "email" => "bb@ddd.com"],
    ["name" => "ww", "age" => 22, "sex" => "男", "email" => "cc@ddd.com"],
    ["name" => "zs", "age" => 23, "sex" => "女", "email" => "aa@ddd.com"],
    ["name" => "ls", "age" => 24, "sex" => "女", "email" => "bb@ddd.com"],
    ["name" => "ww", "age" => 22, "sex" => "男", "email" => "cc@ddd.com"]
];
/*echo '<pre>';
print_r($group);
echo '</pre>';*/
echo '<table border="1" width="800" align="center">';
echo '<caption><h1>数组转为表格</h1></caption>';
foreach ($group as $k => $row) {
    echo '<tr>';
    if (is_array($row)) {
        foreach ($row as $col) {
            echo '<td>' . $col . '</td>';
        }
    } else {
        echo '<td colspan="4">' . $k . ':' . $row . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";

/*
 * 联合使用list()循环遍历数组
 *  list()函数，但这个函数和其他函数用法不同。作用：将数组中的元素转为变量使用
 *      1、等号左边使用list()函数，等号右边只能是一个数组
 *      2、数组中有几个元素，在list()中就用几个参数，而且参数必须是变量（新声明的自定义变量），不能是值
 *      3、只能将索引数组（下标是连续的），转为变量，是按下标0开始找的
 *      4、可以在list()参数中通过空项选择性的接收数组中的元素
 */
list($a, , $c) = array("sfsfs", "dklsg", "skdfjsfgjlg");
echo $a . '<br>';
//echo $b.'<br>';
echo $c . '<br>';
echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";

/*
 * 使用each()循环遍历数组
 * each()只是一个函数，参数就是一个数组作为参数,返回的值也是一个数组
 *      1、返回的值是一个数组，数组固定有4个元素，而且下标也是固定的，1（值）--value（值）  0（下标）-- key（下标）
 *      2、each()只处理当前的元素（默认是第一个元素），将当前的元素转为数组信息，处理完后，指针向下一个元素移动
 *      3、如果指针已经在结束位置了，如果再使用each()获取元素，返回false
 */
$arr3 = array("aa", "bb", "cc");
echo '<pre>';
$one = each($arr3);
print_r($one);
$one = each($arr3);
print_r($one);
$one = each($arr3);
print_r($one);
$one = each($arr3);
var_dump($one);
echo '</pre>';
echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";

/*
 * 联合使用list()、each()和while循环遍历数组
 */
$arr4 = array("妹子", "龙哥", "Mary", "four");
while ($tmp = each($arr4)) {
    echo "{$tmp[0]} => {$tmp[1]} <br>";
    /*    print_r($tmp) ;
        echo '<br>';*/
}
echo "+++++++++++++--------------+++++++++++++++++++++++++++++++<br>";
$arr5 = array("妹子", "龙哥", "Mary", "four");
while (list($k, $v) = each($arr5)) {
    echo "{$k} => {$v} <br>";
}
echo "+++++++++++++--------------+++++++++++++++++++++++++++++++<br>";
reset($arr5);
$arr5 = array("妹子", "龙哥", "Mary", "four");
while (list(, $v) = each($arr5)) {
    echo " {$v} <br>";
}

echo "+++++++++++++--------------+++++++++++++++++++++++++++++++<br>";
$group1 = [
    ["name" => "zs", "age" => 23, "sex" => "女", "email" => "aa@ddd.com"],
    "price" => 890,
    ["name" => "ls", "age" => 24, "sex" => "女", "email" => "bb@ddd.com"],
    ["name" => "ww", "age" => 22, "sex" => "男", "email" => "cc@ddd.com"],
    ["name" => "zs", "age" => 23, "sex" => "女", "email" => "aa@ddd.com"],
    ["name" => "ls", "age" => 24, "sex" => "女", "email" => "bb@ddd.com"],
    ["name" => "ww", "age" => 22, "sex" => "男", "email" => "cc@ddd.com"],
    ["name" => "zs", "age" => 23, "sex" => "女", "email" => "aa@ddd.com"],
    ["name" => "ls", "age" => 24, "sex" => "女", "email" => "bb@ddd.com"],
    ["name" => "ww", "age" => 22, "sex" => "男", "email" => "cc@ddd.com"]
];
echo '<table border="1" width="800" align="center">';
echo '<caption><h1>数组转为表格</h1></caption>';
//foreach ($group as $k=> $row) {
while (list($key, $rows) = each($group1)) {
    echo '<tr>';
    if (is_array($rows)) {
        //  foreach($row as $col)  {
        while (list(, $col2) = each($rows)) {
            echo '<td>' . $col2 . '</td>';
        }
    } else {
        echo '<td colspan="4">' . $key . ':' . $rows . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
echo "+++++++++++++--------------+++++++++++++++++++++++++++++++<br>";

/*
 * 使用数组的内部指针控制函数遍历数组
 *  next()将指针向后移动
 *  prev()将指针向前移动
 *  end()将指针指向最后一个元素
 *  reset()将指针无条件移至第一个索引位置
 *  key()获取当前下标
 *  current()获取当前值
 */
$arr6 = array("one"=>"妹子","two"=> "龙哥","three"=> "Mary", "four");
next($arr6);
echo "当前位置（默认在第一个）：".key($arr6)."=>".current($arr6)."<br>";
prev($arr6);
echo "当前位置（默认在第一个）：".key($arr6)."=>".current($arr6)."<br>";
end($arr6);
echo "当前位置（默认在第一个）：".key($arr6)."=>".current($arr6)."<br>";
reset($arr6);
echo "当前位置（默认在第一个）：".key($arr6)."=>".current($arr6)."<br>";