<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/4
 * Time: 17:41
 */

/*$total = disk_total_space("c:");
$free = disk_free_space("c:");
echo "c:盘的总大小：".round($total/pow(2,30)).'<br>';
echo "C：盘的可用空间：".round($free/pow(2,30)).'<br>';*/

//统计一个目录下的文件和目录个数
$dirn = 0;    //目录树
$filen = 0;   //文件数
function getdirnum($file)
{
    global $dirn;
    global $filen;
    $dir = opendir($file);
    while ($filename = readdir($dir)) {
        if ($filename != "." && $filename != "..") {
            $filename = $file . "/" . $filename;
            if (is_dir($filename)) {
                $dirn++;
                getdirnum($filename);   //递归，就可以查看所有子目录
            } else {
                $filen++;
            }
        }
    }

    closedir($dir);

}

getdirnum("../div");
echo "目录数为：{$dirn}<br>";
echo "文件数为：{$filen}<br>";

echo "*****************************<br>";

function dirsize($file)
{
    $size = 0;
    $dir = opendir($file);
    while ($filename = readdir($dir)) {
        if ($filename != "." && $filename != "..") {
            $filename = $file . "/" . $filename;
            if (is_dir($filename)) {
                $size += dirsize($filename);
            } else {
                $size += filesize($filename);
            }
        }
    }

    closedir($dir);
    return $size;
}

echo "div目录大小为：" . (dirsize("../div") / pow(1024, 2)) . "MB<br>";

// linux    exec("du -shm div")