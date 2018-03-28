<?php
/* Smarty version 3.1.29, created on 2018-03-28 10:44:30
  from "/var/www/html/binBlog/app/home/view/Com/footer.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5abb018edd2822_36045873',
  'file_dependency' => 
  array (
    'd44e30bbe8fa553fb49eb810294ade61046dca98' => 
    array (
      0 => '/var/www/html/binBlog/app/home/view/Com/footer.html',
      1 => 1518528483,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abb018edd2822_36045873 ($_smarty_tpl) {
?>
<div class="clearfix"></div>

<footer class="footer">
    <div class="container">
        <div class="top">

            <figure>
                <h4> 订阅快讯</h4>
                <form  method="post" action="<?php echo C('URL');?>
/index.php?p=home&m=contant&a=User_email">
                    <div>
                        <input type="hidden" name="type" value="About"/>
                        <input  id="input" type="email" name="S_email" placeholder="请输入你的邮箱">
                        <button type="submit" id="inputbtn"></button>
                    </div>
                </form>
            </figure>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div class="bottom">
            <p>Bin客美食 -- 粤ICP备 18001110</p>
        </div>
    </div>
</footer>


<?php echo '<script'; ?>
 src='<?php echo C('URL');?>
/public/home/js/jQuery.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src='<?php echo C('URL');?>
/public/home/js/pro_city.js'><?php echo '</script'; ?>
>
<?php }
}
