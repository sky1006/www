<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/15
 * Time: 16:33
 * @param $name 控件name，id
 * @param $value 选中值
 * @param $isdatetime 是否显示时间
 * @param $loadjs 是否重复加载js，防止页面程序加载不规则导致的控件无法显示
 * @param $showweek 是否显示周，使用，true|false
 */
function smarty_function_laydate($args, $smarty)
{
    //print_r($args);
    /*$name = $args['name'];
    $value = !empty($args['value']) ? $args['value'] : '';
    $isdatetime = !empty($args['time']) ? $args['time'] : 0;

    if ($value == '0000-00-00 00:00:00') $value = '';
    $id = preg_match("/\[(.*)\]/", $name, $m) ? $m[1] : $name;
    if ($isdatetime) {
        $size = 21;
        $format = '%Y-%m-%d %H:%M:%S';
        $showsTime = 12;
    } else {
        $size = 10;
        $format = '%Y-%m-%d';
        $showsTime = false;
    }
    $str = '';*/
    /*if (!defined('CALENDAR_INIT')) {
        define('CALENDAR_INIT', 1);
        $str .= '<script src="./js/laydate/laydate.js"></script>
<link rel="stylesheet" type="text/css" href="./js/laydate/need/laydate.css" />
<link rel="stylesheet" type="text/css" href="./js/laydate/skins/dahong/laydate.css" />
<link rel="stylesheet" type="text/css" href="./js/laydate/skins/danlan/laydate.css" />
<link rel="stylesheet" type="text/css" href="./js/laydate/skins/default/laydate.css" />
<link rel="stylesheet" type="text/css" href="./js/laydate/skins/molv/laydate.css" />
<link rel="stylesheet" type="text/css" href="./js/laydate/skins/qianhuang/laydate.css" />
<link rel="stylesheet" type="text/css" href="./js/laydate/skins/yahui/laydate.css" />
<link rel="stylesheet" type="text/css" href="./js/laydate/skins/yalan/laydate.css" />';
    }
    $str .= '<input type="text" name="' . $name . '" id="' . $id . '" value="' . $value . '" size="' . $size . '" class="date" readonly>&nbsp;';
    $str .= '<script type="text/javascript">
var start = {
    elem:'#start';
    format: 'YYYY/MM/DD hh:mm:ss';
    min: laydate.now(); //设定最小日期为当前日期
    max: '2099-06-16 23:59:59'; //最大日期
    istime: true;
    istoday: false;
    choose: function(datas){
    end.min = datas; //开始日选好后，重置结束日的最小日期
    end.start = datas; //将结束日的初始值设定为开始日
    }
};
var end = {
    elem: '#end';
    format: 'YYYY/MM/DD hh:mm:ss';
    min: laydate.now();
    max: '2099-06-16 23:59:59';
    istime: true;
    istoday: false;
    choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
    }
};
laydate(start);
laydate(end);
</script>';
    return $str;*/

}