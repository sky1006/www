<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/3
 * Time: 16:30
 * 自定义session存储File方式的类
 *
 */
class FileSession
{
    private static $path = "d:/wamp/sessionfile/";

    //开启和初始化使用的，参数需要一个路径
    public static function start($path = "d:/wamp/sessionfile/")
    {
        self::$path = $path;
        //注册过程，让PHP自己处理SESSION时，找这个函数指定的几个周期来完成
        session_set_save_handler(
            array(__CLASS__, "open"),
            array(__CLASS__, "close"),
            array(__CLASS__, "read"),
            array(__CLASS__, "write"),
            array(__CLASS__, "destroy"),
            array(__CLASS__, "gc"));
        session_start();    //开启会话
    }

//开启时，session_start()
    public static function  open($path, $name)
    {
        return true;
    }

//关闭
    public static function close()
    {
        return true;
    }

//读取 echo $_SESSION['username']
    public static function read($sid)
    {

        $filename = self::$path . "yz_" . $sid;
        return @file_get_contents($filename);
    }

//写入$_SESSION['username']="yanzi"
    public static function write($sid, $data)
    {

        $filename = self::$path . "yz_" . $sid;
//    echo $filename.'<br>';
//    echo $data;
        return file_put_contents($filename, $data);
    }

//销毁session_destory()
    public static function destroy($sid)
    {

        $filename = self::$path . "yz_" . $sid;
        return @unlink($filename);
    }

//垃圾回收
    public static function gc($maxlifetime)
    {

        foreach (glob(self::$path . "yz_*") as $file) {
            //只删除过期的
            if (filemtime($file) + $maxlifetime < time()) {
                unlink($file);
            }
        }
    }


}

//开启会话
FileSession::start();
