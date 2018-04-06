<?php
include dirname(dirname(dirname(realpath(__FILE__)))) . '/core/WeChatApi.class.php';
include dirname(dirname(dirname(realpath(__FILE__)))) . '/core/WeChat.class.php';

class WxApi extends \core\Wechat
{
	public function responseMsg(){
		parent::responseMsg();
		if( !empty( $this->keyword ) ){
			$this -> reText('欢迎使用微信公众平台开发API');
		}

	}

    // public function responseMsg(){
    //     $this->valid();
    // }

}
