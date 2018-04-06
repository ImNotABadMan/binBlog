<?php

# 错误提示显示
error_reporting(E_ALL ^ E_NOTICE);

#引入初始化操作文件
include './config/init.php';

# 微信认证
// $weixin = new WxApi();
// $weixin->valid();

# 如果是微信请求，跳转到微信方法里面
$dataFromClient = isset($GLOBALS["HTTP_RAW_POST_DATA"]) ? $GLOBALS['HTTP_RAW_POST_DATA'] : file_get_contents("php://input");
if(simplexml_load_string($dataFromClient, 'SimpleXMLElement', LIBXML_NOCDATA)){
    $conf['index'] = array(
        'p'=>'wechat',
        'm'=>'WxApi',
        'a'=>'responseMsg'
    );
}


#调用启动方法寻找访问的页面
\core\App::run();
