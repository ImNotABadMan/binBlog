<?php
/**
 * @Author: anchen
 * @Date:   2018-02-23 20:38:23
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-02-24 08:57:23
 */
namespace home\controller;
use \home\controller\CommonController as Controller;

class PublicController extends Controller{

    public function login(){
        $this->display("public/login.html");
    }

    public function loginh(){

        $username = isset($_POST['username']) ? V($_POST['username']) : "";
        $pwd = isset($_POST['pwd']) ? V($_POST['pwd']) : "";
        $code = isset($_POST['code']) ? V($_POST['code']) : "";

        if( !($username && $pwd) ){
            // return false;
            echo "<script>history.back();</script>";
            exit;
        }

        @session_start();
        if($code == ""){
            echo "<script>alert('请填写验证码');</script>";
            exit;
        }

        if($code != $_SESSION['code']){
            echo "<script>alert('验证码不对');history.back();</script>";
            exit;
        }

        $user = M("\\model\\UserModel")->getRow('*', 'bl_user', "username = '{$username}' and pwd = '{$pwd}'");

        if(!$user){
            echo "<script>alert('账号或者密码不对');history.back();</script>";
            exit;
        }

    }

    public function logout(){
        @session_start();
        unset($_SESSION['user']);
        setcookie('user', 'xxx', time() - 1);
        setcookie('is_rm7', 'xxx', time() - 1);
        $url = C('URL') . "/index.php?p=home&m=index&a=showList";
        header('location: ' . $url);
    }

    public function code(){
        M("\\plugins\\CaptchaTool")->outputImg();
    }
}