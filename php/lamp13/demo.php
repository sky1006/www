<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/12
 * Time: 17:21
 */
//包含这个类
include "image.class.php";

$img = new Image("./images");
/*echo $img->thumb("dx.jpg", 1000, 1000, "th1_") . '<br>';
echo $img->thumb("dx.jpg", 800, 800, "th2_") . '<br>';
echo $img->thumb("dx.jpg", 600, 600, "th3_") . '<br>';
echo $img->thumb("dx.jpg", 400, 400, "th4_") . '<br>';
echo $img->thumb("dx.jpg", 200, 200, "th5_") . '<br>';
echo $img->thumb("dx.jpg", 100, 100, "th6_") . '<br>';*/
/*echo $img->waterMark("dx.jpg","php.gif",0,"wa0_")."<br>";
echo $img->waterMark("dx.jpg","php.gif",1,"wa1_")."<br>";
echo $img->waterMark("dx.jpg","php.gif",2,"wa2_")."<br>";
echo $img->waterMark("dx.jpg","php.gif",3,"wa3_")."<br>";
echo $img->waterMark("dx.jpg","php.gif",4,"wa4_")."<br>";*/

echo $img->cut("cx.png", 122, 104, 104, 108);