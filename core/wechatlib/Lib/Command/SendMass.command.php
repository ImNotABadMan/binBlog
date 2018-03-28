 <?php
include "Common.php";
include LIB."WeChatApi.class.php";
include LIB."WeChat.class.php";
$WeChat = new WeChat();
$data = '{
	"touser":[
		"oiInT0t2xFFJnbqymXuNAezg-sGc",
		"oiInT0uZXEHcXuvV0-vnZPAO_bu8"
	],
	"msgtype":"text",
	"text":{"content":"Hello,WeChat Dev!!"}
}';
//在api当中有个叫sendMass的方法
$str = $WeChat -> sendMass( $data );
//把json转化为数组进行打印
$msg = json_decode($str,true);
var_dump($msg);