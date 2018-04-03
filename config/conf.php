<?php

//网站的全局配置信息
$conf = array(

    #PDO相关配置
    'pdo' => array(
        'type' => 'mysql',//连接数据库的类型
        'host' => '127.0.0.1',//IP地址
        'port' => 3306,//端口号
        'char' => 'utf8',//字符集
        'db' => 'binblog',//选择的数据库
        'acc' => 'root',//数据库帐号
        'pwd' => '123456'//数据库密码
    ),

    #当前网站的域名
    // 'URL' => 'https://www.bingeblog.xin/binBlog', // 线上
    'URL' => 'http://www.binblog.com',
    // 'URL' => 'http://www.bin.com/pro1',

    #验证码相关配置
    'captcha' => array(
        'w' => 300,
        'h' => 170,
        'type' => 'jpeg',
        'pointNum' => 250,
        'lineNum' => 20
    ),

    #网站默认访问页
    'index' => array(
        'p'=>'home',
        'm'=>'Index',
        'a'=>'showList'
    ),

    "pageRowsCount" => 10,
    'VAR_CAPTCHA'   => 'code', //验证码变量名字
);