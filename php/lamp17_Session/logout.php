<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/1
 * Time: 17:40
 */
header("Content-Type:text/html;charset=utf-8");

$username = $_COOKIE['username'];
setcookie("id", "", time() - 3600, "/");
setcookie("username", "", time() - 3600, "/");
setcookie("allow_1", "", time() - 3600, "/");
setcookie("allow_2", "", time() - 3600, "/");
setcookie("allow_3", "", time() - 3600, "/");
setcookie("isLogin", "", time() - 3600, "/");

echo "再见{$username}";
?>

<script>
    setTimeout("location='login.php'", 3000);
</script>