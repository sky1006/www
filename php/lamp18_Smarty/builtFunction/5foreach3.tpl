<{$arr['os']}><br>

<{foreach name="smart2" from=$arr item="value" key="k"}>
    <{if $smarty.foreach.smart2.first}>
    这是第一次：
    <{/if}>

    <{$smarty.foreach.smart2.iteration}>==><{$k}>=<{$value}><br>

    <{if $smarty.foreach.smart2.last}>
    这是最后一次：
    <{/if}>

    <{foreachelse}>
    数组为空，或不存在！
    <{/foreach}>

<{$smarty.foreach.smart2.total}><br>

------------------<br>

<{foreach $arr as $key=>$value}>
    <{$value@iteration}>==<{$value@index}>==<{$value@key}>==> =><{$value}><br>
    <{foreachelse}>
    数组为空，或不存在！
    <{/foreach}>
<{$value@total}>

<table border="1" width="800" align="center">
    <{foreach $users as $user}>

    <{if $user@first}>
    <tr bgcolor="red">
        <{elseif $user@last}>
    <tr bgcolor="blue">
        <{elseif $user@index is even}>
    <tr bgcolor="green">
        <{else}>
    <tr>
    <{/if}>

    <{foreach $user as $col}>
    <td><{$col}></td>
    <{/foreach}>
    </tr>
    <{foreachelse}>
    没有用户
    <{/foreach}>
</table>