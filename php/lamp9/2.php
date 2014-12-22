<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-9
 * Time: 上午11:34
 *
 * 正则表达式的编写
 *      1、就是一种语言，开发思想放进去
 *      2、列需求,一条一条的满足
 */

$str = "
    这是http://www.gjla.com/php/网站,
    这是http://www.gjla.net/php/demo.php网站
    这是http://mail.gjla.org/php/demo.inc.php?username=admin&p=1234网站
    这是https://www.baidu.com网站
    这是http://www.abc.baidu.com网站
    这是ftp://www.gjla.org网站
    这是ftps://www.gjla.org网站
    ";
$reg = "/(https?|ftps?):\/\/(www|mail|bbs|ftp)\.(.*?)\.(net|com|org|cn)([\w-\.\/\=\?\&\%]*)?/";

function preg($reg, $str)
{
    if (preg_match_all($reg, $str, $arr)) {
        echo '<pre>';
        echo "正则表达式<b> {$reg} </b>和字符串<b>{$str}</b>匹配成功！<br>";
        print_r($arr);
        echo '</pre>';
    } else {
        echo "匹配失败！<br>";
    }
}

echo preg($reg, $str) . '<br>';
echo '----------------------------------------------------------<br>';

$email = "
这是yanzi@gj-la.com邮箱
这是yan-zi@gj.la.com邮箱
这是yan_zi@gjla.com邮箱
这是yan+zi+zi+zi@gjla.com邮箱
这是yanzi@gjla.com邮箱
";
$reg1 = '/\w+([+-_]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/i';
echo preg($reg1, $email) . '<br>';