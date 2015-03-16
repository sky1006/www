<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/13
 * Time: 17:19
 */
include "Page.php";
$page = new Page(98, 10);
echo $page->fpage(2, 3, 4, 5, 6);
