<?php
/* Smarty version 3.1.29, created on 2018-02-04 09:17:28
  from "D:\Apache24\htdocs\binBlog\app\admin\view\Com\getUser.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a765f280b1816_56735959',
  'file_dependency' => 
  array (
    'bb46e0d915138a8d9536c517743623b62bdcba24' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\binBlog\\app\\admin\\view\\Com\\getUser.html',
      1 => 1512705531,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a765f280b1816_56735959 ($_smarty_tpl) {
echo '<script'; ?>
>
    function getUser(obj){
        // obj.onkeyup = function(){
        obj.oninput = function(){
            var xmlHttp;
            if(window.XMLHttpRequest){
                xmlHttp = new XMLHttpRequest();
            }else{
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlHttp.onreadystatechange = function(){
                if(xmlHttp.readyState == 4){
                    if(xmlHttp.status == 200){
                        var menu = document.getElementById("menu");
                        var arr = eval(xmlHttp.responseText);
                        menu.innerHTML = "";
                        var arrLen = arr.length;
                        for(var i = 0; i < arrLen; i++){
                            var li = document.createElement("li");
                            li.role = "presentation";
                            var a = document.createElement("a");
                            //高亮显示不失真
                            var reg = eval("/" + obj.value + "/ig");
                            var regIndex = arr[i].nickname.toLowerCase().indexOf(obj.value.toLowerCase());
                            var str = arr[i].nickname.replace(reg, "<font color='red'>" + arr[i].nickname.substr(regIndex, obj.value.length) + "</font>");
                            if(reg != undefined && obj.value.trim() != ""){
                                a.innerHTML = str;
                            }else{
                                a.innerHTML = arr[i].nickname;
                            }

                            a.data = arr[i].nickname;
                            a.href="javascript:void(0)";
                            li.appendChild(a);
                            menu.appendChild(li);
                        }
                        var liA = menu.getElementsByTagName("a");
                        var liALen = liA.length;

                        for(var i = 0; i < liALen; i++){
                            (function(index){
                                liA[index].onclick = function(){
                                    obj.value = liA[index].data;
                                }
                            })(i);
                        }
                        /***********************************/
                    }
                }
            }
            xmlHttp.open("GET", "<?php echo C('URL');?>
/index.php?p=admin&m=blog&a=getUser&u_nickname=" + encodeURI(this.value) + "&date=" + new Date().getTime(), true);
            xmlHttp.send();
        }
    }
    var input = document.getElementById("u_nickname");
    getUser(input);
<?php echo '</script'; ?>
><?php }
}
