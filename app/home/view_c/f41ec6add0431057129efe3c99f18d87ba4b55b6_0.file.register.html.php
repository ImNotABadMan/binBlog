<?php
/* Smarty version 3.1.29, created on 2018-05-12 15:03:37
  from "D:\Apache24\htdocs\binBlog\app\home\view\public\register.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5af691c96340a8_02764915',
  'file_dependency' => 
  array (
    'f41ec6add0431057129efe3c99f18d87ba4b55b6' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\home\\view\\public\\register.html',
      1 => 1526108614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af691c96340a8_02764915 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo C('URL');?>
/public/admin/css/app.css" />
</head>
<body>
<div class="loginform" style="margin-top: 20px;">
    <div class="title" style="background-color: #0165ad;"><span class="logo-text font18">Bin客</span></div>
    <div class="body" style="background-color: #fff; border:1px solid black;">
        <form id="form1" name="form1" method="post" action="<?php echo U('');?>
">
            <label class="log-lab">账号</label>
            <input name="username" type="text" class="login-input-user" style="background-color: #fff;"  id="textfield1" value=""/>
            <label class="log-lab">邮箱</label>
            <input name="username" type="text" class="login-input-user" style="background-color: #fff;"  id="textfield2" value=""/>
            <label class="log-lab">密码</label>
            <input name="pwd" type="password" style="background-color: #fff;"  class="login-input-pass" id="textfield3" value=""/>
            <label class="log-lab">确认密码</label>
            <input name="anginpwd" type="password" style="background-color: #fff;"  class="login-input-pass" id="textfield4" value=""/>
            <input type="submit" name="button" id="button" value="注册" class="button" style="background-color: #0165ad;"/>
        </form>
    </div>
</div>
<?php echo '<script'; ?>
 src="<?php echo C('URL');?>
/public/home/js/jQuery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">

    document.getElementById('button').onclick = function(e){
        e.preventDefault();

        if( $('input[name=username]').val().trim() == '' ){
            alert('请输入账号');
            return false;
        }
        
        var reg = /^[A-Za-z0-9]+\@([A-Za-z]{2,8}\.){1,3}[A-Za-z]{2,8}$/;
        
        if( !reg.test( $('input[name=eamil]').val().trim() ) ){
            alert('邮箱不正确');
            return false;
        }

        if( $('input[name=pwd]').val().trim() == '' ){
            alert('请输入密码');
            return false;
        }
        if( $('input[name=pwd]').val().trim() != $('input[name=anginpwd]').val().trim() ){
            alert('请输入密码');
            return false;
        }
        $('#form1').submit();
    }
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
