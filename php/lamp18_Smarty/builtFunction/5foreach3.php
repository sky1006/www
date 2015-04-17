<?php
error_reporting(E_ALL ^ E_NOTICE);
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/16
 * Time: 16:33
 */
ob_start();
$file = "newindex{$_GET['page']}.html";
$cachetime = 10;
if (!file_exists($file) || filemtime($file) + $cachetime < time()) {
    header("Content-Type:text/html;charset=utf-8");
    include "init.inc.php";
    include "page.class.php";

    $smarty->assign("arr", array("os" => "Linux", "webserver" => "Nginx", "db" => "MySQL", "language" => "PHP"));


    $pdo = new PDO("mysql:host=115.28.100.155;dbname=xsphp", "yinq", "xin123@#$");

    $page = new Page(30, 5);

    $stmt = $pdo->prepare("select id,username,age,sex,email from users {$page->limit}");
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($users);
    $smarty->assign("users", $users);
    $smarty->assign("fpage", $page->fpage());

//$smarty->display("5foreach3.tpl");
    $smarty->display("6section.tpl");

    $content = ob_get_contents();
    file_put_contents($file, $content);

    ob_flush();
    echo "################<br>";
} else {
    include $file;
}
