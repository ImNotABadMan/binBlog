<?php
namespace core;

class WeChat
{
	//客户端的openId
	protected $fromUsername;
	//服务器的id
	protected $toUsername;
	//客户端上传的信息
	protected $keyword;
	//客户端上传的类型
	protected $sendType;
	//订阅类型或者菜单CLICK事件推送
	protected $Event;
	//菜单事件推送的EventKey
	protected $EventKey;
	//语音内容
	protected $Recognition;
	protected $lat;
	protected $lng;
	protected $time;
	public function CurlRequest($url,$data=null){

	}
	public function GetAccessToken(){
	}
	//自动回复(此方法必须覆盖)
	public function responseMsg(){
        $dataFromClient = isset($GLOBALS["HTTP_RAW_POST_DATA"]) ? $GLOBALS['HTTP_RAW_POST_DATA'] : file_get_contents("php://input");
		if (!empty($dataFromClient)){
			$postObj = simplexml_load_string($dataFromClient, 'SimpleXMLElement', LIBXML_NOCDATA);
            $this -> fromUsername = $postObj->FromUserName;
            $this -> toUsername = $postObj->ToUserName;
            $this -> keyword = trim($postObj->Content);
            $this -> sendType = trim($postObj->MsgType);
            $this -> Event = trim($postObj->MsgType)=='event' ? $postObj->Event : '';

            $this -> Recognition = trim($postObj->MsgType)=='voice' ? $postObj->Recognition : '语音内容无法识别';
            $this -> EventKey = $postObj->Event=='CLICK' ? $postObj->EventKey : '';
   			$this -> lat = trim($postObj->MsgType)=='location' ? $postObj->Location_X : '';
     		$this -> lng = trim($postObj->MsgType)=='location' ? $postObj->Location_Y : '';
            $this -> time = time();
		}
	}
	protected function reText( $contentStr ){
		$resultStr = sprintf(WeChatApi::getMsgTpl('text'), $this->fromUsername, $this->toUsername, $this->time, 'text', $contentStr);
		echo $resultStr;
	}
	protected function reImage( $MediaId ){
		$resultStr = sprintf(WeChatApi::getMsgTpl('image'), $this->fromUsername, $this->toUsername, $this->time, 'image', $MediaId );
		echo $resultStr;
	}
	protected function reMusic( $title,$desc,$url,$hqurl ){
		$resultStr = sprintf(WeChatApi::getMsgTpl('music'), $this->fromUsername, $this->toUsername, $this->time, 'music', $title, $desc, $url, $hqurl);
        echo $resultStr;
	}
    protected function reVideo($MediaId,$title,$desc){
        $resultStr = sprintf(WeChatApi::getMsgTpl('video'), $this->fromUsername, $this->toUsername, $this->time, 'video', $MediaId,$title,$desc);
        echo $resultStr;
    }
	protected function reNews($items){
		$count = count( $items );
		$item = $this -> createNewsItems($items);
		$resultStr = sprintf(WeChatApi::getMsgTpl('news'), $this->fromUsername, $this->toUsername, $this->time, 'news', $count,$item);
        echo $resultStr;
	}
	private function createNewsItems($items){
		foreach ($items as $data ) {
			$item .= "<item>
			<Title><![CDATA[{$data['Title']}]]></Title>
			<Description><![CDATA[{$data['Desc']}]]></Description>
			<PicUrl><![CDATA[{$data['PicUrl']}]]></PicUrl>
			<Url><![CDATA[{$data['Url']}]]></Url>
			</item>";
		}
		return $item;
	}
	protected function reSubscribe( $contentStr ){
		$this -> reText( $contentStr );
	}
    private function checkSignature(){
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
    }
    protected function CustomerReText( $Text ){
    	$access_token = $this -> GetAccessToken();
    	$fromUsername = $this -> fromUsername;
    	$url = WeChatApi::getApiUrl('api_customer_send');
    	$url .= $access_token;
    	$content  = urlencode($Text);
        $data = array(
                "touser" => "{$fromUsername}" ,
                "msgtype"=>"text",
                "text" => array(
                    "content"=> $content,
                ),
        );
        $data = json_encode($data);
        $data = urldecode($data);
        $this -> CurlRequest( $url , $data );
        exit();
    }
    protected function CustomerReImgText( $ImgText ){
     	$access_token = $this -> GetAccessToken();
    	$fromUsername = $this -> fromUsername;
    	$url = WeChatApi::getApiUrl('api_customer_send');
    	$url .= $access_token;
    	$set = array();
        foreach ($ImgText as $rs){
            $content = null;
            $content = array(
                "title"=>urlencode($rs['title']),
                "description"=>urlencode($rs['desc']),
                "url"=>$rs['url'],
                "picurl"=>$rs['picurl'],
            );
            $set[] = $content;
        }
        $data = array(
            "touser"=>"{$fromUsername}",
            "msgtype"=>"news",
            "news" => array(
                "articles" => $set,
            ),
        );
        $data = json_encode($data);
        $data = urldecode($data);
        $this -> CurlRequest( $url , $data );
        exit();
    }
    public function codeTransAccessInfo($code=null){
    	if( isset($code) ){
    		$url = WeChatApi::getApiUrl('api_get_access_info');
    		$url .= $code;
			$str = $this -> CurlRequest( $url );
			$access_info = json_decode($str,true);
			return $access_info;
    	}else{
			exit("Error:must TransCode.");
    	}
    }
    public function SendMass($data){
    	$access_token = $this -> GetAccessToken();
    	$url = WeChatApi::getApiUrl('api_send_mass');
    	$url .= $access_token;
    	return $this -> CurlRequest( $url,$data );
    }
    public function vailAccessInfo($openId,$web_access_token)
    {
		$url = WeChatApi::getApiUrl('web_access_auth');
		$url .= "access_token={$web_access_token}&openid={$openId}";
		$str = $this -> CurlRequest( $url );
		$validInfo = json_decode($str,true);
		return $validInfo;
    }
    public function getUserInfo($web_access_token,$openId){
        $url = WeChatApi::getApiUrl('api_get_userinfo');
        $url .= "access_token={$web_access_token}&openid={$openId}&lang=zh_CN";
        $str = $this->CurlRequest( $url );
        $userInfo = json_decode($str,true);
        return $userInfo;
    }
    public function UploadMedia($media_data){
    	$access_token = $this -> GetAccessToken();
    	$url = WeChatApi::getApiUrl('api_upload_media');
    	$url .= $access_token;
    	$data['media'] = $media_data;
    	return $this -> CurlRequest($url,$data);
    }
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
           echo $echoStr;
           exit;
        }
    }
}