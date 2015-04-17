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
    $stmt = $pdo->prepare("INSERT INTO users(username,passwd,age,sex,email) VALUES(?,?,?,?,?)");

    //绑定参数（？），将问号和一个变量关联起来
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $passwd);
    $stmt->bindParam(3, $age);
    $stmt->bindParam(4, $sex);
    $stmt->bindParam(5, $email);

    //给变量一个值，就会给准备好的语句中的对应？一个值
    $username = "sanxing";
    $passwd = md5('123321');
    $age = 30;
    $sex = 'W';
    $email = "aa@bb.cc";

    //执行上面在数据库中已经准备好的语句
    $stmt->execute();

    //给变量一个值，就会给准备好的语句中的对应？一个值
    $username = "iphone";
    $passwd = md5('123321');
    $age = 33;
    $sex = 'M';
    $email = "rr@tt.cc";

    //执行上面在数据库中已经准备好的语句
    $stmt->execute();


} catch (PDOException $e) {
    echo "错误原因:" . $e->getMessage() . '<br>';
}





