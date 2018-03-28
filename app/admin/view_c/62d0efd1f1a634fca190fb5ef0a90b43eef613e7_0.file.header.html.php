<?php
/* Smarty version 3.1.29, created on 2018-02-06 10:42:32
  from "/var/www/html/binBlog/app/admin/view/Com/header.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a79161846aff5_24193750',
  'file_dependency' => 
  array (
    '62d0efd1f1a634fca190fb5ef0a90b43eef613e7' => 
    array (
      0 => '/var/www/html/binBlog/app/admin/view/Com/header.html',
      1 => 1512259409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a79161846aff5_24193750 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>美食管理系统——<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
管理</title>
    <link rel="stylesheet" type="text/css" href="<?php echo C('URL');?>
/public/plugins/bootstrap/css/bootstrap.css">
    <?php if (!empty($_smarty_tpl->tpl_vars['is_page']->value) && $_smarty_tpl->tpl_vars['is_page']->value == "1") {?>
        <link rel="stylesheet" type="text/css" href="<?php echo C('URL');?>
/public/admin/css/page.css">
    <?php }?>
    <?php echo '<script'; ?>
 src="<?php echo C('URL');?>
/public/plugins/bootstrap/jQuery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo C('URL');?>
/public/plugins/bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
</head><?php }
}
