<?php

/*
 *  自己定义session存储数据库方式的类
 *
 */


class DBSession
{
    public static $pdo;             //pdo的对象
    public static $ctime;           //当前时间
    public static $maxlifetime;     //最大的生存时间
    public static $uip;             //用户正在用的ip
    public static $uagent;          //用户正在用的浏览器

    //开启和初使化使用的, 参数需要一个路
    public static function start(PDO $pdo)
    {

        self::$pdo = $pdo;
        self::$ctime = time();
        self::$maxlifetime = ini_get("session.gc_maxlifetime");
        self::$uip = '192.168.1.111';
        self::$uagent = "ie";


        //注册过程， 让PHP自己处理session时，找这个函数指定的几个周期来完成
        session_set_save_handler(
            array(__CLASS__, "open"),
            array(__CLASS__, "close"),
            array(__CLASS__, "read"),
            array(__CLASS__, "write"),
            array(__CLASS__, "destroy"),
            array(__CLASS__, "gc"));

        session_start();  //开启会话

    }

    // 开启时， session_start()
    public static function open($path, $name)
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


    }

    //写入 $_SESSION['username'] = "meizi";
    public static function write($sid, $data)
    {
        $r = new ReflectionClass(self::$pdo);
        print_r($r->getMethods());
        //通过sid获取已经有的数据
        $sql = "select * from session where sid = ?";

        $stmt = self::$pdo->prepare($sql);

        $stmt->execute(array($sid));

        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        //如果已经获取到了数据，就不插入而更新
        if ($result) {
            //如果数据和原来的不样才更新
            if ($result['sdata'] != $data || $result['utime'] + 10 < self::$ctime) {

                $sql = "update session set sdata = ?, utime = ? where sid=?";

                $stmt = self::$pdo->prepare($sql);

                $stmt->execute(array($data, self::$ctime, $sid));
            }

            //如果没有数据，就新插入一条数据
        } else {


            if (!empty($data)) {

                $sql = "insert into session(sid, sdata, utime, uip, uagent) values(?, ?, ?, ?, ?)";

                $stmt = self::$pdo->prepare($sql);

                $stmt->execute(array($sid, $data, self::$ctime, self::$uip, self::$uagent));
            }
            echo '<br>1111111<br>';
        }

    }

    //销毁 session_destroy()
    public static function destroy($sid)
    {


    }

    //回收垃圾
    public static function gc($maxlifetime)
    {


    }


}

//开启
DBSession::start($pdo);


