<?php
/* Smarty version 3.1.29, created on 2018-05-12 10:45:11
  from "D:\Apache24\htdocs\binBlog\app\home\view\Com\footer.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5af65537819671_53489045',
  'file_dependency' => 
  array (
    '0d471e87bb104fd0b3b592682be1f1ce772f9dfe' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\home\\view\\Com\\footer.html',
      1 => 1526093109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af65537819671_53489045 ($_smarty_tpl) {
?>
<div class="clearfix"></div>

<footer class="footer">
    <div class="container">
        <div class="top" style="float: none;">
            <figure>
                <h4> 订阅快讯</h4>
                <form  method="post" action="<?php echo C('URL');?>
/index.php?p=home&m=contant&a=User_email">
                    <div style="width: 500px;">
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
