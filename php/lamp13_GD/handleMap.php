<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/12
 * Time: 14:01
 */
function cimgstr($imgname, $string)
{
    list($width, $height, $type) = getimagesize($imgname);
    $types = array(1 => "gif", 2 => "jpeg", 3 => "png");
    //变量函数
    $createimage = "imagecreatefrom" . $types[$type];
    $img = $createimage($imgname);

    $red = imagecolorallocate($img, 0xFF, 0, 0);
    $x = ($width - imagefontwidth(5) * strlen($string)) / 2;
    $y = ($height - imagefontheight(5)) / 2;
    imagestring($img, 5, $x, $y, $string, $red);

    //变量函数
    $save = "image" . $types[$type];
    $save($img, "new_" . $imgname);
    imagedestroy($img);
}

cimgstr("fute.png", "yanzi");
cimgstr("1992.gif", "yan");
/*$img = imagecreatefrompng("./fute.png");

$color = imagecolorallocate($img, 0, 255, 0);*/
//imageline($img,0,0,200,200,$color);
/*imageline($img, 0, 0, imagesx($img), imagesy($img), $color);
header("Content-Type:image/png");
imagepng($img);
imagedestroy($img);*/