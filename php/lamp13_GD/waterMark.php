<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/12
 * Time: 15:06
 */

function waterMark($imgname, $string)
{
    list($swidth, $sheight, $type) = getimagesize($imgname);
    $types = array(1 => "gif", 2 => "jpeg", 3 => "png");
    //变量函数
    $createimage = "imagecreatefrom" . $types[$type];
    //原图片
    $imgsrc = $createimage($imgname);

    $white = imagecolorallocate($imgsrc, 255, 200, 200);
    $green = imagecolorallocate($imgsrc, 0, 200, 0);

    $x = rand(3, $swidth - strlen($string) * imagefontwidth(5));
    $y = rand(3, $sheight - imagefontheight(5) - 2);
    imagestring($imgsrc, 5, $x, $y, $string, $white);
    imagestring($imgsrc, 5, $x + 1, $y + 1, $string, $green);


    //变量函数
    $save = "image" . $types[$type];
    $save($imgsrc, "water_" . $imgname);
    imagedestroy($imgsrc);

}

//waterMark("mall.png","yanzi");
//waterMark("1992.gif","yanzi");

function waterMarkMap($imgname, $watername)
{
    list($swidth, $sheight, $type) = getimagesize($imgname);//原图
    list($wwidth, $wheight, $wtype) = getimagesize($watername);//水印
    $types = array(1 => "gif", 2 => "jpeg", 3 => "png");
    //变量函数
    $createimage = "imagecreatefrom" . $types[$type];
    $createimagew = "imagecreatefrom" . $types[$wtype];
    //原图片
    $imgsrc = $createimage($imgname);//原图
    $wimg = $createimagew($watername);//水印


    $x = rand(3, $swidth - $wwidth);
    $y = rand(3, $sheight - $wheight);
    imagecopy($imgsrc, $wimg, $x, $y, 0, 0, $wwidth, $wheight);


    //变量函数
    $save = "image" . $types[$type];
    $save($imgsrc, "waterMap_" . $imgname);
    imagedestroy($imgsrc);
    imagedestroy($wimg);
}

waterMarkMap("only.jpg", "059.jpg");