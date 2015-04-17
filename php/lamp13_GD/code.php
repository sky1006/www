<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/11
 * Time: 17:21
 */
//开启session
session_start();
include "Vcode.php";
//构造方法
$vcode = new Vcode(80, 30, 4);
//将验证码放到服务器自己的空间保存一份
$_SESSION['code'] = $vcode->getcode();
//将验证码图片输出
$vcode->outimg();
