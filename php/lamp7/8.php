<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-28
 * Time: 下午3:13
 *
 */
class Demo {
    function test() {
        echo __CLASS__.'<br>';
        //array_filter($arr,array(__CLASS__,"hello"));
        echo __METHOD__.'<br>';
    }
    function hello() {

    }
}
$d = new Demo();
$d->test();
print_r(get_declared_classes());
print_r(get_declared_interfaces());