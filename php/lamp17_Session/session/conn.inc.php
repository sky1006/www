<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/3
 * Time: 15:05
 */
include "config.inc.php";

try {
    $pdo = new PDO(DSN, DBUSER, DBPASS);
} catch (PDOException $e) {
    echo "ERROR:" . $e->getMessage();
}
