<?php
/* Smarty version 3.1.29, created on 2018-02-04 16:19:35
  from "/var/www/html/pro1/app/home/view/Com/footer.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a76c217ad2057_80135135',
  'file_dependency' => 
  array (
    '89a7842f5857cba8d5f9520444938cc5490df83a' => 
    array (
      0 => '/var/www/html/pro1/app/home/view/Com/footer.html',
      1 => 1517642416,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a76c217ad2057_80135135 ($_smarty_tpl) {
?>
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
            <p>Copyright © 2016.公司所有的注册名称和服务</p>
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
