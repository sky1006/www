<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/2/16
 * Time: 15:06
 * 默认写到web服务器（apache）的错误日志中
 *
 * 配置php.ini
 * -- error_reporting=E_ALL //向php发送每个错误
 * -- display_errors=Off //不显示错误报告
 * -- log_errors=On  //决定日志语句记录的位置
 * -- log_errors_max_log=1024   //每个日志项的最大长度
 * -- error_log=/usr/php.log    //指定错误写进的文件
 *
 * 使用函数：在php文件中使用error_log()来记录日志，就可以将信息写入到myerror.log文件中
 * 如：error_log("密码错误");
 */
ini_set("display_errors", "Off");
getType($a);
echo "11111111111111<br>";
//getType();
echo "2222222222<br>";
echo "数据库连接超时！";
//gettype3();
echo "3333333<br>";