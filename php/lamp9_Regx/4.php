<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-15
 * Time: 下午4:20
 */
$str = "今天是2014-12-15，明年的2015-12-15你会在那里";

echo $str . '<br>';
$reg = "/(\d{4})(-\d{2}-\d{2})/";
function myfun($n)
{
    return ($n[1] + 1) . $n[2];
}

echo preg_replace_callback($reg, "myfun", $str) . '<br>';

$reg1 = "\<b>.*?</b>";
echo $reg1 . '<br>';
echo preg_quote($reg1);