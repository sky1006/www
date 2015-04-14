<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/14
 * Time: 16:02
 */
include "init.inc.php";
$var = "this is a demo this is a demo";

$smarty->assign("var", $var);
$smarty->assign("var2", 100);
$smarty->assign("var3", "这是一个演示的字符串！");

function fontstyle($str, $fontsize = "3", $fontcolor = "green")
{
    return '<font color="' . $fontcolor . '" size="' . $fontsize . '">' . $str . '</font>';
}

$smarty->registered_plugins("modifier", "mystyle", function ());
$smarty->display("reg.tpl");