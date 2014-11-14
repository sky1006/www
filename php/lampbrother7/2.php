<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-10-20
 * Time: 下午4:02
 * 只看封装的一部分，方法的封装
 *      将一些“特殊的方法”，加上一个关键字 private修饰,就不能拿到这个对象之后，用对象中private有的内容，
 *      但对象自己中的其他成员可以使用这个，因为是自己的成员
 *
 *
 *
 */
class Person
{
    //成员属性
    var $name;
    var $age;
    var $sex;

    //构造方法
    function __construct($name, $age, $sex)
    {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
    }

    //成员方法
    private function say()
    {
        echo "我的名子是：{$this->name},我的年龄是：{$this->age},我的性别是：{$this->sex} <br>";
    }

    function run()
    {
        $this->left();
        $this->left();
        $this->right();
        $this->right();
        $this->go();
        $this->go();
        $this->go();
    }
    private function  left() {
        echo "迈左脚<br>";
    }
    private function  right(){
        echo "迈右脚<br>";
    }
    private function go() {
        echo "前进<br>";
    }
    function eat()
    {
        $this->say();
    }

    //析构方法
    function __destruct()
    {
        echo "再见：{$this->name} <br>";
    }
}

$p1 = new Person("燕子", 29, "女");
//echo $p1->name;
$p1->age = 28;
echo $p1->eat();
echo $p1->run();
