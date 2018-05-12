<?php
/* Smarty version 3.1.29, created on 2018-04-26 11:51:35
  from "D:\Apache24\htdocs\binBlog\app\Home\view\User\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5ae14cc7cffb07_67798741',
  'file_dependency' => 
  array (
    'fd0b00bb3675681f83617244b02b910115bbe740' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\Home\\view\\User\\index.html',
      1 => 1524714693,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Com/header.html' => 1,
    'file:Com/footer.html' => 1,
  ),
),false)) {
function content_5ae14cc7cffb07_67798741 ($_smarty_tpl) {
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
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>About Product</span></li>
                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Product sales</span></li>
                    <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Reviews</span></li>
                    <div class="clear"></div>
                </ul>
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                        <div class="facts">
                            <ul class="tab_list">
                                <li><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut
                                    wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                                    nisl ut aliquip ex ea commodo consequat</a></li>
                                <li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta
                                    nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer
                                    possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit
                                    eorum claritatem. Investigatione</a></li>
                                <li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem.
                                    Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.
                                    Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium
                                    lectorum. Mirum est notare quam littera gothica</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo '<script'; ?>
 src="<?php echo C('URL');?>
/public/home/js/easyResponsiveTabs.js" type="text/javascript"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript">
                $(document).ready(function () {
                    $('#horizontalTab').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });
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
                                <h5 class="web"><p>Phasellus ultrices nulla </p></h5>
                            </div>
                        </div>
                        <div class="grid-2">
                            <div class="skill-grid">
                                <div class="circle" id="circles-2"></div>
                                <h5 class="web"><p>Donec conse ctetuer ligu</p></h5>
                            </div>
                        </div>
                        <div class="grid-3">
                            <div class="skill-grid">
                                <div class="circle" id="circles-3"></div>
                                <h5 class="web"><p>Nunc tellus ante lorem</p></h5>
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
                            ['#202835', '#00ae55'], ['#202835', '#00ae55'], ['#202835', '#00ae55'], ['#202835', '#00ae55']
                        ];
                        for (var i = 1; i <= 5; i++) {
                            var child = document.getElementById('circles-' + i),
                                percentage = 50 + (i * 10);

                            Circles.create({
                                id: child.id,
                                percentage: percentage,
                                radius: 80,
                                width: 18,
                                number: percentage / 10,
                                text: '%',
                                colors: colors[i - 1]
                            });
                        }

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
        <?php echo '<script'; ?>
 src="<?php echo C('URL');?>
/public/home/js/uisearch.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            new UISearch(document.getElementById('sb-search'));
        <?php echo '</script'; ?>
>
    </div>
    <!-- 第三块 -->
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




<?php }
}
