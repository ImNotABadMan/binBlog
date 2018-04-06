<?php

namespace core;

class WeChatApi
{
	const appID = 'wxde85cdb773c8050a';
	const appsecret = '14b509f48b4de625c7d9cc20e1bb09ff';
	//微信api接口链接
	public static function getApiUrl($name){
		$url = array(
			//api凭证access_token接口
			'api_access_token'=>"https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".self::appID."&secret=".self::appsecret,
			//客服消息发送接口
			'api_customer_send'=>"https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=",
			//创建菜单接口
			'api_create_menus' => "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=",
			//删除菜单接口
			'api_clear_menus' => "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=",
			//使用code换取网页授权信息接口(获取openid和网页access_token)
			'api_get_access_info' => "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".self::appID."&secret=".self::appsecret."&grant_type=authorization_code&code=",
			//群发消息接口
			'api_send_mass'=>'https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=',
			//媒体上传接口
			'api_upload_media'=>'https://api.weixin.qq.com/cgi-bin/media/upload?type=image&access_token=',
			//授权验证接口
			'web_access_auth'=>'https://api.weixin.qq.com/sns/auth?',
			//snsapi_userinfo拉取用户信息接口
			'api_get_userinfo'=>'https://api.weixin.qq.com/sns/userinfo?',

		);
		return $url[$name];
	}
	//对网页进行授权
	public static function setAccess($url,$type='snsapi_userinfo'){
		$url = urlencode($url);
		$appID = self::appID;
		if( $type=='snsapi_base'){
			return "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appID}&redirect_uri={$url}&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
		}else{
			return "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appID}&redirect_uri={$url}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
		}
	}
	//消息回复模板
	public static function getMsgTpl($type){
			$tpl = array(
				//文本模板
				"text" =>  "<xml>
					      <ToUserName><![CDATA[%s]]></ToUserName>
					     <FromUserName><![CDATA[%s]]></FromUserName>
					     <CreateTime>%s</CreateTime>
					     <MsgType><![CDATA[%s]]></MsgType>
					     <Content><![CDATA[%s]]></Content>
					     <FuncFlag>0</FuncFlag>
					      </xml>",
				//图片模板
             	"image" => "<xml>
				         <ToUserName><![CDATA[%s]]></ToUserName>
				         <FromUserName><![CDATA[%s]]></FromUserName>
				         <CreateTime>%s</CreateTime>
				        <MsgType><![CDATA[%s]]></MsgType>
				       <Image>
				      <MediaId><![CDATA[%s]]></MediaId>
				      </Image>
	                  </xml>",

			   //音乐模板
	           "music"=>"<xml>
			    <ToUserName><![CDATA[%s]]></ToUserName>
			    <FromUserName><![CDATA[%s]]></FromUserName>
			    <CreateTime>%s</CreateTime>
			    <MsgType><![CDATA[%s]]></MsgType>
			    <Music>
			    <Title><![CDATA[%s]]></Title>
			    <Description><![CDATA[%s]]></Description>
			    <MusicUrl><![CDATA[%s]]></MusicUrl>
			    <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
			    </Music>
			    </xml>",
			    //视频模板
			    "video"=>"<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[%s]]></MsgType>
				<Video>
				<MediaId><![CDATA[%s]]></MediaId>
				<Title><![CDATA[%s]]></Title>
				<Description><![CDATA[%s]]></Description>
				</Video>
				</xml>",

		        //图文模板
		        "news" => "<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[%s]]></MsgType>
				<ArticleCount>%s</ArticleCount>
				<Articles>
				 %s
				</Articles>
				</xml>"
			);
			return $tpl[$type];
	}
	//调试工具
	public static function debugTrace($filename,$data){
		file_put_contents($filename, $data);
	}

}