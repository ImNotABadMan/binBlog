<?php
/* Smarty version 3.1.29, created on 2018-05-12 16:52:53
  from "D:\Apache24\htdocs\binBlog\app\admin\view\Comment\list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5af6ab65accc03_58999599',
  'file_dependency' => 
  array (
    '85cd0338d9ad76013999cad1fd7d0702ba8f8a8b' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\admin\\view\\Comment\\list.html',
      1 => 1526115172,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Com/header.html' => 1,
    'file:Com/fixedbar.html' => 1,
    'file:Com/page.html' => 2,
  ),
),false)) {
function content_5af6ab65accc03_58999599 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('is_page'=>"1",'module'=>"分类"), 0, false);
?>

    <body>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/fixedbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <div class="container" style="margin-bottom: 50px;">
            <div class="h5">
                <!-- <a href="http://www.smarty.com/stuMajor/tree.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&flag=1">添加学生</a> -->
            </div>
            <table class="table table-hover table-striped">
                <tr>
                    <td>序号</td>
                    <!-- PHP column -->
                    <td>ID</td>
                    <td>评论内容</td>
                    <td>评论文章</td>
                    <td>用户</td>
                    <td>父评论</td>
                    <td>评论时间</td>
                    <td>操作</td>
                </tr>
                <!-- tree row -->
                <?php
$_from = $_smarty_tpl->tpl_vars['tree']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_f_row_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_row']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_row'] : false;
$__foreach_f_row_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$__foreach_f_row_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_f_row'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_f_row']->value['iteration']++;
$__foreach_f_row_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
                    <tr>
                        <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_row']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_row']->value['iteration'] : null);?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_title'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['u_nickname'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['p_id'];?>
</td>
                        <td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['row']->value['post_date']);?>
</td>
                        <td><a class="release" style="cursor: pointer;" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
                            <?php if ($_smarty_tpl->tpl_vars['row']->value['is_release'] == 1) {?>
                                不发布
                            <?php } else { ?>
                                发布
                            <?php }?>
                        </a>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_f_row_0_saved_local_item;
}
if ($__foreach_f_row_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_f_row'] = $__foreach_f_row_0_saved;
}
if ($__foreach_f_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_f_row_0_saved_item;
}
if ($__foreach_f_row_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_f_row_0_saved_key;
}
?>
            </table>
            <div style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['pageHtml']->value;?>
</div>
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('is_page'=>"1",'m'=>"comment"), 0, false);
?>

        </div>
    </body>
<?php echo '<script'; ?>
 src="<?php echo C('URL');?>
/public/home/js/jQuery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$('.release').click(function (e) {
   e.preventDefault();
   var _this = $(this);
   $.ajax({
       url: "<?php echo C('URL');?>
/index.php?p=admin&m=comment&a=release",
       data: {
           id: _this.data('id')
       },
       type: 'POST',
       dataType: 'json',
       success: function (res) {
           if(res.code == 0){
               window.location.reload();
           }else{
               alert(res.msg);
           }
       }
   });
});
<?php echo '</script'; ?>
>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('is_page'=>"1",'m'=>"cate"), 0, true);
?>

</html><?php }
}
