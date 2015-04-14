<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-14 15:07:49
         compiled from "index2.tpl" */
?>
<?php /*%%SmartyHeaderCode:19567552cb2ad2e52a6-37330677%%*/
if (!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array(
    'file_dependency' =>
        array(
            '66311b15f8ad42c782a9e5aa6fd0a5039bb27ef4' =>
                array(
                    0 => 'index2.tpl',
                    1 => 1428995268,
                    2 => 'file',
                ),
        ),
    'nocache_hash' => '19567552cb2ad2e52a6-37330677',
    'function' =>
        array(),
    'version' => 'Smarty-3.1.21-dev',
    'unifunc' => 'content_552cb2ad394f44_21449849',
    'variables' =>
        array(
            'var' => 0,
            'var2' => 0,
            'var3' => 0,
        ),
    'has_nocache_code' => false,
), false); /*/%%SmartyHeaderCode%%*/
?>
<?php if ($_valid && !is_callable('content_552cb2ad394f44_21449849')) {
    function content_552cb2ad394f44_21449849($_smarty_tpl)
    {
        ?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\wamp\\www\\php\\lamp18_Smarty\\libs\\plugins\\modifier.truncate.php';
        if (!is_callable('smarty_modifier_capitalize')) include 'D:\\wamp\\www\\php\\lamp18_Smarty\\libs\\plugins\\modifier.capitalize.php';
        if (!is_callable('smarty_modifier_date_format')) include 'D:\\wamp\\www\\php\\lamp18_Smarty\\libs\\plugins\\modifier.date_format.php';
        if (!is_callable('smarty_modifier_regex_replace')) include 'D:\\wamp\\www\\php\\lamp18_Smarty\\libs\\plugins\\modifier.regex_replace.php';
        if (!is_callable('smarty_modifier_spacify')) include 'D:\\wamp\\www\\php\\lamp18_Smarty\\libs\\plugins\\modifier.spacify.php';
        ?><?php  $_config = new Smarty_Internal_Config("sns.conf", $_smarty_tpl->smarty, $_smarty_tpl);
        $_config->loadConfigVars("index", 'local'); ?>


        <?php echo $_smarty_tpl->tpl_vars['var']->value; ?>
        <br>
        <?php echo strtoupper($_smarty_tpl->tpl_vars['var']->value); ?>
        <br>
        <?php echo ucwords($_smarty_tpl->tpl_vars['var']->value); ?>
        <br>
        -----------------------------<br>

        <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['var']->value, 'UTF-8'); ?>
        <br>
        <?php echo smarty_modifier_truncate(mb_strtoupper($_smarty_tpl->tpl_vars['var']->value, 'UTF-8'), "30"); ?>
        <br>
        <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['var']->value); ?>
        <br>
        <?php echo ($_smarty_tpl->tpl_vars['var']->value) . ("demo test!!"); ?>
        <br>
        <?php echo preg_match_all('/\p{L}[\p{L}\p{Mn}\p{Pd}\'\x{2019}]*/u', $_smarty_tpl->tpl_vars['var']->value, $tmp); ?>
        <br>

        <?php echo time(); ?>
        <br>
        <?php echo smarty_modifier_date_format(time(), "%Y-%m-%d %H:%M:%S"); ?>
        <br>

        <?php echo(($tmp = @$_smarty_tpl->tpl_vars['var2']->value) === null || $tmp === '' ? "数据库中没有数据" : $tmp); ?>
        <br>
        <?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['var']->value, "/\d/", "#"); ?>
        <br>
        <?php echo smarty_modifier_spacify($_smarty_tpl->tpl_vars['var']->value, "@"); ?>
        <br>
        <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['var']->value, 33, "...", true); ?>
        <br>
        <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['var3']->value, 11); ?>
        <br>

        -----------------------------<br>
        <?php echo date("Y-m-d", time()); ?>
        <br>
        <?php echo @constant('ROOT'); ?>
        <br>

        <body bgcolor="<?php echo $_smarty_tpl->getConfigVariable('bg'); ?>
" text="<?php echo $_smarty_tpl->getConfigVariable('color'); ?>
">
        <table border="<?php echo $_smarty_tpl->getConfigVariable('color'); ?>
" width="<?php echo $_smarty_tpl->getConfigVariable('width'); ?>
">
            <tr bgcolor="<?php echo $_smarty_tpl->getConfigVariable('bgcolor'); ?>
">
                <td>ddddddd</td>
                <td>ddddddd</td>
                <td>ddddddd</td>
                <td>ddddddd</td>
                <td>ddddddd</td>
            </tr>
            <tr bgcolor="">
                <td>ddddddd</td>
                <td>ddddddd</td>
                <td>ddddddd</td>
                <td>ddddddd</td>
                <td>ddddddd</td>
            </tr>
            <tr bgcolor="<?php echo $_smarty_tpl->getConfigVariable('bgcolor'); ?>
">
                <td>ddddddd</td>
                <td>ddddddd</td>
                <td>ddddddd</td>
                <td>ddddddd</td>
                <td>ddddddd</td>
            </tr>
        </table>
        </body>
        <br>

        <?php echo $_smarty_tpl->getConfigVariable('aa'); ?>
        <br>
        <?php echo $_smarty_tpl->getConfigVariable('bb'); ?>
        <br>
        <?php echo $_smarty_tpl->getConfigVariable('cc'); ?>
        <br>
        <?php echo $_smarty_tpl->getConfigVariable('dd'); ?>
        <br>
        <?php echo $_smarty_tpl->getConfigVariable('ee'); ?>
        <br>
        <?php echo $_smarty_tpl->getConfigVariable('ff'); ?>
        <br>
    <?php }
} ?>
