<?php
/* Smarty version 3.1.29, created on 2018-02-03 21:20:17
  from "D:\Apache24\htdocs\binBlog\app\admin\view\CCate\exec.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a75b7119b7948_40403238',
  'file_dependency' => 
  array (
    'd8de2a024e90de491b8a8eeb5278f4bc761b6388' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\admin\\view\\CCate\\exec.html',
      1 => 1517664002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a75b7119b7948_40403238 ($_smarty_tpl) {
?>
<!-- id  | name | sex | age | learn  | salary | extramoney | nativeplace -->
<div class="h4">更新数据--<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</div>
<form action="<?php echo C('URL');?>
/index.php?p=admin&m=ccate&a=upd&&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="name" class="control-label col-xs-2">Name:</label>
        <div class="col-xs-6">
            <input id="name" type="text" name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" />
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary col-xs-offset-1" value="更新" />
    </div>
</form><?php }
}
