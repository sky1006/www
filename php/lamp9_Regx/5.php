<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-16
 * Time: 下午5:07
 * 去掉文件名中包含的空格
 */
$mydir = "E:\\2014-09-05";
//$mydir = "/alidata1/backup/2014-09-05";
//echo $mydir . '<br>';
function getFileName($url)
{
    $loc = strrpos($url, "\\") + 1;
    return substr($url, $loc);
}

function getName($filename)
{
    return str_replace(" ", "", $filename);
}

function getfile($filedir)
{
    foreach (glob("$filedir\*.jpg") as $filename) {
        //    echo $filename.'<br>';
        if (strstr($filename, " ")) {
            //  $filename=str_replace(" ","\ ",$filename);
            $f1 = getFileName($filename);
            $filename = getName($f1);
//            $f2 = $filedir.'/'.$f1;
//            $f3 = $filedir.'/'.$filename;
//            echo $f1.'<br>';
//            echo $filename.'<br>';
            rename("$filedir\\$f1", "$filedir\\$filename");
        }

    }
    //   return $filename . '<br>';
}

getfile($mydir);
?>




