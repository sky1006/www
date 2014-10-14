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

function demo($num, $n)
{
    for ($i = 0; $i < $num; $i++) {
        //    if ($n($i)) //变量函数回调
        if (call_user_func_array($n, array($i)))
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

class Filter
{
    function one($i)
    {
        if ($i % 3 == 0)
            return true;
        else
            return false;
    }

    static function two($i)
    {
        if (preg_match('/3/', $i)) {
            return true;
        } else {
            return false;
        }
    }
}

//demo(20, "demo2");
//echo "<br>";
demo(100, array(new Filter(), "one"));
echo "#################<br>";
demo(100, array("Filter", "two"));

