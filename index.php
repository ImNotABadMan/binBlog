<?php

# 错误提示显示
error_reporting(E_ALL ^ E_NOTICE);

#引入初始化操作文件
include './config/init.php';

# 微信认证
$weixin = new WxApi();
//$weixin->valid();

# 如果是微信请求，跳转到微信方法里面
$dataFromClient = isset($GLOBALS["HTTP_RAW_POST_DATA"]) ? $GLOBALS['HTTP_RAW_POST_DATA'] : file_get_contents("php://input");
if(substr($dataFromClient, 1, 3) == 'xml' && strpos($dataFromClient, 'ToUserName')){
    if($xml = simplexml_load_string($dataFromClient)){
        $conf['index'] = array(
            'p'=>'wechat',
            'm'=>'WxApi',
            'a'=>'responseMsg'
        );
        // 获取用户的openid
        $weixin->getOpenid();
        if( isset( $xml->Latitude) ){
            $json = file_get_contents("http://api.map.baidu.com/geocoder/v2/?location={$xml->Latitude},{$xml->Longitude}&output=json&pois=1&ak=Xh2kiT2FWMD0fPRaWU2zGxYdBZCPKP87");
            $data = json_decode($json);
            $province = str_replace('省', '', $data['addressComponent']['province']);
            $city = str_replace('市', '', $data['addressComponent']['city']);
            $condition = [
                'name' => $city
            ];
            $cate = M('\\mode\\CateModel')->table('table')->select($condition);
//            M('\\model\\UserModel')->table('bl_user')->update('');

        }
    }

}


#调用启动方法寻找访问的页面
\core\App::run();
