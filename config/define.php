<?php

#定义常量
//define('ROOT', dirname(__FILE__) . '/');//ROOT常量：保存的是当前网站的根目录的绝对路径
define('ROOT', dirname(dirname(__FILE__)) . '/');//ROOT常量：保存的是当前网站的根目录的绝对路径

define('ROOT_APP_PATH', ROOT . 'app/');//     binBlog/app/
define('ROOT_CORE_PATH', ROOT . 'core/');//     binBlog/core/
define('ROOT_PLU_PATH', ROOT . 'plugins/');//     binBlog/plugins/
define('ROOT_CONF_PATH', ROOT . 'config/');//     binBlog/config/
define('ROOT_PUBLIC_PATH', ROOT . 'public/');//     binBlog/public/

define('ROOT_APP_ADMIN_PATH', ROOT_APP_PATH . 'admin/');//     binBlog/app/admin/
define('ROOT_APP_HOME_PATH', ROOT_APP_PATH . 'home/');//     binBlog/app/home/
define('ROOT_APP_API_PATH', ROOT_APP_PATH . 'api/'); // binBlog/app/api
define('ROOT_APP_MODEL_PATH', ROOT_APP_PATH . 'model/');//     binBlog/app/model/

define('ROOT_APP_ADMIN_CON_PATH', ROOT_APP_ADMIN_PATH . 'controller/');//    binBlog/app/admin/controller/
define('ROOT_APP_ADMIN_VIEW_PATH', ROOT_APP_ADMIN_PATH . 'view/');//    binBlog/app/admin/view/

define('ROOT_APP_HOME_CON_PATH', ROOT_APP_HOME_PATH . 'controller/');//    binBlog/app/home/controller/
define('ROOT_APP_HOME_VIEW_PATH', ROOT_APP_HOME_PATH . 'view/');//    binBlog/app/home/view/

define('ROOT_APP_WECHAT_PATH', ROOT_APP_PATH . 'wechat/'); // binBlog/app/wechat


define('SMARTY_DIR', ROOT_PLU_PATH.'smarty/');//     binBlog/plugins/smarty/

define('ROOT_VENDOR_PATH', ROOT . '/vendor/');// binBlog/vendor

// 判断请求方式
define('IS_POST', strtolower($_SERVER['REQUEST_METHOD']) == 'post');
define('IS_GET', strtolower($_SERVER['REQUEST_METHOD']) == 'get');
define('IS_AJAX', strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

# 微信接口回调地址的认证
define("TOKEN", "weixin");

