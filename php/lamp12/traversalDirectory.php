<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/4
 * Time: 16:39
 */
//print_r(glob("./*.php"));
foreach (glob("../lamp10/*.php") as $filename) {
    echo $filename . '<br>';
}
echo "*********************.<br>";
//打开目录资源
$dir = opendir("../div");
while ($filename = readdir($dir)) {
    if ($filename != "." && $filename != "..") {
        //一定要注意路径，找对才可以
        $filename = "../div/" . $filename;
        if (is_dir($filename)) {
            echo "目录:" . $filename . '<br>';
        } else {
            echo "文件:" . $filename . '<br>';
        }
    }

}
rewinddir($dir);
echo "@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br>";
while ($filename = readdir($dir)) {
    if ($filename != "." && $filename != "..") {
        //一定要注意路径，找对才可以
        $filename = "../div/" . $filename;
        if (is_dir($filename)) {
            echo "目录:" . $filename . '<br>';
        } else {
            echo "文件:" . $filename . '<br>';
        }
    }

}
//关闭这个资源
closedir($dir);
