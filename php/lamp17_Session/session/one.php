<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/2
 * Time: 14:32
 */
// 开启会话session（cookie不用）
//session_start()前面不能有任何输出，这个函数向客户端发一个session_id保存
//在cookie中。还在服务器中创建一个和保存在客户端同名的session文件（文本）
//调度PHP的机制使用session；
$sid = !empty($_GET[session_name()]) ? $_GET[session_name()] : '';
if ($sid != '') {
    session_id($sid);
}
//可以设置一下用已有的sid开启会话
session_start();
$_SESSION['abc'] = "hello";
//使用$_SESSION这个数组
$_SESSION['username'] = "yanzi";
$_SESSION['age'] = 18;
$_SESSION['sex'] = "nv";

$_SESSION['lx']['email'] = "yanzi@qq.com";
$_SESSION['lx']['phone'] = '119';

echo session_name() . "=" . session_id() . "<br>";

?>
<!--<a href="one.php?<?php /*echo session_name()."=".session_id();*/ ?>">one</a><br>
<a href="two.php?<?php /*echo session_name()."=".session_id();*/ ?>">two</a><br>
<a href="three.php?<?php /*echo session_name()."=".session_id();*/ ?>">three</a><br>-->
<a href="one.php?<?php echo SID; ?>">one</a><br>
<a href="two.php?<?php echo SID; ?>">two</a><br>
<a href="three.php?<?php echo SID; ?>">three</a><br>
