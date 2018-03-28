<?php

#引入初始化操作文件
include './config/init.php';

#调用启动方法寻找访问的页面
\core\App::run();