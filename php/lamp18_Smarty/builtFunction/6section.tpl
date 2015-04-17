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

---------关联数组---------<br>

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

<br>---------索引数组---------<br>
<{section name="ss" loop=$arr start=1 step=2 max=5}>
    <{$arr[ss]}><br>
    <{sectionelse}>
    数组不存在或数组为空
    <{/section}>

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

    <{section name="u" loop=$users}>
    <{if $smarty.section.u.first}>
    <tr bgcolor="red">
        <{elseif $smarty.section.u.last}>
    <tr bgcolor="blue">
        <{elseif $smarty.section.u.iteration is even}>
    <tr bgcolor="green">
        <{else}>
    <tr>
    <{/if}>


    <td><{$smarty.section.u.index}></td>
    <td><{$smarty.section.u.iteration}></td>
    <td><{$users[u].id}></td>
    <td><{$users[u].username}></td>
    <td><{$users[u].age}></td>
    <td><{$users[u].sex}></td>
    <td><{$users[u].email}></td>
    </tr>
    <{sectionelse}>
    数组不存在或数组为空
    <{/section}>
    <tr>
        <td colspan="7" align="right"> <{$fpage}></td>
    </tr>
</table>
