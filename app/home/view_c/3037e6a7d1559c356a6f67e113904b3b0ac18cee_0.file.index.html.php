<?php
/* Smarty version 3.1.29, created on 2018-02-04 16:19:35
  from "/var/www/html/pro1/app/home/view/index/index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a76c217a6f8e1_82791502',
  'file_dependency' => 
  array (
    '3037e6a7d1559c356a6f67e113904b3b0ac18cee' => 
    array (
      0 => '/var/www/html/pro1/app/home/view/index/index.html',
      1 => 1517731254,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Com/header.html' => 1,
    'file:Com/footer.html' => 1,
  ),
),false)) {
function content_5a76c217a6f8e1_82791502 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"--主页",'flag'=>1), 0, false);
?>

<section id="section">
    <div class="list">
        <div class="roll_container">
            <div class="box">
                <ul class="pic_c">
                    <li><a href="#" class="pic pic1"></a></li>
                    <li><a href="#" class="pic pic2"></a></li>
                    <li><a href="#" class="pic pic3"></a></li>
                    <li><a href="#" class="pic pic4"></a></li>
                    <!-- <li><a href="#" class="pic pic1"></a></li> -->
                </ul>
                <a href="#" class='ws_prev'></a>
                <a href="#" class='ws_next'></a>
                <ul class='tips_point'>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
        <div class="inner_c">
        </div>
        </div>
        <div class="about">
            <div class="container">
                <div>
                    <h2>关于</h2>
                    <p>　逢年过节，本地人喜欢做饼食走亲访友，木叶夹是最受欢迎的品种。木 叶夹有香、甜两种，均以糯米粉作皮，香者以花生、鳅鱼、虾米、咸萝卜等混合作馅;甜者以白糖、椰丝、芝麻、花生叶或者蕉叶在两旁包住，蒸大约一小时即熟。</p>
                </div>
            </div>
            <div class="test">
                <div class="container">
                    <h2>最新设计</h2>
                    <div class="figure">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="picture">
                <div class="picture_shadow" >
                </div>
                <div class="picture_p">
                    <p>理论学习：
                        1.开店流程讲解，包括店面的选址、人员配备、物资采购等。
                        2.项目技术详细批解，包括原材料的选择，采购，口味的变换、配比等。
                        3.店铺经营小技巧，轻松创造财富。
                        示范讲解：
                    </p>
                </div>
            </div>
            <div>
                <div class="container">
                    <h2>新口味</h2>
                    <div class="fig">
                      <?php
$_from = $_smarty_tpl->tpl_vars['rows']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_f_row_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_row']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_row'] : false;
$__foreach_f_row_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_f_row'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_f_row']->value['iteration']++;
$__foreach_f_row_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
                        <figcaption>
                            <span><strong>"<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_row']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_row']->value['iteration'] : null);?>
"/</strong><?php echo $_smarty_tpl->tpl_vars['row']->value['intro'];?>
</span>
                            <img style=width:205px;height:206px src="<?php echo C('URL');?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['map'];?>
">
                            <p><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</p>

                            <submit><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['net'];?>
">阅读更多</a></submit>
                        </figcaption>
                         <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_f_row_0_saved_local_item;
}
if ($__foreach_f_row_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_f_row'] = $__foreach_f_row_0_saved;
}
if ($__foreach_f_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_f_row_0_saved_item;
}
?>
                        <div class="clearfix"></div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</section>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Com/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


</body>
<!-- 首页js 轮播  -->
<?php echo '<script'; ?>
 type="text/javascript" src="/public/home/js/index.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=v8uxmcbjK7Q6BUIptI7pN9bvPO08V4qW"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" >
    //自动定位
    var geolocation = new BMap.Geolocation();
    // 创建地理编码实例
    var myGeo = new BMap.Geocoder();

    geolocation.getCurrentPosition(function(r){
        if(this.getStatus() == BMAP_STATUS_SUCCESS){
            var pt = r.point;
            // 根据坐标得到地址描述
            myGeo.getLocation(pt, function(result){
                if (result){
                    var addComp = result.addressComponents;
                    // alert(addComp.province + "," + addComp.city);
                    // console.log(result);
                    if(province == '' || document.cookie.indexOf('province=') == -1){
                        $('.province').text(addComp.province.substring(0, addComp.province.indexOf('省')));
                        $('.city').text(addComp.city.substring(0, addComp.city.indexOf('市')));
                        getCity(addComp.province.substring(0, addComp.province.indexOf('省')));
                        //设置cookie
                        $.get("<?php echo C('URL');?>
?p=home&m=index&a=setCity", {
                            'province' : addComp.province.substring(0, addComp.province.indexOf('省')),
                            'city': addComp.city.substring(0, addComp.city.indexOf('市'))
                        });
                    }
                    //请求最新设计
                    $.get("<?php echo C('URL');?>
?p=api&m=blog&a=lastBlog", {
                        'province' : addComp.province,
                        'city' : addComp.city
                    }, function(data){
                        if(data.errCode != 0){
                            return false;
                        }
                        var html = `<ul>`;
                        console.log(data);
                        var url = "<?php echo C('URL');?>
";
                        $(data.msg).each(function(key, val){
                            
                            html +=
                            `<li>
                                <img style='width:280px;height:250px;' src="${url}/${val.cover_img}" data-index='${val.id}'>
                            </li>`;
                            html += `</ul>`;
                            
                        });
                        $('.figure').html(html);
                    }, 'json');
                }else{

                }
            });
        }
    });
<?php echo '</script'; ?>
>
</html><?php }
}
