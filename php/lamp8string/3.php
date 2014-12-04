<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-3
 * Time: 下午3:43
 *常用的字符串格式化函数
 *
 */

$str = "  hello world! ";
echo $str."---".strlen($str).'<br>';
$nstr = rtrim($str);
echo $nstr."---".strlen($nstr).'<br>';
$nstr = ltrim($str);
echo $nstr."---".strlen($nstr).'<br>';

$nstr = str_pad($str,20,"#",STR_PAD_LEFT);
echo $nstr."---".strlen($nstr).'<br>';

$s = "this is a test Apache MySQL PHP";
echo $s.'<br>';
echo strtoupper($s).'<br>';
echo strtolower($s).'<br>';
echo ucfirst($s).'<br>';
echo ucwords($s).'<br>';
echo ucfirst(strtolower($s)).'<br>';
echo "============================<br>";
$t = "This is a test\n";
$t .="This is a Demo\n";
$t .="This is a hello\n";
echo $t.'<br>';
echo nl2br($t).'<br>';
echo "============================<br>";

$r = "www.gjla.com";
echo $r.'<br>';
echo strrev($r).'<br>';
echo md5($r).'<br>';
echo md5(md5($r)."lamp").'<br>';

$i = "1234567890.123456";
echo $i.'<br>';
echo number_format($i,2,".",",").'<br>';    //格式化货币、数字、时间等

if (isset($_POST['dosubmit'])) {
    $title = $_POST['title'];
//    echo $title.'<br>';
    echo strip_tags($title).'<br>';
//    echo stripslashes(addslashes($title)).'<br>';
    echo htmlspecialchars($title);
}



?>

<br>
<form action="" method="post">
    title:<input type="text" name="title" value="" />

    <input type="submit" name="dosubmit" value="提交" /><br>
</form>
