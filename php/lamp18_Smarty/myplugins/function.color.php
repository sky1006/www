<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/15
 * Time: 15:23
 * 颜色控件
 * @param $name 控件 name
 * @param $value 选中值
 * <{color name='titlecolor' value='FF00FF'}>
 */
function smarty_function_color($args, $smarty)
{
    $name = $args['name'];
    $value = !empty($args['value']) ? $args['value'] : '000000';

    if (!defined('COLOR_INIT')) {
        define('COLOR_INIT', 1);
        $str = '<script src="./js/jscolor/jscolor.js"></script>';
    }
    $str .= '<input class="color" style="width: 48px;height: 16px;overflow: hidden" name="' . $name . '" value="' . $value . '"/>';
    return $str;
}