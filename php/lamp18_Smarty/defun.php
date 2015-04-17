<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/15
 * Time: 14:44
 */
include "init.inc.php";

/*$smarty->registerPlugin("function","hello","hello");

function hello($args,$smarty){
    $str="";
    for($i=0;$i<$args['line'];$i++){
        $str.="<font color='{$args['color']}' size='{$args['size']}'>{$args['content']}</font><br>";
    }

    return $str;
}*/
$smarty->registerPlugin("block", "world", "world");

function world($args, $content, $aaa)
{
    $str = "";
    for ($i = 0; $i < $args['line']; $i++) {
        $str .= "<font color='{$args['color']}' size='{$args['size']}'>{$content}</font><br>";
    }

    return $str;
}

$smarty->display("defun.tpl");