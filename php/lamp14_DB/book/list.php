<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/16
 * Time: 16:55
 */
include "header.php";
$sql = "select id,bookname,publisher,author,price,ptime from books order by id";
$result = mysql_query($sql);
echo '<table border="1" width="900">';
echo '<caption><h3>图书列表</h3></caption>';
echo '<tr>';
echo '<th>&nbsp;</th>';
echo '<th>编号</th>';
echo '<th>图书名称</th>';
echo '<th>出版社</th>';
echo '<th>作者</th>';
echo '<th>价格</th>';
echo '<th>添加时间</th>';
echo '<th>操作</th>';
echo '</tr>';

while (list($id, $bookname, $publisher, $author, $price, $ptime) = mysql_fetch_row($result)) {
    echo '<tr>';
    echo '<td><input type="checkbox" name="id[]" value="' . $id . '"></td>';
    echo '<td>' . $id . '</td>';
    echo '<td>《' . $bookname . '》</td>';
    echo '<td>' . $publisher . '</td>';
    echo '<td>' . $author . '</td>';
    echo '<td>￥' . number_format($price, 2, ".", ",") . '</td>';
    echo '<td>' . date("Y-m-d H:i", $ptime) . '</td>';
    echo '<td><a href="mod.php?id=' . $id . '">修改</a>/<a href="list.php?action=del&id=' . $id . '">删除</a></td>';
    echo '</tr>';
}

echo '<tr><td>删除</td><td colspan="7" align="right">分页</td></tr>';
echo '</table>';

include "footer.php";