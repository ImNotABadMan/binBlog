<?php
/* Smarty version 3.1.29, created on 2018-02-08 20:09:34
  from "/var/www/html/binBlog/app/admin/view/Blog/exec.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a7c3dfe2a2a08_68253776',
  'file_dependency' => 
  array (
    '822517be0ea8881669055595172232db90ed2bf9' => 
    array (
      0 => '/var/www/html/binBlog/app/admin/view/Blog/exec.html',
      1 => 1516350475,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7c3dfe2a2a08_68253776 ($_smarty_tpl) {
?>
<!-- id  | name | sex | age | learn  | salary | extramoney | nativeplace -->
<div class="h4 col-xs-offset-1">更新数据--<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</div>
<form action="<?php echo C('URL');?>
/index.php?p=admin&m=blog&a=upd&stitle=<?php echo $_smarty_tpl->tpl_vars['stitle']->value;?>
&sc_id=<?php echo $_smarty_tpl->tpl_vars['sc_id']->value;?>
&su_nickname=<?php echo $_smarty_tpl->tpl_vars['su_nickname']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
        <label for="cover_img_up" class="control-label col-xs-2">cover_img:</label>
        <div class="col-xs-6">
            <input id="cover_img_up" type="file" name="cover_img"  class="form-inline"/>
            <div class="col-xs-12">
                <span>原图：</span><img src='<?php echo C('URL');?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['cover_img'];?>
' style="width: 300px;" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="title_up" class="control-label col-xs-2">title:</label>
        <div class="col-xs-6">
            <input id="title_up" type="text" name="title" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" />
        </div>
    </div>
    <div class="form-group">
        <label for="intro_up" class="control-label col-xs-2">intro:</label>
        <div class="col-xs-6">
            <textarea id="intro_up" name="intro" class="form-control"><?php echo $_smarty_tpl->tpl_vars['row']->value['intro'];?>
</textarea>
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
        <label for="c_id_and_name_up" class="control-label col-xs-2">c_name:</label>
        <div class="col-xs-6">
            <select name="c_id_and_name" id="c_id_and_name_up" class="form-control"class="form-control">
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
" <?php if ($_smarty_tpl->tpl_vars['node']->value['id'] == $_smarty_tpl->tpl_vars['row']->value['c_id']) {?> selected <?php }?>><?php echo str_repeat("--",$_smarty_tpl->tpl_vars['node']->value['level']);
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
        <label for="content_up" class="control-label col-xs-2">content:</label>
        <div class="col-xs-10">
            <textarea id="content_up" type="text" name="content"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</textarea>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary col-xs-offset-1" value="更新" />
    </div>
</form>

<?php echo '<script'; ?>
>

// var a = document.getElementById("cover_img");
// a.onchange = function(){
//     alert(a.files);
// }
    // document.getElementById("cover_img").onchange = function(){
    //     document.getElementById("imgUp").src = document.getElementById("cover_img").value;
    // }
 var ue = UE.getEditor('content_up',{
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
<?php echo '</script'; ?>
><?php }
}
