<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-3
 * Time: 下午2:17
 * 常用的字符串输出函数
 *  var_dump();
 *  print_r();
 *  echo() -- 输出字符串，无返回值，指令方式可以打印多个参数
 *  print() -- 输出一个字符串,有返回值
 *  die() ; -- 输出一条消息，并退出当前脚本； exit()   -- 输出并退出程序
 */
$str = "hello world";
$str1 = "燕子，回来吧";
echo substr($str, 0, 7) . '<br>';
echo mb_substr($str1, 0, 5, "utf-8") . '<br>';

echo "aaaaaaa<br>";
echo("bbbbbbbbbb<br>");
print "ccccccccc<br>";
print("dddddddddd<br>");

/*
 * printf() -- 输出格式化字符串
 * sprintf() -- 把格式化的字符串写入一个变量中
 */
$int = 100.678;
//echo chr($int);
printf("%s,%3.2f,%u,%e,%b,%%,%d,%c",$int,$int,$int,$int,$int, $int, $int, $int);
echo '<br>';
$st = sprintf("%s,%3.2f,%u,%e,%b,%%,%d,%c",$int,$int,$int,$int,$int, $int, $int, $int);
echo $st.'<br>';