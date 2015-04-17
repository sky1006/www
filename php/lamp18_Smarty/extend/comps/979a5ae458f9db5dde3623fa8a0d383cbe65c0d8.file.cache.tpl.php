<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-17 14:51:43
         compiled from "cache.tpl" */
?>
<?php /*%%SmartyHeaderCode:162145530ad7f696487-89100306%%*/
if (!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array(
    'file_dependency' =>
        array(
            '979a5ae458f9db5dde3623fa8a0d383cbe65c0d8' =>
                array(
                    0 => 'cache.tpl',
                    1 => 1429251950,
                    2 => 'file',
                ),
        ),
    'nocache_hash' => '162145530ad7f696487-89100306',
    'function' =>
        array(),
    'variables' =>
        array(
            'arr' => 0,
            'k' => 0,
            'value' => 0,
            'users' => 0,
            'user' => 0,
            'col' => 0,
            'fpage' => 0,
        ),
    'has_nocache_code' => false,
    'version' => 'Smarty-3.1.21-dev',
    'unifunc' => 'content_5530ad7f88a4f8_65546028',
), false); /*/%%SmartyHeaderCode%%*/
?>
<?php if ($_valid && !is_callable('content_5530ad7f88a4f8_65546028')) {
    function content_5530ad7f88a4f8_65546028($_smarty_tpl)
    {
        ?><?php  $_smarty_tpl->tpl_vars["value"] = new Smarty_Variable;
        $_smarty_tpl->tpl_vars["value"]->_loop = false;
        $_smarty_tpl->tpl_vars["k"] = new Smarty_Variable;
        $_from = $_smarty_tpl->tpl_vars['arr']->value;
        if (!is_array($_from) && !is_object($_from)) {
            settype($_from, 'array');
        }
        $_smarty_tpl->tpl_vars["value"]->total = $_smarty_tpl->_count($_from);
        $_smarty_tpl->tpl_vars["value"]->iteration = 0;
        $_smarty_tpl->tpl_vars["value"]->index = -1;
        $_smarty_tpl->tpl_vars['smarty']->value['foreach']["smart2"]['total'] = $_smarty_tpl->tpl_vars["value"]->total;
        $_smarty_tpl->tpl_vars['smarty']->value['foreach']["smart2"]['iteration'] = 0;
        foreach ($_from as $_smarty_tpl->tpl_vars["value"]->key => $_smarty_tpl->tpl_vars["value"]->value) {
            $_smarty_tpl->tpl_vars["value"]->_loop = true;
            $_smarty_tpl->tpl_vars["k"]->value = $_smarty_tpl->tpl_vars["value"]->key;
            $_smarty_tpl->tpl_vars["value"]->iteration++;
            $_smarty_tpl->tpl_vars["value"]->index++;
            $_smarty_tpl->tpl_vars["value"]->first = $_smarty_tpl->tpl_vars["value"]->index === 0;
            $_smarty_tpl->tpl_vars["value"]->last = $_smarty_tpl->tpl_vars["value"]->iteration === $_smarty_tpl->tpl_vars["value"]->total;
            $_smarty_tpl->tpl_vars['smarty']->value['foreach']["smart2"]['first'] = $_smarty_tpl->tpl_vars["value"]->first;
            $_smarty_tpl->tpl_vars['smarty']->value['foreach']["smart2"]['iteration']++;
            $_smarty_tpl->tpl_vars['smarty']->value['foreach']["smart2"]['last'] = $_smarty_tpl->tpl_vars["value"]->last;
            ?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['smart2']['first']) { ?>
                这是第一次：
            <?php } ?>

            <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['smart2']['iteration']; ?>
            ==><?php echo $_smarty_tpl->tpl_vars['k']->value; ?>
            =<?php echo $_smarty_tpl->tpl_vars['value']->value; ?>
            <br>

            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['smart2']['last']) { ?>
                这是最后一次：
            <?php } ?>

        <?php
        }
        if (!$_smarty_tpl->tpl_vars["value"]->_loop) {
            ?>
            数组为空，或不存在！
        <?php } ?>

        <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['smart2']['total']; ?>
        <br>

        ---------关联数组---------<br>

        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
        $_smarty_tpl->tpl_vars['value']->_loop = false;
        $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
        $_from = $_smarty_tpl->tpl_vars['arr']->value;
        if (!is_array($_from) && !is_object($_from)) {
            settype($_from, 'array');
        }
        $_smarty_tpl->tpl_vars['value']->total = $_smarty_tpl->_count($_from);
        $_smarty_tpl->tpl_vars['value']->iteration = 0;
        $_smarty_tpl->tpl_vars['value']->index = -1;
        foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
            $_smarty_tpl->tpl_vars['value']->_loop = true;
            $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
            $_smarty_tpl->tpl_vars['value']->iteration++;
            $_smarty_tpl->tpl_vars['value']->index++;
            ?>
            <?php echo $_smarty_tpl->tpl_vars['value']->iteration; ?>
            ==<?php echo $_smarty_tpl->tpl_vars['value']->index; ?>
            ==<?php echo $_smarty_tpl->tpl_vars['value']->key; ?>
            ==> =><?php echo $_smarty_tpl->tpl_vars['value']->value; ?>
            <br>
        <?php
        }
        if (!$_smarty_tpl->tpl_vars['value']->_loop) {
            ?>
            数组为空，或不存在！
        <?php } ?>
        <?php echo $_smarty_tpl->tpl_vars['value']->total; ?>


        <table border="1" width="800" align="center">
            <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable;
            $_smarty_tpl->tpl_vars['user']->_loop = false;
            $_from = $_smarty_tpl->tpl_vars['users']->value;
            if (!is_array($_from) && !is_object($_from)) {
                settype($_from, 'array');
            }
            $_smarty_tpl->tpl_vars['user']->total = $_smarty_tpl->_count($_from);
            $_smarty_tpl->tpl_vars['user']->iteration = 0;
            $_smarty_tpl->tpl_vars['user']->index = -1;
            foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
                $_smarty_tpl->tpl_vars['user']->_loop = true;
                $_smarty_tpl->tpl_vars['user']->iteration++;
                $_smarty_tpl->tpl_vars['user']->index++;
                $_smarty_tpl->tpl_vars['user']->first = $_smarty_tpl->tpl_vars['user']->index === 0;
                $_smarty_tpl->tpl_vars['user']->last = $_smarty_tpl->tpl_vars['user']->iteration === $_smarty_tpl->tpl_vars['user']->total;
                ?>

                <?php if ($_smarty_tpl->tpl_vars['user']->first) { ?>
                    <tr bgcolor="red">
                <?php } elseif ($_smarty_tpl->tpl_vars['user']->last) { ?>
                    <tr bgcolor="blue">
                <?php } elseif (!(1 & $_smarty_tpl->tpl_vars['user']->index)) { ?>
                    <tr bgcolor="green">
                <?php } else { ?>
                    <tr>
                <?php } ?>

                <?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable;
                $_smarty_tpl->tpl_vars['col']->_loop = false;
                $_from = $_smarty_tpl->tpl_vars['user']->value;
                if (!is_array($_from) && !is_object($_from)) {
                    settype($_from, 'array');
                }
                foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value) {
                    $_smarty_tpl->tpl_vars['col']->_loop = true;
                    ?>
                    <td><?php echo $_smarty_tpl->tpl_vars['col']->value; ?>
                    </td>
                <?php } ?>
                </tr>
            <?php
            }
            if (!$_smarty_tpl->tpl_vars['user']->_loop) {
                ?>
                没有用户
            <?php } ?>
        </table>

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
            <caption><h1>用户表</h1></caption>
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
