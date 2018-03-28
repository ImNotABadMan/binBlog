<?php
define("TOKEN", "weixin");
include dirname(__FILE__)."/Lib/WeChatApi.class.php";
include dirname(__FILE__)."/Lib/WeChat.class.php";
class WxApi extends Wechat
{
	public function responseMsg(){
		parent::responseMsg();
		if( !empty( $this->keyword ) ){
			$this -> reText('欢迎使用微信公众平台开发API');
		}
		
	}
	
}
$WxApi = new WxApi();
$WxApi ->valid();
$WxApi -> responseMsg();