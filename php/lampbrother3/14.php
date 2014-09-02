<?php
error_reporting(E_ALL & ~E_NOTICE);
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-27
 * Time: 下午4:24
 * PHP的运算符号
 * 1        +       1
 * 运算元  运算符 运算元
 * 一元运算符 +1 -1  ++  --
 * 二元运算符    +   -   *   /   %   <   >   =   ==
 * 三元运算符    1 ? 2 :3
 * 算术运算符号   +   -   *   /   %   ++  --
 * 赋值运算符号   =   +=  -=  /=  %=  .=
 * 比较运算符号   >   <   ==  >=  <=  !=  !==
 * 逻辑运算符号   &&  ||  !
 * 位运算符和    &   |   ^   ~   >>  <<
 * 其他运算符号   ?   :   =>  ->
 *
 */

/*
 * 算术运算符号   +   -   *   /   %   ++  --
 * 在其他语言中（不是PHP中），+号除了有加法的作用，还有连接字符串的功能
 * % -- 1、让一个数不超过一个值；2、求什么被整除 if ($num%4==0);PHP中的%是将小数转为整数再求模
 */
$a = 10;
$b = 20;

echo $a * $b, "<br>";
echo $a / $b, "<br>";
echo 13 % 2, "<br>";
echo 13.568 % 2.23548, "<br>";
/* ++  自增-
 * --
*/
$a1 = 5;
$a1++; //先用再加
++$a1; //先加再用
echo $a1, "<br>"; // 7
//7      9
$b1 = $a1++ + ++$a1;
echo $b1, "<br>"; //16
echo $a1 . "<br>";

$a2 = true;
$a2++;
var_dump($a2);

/*
 * 赋值运算符号   =   +=  -=  *=  /=  %=  .=
 */
$a2 = 5;
$name = "meizi";
$a2 += 1; //$a2 = $a2+1;
$a2 -= 1; //$a2 = $a2-1;
$str = "妹子";
$str1 = "漂亮";
echo "这个变量的值：" . $str . $str1 . $a2 . "<br>";
echo "这个变量的值：$str$str1$a2<br>";
$str .= "是";
$str .= "胖子";
echo $str . "<br>";

$html = '<html>';
$html .= '<body>';
$html .= "<h1>这是标题</h1>";
$html .= '</body>';
$html .= '</html>';
echo $html . "<br>";

/*
 * 比较运算符号   >   <   ==  >=  <=  !=  !==    ===
 * 1、比较后的结果是一个boolean值，用在if和while等语句中    4>3  true
 * === 全等于；两边值相等并且类型相等返回true
 * == 等于；两边操作数相同返回true
 */
$a3 = "007";
$b3 = 7;
var_dump($a3 == $b3);
var_dump($a3 === $b3);

/*
 * 逻辑运算符号   &&  ||  !
 * 特性：短路
 */
var_dump(true && false && true);
$year = 2016;
if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
    echo "这个年{$year} 是闰年" . "<br>";
} else {
    echo "是平年" . "<br>";
}

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully' . "<br>";
mysql_close($link);
// die("输出并退出程序！");
echo "11111111" . "<br>";
/*
 * 位运算符   &   |   ^   ~   >>  <<
 * 按位运算
 *  & -- 两个操作都为1，结果为1，否则为0； 有0出0
 *  | -- 两个操作都为0，结果为0，否则为1； 有1出1
 *  ^ 异或 -- 同为0，异为1；
 */
var_dump(12 & 13);
var_dump('A' & 'a');
$a4 = 3;
$b4 = 5;
if ($a4 > 5 & $b4++ < 100) { // 不短路

}
echo $b4 . "<br>";
var_dump(0 | 0);