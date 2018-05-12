<?php
/* Smarty version 3.1.29, created on 2018-05-12 15:54:58
  from "D:\Apache24\htdocs\binBlog\app\home\view\User\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5af69dd2d74b50_39378521',
  'file_dependency' => 
  array (
    '8cb389ee5637d95318d4026b77480aa314d121a1' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\home\\view\\User\\index.html',
      1 => 1526111697,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Com/header.html' => 1,
    'file:Com/footer.html' => 1,
  ),
),false)) {
function content_5af69dd2d74b50_39378521 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo C('URL');?>
/public/home/css/user.css" rel='stylesheet' type='text/css'/>
<?php echo '<script'; ?>
 src="<?php echo C('URL');?>
/public/home/js/jQuery.js"><?php echo '</script'; ?>
>
<div class="container">

    <!-- 第一块 -->
    <div class="content-info">
        <div class="header box">
            <h3><?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
</h3>
            <h2>账号： <?php echo $_smarty_tpl->tpl_vars['user']->value['acc'];?>
</h2>
            <h2>邮箱： <?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</h2>
        </div>
        <?php echo '<script'; ?>
>
            $(document).ready(function (c) {
                $('.close-1').on('click', function (c) {
                    $('.statistics').fadeOut('slow', function (c) {
                        $('.statistics').remove();
                    });
                });
            });
        <?php echo '</script'; ?>
>
    </div>
    <!-- 第一块 -->

    <!-- 第二块 -->
    <div class="statistics box">
        <div class="sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span style="color: #666;font-size: 16px;">收藏文章</span></li>
                    <!--<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>收藏分类</span></li>-->
                    <div class="clear"></div>
                </ul>
                <div class="resp-tabs-container">
                    <div class="tab-0" aria-labelledby="tab_item-0">
                        <div class="facts">
                            <ul class="tab_list">
                                <?php
$_from = $_smarty_tpl->tpl_vars['articles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_article_0_saved_item = isset($_smarty_tpl->tpl_vars['article']) ? $_smarty_tpl->tpl_vars['article'] : false;
$_smarty_tpl->tpl_vars['article'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['article']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
$__foreach_article_0_saved_local_item = $_smarty_tpl->tpl_vars['article'];
?>
                                <li><a target="_blank" href="<?php echo U('blog/showDetails',array('id'=>$_smarty_tpl->tpl_vars['article']->value['id']));?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
 ------ <?php echo $_smarty_tpl->tpl_vars['article']->value['u_nickname'];?>
</a></li>
                                <?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_0_saved_local_item;
}
if ($__foreach_article_0_saved_item) {
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_0_saved_item;
}
?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <?php echo '<script'; ?>
 src="<?php echo C('URL');?>
/public/home/js/easyResponsiveTabs.js" type="text/javascript"><?php echo '</script'; ?>
> -->
            <?php echo '<script'; ?>
 type="text/javascript">
                $(document).ready(function () {
                    // $('#horizontalTab').easyResponsiveTabs({
                    //     type: 'default', //Types: default, vertical, accordion
                    //     width: 'auto', //auto or any width like 600px
                    //     fit: true   // 100% fit in a container
                    // });
                });
            <?php echo '</script'; ?>
>
        </div>
        <div class="clear"></div>
    </div>
    <?php echo '<script'; ?>
>
        $(document).ready(function (c) {
            $('.close-2').on('click', function (c) {
                $('.contact').fadeOut('slow', function (c) {
                    $('.contact').remove();
                });
            });
        });
    <?php echo '</script'; ?>
>
    <!-- 第二块 -->

    <!-- 第三块 -->
    <div class="wrap">
        <div class="contact">
            <div class="skills-info box">
                <div id="canvas">
                    <div class="row skill-grids text-center">
                        <div class="grid-1">
                            <div class="skill-grid">
                                <div class="circle" id="circles-1"></div>
                                <h5 class="web"><p>收藏文章数量</p></h5>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo C('URL');?>
/public/home/js/circles.js"><?php echo '</script'; ?>
>
                    <?php echo '<script'; ?>
>
                        var colors = [
                            ['#202835', '#00ae55']
                        ];

                        // for (var i = 1; i <= 3; i++) {
                            var child = document.getElementById('circles-' + 1),
                                percentage = 55 + <?php echo $_smarty_tpl->tpl_vars['aCount']->value;?>
;

                            Circles.create({
                                id: child.id,
                                percentage: percentage,
                                radius: 80,
                                width: 18,
                                number: { isset($count) ? ($count / $aCount) * 100 : 0},
                                text: '%',
                                colors: colors[0]
                            });
                        // }

                    <?php echo '</script'; ?>
>
                </div>
            </div>
        </div>
        <?php echo '<script'; ?>
>
            $(document).ready(function (c) {
                $('.close-3').on('click', function (c) {
                    $('.contact-info').fadeOut('slow', function (c) {
                        $('.contact-info').remove();
                    });
                });
            });
        <?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo C('URL');?>
/public/home/js/classie.js"><?php echo '</script'; ?>
>
    </div>
    <!-- 第三块 -->
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




<?php }
}
