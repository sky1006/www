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
 *魔术方法：
 * __get()
 *      1、自动调用，是在直接访问私有成员时，自动调用！一个参数
 * __set()
 *      1、自动调用，是在直接设置私有属性时，两个参数
 *
 * __isset()    isset() 在使用isset()判断一个私有属性是否存在时，自动调用__isset()魔术方法，参数则是属性名称
 * __unset()    unset();
 *
 */
class Person
{
    //成员属性
    private  $name;
    private $age;
    private $sex;

    //构造方法
    function __construct($name, $age, $sex)
    {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
    }
    function __isset($proname) {
        echo "$proname ############<br>";
    }
/*    function setSex($sex) {
        if (!($sex=="男" || $sex=="女"))
            return;
        $this->sex=$sex;
    }*/
    function __get($pro) {
       return $this->$pro;
    }
    function __set($name,$value) {
        //echo "{$name} = $value <br>";
        $this->$name=$value;
    }
    function __unset($proname) {
        if($proname!="age") {
            unset ($this->$proname);
        }
    }
/*    function getAge() {
        if($this->age <20) {
            return $this->age;
        }else if ($this->age < 30) {
            return $this->age -5;
        }else if ($this->age < 40) {
            return $this->age -8;
        }else {
            return 29;
        }
    }*/
    //成员方法
    function say()
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
//$p1->age = 28;
//$p1->setSex("泰国人");
//echo $p1->say();
//echo $p1->getAge();
//echo $p1->eat();
//echo $p1->run();
/*$p1->name="毕福剑";
$p1->age=39;
$p1->sex="男";
echo $p1->name."<br>";
echo $p1->sex."<br>";
echo $p1->age."<br>";*/

unset($p1->name);
if(isset($p1->name)) {
    echo "这个对象中的name是存在的属性<br>";
}else {
    echo "对象p1中不存在name属性";
}
