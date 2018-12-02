<?php

#引入常量配置文件
include './config/define.php';

#引入全局配置文件
include ROOT_CONF_PATH . 'conf.php';

#引入公共函数文件
include ROOT_CORE_PATH . 'Func.php';

#引入SMARTY3.0核心类文件
include SMARTY_DIR . 'Smarty.class.php';//    mvc/plugins/smarty/Smarty.class.php

#引入父类控制器文件
include ROOT_CORE_PATH . 'Controller.class.php';

#引入父类模型文件
include ROOT_CORE_PATH . 'Model.class.php';

#引入模型类文件
//include ROOT_APP_MODEL_PATH . 'NewsModel.class.php';

#引入后台新闻管理系统控制器类文件NewsController.class.php
//include './app/admin/controller/NewsController.class.php';
//include ROOT_APP_ADMIN_CON_PATH . 'NewsController.class.php';

#引入前台新闻管理系统控制器类文件NewsController.class.php
//include ROOT_APP_HOME_CON_PATH . 'NewsController.class.php';

#引入公共应用文件
include ROOT_CORE_PATH . 'App.class.php';

#引入compose 自动加载文件
include ROOT_VENDOR_PATH . 'autoload.php';

//注册自动加载
spl_autoload_register('\\core\\App::autoload');