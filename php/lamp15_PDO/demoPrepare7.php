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

    $stmt = $pdo->prepare("insert into users( username,passwd,age,sex,email) values(?,?,?,?,?)");

    //执行上面在数据库中已经准备好的语句
//    $stmt->execute(array("meizi", md5('123321'), 30, 'M', 'ads@23.com'));
    $stmt->execute(array('222', '333', '4444', '5555', '6666'));


    //获取结果中的行数,或如果是影响行数的语句执行，则获取的是影响的行数
    echo $stmt->rowCount();
    //如何获取最后一个自动增长的id呢
    echo '<br>';
    echo $pdo->lastInsertId();
} catch (PDOException $e) {
    echo "错误原因:" . $e->getMessage() . '<br>';
}





