<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/12
 * Time: 14:44
 */
function thumb($imgname, $width, $height)
{
    list($swidth, $sheight, $type) = getimagesize($imgname);
    $types = array(1 => "gif", 2 => "jpeg", 3 => "png");
    //变量函数
    $createimage = "imagecreatefrom" . $types[$type];
    //原图片
    $imgsrc = $createimage($imgname);
    //目标资源
    $dimg = imagecreatetruecolor($width, $height);

    if ($width && ($swidth < $sheight)) {
        $width = ($height / $sheight) * $swidth;
    } else {
        $height = ($width / $swidth) * $sheight;
    }

    imagecopyresampled($dimg, $imgsrc, 0, 0, 0, 0, $width, $height, $swidth, $sheight);

    //变量函数
    $save = "image" . $types[$type];
    $save($dimg, "new_" . $imgname);
    imagedestroy($imgsrc);
    imagedestroy($dimg);
}

thumb("mall.png", 200, 200);
thumb("1992.gif", 200, 200);
