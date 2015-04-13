<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-13 16:48:55
         compiled from ".\views\test.tpl" */
?>
<?php /*%%SmartyHeaderCode:7750552b813e647599-29289030%%*/
if (!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array(
    'file_dependency' =>
        array(
            '0ba31d2e33d4df226330e5bf517a5aee37601fd8' =>
                array(
                    0 => '.\\views\\test.tpl',
                    1 => 1428914935,
                    2 => 'file',
                ),
        ),
    'nocache_hash' => '7750552b813e647599-29289030',
    'function' =>
        array(),
    'version' => 'Smarty-3.1.21-dev',
    'unifunc' => 'content_552b813e672522_28457698',
    'variables' =>
        array(
            'title' => 0,
            'content' => 0,
        ),
    'has_nocache_code' => false,
), false); /*/%%SmartyHeaderCode%%*/
?>
<?php if ($_valid && !is_callable('content_552b813e672522_28457698')) {
    function content_552b813e672522_28457698($_smarty_tpl)
    { ?><?php echo $_smarty_tpl->getSubTemplate("public/heater.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0); ?>


        <html>
        <head>
            <title><?php echo $_smarty_tpl->tpl_vars['title']->value; ?>
            </title>
            <style>
                #one {
                    color: red
                }
            </style>
        </head>
        <body>
        <?php echo $_smarty_tpl->tpl_vars['content']->value; ?>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['content']->value; ?>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['content']->value; ?>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['content']->value; ?>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['content']->value; ?>
        <br>
        <?php echo $_smarty_tpl->tpl_vars['content']->value; ?>
        <br>

        <img src="./logo.gif"/> <br>

        </body>
        </html>
        <?php echo $_smarty_tpl->getSubTemplate("public/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0); ?>
    <?php }
} ?>
