<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-29
 * Time: 下午4:21
 * 回调函数：
 * 在使用一个函数的时候，如果传一个变量，不能解决多大的问题，就需要传一个过程进入到函数中
 * 改变函数的执行行为。
 * 在函数的调用时，在参数中传的不是一个变量或一个值，而是一个函数，这就是回调函数参数。
 *
 */
$arr = array(1, 5, 9, 6, 7, 8, 3, 2);
print_r($arr);
usort($arr, "mycom");
echo "<br>";
print_r($arr);

function mycom($a, $b)
{
    if ($a > $b)
        return -1;
    else if ($a < $b)
        return 1;
    else
        return 0;
}

/*
 * 制作回调函数
 */
function demo($num, $n)
{
    for ($i = 0; $i < $num; $i++) {
        if ($n($i)) //变量函数回调
            continue;
        echo $i . "<br>";
    }
}

function demo2($i)
{
//    if (preg_match('/3/',$i))
    if ($i == strrev($i))
        return true;
    else
        return false;
}

demo(20, "demo2");
echo "<br>";

//参数个数如果是变长的时候，就不能直接调用这个函数
function fun($one = "1", $two = "2", $three = "3")
{
    echo "$one-------$two-------$three<br>";
}

call_user_func_array("fun", array(111, 222, 33333));

function demo3($num, $n)
{
    for ($i = 0; $i < $num; $i++) {
        if (call_user_func_array($n, array($i))) //系统函数回调
            continue;
        echo $i . "<br>";
    }
}

demo3(100, "demo2");
