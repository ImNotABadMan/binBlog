<?php
/* Smarty version 3.1.29, created on 2018-02-06 10:42:32
  from "/var/www/html/binBlog/app/admin/view/User/list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a79161844f324_48731062',
  'file_dependency' => 
  array (
    'e1745f549c9dde6e9f114fff1f30915b99802af6' => 
    array (
      0 => '/var/www/html/binBlog/app/admin/view/User/list.html',
      1 => 1512387176,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Com/header.html' => 1,
    'file:Com/fixedbar.html' => 1,
    'file:User/insert.html' => 1,
    'file:User/exec.html' => 1,
    'file:Com/page.html' => 1,
  ),
),false)) {
function content_5a79161844f324_48731062 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/binBlog/plugins/smarty/plugins/modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('is_page'=>"1",'module'=>"用户"), 0, false);
?>

    <body>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/fixedbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <div class="container" style="margin-bottom: 50px;">
            <div class="h5">
                <!-- <a href="http://www.smarty.com/stuMajor/tree.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&flag=1">添加学生</a> -->
                <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:User/insert.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            </div>
            <table class="table table-hover table-striped">
                <tr>
                    <td>序号</td>
                    <!-- PHP column -->
                        <td><?php echo $_smarty_tpl->tpl_vars['cols']->value[0]['name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['cols']->value[1]['name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['cols']->value[2]['name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['cols']->value[3]['name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['cols']->value[4]['name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['cols']->value[5]['name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['cols']->value[6]['name'];?>
</td>
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
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['acc'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['pwd'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['nickname'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['register_date'],"%Y-%m-%d %H:%M");?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['row']->value['is_admin']) {?> <font color="red">Yes</font><?php } else { ?> No <?php }?></td>
                        <td><a href="<?php echo C('URL');?>
/index.php?p=admin&m=user&a=showUpd&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">编辑</a>&nbsp;&nbsp;<a id="del" href="javascript:isDel(<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
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
            <div style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['pageHtml']->value;?>
</div>

            <?php if (!empty($_smarty_tpl->tpl_vars['flag']->value) && $_smarty_tpl->tpl_vars['flag']->value == 2) {?>
                <hr />
                <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:User/exec.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php }?>
        </div>
    </body>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('is_page'=>"1",'m'=>"user"), 0, false);
?>

</html><?php }
}
