<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-24
 * Time: 下午4:53
 * 函数(function)是一段完成指定任务的已命名代码块。函数可以遵照给它的一组值或参数
 *  完成特定的任务，并且可能返回一个值。在PHP中有两种函数：自定义函数与系统函数。
 * 优越性：控制程序设计的复杂性；提高软件的可靠性；提高软件的开发效率；提高软件的可维护性
 * 提高程序的重用性
 *function  foo ( $arg_1 ,  $arg_2 , ..., $arg_n )
 *{
 *   echo  "Example function.\n" ;
 *   return  $retval ;
 * }
 *
 */
echo table(10, 10); //实参（实际的参数）
//file_put_contents("demo.html",table(8, 8) );
// 声明函数时，提供的参数，称为形参（形式上的参数）
function table($rows, $cols)
{
    $str = '';
    $str .= '<table border="1" width="800" align="center">';
    $str .= '<caption><h1>表格</h1></caption>';
    for ($i = 0; $i < $rows; $i++) {
        $bg = ($i % 2 == 0) ? "#cccccc" : "";
        $str .= '<tr bgcolor="' . $bg . '">';
        for ($j = 0; $j < $cols; $j++) {
            $str .= '<td>' . ($i * 10 + $j) . '</td>';
        }
        $str .= '</tr>';
    }
    $str .= '</table>';
    return $str;
}

if (function_exists("table2")) {
    echo "存在<br>";
} else {
    echo "不存在<br>";
};

// 函数内部声明的变量，只能在函数内部调用，这就是----局部变量
// 函数的参数，就是一个局部变量，声明成形参的，可以在调用时，给值，传值
function demo($sex)
{
    $age = 30;
    echo "帅{$sex}<br>";
}

$age = 20;
if (isset($age)) {
    echo $age . '<br>';
}
demo("男");

/*
 * 全局变量：在函数外部声明的变量，可以在每个函数中使用。（顺序）
 * 在函数内部如果需要使用函数外部的变量，需要使用global关键字，将外部变量引入
 *
 */
$name = "苍老师";
define ("NAME", "苍老师漂亮"); //常量声明
function demo2()
{
    echo NAME;
    $name = "小泽<br>";
    global $name, $age;

    echo $name . "---" . $age . "<br>";
}

echo $name . '<br>';
demo2();

/*
 * 静态变量：1、在函数中声明的静态变量，只在第一次调用时声明；
 *      2、第二次以后，一看是静态变量，就先到静态区中，看一下有没有这个变量，如果有，就使用，而不去再声明
 *      3、静态变量，在同一个函数多次调用中 共享。
 */

function jt()
{
    static $a = 0;
    $a++;
    echo $a . "<br>";
}

jt();
jt();
jt();