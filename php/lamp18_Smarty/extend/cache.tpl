<br>---------索引数组---------<br>
<{section name="ss" loop=$arr start=1 step=2 max=5}>
    <{$arr[ss]}><br>
    <{sectionelse}>
    数组不存在或数组为空
    <{/section}>

<table border="1" width="800" align="center">
    <caption><h1>用户表<{$time}></h1></caption>
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
