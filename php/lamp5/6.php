<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-30
 * Time: 下午3:13
 *
 * require()将一个文件在预处理期间被导入，像把该文件粘贴到使用函数的地方
 * include()和require()几乎等价，区别在于在脚本执行时包含，当处理失败时，include()产生一个警告而require()
 * 则导致一个致命错误
 *
 * include_once()和require_once()
 * 两个函数在脚本执行期间包括并运行指定文件
 * 与include()和require()类似，唯一区别是如果该文件中的代码已经被包括了，则不会再次包括，只会包括一次。
 * 这两个函数应该用于在脚本执行期间同一个文件有可能被包括超过一次的情况下，你想确保它只被包括一次以避免
 * 函数重定义，变量重新赋值等问题。
 *
 * 在控制语句中使用include()包含。
 */
include("function.inc.php");
one();
two();
three();
echo("444444444<br>");