<?php
/* Smarty version 3.1.29, created on 2018-04-17 22:43:59
  from "D:\Apache24\htdocs\binBlog\app\Home\view\Com\footer.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5ad6082f816898_99792337',
  'file_dependency' => 
  array (
    '6bcf1376a38e87726dba17bd7bbe485d6a868e41' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\Home\\view\\Com\\footer.html',
      1 => 1523976120,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ad6082f816898_99792337 ($_smarty_tpl) {
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
