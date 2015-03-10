<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/10
 * Time: 16:56
 */
include "uploadFileClass.php";
$up = new uploadFileClass();
//设置属性（上传的位置，大小，类型，名字是否随机生成）
$up->set("path", "./uploads/");
$up->set("maxsize", 2000000);
$up->set("allowtype", array("gif", "png", "jpg"));
$up->set("israndname", false);

//使用对象中的upload方法，就可以上传文件,方法需要传一个表单的名字pic，如果成功返回true，失败返回false
if ($up->upload("pic")) {
    echo '<pre>';
    //获取上传后文件名字
    var_dump($up->getFileName());
    echo '</pre>';
} else {
    echo '<pre>';
    //获取上传失败后的错误提示
    var_dump($up->getErrorMsg());
    echo '</pre>';
}