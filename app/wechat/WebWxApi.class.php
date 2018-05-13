<?php
/**
 * Created by PhpStorm.
 * User: Binge
 * Date: 2018-05-12
 * Time: 23:12
 */

use \core\Controller as Controller;

class WebWxApi extends Controller
{
    public function getUrl()
    {
        define("TOKEN", "weixin");
        $WeChat = new \core\WeChat();
        $url = U('wechat/webWxApi/login');
        $url = \core\WeChatApi::setAccess($url);
        var_dump($url);
    }

    public function login()
    {
        if( IS_AJAX ){

        }
        $WeChat = new \core\WeChat();
        $code = $_GET['code'];

        $data = $WeChat->codeTransAccessInfo($code);

        // 获取用户信息
//        $userInfo = $WeChat->getUserInfo($data['access_token'], $data['openid']);

        $this->display('login.html');
    }
}