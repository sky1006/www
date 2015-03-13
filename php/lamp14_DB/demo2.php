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
$sql = "select * from users";

$result = mysql_query($sql);

//从结果集这个资源中获取我们想要的结果，按我们的方式或格式显示
/*
 * mysql_fetch_row($result) //索引数组  第一列下标为0，第二列位1……
 * mysql_fetch_assoc($result) //关联数组  下标是字段名称
 * mysql_fetch_array($result，MYSQL_NUM) //索引数组和关联数组的结合（MYSQL_ASSOC关联，MYSQL_NUM索引和MYSQL_BOTH默认的两个都返回）--不建议
 * mysql_fetch_object($result) //返回一个对象，返回成员属性就是字段名称  --不建议
 *
 * 返回的结果的数据格式不同
 * 1.返回默认指针指向的哪条记录的结果
 * 2.默认指针指向第一条（可以使用mysql_data_seek改变自己定义的指定位置）
 * 3.获取一条以后，指针自动下移，再使用同样的函数，则是获取下一条的
 * 4.如果是最后一条，没有记录，再获取后返回false
 *
 */
echo '<table border="1" width="800" align="center">';
//获取列的信息
echo '<tr>';
for ($i = 0; $i < mysql_num_fields($result); $i++) {
    echo '<th>' . mysql_field_name($result, $i) . '</th>';
}
echo '</tr>';
//获取记录的信息
while ($row = mysql_fetch_assoc($result)) {
    //   print_r($row);
    echo '<tr>';

    foreach ($row as $col) {
        echo '<td>' . $col . '&nbsp;</td>';
    }
    echo '</tr>';
}
echo '</table>';
echo "共有" . mysql_num_rows($result) . "条记录！" . mysql_num_fields($result) . "个字段！<br>";


//step last 关闭连接
mysql_close();