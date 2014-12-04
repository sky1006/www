<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-25
 * Time: 下午4:29
 * 整型（integer）和浮点型（float或double）
 *
 */
echo ord('h'); //104

$a = 10;
$b = 077;
$c = 0xff;

echo "<br>";
echo $a, "<br>";
echo $b, "<br>";
echo $c, "<br>";

$d = 2147483647;
var_dump($d);
$e = 2147483648;
var_dump($e);
//mkdir("/usr/hello",0755);

$f = 300000000000000000000;
var_dump($f);
$g = 0.000000000000000000003;
var_dump($g);
$h = 3E-3;
var_dump($h)
?>

<!-- 浮点数是个近似值 -->
<script>
    var a = 0;
    for (var i = 0; i < 10; i++) {
        a += 0.1;
    }
    alert(a);
</script>