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
function smarty_function_date($args, $smarty)
{
    //print_r($args);
    $name = $args['name'];
    $value = !empty($args['value']) ? $args['value'] : '';
    $isdatetime = !empty($args['time']) ? $args['time'] : 0;
    $loadjs = 0;

    if ($value == '0000-00-00 00:00:00') $value = '';
    $id = preg_match("/\[(.*)\]/", $name, $m) ? $m[1] : $name;
    if ($isdatetime) {
        $size = 21;
        $format = '%Y-%m-%d %H:%M:%S';
        $showsTime = 24;
    } else {
        $size = 10;
        $format = '%Y-%m-%d';
        $showsTime = false;
    }
    $str = '';
    if ($loadjs || !defined('CALENDAR_INIT')) {
        define('CALENDAR_INIT', 1);
        $str .= '<script src="./css/date/css/jscal2.css"></script>
<script src="./css/date/css/lang/cn.css"></script>
<link rel="stylesheet" type="text/css" href="./css/date/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="./css/date/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="./css/date/css/steel/steel.css" />
';
    }
    $str .= '<input type="text" name="' . $name . '" id="' . $id . '" value="' . $value . '" size="' . $size . '" class="date" readonly>&nbsp;';
    $str .= '<script type="text/javascript">
Calendar.setup({
weekNumbers:true,
inputField:"' . $id . '",
trigger : "' . $id . '",
dateFormat:"' . $format . '",
showTime:"' . $showsTime . '",
minuteStep:1,
onSelect : function(){this.hide();}
});
</script>';
    return $str;

}