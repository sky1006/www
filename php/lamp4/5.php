<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-24
 * Time: 下午3:41
 * for (表达式1;表达式2;表达式3) {
 * echo "循环体<br>";
 * }
 * 1、先执行表达式1
 * 2、再执行表达式2
 * 3、再执行循环体
 * 4、再执行表达式3
 * 5、再执行表达式2
 *
 * 注意：表达式1，只被执行一次（初始化）
 */
for ($i = 1; $i <= 10; $i++) {
    echo $i . "<br>";
}
$i = 1;
for (; ;) {
    if ($i > 10) {
        break;
    }
    echo $i;
    $i++;
}
echo '<br>';

$people = Array(
    Array('name' => 'Kalle', 'salt' => 856412),
    Array('name' => 'Pierre', 'salt' => 215863)
);

for ($i = 0, $size = sizeof($people); $i < $size; ++$i) {
    $people [$i]['salt'] = rand(000000, 999999);
}

for ($i = 1; $i <= 9; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "$j X $i = " . ($j * $i) . "&nbsp;&nbsp;";
    }
    echo '<br>';
}
echo '<br>';

for ($i = 1; $i <= 9; $i++) {
    for ($j = $i; $j >= 1; $j--) {
        echo "$j X $i = " . ($j * $i) . "&nbsp;&nbsp;";
    }
    echo '<br>';
}
echo '<br>';

for ($i = 9; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "$j X $i = " . ($j * $i) . "&nbsp;&nbsp;";
    }
    echo '<br>';
}
echo '<br>';

for ($i = 9; $i >= 1; $i--) {
    for ($j = $i; $j >= 1; $j--) {
        echo "$j X $i = " . ($j * $i) . "&nbsp;&nbsp;";
    }
    echo '<br>';
}
echo '<br>';