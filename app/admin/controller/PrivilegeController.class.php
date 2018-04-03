<?php
namespace admin\controller;
use \core\Controller;

class PrivilegeController extends Controller{
	public function showLogin(){

		$this->display('Privilege/login.html');
	}
	public function captcha(){
		M('\\plugins\\CaptchaTool')->outputImg();
	}
	public function loginh(){
		//addslashes 防sql注入
		$acc=addslashes(trim($_POST['acc']));
		$pwd=addslashes(trim($_POST['pwd']));
		$captcha=addslashes(trim($_POST['captcha']));
		//开启SESSION机制
		@session_start();
		$url=C('URL').'/index.php?p=admin&m=privilege&a=showLogin';
		if(empty($acc)||empty($pwd)||empty($captcha)){
			echo'账号,密码,验证码必须填写!';
			header('Refresh:3;url='.$url);
			exit;
		}
		//检查验证码是否正确
		if($captcha!=$_SESSION['captcha']){
			echo'验证码错误,请输入正确的验证码:'.$_SESSION['captcha'];
			header('Refresh:3;url='.$url);
			exit;
		}

		$pwd=md5($pwd);
		$condition="acc='{$acc}' and is_admin=1";
		$row=M('\\model\\UserModel')->getRow('*','bl_user',$condition);
		if($row['pwd']==$pwd){
			//设置登陆成功标识
			$_SESSION['admin']=$row;
			if(!empty($_POST['rm7'])&&$_POST['rm7']==='YES'){
				setcookie('is_rm7',md5('yes'),time()+7*24*3600);
				setcookie('nnn',$row['id'],time()+7*24*3600);

			}
			$url=C('URL').'/index.php?p=admin&m=user&a=showList';
			header('location:'.$url);
			exit;
		}else{
			echo'账号或密码不正确,请你重新填写!';
			header('Refresh:3;url='.$url);
			exit;
		}
	}
	public function logout(){
		@session_start();
		unset($_SESSION['admin']);
		setcookie('is_rm7','xxx',time()-1);
		setcookie('nnn','xxx',time()-1);
		$url=C('URL').'/index.php?p=admin&m=privilege&a=showLogin';
		header('location:'.$url);
		exit;

	}
}
?>