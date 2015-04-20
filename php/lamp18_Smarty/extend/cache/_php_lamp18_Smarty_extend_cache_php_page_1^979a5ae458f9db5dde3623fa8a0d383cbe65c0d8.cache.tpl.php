<?php /*%%SmartyHeaderCode:198525530adb5d842b3-98493707%%*/
if (!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array(
    'file_dependency' =>
        array(
            '979a5ae458f9db5dde3623fa8a0d383cbe65c0d8' =>
                array(
                    0 => 'cache.tpl',
                    1 => 1429260271,
                    2 => 'file',
                ),
        ),
    'nocache_hash' => '198525530adb5d842b3-98493707',
    'version' => 'Smarty-3.1.21-dev',
    'unifunc' => 'content_553450de4e6835_67799377',
    'variables' =>
        array(
            'arr' => 0,
            'time' => 0,
            'users' => 0,
            'fpage' => 0,
        ),
    'has_nocache_code' => false,
    'cache_lifetime' => 10,
), true); /*/%%SmartyHeaderCode%%*/
?>
<?php if ($_valid && !is_callable('content_553450de4e6835_67799377')) {
    function content_553450de4e6835_67799377($_smarty_tpl)
    { ?><br>---------索引数组---------<br>
        <br>
        <br>

        <table border="1" width="800" align="center">
            <caption><h1>用户表2015-04-20 09:05:34</h1></caption>
            <tr>
                <th>index</th>
                <th>iteration</th>
                <th>ID</th>
                <th>USERNAME</th>
                <th>AGE</th>
                <th>SEX</th>
                <th>EMAIL</th>
            </tr>

            <tr bgcolor="red">


                <td>0</td>
                <td>1</td>
                <td>111</td>
                <td>222</td>
                <td>4444</td>
                <td>5555</td>
                <td>6666</td>
            </tr>
            <tr bgcolor="green">


                <td>1</td>
                <td>2</td>
                <td>1019</td>
                <td>rongyao</td>
                <td>30</td>
                <td>W</td>
                <td>aa@bb.cc</td>
            </tr>
            <tr>


                <td>2</td>
                <td>3</td>
                <td>1023</td>
                <td>iphone</td>
                <td>33</td>
                <td>M</td>
                <td>rr@tt.cc</td>
            </tr>
            <tr bgcolor="green">


                <td>3</td>
                <td>4</td>
                <td>1024</td>
                <td>meizi</td>
                <td>30</td>
                <td>M</td>
                <td>ads@23.com</td>
            </tr>
            <tr bgcolor="blue">


                <td>4</td>
                <td>5</td>
                <td>1025</td>
                <td>sanxing</td>
                <td>30</td>
                <td>W</td>
                <td>aa@bb.cc</td>
            </tr>
            <tr>
                <td colspan="7" align="right">
                    <div style="font:12px '\5B8B\4F53',san-serif;">&nbsp;共<b> 30 </b>条记录&nbsp;&nbsp;本页 <b>5</b> 条&nbsp;&nbsp;本页从
                        <b>1-5</b> 条&nbsp;&nbsp;<b>1/6</b>页&nbsp;&nbsp;<b><span
                                style='padding:1px 2px;background:#BBB;color:white'>1</span>&nbsp;<a
                                href='/php/lamp18_Smarty/extend/cache.php?page=2'>2</a>&nbsp;<a
                                href='/php/lamp18_Smarty/extend/cache.php?page=3'>3</a>&nbsp;<a
                                href='/php/lamp18_Smarty/extend/cache.php?page=4'>4</a>&nbsp;<a
                                href='/php/lamp18_Smarty/extend/cache.php?page=5'>5</a>&nbsp;<a
                                href='/php/lamp18_Smarty/extend/cache.php?page=6'>6</a>&nbsp;</b>&nbsp;<a
                            href='/php/lamp18_Smarty/extend/cache.php?page=2'>下一页</a>&nbsp;&nbsp;<a
                            href='/php/lamp18_Smarty/extend/cache.php?page=6'>末页</a>&nbsp;&nbsp;<input
                            style="width:20px;height:17px !important;height:18px;border:1px solid #CCCCCC;" type="text"
                            onkeydown="javascript:if(event.keyCode==13){var page=(this.value>6)?6:this.value;location='/php/lamp18_Smarty/extend/cache.php?page='+page+''}"
                            value="1"><input style="cursor:pointer;width:25px;height:18px;border:1px solid #CCCCCC;"
                                             type="button" value="GO"
                                             onclick="javascript:var page=(this.previousSibling.value>6)?6:this.previousSibling.value;location='/php/lamp18_Smarty/extend/cache.php?page='+page+''">&nbsp;
                    </div>
                </td>
            </tr>
        </table>
    <?php }
} ?>
