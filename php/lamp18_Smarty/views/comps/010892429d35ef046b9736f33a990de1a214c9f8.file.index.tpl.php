<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-13 18:02:08
         compiled from "index.tpl" */
?>
<?php /*%%SmartyHeaderCode:25720552b8f75696054-63125947%%*/
if (!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array(
    'file_dependency' =>
        array(
            '010892429d35ef046b9736f33a990de1a214c9f8' =>
                array(
                    0 => 'index.tpl',
                    1 => 1428919327,
                    2 => 'file',
                ),
        ),
    'nocache_hash' => '25720552b8f75696054-63125947',
    'function' =>
        array(),
    'version' => 'Smarty-3.1.21-dev',
    'unifunc' => 'content_552b8f756d86e2_24149753',
    'variables' =>
        array(
            'var' => 0,
            'title' => 0,
            'author' => 0,
            'content' => 0,
            'yz' => 0,
            'arr1' => 0,
            'arr2' => 0,
        ),
    'has_nocache_code' => false,
), false); /*/%%SmartyHeaderCode%%*/
?>
<?php if ($_valid && !is_callable('content_552b8f756d86e2_24149753')) {
    function content_552b8f756d86e2_24149753($_smarty_tpl)
    { ?><?php echo $_smarty_tpl->tpl_vars['var']->value; ?>
        <br>

        title:<?php echo $_smarty_tpl->tpl_vars['title']->value; ?>
        <br>
        author:<?php echo $_smarty_tpl->tpl_vars['author']->value; ?>
        <br>
        content:<?php echo $_smarty_tpl->tpl_vars['content']->value; ?>
        <br>

        <?php echo $_smarty_tpl->tpl_vars['yz']->value->name; ?>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['yz']->value->sex; ?>
        <br>

        <?php echo $_smarty_tpl->tpl_vars['yz']->value->say()->eat(); ?>
        <br>

        <?php echo $_smarty_tpl->tpl_vars['arr1']->value[0]; ?>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['arr1']->value[1]; ?>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['arr1']->value[2]; ?>
        <br>

        <?php echo $_smarty_tpl->tpl_vars['arr2']->value['hello'][0]; ?>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['arr2']->value['hello'][1]; ?>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['arr2']->value['hello'][2]; ?>
        <br>


        <?php echo $_smarty_tpl->tpl_vars['arr2']->value['hello'][0]; ?>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['arr2']->value['hello'][1]; ?>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['arr2']->value['hello'][2]; ?>
        <br><?php }
} ?>
