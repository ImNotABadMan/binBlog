<?php

namespace home\controller;
use \home\controller\CommonController as Controller;

class AboutController extends Controller{

    public function showAbout(){

        $rows = M('\\model\\AboutModel')->getRows('*','cate_about','1 limit 2');
        $rows1 = M('\\model\\AboutModel')->getRow('*','cate_about','id=1');
        $rows2 = M('\\model\\AboutModel')->getRow('*','cate_about','id=2');
        $abilitys = M('\\model\\AboutModel')->getRows('*','cate_about','id<5');

        //分类模板变量
        $this->assign('rows',$rows);
        $this->assign('rows1',$rows1);
        $this->assign('rows2',$rows2);
        $this->assign('abilitys',$abilitys);

        //渲染模板页面
        $this->display('about.html');
    }
}