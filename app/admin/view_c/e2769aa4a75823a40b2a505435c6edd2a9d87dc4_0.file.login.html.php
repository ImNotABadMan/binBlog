<?php
/* Smarty version 3.1.29, created on 2018-02-06 10:40:23
  from "/var/www/html/binBlog/app/admin/view/Privilege/login.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a791597f2e775_71801951',
  'file_dependency' => 
  array (
    'e2769aa4a75823a40b2a505435c6edd2a9d87dc4' => 
    array (
      0 => '/var/www/html/binBlog/app/admin/view/Privilege/login.html',
      1 => 1512441437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Com/header1.html' => 1,
  ),
),false)) {
function content_5a791597f2e775_71801951 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/header1.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('flag'=>'login'), 0, false);
?>

<body>
    <div class="loginform" style="margin-top: 20px;">
    	<div class="title" style="background-color: #0165ad;"><span class="logo-text font18">美食后台管理系统</span></div>
        <div class="body" style="background-color: #fff; border:1px solid black;">
       	  <form id="form1" name="form1" method="post" action="<?php echo C('URL');?>
/index.php?p=admin&m=privilege&a=loginh">
          	<label class="log-lab">账号</label>
            <input name="acc" type="text" class="login-input-user" style="background-color: #fff;"  id="textfield" value=""/>
          	<label class="log-lab">密码</label>
            <input name="pwd" type="password" style="background-color: #fff;"  class="login-input-pass" id="textfield" value=""/>
      			<label class="log-lab">验证码</label>
      			<div class="padding-bottom5"><img src="<?php echo C('URL');?>
/index.php?p=admin&m=privilege&a=captcha" id="img" width="300" height="170"></div>
      			<input name="captcha" type="text" class="login-input-user" id="textfield" value=""/>
      			<label class="log-lab" style=""><input type="checkbox" style="" name="rm7" value="yes"> 7天内自动登录</label>
            <input type="submit" name="button" id="button" value="登录" class="button" style="background-color: #0165ad;"/>
       	  </form>

        </div>
    </div>
<?php echo '<script'; ?>
 type="text/javascript">
document.getElementById('img').onclick = function (){

  this.src = "<?php echo C('URL');?>
/index.php?p=admin&m=privilege&a=captcha&n="+Math.random();
};

<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
