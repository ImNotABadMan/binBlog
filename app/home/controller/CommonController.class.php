<?php
/**
 * @Author: anchen
 * @Date:   2018-01-25 10:29:04
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-02-24 09:45:31
 */
namespace home\controller;
use \core\Controller;

class CommonController extends Controller{

    public function __construct(){
        parent::__construct();
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