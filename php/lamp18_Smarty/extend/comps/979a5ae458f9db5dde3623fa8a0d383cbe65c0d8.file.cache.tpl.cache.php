<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-17 16:03:21
         compiled from "cache.tpl" */
?>
<?php /*%%SmartyHeaderCode:198525530adb5d842b3-98493707%%*/
if (!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array(
    'file_dependency' =>
        array(
            '979a5ae458f9db5dde3623fa8a0d383cbe65c0d8' =>
                array(
                    0 => 'cache.tpl',
                    1 => 1429257796,
                    2 => 'file',
                ),
        ),
    'nocache_hash' => '198525530adb5d842b3-98493707',
    'function' =>
        array(),
    'version' => 'Smarty-3.1.21-dev',
    'unifunc' => 'content_5530adb6087fb4_03803585',
    'variables' =>
        array(
            'arr' => 0,
            'time' => 0,
            'users' => 0,
            'fpage' => 0,
        ),
    'has_nocache_code' => false,
), false); /*/%%SmartyHeaderCode%%*/
?>
<?php if ($_valid && !is_callable('content_5530adb6087fb4_03803585')) {
    function content_5530adb6087fb4_03803585($_smarty_tpl)
    { ?>

        <br>---------索引数组---------<br>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]);
        $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['name'] = "ss";
        $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['loop'] = is_array($_loop = $_smarty_tpl->tpl_vars['arr']->value) ? count($_loop) : max(0, (int)$_loop);
        unset($_loop);
        $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['start'] = (int)1;
        $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['step'] = ((int)2) == 0 ? 1 : (int)2;
        $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['max'] = (int)5;
        $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['show'] = true;
        if ($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['max'] < 0)
            $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['loop'];
        if ($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['start'] < 0)
            $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['start']);
        else
            $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['loop'] - 1);
        if ($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['show']) {
            $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['start'] + 1) / abs($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['max']);
            if ($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['total'] == 0)
                $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['show'] = false;
        } else
            $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['total'] = 0;
        if ($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['iteration']++):
                $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['iteration'];
                $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['step'];
                $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['step'];
                $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['first'] = ($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['iteration'] == 1);
                $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['last'] = ($_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["ss"]['total']);
                ?>
                <?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ss']['index']]; ?>
                <br>
            <?php endfor;
        else: ?>
            数组不存在或数组为空
        <?php endif; ?>

        <table border="1" width="800" align="center">
            <caption><h1>用户表<?php echo $_smarty_tpl->tpl_vars['time']->value; ?>
                </h1></caption>
            <tr>
                <th>index</th>
                <th>iteration</th>
                <th>ID</th>
                <th>USERNAME</th>
                <th>AGE</th>
                <th>SEX</th>
                <th>EMAIL</th>
            </tr>

            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["u"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["u"]);
            $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['name'] = "u";
            $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['loop'] = is_array($_loop = $_smarty_tpl->tpl_vars['users']->value) ? count($_loop) : max(0, (int)$_loop);
            unset($_loop);
            $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['show'] = true;
            $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['loop'];
            $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['step'] = 1;
            $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['loop'] - 1;
            if ($_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['show']) {
                $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['loop'];
                if ($_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['total'] == 0)
                    $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['show'] = false;
            } else
                $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['total'] = 0;
            if ($_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['show']):

                for ($_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['iteration'] = 1;
                     $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['total'];
                     $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['iteration']++):
                    $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['iteration'];
                    $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['step'];
                    $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['step'];
                    $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['first'] = ($_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['iteration'] == 1);
                    $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['last'] = ($_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["u"]['total']);
                    ?>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['u']['first']) { ?>
                    <tr bgcolor="red">
                <?php } elseif ($_smarty_tpl->getVariable('smarty')->value['section']['u']['last']) { ?>
                    <tr bgcolor="blue">
                <?php } elseif (!(1 & $_smarty_tpl->getVariable('smarty')->value['section']['u']['iteration'])) { ?>
                    <tr bgcolor="green">
                <?php } else { ?>
                    <tr>
                <?php } ?>


                    <td><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['u']['index']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['u']['iteration']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['u']['index']]['id']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['u']['index']]['username']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['u']['index']]['age']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['u']['index']]['sex']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['u']['index']]['email']; ?>
                    </td>
                    </tr>
                <?php endfor;
            else: ?>
                数组不存在或数组为空
            <?php endif; ?>
            <tr>
                <td colspan="7" align="right"> <?php echo $_smarty_tpl->tpl_vars['fpage']->value; ?>
                </td>
            </tr>
        </table>
    <?php }
} ?>
