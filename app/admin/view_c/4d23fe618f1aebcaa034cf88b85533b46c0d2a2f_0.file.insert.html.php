<?php
/* Smarty version 3.1.29, created on 2018-02-03 21:17:44
  from "D:\Apache24\htdocs\binBlog\app\admin\view\Cate\insert.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a75b678446483_15640012',
  'file_dependency' => 
  array (
    '4d23fe618f1aebcaa034cf88b85533b46c0d2a2f' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\admin\\view\\Cate\\insert.html',
      1 => 1516620081,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a75b678446483_15640012 ($_smarty_tpl) {
?>
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">添加分类</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">新增</h4>
      </div>
      <div class="modal-body">
        <!-- id  | name | sex | age | learn  | salary | extramoney | nativeplace -->
        <form action="<?php echo C('URL');?>
/index.php?p=admin&m=cate&a=add" method="post" class="form-horizontal" name="insert">
            <div class="form-group">
                <label for="name" class="control-label col-xs-2">Name:</label>
                <div class="col-xs-6">
                    <input id="name" type="text" name="name" class="form-control" value="" />
                </div>
            </div>
            <div class="form-group">
                <label for="parent_id" class="control-label col-xs-2">Sex:</label>
                <div class="col-xs-6">
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="0">无</option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['tree']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_node_0_saved_item = isset($_smarty_tpl->tpl_vars['node']) ? $_smarty_tpl->tpl_vars['node'] : false;
$_smarty_tpl->tpl_vars['node'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['node']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->_loop = true;
$__foreach_node_0_saved_local_item = $_smarty_tpl->tpl_vars['node'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['node']->value['parent_id'] == 0) {?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['node']->value['id'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['node']->value['name'];?>

                        </option>
                        <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['node'] = $__foreach_node_0_saved_local_item;
}
if ($__foreach_node_0_saved_item) {
$_smarty_tpl->tpl_vars['node'] = $__foreach_node_0_saved_item;
}
?>
                    </select>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button id="btn" type="button" class="btn btn-primary">新增</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php echo '<script'; ?>
>
     var btn = document.getElementById("btn");
     btn.onclick = function(){
        document.forms.insert.submit();
     }
<?php echo '</script'; ?>
>
<?php }
}
