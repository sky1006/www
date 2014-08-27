<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-25
 * Time: 下午5:02
 * 数组
 */
$arr = array(1, 2, 3, 4, 5);

/*
 * 对象
 *
 */

class Person
{
    var $name;
    var $age;
    var $sex;

    function say()
    {

    }

    function eat()
    {

    }
}

$person = new Person();

/*
 * 资源
 */
$file = fopen("text.txt", "r");
echo fread($file, 100);
fclose($file);

/*
 * null = unset()
 */

/*
 * 伪类型 number（说明一个参数可以是integer或float）
 * mixed(说明一个参数可以接受多种不同的类型)
 * callback(可以传函数)
 *
 * demo(mixed $a)  可以传任何类型的数据
 * 功能：是两个数相加
 * @param number $a 这是第一个数
 * @
 */
function add($a, $b)
{
    return $a + $b;
}

