<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/16
 * Time: 16:52
 */
//设置utf-8字符集
header("Content-Type:text/html;charset=utf-8");
//显示所有报告但不报告注意
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
//设置时区
date_default_timezone_set("PRC");

//分页显示数量
$num = 15;
$waterimg = "php.gif";