<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/basic.css"/>
    <script src="__PUBLIC__/js/basic.js"></script>
</head>
<body>
<form action="__URL__/do_login" method="post" name="myForm">
    用户名:<input type="text" name="username"/><br>
    密　码:<input type="password" name="password"/><br/>
    验证码:<input type="text" name="code"/>
    <img src="__APP__/Public/code" onclick="this.src=this.src+'?'+Math.random"/> <br/>
    <!--<input type="submit" />-->
    <img src="__PUBLIC__/images/login.gif" onclick="sub()" />
</form>
</body>
</html>