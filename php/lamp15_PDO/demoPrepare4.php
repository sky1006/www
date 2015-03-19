<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/18
 * Time: 14:25
 *
 *PHP的预处理语句
 * 效率要提高
 * 安全性要好
 * 建议：使用这种方式去执行SQL语句
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
    //给数据库管理系统并直接执行
//    $afferted_rows = @$pdo->exec("delete from helloworld");
    //只是将这个语句放到服务器上（数据库服务器），编译后等待执行，没有执行
//    $stmt = $pdo->prepare("INSERT INTO users(username,passwd,age,sex,email) VALUES(?,?,?,?,?)");

    $stmt = $pdo->prepare("select id, username,passwd,age,sex,email from users where id>? and id<?");

    //执行上面在数据库中已经准备好的语句
//    $stmt->execute(array("meizi", md5('123321'), 30, 'M', 'ads@23.com'));
    $stmt->execute(array(1000, 1200));

    //mysql_fetch_array()   mysql_fetch_rows  mysql_fetch_array()
    echo '<table border="1" width="800" align="center">';
    while (list($id, $username, $passwd, $age, $sex, $email) = $stmt->fetch(PDO::FETCH_NUM)) {
        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $username . '</td>';
        echo '<td>' . $passwd . '</td>';
        echo '<td>' . $age . '</td>';
        echo '<td>' . $sex . '</td>';
        echo '<td>' . $email . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    /*print_r($stmt->fetch());
    echo '<br>';
    print_r($stmt->fetch());
    echo '<br>';
    print_r($stmt->fetch());
    echo '<br>';*/
} catch (PDOException $e) {
    echo "错误原因:" . $e->getMessage() . '<br>';
}





