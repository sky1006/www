<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>模板中的赋值</title>
    <!--<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/basic.css" />
    <script src="__PUBLIC__/js/basic.js"></script>-->
    <link rel="stylesheet" type="text/css" href="__CSS__/basic.css" />
    <script src="__JS__/basic.js"></script>
    <!--<style>
        p {
            background: #ff0000;
        }
    </style>-->
</head>
<body>
<p>Hello <?php echo ($name); ?> </p><br>
__PUBLIC__：会被替换成当前网站的公共目录 通常是 <br>
__ROOT__： 会替换成当前网站的地址（不含域名）<br>
__APP__： 会替换成当前项目的URL地址 （不含域名）  <br>
__GROUP__：会替换成当前分组的URL地址 （不含域名） <br>
__URL__： 会替换成当前模块的URL地址（不含域名）   <br>
__ACTION__：会替换成当前操作的URL地址 （不含域名）    <br>
__SELF__： 会替换成当前的页面URL  <br>

</body>
</html>