<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/2/16
 * Time: 16:12
 * try {
 *
 *  } catch (Exception $e) {
 *
 *  }
 * 1、try catch是一体的
 * 2、try catch之间不能有任何代码
 * 工作原理
 *  1、试着执行try中的代码，如果没有问题，继续执行catch之后的代码
 *  2、Exception 是系统类
 *  3、如果有异常对象抛出，就将异常对象给catch()中的类
 *  4、try中发生异常位置后的代码不再执行，而是直接执行catch中代码，执行
 * 完后，再执行catch后的代码
 */
set_error_handler("myerrorfun");
function myerrorfun($type, $mess, $file, $line)
{
    if ($type == E_WARNING) {
        throw new Exception("发生问题了，出现了例外！{$mess},$file,$line");
    }
}

function run($d)
{
    echo $d . '<br>';
}

echo "早上起床<br>";

//$bj = true;
try {
    echo "开车上班<br>";
    run('aaaaaaaaaaa');
//    if ($bj) {
    //抛出异常
//        throw new Exception("车胎爆了");
//    }
    echo "路况很好<br>";
} catch (Exception $e) {    // Exception $e=new Exception('');
    echo $e->getMessage() . '<br>';
    echo "换上备胎，继续上班<br>";
}
echo "到公司开始工作<br>";
