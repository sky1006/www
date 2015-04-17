<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/1
 * Time: 17:40
 */
include "cookie.php";
echo "你好{$_COOKIE['username']},<a href='logout.php'>退出</a>";

echo "这是文章内容页面，你是登录的<br>";



?>

<a href="index.php">首页</a><br>
<a href="list.php">列表页</a><br>
<a href="content.php">内容页</a><br>