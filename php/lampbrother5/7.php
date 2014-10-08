<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-30
 * Time: 下午4:01
 * 匿名函数：也叫闭包函数（closures），允许临时创建一个没有指定名称的函数
 */
$var = function ($a, $b, $c) {
    return $a + $b + $c;
    echo("11111");
}; //一定要加分号（：）结束
echo $var(3, 5, 76);
var_dump($var);
/*function fname($a,$b,$c)
{
    return $a+$b+$c;
}
$var = "fname";
echo $var(1,3,4);*/

/*
 * PHP5.3 后新特性
 * 闭包的两个特点：
 * 1、作为一个函数变量的一个引用-当函数返回时，其处于激活状态
 * 2、一个闭包就是当一个函数返回时，一个没有释放资源的栈区
 * 其实上面两点可以合成一点，就是闭包函数返回时，该函数内部变量处于激活状态，函数所在栈区依然保留
 */
function demo()
{
    $a = 10;
    $b = 20;
    $one = function ($str) use (&$a, &$b) {
        echo $str . "<br>";

        echo $b . "<br>";
        $a++;
        echo $a . "<br>";
    };
    return $one;
    /*    $one('hello,world');
        echo "-----".$a."----";*/
}

$var = demo();
$var("hello,world");
$var("this is a test");
$var("#######");

function f1($fun) {
    echo $fun();
}
f1(function(){
    return "###$$444444";
});
/*$a = 500;
function one(){
    $a = 100;
    echo "1111111111111<br>";
    function two(){
        global $a;
        echo "2222222 {$a} 22222<br>";
    }

    function three(){
        echo "33333333333<br>";
    }
    two();
    three();
}
one();*/

/*
 * PHP闭包的特性并没有太大惊喜，其实用CLASS就可以实现类似甚至强大得多的功能，更不能和js的闭包
 * 相提并论，只能期待PHP以后对闭包支持的改进，不过匿名函数还是挺有用的，比如在使用
 * array_filter($arr,function(){})等之类的函数可以不用在外部声明回调函数了。
 * 目前还不稳定，不适用于正式开发。
 */
