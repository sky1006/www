<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/1
 * Time: 17:40
 */
//判断是否是登录的，如果是登录的我们才可以通过 $_COOKIE['isLogin']=1
if (!(isset($_COOKIE['isLogin']) && $_COOKIE['isLogin'] == 1)) {
//    header("Location:login.php");
    echo "请先登录！";
    echo '<script>setTimeout(\'location="login.php"\',3000);</script>';
}