<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-24
 * Time: 下午3:25
 * while (条件表达式) {
 *      循环体
 * }
 * 第一步先执行表达式，表达式为true时，才执行循环体
 *
 * do {
 *      循环体
 * } while (条件表达式);
 * 第一步先执行循环体，再判断条件表达式，成立则执行下一个循环体
 */
while (false) {
    echo "妹子真漂亮<br>";
}

do {
    echo "强哥真帅<br>";
} while (false);

$i = 0;
do {
    echo "{$i} @@@@@@@@@@@<br>";
    $i++;
} while ($i < 100);