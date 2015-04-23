<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Modify</title>
    <script>
        window.onload = function () {
            if (<?php echo ($data["sex"]); ?>== 0)
            {
//                alert(0);
                document.getElementsByName('sex')[1].checked = 'checked';
            }
            else
            {
                document.getElementsByName('sex')[0].checked = 'checked';
            }
        }
    </script>
</head>
<body>
<form action="/thinkphp/index.php/User/update" method="post">
    <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"><br>
    姓名：<input type="text" name="username" value="<?php echo ($data["username"]); ?>"/><br>
    性别：男<input type="radio" name="sex" value="1" checked/>女<input type="radio" name="sex" value="0"/><br>
    年龄：<input type="text" name="age" value="<?php echo ($data["age"]); ?>"/><br>
    Email：<input type="text" name="email" value="<?php echo ($data["email"]); ?>"/><br>
    <input type="submit" name="dosubmit" value="提交修改"/>
</form>
</body>
</html>