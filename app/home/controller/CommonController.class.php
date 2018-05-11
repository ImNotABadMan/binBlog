<?php
/**
 * @Author: anchen
 * @Date:   2018-01-25 10:29:04
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-04-17 21:49:02
 */
namespace home\controller;
use \core\Controller;

class CommonController extends Controller{

    public function __construct(){
        parent::__construct();

        $navs = M("\\model\\CCateModel")->getRows('*', 'bl_cate_category', "parent_id = 0");

        $this->assign("navs", $navs);

        $this->checkCookie();
    }

    public function checkCookie(){
        error_reporting(E_ALL ^ E_NOTICE);

        if( !($_COOKIE['province'] || $_COOKIE['city']) && strtolower($_GET['m']) != 'public' ){
            header('location:' . C('URL'));
            die;
        }

    }
}