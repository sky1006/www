<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/10
 * Time: 14:09
 *
 */
//包含模板引擎类
include "Smarty.php";
//创建模板引擎对象
$smarty = new Smarty();

//连接数据库

//执行sql语句

//这是从数据库中获取的数据,需要在模板中显示
$tit = "this is a test";
$cont = "this is content..........";

//第一个 向模板中分配变量
$smarty->assign("title", $tit);
$smarty->assign("content", $cont);
$smarty->assign("hello", "world");
var_dump($smarty);

//加载指定的模板,并显示
$smarty->display("demo.html");
