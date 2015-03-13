<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/12
 * Time: 15:47
 */
function spin($imgname, $jd)
{
    $dirimg = "./images/" . $imgname;
    list($swidth, $sheight, $type) = getimagesize($dirimg);//原图

    $types = array(1 => "gif", 2 => "jpeg", 3 => "png");
    //变量函数
    $createimage = "imagecreatefrom" . $types[$type];

    //原图片
    $imgsrc = $createimage($dirimg);//原图

    //旋转
    $new = imagerotate($imgsrc, $jd, 0);


    //变量函数
    $save = "image" . $types[$type];
    //保存
    $save($new, "./images/" . "spin_{$jd}" . $imgname);
    imagedestroy($imgsrc);
    imagedestroy($new);

}

//spin("059.jpg",90);


//按y轴翻转
function turn_y($imgname)
{
    $dirimg = "./images/" . $imgname;
    list($width, $height, $type) = getimagesize($dirimg);//原图

    $types = array(1 => "gif", 2 => "jpeg", 3 => "png");
    //变量函数
    $createimage = "imagecreatefrom" . $types[$type];

    //原图片
    $imgsrc = $createimage($dirimg);//原图

    $new = imagecreatetruecolor($width, $height);
    //循环每次一个像素
    for ($x = 0; $x < $width; $x++) {
        imagecopy($new, $imgsrc, $width - $x - 1, 0, $x, 0, 1, $height);
    }

    //变量函数
    $save = "image" . $types[$type];
    //保存
    $save($new, "./images/" . "turn_y" . $imgname);
    imagedestroy($imgsrc);
    imagedestroy($new);

}

//turn_y("059.jpg");

//按x轴翻转
function turn_x($imgname)
{
    $dirimg = "./images/" . $imgname;
    list($width, $height, $type) = getimagesize($dirimg);//原图

    $types = array(1 => "gif", 2 => "jpeg", 3 => "png");
    //变量函数
    $createimage = "imagecreatefrom" . $types[$type];

    //原图片
    $imgsrc = $createimage($dirimg);//原图

    $new = imagecreatetruecolor($width, $height);
    //循环每次一个像素
    for ($y = 0; $y < $height; $y++) {
        imagecopy($new, $imgsrc, 0, $height - $y - 1, 0, $y, $width, 1);
    }

    //变量函数
    $save = "image" . $types[$type];
    //保存
    $save($new, "./images/" . "turn_x" . $imgname);
    imagedestroy($imgsrc);
    imagedestroy($new);

}

turn_x("059.jpg");