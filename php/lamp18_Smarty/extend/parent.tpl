<html>
<head>
    <title><{block name="one"}>this is parent<{/block}></title>
</head>
<body>
<{block name="two"}>this is parent ....<{/block}><br>

<{block name="three"}>this is test ....<{/block}><br>

<{block name="four"}>hello<{/block}><br>
<{block name="five"}>demo123<{/block}><br>
<{block name="six"}>abc <{$smarty.block.child}> xyz<{/block}><br>
</body>
</html>