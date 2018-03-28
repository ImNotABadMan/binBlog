 <?php
include "Common.php";
include LIB."WeChatApi.class.php";
include LIB."WeChat.class.php";
$WeChat = new WeChat();
$media_data = MEDIA_UPLOAD."qrcode.png"; 
$str = $WeChat -> UploadMedia($media_data);
$json = json_decode($str);
var_dump($json);
