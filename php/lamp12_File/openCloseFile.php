<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/9
 * Time: 16:31
 *
 * fopen("位置URL","r");
 * ftell  --返回文件指针读/写的位置
 * fseek  --在文件指针中定位
 * rewind   --倒回文件指针的位置
 */
//打开
$fp = fopen("yanzi.txt", "r");

//while(!feof($fp)) {
//    echo fgetc($fp);      //一次读一个字符
//}

//while(!feof($fp)){
//    echo fgets($fp)."<br>";     //一次读一行
//}
//echo fread($fp,filesize("yanzi.txt"));

//while(!feof($fp)){
//    echo fread($fp,1024);
//}

echo ftell($fp) . '<br>';
fseek($fp, 4);
echo ftell($fp) . '<br>';
echo fread($fp, 10) . '<br>';
echo ftell($fp) . '<br>';
fseek($fp, -3, SEEK_END);
echo fread($fp, 3) . '<br>';
rewind($fp);
echo ftell($fp) . '<br>';

//关闭
fclose($fp);