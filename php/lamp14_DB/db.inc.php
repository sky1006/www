<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/16
 * Time: 16:49
 */
//连接数据库
mysql_connect("115.28.100.155", "yinq", "xin123@#$") or die("连接失败！");
//选择数据库
mysql_select_db("bookstore") or die("数据库选择失败！");
