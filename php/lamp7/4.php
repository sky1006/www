<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-18
 * Time: 上午11:05
 *
 * static -- 可以修饰属性和方法，不能修饰类
 *      1、使用static修饰成员属性，存在内存的初始化静态段。
 *      2、可以被所有同一个类的对象共用
 *      3、第一次用到类（类名第一次出现），类在加载到内存时，就已经将静态的成员加到了内存
 *      4、静态的成员一定要使用类来访问
 *      5、self可以在类中的方法中，代表自己类的（$this）
 *      6、静态成员一旦被加载，只有脚本结束才释放
 *      7、在静态的方法中，是不能访问非静态的成员的
 *      8、只要是能使用静态的环境下声明方法，就最好使用静态方法（效率）
 *
 */
class Person
{
    public $name;
    public $age;
    public $sex;
    public static  $country = "中国";

    function __construct($name, $age, $sex)
    {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
    }

    function say()
    {
        echo "我的名字是：{$this->name} ，我的年龄是：{$this->age} ，我的性别是：{$this->sex} 。<br>";
        echo "我所在的国家是：".self::$country." <br>";
    }

    static function eat()
    {
        echo "11111111<br>";
    }

    static function  run()
    {
        /*echo "我的名字是：{$this->name} ，我的年龄是：{$this->age} ，我的性别是：{$this->sex} 。<br>";
        echo "我所在的国家是：".self::$country." <br>";*/
    }
}
Person::$country="USA";
//echo Person::$country;
$p = new Person("zhangsan",19,"nan");
echo $p->say();
Person::eat();
//echo $p->country;
/*$p1 = new Person("zhang1", 10, "nan");
$p2 = new Person("zhang2", 10, "nan");
$p3 = new Person("zhang3", 18, "nv");
$p4 = new Person("zhang4", 19, "nan");
$p5 = new Person("zhang5", 12, "nv");*/

Person::run();