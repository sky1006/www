<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-28
 * Time: 下午4:58
 * 命名空间 -- 名字空间  PHP5.3后引入
 *      1、常量
 *      2、函数
 *      3、类
 *使用namespace来声明；在namespace声明命名空间的代码上面，不能有任何PHP代码和HTML内容输出（除了declare），
 * 声明命名空间只能是第一条
 *在实际的编程实践中，非常不提倡在同一个文件中定义多个命名空间。（不要在大括号外部加任何代码）
 *
 */
//声明一个名字空间，前缀为yanzi
//declare(encoding='utf-8');
namespace yanzi;
//定义子命名空间
namespace yanzi\sub;
const AAA=1;
class Demo {
    static function one() {
        echo "11111111<br>";
    }
}
function test() {
    echo '2222222222<br>';
}

test();
\yanzi\sub\test();
echo AAA.'<br>';
echo \yanzi\sub\AAA.'<br>';

Demo::one();
\yanzi\sub\Demo::one();
