<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/10
 * Time: 15:28
 *
 * file_uploads = on    是否开启文件上传
 * upload_max_filesize = 2M 限制PHP处理文件大小的最大值，必须小于下面的值
 * post_max_size = 8M   限制通过post方法可以接受信息的最大值
 * upload_tmp_dir   上传的临时存放路径
 *
 * [pic] => Array
 * (
 * [name] => Array
 * (
 * [0] =>
 * [1] =>
 * [2] =>
 * )
 *
 * [type] => Array
 * (
 * [0] =>
 * [1] =>
 * [2] =>
 * )
 *
 * [tmp_name] => Array
 * (
 * [0] =>
 * [1] =>
 * [2] =>
 * )
 *
 * [error] => Array
 * (
 * [0] => 4
 * [1] => 4
 * [2] => 4
 * )
 *
 * [size] => Array
 * (
 * [0] => 0
 * [1] => 0
 * [2] => 0
 * )
 *
 * )
 */
/*echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';*/

$num = count($_FILES['pic']['name']);
for ($i = 0; $i < $num; $i++) {

//第一步：判断错误
    if ($_FILES['pic']['error'][$i] > 0) {
        switch ($_FILES['pic']['error'][$i]) {
            case 1:
                echo "表示上传文件的大小超出了约定值。文件大小的最大值在php配置文件中指定，该指令是：upload_max_filesize<br>";
                break;
            case 2:
                echo "表示上传文件的大小超出了HTML表单隐藏域属性的MAX_FILE_SIZE元素所指定的最大值1M<br>";
                break;
            case 3:
                echo "表示文件只能被部分上传<br>";
                break;
            case 4:
                echo "表示没有上传任何文件<br>";
                break;
            default:
                echo "未知错误<br>";
                break;
        }
        continue;
    }

//第二步：判断类型
    $arr = explode(".", basename($_FILES['pic']['name'][$i]));
    $hz = array_pop($arr);
    $allowtype = array("gif", "png", "jpg", "jpeg");
    if (!in_array($hz, $allowtype)) {
        echo "上传类型不合法！<br>";
        continue;
    }

//第三步：判断大小
    $maxsize = 1000000;
    if ($_FILES['pic']['size'][$i] > $maxsize) {
        echo "上传的文件超过了，{$maxsize}字节！";
        continue;
    }

//第四步：上传后的文件名一定要设置文件名
    $tmpfile = $_FILES['pic']['tmp_name'][$i];
    $srcname = "./yanzi/" . date("YmdHis") . rand(100, 999) . "." . $hz;
//将临时目录下的上传的文件，复制到我指定目录下，指定的名字就就可以完成上传
    if (move_uploaded_file($tmpfile, $srcname)) {
        echo "上传{$_FILES['pic']['name'][$i]}成功！<br>";
    } else {
        echo "上传失败！<br>";
    }
}