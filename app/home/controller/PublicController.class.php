<?php
/**
 * @Author: anchen
 * @Date:   2018-02-23 20:38:23
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-05-09 22:08:06
 */
namespace home\controller;
use \home\controller\CommonController as Controller;

class PublicController extends Controller{

    public function login(){
       if(IS_POST){
            $username = isset($_POST['username']) ? V($_POST['username']) : "";
            $pwd = isset($_POST['pwd']) ? md5(V($_POST['pwd'])) : "";
            $code = isset($_POST['code']) ? V($_POST['code']) : "";

            if( !($username && $pwd) ){
                $this->display("public/login.html");
                echo "<script>alert('用户名和密码不能为空');</script>";
                exit;
            }

            if($code == ""){
                $this->display("public/login.html");
                echo "<script>alert('请填写验证码');</script>";
                exit;
            }
            if($code != $_SESSION[C('VAR_CAPTCHA')]){
                $this->display("public/login.html");
                echo "<script>alert('验证码不对');history.back();</script>";
                exit;
            }

            $user = M("\\model\\UserModel")->getRow('*', 'bl_user', "acc = '{$username}' and pwd = '{$pwd}' and is_admin = 0");

            if(!$user){
                echo "<script>alert('账号或者密码不对');history.back();</script>";
                exit;
            }

            session('user', $user);
            header('location: ' . U('Home/index/showList'));die;
        }
        $this->display("public/login.html");
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

    public function register(){
        $this->display('');
    }
}

