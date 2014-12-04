<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-25
 * Time: 下午4:51
 * 字符串 string
 * 1、一个字符和多个字符都是字符串（PHP）
 * 2、声明一个字符串必须使用 单引号或双引号包含
 * 3、字符串没有长度限制 "" " " "无限长"
 * 4、在单引号中可使用双引号，在双引号中也可以使用单引号；
 * 5、在单引号中不能再使用单引号，在双引号中不能再使用双引号；
 * 6、可以使用转义字符\
 *
 * 单引号和双引号的区别
 * 1、在双引号中可以解析变量，而在单引号中不能解析变量；
 * 2、在双引号中可以使用转义字符\n \t \r，在单引号中不能使用转义字符（在单引号中只能转义单引号自己，
 * 还可以转义转义符号本身）；
 *
 * 定界符声明字符串
 * 1、使用<<<小于号
 * 2、在开始的定界符（自定义的字符串中）一定要左边挨着<<<，写完定界的字符串，一定要直接回车（空格都不可以）；
 * 3、在结尾的字符串定界中，一定要顶格写，和开始的字符串要一致，并直接回车；
 * 4、使用''在开始的定界符号中，将支持双引号的功能，改成了单引号的功能
 */
$str = 'a';
$str1 = "this is a string";
//$str2 = 'this is a 'demo'';
$str3 = "this is a 'demo'";
echo $str3, "<br>";

$int = 10;
$str4 = "this $int is a demo";
$str5 = "this {$int} is a demo";
$str6 = "this ${int} is a demo";
echo $str4, "<br>";
echo $str5, "<br>";
echo $str6, "<br>";

$str7 = <<<hello
skjkalfjlsbafggdsfhksajfhiegjsakgglsjdgkdsjk
skjkalfjlsba'fggdsf'hksajfhiegjsakgglsjdgkds
skjkalfjlsbafggd"sfhksa"jfhiegjsakgglsjdgkds
fksadlfsdjfjgkjgqjrlkjgkljglfajf\n
this $int is a d\temo
hello;
echo $str7, "<br>";

$str8 = <<<'st'
this $int is a d\temo;
st;
echo $str8, "<br>";