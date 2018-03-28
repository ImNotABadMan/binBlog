<?php
/* Smarty version 3.1.29, created on 2018-02-04 09:17:31
  from "D:\Apache24\htdocs\binBlog\app\admin\view\About\insert.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a765f2b8b5157_42342397',
  'file_dependency' => 
  array (
    '707cc5f0cef4e1446b98859ec66f5e95e32bef8f' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\admin\\view\\About\\insert.html',
      1 => 1512285470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a765f2b8b5157_42342397 ($_smarty_tpl) {
?>
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">新增信息</button>
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
/index.php?p=admin&m=about&a=add&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" method="post" class="form-horizontal" name="insert">
            <div class="form-group">
                <label for="title" class="control-label col-xs-2">标题:</label>
                <div class="col-xs-6">
                    <input id="title" type="text" name="title" class="form-control" value="" />
                </div>
            </div>
            <div class="form-group">
                <label for="intro" class="control-label col-xs-2">简介:</label>
                <div class="col-xs-6">
                    <input id="intro" type="text" name="intro" class="form-control" value="" />
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="control-label col-xs-2">内容:</label>
                <div class="col-xs-6">
                    <textarea name="content" class="form-control" rows=10 cols=20></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="design_cont" class="control-label col-xs-2">设计内容:</label>
                <div class="col-xs-6">
                    <!-- <input id="design_cont" type="text" name="design_cont" class="form-control" value="" /> -->
					<textarea id="design_cont" name="design_cont" class="form-control" value=""></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="our_ability" class="control-label col-xs-2">我们能力:</label>
                <div class="col-xs-6">
                    <input id="our_ability" type="text" name="our_ability" class="form-control" value="" />
                </div>
            </div>
            <!-- <div class="form-group">
                <input type="submit" class="btn btn-primary" value="<?php echo $_smarty_tpl->tpl_vars['subVal']->value;?>
" />
            </div> -->
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
