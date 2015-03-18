<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/18
 * Time: 14:25
 *
 * PDO中执行SQL语句的方法有两个主要的：
 *  1.exec()    用来处理非结果集的 insert update delete create ...
 *      返回影响的行数
 *      如果是插入语句可以使用lastinsertid()方法获取最后插入的id
 *  2.query()   用来处理有结果集的语句 select desc show
 *      返回的是PDOStatement类的对象，再通过这个类的方法获取结果，也可以直接foreach遍历获取结果（但不常用）
 *  set names utf8; 1 和 2 都可以
 */
$dsn = "mysql:host=115.28.100.155;dbname=xsphp";
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
    $afferted_rows = $pdo->query("select * from users");
    foreach ($afferted_rows as $arr) {
        print_r($arr);
    }

} catch (PDOException $e) {
    echo "错误原因" . $e->getMessage() . '<br>';
}





