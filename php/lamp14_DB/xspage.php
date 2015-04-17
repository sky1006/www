<?php
error_reporting(E_ALL & E_NOTICE);
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/16
 * Time: 15:59
 */
header("Content-Type:text/html;charset=utf-8");
include "page.class.php";
//连接数据库
$link = mysql_connect("115.28.100.155", "yinq", "xin123@#$");
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

//选择一个数据库作为默认的数据库使用
mysql_select_db("xsphp");

//获取总记录数
$sql = "select count(*) as total from users";
$result = mysql_query($sql);
$data = mysql_fetch_assoc($result);
//创建分页对象
$page = new Page($data['total'], 10, "", false);
$page->set("head", "个用户");
$page->set("first", "|<");
$page->set("prev", "|<<");
$page->set("next", ">>|");
$page->set("last", ">|");

echo "当前页为：" . $page->page . "<br>";
//执行sql
$sql = "select id, username,age,sex,email from users order by id {$page->limit}";
$result = mysql_query($sql);

echo '<table border="1" width="900" align="center">';
echo '<caption><h1>USERS</h1></caption>';

echo '<tr>';
echo '<th>ID</th>';
echo '<th>NAME</th>';
echo '<th>AGE</th>';
echo '<th>SEX</th>';
echo '<th>EMAIL</th>';
echo '</tr>';
while (list($id, $username, $age, $sex, $email) = mysql_fetch_row($result)) {
    echo '<tr>';
    echo "<td>{$id}</td>";
    echo "<td>{$username}</td>";
    echo "<td>{$age}</td>";
    echo "<td>{$sex}</td>";
    echo "<td>{$email}</td>";
    echo '</tr>';
}
//使用fpage()方法，获取分页内容
echo '<tr><td colspan="5" align="right">' . $page->fpage(3, 4, 5, 6, 7, 0) . '</td></tr>';
echo '</table>';
//关闭
mysql_close();
