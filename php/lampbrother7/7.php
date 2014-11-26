<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-26
 * Time: 下午3:38
 * 多态特性：
 *      1、程序扩展准备的
 *      技术：1、必须有继承关系，父类最好是接口或抽象类
 */
interface USB
{
    const WIDTH = 12;
    const HEIGHT = 3;
    function load();
    function run();
    function stop();
}

class Computer {
    function useUSB(USB $usb) {
        $usb ->load();
        $usb->run();
        $usb->stop();
    }
}

class Mouse implements USB {

    function load()
    {
        echo "加载鼠标成功！<br>";
    }

    function run()
    {
        echo "运行鼠标！<br>";
    }

    function stop()
    {
        echo "鼠标拔出！<br>";
    }
}

class KeyPress implements USB {

    function load()
    {
        echo "加载键盘成功！<br>";
    }

    function run()
    {
        echo "运行键盘成功！<br>";
    }

    function stop()
    {
        echo "停止键盘使用成功！<br>";
    }
}

class Worker {
    function work() {
        $c = new Computer();
        $m =new Mouse();
        $k =new KeyPress();
        $c->useUSB($k);
        echo '---------<br>';
        $c->useUSB($m);
}
}

$w = new Worker();
$w->work();