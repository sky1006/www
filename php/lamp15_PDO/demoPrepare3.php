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

    $stmt = $pdo->prepare("INSERT INTO users(username,passwd,age,sex,email) VALUES(:username,:passwd,:age,:sex,:email)");

    //执行上面在数据库中已经准备好的语句
//    $stmt->execute(array("meizi", md5('123321'), 30, 'M', 'ads@23.com'));
    $stmt->execute(array("username" => "qiangge", "passwd" => md5('123'), "age" => 33, "sex" => "M", "email" => "kjk@sddf.com"));

} catch (PDOException $e) {
    echo "错误原因:" . $e->getMessage() . '<br>';
}





