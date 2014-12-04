<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-25
 * Time: 下午3:40
 * 只要在这个脚本中，需要加载类的时候（必须用到类名），就会自动调用这个方法
 */

function __autoload($classname)
{
    echo $classname.'<br>';
    //One   one.class.php
    include strtolower($classname).".class.php";
}

$t = new One();
$t -> one();

/*$d = new Two();
$d->two();*/
Two::two2();
Two::two2();
Two::two2();
Two::two2();