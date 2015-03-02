<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/2
 * Time: 17:28
 */
//获取文件属性的函数
function getFilePro($filename)
{
    //文件是否存在
    if (file_exists($filename)) {
        echo "这个文件存在<br>";

        //获取文件的类型
        getFileType($filename);
        if (is_dir($filename)) {
            echo "这是一个目录<br>";
        }
        if (is_file($filename)) {
            echo "这是一个文件<br>";
            echo "文件大小为：" . tosize(filesize($filename)) . '<br>';
        }
        //获取文件的权限
        if (is_readable($filename)) {
            echo "文件可读<br>";
        }
        if (is_writable($filename)) {
            echo "文件可写<br>";
        }
        if (is_executable($filename)) {
            echo "文件可执行<br>";
        }

        //创建时间
        echo date("Y-m-d H:i:s", filectime($filename)) . '<br>';
        //访问时间
        echo date("Y-m-d H:i:s", fileatime($filename)) . '<br>';
        //修改时间
        echo date("Y-m-d H:i:s", filemtime($filename)) . '<br>';

    } else {
        echo "这个文件不存在<br>";
    }
}

//文件大小的转换函数
function tosize($size)
{
    $s = $size;
    $dw = '';
    if ($size > pow(2, 40)) {
        $s = $size / pow(2, 40);
        $dw = "TB";
    } elseif ($size > pow(2, 30)) {
        $s = $size / pow(2, 30);
        $dw = "GB";
    } elseif ($size > pow(2, 20)) {
        $s = $size / pow(2, 20);
        $dw = "MB";
    } elseif ($size > pow(2, 10)) {
        $s = $size / pow(2, 10);
        $dw = "KB";
    } else {
        $s = $size;
        $dw = "types";
    }
    return $s . $dw;
}

//获取文件的类型
function getFileType($filename)
{
    //fifo，char，dir，block，link，file 和 unknown
    switch (filetype($filename)) {
        case 'dir':
            echo "这是一个目录<br>";
            break;
        case 'char':
            echo "这是一个字符设备<br>";
            break;
        case 'fifo':
            echo "这是一个命名管道<br>";
            break;
        case 'block':
            echo "这是一个块设备<br>";
            break;
        case 'link':
            echo "这是一个链接符号<br>";
            break;
        case 'file':
            echo "这是一个普通文件<br>";
            break;
        default:
            echo "未知的文件类型<br>";

    }
}

getFilePro("./yanzi/yan.txt");