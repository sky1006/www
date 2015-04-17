<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/15
 * Time: 15:14
 * 文件名  block.函数名.php
 * 声明的函数名也要有规则
 * smarty_block_函数名()
 * 参数
 *  1、属性关联数组
 *  2、标记中间的内容
 *  3、参数是smarty
 *  4、引用参数，开始true和结束false
 */
function smarty_block_world1($args, $content, $smarty, &$repeat)
{
    /*    print_r($args);
        print_r($content);
        var_dump($repeat);*/
    /*
    Array ( [line] => 7 [size] => 7 [color] => blue )
    boolean true
    Array ( [line] => 7 [size] => 7 [color] => blue ) sdlkjgkdkkkkkkkkkkkkkk
    boolean false
    */
    if (!$repeat) {
        $str = "";
        for ($i = 0; $i < $args['line']; $i++) {
            $str .= "<font color='{$args['color']}' size='{$args['size']}'>{$content}</font><br>";
        }

        return $str;
    }
}