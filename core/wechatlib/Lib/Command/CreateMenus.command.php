 <?php
include "Common.php";
include "../../../WeChatApi.class.php";
include "../../../WeChat.class.php";
$WeChat = new \core\WeChat();
$access_token = $WeChat -> GetAccessToken();
//$data = '{
//		"button":[
//			{
//				"type":"click",
//				"name" :"菜单1",
//				"key":"menus1"
//			},
//			{
//				"type":"click",
//				"name":"菜单2",
//				"key":"menus2"
//			},
//			{
//				"name":"菜单3",
//				"sub_button":[
//						{
//							"type":"click",
//							"name":"子菜单1",
//							"key":"sub1"
//						},
//						{
//							"type":"view",
//							"name":"子菜单2",
//							"url":"http://www.qq.com"
//						},
//						{
//							"type":"view",
//							"name":"子菜单3",
//							"url":"http://www.qq.com"
//						}
//				]
//			}
//		]
//}';
 $data = '{
     "button":[
			{
				"type":"view",
				"name":"个人中心",
				"url":"https://www.binblog.com/index.php?p=wechat&m=webWxApi&a=getUrl"
			}
			]
	}';
$url = \core\WeChatApi::getApiUrl('api_create_menus');
$url .= $access_token;
$str = $WeChat -> CurlRequest( $url,$data );
$json = json_decode($str,true);
var_dump($json);