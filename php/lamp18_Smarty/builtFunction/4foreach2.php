<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/16
 * Time: 16:33
 */
include "init.inc.php";

$smarty->assign("arr", array("os" => "Linux", "webserver" => "Nginx", "db" => "MySQL", "language" => "PHP"));

$smarty->display("4foreach2.tpl");