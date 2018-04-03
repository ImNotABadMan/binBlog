<?php
/* Smarty version 3.1.29, created on 2018-04-02 17:31:02
  from "D:\Apache24\htdocs\binBlog\app\home\view\Com\header.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5ac1f85690b4c9_70114915',
  'file_dependency' => 
  array (
    '9ef883f35072725697cade9805ea0334864e4851' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\home\\view\\Com\\header.html',
      1 => 1522661420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac1f85690b4c9_70114915 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>Bin客美食</title>
    <link rel="stylesheet" href="<?php echo C('URL');?>
/public/home/css/basic.css">
    <link rel="stylesheet" href="<?php echo C('URL');?>
/public/home/css/style2.css">
    <link rel="stylesheet" href="<?php echo C('URL');?>
/public/home/css/pro_city.css" />
    <link rel="stylesheet" href="<?php echo C('URL');?>
/public/home/css/blog.css">
    <!-- 主页样式 -->
    <?php if (!empty($_smarty_tpl->tpl_vars['flag']->value) && $_smarty_tpl->tpl_vars['flag']->value == 1) {?>
    <link rel="stylesheet" href="<?php echo C('URL');?>
/public/home/css/style.css">
    <?php }?>
</head>
<body>
<header>
    <div class="tel">
        <div class="container" style="position: relative;">
            <div class="logo">
                <img src="<?php echo C('URL');?>
/public/home/images/logo1.png">
            </div>
            <p>
                <ul class='login'>
                    <?php if (!session('user')) {?>
                    <li class='login'><a href="<?php echo C('URL');?>
/index.php?p=home&m=public&a=register">注册</a></li>
                    <li class='login'><a href="<?php echo C('URL');?>
/index.php?p=home&m=public&a=login">登录</a></li>
                    <?php } else { ?>
                    <li class='login'><a href="<?php echo C('URL');?>
/index.php?p=home&m=public&a=logout">退出</a></li>
                    <li class='login'><a href="<?php echo U('User/index');?>
"><?php echo $_SESSION['user']['nickname'];?>
</a></li>
                    <?php }?>
                </ul>
                <ul class='city'>
                    <?php if (isset($_smarty_tpl->tpl_vars['city']->value)) {?>
                        <?php echo $_smarty_tpl->tpl_vars['city']->value['name'];?>

                    <?php } else { ?>
                        <?php echo (($tmp = @$_COOKIE['city'])===null||$tmp==='' ? '' : $tmp);?>

                    <?php }?>
                </ul>
                <ul class='province'>
                    <?php if (isset($_smarty_tpl->tpl_vars['province']->value)) {?>
                        <?php echo $_smarty_tpl->tpl_vars['province']->value['name'];?>

                    <?php } else { ?>
                        <?php echo (($tmp = @$_COOKIE['province'])===null||$tmp==='' ? '' : $tmp);?>

                    <?php }?>
                </ul>
            </p>
            <div class="clearfix"></div>
        </div>
        <div class='province-box'></div><div class='city-box'></div>
    </div>
    <nav class="nav">
        <div class="container">
            <div class="link">
                <ul>
                    <li><a href="<?php echo C('URL');?>
/index.php?p=home&m=index&a=showList">主页</a></li>
                    <!--<li><a href="###">技术服务</a></li>-->
                    <?php
$_from = $_smarty_tpl->tpl_vars['navs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_nav_0_saved_item = isset($_smarty_tpl->tpl_vars['nav']) ? $_smarty_tpl->tpl_vars['nav'] : false;
$__foreach_nav_0_saved_key = isset($_smarty_tpl->tpl_vars['index']) ? $_smarty_tpl->tpl_vars['index'] : false;
$_smarty_tpl->tpl_vars['nav'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['index'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['nav']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['nav']->value) {
$_smarty_tpl->tpl_vars['nav']->_loop = true;
$__foreach_nav_0_saved_local_item = $_smarty_tpl->tpl_vars['nav'];
?>
                    <li><a href="<?php echo C('URL');?>
/index.php?p=home&m=blog&a=showBlog&index=<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
&category=<?php echo $_smarty_tpl->tpl_vars['nav']->value['name'];?>
&ccid=<?php echo $_smarty_tpl->tpl_vars['nav']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['nav']->value['name'];?>
</a></li>
                    <?php
$_smarty_tpl->tpl_vars['nav'] = $__foreach_nav_0_saved_local_item;
}
if ($__foreach_nav_0_saved_item) {
$_smarty_tpl->tpl_vars['nav'] = $__foreach_nav_0_saved_item;
}
if ($__foreach_nav_0_saved_key) {
$_smarty_tpl->tpl_vars['index'] = $__foreach_nav_0_saved_key;
}
?>
                </ul>
            </div>
        </div>
    </nav>
    <?php echo '<script'; ?>
>
        var index = <?php echo (($tmp = @$_GET['index'])===null||$tmp==='' ? 0 : $tmp);?>
;
        document.querySelectorAll(".link ul li")[index].className = "nav active";
    <?php echo '</script'; ?>
>
    <div class="clearfix"></div>
   <!--  <div class="red" >
        <div class="button">
        </div>
        <div class="sub">
        </div> -->
        <!--<div class="clearfix"></div>-->
    <!-- </div> -->

</header>
<?php }
}
