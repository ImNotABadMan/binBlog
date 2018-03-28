<?php
/* Smarty version 3.1.29, created on 2018-02-04 09:17:28
  from "D:\Apache24\htdocs\binBlog\app\admin\view\Blog\insert.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a765f2806d683_10384528',
  'file_dependency' => 
  array (
    '952361213cbc9dca7deb3d9e42b4cbaad16c8ee5' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\admin\\view\\Blog\\insert.html',
      1 => 1516447449,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a765f2806d683_10384528 ($_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="<?php echo C('URL');?>
/public/plugins/ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="<?php echo C('URL');?>
/public/plugins/ueditor/ueditor.all.min.js"><?php echo '</script'; ?>
>

<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">添加博客</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">新增</h4>
      </div>
      <div class="modal-body">
        <!-- id  | name | sex | age | learn  | salary | extramoney | nativeplace -->
        <form action="<?php echo C('URL');?>
/index.php?p=admin&m=blog&stitle=<?php echo $_smarty_tpl->tpl_vars['stitle']->value;?>
&sc_id=<?php echo $_smarty_tpl->tpl_vars['sc_id']->value;?>
&su_nickname=<?php echo $_smarty_tpl->tpl_vars['su_nickname']->value;?>
&a=add&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" method="post" class="form-horizontal" name="insert" enctype="multipart/form-data">
            <div class="form-group">
                <label for="cover_img" class="control-label col-xs-2">cover_img:</label>
                <div class="col-xs-6">
                    <input id="cover_img" type="file" name="cover_img" accept="image/jpeg, image/png,image/gif,image/jpg" class="form-inline" />
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="control-label col-xs-2">title:</label>
                <div class="col-xs-6">
                    <input id="title" type="text" name="title" class="form-control" value="" />
                </div>
            </div>
            <div class="form-group">
                <label for="intro" class="control-label col-xs-2">intro:</label>
                <div class="col-xs-6">
                    <textarea id="intro" name="intro" class="form-control" value="" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="u_id_and_name" class="control-label col-xs-2">u_nickname:</label>
                <div class="col-xs-6">
                    <select name="u_id_and_name" id="u_id_and_name" class="form-control"class="form-control">
                        <?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_user_0_saved_item = isset($_smarty_tpl->tpl_vars['user']) ? $_smarty_tpl->tpl_vars['user'] : false;
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$__foreach_user_0_saved_local_item = $_smarty_tpl->tpl_vars['user'];
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_local_item;
}
if ($__foreach_user_0_saved_item) {
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_item;
}
?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="c_id_and_name" class="control-label col-xs-2">c_name:</label>
                <div class="col-xs-6">
                    <select name="c_id_and_name" id="c_id_and_name" class="form-control"class="form-control">
                        <?php
$_from = $_smarty_tpl->tpl_vars['tree']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_node_1_saved_item = isset($_smarty_tpl->tpl_vars['node']) ? $_smarty_tpl->tpl_vars['node'] : false;
$_smarty_tpl->tpl_vars['node'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['node']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->_loop = true;
$__foreach_node_1_saved_local_item = $_smarty_tpl->tpl_vars['node'];
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['node']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['node']->value['name'];?>
"><?php echo str_repeat("--",$_smarty_tpl->tpl_vars['node']->value['level']);
echo $_smarty_tpl->tpl_vars['node']->value['name'];?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['node'] = $__foreach_node_1_saved_local_item;
}
if ($__foreach_node_1_saved_item) {
$_smarty_tpl->tpl_vars['node'] = $__foreach_node_1_saved_item;
}
?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="control-label col-xs-2">content:</label>
                <div class="col-xs-10">
                    <textarea id="content" type="text" name="content"></textarea>
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
        <button id="btn" type="submit" class="btn btn-primary">新增</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="<?php echo C('URL');?>
/public/plugins/ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="<?php echo C('URL');?>
/public/plugins/ueditor/ueditor.all.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var ue = UE.getEditor('content',{
        initialFrameWidth: 750, //初始化编辑器宽度,默认1000
        initialFrameHeight: 320,  //初始化编辑器高度,默认320
        toolbars: [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
            'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
            'print', 'preview', 'searchreplace', 'help', 'drafts'
        ]]
    });

     var btn = document.getElementById("btn");
     btn.onclick = function(){
        document.forms.insert.submit();
     }
<?php echo '</script'; ?>
>
<?php }
}
