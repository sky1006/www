<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/13
 * Time: 17:37
 */
//session_start();
include "init.inc.php";

/*$_SESSION['hello']="world";

$smarty->assign("session",$_SESSION);

$smarty->assign("get",$_GET);*/

/*
 * $smarty->assign("smarty",array(
 *                          "get"->$_GET,
 *                          "post"->$_POST,
 *                          "session"->$_SESSION,
 *                          "cookie"->$_COOKIE
 *                          .......
 *                          ))
 */
$var = "this is a demo 1this is 4a demo 8this is a demo";
$smarty->assign("var", $var);
$smarty->assign("var3", "这是一个中文字符截取演示");

$smarty->display("index2.tpl");