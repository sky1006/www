<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/18
 * Time: 14:25
 *
 * 1.默认的错误模式（不提示，我们看到的问题，被忽视！）
 * 2.警告模式 PDO::ERRMODE_WARNING
 * 3.异常模式 PDO::ERRMODE_EXCEPTION
 */
$dsn = "mysql:host=115.28.100.155;dbname=bookstore";
$username = "yinq";
$passwd = "xin123@#$";
try {
//    创建对象
    $pdo = new PDO($dsn, $username, $passwd);
    //设置错误使用异常模式
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "数据库连接失败：" . $e->getMessage();
    exit;
}

//echo $pdo->getAttribute(PDO::ATTR_ERRMODE).'<br>';

try {
    //使用PDO中的方法执行语句
    $afferted_rows = @$pdo->exec("delete from helloworld");
} catch (PDOException $e) {
    echo "错误原因" . $e->getMessage() . '<br>';
}





