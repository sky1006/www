<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-20
 * Time: 下午4:18
 * 魔术方法，只要PHP语言中存在
 *      __construct()
 *      __destruct()
 *      __set()
 *      __get()
 *      __isset()
 *      __unset()
 * 1、自动调用，但不同的魔术方法，有自己的调用时机
 * 2、都是以“__”开始的方法
 * 3、所有的魔术方法，方法名都是固定的
 * 4、如果不写，就不存在，也就没有默认的功能
 *
 * __toString()
 *      1、是在时间使用 echo print printf 输出一个对象引用时，自动调用这个方法
 *      2、将对象的基本信息放在 __toString()方法内部，形成字符串返回。
 *      3、__toString()方法中，不能有参数，而且必须返回一个字符串
 */

class Person {
    public $name;
    public $age;
    public $sex;
    public $narr = array("aaaa","bbbb","cccc","dddd");

    function __construct($name,$age,$sex) {
        $this->name=$name;
        $this->age = $age;
        $this->sex = $sex;
    }
    function say() {
        echo "我的名字是：{$this->name}，我的年龄是：{$this->age} ，我的性别是：{$this->sex} <br>";
    }
    function __toString() {
        return "aaaaaaaaaa<br>";
    }
    function __destruct(){
        echo "<br> {$this->name} #$$%%%%%%%%<br>";
    }
    function __clone() {
        //echo "<br>kelong%%^^^!###$#@$<br>";
        $this->name="克隆的张三";
        $this->age=0;
    }

    function __call($method,$args) {
       /* echo "对不起，你调用的方法{$method}(),参数为";
        print_r($args);
        echo "不存在！<br>";*/
        if(in_array($method,$this->narr)) {
            echo $args[0].'<br>';
        }else{
            echo "你调用的方法{$method}()不存在！<br>";
        }
    }

    function __sleep() {
        //echo "执行串行化时自动调用的<br>";
        echo "只串行化，name和age<br>";
        return array("name","age");
    }
    function __wakeup() {
        echo "返串行化时自动调用我这个方法<br>";
        $this->age=12;
        $this->name="老徐";
    }

}

$p = new Person("张三",10,"男");
 $p->say();

/*
 *克隆对象： 1、使用clone这个关键 复制了一个对象
 *  __clone()
 *      1、是在克隆对象时，自动调用的方法
 *      2、作用：和构造方法一样，是对新克隆的对象进行初始化
 *      3、在这个方法中 $this 代表的是副本，所以就可以给所有副本的成员初始化
 *
 */
$p2 = clone $p;
//$p2->name="李四";
$p2->say();

/*
 * __call()
 *      1、就是在调用一个对象中不存在的方法，自动调用的方法
 *      2、有两个参数，第一个参数是，调用的不存在的方法的方法名，第二个参数是，调用的这个不存在的方法的方法参数
 *      3、作用：可以写提示，但这个不是主要的功能，将方法的功能相似，但方法名还要不同的，就可以才用这个方式来完成
 *
 */

//$p -> eat("肉","米");
//$p -> run("爬山");
$p->aaaa("aaaaaaaa");
$p->bbbb("bbbbb");
$p->cccc("ccccccccccc");
$p->dddd("dddddd");
$p->www("wwwww");

/*
 * 串行化（序列化）
 *      1、将对象转成字符穿（不用看懂）---  串行化
 *           __sleep()   -- 在串行化时自动调用的方法
 *          作用：可以设置需要串行化的对象的属性，只要在这个方法中，返回一个数组，在数组中声明了那个属性名，
 *          那个属性就会被串行化，没有在这个数组中的就不被串行化。默认这个方法，全部属性都串行化
 *      2、将字符串转回对象             --   返串行化
 *          __wakeup()  --  在返串行化时自动调用的方法
 *          作用：对串行化回来的对象，进行初始化用的和下面两个方法作用相似
 *          __construct()       __clone()
 *
 * 注（串行化的时机）：
 *      1、将对象在网络中传输
 *      2、将对象持久保存
 *
 */

echo "<br>-------------------------------<br>";

