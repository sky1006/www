<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/2
 * Time: 14:40
 */

//开启session
//1、判断客户端是否有sessionid，变量名为PHPSESSID,直接使用这个sessionid开启会话，就不新创建文件里，直接找这个同名sessionid的session文件
$sid = !empty($_GET[session_name()]) ? $_GET[session_name()] : '';
if ($sid != '') {
    session_id($sid);
}
//可以设置一下用已有的sid开启会话
session_start();


echo '<br>';
print_r($_SESSION);
echo '<br>';
echo '<br>';


echo session_name() . "=" . session_id() . "<br>";
echo session_save_path() . "<br>";

?>

<a href="one.php?<?php echo SID; ?>">one</a><br>
<a href="two.php?<?php echo SID; ?>">two</a><br>
<a href="three.php?<?php echo SID; ?>">three</a><br>