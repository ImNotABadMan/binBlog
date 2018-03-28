<?php
/* Smarty version 3.1.29, created on 2018-02-21 11:05:38
  from "D:\Apache24\htdocs\binBlog\app\home\view\blog\blog_details.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a8ce20244ffb4_62182678',
  'file_dependency' => 
  array (
    '1b8d224ad21a0e573c45ed8d9759d55351a4fd17' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\home\\view\\blog\\blog_details.html',
      1 => 1519182335,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Com/header.html' => 1,
    'file:Com/footer.html' => 1,
  ),
),false)) {
function content_5a8ce20244ffb4_62182678 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\Apache24\\htdocs\\binBlog/plugins/smarty/plugins\\modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"--博客"), 0, false);
?>

<hr style="background-color:#aaa;"/>
<div class="content details_content">
    <div class="left">
        <div class="breadcrumbs"> <a href="https://cuiqingcai.com/category/technique"><?php echo $_GET['category'];?>
</a> <small>&gt;</small> <a href="https://cuiqingcai.com/category/technique/python"><?php echo $_smarty_tpl->tpl_vars['row']->value['c_c_name'];?>
</a> <small>&gt;</small> <span class="muted"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</span>
        </div>
        <header class="article-header">
        <h1 class="article-title"></h1>
            <div class="meta">
            <span class="muted"><i class="fa fa-user"></i><?php echo $_smarty_tpl->tpl_vars['row']->value['u_nickname'];?>
</span>
            <time class="muted"><i class="fa fa-clock-o"></i> <?php echo date("Y-m-d H:i",$_smarty_tpl->tpl_vars['row']->value['post_date']);?>
</time>
            <span class="muted"><i class="fa fa-eye"></i> <?php echo $_smarty_tpl->tpl_vars['row']->value['view_times'];?>
浏览</span>
            <span class="muted"><i class="fa fa-comments-o"></i> <a href="#comments">5评论</a></span>
            </div>
        </header>
        <article class="article-content">
        <?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['row']->value['content']);?>

        </article>
        <div class="#commets">
            <a id="comments"></a>
            <div class="comments-area space-top-3x">
                <a id="comment"></a>
                <h4 class="comments-count">共有<?php echo (($tmp = @$_smarty_tpl->tpl_vars['comRowCount']->value['count_num'])===null||$tmp==='' ? 0 : $tmp);?>
条评论</h4>

                <!-- Comment -->
                <div class="comment">
                  <?php
$_from = $_smarty_tpl->tpl_vars['comRows']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_f_com_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_com']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_com'] : false;
$__foreach_f_com_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_f_com'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_f_com']->value['iteration']++;
$__foreach_f_com_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
                  <div style='padding-left: <?php echo $_smarty_tpl->tpl_vars['row']->value['level']*20;?>
px;'>
                  <div class="comment-meta">
                  <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_com']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_com']->value['iteration'] : null) == count($_smarty_tpl->tpl_vars['comRows']->value)) {?>
                    <a id="comment<?php echo count($_smarty_tpl->tpl_vars['comRows']->value);?>
"></a>
                  <?php }?>
                    <div class="column">
                      <span class="comment-autor"><i class="icon-head"></i><a href="#"><?php echo $_smarty_tpl->tpl_vars['row']->value['u_nickname'];?>
</a></span>
                    </div>
                    <div class="column">
                      <span class="comment-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['post_date'],"%Y %m %d %H:%M");?>
</span>
                    </div>
                  </div><!-- .comment-meta -->
                  <div class="comment-body">
                    <p><?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['row']->value['content']);?>
</p><hr/>
                  </div><!-- .comment-body -->
                  </div>
                  <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_f_com_0_saved_local_item;
}
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
                    <h3>没有内容</h3>
                  <?php
}
if ($__foreach_f_com_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_f_com'] = $__foreach_f_com_0_saved;
}
if ($__foreach_f_com_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_f_com_0_saved_item;
}
?>
                </div><!-- .comment -->

                <!-- Comment Form -->
                <div class="comment-respond">
                  <h4 class="comment-reply-title">发布新评论</h4>
                  <form method="post" id="comment-form" class="comment-form" action="<?php echo C('URL');?>
?p=home&c=blog&a=addComment&last=<?php echo count($_smarty_tpl->tpl_vars['comRows']->value);?>
">
                    <input type="hidden" name="cat_title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/>
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"/>
                    <div class="form-group">
                      <label for="cf_comment" class="sr-only">Comment</label>
                      <textarea name="comment" id="cf_comment" class="form-control input-alt" rows="7" placeholder="输入您的评论"></textarea>
                    </div>
                    <p class="form-submit">
                    <!-- 如果用户登录后才允许发表 -->
                    <?php if (isset($_SESSION['user'])) {?>
                        <input name="submit" type="submit" id="submit" class="btn btn-primary btn-block" value="发布">
                    <?php } else { ?>
                        您尚未登录！
                      <?php }?>
                    </p>
                  </form>
                </div><!-- .comment-respond -->
            </div><!-- .comments-area -->
        </div>
    </div>
</div>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
