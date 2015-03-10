<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/10
 * Time: 14:38
 */
$filename = "message.txt";
//如果用户提交了，就写入文件，按一定格式写入
if (isset($_POST['dosubmit'])) {
    //字段的分隔使用||，行的分隔使用[n]
    $mess = "{$_POST['username']}||" . time() . "||{$_POST['title']}||{$_POST['content']}[n]";
    writemessage($filename, $mess);
}

if (file_exists($filename)) {
    readmessage($filename);
}
function writemessage($filename, $mess)
{
    $fp = fopen($filename, "a");
    if (flock($fp, LOCK_EX + LOCK_NB)) {
        fwrite($fp, $mess);
        flock($fp, LOCK_UN + LOCK_NB);
    } else {
        echo "写入锁定失败";
    }

    fclose($fp);
}

function readmessage($filename)
{
//    $mess = file_get_contents($filename);
    $mess = "";
    $fp = fopen($filename, "r");
    flock($fp, LOCK_SH + LOCK_NB);
    while (!feof($fp)) {
        $mess .= fread($fp, 1024);
    }
    flock($fp, LOCK_UN + LOCK_NB);
    $mess = rtrim($mess, "[n]");    //删除字符串末尾的[n]
    $arrmess = explode("[n]", $mess);
    foreach ($arrmess as $n) {
        list($username, $dt, $title, $content) = explode("||", $n);
        echo "<b>{$username}</b>," . date("Y-m-d H:i", $dt) . ":<i>{$title}</i>,<u>{$content}</u><br><hr><br>";
    }
    fclose($fp);
}

?>


<form action="messageBoard.php" method="post">
    用户：<input type="text" name="username" value=""/><br>
    标题：<input type="text" name="title" value=""/><br>
    内容：<textarea name="content" cols="40" rows="4"></textarea><br>
    <input type="submit" name="dosubmit" value="留言"/><br>
</form>