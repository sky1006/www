<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-3
 * Time: 下午5:31
 * 顺序结构 -- 从上到下
 *
 * 分支结构：
 *  单一条件分支结构（if）
 * if(条件表达式) {
 *      语句组
 * }
 *  双向条件分支结构（else从句）
 * if(条件表达式) {
 *      语句1
 * } else {
 *      语句2
 * }
 *  多向条件分支结构（elseif子句，switch语句）
 * if(条件表达式) {
 *     语句1
 * } else if {
 *      语句2
 * } else if {
 *      语句3
 * }……
 * } else {
 * }
 * 注意：在这种多路分支中，只能进入一个
 *
 */
$age = 30;
echo "妹子漂亮" . "<br>";
if ($age > 20 && $age < 30) {
    echo "在车上聊" . "<br>";
    echo "在车上和妹子留了电话<br>";
} else {
    echo "自己在车上坐着<br>";
}
echo "妹子等着你" . "<br>";

$score = 70;
if ($score >= 90 && $score <= 100) {
    echo "优";
} else if ($score >= 80 && $score < 90) {
    echo "良";
} else if ($score >= 70 && $score < 80) {
    echo "好<br>";
} else if ($score >= 60 && $score < 70) {
    echo "一般";
} else if ($score >= 0 && $score < 60) {
    echo "差";
} else {
    echo "有误";
}

/*
 * 1、switch（）括号中，必须是一个变量
 * 2、在switch（）{}中放的是多个case语句，case空格，后面放的值，值的后面使用一个冒号：
 * 3、可以使用default在没有匹配值的时候，默认执行default中的代码
 * switch(变量){
 *      case 值:
 *          语句;
 *          语句;
 *          break;
 *      case 值2:
 *          语句;
 *          break;
 *      ……
 *      default:语句 break;
 * }
 * switch-case需要注意的一些细节
 * 1、如果在case中的语句过多，就需要将多个语句做成一个函数
 * 2、switch(变量)变量的类型：只允许两种类型 整型和字符串
 * 3、break是退出switch结构使用的，如果需要同时匹配多个值时，可以使用多个case而不加break；
 * 对比
 * else if 判断范围时使用
 * switch case 单个值匹配进行分支
 */
$floor = 11;
switch ($floor) {
    case 1:
    case 11:
    case 111:
        echo "这是第一层<br>";
        break;
    case 2:
        echo "这是第二层<br>";
        break;
    case 3:
        echo "这是第三层<br>";
        break;
    case 4:
        echo "这是第四层<br>";
        break;
    case 5:
        echo "这是第五层<br>";
        break;
    default:
        echo "这是其他楼层<br>";
        break;
}

/*
 * 巢状条件分支结构 就是if语句的嵌套
 *
 */
$name = "zhang";
$sex = "男";
$age = 61;

if ($sex == "男") {
    if ($age > 60) {
        echo "{$name}这个人，是男人，已经退休" . ($age - 60) . "年了<br>";
    } else {
        echo "{$name}这个人，是男人，还有" . (60 - $age) . "年退休<br>";
    }
} else {
    if ($age > 55) {
        echo "{$name}这个人，是女人，已经退休" . ($age - 55) . "年了<br>";
    } else {
        echo "{$name}这个人，是女人，还有" . (55 - $age) . "年退休<br>";
    }
}

/*
 *url get 地址
 * http://localhost/a.php?name=zhang&age=10&sex=1
 * http post 表单
 *
 *
 */
