<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/16
 * Time: 15:47
 */
include "init.inc.php";

function demo($a, $b)
{
    echo "$a ######### $b<br>";
}

demo(10, 100);

$smarty->display("1fun.tpl");