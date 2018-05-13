<?php
/**
 * Created by PhpStorm.
 * User: Binge
 * Date: 2018-05-12
 * Time: 23:12
 */

use \core\Controller as Controller;

class WebWxApi extends Controller
{
    private $_userModel;

    public function __construct()
    {
        parent::__construct();
        $this->_userModel = M('\\model\\UserModel')->table('bl_user');
    }

    public function getUrl()
    {
        define("TOKEN", "weixin");
        $WeChat = new \core\WeChat();
        $url = U('wechat/webWxApi/login');
        $url = \core\WeChatApi::setAccess($url);
        var_dump($url);
    }

    public function login()
    {
        if( IS_AJAX || IS_POST ){
            $acc = isset($_POST['username']) ? V($_POST['username']) : '';
            $pwd = isset($_POST['pwd']) ? V($_POST['pwd']) : '';
            $openid = session('wxData')['openid'];
            $condition = [
                'acc' => $acc,
                'pwd' => $pwd
            ];
            $user = $this->_userModel->select($condition)[0];
            if( !$user ){
                echo ajaxJson(['code' => 1, 'msg' => '没有此用户']);die;
            }
            $data = ['openid' => $openid];
            $res = $this->_userModel->update($data);
            if( !$res ){
                echo json_encode(['code' => 2, 'msg' => '绑定失败']);die;
            }

            echo json_encode(['code' => 0, 'msg' => '绑定成功']);die;

        }
        // 微信授权
        $WeChat = new \core\WeChat();
        $code = $_GET['code'];

        $data = $WeChat->codeTransAccessInfo($code);
        session('wxData', $data);
        // 获取用户信息
//        $userInfo = $WeChat->getUserInfo($data['access_token'], $data['openid']);

        $this->display('login.html');
    }

    public function success()
    {
        echo "<div>绑定成功</div>";die;
    }
}