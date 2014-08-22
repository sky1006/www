<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-21
 * Time: 下午3:23
 * boolean
 * boolean false
 * int 0--假
 * float 0.0 0.00
 * string "" "0"
 * array 空数组为假
 * null
 */
$bool = 100;
//$bool2 = false;

var_dump($bool);
echo "<br>";
/*var_dump($bool);
var_dump($bool2);*/
if ($bool) {
    echo "这个变量是真值";
} else {
    echo "这个变量是假值";
}