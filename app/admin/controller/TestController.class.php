<?php

namespace admin\controller; //创建了一个  全局空间 下的 admin空间 下的 controller空间

//定义一个控制器类
class TestController{

    //展示列表页的方法
    public function test($id=""){

        $model = M('\\model\\TestModel');
        echo '测试模型对象：';
        var_dump( $model );
        echo '<hr/>';
        echo '恭喜您，框架部署成功！';
        var_dump(isset($_COOKIE['city']));
    }

}

