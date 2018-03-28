<?php
/**
 * @Author: anchen
 * @Date:   2018-01-10 08:38:15
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-02-07 19:35:57
 */
namespace Admin\Controller;
use \core\Controller;

class APITestController extends Controller{
    public function getBlog(){
        $info = M("\\model\\BlogModel")->getRow('*', 'bl_blog',  "id = {$_GET['id']}" );
        echo json_encode($info);
    }

    public function getLastBlog(){
        $info = M("\\model\\BlogModel")->order('rand()')->limit(5)->getRows('*', 'bl_blog',  "1" );
        echo json_encode($info);
    }

    public function getOpenId(){
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wx23e82fb4d430b802&secret=01c059b3ba2f895895eb055c1111535a&js_code=" . $_GET['code'] . "&grant_type=authorization_code";
        $ch = curl_init();
        // echo $url . "<br />";
        // $type = isset($_GET['type']) ? $_GET['type'] : 'text';

        // if($type == 'json'){
        //     @curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //         'Content-type: application/json',
        //         'Content-length: ' . strlen($data)
        //     ));
        // }
        // $data = isset($_GET['contentType']) ? $_GET['contentType'] : 'get';
        // if($data == 'post'){
        //     //版本问题，可能会出现advice的提示，所以需要屏蔽
        //     @curl_setopt($ch, CURLOPT_POST, $data == null? false: true);//POST请求
        //     @curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // }

        curl_setopt($ch, CURLOPT_URL, $url);//请求地址
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);//是否以https
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//是否输出问文本流
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);//是否加密
        $data = curl_exec($ch);//执行
        curl_close($ch);//关闭

        echo $data;
    }
}
