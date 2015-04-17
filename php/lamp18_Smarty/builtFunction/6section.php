<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/16
 * Time: 16:33
 */
include "init.inc.php";

$smarty->assign("arr", array("os", "Linux", "webserver", "Nginx", "db", "MySQL", "language", "PHP"));


$pdo = new PDO("mysql:host=115.28.100.155;dbname=xsphp", "yinq", "xin123@#$");

$stmt = $pdo->prepare("select id,username,age,sex,email from users");
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($users);
$smarty->assign("users", $users);

$smarty->display("6section.tpl");