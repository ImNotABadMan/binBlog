/*
* @Author: anchen
* @Date:   2018-02-03 15:58:30
* @Last Modified by:   anchen
* @Last Modified time: 2018-02-06 18:18:48
*/

'use strict';

var pic = document.getElementsByClassName("pic");
var pic_c = document.getElementsByClassName("pic_c")[0];

//一张图片1365大小
//往右一张，减去1365，以0开始
var left_length = 0;
var pre_left_length = 1;
//用left_length决定哪个小点
var index = 0;
//计时器
var dd = null;

//图片轮播
function pic_change(){

    pic_c.style.transitionDuration = "0.5s";

    if(left_length <= -5460){
        left_length = 0;
        pic_c.style.transitionDuration = "0s";
        // pic_c.style.left = left_length + "px";
        // left_length -= 1365;
    }

    $(pic_c).css('left', left_length);
    tipsClassChange();

    left_length -= 1365;

    //以left_length决定为哪个圆点添加css

    dd = setTimeout("pic_change()", 3000);
}

$('.tips_point').css('left', parseInt($('.box').css('width'))/2 - parseInt($('.tips_point').css('width'))/2);

function tipsClassChange(){
    //以left_length决定为哪个圆点添加css
    index = left_length / 1365;
    // console.log(index, left_length, pre_left_length);
    if(index <= -4){
        index = 1;
    }

    $('.tips_point').children('li').removeClass('tips_point_active').eq(Math.abs(index)).addClass('tips_point_active');
}

$(window).resize(function(){
    $('.tips_point').css('left', parseInt($('.box').css('width'))/2 - parseInt($('.tips_point').css('width'))/2);
});

$(function(){
    pic_change();

    /*左右按钮*/
    $('.ws_next').click(function(e){
        clearTimeout(dd);
        e.preventDefault();
        if(pre_left_length !=left_length){
            //计时器有改变就使用之前的left值，不会造成移动两次
            left_length += 1365;
        }

        pre_left_length = left_length -= 1365;

        if(left_length <= -5460){
            pre_left_length = left_length = 0;
            pic_c.style.transitionDuration = "0s";
            $(pic_c).css('left', left_length);
        }

        pic_c.style.transitionDuration = "0.5s";

        $(pic_c).css('left', left_length);

        tipsClassChange();
        dd = setTimeout("pic_change()", 3000);

    });
    $('.ws_prev').click(function(e){
        e.preventDefault();
        clearTimeout(dd);
        //判断计时器是否执行过
        if(pre_left_length != left_length){
            //计时器有改变就使用之前的left值，不会造成移动两次
            left_length = pre_left_length;
        }

        pre_left_length = left_length += 1365;

        if(left_length > 0){
            pre_left_length = left_length = -4095;
            pic_c.style.transitionDuration = "0s";
            $(pic_c).css('left', left_length);
        }

        pic_c.style.transitionDuration = "0.5s";

        $(pic_c).css('left', left_length);

        tipsClassChange();
        dd = setTimeout("pic_change()", 3000);

    });

    /*下方圆点位置*/
});



