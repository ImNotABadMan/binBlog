<?php
/**
 * Created by PhpStorm.
 * User: Binge
 * Date: 2018-05-13
 * Time: 20:31
 */
include dirname(dirname(dirname(realpath(__FILE__)))) . '/core/WeChatApi.class.php';
include dirname(dirname(dirname(realpath(__FILE__)))) . '/core/WeChat.class.php';
include dirname(dirname(dirname(realpath(__FILE__)))) . '/config/conf.php';

include dirname(dirname(dirname(realpath(__FILE__)))) . '/core/Model.class.php';

include dirname(dirname(dirname(realpath(__FILE__)))) . '/core/Func.php';

class WxSendBlogWxApi extends \core\WeChat
{
    private $_access_token;
    private $_openids;
    
    public function sendBlogs()
    {
        $blogModel = new \core\Model();
        $blogModel = $blogModel->table('bl_blog');
        $blogs = $blogModel->order('post_date desc, view_times desc')->limit('5')->select();

        $this->getOpenid();
        foreach ($this->_openids as $openidkey => $openid) {
            $tmp['touser'] = $openid;
            $tmp['msgtype'] = 'news';
            $tmp['news']['articles'] = [];
            foreach ($blogs as $key => $value) {
                $tmp['news']['articles'][$key]['title'] = $value['title'];
                $tmp['news']['articles'][$key]['description'] = $value['intro'];
                $tmp['news']['articles'][$key]['picurl'] = 'https://www.bingeblog.xin/' . $value['cover_img'];
                $tmp['news']['articles'][$key]['url'] = "https://www.bingeblog.xin/index.php?p=wechat&m=webWxApi&a=blog&id={$value['id']}&category={$value['c_c_name']}";
            }
            $this->CurlRequest("https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$this->_access_token}", json_encode($tmp, JSON_UNESCAPED_UNICODE),'json');
            echo json_encode($tmp);
        }
    }

    public function getAccessInfo()
    {
        $json = json_decode(file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxde85cdb773c8050a&secret=14b509f48b4de625c7d9cc20e1bb09ff'), true);
        $this->_access_token = $json['access_token'];
    }

    public function getOpenid()
    {
        $this->getAccessInfo();
        $json = file_get_contents("https://api.weixin.qq.com/cgi-bin/user/get?access_token={$this->_access_token}&next_openid=");
        $data = json_decode($json, true);
        $this->_openids = $data['data']['openid'];
    }
}

$wxSendBlog = new WxSendBlogWxApi();
$wxSendBlog->sendBlogs();



