<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/13
 * Time: 17:17
 *
 */
//分页类
class Page
{
    private $total; //总记录数
    private $nums;  //每页显示的条数
    private $pages; //总页数


    public function __construct($total, $nums)
    {
        $this->total = $total;
        $this->nums = $nums;
        $this->pages = $this->getPages();
    }

    function fpage()
    {
        return "共{$this->total}条记录 本页显示{$this->nums}条记录 从30-40条 3/{$this->pages} 首页 上一页 1 2 3 4 下一页 末页";
    }

    //获取页数
    private function getPages()
    {
        return ceil($this->total / $this->nums);

    }
}