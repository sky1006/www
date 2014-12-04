<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-4
 * Time: 上午10:30
 * 字符串比较函数
 *  1、使用等号比较字符串（常见）
 *      注意：如果是不区分大小写的进行比较，两个比较的字符串要么都转成大写，要么都转成小写
 *  2、字符比较
 *      strcmp()
 *      strcasecmp()
 *  3、按自然顺序比较
 *      strnatcmp()
 *      strnatcasecmp()
 */
$str1 = "abc";
$str2 = "Abc";
if (strtoupper($str1) == strtoupper($str2)) {
    echo "相等";
} else {
    echo "不相等";
}
echo '<br>';
if (strcmp($str1, $str2) == 0) {
    echo "相等" . '<br>';
} else {
    echo "不相等" . '<br>';
}

switch(strcmp($str1,$str2)) {
    case 0:
        echo "第一个字符串$str1 等于 第二个字符串 $str2".'<br>';break;
    case -1:
        echo "第一个字符串$str1 小于 第二个字符串 $str2".'<br>';break;
    case 1:
        echo "第一个字符串$str1 大于 第二个字符串 $str2".'<br>';break;
}

switch(strcasecmp($str1,$str2)) {
    case 0:
        echo "第一个字符串$str1 等于 第二个字符串 $str2".'<br>';break;
    case -1:
        echo "第一个字符串$str1 小于 第二个字符串 $str2".'<br>';break;
    case 1:
        echo "第一个字符串$str1 大于 第二个字符串 $str2".'<br>';break;
}

$str3 = "file11.txt";
$str4 = "file2.txt";
switch(strnatcasecmp($str3,$str4)) {
    case 0:
        echo "第一个字符串$str3 等于 第二个字符串 $str4".'<br>';break;
    case -1:
        echo "第一个字符串$str3 小于 第二个字符串 $str4".'<br>';break;
    case 1:
        echo "第一个字符串$str3 大于 第二个字符串 $str4".'<br>';break;
}

$arr = array("File1.txt","file2.txt","file11.txt","file12.txt");
usort($arr,"strcmp");
print_r($arr);
echo '<br>';
usort($arr,"strnatcmp");
print_r($arr);
echo '<br>';

