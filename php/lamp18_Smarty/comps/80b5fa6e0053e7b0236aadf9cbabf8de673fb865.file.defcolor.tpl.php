<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-16 11:31:05
         compiled from "defcolor.tpl" */
?>
<?php /*%%SmartyHeaderCode:31184552e7e13a948f1-20068596%%*/
if (!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array(
    'file_dependency' =>
        array(
            '80b5fa6e0053e7b0236aadf9cbabf8de673fb865' =>
                array(
                    0 => 'defcolor.tpl',
                    1 => 1429155064,
                    2 => 'file',
                ),
        ),
    'nocache_hash' => '31184552e7e13a948f1-20068596',
    'function' =>
        array(),
    'version' => 'Smarty-3.1.21-dev',
    'unifunc' => 'content_552e7e13b83bf0_94831149',
    'has_nocache_code' => false,
), false); /*/%%SmartyHeaderCode%%*/
?>
<?php if ($_valid && !is_callable('content_552e7e13b83bf0_94831149')) {function content_552e7e13b83bf0_94831149($_smarty_tpl) {?><?php if (!is_callable('smarty_function_color')) include 'D:/wamp/www/php/lamp18_Smarty/./myplugins\\function.color.php';
if (!is_callable('smarty_function_date')) include 'D:/wamp/www/php/lamp18_Smarty/./myplugins\\function.date.php';
if (!is_callable('smarty_block_textarea')) include 'D:/wamp/www/php/lamp18_Smarty/./myplugins\\block.textarea.php';
?><!DOCTYPE html PUBLIC
    "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php echo smarty_function_color(array('name' => "titlecolor", 'value' => ((string)$_smarty_tpl->tpl_vars['titlecolor']->value)), $_smarty_tpl); ?>
<br>


<?php echo smarty_function_date(array('name' => "starttime", 'time' => 1, 'value' => ((string)$_smarty_tpl->tpl_vars['ctime']->value)), $_smarty_tpl); ?>
    - <?php echo smarty_function_date(array('name' => "endtime", 'time' => 1), $_smarty_tpl); ?>
<br>




    <textarea name="notice">
        this is a demo
    </textarea><br>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('textarea', array('name' => "content", 'toolbar' => "full", 'height' => "300"));
$_block_repeat = true;
echo smarty_block_textarea(array('name' => "content", 'toolbar' => "full", 'height' => "300"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
    ob_start(); ?>
    this is demo <?php $_block_content = ob_get_clean();
    $_block_repeat = false;
    echo smarty_block_textarea(array('name' => "content", 'toolbar' => "full", 'height' => "300"), $_block_content, $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_tag_stack); ?>
<br>


<?php }
} ?>
