<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/5
 * Time: 13:18
 */
class LoginAction extends Action{
    function index(){

        $this->display();
    }

    function do_login(){
        //获取用户名和密码等，和数据库中比对，有该用户允许登录，否则输出错误
        $username=$_POST['username'];
        $password=$_POST['password'];
        $code=$_POST['code'];

        if($_SESSION['verify']!==md5($code)){
            $this->error('验证码错误！');
        }
        $m=M('Users');
        $where['username']=$username;
        $where['pasword']=$password;
//        $where['code']=$code;
        $i=$m->where($where)->count();
        if($i>0){
            $this->redirect('User/index');
        }else{
            $this->error('该用户不存在！');
        }
    }


}