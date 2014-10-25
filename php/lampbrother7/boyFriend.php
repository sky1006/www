<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-10-20
 * Time: 下午4:05
 * 属性
 *      性别：男
 *      年龄：24
 *      身高：175cm
 *      眼睛：大
 * 行为
 *      做饭
 *      做家务
 *
 * 注意：在类的成员属性前面一定要有个修饰词，如果不知道使用什么修饰词，就用var（关键字），如果一旦
 * 有其他的修饰词就不要有var
 */
class BoyFriend
{
//标记属性--变量（成员属性）
    var $name = "yinqiang";
    var $age = 24;
    var $sex = "男";
    var $height = "170cm";
    var $eye = "big";

//标记行为--函数（成员方法）
    function doFan($rou, $cai)
    {
        return "做饭功能<br>";
    }

    function doJw()
    {
        return "做家务功能<br>";
    }

}

$bf1 = new BoyFriend();
$bf1 -> name= "张三";
$bf2 = new BoyFriend();
$bf2->name= "李四";
echo $bf1->sex . '<br>';
echo $bf2->height.'<br>';
echo $bf1->name . '<br>';

echo $bf1->doFan("牛肉","土豆");