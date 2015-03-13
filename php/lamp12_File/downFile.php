<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/11
 * Time: 10:45
 */
$filename = "yan.txt";
//不是必须的，设置类型
header("Content-Type:text/html");
//当成附件来处理，浏览器就形成下载或打开
header("Content-Disposition:attachment;filename={$filename}");
//设置大小
header("Content-Length:" . filesize($filename));
//将文件内容全部输出
readfile("./yanzi/" . $filename);