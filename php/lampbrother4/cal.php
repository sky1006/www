<html>
<head>
    <title>简单计算器</title>
</head>
<body>
<table border="0" width="400" align="center">
    <form action="cal.php" method="post">
        <caption><h1>简单计算器</h1></caption>
        <tr>
            <td>
                <input type="text" size="5" name="num1" value=""/><br>
            </td>
            <td>
                <select name="ysf">
                    <option value="+"> +</option>
                    <option value="-"> -</option>
                    <option value="*"> *</option>
                    <option value="/"> /</option>
                    <option value="%"> %</option>
                </select>
            </td>
            <td>
                <input type="text" size="5" name="num2" value=""/><br>
            </td>

            <td>
                <input type="submit" name="sub" value="计算">
            </td>
        </tr>
    </form>
</table>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-22
 * Time: 下午5:47
 */
if (isset($_POST['sub'])) {
    echo "用户提交了";
} else {
    echo "用户是在刷新";
}
echo '<br>';
//var_dump($_POST);