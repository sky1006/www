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
 *
 *      只要是对象中的成员，就必须使用这个对象来访问到这个对象内部的属性和方法
 *
 * 构造方法
 * 1、是对象创建完成以后，第一个自动调用的方法（特殊）
 * 2、方法名称比较特殊，可以和类名相同名的方法名
 * 3、给对象中的成员赋初值使用的
 *
 * 魔术方法 __construct();
 *
 * 析构函数是PHP5新添加的内容，在对象被销毁之前自动调用的方法，主要执行一些特定的操作，如关闭文件，释放结果集
 *      __destruct() -- 不能带任何参数
 *
 */
class BoyFriend
{
//标记属性--变量（成员属性）
    var $name;
    var $age;
    var $sex;
    var $height;
    var $eye;

/*    function BoyFriend($name,$age,$sex="男") {
        $this->name=$name;
        $this->age=$age;
        $this->sex=$sex;
    }*/

    function __construct($name,$age,$sex="男") {
        $this->name=$name;
        $this->age=$age;
        $this->sex=$sex;
    }
//标记行为--函数（成员方法）
    function doFan()
    {
        echo "{$this->name} 有做饭功能<br>";
        $this->doJw();
    }

    function doJw()
    {
        echo "做家务功能<br>";
    }

    function __destruct() {
        echo "{$this->name} 再见！<br>";
    }
}

$bf1 = new BoyFriend("小燕子",28);
$bf2 = new BoyFriend("笨蛋",29,"男");
//$bf1 -> name= "张三";
//$bf2->name= "李四";
echo $bf1 -> doFan();
echo $bf2 -> doFan();
//echo $bf1->sex . '<br>';
//echo $bf2->height.'<br>';
//echo $bf1->name . '<br>';
//$bf1 = null;
