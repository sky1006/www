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
 *  巢状条件分支结构
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
    echo "好";
} else if ($score >= 60 && $score < 70) {
    echo "一般";
} else if ($score >= 0 && $score < 60) {
    echo "差";
} else {
    echo "有误";
}