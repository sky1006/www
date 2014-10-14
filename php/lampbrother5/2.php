<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-26
 * Time: 下午5:11
 *常规参数函数：调用的时候传递的参数个数和顺序要一致
 * 功能：处理两个数相加
 * @param int $a 这是第一个加数
 * @param int $b 这是第二个加数
 * @return int 返回两个数相加的和
 *
 * 伪类型参数的函数格式说明：
 * mixed funName(mixed $a,number $b,callback $c)
 * 三种伪类型：mixed,number,callback
 */
function add2($a, $b)
{
    return $a + $b;
}

/*
 * 引用参数的函数：如果在函数说明中，有&出现，说明这个参数是一个引用参数，你调用时传递参数时，
 * 就必须传一个变量
 *
 * 1、只有在内存中的变量，才有地址
 * 2、有引用关系的两个变量，一个变，另一个就变，相当于两个是一个
 */
$b = 20;
function demo(&$a)
{ //传b的地址
    $a = 100;
}

echo $b . "<br>";
demo($b);
echo $b . "<br>";

/*
 * 默认参数：
 * demo (string $name, int $age,[string $sex,[string $email]])
 */
function demo2($name = "one", $age = 24, $sex = "女", $email = "dkf@163.com")
{
    echo "{$name}--{$age}--{$sex}--{$email} <br>";
}

demo2();
demo2("小武", 20, "男", "sfs@163.com");
demo2("波波", 24);

/*
 * 可变参数：
 * func_get_args() ---返回一个数组，包含所有参数
 * func_get_arg() ---接收一个数字参数，返回指定参数
 * func_num_args() ---返回参数总数
 */
function demo3()
{
    //$arr = func_get_args();
    //var_dump($arr);
    $sum = 0;
    for ($i = 0; $i < func_num_args(); $i++) {
        $sum += func_get_arg($i);
    }
    return $sum;
}

echo demo3(1, 2, 3, 4, 5, 6, 7, 8, 9);
echo "<br>";
/*
 * 变量函数：如果将一个函数名称（字符串），给一个变量（字符串），然后在这个变量后面加上
 * 括号，就会调用这个变量值对应的函数。
 */
function add($a, $b)
{
    return $a + $b;
}

function chen($a, $b)
{
    return $a * $b;
}

function chu($a, $b)
{
    if ($b != 0)
        return $a / $b;
    else
        return false;
}

$var = "add";
echo $var(20, 30) . "<br>";
$var = "chen";
echo $var(10, 30) . "<br>";
