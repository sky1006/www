<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/10
 * Time: 14:12
 */
class Smarty
{
    private $vars = array();
    //第一个 向模板中分配变量
    //有两个参数,一个参数是模板中的变量名,一个是分配给他的变量值
    public function assign($varname, $varvalue)
    {
        $this->vars[$varname] = $varvalue;
    }

    //加载指定的模板,并显示
    //有一个参数,参数就是模板的文件名
    public function display($tplname)
    {
        $comfile = "./comps/" . $tplname . "_com.php";
        $tplname = "./templates/" . $tplname;

        if (!file_exists($comfile) || filemtime($tplname) > filemtime($comfile)) {
            $html = file_get_contents($tplname);

            $zz = '/\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}/';
            $rep = "<?php echo \$this->vars['\\1']; ?>";

            $newhtml = preg_replace($zz, $rep, $html);
            file_put_contents($comfile, $newhtml);
        }
        include $comfile;

    }

} 