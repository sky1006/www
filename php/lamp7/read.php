<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-21
 * Time: 上午11:26
 */
include "toString.php";
//读出字符串从文件中
$str = file_get_contents("objstr.txt");

//返串行化
$p=unserialize($str);
$p->say();