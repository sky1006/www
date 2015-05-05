<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action
{
    public function index()
    {
        /*$this->show('
    <style type="text/css">* {
            padding: 0;
            margin: 0;
        }

        div {
            padding: 4px 48px;
        }

        body {
            background: #fff;
            font-family: "微软雅黑";
            color: #333;
        }

        h1 {
            font-size: 100px;
            font-weight: normal;
            margin-bottom: 12px;
        }

        p {
            line-height: 1.8em;
            font-size: 36px
        }</style>
    <div style="padding: 24px 48px;"><h1>:)</h1>

        <p>欢迎使用 <b>ThinkPHP</b>！</p></div>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
            */

//        $user=new Model('Users');
        $user = M('Users');
        $arr = $user->select();
//        var_dump($arr);
//        $name=$arr[2]['username'];
//        $this->assign('myname',$arr);
//        $arr=$user->where('id=1025')->getField('username');

        //add
        /*    $user->username='nokia1';
            $user->passwd=md5(111111);
            $user->age='23';
            $user->sex='nv';
            $user->email='ads@163.com';
            $user->add();*/


//        var_dump($arr);
        //删除
//        $user->delete(1030);

        //update
        $data['id'] = 1031;
        $data['username'] = 'huawei';
        $data['passwd'] = md5(123);
        $user->save($data);

        $this->display();
    }

    public function show()
    {
        $this->assign('data1', '中文');
        $this->assign('data2', 'english');
        $this->assign('中国', '中国');
        $this->assign('美国', 'Amercian');
        $this->display();
    }

    public function ass(){
        $this->assign('name','小燕子');

        $this->display();
    }
}