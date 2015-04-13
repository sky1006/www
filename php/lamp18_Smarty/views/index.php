<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/13
 * Time: 17:37
 */
include "init.inc.php";

$smarty->assign("var", "!!!!!!!!!!!!!!");
$smarty->assign(array("title" => "1111", "author" => "22222", "content" => "this is demo"));

class Person
{
    public $name = "yanzi";
    public $sex = "nv";

    public function say()
    {
        echo "this is a {$this->name} and {$this->sex}";
        return $this;
    }

    function eat()
    {
        echo "good very!";

    }
}

$smarty->assign("yz", new Person());

$smarty->assign("arr1", array("one", "two", "three"));
$smarty->assign("arr2", array("hello" => array("one", "two", "three")));

$smarty->display("index.tpl");