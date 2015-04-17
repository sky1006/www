<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/14
 * Time: 16:02
 */
include "init.inc.php";
$var = "this is 5a demo thi6s is a d7emo";

$smarty->assign("var", $var);
$smarty->assign("var2", 100);
$smarty->assign("var3", "这是一个演示的字符串！");

function fontstyle($str, $fontsize = "3", $fontcolor = "green")
{
    return '<font color="' . $fontcolor . '" size="' . $fontsize . '">' . $str . '</font>';
}

$smarty->registerPlugin("modifier", "mystyle", "fontstyle");

$smarty->registerPlugin("modifier", "myucword", "ucwords");
$smarty->registerPlugin("modifier", "zzreplace", "test");

function test($text, $zz, $str)
{
    return preg_replace($zz, $str, $text);
}

$smarty->assign('data', array(1, 2, 3, 4, 5, 6, 7, 8, 9));
$smarty->assign('tr', array('bgcolor="#eeeeee"', 'bgcolor="#dddddd"'));

$smarty->display("reg.tpl");