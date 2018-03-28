 <?php
include "Common.php";
include LIB."WeChatApi.class.php";
include LIB."WeChat.class.php";
$WeChat = new WeChat();
$access_token = $WeChat -> GetAccessToken();
$url = WeChatApi::getApiUrl('api_clear_menus');
$url .= $access_token;
$str = $WeChat -> CurlRequest( $url );
$json = json_decode($str);
if( $json -> errmsg == 'ok'){
	echo "Clear Menus Successfully\n";
}