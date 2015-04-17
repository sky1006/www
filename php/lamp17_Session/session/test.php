<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/8
 * Time: 15:52
 */
include "conn.inc.php";
include "DBSession.php";

$_SESSION['username'] = "yanzi";
$_SESSION['age'] = 29;
echo session_id() . "<br>";
/*$sql = "insert into session(sid, sdata, utime, uip, uagent) values(?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);

$stmt->execute(array($sid, $data, $ctime, $uip, $uagent));*/