<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/16
 * Time: 15:37
 */
include "init.inc.php";

$smarty->assign("var", "this is a test");

$smarty->display("one.tpl");