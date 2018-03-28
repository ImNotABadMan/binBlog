<?php
/* Smarty version 3.1.29, created on 2018-02-03 21:16:55
  from "D:\Apache24\htdocs\binBlog\app\admin\view\Com\page.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a75b647adf759_10653105',
  'file_dependency' => 
  array (
    '0c576d018282633a81cb522e5b0f056abe93a185' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\admin\\view\\Com\\page.html',
      1 => 1512542452,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a75b647adf759_10653105 ($_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['is_page']->value) && $_smarty_tpl->tpl_vars['is_page']->value == "1") {
echo '<script'; ?>
>
    function isDel(id){
        if(confirm("是否删除？")){
            var page = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['page']->value)===null||$tmp==='' ? 1 : $tmp);?>
;
            //判断整一个页面是否是有条数据，一条数据包含一个class为del的a标签
            if(document.getElementsByClassName("del").length == 1){
                page -= 1;
            }
            location.href = "<?php echo C('URL');?>
/index.php?p=admin&m=<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
&a=del&page=" + page + "&id=" + id;
            return true;
        }else{
            return false;
        }
    }
    //bootstrap的关闭提示的js
    function close(){
        $(".alert").alert('close');
    }

    var pre = document.getElementById("pre");
    var next = document.getElementById("next");
    if(pre != null){
        pre.onclick = function(){
            var page = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['page']->value)===null||$tmp==='' ? 1 : $tmp);?>
;
            this.innerHTML = "";
            for(var i = 2; i < page - 2; i++){
                var a = document.createElement("a");
                a.className = "btn btn-primary btn-xs pageshow";
                a.innerHTML = i;
                a.href = "<?php echo C('URL');?>
?p=admin&m=<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
&a=showList&page=" + i;
                this.appendChild(a);
            }
            this.onclick = function(){};
        }
    }

    if(next != null){
        next.onclick = function(){
            var page = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['page']->value)===null||$tmp==='' ? 1 : $tmp);?>
;
            var pageCount = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageCount']->value)===null||$tmp==='' ? 1 : $tmp);?>
;
            this.innerHTML = "";
            for(var i = page + 3; i < pageCount; i++){
                var a = document.createElement("a");
                a.className = "btn btn-primary btn-xs pageshow";
                a.innerHTML = i;
                a.href = "<?php echo C('URL');?>
?p=admin&m=<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
&a=showList&page=" + i;
                this.appendChild(a);
            }
            this.onclick = function(){};
        }
    }
<?php echo '</script'; ?>
>
<?php }
}
}
