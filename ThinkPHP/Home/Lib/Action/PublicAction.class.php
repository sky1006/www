<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/5
 * Time: 14:07
 */

class PublicAction extends Action {
    Public function code(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }


} 