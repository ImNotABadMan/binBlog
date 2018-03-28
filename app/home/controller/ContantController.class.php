<?php

namespace home\controller; //创建了一个  全局空间 下的 admin空间 下的 controller空间
use \home\controller\CommonController as Controller;


class ContantController extends Controller{


    public function showContant(){


        //渲染模板页面
        $this->display('contant.html');
    }
    public function Cont_deal(){
        @session_start();

        $_SESSION['name'] = isset($_POST['name']) ? $_POST['name'] : "";
        $_SESSION['email'] = isset($_POST['email']) ? $_POST['email'] : "";
        $_SESSION['theme'] = isset($_POST['theme']) ? $_POST['theme'] : "";
        $_SESSION['content'] = isset($_POST['content']) ? $_POST['content'] : "";
        // $post_date = date('Y-m-d H:i:s',time());
        $_SESSION['type'] = isset($_POST['type']) ? $_POST['type'] : "";  //接收表单的类型

        $this->display('contant/thanks_img.html');

        if( $_SESSION['type']!='Info' ){
            $url = C('URL') . "/index.php?p=home&m={$_POST['type']}&a=show{$_POST['type']}";
        }else{
            $url = C('URL') . "/index.php?p=home&m=contant&a=showContant";
        }


        echo '<script>';
        echo "setTimeout(\"window.location.href='$url'\",3000)";
        echo '</script>';
        //header('Refresh:2;url='.$url);
        //if( $_SESSION['type']=='subscription_C' ){
            //$url = C('URL') . '/index.php?p=home&m=contant&a=showContant';
        //}else
            //$url = C('URL') . '/index.php?p=home&m=about&a=showAbout';
    }

    public function ThanksImg(){

        @session_start();

        if( $_SESSION['type']=='Contant'||$_SESSION['type']=='About' ){

            if( !empty( $_SESSION['S_mail'] ) ){
                $this->img('订阅了也没东西看的',25);

            }else{
                $this->img('啥都没写,用天线接收资讯吗?',15);

            }

        }elseif( $_SESSION['type']=='Info' ){

           if( empty($_SESSION['name'])&&empty($_SESSION['email'])&&empty($_SESSION['theme'])&&empty($_SESSION['content']) ){
                $this->img('你TM在逗我??',35);
            }elseif( empty($_SESSION['email']) ){
                $this->img('就算你填了邮箱我们也不打算联系你',10);
            }elseif( empty($_SESSION['theme']) ){
                $this->img('所以主题是空气配空气咯?',20);
            }elseif( empty($_SESSION['content']) ){
                $this->img('内容都不写,靠意念做菜吗?',20);
            }elseif( empty($_SESSION['name']) ){
                $this->img('名字都不写,你是要上天哦?',20);
            }else{
                $this->img('感谢你的建议,反正我们也不一定采纳,再见!',3);
                if(!is_dir(ROOT . "User")){
                    mkdir(ROOT . "User");
                }
                $post_date = date('Y-m-d H:i:s',time());

                file_put_contents(ROOT . "User/UserInfo.txt","name={$_SESSION['name']},email={$_SESSION['email']},theme={$_SESSION['theme']},content={$_SESSION['content']},W_time={$post_date}\r\n\r\n",FILE_APPEND);
            }
        }
    }

    public function img($str,$num){

        $w=1200;
        $h=300;
        $resource = imagecreatetruecolor($w,$h);
        $color = imagecolorallocate($resource,0x0e,0x0e,0x0e);
        imagefill($resource,0,0,$color);

        $x = $w*$num/100;
        $y = $h*55/100;
        $color = imagecolorallocate($resource,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        imagettftext($resource,45,0,$x,$y,$color, dirname(dirname(dirname(dirname(__FILE__)))) . "/public/plugins/huawencaiyun.ttf",$str);

        header('Content-type:image/jpeg');
        imagejpeg($resource);
    }

    public function User_email(){
        // var_dump(dirname(dirname(dirname(dirname(__FILE__)))) . "/public/plugins/huawencaiyun.TTF");exit;

       @session_start();
       $_SESSION['S_mail'] = !empty($_POST['S_email']) ? $_POST['S_email'] : "";
       $_SESSION['type'] = isset($_POST['type']) ? $_POST['type'] : "";
       $post_date = date('Y-m-d H:i:s',time());

       if( $_SESSION['S_mail'] ){
            if(!is_dir(ROOT . "User")){
                mkdir(ROOT . "User");
            }
            file_put_contents(ROOT . "User/S_EmailInfo.txt","{$_SESSION['S_mail']},W_time={$post_date}\r\n",FILE_APPEND);
            $this->Cont_deal();
       }else{
            $this->Cont_deal();
       }
    }
}

