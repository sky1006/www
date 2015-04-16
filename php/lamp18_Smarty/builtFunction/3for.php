<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/16
 * Time: 15:47
 */
include "init.inc.php";

for ($i = 1; $i < 10; $i++) {
    echo "$i #####<br>";
}

$smarty->display("3for.tpl");