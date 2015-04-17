<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/18
 * Time: 14:25
 *
 *
 */
$dsn = "mysql:host=115.28.100.155;dbname=xsphp";
$username = "yinq";
$passwd = "xin123@#$";
try {
//    创建对象
    $pdo = new PDO($dsn, $username, $passwd);
    //设置错误使用异常模式
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //关闭自动提交
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
} catch (PDOException $e) {
    echo "数据库连接失败：" . $e->getMessage();
    exit;
}

//echo $pdo->getAttribute(PDO::ATTR_ERRMODE).'<br>';

try {
    //开启一个事务
    $pdo->beginTransaction();
    $username = "rongyao";
    //使用PDO中的方法执行语句
    $affected_rows = $pdo->exec("update users set username='{$username}' where id=1016");
    if ($affected_rows > 0) {
        echo "更新hongmi成功！<br>";
    } else {
        throw new PDOException("update hongmi false!<br>");
    }

    $affected_rows = $pdo->exec("update users set username='{$username}' where id=1018");

    if ($affected_rows > 0) {
        echo "更新xiaomi3成功！<br>";
    } else {
        throw new PDOException("update xiaomi3 false!<br>");
    }

    echo "update success!<br>";

    $pdo->commit();

} catch (PDOException $e) {
    echo "错误原因" . $e->getMessage() . '<br>';
    echo "update false!<br>";
    //撤销所有的操作
    $pdo->rollBack();
}

//运行完成后，最后开启自动提交
$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);


