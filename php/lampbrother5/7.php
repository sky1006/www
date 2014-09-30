<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-30
 * Time: 下午4:01
 * 匿名函数：也叫闭包函数（closures），允许临时创建一个没有指定名称的函数
 */
$var = function($a,$b,$c){
    return $a+$b+$c;
    echo("11111");
};  //一定要加分号（：）结束
echo $var(3,5,76);
/*function fname($a,$b,$c)
{
    return $a+$b+$c;
}
$var = "fname";
echo $var(1,3,4);*/


