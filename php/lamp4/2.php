<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-24
 * Time: 下午2:23
 * 循环结构 while
 * while (expr)
 * statement
 *
 */
/*$i = 0;
while ($i <= 10) {
    echo "{$i} 妹子真漂亮<br>";
    $i++;
    /*    if ($i>=10) {
        break;
        }
        $i++;
}*/

echo '<table border="1" align="center" width="800">';
echo '<caption><h1>练习循环使用的表格</h1></caption>';
/*$i = 0;
while ($i < 1000) {
    if ($i % 10 == 0) {
        echo '<tr>';
    }
    $i++;
    echo '<td>' . $i . '</td>';
    if ($i % 10 == 0) {
    echo '</tr>';
    }

}*/
$i = 0;
while ($i < 100) {
    $j = 0;
    if ($i % 2 == 0) {
        echo '<tr bgcolor="#CCCCCC">';
    } else {
        echo '<tr>';
    }
    while ($j < 10) {
        echo '<td>' . $j . '</td>';
        $j++;
    }
    echo '</tr>';
    $i++;
}
echo '</table>';


