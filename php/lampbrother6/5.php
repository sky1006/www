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
echo '<br>*****-------------****+++++++++++============<br>';
/*
 * 二分法排序(快速排序)
 */
$arr2 = array(20, 15, 29, 13, 45, 65, 96, 78, 80, 19);
function qsort($arr2) {
    if (!is_array($arr2) || empty($arr2)) {
        return array();
    }
    $len = count($arr2);    //获取数组长度
    if ($len <=1) {         //如果数组中只有一个元素，直接返回这个数组
        return $arr2;
    }
    $key[0] = $arr2[0];
    $left = array();
    $right = array();
    for ($i=1; $i<$len; $i++) {
        if ($arr2[$i] <= $key[0]) {
            $left[] = $arr2[$i];
        }else {
            $right[] = $arr2[$i];
        }
    }
/*    print_r($left);
    echo '<br>';
    echo $key;
    echo '<br>';
    print_r($right);
    echo '<br>';*/
    $left=qsort($left);
    $right=qsort($right);
    return array_merge($left,$key,$right);
}
print_r($arr2);
echo '<br>';
print_r(qsort($arr2));
echo '<br>*****-------------****+++++++++++============<br>';
/*
 * 数组的排序函数
 * sort -- 对数组排序（升序）
 * rsort -- 对数组逆向排序（降序）
 * ksort -- 对数组按照键名排序
 * krsort -- 对数组按照键名逆向排序
 * asort -- 对数组进行排序并保持索引关系（关联数组排序）
 * arsort -- 对数组进行逆向排序并保持索引关系
 * natsort -- 用“自然排序”算法对数组排序
 * natcasesort -- 用“自然排序”算法对数组进行不区分大小写字母的排序
 * usort -- 使用用户自定义的比较函数对数组中的值进行排序
 * uasort -- 使用用户自定义的比较函数对数组中的值进行排序并保持索引关系
 * uksort -- 使用用户自定义的比较函数对数组中的键名进行排序
 * array_multisort -- 对多个数组或多维数组进行排序
 */
$arr3 = array(20, 15, 29, 13, 45, 65, 96, 78, 80, 19);
print_r($arr3);
echo '<br>';
rsort($arr3);
print_r($arr3);
echo "<br>";
echo '<br>*****-------------****+++++++++++============<br>';

$arr4 = array(1=>"Linux",9=>"Apache",4=>"MySQL",3=>"PHP");
print_r($arr4);
echo '<br>';
ksort($arr4);
print_r($arr4);
echo '<br>*****-------------****+++++++++++============<br>';

$arr5 = array("file.txt","file11.txt","file2.txt","file1.txt","file12.txt");
print_r($arr5);
echo '<br>';
natsort($arr5);
print_r($arr5);
echo '<br>*****-------------****+++++++++++============<br>';

$arr6 = array("fidffle.txt","file1f1.txt","fffdile2.txt","file1.txt","file12.txt");
print_r($arr6);
echo '<br>';
usort($arr6,function($a,$b) {
    $alen = strlen($a);
    $blen = strlen($b);
    if ($alen > $blen) {
        return 1;
    }else if ($alen<$blen) {
        return -1;
    }else {
        return 0;
    }
});
print_r($arr6);
echo '<br>*****-------------****+++++++++++============<br>';

$arr7 = array("a",8,"b",23);
$arr8 = array(1,2,9,5);
array_multisort($arr7,$arr8);

print_r($arr7);
echo '<br>';
print_r($arr8);
echo '<br>*****-------------****+++++++++++============<br>';

$data = array(
    array("id"=>1,"name"=>"aa","age"=>10),
    array("id"=>2,"name"=>"ww","age"=>30),
    array("id"=>3,"name"=>"cc","age"=>30),
    array("id"=>4,"name"=>"dd","age"=>40),
);
$ages= array();
$names = array();
foreach ($data as $value) {
    $ages[] = $value['age'];
    $names[] = $value['name'];
}

array_multisort($ages,$names,$data);
echo '<pre>';
print_r($data);
echo '</pre>';