<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/2
 * Time: 16:00
 * UNIX系统中7中文件类型：
 * block--块设备，如某个磁盘分区，软驱，光驱等
 * char--字符设备是指在I/O传输过程中以字符为单位进行传输的设备，如键盘、打印机等
 * dir--目录类型，目录也是文件的一种
 * fifo--命名管道
 * file--普通文件类型，如文本文件或可执行文件等
 * link--符号链接，是指向文件指针的指针，类似windows中的快捷方式
 * unknown--未知类型
 */
echo filetype("./yanzi") . '<br>';
echo filetype("./yanzi/yan.txt") . '<br>';

if (is_dir("./yanzi")) {
    echo "这是一个目录.<br>";
} else {
    echo "这是一个文件.<br>";
}
