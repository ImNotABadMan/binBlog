<?php
/* Smarty version 3.1.29, created on 2018-03-28 10:45:16
  from "/var/www/html/binBlog/app/home/view/blog/blog.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5abb01bc6427f3_69160230',
  'file_dependency' => 
  array (
    'c5c31c2f28bc0caba8f23ccee69848f599f7b0e7' => 
    array (
      0 => '/var/www/html/binBlog/app/home/view/blog/blog.html',
      1 => 1519178066,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Com/header.html' => 1,
    'file:Com/footer.html' => 1,
  ),
),false)) {
function content_5abb01bc6427f3_69160230 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/binBlog/plugins/smarty/plugins/modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"--博客"), 0, false);
?>

<section class="bl_section">
    <!-- <div class="container">
        <h2>博客</h2>
    </div> -->
    <div class="blog_section blog-container">
        <aside class="list_left">
            <?php
$_from = $_smarty_tpl->tpl_vars['rows']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
            <div class="blog_text">
                <h3><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</h3>
                <div>
                    <div class="blog_img" style="display: inline-block;">
                        <img src="<?php echo C('URL');?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['cover_img'];?>
" style="width: 300px;" style="display: inline-block;">
                    </div>
                    <div class="blog_read" style="display: inline-block;">
                        <p><?php echo $_smarty_tpl->tpl_vars['row']->value['intro'];?>
</p>
                        <button class="more"><a href="<?php echo C('URL');?>
/index.php?p=home&m=blog&a=showDetails&category=<?php echo $_GET['category'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" target="_blank">阅读更多</a></button>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="blog_admin">
                    <ul>
                        <li><a href="###"><img src="<?php echo C('URL');?>
/public/home/images/h1.png"><?php echo $_smarty_tpl->tpl_vars['row']->value['c_name'];?>
</a></li>
                        <li><img src="<?php echo C('URL');?>
/public/home/images/h2.png"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['post_date'],"%Y-%m-%d %H:%M");?>
</li>
                        <li><a href="###"><img src="<?php echo C('URL');?>
/public/home/images/h3.png"><?php echo $_smarty_tpl->tpl_vars['row']->value['u_nickname'];?>
</a></li>
                    </ul>
                </div>
            </div>
            <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
            <h3>没有内容</h3>
            <?php
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
        </aside>

        <div class="list_right">
            <div>
                <h3>类别</h3>
                <ul>
                    <?php
$_from = $_smarty_tpl->tpl_vars['cate']->value;
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
                    <li><a href="<?php echo C('URL');?>
/index.php?p=home&m=blog&a=showBlog&category=<?php echo $_GET['category'];?>
&c_id=<?php echo $_smarty_tpl->tpl_vars['node']->value['id'];?>
"><?php echo str_repeat("--",$_smarty_tpl->tpl_vars['node']->value['level']);
echo $_smarty_tpl->tpl_vars['node']->value['name'];?>
</a></li>
                    <?php
$_smarty_tpl->tpl_vars['node'] = $__foreach_node_1_saved_local_item;
}
if ($__foreach_node_1_saved_item) {
$_smarty_tpl->tpl_vars['node'] = $__foreach_node_1_saved_item;
}
?>
                </ul>
            </div>
            <!-- <div>
                <h3>最新的案例</h3>
                <ul>
                    <li><a href="###">休闲</a></li>
                    <li><a href="###">娱乐</a></li>
                    <li><a href="###">办公</a></li>
                    <li><a href="###">儿童</a></li>
                    <li><a href="###">聚会</a></li>
                </ul>
            </div> -->
            <!-- <div>
                <h3>档案</h3>
                <ul>
                    <li><a href="###"><time>2016/1</time></a></li>
                    <li><a href="###"><time>2016/2</time></a></li>
                    <li><a href="###"><time>2016/3</time></a></li>
                    <li><a href="###"><time>2016/4</time></a></li>
                    <li><a href="###"><time>2016/5</time></a></li>
                </ul>
            </div> -->
        </div>
        <div class="clearfix"></div>
        <div class="blog_bt">
            <div class="container">
                <input class="blog_a" type="button" value="前一页">
                <input class="blog_a" type="button" value="下一页">
            </div>
        </div>

    </div>
</section>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>
    var pageBtn = document.getElementsByClassName("blog_a");
    var page = <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
;
    var pageCount = <?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
;
    var prePage = page - 1;
    var nextPage = page + 1;
    if(page == 1){
        prePage = pageCount;
    }
    if(page == pageCount){
        nextPage = 1;
    }
    pageBtn[0].onclick = function(){
        location.href = "<?php echo C('URL');?>
/?p=home&m=blog&a=showBlog&c_id=<?php echo $_smarty_tpl->tpl_vars['c_id']->value;?>
&page=" + prePage;
    }
    pageBtn[1].onclick = function(){
        location.href = "<?php echo C('URL');?>
/?p=home&m=blog&a=showBlog&c_id=<?php echo $_smarty_tpl->tpl_vars['c_id']->value;?>
&page=" + nextPage;
    }
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
