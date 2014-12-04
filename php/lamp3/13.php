<?php
error_reporting(E_ALL & ~E_NOTICE);
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-27
 * Time: 下午3:34
 * 常量的声明和使用
 * 一旦声明，这个常量的值就不会被改变
 * 1、常量是使用函数 define() 声明的
 * 2、如果常量没有声明，则常量名在使用时，会自动转为字符串(效率很低)
 * 3、常量名称，不要加$符号
 * 4、常量名称，默认是区分大小写的，习惯上常量名称全部大写
 * 5、可以使用define()第三个参数来决定是否让这个常量名称区分大小写 true  false
 * 6、常量的值只支持标量数据类型（整型，浮点型，字符串）
 * 7、常量不能使用unset()清除一个常量
 * 8、可以使用defined();判断一个常量是否存在
 */

$a = 10;
$root = "localhost";
define("ROOT", 10, true);

$root = "www.baidu.com";
echo $root, "<br>";

if (defined("ROOT")) {
    echo ROOT + 10, "<br>";
    echo root, "<br>";
} else {
    echo "111111";
}

echo constant("ROOT"), "<br>";
echo ROOT, "<br>";

echo __LINE__, "<br>"; //魔术常量
echo M_PI;
var_dump(get_defined_constants());