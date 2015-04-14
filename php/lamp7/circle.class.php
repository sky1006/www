<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-27
 * Time: 下午4:52
 */
class Circle extends Shape
{
    private $r;

    function __construct($arr = array())
    {
        if (!empty($arr)) {
            $this->r = $arr['r'];
        }
        $this->name = "圆";
    }

    function area()
    {
        return pi() * $this->r * $this->r;
    }

    function zhou()
    {
        return 2 * pi() * $this->r;
    }

    function view()
    {
        $form = '<form action="reg.php?action=circle" method="post">';
        $form .= $this->name . '的半径:<input type="text" name="r" value="' . $_POST['r'] . '" /><br>';

        $form .= '<input type="submit" name="dosubmit" value="计算"><br>';
        $form .= '<form>';
        echo $form;
    }

    function yan($arr)
    {
        $br = true;
        if ($arr['r'] < 0) {
            echo "圆半径不能小于0！<br>";
            $br = false;
        }
        return $br;
    }
}