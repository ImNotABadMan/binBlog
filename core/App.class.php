<?php

namespace core;// 创建了一个  全局空间 下的 core空间

class App{

    private static $objArr=array();// 保存对象的数组静态属性

    // 创建一个专门实现单例的方法  $className表示需要实例化对象的类名
    public static function single($className){
        //    empty(self::$objArr['\\admin\\controller\\NewsController'])
        if( empty(self::$objArr[$className]) ){// 判断该类的对象是否存在，如果不存在，则进入if结构体创建一个对象
            // self::$objArr['\\admin\\controller\\NewsController'] = new \admin\controller\NewsController
            self::$objArr[$className] = new $className;// 根据当前类名创建这个类的对象
        }

        return self::$objArr[$className];// 将当前这个类的对象作为返回值返回
    }

    // 自动加载静态方法   $className表示传递的是一个类名
    public static function autoload($className){

        $cname = basename(str_replace("\\", '/', $className));// 获得除去了命名空间后的类名  比如如果是  admin\controller\NewsController，则将获得NewsController

        //var_dump($cname);
        if( substr($cname, -10)=='Controller' ){// 如果截取尾部10个字符为Controller，则说明这是一个控制器类
            //           mvc/app/                     admin              /controller/     NewsController    .class.php
            $path = ROOT_APP_PATH . $GLOBALS['plat'] . '/controller/' . $cname . '.class.php';
            include $path;// 引入控制器类文件
            // echo $cname  . "<br />";
            // echo  $GLOBALS['plat'] . "<br />";
            // echo ROOT_APP_PATH  . "---" . $path;die;
        }elseif( substr($cname, -5)=='Model' ){// 如果截取尾部5个字符为Model，则说明这是一个模型类
            //           mvc/app/model/                NewsModel .class.php
            $path = ROOT_APP_MODEL_PATH . $cname . '.class.php';
            include $path;// 引入模型类文件
        }elseif( substr($cname, -4)=='Tool' ){// 如果截取尾部4个字符为Tool，则说明这是一个工具类
            $path = ROOT_PLU_PATH . $cname . '.class.php';
            include $path;// 引入工具类文件
        }elseif( substr($cname, -5) == 'WxApi'){
            $path = ROOT_APP_WECHAT_PATH . $cname . '.class.php';
            $path = str_replace('\\', '/', $path);
            include $path;
        }elseif( substr($cname, -3) == 'Api' ){
            $path = ROOT_APP_API_PATH . $cname . '.class.php';
            $path = str_replace('\\', '/', $path);
            include $path;
        }
        //var_dump($path);

    }

    //构建一个启动方法
    public static function run(){
        header("content-type:text/html;charset=utf8");
        #接收一个名为a的GET参数
        $GLOBALS['action'] = $action = isset($_GET['a']) ? $_GET['a'] : C('index.a');  //这个参数在MVC中表示需要执行的动作参数，其实就是访问类中的方法名
        #接收一个名为m的GET参数
        $GLOBALS['module'] = $module = isset($_GET['m']) ? ucfirst($_GET['m']) : C('index.m');//这个参数在MVC中表示模块参数，其实就是访问的控制器类名
        #接收一个名为p的GET参数
        $GLOBALS['plat'] = $plat = isset($_GET['p']) ? $_GET['p'] : C('index.p');//这个参数在MVC中表示平台参数，其实就是访问的前台还是后台空间名

        #实例化后台新闻管理系统控制器类的对象
        //拼接类名
        //$className = '\\admin\\controller\\' . $module . 'Controller';

        if($plat == 'api'){
            $className = '\\' . $plat . '\\' . $module . 'Api';
        }elseif($plat == 'wechat' ){
            $className = $module;
        }else{
            $className = '\\' . $plat . '\\controller\\' . $module . 'Controller';
        }
        //$obj = new \admin\controller\NewsController;
        //$obj = new $className;
        //                                   \admin\controller\NewsController
        //$obj = \core\App::single($className);
        $obj = M($className);

        #通过控制器类的对象调用方法展示不同的页面
        //$obj->showList();
        //$obj->showAd();

        $obj->$action();
    }
}