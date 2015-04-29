<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/29
 * Time: 18:22
 */

class Model {
    private $tabName=null;
    private $sql=null;
    private $where=null;

    function __construct($tabName){
        $this->tableName=$tabName;
        mysql_connect('115.28.100.155','yinq','xin123@#$');
        mysql_select_db('xsphp');
    }

    function where($_where){
        $this->where=$_where;
    }

    function select(){
        $arr=array();
        $this->sql="select * from tb_".strtolower($this->tableName)." where {$this->where}";
        $result=mysql_query($this->sql);
        if($result && mysql_num_rows($result)>0){
            while($res=mysql_fetch_assoc($result)){
                $arr[]=$res;
            }
        }
        return $arr;
    }

    function getSql(){
        return $this->sql;
    }

}

$m=new Model('Users');
$m->where('id>1030');
$arr=$m->select();
var_dump($arr);
echo "<br>";
echo $m->getSql();