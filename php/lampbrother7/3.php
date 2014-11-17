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
class Person {
    public  $name;
    protected $age;
    protected $sex;

    function __construct($name,$age,$sex) {
        $this->name=$name;
        $this->age=$age;
        $this->sex=$sex;
    }
    function say(){
        echo "我的名字是：{$this->name} ，我的年龄是：{$this->age} ，我的性别是：{$this->sex} 。<br>";
    }
    function eat() {
        echo "11111111<br>";
    }
    function  run() {

    }
}
class Student extends Person {
    var $school;

    function __construct($name,$age,$sex,$school) {
        parent::__construct($name,$age,$sex);
        $this->school=$school;
    }

    function study() {

    }
    function say(){
        //Person::say();
        parent::say();
        //echo "我的名字是：{$this->name} ，我的年龄是：{$this->age} ，我的性别是：{$this->sex} 。<br>";
        echo "我所在的学校：{$this->school} <br>";
    }
}

class Teacher extends Student {
    var $gz;
      function jiao() {
          echo "我的名字是：{$this->name} ，我的年龄是：{$this->age} ，我的性别是：{$this->sex} 。<br>";
    }

}

/*$t = new Teacher("小强",31,"男");
 $t->say();
 $t->jiao();
echo $t->name;*/

$s = new Student("燕子",29,"女","英国佬");
$s->say();
