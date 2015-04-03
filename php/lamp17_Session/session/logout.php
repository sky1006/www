<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/3
 * Time: 15:04
 */
include "config.inc.php";

$username = $_SESSION['username'];
//清空数组
$_SESSION = array();

//删除cookie中的sessionid
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

//销毁所有session资源
session_destroy();

?>
再见：<?php echo $username ?><br>
<a href="login.php">重新登录</a><br>