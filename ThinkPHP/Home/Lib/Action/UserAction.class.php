<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/20
 * Time: 17:48
 */
class UserAction extends Action
{
    public function add()
    {
        echo "增加用户:{$_GET['name']},年龄：{$_GET['age']}";
    }
} 