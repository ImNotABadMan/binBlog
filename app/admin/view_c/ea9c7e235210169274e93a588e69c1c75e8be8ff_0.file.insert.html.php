<?php
/* Smarty version 3.1.29, created on 2018-02-03 21:16:55
  from "D:\Apache24\htdocs\binBlog\app\admin\view\User\insert.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a75b647a5ea72_39681107',
  'file_dependency' => 
  array (
    'ea9c7e235210169274e93a588e69c1c75e8be8ff' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\admin\\view\\User\\insert.html',
      1 => 1512443236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a75b647a5ea72_39681107 ($_smarty_tpl) {
?>
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">添加用户</button>
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
/index.php?p=admin&m=user&a=add&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" method="post" class="form-horizontal" name="insert">
            <div class="form-group">
                <label for="acc" class="control-label col-xs-2">Account:</label>
                <div class="col-xs-6">
                    <input id="acc" type="text" name="acc" class="form-control" value="" />
                </div>
            </div>
            <div class="form-group">
                <label for="nickname" class="control-label col-xs-2">Nickname:</label>
                <div class="col-xs-6">
                    <input id="nickname" type="text" name="nickname" class="form-control" value="" />
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="control-label col-xs-2">Email:</label>
                <div class="col-xs-6">
                    <input id="email" type="text" name="email" class="form-control" value="" />
                </div>
            </div>
            <div class="form-group">
            <label for="is_admin" class="control-label col-xs-2">Is_admin:</label>
            <div class="col-xs-6">
                <select id="is_admin" type="text" name="is_admin" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" >
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
        </div>
            <div class="form-group">
                <label for="pwd" class="control-label col-xs-2">Password:</label>
                <div class="col-xs-6">
                    <input id="pwd" type="password" name="pwd" class="form-control" value="" />
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
