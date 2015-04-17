<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/12
 * Time: 14:44
 */
function cut($imgname, $x, $y, $width, $height)
{
    list($swidth, $sheight, $type) = getimagesize($imgname);
    $types = array(1 => "gif", 2 => "jpeg", 3 => "png");
    //变量函数
    $createimage = "imagecreatefrom" . $types[$type];
    //原图片
    $imgsrc = $createimage($imgname);
    //目标资源
    $dimg = imagecreatetruecolor($width, $height);


    imagecopyresampled($dimg, $imgsrc, 0, 0, $x, $y, $width, $height, $swidth, $sheight);

    //变量函数
    $save = "image" . $types[$type];
    $save($dimg, "cut_" . $imgname);
    imagedestroy($imgsrc);
    imagedestroy($dimg);
}

cut("mall.png", 50, 50, 200, 200);
cut("1992.gif", 50, 50, 200, 200);
