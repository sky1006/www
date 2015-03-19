<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/19
 * Time: 15:29
 *
 * memcache分布式存取
 *
 */
//创建memcache对象
$mem = new Memcache();

//连接memcache服务器
//$mem->addserver("localhost", 11211);
$mem->addserver("115.28.100.155", 11211);

//数据库的连接和操作
$sql = "select id,username,passwd,age,sex,email from users order by id";
$key = md5($sql);
//直接从内存memcache要数据
$data = $mem->get($key);
//如果有数据就从内存中返回数据，如果没有才连接数据库，执行sql语句
if (empty($data)) {

    try {
        $pdo = new PDO("mysql:host=115.28.100.155;dbname=xsphp", "yinq", "xin123@#$");
    } catch (PDOException $e) {
        echo "数据库连接失败：" . $e->getMessage();
    }

//获取数据，执行查询语句
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $mem->set($key, $data, MEMCACHE_COMPRESSED, 10);
    echo "这是第一次访问，从数据库获取的数据，并放到了内存中<br>";
}

echo '<pre>';
print_r($data);
echo '</pre>';
//关闭连接
$mem->close();