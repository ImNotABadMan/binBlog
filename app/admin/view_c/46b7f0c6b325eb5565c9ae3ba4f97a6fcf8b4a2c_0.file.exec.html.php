<?php
/* Smarty version 3.1.29, created on 2018-04-02 16:05:05
  from "D:\Apache24\htdocs\binBlog\app\admin\view\User\exec.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5ac1e431071302_64162051',
  'file_dependency' => 
  array (
    '46b7f0c6b325eb5565c9ae3ba4f97a6fcf8b4a2c' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\admin\\view\\User\\exec.html',
      1 => 1512387294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac1e431071302_64162051 ($_smarty_tpl) {
?>
<!-- id  | name | sex | age | learn  | salary | extramoney | nativeplace -->
<div class="h4">更新数据--<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</div>
<form action="<?php echo C('URL');?>
/index.php?p=admin&m=user&a=upd&&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="nickname" class="control-label col-xs-2">Nickname:</label>
            <div class="col-xs-6">
                <input id="nickname" type="text" name="nickname" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['nickname'];?>
" />
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="control-label col-xs-2">Email:</label>
            <div class="col-xs-6">
                <input id="email" type="text" name="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" />
            </div>
        </div>
        <div class="form-group">
            <label for="is_admin" class="control-label col-xs-2">Is_admin:</label>
            <div class="col-xs-6">
                <select id="is_admin" type="text" name="is_admin" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" >
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_admin'] == 1) {?> selected <?php }?>>Yes</option>
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_admin'] == 0) {?> selected <?php }?>>No</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="pwd" class="control-label col-xs-2">Password:</label>
            <div class="col-xs-6">
                <input id="pwd" type="password" name="pwd" class="form-control" value="" />
            </div>
        </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary col-xs-offset-1" value="更新" />
    </div>
</form><?php }
}
