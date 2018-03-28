<?php

/**
 * 获取配置中的配置项值
 * @param   $confStr    string    表示配置项父子类型的名，例：$confStr='pdo.char';
 */
function C($confStr){

    $config = $GLOBALS['conf'];//获得所有的配置项的值

    $confArr = explode('.', $confStr);
    foreach( $confArr as $v ){
        $config = $config[$v];
    }

    return $config;
}

/**
 * 专门返回实例化单例对象的函数
 * @param   $className   string   需要实例化对象的类名，包含命名空间，$className = '\admin\controller\NewsController';
 */
function M($className){
    return \core\App::single($className);
}

function V($str){
    return addslashes(trim($str));
}

//返回Json数据
function ajaxJson($data){
    return json_encode($data);
}