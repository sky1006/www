<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-17
 * Time: 下午4:31
 * 类的继承性
 * 继承 -- 扩展  extends  一个类只能继承一个父类
 * 1、子类使用extends继承父类，子类可以将父类中所有的内容都继承过来
 * 2、private这是私有的，只能自己用，不能别人用，包括自己的子类也不能用
 * 3、protected这个是保护的权限，只能是自己和自己的子类中可以使用的成员，不能在外面使用
 * 4、public这个是公开的权限，所有都可以，自己，子类，类外部都可以使用
 *
 * 继承中的重载（覆盖）
 *      别的语言：方法名相同，参数个数、类型不同
 *      PHP：在子类中可以写和父类同名的方法（方法也可以扩展）
 * 对象->成员
 * 类::成员
 *
 * parent::成员 访问父类中被覆盖的方法
 * 重要：只要是子类的构造方法，去覆盖父类中的构造方法，一定要在子类的最上面调用一下父类被覆盖的方法
 *
 * 权限问题：
 *      子类只能大于或等于父类的权限，不能小于
 */
class Person
{
    public $name;
    protected $age;
    protected $sex;

    function __construct($name, $age, $sex)
    {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
    }

    function say()
    {
        echo "我的名字是：{$this->name} ，我的年龄是：{$this->age} ，我的性别是：{$this->sex} 。<br>";
    }

    function eat()
    {
        echo "11111111<br>";
    }

    function  run()
    {

    }
}

class Student extends Person
{
    var $school;

    function __construct($name, $age, $sex, $school)
    {
        parent::__construct($name, $age, $sex);
        $this->school = $school;
    }

    function study()
    {

    }

    function say()
    {
        //Person::say();
        parent::say();
        //echo "我的名字是：{$this->name} ，我的年龄是：{$this->age} ，我的性别是：{$this->sex} 。<br>";
        echo "我所在的学校：{$this->school} <br>";
    }
}

class Teacher extends Student
{
    var $gz;

    function jiao()
    {
        echo "我的名字是：{$this->name} ，我的年龄是：{$this->age} ，我的性别是：{$this->sex} 。<br>";
    }

}

/*$t = new Teacher("小强",31,"男");
 $t->say();
 $t->jiao();
echo $t->name;*/

$s = new Student("燕子", 29, "女", "英国佬");
$s->say();

$p = new Person("yanzi", 29, "nv");

if ($p instanceof Person) { //instanceof 用于检测当前对象实例是否属于某一个类的类型
    echo "这个\$p是Person类的对象";
} else {
    echo "对象不属于这个类";
}

/*
 * 在PHP中final不定义常量，所以就不会使用，也不能使用final来修饰成员属性
 * 1、final可以修饰类  ---- 这个类不能去扩展，不能有子类（不让别人去扩展，这个类是最终的类）
 * 2、final可以修饰方法 --- 这个方法就不能在子类中覆盖（不让子类去改这个方法，或扩展这个方法的功能时，
 *                          这个方法也就是最终的方法）
 */


/*
 * define("常量名","值")
 *  类里面不能用define定义常量
 *const 修饰的成员属性为常量，只能修饰成员属性
 *      1、常量建议使用大写，不能使用$
 *      2、常量一定要在声明时就给好初值
 *      3、常量的访问方式和static的访问方式相同，但只能读
 *          1、在类外部使用    类名::常量名
 *          2、在类的内部     self::常量名
 *
 * final  类和方法
 * static  属性和方法
 */
class Demo {
    const SEX = "nan";
    static function say() {
        echo "<br>我的性别是:".self::SEX."<br>";
    }
}

echo Demo::SEX;
Demo::say();