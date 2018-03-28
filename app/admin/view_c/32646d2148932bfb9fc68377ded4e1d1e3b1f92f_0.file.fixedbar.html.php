<?php
/* Smarty version 3.1.29, created on 2018-02-03 21:16:55
  from "D:\Apache24\htdocs\binBlog\app\admin\view\Com\fixedbar.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a75b647a16ef5_31456109',
  'file_dependency' => 
  array (
    '32646d2148932bfb9fc68377ded4e1d1e3b1f92f' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\admin\\view\\Com\\fixedbar.html',
      1 => 1517410547,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a75b647a16ef5_31456109 ($_smarty_tpl) {
?>
<div class="alert alert-success fade in" style="text-align: center;<?php ob_start();
echo (($tmp = @$_GET['re'])===null||$tmp==='' ? 0 : $tmp);
$_tmp1=ob_get_clean();
if ($_tmp1 == '0') {?> display: none; <?php }?>">
    <?php if (!empty($_GET['re']) && $_GET['re'] == 11) {?>
        新增成功
    <?php } elseif (!empty($_GET['re']) && $_GET['re'] == 10) {?>
        新增失败
    <?php } elseif (!empty($_GET['re']) && $_GET['re'] == 22) {?>
        更新成功
    <?php } elseif (!empty($_GET['re']) && $_GET['re'] == 20) {?>
        更新失败
    <?php } elseif (!empty($_GET['re']) && $_GET['re'] == 33) {?>
        删除成功
    <?php } elseif (!empty($_GET['re']) && $_GET['re'] == 30) {?>
        删除失败
    <?php } else { ?>
        <?php echo $_GET['re'];?>

    <?php }?>
    <a data-dismiss="alert" class="close" href="javascript:close();" aria-hidden="true">&times;</a>
</div>
<div class="col-xs-offset-10 h5">
    <!-- <span class="btn btn-default"><?php echo $_SESSION['user']['nickname'];?>
</span> -->
    <a class="btn btn-default" href="<?php echo C('URL');?>
/index.php?p=admin&m=privilege&a=logout">用户：<?php echo $_SESSION['admin']['nickname'];?>
--退出登录</a>
</div>
<div class="left list-group">
    <div id="sidebar" style="margin-top: 55px;">
        <a href="<?php echo C('URL');?>
/index.php?p=admin&m=blog&a=showList" class="list-group-item side">博客管理</a>
        <a href="<?php echo C('URL');?>
/index.php?p=admin&m=cate&a=showList" class="list-group-item side">城市管理</a>
        <a href="<?php echo C('URL');?>
/index.php?p=admin&m=ccate&a=showList" class="list-group-item side">分类管理</a>
        <a href="<?php echo C('URL');?>
/index.php?p=admin&m=about&a=showAbout" class="list-group-item side">关于管理</a>
        <a href="<?php echo C('URL');?>
/index.php?p=admin&m=user&a=showList" class="list-group-item side">用户管理</a>
        <a href="<?php echo C('URL');?>
/index.php?p=admin&m=userFollow&a=showList" class="list-group-item side">关注管理</a>
        <a href="<?php echo C('URL');?>
/index.php?p=admin&m=collectArticle&a=showList" class="list-group-item side">收藏管理</a>
        <a href="<?php echo C('URL');?>
/index.php?p=admin&m=userFollowCate&a=showList" class="list-group-item side">收藏分类管理</a>
    </div>

</div><?php }
}
