<?php
/* Smarty version 3.1.29, created on 2018-02-04 09:17:34
  from "D:\Apache24\htdocs\binBlog\app\admin\view\CollectArticle\list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a765f2ec48342_04170954',
  'file_dependency' => 
  array (
    '41d5fdd01c908651cbcf9c97987ac285de0c3207' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\admin\\view\\CollectArticle\\list.html',
      1 => 1516445511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Com/header.html' => 1,
    'file:Com/fixedbar.html' => 1,
    'file:Cate/exec.html' => 1,
    'file:Com/page.html' => 1,
  ),
),false)) {
function content_5a765f2ec48342_04170954 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('is_page'=>"1",'module'=>"关注"), 0, false);
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
                        <td>用户</td>
                        <td>文章</td>
                        <td>文章所属用户</td>
                        <td>文章所属分类</td>
                    <td>操作</td>
                </tr>
                <!-- tree row -->
                <?php
$_from = $_smarty_tpl->tpl_vars['rows']->value;
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
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['u_nickname'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['b_name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['c_name'];?>
</td>
                        <td><a id="del" href="javascript:isDel(<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
)">删除</a></td>
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

            <?php if (!empty($_smarty_tpl->tpl_vars['flag']->value) && $_smarty_tpl->tpl_vars['flag']->value == 2) {?>
                <hr />
                <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Cate/exec.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php }?>
        </div>
    </body>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('is_page'=>"1",'m'=>"collectArticle"), 0, false);
?>

</html><?php }
}
