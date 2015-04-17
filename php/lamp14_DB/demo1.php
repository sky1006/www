<?php
error_reporting(E_ALL & E_NOTICE);
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/13
 * Time: 14:16
 */

//step 1 连接数据库（返回资源）
$link = mysql_connect("115.28.100.155", "yinq", "xin123@#$");
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//step 2 设置操作(设置字符集)
//mysql_query("set names utf8");

//step 3 选择一个数据库作为默认的数据库使用
mysql_select_db("xsphp");
//step 4 操作数据库的SQL语句执行
$sql = "INSERT INTO users(username,passwd,age,sex,email) VALUES('xiaomi3',MD5('111111'),20,'W','xiaomi@163.com')";

$result = mysql_query($sql);

//可以影响行数的函数（判断表是否有变化）
if (mysql_affected_rows() > 0) {
    echo "操作成功!<br>";
} else {
    echo "不成功" . mysql_error();
}

//获取最后插入的id
echo "最后的id是：" . mysql_insert_id();

//step last 关闭连接
mysql_close();