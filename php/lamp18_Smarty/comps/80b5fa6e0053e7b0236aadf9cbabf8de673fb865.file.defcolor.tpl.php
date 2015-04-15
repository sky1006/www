<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-15 18:17:45
         compiled from "defcolor.tpl" */
?>
<?php /*%%SmartyHeaderCode:5520552e2143b2d252-46706750%%*/
if (!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array(
    'file_dependency' =>
        array(
            '80b5fa6e0053e7b0236aadf9cbabf8de673fb865' =>
                array(
                    0 => 'defcolor.tpl',
                    1 => 1429093065,
                    2 => 'file',
                ),
        ),
    'nocache_hash' => '5520552e2143b2d252-46706750',
    'function' =>
        array(),
    'version' => 'Smarty-3.1.21-dev',
    'unifunc' => 'content_552e2143b6ba63_78471891',
    'has_nocache_code' => false,
), false); /*/%%SmartyHeaderCode%%*/
?>
<?php if ($_valid && !is_callable('content_552e2143b6ba63_78471891')) {function content_552e2143b6ba63_78471891($_smarty_tpl) {?><?php if (!is_callable('smarty_function_color')) include 'D:/wamp/www/php/lamp18_Smarty/./myplugins\\function.color.php';
if (!is_callable('smarty_function_date')) include 'D:/wamp/www/php/lamp18_Smarty/./myplugins\\function.date.php';
?><!DOCTYPE html PUBLIC
    "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php echo smarty_function_color(array('name' => "titlecolor", 'value' => ((string)$_smarty_tpl->tpl_vars['titlecolor']->value)), $_smarty_tpl); ?>
<br>


<?php echo smarty_function_date(array('name' => "starttime", 'time' => 1), $_smarty_tpl); ?>
    - <?php echo smarty_function_date(array('name' => "endtime", 'time' => 1), $_smarty_tpl); ?>
<br>


<?php }
} ?>
