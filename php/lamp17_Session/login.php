<h3>用户登录</h3>
<form action="login.php" method="post">
    username:<input type="text" name="username" value=""><br>
    password:<input type="password" name="password" value=""><br>

    <input type="submit" name="dosubmit" value="登录"><br>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/1
 * Time: 17:40
 */
header("Content-Type:text/html;charset=utf-8");
if (isset($_POST['dosubmit'])) {
    $pdo = new PDO("mysql:host=115.28.100.155;dbname=xsphp", "yinq", "xin123@#$");
    $stmt = $pdo->prepare("select id,username,allow_1,allow_2,allow_3 from user where username=? and password=?");
    $stmt->execute(array($_POST['username'], md5($_POST['password'])));

    //如果查出数据，说明这个用户是存在的，就让登录
    if ($stmt->rowCount() > 0) {
        list($id, $username, $allow_1, $allow_2, $allow_3) = $stmt->fetch(PDO::FETCH_NUM);
        $time = time() + 24 * 60 * 60;
        setcookie("uid", $id, $time, "/");
        setcookie("username", $username, $time, "/");
        setcookie("allow_1", $allow_1, $time, "/");
        setcookie("allow_2", $allow_2, $time, "/");
        setcookie("allow_3", $allow_3, $time, "/");
        //设置一个登录判断的标记isLogin
        setcookie("isLogin", 1, $time, "/");
        header("Location:reg.php");
    } else {
        echo "登录失败！";
    }
}