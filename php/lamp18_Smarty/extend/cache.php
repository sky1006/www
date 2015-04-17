<?php
error_reporting(E_ALL ^ E_NOTICE);
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/16
 * Time: 16:33
 */

header("Content-Type:text/html;charset=utf-8");
include "init.inc.php";
include "page.class.php";

//一定要加，如果没有缓存则查询输出
if (!$smarty->isCached("cache.tpl", $_SERVER['REQUEST_URI'])) {
    $smarty->assign("arr", array("os" => "Linux", "webserver" => "Nginx", "db" => "MySQL", "language" => "PHP"));


    $pdo = new PDO("mysql:host=115.28.100.155;dbname=xsphp", "yinq", "xin123@#$");

    $page = new Page(30, 5);

    $stmt = $pdo->prepare("select id,username,age,sex,email from users {$page->limit}");
    $stmt->execute();
    echo "没有缓存<br>";
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($users);
    $smarty->assign("users", $users);
    $smarty->assign("fpage", $page->fpage());
}

$smarty->assign("time", date("Y-m-d H:i:s"));
//$smarty->display("5foreach3.tpl");
//    $smarty->display("cache.tpl",$_GET['page']);
$smarty->display("cache.tpl", $_SERVER['REQUEST_URI']);

//$smarty->clearAllCache();



