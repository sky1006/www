<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/13
 * Time: 15:51
 */
include "init.inc.php";


$smarty->assign("title", "this is a demo");
$smarty->assign("content", "this is content.....");
$smarty->display("test.tpl");