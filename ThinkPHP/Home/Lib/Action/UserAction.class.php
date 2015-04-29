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
    public function update()
    {
        $m = M('Users');
        $data['id'] = $_POST['id'];
        $data['username'] = $_POST['username'];
        $data['sex'] = $_POST['sex'];
        $data['age'] = $_POST['age'];
        $data['email'] = $_POST['email'];
        $count = $m->save($data);
        if ($count > 0) {
            $this->success('数据修改成功！', 'index');
        } else {
            $this->error('数据修改失败！');
        }
    }

    /*
     * 添加用户页面
     */
    public function add()
    {
        $this->display();
    }

    public function create()
    {
        $m = M('Users');
        $m->username = $_POST['username'];
        $m->sex = $_POST['sex'];
        $m->age = $_POST['age'];
        $m->email = $_POST['email'];

        $idNum = $m->add();
        if ($idNum > 0) {
            $this->success('数据添加成功', 'index');
        } else {
            $this->error('数据添加失败');
        }
    }

    //编写search方法，实现搜索
    public function search()
    {
//        var_dump($_POST);
        //获取post的数据，根据数据组装查询条件，根据条件从数据库中获取数据，返回给页面中遍历
        if (isset($_POST['username']) && $_POST['username']!=null) {
            $where['username'] = array('like', "%{$_POST['username']}%");
        }
        if (isset($_POST['sex']) && $_POST['sex']!=null) {
            $where['sex'] = array('eq', "{$_POST['sex']}");
        }

        $m = M('Users');
        $arr = $m->where($where)->select();
        $this->assign('data', $arr);
        $this->display('index');
    }

    public function show()
    {
//        $m=M('Users');
        //字符串方式
//        $arr=$m->where('sex=0')->find();
//        print_r($arr) ;

        //数组方式
//        $data['sex']=0;
//        $data['username']='rongyao';
//        $data['_logic']='or';     //or

        //表达式查询方式
//        $data['age']=array('gt',100);

        //模糊查询
//        $data['username']=array('like','%zi');
//        $data['username']=array('notlike','%zi%');
//        $data['username']=array('like',array('%zi%','%hua%'));
//        $data['username']=array('like',array('%zi%','%hua%'),'and');

        //between
//        $data['age']=array('between',array(30,50));
//        $data['age']=array('not between',array(30,50));

        //in
//        $data['age']=array('in',array(28,33,69));
//        $data['age']=array('not in',array(28,33,69));

        //区间查询
//        $data['id']=array(array('gt',1025),array('lt',1030));
//        $data['id']=array(array('gt',1030),array('lt',1025),'or');
//        $data['username']=array(array('like','%hua%'),array('like','%nok%'),'meizi','or');
//
//        $arr=$m->where($data)->select();
//        var_dump($arr);

//        $c=$m->count();
//        $c=$m->where("username='meizi'")->count();
//        $data['username']='meizi';

//        $c=$m->max('id');
//        $c=$m->where($data)->count();
//        echo $c;
        $m = M();
        $result = $m->query("select * from tb_users where id>1028");
        var_dump($result);
//        $this->assign('data', $arr);
        $this->display();
    }


}