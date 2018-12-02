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
// include '';
 $data = '{
     "button":[
			{
				"type":"view",
				"name":"用户绑定",
				"url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxde85cdb773c8050a&redirect_uri=https%3A%2F%2Fwww.bingeblog.xin%2Findex.php%3Fp%3Dwechat%26m%3DwebWxApi%26a%3Dlogin&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect"
			},
			{
				"type":"view",
				"name":"个人中心",
				"url":"http://www.bingeblog.xin/index.php?p=wechat&m=webWxApi&a=user"
			},
			{
				"name":"博文推荐",
				"sub_button":[
				    {
				        "type":"view",
                        "name":"美食",
                        "url":"http://www.bingeblog.xin/index.php?p=wechat&m=webWxApi&a=allBlog&c_c_id=1&category=美食"
				    },
				    {
				        "type":"view",
                        "name":"技术",
                        "url":"http://www.bingeblog.xin/index.php?p=wechat&m=webWxApi&a=allBlog&c_c_id=2&category=技术"
				    },
				    {
				        "type":"view",
                        "name":"旅游",
                        "url":"http://www.bingeblog.xin/index.php?p=wechat&m=webWxApi&a=allBlog&c_c_id=3&category=旅游"
				    }
				]
			}
			]
	}';
//
$url = \core\WeChatApi::getApiUrl('api_create_menus$data = \'{
//     "button":[
//			{
//				"type":"view",
//				"name":"招生报名",
//				"url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxde85cdb773c8050a&redirect_uri=https%3A%2F%2Frecruit.ixiaoyuanzhi.com%2Findex.php%3Fg%3DClient%26m%3DIndex%26a%3Dindex&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect"
//			},
//			{
//				"type":"view",
//				"name":"通知中心",
//				"url":"http://recruit.ixiaoyuanzhi.com/index.php?g=Client&m=Examinee&a=register"
//			},
//			{
//				"type":"view",
//				"name":"个人中心",
//				"url":"http://recruit.ixiaoyuanzhi.com/index.php?g=Client&a=personal"
//			}
//			]
//	}\';');
$url .= $access_token;
$str = $WeChat -> CurlRequest( $url,$data );
$json = json_decode($str,true);
var_dump($json);