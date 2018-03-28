<?php
/* Smarty version 3.1.29, created on 2018-02-04 09:17:31
  from "D:\Apache24\htdocs\binBlog\app\admin\view\About\list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a765f2b8742a9_59242650',
  'file_dependency' => 
  array (
    '745c47094c986706c8e1497479bc1bf1cfa92c4f' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\admin\\view\\About\\list.html',
      1 => 1516348719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Com/header.html' => 1,
    'file:Com/fixedbar.html' => 1,
    'file:About/insert.html' => 1,
    'file:About/exec.html' => 1,
    'file:Com/page.html' => 1,
  ),
),false)) {
function content_5a765f2b8742a9_59242650 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('is_page'=>"1"), 0, false);
?>

    <body>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/fixedbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <div class="container">
            <div class="h5">
                <!-- <a href="http://www.smarty.com/stuMajor/list.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&flag=1">添加学生</a> -->
                <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:About/insert.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            </div>
            <table class="table table-hover table-striped">
                <tr>
                    <td>序号</td>
                    <!-- PHP column -->
                    <?php
$_from = $_smarty_tpl->tpl_vars['cols']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_0_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_0_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['key']->value != 3 && $_smarty_tpl->tpl_vars['key']->value != 5) {?><td> <?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
 </td><?php }?>
                        <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_local_item;
}
if (!$_smarty_tpl->tpl_vars['value']->_loop) {
?>
                        <td>没有内容</td>
                    <?php
}
if ($__foreach_value_0_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_item;
}
if ($__foreach_value_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_0_saved_key;
}
?>
                    <td>操作</td>
                </tr>
                <!-- list row -->
                <?php
$_from = $_smarty_tpl->tpl_vars['list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_f_row_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_row']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_row'] : false;
$__foreach_f_row_1_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$__foreach_f_row_1_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_f_row'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_f_row']->value['iteration']++;
$__foreach_f_row_1_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
                    <tr>
                        <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_row']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_row']->value['iteration'] : null);?>
</td>
                    <?php
$_from = $_smarty_tpl->tpl_vars['row']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_2_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_2_saved_key = isset($_smarty_tpl->tpl_vars['row_key']) ? $_smarty_tpl->tpl_vars['row_key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row_key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row_key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_2_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
                        <?php if (is_int($_smarty_tpl->tpl_vars['row_key']->value)) {?>
                        <td <?php if ($_smarty_tpl->tpl_vars['row_key']->value == 3 || $_smarty_tpl->tpl_vars['row_key']->value == 2) {?>style="max-width:300px;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</td>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_2_saved_local_item;
}
if ($__foreach_value_2_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_2_saved_item;
}
if ($__foreach_value_2_saved_key) {
$_smarty_tpl->tpl_vars['row_key'] = $__foreach_value_2_saved_key;
}
?>
                        <td><a href="<?php echo C('URL');?>
/index.php?p=admin&m=about&a=showUpd&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">编辑</a>&nbsp;&nbsp;<a id="del" href="javascript:isDel(<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
)">删除</a></td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_f_row_1_saved_local_item;
}
if ($__foreach_f_row_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_f_row'] = $__foreach_f_row_1_saved;
}
if ($__foreach_f_row_1_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_f_row_1_saved_item;
}
if ($__foreach_f_row_1_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_f_row_1_saved_key;
}
?>
            </table>

            <div style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['pageHtml']->value;?>
</div>
            <?php if (!empty($_smarty_tpl->tpl_vars['flag']->value) && $_smarty_tpl->tpl_vars['flag']->value == 2) {?>
                <hr />
                <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:About/exec.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php }?>
        </div>
    </body>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('is_page'=>"1"), 0, false);
?>

</html><?php }
}
