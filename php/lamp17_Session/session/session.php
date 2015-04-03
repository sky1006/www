<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/3
 * Time: 16:30
 * 打开
 *
 * 关闭
 *
 * 读取
 *
 * 写入
 *
 * 销毁
 *
 * 回收
 *
 */

//注册过程，让PHP自己处理SESSION时，找这个函数指定的几个周期来完成
session_set_save_handler("open", "close", "read", "write", "destroy", "gc");
//开启时，session_start()
function open()
{
    echo "open.......<br>";
}

//关闭
function close()
{
    echo "close.......<br>";
}

//读取 echo $_SESSION['username']
function read()
{
    echo "read.......<br>";
}

//写入$_SESSION['username']="yanzi"
function write()
{
    echo "write.......<br>";
}

//销毁session_destory()
function destroy()
{
    echo "destroy.......<br>";
}

//垃圾回收
function gc()
{
    echo "gc.......<br>";
}
