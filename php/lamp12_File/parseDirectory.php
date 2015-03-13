<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/3
 * Time: 15:00
 *
 * c:/appserver/www.a.php  -- windows
 * /usr/local/nginx -- linux
 * 1、注意，"c:/appserver/www",所有的程序中，不管是什么操作系统，全部使用
 * "/"代表路径分隔符号（PHP程序中，Apache配置文件中，PHP的配置文件中，
 * 只要有目录的情况，全部使用/）
 * 2、windows ;  linux  :
 * 3、 .   ..
 * 4、不同的根路径
 *      一个是文档根目录（在浏览器中使用的）；
 *      一个是操作系统的根（PHP操作的）。
 */
echo "aaa" . DIRECTORY_SEPARATOR . "BBB" . DIRECTORY_SEPARATOR . "ccc";
echo "<br>";
echo "aaa/bbbb/ccc/ddd" . PATH_SEPARATOR . "/www/yyyy";
echo "<br>";
echo "aaaaaaaa" . PHP_EOL;
echo "aaaaaaaa" . PHP_EOL;
echo "aaaaaaaa" . PHP_EOL;
echo "aaaaaaaa" . PHP_EOL;
echo "aaaaaaaa" . PHP_EOL;
echo "<br>";
//var_dump(get_defined_constants()) ;
//echo '<img src="./a.jpg">';
echo "<br>";
echo basename("http://www.lampbrother.net/aaa/bb/demo.php") . '<br>';
echo basename("/aaa/bb/demo.php") . '<br>';
echo basename("../../aaa/bb/demo.php" . ".php") . '<br>';
echo dirname("../../aaa/bb/ccc.php") . '<br>';

print_r(pathinfo("/aaa/bbb/demo.php"));
