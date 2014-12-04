<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-3
 * Time: 上午10:01
 *
 * 字符串的处理方式：
 * 字符串的声明（数据类型）
 *      1、可以使用双引号，也可以使用单引号
 *      双引号中可以解析变量，双引号中可以使用所有的转义字符
 *      2、<<<
 *      分隔，匹配，查找，替换
 *
 * 特点：如果是其他类型的数据，也可以使用字符串处理函数。先将其他类型自动转成字符串后再处理
 * 字符串可以像数组一样，通过下标来访问到每个字符，但不是数组(数组也可以通过{}下标访问成员)
 * 除了有英文字符，还有中文
 */
echo count("aaaaaaaaaaaaaaaaaa");
echo '<br>';
echo strlen("hello");
echo '<br>';
echo strlen(10000);
echo '<br>';
$str = "world";
echo $str[0].$str[1].'<br>';
echo $str{2}.$str{3}.'<br>';
$str2 = "shksgjsdgjsflaskfdsfsdlgfjwgkwgjsgsg";
$s = '';
for($i=0;$i<strlen($str2);$i++) {
    if($i%2==0) {
        $s .=$str2{$i};
    }
}
echo $s.'<br>';

echo strlen("中国");
echo '<br>';

$str3= 'hello';
$str3[2]='world';
var_dump($str3);
echo $str3.'<br>';

$int = 100;
$in = array("one"=>100,"two"=>200);
echo "aaaaaaaaa $int aaaaa {$in['one']} aaaaaa<br>";
echo "aaaaaaaa $int aaaaa".$in["two"]."aaaaaaaa<br>";

class Demo {
    var $one= 100;
}
$d = new Demo();
echo "aaaaaaaa $d->one aaaaaaaaaaa<br>";