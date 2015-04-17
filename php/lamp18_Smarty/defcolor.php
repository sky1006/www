<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/15
 * Time: 15:37
 */
include "init.inc.php";

$smarty->assign("titlecolor", "FF0000");

//$smarty->registerPlugin("function","laydate","laydate");
$smarty->assign("ctime", date("Y-m-d H:i:s"));


$smarty->display("defcolor.tpl");