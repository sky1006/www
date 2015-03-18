<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/16
 * Time: 16:55
 */
include "header.php";
include "../classes/page.class.php";

if (isset($_GET['action']) && $_GET['action'] == 'ser') {
//    print_r($_POST);
    $tmp = !empty($_POST) ? $_POST : $_GET;
    $whr = array();
    //如果bookname不为空，说明想搜索书名
    if (!empty($tmp['bookname'])) {
        $whr[] = "bookname like '%{$tmp['bookname']}%'";
        $args .= "&bookname={$tmp['bookname']}";
    }
    //如果author不为空，说明想搜索作者
    if (!empty($tmp['author'])) {
        $whr[] = "author like '%{$tmp['author']}%'";
        $args .= "&author={$tmp['author']}";
    }
    //如果minprice不为空，说明想搜索价格大于多少
    if (!empty($tmp['minprice'])) {
        $whr[] = "price>='{$tmp['minprice']}'";
        $args .= "&minprice={$tmp['minprice']}";
    }
    //如果maxprice不为空，说明想搜索价格小于多少
    if (!empty($tmp['maxprice'])) {
        $whr[] = "price<='{$tmp['maxprice']}'";
        $args .= "&maxprice={$tmp['maxprice']}";
    }
//    print_r($whr);
    if (!empty($whr)) {
        $where = " where " . implode(" and ", $whr);
//        $args=http_build_query($tmp);
    } else {
        $where = "";
    }
}
//用户是否有动作
if (isset($_GET['action'])) {
    //删除图书的动作
    if ($_GET['action'] == "del") {
        //删除多个
        if (!empty($_POST['id'])) {
            $sql = "delete from books  id in (" . implode(',', $_POST['id']) . ")";

        } else {
            //删除单个记录
            $sql = "delete from books where id='{$_GET['id']}'";
        }
        $result = mysql_query($sql);
        if ($result && mysql_affected_rows() > 0) {
            //先从数据库中，通过id将表中的图片名称获取到

            //再删除

            echo "数据删除成功！<br>";
        } else {
            echo "数据删除失败！<br>";
        }
    }

}

//获取总记录数
$sql = "select count(*) as total from books {$where}";
$res = mysql_query($sql);
$data = mysql_fetch_assoc($res);
//创建分页对象
$page = new Page($data['total'], $num, $args);

$sql = "select id,bookname,publisher,author,price,ptime from books {$where} order by id {$page->limit}";
echo $sql . '<br>';
$result = mysql_query($sql);

echo "搜索图书：";
echo '<form action="list.php?action=ser" method="post">';
echo '按书名：<input type="text" name="bookname" size="8" value="' . $tmp['bookname'] . '" />&nbsp;&nbsp;';
echo '按作者：<input type="text" name="author" size="8" value="' . $tmp['author'] . '"/>&nbsp;&nbsp;';
echo '按价格：<input type="text" name="minprice" size="8" value="' . $tmp['minprice'] . '" />';
echo '-<input type="text" name="maxprice" size="8" value="' . $tmp['maxprice'] . '"/>&nbsp;&nbsp;';
echo '<input type="submit" name="sersubmit" value="搜索"/>';
echo '</form>';

echo '<form action="list.php?action=del&page=' . $page->page . '" method="post" onsubmit="return confirm(\'你确定要删除这些图书吗？\')">';
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
    echo '<td><a href="mod.php?action=mod&id=' . $id . '">修改</a>/<a onclick="return confirm(\'你确定要删除《' . $bookname . '》这个图书吗？\')" href="list.php?action=del' . $args . '&page=' . $page->page . '&id=' . $id . '">删除</a></td>';
    echo '</tr>';
}

echo '<tr><td><input type="submit" name="dosubmit" value="删除" />删除</td><td colspan="7" align="right">' . $page->fpage() . '</td></tr>';
echo '</table>';
echo '</form>';

include "footer.php";