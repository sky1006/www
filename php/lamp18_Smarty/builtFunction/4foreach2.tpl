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