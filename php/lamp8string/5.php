<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-4
 * Time: 上午10:57
 *
 */

//不用PHP函数，用function反转字符串
$str = "www.gjla.com";
echo strrev($str) . '<br>';
function fan($str)
{
    $n = '';
    $m = strlen($str) - 1;
    for ($i = $m; $i >= 0; $i--) {
        $n .= $str{$i};
    }
    return $n;
}

echo fan($str) . '<br>';

//写一个函数，将一个字符串（如；1234567890），转成（如1，234，567，890）每3位用逗号隔开的形式
$i = "1234567894565123233";
echo $i . '<br>';
echo number_format($i) . '<br>';
function nformat($i)
{
    $n = '';
    $m = strlen($i);
    $k = $m % 3; //让整个长度和3取余之后，余数是多少 =1
    for ($j = 0; $j < $m; $j++) {
        if ($j % 3 == $k && $j != 0) {
            $n .= ",";
        }
        $n .= $i{$j};
    }
    return $n;
}

echo nformat($i) . '<br>';

//请写一个获取文件扩展名的函数
function extname($url)
{
    if (strstr($url, "?")) {
        list($file) = explode("?", $url); //如果有问号格式的文件，将问号前的文件取出给变量$file
    } else {
        $file = $url;
    }
    //以下是第二步取出文件名
    $loc = strrpos($file,"/")+1;
    $filename = substr($file,$loc);
    //以下是第三步取扩展名称
    $arr = explode(".",$filename);
//    print_r($arr);
    return array_pop($arr);
}

echo extname("http://www.gjla.com/activity/tologon.php?username=abc") . '<br>';
echo extname("tologon.php?username=abc") . '<br>';
echo extname("c:\file\tologon.txt") . '<br>';

/*
 * 写一个函数，算出两个文件的相对路径
如：$a='/a/b/c/d/e.php'
    $b='/a/b/12/34/c.php'
计算出$b相对于$a的相对路径应该是 ../../c/d
1、将公共目录去除
2、回到同级目录并进入另一个目录
*/
function abspath($a,$b) {
    $path = "";
    $a = dirname($a);   //  /a/b/c/d
    $b = dirname($b);   //  /a/b/12/34
    $a = trim($a,"/");  //  a/b/c/d
    $b = trim($b,"/");  //  a/b/12/34
    $a = explode("/",$a);   //  array("a","b","c","d")
    $b = explode("/",$b);   // array("a","b","12","34")
    // $a = explode("/",trim(dirname($a),"/"));
    $num = max(count($a),count($b));
    for($i=0;$i<$num;$i++) {
        if ($a[$i] == $b[$i]) {
            unset($a[$i]);
            unset($b[$i]);
        }else{
            break;
        }
    }
//    echo count($b).'<br>';
    //2、回到同级目录并进入另一个目录
    $path=str_repeat("../",count($b)).implode("/",$a);
    return $path;
}

$a = "/a/b/c/d/e.php";
$b = "/a/b/12/34/56/c.php";
echo abspath($a,$b).'<br>';