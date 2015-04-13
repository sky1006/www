<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/13
 * Time: 16:50
 */
//define("ROOT","D:/wamp/www");
define("ROOT", str_replace("\\", "/", dirname(__FILE__)) . "/");
include "./libs/Smarty.class.php";

$smarty = new Smarty();
//这是smarty2时期的用法
//$smarty->template_dir="./views/";
//$smarty->compile_dir="./comps/";

//以下是smarty3的用法
$smarty->setTemplateDir(ROOT . "./views/");
$smarty->setCompileDir(ROOT . "./comps/");
//$smarty->addTemplateDir("./home/");

//可以让定界符使用空格
$smarty->auto_literal = false;

//设置定界符号
$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";