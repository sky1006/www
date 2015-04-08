<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/8
 * Time: 15:52
 */
include "conn.inc.php";
include "sessionDB.php";

$_SESSION['username'] = "yanzi";
$_SESSION['age'] = 29;
echo session_id() . "<br>";
