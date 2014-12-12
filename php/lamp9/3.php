<form action="" method="post">
    username:<input type="text" name="username" value=""/><br>
    email:<input type="text" name="email" value=""/><br>
    url:<input type="text" name="url" value=""/><br>

    <input type="submit" name="dosubmit" value="submit"><br>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-9
 * Time: 下午4:17
 *
 * 分割、匹配、查找、替换
 *  1、字符串处理函数（处理快，但有一些做不到）
 *  2、正则表达式函数（功能强大，但效率要低一些）
 * 注意：如果可以直接使用字符串处理函数处理的字符串，就不要使用正则表达式
 *
 * 匹配查找：
 *      strstr  strpos  substr
 * 正则匹配查找：
 *      preg_match()    preg_match_all()    preg_grep()
 *
 * 分割：
 *      explode()   implode()   -- join()
 * 正则表达式
 *      preg_split()
 */
$str = "This 5 is 8 a 9 test!";
if (strstr($str, "test")) {
    echo "存在" . '<br>';
} else {
    echo "不存在" . '<br>';
}

if (strpos($str, "b")) {
    echo "存在" . '<br>';
} else {
    echo "不存在" . '<br>';
}

function getFileName($url)
{
    $loc = strrpos($url, "/") + 1;
    return substr($url, $loc);
}

echo getFileName("http://www.gjla.com/aaaa/demo.php") . '<br>';
echo getFileName("http://www.baidu.com/images/logo.gif") . '<br>';

if (preg_match("/\d/", $str)) {
    echo "存在！" . '<br>';
} else {
    echo "不存在！" . '<br>';
}

if (isset($_POST['dosubmit'])) {
    if (!preg_match("/^\S+$/", $_POST['username'])) {
        echo "用户名不能为空！" . '<br>';
    }

    if (!preg_match("/\w+([+-_]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/i", $_POST['email'])) {
        echo "不是正确email格式！" . '<br>';
    }

    if (!preg_match("/(https?|ftps?):\/\/(www|mail|bbs|ftp)\.(.*?)\.(net|com|org|cn)([\w-\.\/\=\?\&\%]*)?/", $_POST['url'])) {
        echo "不是正确url格式！" . '<br>';
    }

    if (preg_match("/(https?|ftps?):\/\/(www|mail|bbs|ftp)\.(.*?)\.(net|com|org|cn)([\w-\.\/\=\?\&\%]*)?/", $_POST['url'], $arr)) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';

        echo "完整的URL是 {$arr[0]} <br>";
        echo "协议是 {$arr[1]} <br>";
        echo "主机是 {$arr[2]} <br>";
        echo "域名是 {$arr[3]} <br>";
        echo "顶层域名是： {$arr[4]} <br>";
        echo "资源参数是： {$arr[5]} <br>";
    }
}

echo '--------------------------------------------------------<br>';
$s = "我们的网站上：http://www.gjla.com/aaa/bb.php?abc=www这个。
我们的另一个：http://www.baidu.com/aa/bb/cc/demo.php?username=admin这个
第三个:http://www.google.com/hk/a.php?a=b这个";
if (preg_match_all("/(https?|ftps?):\/\/(www|mail|bbs|ftp)\.(.*?)\.(net|com|org|cn)([\w-\.\/\=\?\&\%]*)?/", $s, $arr, PREG_SET_ORDER)) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';

    foreach ($arr as $ar) {
        echo "完整的URL是： {$ar[0]} <br>";
        echo "协议是： {$ar[1]} <br>";
        echo "主机是： {$ar[2]} <br>";
        echo "域名是： {$ar[3]} <br>";
        echo "顶层域名是： {$ar[4]} <br>";
        echo "资源参数是： {$ar[5]} <br>";
    }
}

echo '--------------------------------------------------------<br>';
$arr = array("abc1", "he llo2", "world", "ni hao");
$content = preg_grep('/\s/', $arr);
print_r($content);
echo '<br><br><br>';

echo '-----------------------------<b>分割</b>-------------------------<br>';
$s1 = "this is a test,
hello world,
ni hao.";
print_r(explode(" ", $s1));
echo '<br><br><br>';
print_r(preg_split('/[.,!? ]/', $s1));
echo '<br><br><br>';

/*
 * 替换
 *      字符串处理：str_replace()
 *      正则表达式：preg_replace()
 */
$s2 = "http://www.gjla.com/php/demo.php";
$num = 0;
$newstr = str_replace("php", "java", $s2, $num);
echo $s2 . '<br>';
echo $newstr . '<br>';
echo "替换的次数为：{$num}<br>";

//非法关键字：正常  强哥  妹子
$s3 = "这是一句正常的妹子句子，但里面强哥有些不能显示的文字";
$num1 = 0;
$ns = str_replace(array("正常", "强哥", "妹子"), "**", $s3, $num1);
$ns2 = str_replace(array("正常", "强哥", "妹子"), array("很正常", "帅哥", "漂亮"), $s3, $num1);
echo $s3 . '<br>';
echo $ns . '<br>';
echo $ns2 . '<br>';
echo "替换的次数为：{$num1}<br>";
echo '--------------------------------------------------------<br>';

$s4 = "看了这个，对<b>搜房</b>这家公司也是醉了。<font color='red'> 莫天全应该能看到吧</font>? 股价跌得
厉害也别整天上电视了，赶紧改善一下工作条件比啥都强。<u>我对互联网公司用慢速网络</u>我对互联网公司用慢速网络和烂电脑表示严重反感。";
$html = "/\<[\/\!]*?[^\<\>]*?\>/is";
$ns3 = preg_replace($html, "", $s4, 4, $count);
echo $s4 . '<br>';
echo $ns3 . '<br>';
echo "替换的次数为：{$count}<br>";
