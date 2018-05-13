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

        if( $this->sendType == 'location' )
        {
            $lat = $this -> lat; //获取纬度信息
            $lng = $this -> lng;// 获取经度的信息
            //拼凑百度的lbs云api地址
            $url = "http://api.map.baidu.com/geocoder/v2/?location={$lat},{$lng}&output=json&pois=1&ak=Xh2kiT2FWMD0fPRaWU2zGxYdBZCPKP87";
            //获取纬经度
            $point = "您当前的纬度是{$lat},经度是{$lng}\n";
            //使用curl请求lbs云,使用get请求
            $str = $this -> CurlRequest( $url );
            //把json数据转化为数组或者对象
            $adr = json_decode($str,true); #加上true转化为数组,不加为对象
            $formatAdr = "您的卫星地位地址:".$adr['result']["formatted_address"]."\n周边信息如下:\n";
            //获取周边信息
            $adrPos = $adr['result']['pois'];
            $poses = '';
            foreach ($adrPos as $pos ) {
                $poses .= "【{$pos['poiType']}】 {$pos['name']}\n";
            }
            $this -> reText($point.$formatAdr.$poses);
            exit();
        }
	}
	
	private function login()
    {

    }

    // public function responseMsg(){
    //     $this->valid();
    // }

}
