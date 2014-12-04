<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-25
 * Time: 下午2:29
 * 数组的串行化 json -- javascript object
 *
 */
class Person {
    public $name;
    public $age;
    public $sex;

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
    static function __callstatic($method,$args) {
        echo "你调用的静态方法$method(".implode(",",$args).")不存在";
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
    static function __set_state($arr) {
        $p = new Person("李四",29,"女");
//        print_r($arr);
        $p->name=$arr['name'];
        $p->age=$arr['age'];
        return $p;
    }
    function __invoke() {
        echo "在对象引用后加上（）调用时自动调用这个方法";
    }

}

$arr = array("name"=>"zhangsan","age"=>20,"sex"=>"男");
//串行化
$str = json_encode($arr);
echo $str;

//返串行化,第二个参数true返串行化为数组
$parr = json_decode($str,true);
//var_dump($parr);
echo $parr['sex'];

/*
 * 1、eval()函数 --- 检查并执行PHP代码
 *
 * __set_state()方法，就是在使用var_export()方法时，导出一个类的信息时自动调用的方法
 *  var_export() 返回关于传递给该函数的变量的结构信息,返回的代码，可以直接当php代码赋值个一个变量
 * var_dump()
 *
 */
$arr1 = array("one"=>1,"two"=>"22222","three"=>33333);
var_dump($arr1);
echo '<br>';
$a = eval('$b='.var_export($arr1,true).";");
var_dump($b);
echo $b['two'];

echo "<br>======================================<br>";
$p = new Person("张三",20,"男");
$p->name = "里笑死";
$p->age=24;

eval('$c ='.var_export($p,true).";");
var_dump($c);
echo "<br>======================================<br>";

/*
 * __invoke() -- 是在对象实例之后，直接像变量函数一样调用时，自动调用这个方法
 *
 * __callstatic -- 调用不存在的方法时，自动调用，必须是static
 *
 */
$p();

Person::hello();


?>
<!--<script>
    var obj = {name:"zhangsan", age:18, sex:"男"};
    alert(obj.sex);
</script>-->
