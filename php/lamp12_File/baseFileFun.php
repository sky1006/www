<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/9
 * Time: 16:13
 */
//创建一个空文件
//touch("./new.txt");

//复制文件
//copy("new.txt","yan.txt");

//移动或重命名
//rename("yan.txt","yanzi.txt");

//删除一个文件
//unlink("yanzi.txt");

//截取文件
//$fp=fopen("new.txt","w");
//ftruncate($fp,100);

//对文件内容的操作
//file_get_contents("");
//file_put_contents("yanzi.txt","我爱你");
//echo file_get_contents("yanzi.txt");
//file_put_contents("baidu.txt",file_get_contents("http://www.baidu.com"));
//readfile("http://www.baidu.com");
$arr = file("yanzi.txt");
echo count($arr) . '<br>';
echo $arr[6];