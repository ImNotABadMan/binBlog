<?php
include dirname(dirname(dirname(realpath(__FILE__)))) . '/core/WeChatApi.class.php';
include dirname(dirname(dirname(realpath(__FILE__)))) . '/core/WeChat.class.php';

class WxApi extends \core\Wechat
{
	public function responseMsg(){
		parent::responseMsg();
		if( !empty( $this->keyword ) ){
			$this -> reText('欢迎使用微信公众平台开发API' . $this->lat . ' - ' . $this->lng);
		}

	}

    public function getOpenid()
    {
        $json = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxde85cdb773c8050a&secret=14b509f48b4de625c7d9cc20e1bb09ff');
        file_put_contents($json);
    }

    // public function responseMsg(){
    //     $this->valid();
    // }

}
