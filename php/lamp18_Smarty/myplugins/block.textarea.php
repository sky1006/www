<?php
/**
 * Created by PhpStorm.
 * User: skye
 * Date: 15-4-15
 * Time: 下午9:46
 * 编辑器
 * @param int $textareaid
 * @param int $toolbar 有basic full 和desc三种
 * @param int $color 编辑器颜色
 * @param string $alowuploadexts 允许上传类型
 * @param string $height 编辑器高度
 * @param string $disabled_page 私服禁用分页和子标题
 */
function smarty_block_textarea($args, $content, $smarty, &$repeat)
{
    if (!$repeat) {
        $textareaid = !empty($args['name']) ? $args['name'] : 'content';
        $toolbar = !empty($args['toolbar']) ? $args['toolbar'] : "basic";
        $height = !empty($args['height']) ? $args['height'] : 200;
        $color = !empty($args['color']) ? $args['color'] : '';
        $up = !empty($args['up']) ? $args['up'] : true;

        $str = '<textarea name="' . $textareaid . '">' . $content . '</textarea>';
        if (!defined('EDITOR_INIT')) {
            $str .= '<script type="text/javascript" src="./css/ckeditor/ckeditor.css"></script>';
            define('EDITOR_INIT', 1);
        }

        if ($toolbar == 'basic') {
            $toolbar = "['Bold','Italic','Underline','Strike','NumberedList','BulletedList','TextColor','BGColor','Link','Unlink','-','Image','Flash','Table','Smiley','SpecialChar'],['RemoveFormat'],
            \r\n";
        } elseif ($toolbar == 'full') {
            $toolbar = "['Source','-','Templates'],
            ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
            ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],['ShowBlocks'],['Image','Capture','Flash'],['Maximize'],
            '/',
            ['Bold','Italic','Underline','Strike','-'],
            ['Subscript','Superscript','-'],
            ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
            ['Link','Unlink','Anchor'],
            ['Table','HorizontalRule','Smiley','SpecialChar'],
            '/',
            ['Styles','Format','Font','FontSize'],
            ['TextColor','BGColor'],
            ['attachment'],\r\n";
        } elseif ($toolbar == 'desc') {
            $toolbar = "['Bold','Italic','-','NumberedList','BulletedList','-','Link','Unlink','-','Image','-','Source'],\r\n";
        } else {
            $toolbar = '';
        }
        $str .= "<script type=\"text/javascript\">\r\n";
        $str .= "CKEDITOR.replace( '$textareaid',{";

        $str .= "height:{$height},";

        if ($color) {
            $str .= "extraPlugins : 'uicolor',uiColor:'$color',";
        }

        $str .= "toolbar :\r\n";
        $str .= "[\r\n";
        $str .= $toolbar;
        $str .= "]\r\n";
        $str .= "});\r\n";
        $str .= '</script>';
        return $str;
    }
}