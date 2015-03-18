<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/18
 * Time: 14:25
 *
 * 1.默认的错误模式（不提示，我们看到的问题，被忽视！）
 */
$dsn = "mysql:host=115.28.100.155;dbname=bookstore";
$username = "yinq";
$passwd = "xin123@#$";
try {
//    $pdo = new PDO($dsn, $username, $passwd,array(PDO::ATTR_AUTOCOMMIT=>true));
    $pdo = new PDO($dsn, $username, $passwd);
} catch (PDOException $e) {
    echo "数据库连接失败：" . $e->getMessage();
    exit;
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
//echo $pdo->getAttribute(PDO::ATTR_ERRMODE).'<br>';

$afferted_rows = @$pdo->exec("delete from helloworld");
if (!$afferted_rows) {
    echo $pdo->errorCode();
    echo "<br>";
    print_r($pdo->errorinfo());
    exit;
}
echo "OK!";


