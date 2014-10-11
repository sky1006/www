<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-10-11
 * Time: 下午4:37
 * 冒泡排序
 */
$arr = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
function mysort($arr)
{
    $len = count($arr);
    for ($i = 0; $i < $len - 1; $i++) {
        for ($j = 0; $j < $len - $i - 1; $j++) {
            if ($arr[$j] < $arr[$j + 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $tmp;
            }
        }
    }
    return $arr;
}

print_r($arr);
echo '<br>';
print_r(mysort($arr));
echo '<br>';
/*
 * 二分法排序
 */
$arr2 = array(20, 15, 29, 13, 45, 65, 96, 78, 80, 19);

