<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-30
 * Time: 下午2:56
 * 系统函数
 */
$dirname = "./webgrind";
function fordir($dirname)
{
//打开目录资源
    $dir = opendir($dirname);
//echo readdir($dir).'<br>';
    readdir($dir);
    readdir($dir);
    while ($file = readdir($dir)) {
        $file = $dirname . "/" . $file;
        if (is_dir($file)) {
            echo "目录：{$file}<br>";
        } else {
            echo "文件：{$file}<br>";
        }
    }
//关闭
    closedir($dir);
}

fordir($dirname);

/*
 * 递归函数：在函数中调用自己。
 */
function test($n)
{
    echo $n . '<br>';
    if ($n > 0)
        test($n - 1);
    else
        echo "-------------<br>";
    echo $n . "<br>";
}

test(10);
