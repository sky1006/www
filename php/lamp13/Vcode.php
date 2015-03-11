<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/11
 * Time: 17:20
 */
class Vcode
{
    private $width;     //宽
    private $height;    //高
    private $num;       //数量
    private $code;      //验证码
    private $img;       //图像的资源

    //构造方法，三个参数
    function __construct($width, $height, $num)
    {
        $this->width = $width;
        $this->height = $height;
        $this->num = $num;
        $this->code = $this->createcode(); //调用自己的方法

    }

//获取字符的验证码，用于保存在服务器中
    function getcode()
    {
        return $this->code;
    }

//输出图像
    function outimg()
    {
        //创建背景（颜色，大小，边框）
        $this->createback();
        //画字（大小，字体颜色）

        //干扰元素（点，线条）

        //输出图像
        $this->printimg();
    }

    //创建背景
    private function createback()
    {
        //创建资源
        $this->img = imagecreatetruecolor($this->width, $this->height);
        //设置随机的背景颜色
        $bgcolor = imagecolorallocate($this->img, rand(225, 255), rand(225, 255), rand(225, 255));
        //设置背景填充色
        imagefill($this->img, 0, 0, $bgcolor);

        //画边框
        $bordercolor = imagecolorallocate($this->img, 0, 0, 0);
        imagerectangle($this->img, 0, 0, $this->width - 1, $this->height - 1, $bordercolor);
    }

    //画字
    private function outstring()
    {

    }

    //设置干扰元素
    private function setdisturbcolor()
    {

    }

    //输出图像
    private function printimg()
    {
        if (function_exists('imagegif')) {
            // 针对 GIF
            header('Content-Type: image/gif');
            imagegif($this->img);
        } elseif (function_exists('imagejpeg')) {
            // 针对 JPEG
            header('Content-Type: image/jpeg');
            imagejpeg($this->img, NULL, 100);
        } elseif (imagetypes() & IMG_PNG) {
            // 针对 PNG
            header('Content-Type: image/png');
            imagepng($this->img);
        } elseif (function_exists('imagewbmp')) {
            // 针对 WBMP
            header('Content-Type: image/vnd.wap.wbmp');
            imagewbmp($this->img);
        } else {
            die('No image support in this PHP server');
        }

    }

    //生产验证码字符串
    private function createcode()
    {
        $codes = "3456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXY";

        $code = "";
        for ($i = 0; $i < $this->num; $i++) {
            $code .= $codes{rand(0, strlen($codes) - 1)};
        }
        return $code;
    }

//自动销毁图像资源
    function __destruct()
    {
        imagedestroy($this->$img);
    }
} 