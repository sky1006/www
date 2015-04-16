<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/16
 * Time: 15:47
 */
include "init.inc.php";

$smarty->assign("var", 6);
$smarty->assign("var1", 8);

$smarty->assign("arr", array(1, 2, 3, 4, 5, 6));

$smarty->display("two.tpl");