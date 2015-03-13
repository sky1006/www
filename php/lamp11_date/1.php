<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/2
 * Time: 11:21
 *
 * 时间戳：2015-03-02 11:20:00
 * 1、是一个整数
 * 2、1970-1-1 到现在的秒数
 */
date_default_timezone_set("PRC");
echo time() . '<br>';
$t = time() - 60 * 60 * 24 * 7;
echo date("Y-m-d H:i:s", time()) . "<br>";
echo date("Y/m/d H:i:s", $t) . "<br>";
echo date("Y年m月d日 H:i:s", $t) . "<br>";

//单个时间转换成时间戳 mktime
$year = 1983;
$m = 12;
$d = 29;
$td = mktime(0, 0, 0, $m, $d, $year);
$dtime = time();
echo floor(($dtime - $td) / 60 / 60 / 24) . '<br>';

//格式化日期转换成时间戳 strtotime
$a = "2015-03-02 11:48:52";
$b = "2016-03-02";
echo floor((strtotime($b) - strtotime($a)) / (24 * 60 * 60)) . '<br>';

$start = microtime(true);
for ($i = 0; $i < 100000; $i++) {

}
$end = microtime(true);
echo $end - $start;
echo '<br>**********************************************<br>';

$yea = isset($_GET['year']) ? $_GET['year'] : date("Y"); //当前年
$month = isset($_GET['month']) ? $_GET['month'] : date("m");//当前月
$day = isset($_GET['day']) ? $_GET['day'] : date("d");//当前的日

//当年当月的天数
$days = date("t", mktime(0, 0, 0, $month, 1, $yea));

//获取当月的第一天是星期几
$startweek = date("w", mktime(0, 0, 0, $month, 1, $yea));

echo "今天是{$yea}年{$month}月{$day}日，是情人节！<br>";
echo '<table border="1" width="300" align="center">';
echo '<tr>';

echo '<th style="background: blue">日</th>';
echo '<th style="background: blue">一</th>';
echo '<th style="background: blue">二</th>';
echo '<th style="background: blue">三</th>';
echo '<th style="background: blue">四</th>';
echo '<th style="background: blue">五</th>';
echo '<th style="background: blue">六</th>';

echo '</tr>';
echo '<tr>';
for ($i = 0; $i < $startweek; $i++) {
    echo "<td>&nbsp;</td>";
}

for ($j = 1; $j < $days; $j++) {
    $i++;
    if ($j == $day) {
        echo "<td style='background: green'>{$j}</td>";
    } else {
        echo "<td>{$j}</td>";
    }
    if ($i % 7 == 0) {
        echo '</tr><tr>';
    }
}
while ($i % 7 !== 0) {
    echo '<td>&nbsp;</td>';
    $i++;
}
echo '</tr>';
echo '</table>';