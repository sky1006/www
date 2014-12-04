<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-24
 * Time: 下午4:16
 * break :在switch本体中使用，会使得程序流程离开switch本体中的语句，如用在for、while或
 *      do-while循环结构中，会使得程序离开该层循环；
 * continue:作用与break有点类似，如使用在for、while或do-while循环结构中，当程序执行到continue
 *      时，之后的语句将被略过，而直接执行下一次的循环动作；
 * exit：当前的脚本只要执行到exit语句，不管它在那个结构中都会直接退出当前脚本，exit是一个
 *      函数，当前使用过的die()函数就是exit()的别名。可以带参数输出一条消息，并退出当前脚本。
 *
 */

for ($i = 0; $i < 100; $i++) {
    if ($i >= 10) {
        break;
    }
    echo "{$i} 每天吃饭<br>";
}

echo '<br>';
for ($i = 0; $i < 30; $i++) {
    if ($i % 3 == 0) {
        continue;
    }
    echo "{$i} 每天吃饭<br>";
}

//exit ("后面的不执行了!!!");

echo '<br>';
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        if ($j > 5) {
            break 2; //退出两个for循环
        }
        echo "#";
    }

    echo "<br>";
}
echo "<br>";
/*
 * goto(PHP 5 >= 5.3.0):goto 操作符可以用来跳转到程序中的另一位置。该目标位置可以用目标名称加上冒号来标记，
 * 而跳转指令是 goto 之后接上目标位置的标记。PHP 中的 goto 有一定限制，目标位置只能位于同一个文件和作用域，
 * 也就是说无法跳出一个函数或类方法，也无法跳入到另一个函数。也无法跳入到任何循环或者 switch 结构中。
 * 可以跳出循环或者 switch，通常的用法是用 goto 代替多层的 break。
 */
$x = false;
echo "1111111111111<br>";
if ($x) {
    goto be;
} else {
    goto ab;
}
echo "22222222222222<br>";
echo "33333333333<br>";
be:
echo "444444444444<br>";
echo "555555555<br>";
ab:
echo "6666666666666<br>";
echo "77777777777<br>";
