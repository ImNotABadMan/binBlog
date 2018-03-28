/*
* @Author: anchen
* @Date:   2018-01-24 08:56:42
* @Last Modified by:   anchen
* @Last Modified time: 2018-02-05 18:11:01
*/

'use strict';
/***************显示****************/
$('.province').mouseover(function(e){
    $('.province-box').css('display', 'block');
}).mouseout(function(e){
    $('.province-box').css('display', 'none')
                      .mouseover(function(e){
                        $(this).css('display', 'block');
                      }).mouseout(function(e){
                        $(this).css('display', 'none');
                      });
});
$('.city').mouseover(function(e){
    $('.city-box').css('display', 'block');
}).mouseout(function(e){
    $('.city-box').css('display', 'none')
                  .mouseover(function(e){
                    $(this).css('display', 'block');
                  }).mouseout(function(e){
                    $(this).css('display', 'none');
                  });;
});

// 手机端
$('.province').click(function(){
    $('.province-box').css('display', 'block');
});
$('.city').click(function(){
    $('.city-box').css('display', 'block');
});


var province = '';

$.get('/binBlog/index.php?p=api&m=city&a=getProvince', {}, function(data){
    if(data.errCode != 0){
        return false;
    }
    var html = `<ul>`;
    $(data.msg).each(function(key, val){
        html += `<a class='province-item' href="/index.php?p=home&m=index&a=showList&province=${val.name}"><li class='province-item' data-index='${val.id}'>${val.name}</li></a>`;
    });
    html += `</ul>`;
    $('.province-box').html(html);
    //取得cookie的数据
    var start = document.cookie.indexOf('province=');
    var end = document.cookie.indexOf(';', start);
    //用于用省查找，保存为全局变量，用于判断是否要重新定位
    province = decodeURI(document.cookie.substring(start + 'province='.length, end));
    getCity(province);
    //查找城市
    // $('.province-item').on('click',function(e){
    //     var _this = $(this);
    //     getCity(_this.data('index'));
    // });

    console.log(data);
}, 'json');

function getCity(city){
    var url = '/binBlog/index.php?p=api&m=city&a=getCity';
    if(typeof city == 'string'){
        url = '/binBlog/index.php?p=api&m=city&a=getCityByProvince';
    }
    $.get(url, {
            province_id : city
        }, function(data){
            if(data.errCode != 0){
                return false;
            }
            $('.city-box').html('');
            var html = `<ul>`;
            $(data.msg).each(function(key,val){
                html += `<a class='city-item' href="/binBlog/index.php?p=home&m=index&a=showList&province=${city}&city=${val.name}"><li class='city-item' data-index='${val.id}'>${val.name}</li></a>`;
            });
            html += `</ul>`;
            $('.city-box').html(html);
    }, 'json');
}