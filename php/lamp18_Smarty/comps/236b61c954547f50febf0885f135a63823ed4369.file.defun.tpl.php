<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-15 15:17:54
         compiled from "defun.tpl" */
?>
<?php /*%%SmartyHeaderCode:18061552e0c47a1e949-04590862%%*/
if (!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array(
    'file_dependency' =>
        array(
            '236b61c954547f50febf0885f135a63823ed4369' =>
                array(
                    0 => 'defun.tpl',
                    1 => 1429082273,
                    2 => 'file',
                ),
        ),
    'nocache_hash' => '18061552e0c47a1e949-04590862',
    'function' =>
        array(),
    'version' => 'Smarty-3.1.21-dev',
    'unifunc' => 'content_552e0c47a74862_68570354',
    'has_nocache_code' => false,
), false); /*/%%SmartyHeaderCode%%*/
?>
<?php if ($_valid && !is_callable('content_552e0c47a74862_68570354')) {
    function content_552e0c47a74862_68570354($_smarty_tpl)
    {
        ?><?php if (!is_callable('smarty_function_hello')) include 'D:/wamp/www/php/lamp18_Smarty/./myplugins\\function.hello.php';
        if (!is_callable('smarty_block_world1')) include 'D:/wamp/www/php/lamp18_Smarty/./myplugins\\block.world1.php';
        ?><?php echo smarty_function_hello(array('content' => "hello world", 'color' => "red", 'size' => "7", 'line' => "5"), $_smarty_tpl);?>
        <br>
        <?php echo smarty_function_hello(array('color' => "green", 'size' => "3", 'line' => "8", 'content' => "this is a demo"), $_smarty_tpl); ?>
        <br>

        <?php $_smarty_tpl->smarty->_tag_stack[] = array('world', array('line' => "3", 'size' => "7", 'color' => "red"));
        $_block_repeat = true;
        echo world(array('line' => "3", 'size' => "7", 'color' => "red"), null, $_smarty_tpl, $_block_repeat);
        while ($_block_repeat) {
            ob_start(); ?>

            1111111111111111111111
            @@@@@@@@@@@@@@@@@@@@$$$
            <?php $_block_content = ob_get_clean();
            $_block_repeat = false;
            echo world(array('line' => "3", 'size' => "7", 'color' => "red"), $_block_content, $_smarty_tpl, $_block_repeat);
        }
        array_pop($_smarty_tpl->smarty->_tag_stack); ?>


        <?php $_smarty_tpl->smarty->_tag_stack[] = array('world1', array('line' => "7", 'size' => "7", 'color' => "blue"));
        $_block_repeat = true;
        echo smarty_block_world1(array('line' => "7", 'size' => "7", 'color' => "blue"), null, $_smarty_tpl, $_block_repeat);
        while ($_block_repeat) {
            ob_start(); ?>

            sdlkjgkdkkkkkkkkkkkkkk
            <?php $_block_content = ob_get_clean();
            $_block_repeat = false;
            echo smarty_block_world1(array('line' => "7", 'size' => "7", 'color' => "blue"), $_block_content, $_smarty_tpl, $_block_repeat);
        }
        array_pop($_smarty_tpl->smarty->_tag_stack); ?>
    <?php }
} ?>
