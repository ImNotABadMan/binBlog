<?php

namespace core;  //创建了一个  全局空间  下的 core空间

//创建了一个父类控制器类
class Controller extends \Smarty{

    //protected $smarty;//保存SMARTY对象的属性

    //创建一个构造方法
    public function __construct(){
        $this->checkLogin();
        #调用父类中的构造方法执行一次，解决父类构造方法被重写的问题
        parent::__construct();

        //实例化Smarty类的对象
        //$smarty = new \Smarty;
        //$this->smarty = new \Smarty;

        //设置模板目录   mvc/app/admin/view/
        //$smarty->setTemplateDir(ROOT_APP_ADMIN_VIEW_PATH);
        //$this->smarty->setTemplateDir(ROOT_APP_ADMIN_VIEW_PATH);
        //                     mvc/app/                 admin                  /view
        $templateDir = ROOT_APP_PATH . $GLOBALS['plat'] . '/view';
        //$this->smarty->setTemplateDir($templateDir);
        $this->setTemplateDir($templateDir);
        //设置模板编译缓存目录   mvc/app/admin/view_c
        //$smarty->setCompileDir(ROOT_APP_ADMIN_PATH.'view_c');
        //$this->smarty->setCompileDir(ROOT_APP_ADMIN_PATH.'view_c');
        //                    mvc/app/                  admin          /view_c
        $compileDir = ROOT_APP_PATH . $GLOBALS['plat'] . '/view_c';
        //$this->smarty->setCompileDir($compileDir);
        $this->setCompileDir($compileDir);
        @session_start();
    }

    public function checkLogin(){
        @session_start();
        if(!isset($_SESSION['admin'])&&$GLOBALS['module']!='Privilege'&&$GLOBALS['plat']=='admin'&&$GLOBALS['module']!='APITest'){
            echo'请先登陆!';
            $url=C('URL').'/index.php?p=admin&m=privilege&a=showLogin';
            header('Refresh:2;url='.$url);
            exit;
        }
    }

}