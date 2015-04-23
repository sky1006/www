<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/20
 * Time: 17:48
 */
class UserAction extends Action
{
    public function index()
    {
//        echo "增加用户:{$_GET['name']},年龄：{$_GET['age']}";
        $m = M('Users');
        $arr = $m->select();
        $this->assign('data', $arr);

        $this->display();
    }

    public function del()
    {
        $m = M('Users');
        $id = $_GET['id'];
        $count = $m->delete($id);
        if ($count > 0) {
            $this->success('数据删除成功！');
        } else {
            $this->error('数据删除失败！');
        }
    }

    //显示修改页面
    public function modify()
    {
        $id = $_GET['id'];
        $m = M('Users');
        $arr = $m->find($id);
        $this->assign('data', $arr);

        $this->display();
    }
/*
 * 显示修改页面
 */
    public function update(){
        $m=M('Users');
        $data['id']=$_POST['id'];
        $data['username']=$_POST['username'];
        $data['sex']=$_POST['sex'];
        $data['age']=$_POST['age'];
        $data['email']=$_POST['email'];
        $count=$m->save($data);
        if($count>0){
            $this->success('数据修改成功！','index');
        }else{
            $this->error('数据修改失败！');
        }
    }
    /*
     * 添加用户页面
     */
    public function add(){
        $this->display();
    }

    public function create(){
        $m=M('Users');
        $m->username=$_POST['username'];
        $m->sex=$_POST['sex'];
        $m->age=$_POST['age'];
        $m->email=$_POST['email'];

        $idNum=$m->add();
        if($idNum>0){
            $this->success('数据添加成功','index');
        }else{
            $this->error('数据添加失败');
        }
    }
} 