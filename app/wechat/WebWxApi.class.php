<?php
/**
 * Created by PhpStorm.
 * User: Binge
 * Date: 2018-05-12
 * Time: 23:12
 */


class WebWxApi
{
    public function getUrl()
    {
        define("TOKEN", "weixin");
        $WeChat = new \core\WeChat();
        $url = U('wechat/webWxApi/login');
        $url = \core\WeChatApi::setAccess($url);

        $code = $_GET['code'];

        $data = $WeChat->codeTransAccessInfo($code);

        $userInfo = $WeChat->getUserInfo($data['access_token'], $data['openid']);
        echo $url;

    }
}