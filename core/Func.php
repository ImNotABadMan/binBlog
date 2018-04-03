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

function pr($obj){
    echo "<pre>";
    print_r($obj);
}

// 生成url地址
function U($args = '', $args1 = []){
    // 分割字符串
    $items  = explode('/', $args);
    $plat   = $GLOBALS['plat'];
    $module = $GLOBALS['module'];
    $action = $GLOBALS['action'];
    if($args != ''){
        switch(count($items)){
            case 1:
                $url = C('URL') . "/index.php?p={$plat}&m={$module}&a={$items[0]}";
                break;
            case 2:
                $url = C('URL') . "/index.php?p={$plat}&m={$items[0]}&a={$items[1]}";
                break;
            case 3:
                $url = C('URL') . "/index.php?p={$items[0]}&m={$items[1]}&a={$items[2]}";
                break;
        }
    }else{
        $url = C('URL') . "/index.php?p={$plat}&m={$module}&a={$action}";
    }


    foreach ($args1 as $key => $val) {
        $url .= "&{$key}={$val}";
    }
    return $url;
}


// 设置或者获得session
function session($name, $value = ''){
    @session_start();
    if($value == ''){
        if( isset($_SESSION[$name]) ){
            return $_SESSION[$name];
        }else{
            return '';
        }
    }

    $_SESSION[$name] = $value;
    return true;
}