<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-25
 * Time: 下午5:01
 *
 * 1、什么是抽象方法？
 *      定义：一个方法如果没有方法体(一个方法不使用“{}”，直接使用分号结束的方法，才是没有方法体的方法)，
 *      则这个方法就是抽象方法
 *      a、声明一个方法，不使用{}，而直接用分号结束
 *      b、如果是抽象方法，必须使用 abstract(抽象关键字来修饰)
 * 2、什么是抽象类？
 *      如果一个类中有一个方法是抽象的方法，则这个类就是抽象类
 *      如果声明一个抽象类，则这个类必须使用 abstract关键字修饰
 *
 * 注意：
 *      1、只要使用 abstract 修饰的类，就是抽象类
 *      2、抽象类是一种特殊的类，特殊在哪里（在抽象类中可以有抽象方法）
 *      3、除了在抽象类中可以有抽象方法以外，和正常的类完全一样
 * 注意2：
 *      1、抽象类不能实例化对象（不能创建出对象）
 *      2、如果看见抽象类，就必须写这个类的子类，将抽象类中的抽象方法覆盖（加上方法体）
 *      3、子类必须全部实现（覆盖重写）抽象方法，这个子类才能创建对象，如果只实现部分，那么还有抽象方法，
 *      则子类也就必须是抽象类
 *
 * 抽象方法作用：
 *      1、抽象方法就是一个规定了子类必须有这个方法的实现，功能交给子类
 *      2、只写出来结构，而没有实现，实现交给具体的子类（按自己的功能）去实现
 * 抽象类的作用：
 *      1、就是要求子类的结构，所以抽象类就是一个规范
 *
 */
abstract class Person
{
    public $name;
    public $age;

    //抽象方法
    abstract function say();

    abstract function eat();

    function run()
    {
        echo "1111111111<br>";
    }

    function sleep()
    {
        echo "222222222222<br>";
    }

}

class Student extends Person
{
    function say()
    {
        echo "我是中国人，我说中文<br>";
    }

    function  eat()
    {
        echo "我是中国人，我用筷子吃饭<br>";
    }
}

class StudentEn extends Person
{

    function say()
    {
        echo "I am English，I say english<br>";
    }

    function eat()
    {
        echo "我是外国人，我用刀叉吃饭<br>";
    }
}

$s1 = new Student();
$s1->say();

$s2 = new StudentEn();
$s2->say();


//$p = new Person();
