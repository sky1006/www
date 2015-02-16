<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/2/16
 * Time: 16:59
 *
 * 1、自定义的异常类，必须是系统类Exception的子类
 * 2、如果继承Exception类，重写了构造方法，一定要调用一下父类中被覆盖的方法
 *
 */
//写出对应这个异常的解决方法，就是一个正常类的结构
class MyBtException extends Exception
{
    function __construct($mess)
    {
        parent::__construct($mess);
    }

    function changeBt()
    {
        echo "换上备胎，继续上班<br>";
    }
}

echo "早上起床<br>";

try {
    echo "开车上班<br>";
    throw new MyBtException("车胎爆了");
    echo "路况很好<br>";
} catch (MyBtException $e) {    // Exception $e=new Exception('');
    echo $e->getMessage() . '<br>';
    //自定义类中的解决方法调用
    $e->changeBt() . "<br>";
}
echo "到公司开始工作<br>";

echo "-----------------------------------<br>";

class WcException extends Exception
{
    function pro()
    {
        echo "去公园<br>";
    }
}

class NoException extends Exception
{
    function pro()
    {
        echo "买面包凑合一下!<br>";
    }
}

class MyBtException2 extends Exception
{
    function pro()
    {
        echo "换上备胎！<br>";
    }
}

class FlException extends Exception
{
    function pro()
    {
        echo "走小路！<br>";
    }
}

class Dm
{
    function gowc($bj)
    {
        if (!$bj) {
            throw new WcException("马桶不好用了");
        }
        echo "哈哈，事儿办的很成功！<br>";
    }

    function eat($time)
    {
        if (!$time) {
            throw new NoException("起来晚了，早餐没了");
        }
        echo "吃的很好！<br>";
    }

    function dri($dz)
    {
        if (!$dz) {
            throw new MyBtException2("爆胎了");
        }
        echo "车开的不错<br>";
    }

    function run($yu)
    {
        if (!$yu) {
            throw new FlException("天下雪了，高速封路了");
        }
        echo "高速很好走！<br>";
    }
}

echo "早上起床2<br>";
try {
    $dm = new Dm();
    //1、上厕所（马桶不好用了），去公厕
    $dm->gowc(true);
    //2、吃早餐（没有早点了），买面包
    $dm->eat(true);
    //3、开车上班（爆胎），换备胎
    $dm->dri(true);
    //4、上高速（下雪），小路
    $dm->run(false);
} catch (MyBtException2 $e) {
    echo $e->getMessage() . "<br>";
    $e->pro();
} catch (WcException $e) {
    echo $e->getMessage() . "<br>";
    $e->pro();
} catch (NoException $e) {
    echo $e->getMessage() . "<br>";
    $e->pro();
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
    //  $e->pro();
}

echo "到公司开始工作2<br>";