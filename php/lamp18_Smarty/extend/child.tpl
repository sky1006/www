<{extends "parent.tpl"}>

<{block name="one"}>
    this is child
    <{/block}>

<{block name="two"}>
    this is child
    <{/block}>

<{block name="three" append}>
    this is child demo
    <{/block}>

<{block name="four" prepend}>
    world
    <{/block}>

<{block name="five" }>
    this is <{$smarty.block.parent}>  hello
    <{/block}>

<{block name="six" }>
    nihao
    <{/block}>