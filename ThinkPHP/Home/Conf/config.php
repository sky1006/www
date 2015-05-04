<?php
return array(
    //'配置项'=>'配置值'
    'URL_PATHINFO_DEPR' => '/', //修改URL的分隔符
    /*'TMPL_ENGINE_TYPE' =>'Smarty',//使用smarty模板
    'TMPL_ENGINE_CONFIG' => array(
        'left_delimiter' => '<{',// 左边界
        'right_delimiter' => '}>',//右边界
    ),*/
    'TMPL_L_DELIM' => '<{', //修改左定界符
    'TMPL_R_DELIM' => '}>', //修改右定界符

    //DB配置
//    'DB_TYPE' => 'mysql',   //设置数据库类型
//    'DB_HOST' => '115.28.100.155',//设置主机
//    'DB_NAME' => 'xsphp',//设置数据库名
//    'DB_USER' => 'yinq',    //设置用户名
//    'DB_PWD' => 'xin123@#$',        //设置密码
//    'DB_PORT' => '3306',   //设置端口号
    'DB_PREFIX' => 'tb_',  //设置表前缀
    'DB_DSN' => 'mysql://yinq:xin123@#$@115.28.100.155:3306/xsphp',//使用DSN方式配置数据库信息

    'SHOW_PAGE_TRACE' => true,  //开启页面Trace
    'TMPL_TEMPLATE_SUFFIX'=>'.html',    //更改模板文件后缀名
//    'TMPL_FILE_DEPR'=>'_',  //修改模板文件目录层次
//    'DEFAULT_THEME'=>'my',    //设置默认模板主题
//    'TMPL_DETECT_THEME'=>true,  //自动侦测模板主题
//    'THEME_LIST'=>'your,my',    //支持的模板主题列表

);
?>