<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>Index</title>
</head>
<body>
<?php if (is_array($myname)): $i = 0;
    $__LIST__ = $myname;
    if (count($__LIST__) == 0) : echo "";
    else: foreach ($__LIST__ as $key => $vo): $mod = ($i % 2);
        ++$i;
        echo($vo["id"]); ?>---<?php echo($vo["username"]); ?>---<?php echo($vo["passwd"]); ?>---<?php echo($vo["age"]); ?>---<?php echo($vo["sex"]); ?>---<?php echo($vo["email"]); ?>
        <br><?php endforeach; endif;
else: echo "";endif; ?>

<div>
    <h1>不修改定界符的结果</h1>
    <ul>
        <li>用【{】和【}】输出英文变量</li>
        <li>{$data1}</li>
        <li>{$data2}</li>
    </ul>
    <ul>
        <li>用【<{】和【}>】输出英文变量</li>
        <li><?php echo($data1); ?></li>
        <li><?php echo($data2); ?></li>
    </ul>
    <ul>
        <li>用【{】和【}】输出中文变量</li>
        <li>{$中国}</li>
        <li>{$美国}</li>
    </ul>
    <ul>
        <li>用【<{】和【}>】输出中文变量</li>
        <li><?php echo($中国); ?></li>
        <li><?php echo($美国); ?></li>
    </ul>
</div>
</body>
</html>