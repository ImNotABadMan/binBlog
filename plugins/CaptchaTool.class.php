<?php

namespace plugins;//创建了一个  全局空间  下的  plugins空间
/**
1. 随机字符
2. 设置干扰点
3. 设置干扰线
4. 干扰弧线（选做）
5. 输出图像
*/
class CaptchaTool{

    private $_resource;//保存画布资源的属性
    private $randStr; // 验证码字符串
    private $_w;
    private $_h;

    //创建一个构造方法
    public function __construct($w='', $h=''){

        $this->_w = empty($w) ? C('captcha.w') : $w;//画布的宽度
        $this->_h = empty($h) ? C('captcha.h') : $h;//画布的高度

        $this->_resource = imagecreatetruecolor($this->_w, $this->_h);//创建画布

        //填充背景色
        $color = $this->getColor();//获得一个随机色
        imagefill($this->_resource, 0, 0, $color);

        //写字
        $this->randStr = $str = $this->randStr();//得到随机字符
        @session_start();
        $_SESSION["captcha"] = $str;
        $color = $this->getColor();//获得一个随机色
        $fontPath = ROOT_PUBLIC_PATH . 'plugins/itckrist.ttf';//mvc/public/plugins/font1.ttf
        $x = $this->_w * 30/100;//左下角起始点x坐标
        $y = $this->_h * 60/100;//左下角起始点y坐标
        imagettftext($this->_resource, 40, 0, $x, $y, $color, $fontPath, $str);//写字

        //设置干扰点
        for($i=0; $i<C('captcha.pointNum')-150; $i++ ){
            $color = $this->getColor();//获得一个随机色
            $bx = mt_rand($this->_w*20/100, $this->_w*80/100);//起始点的x坐标
            $by = mt_rand($this->_h*40/100, $this->_h*60/100);//起始点的y坐标
            $ex = mt_rand($bx-2, $bx+2);//终点的x坐标
            $ey = mt_rand($by-2, $by+2);//终点的y坐标
            imageline($this->_resource, $bx, $by, $ex, $ey, $color);//画点
        }

        //设置干扰线
        $this->printLine();
    }

    //画干扰线的方法
    private function printLine(){
        for($i=0; $i<C('captcha.lineNum')-10; $i++ ){
            $color = $this->getColor();//获得一个随机色
            $bx = mt_rand(0, $this->_w*30/100);//起始点的x坐标
            $by = mt_rand(0, $this->_h);//起始点的y坐标
            $ex = mt_rand($this->_w*60/100, $this->_w);//终点的x坐标
            $ey = mt_rand(0, $this->_h);//终点的y坐标
            imageline($this->_resource, $bx, $by, $ex, $ey, $color);//画点
        }
    }

    //构建随机字
    private function randStr(){

        $arrNum = range(0, 9);
        $arrLower = range('a', 'z');
        $arr = array_merge($arrNum, $arrLower);

        $randStr = '';
        for($i=0; $i<4; $i++ ){
            $key = mt_rand(0, count($arr)-1);
            $randStr .= $arr[$key];
        }
        return $randStr;
    }

    //创建一个专门分配颜色的方法
    private function getColor($r='', $g='', $b=''){

        $r = $r==='' ? mt_rand(0, 255) : $r;//基色红
        $g = $g==='' ? mt_rand(0, 255) : $g;//基色绿
        $b = $b==='' ? mt_rand(0, 255) : $b;//基色蓝

        return imagecolorallocate($this->_resource, $r, $g, $b);
    }

    //输出图像
    public function outputImg(){

        if( C('captcha.type')=='jpeg' ):
            header("Content-type:image/jpeg");
            imagejpeg($this->_resource);
        elseif( C('captcha.type')=='png' ):
            header("Content-type:image/png");
            imagepng($this->_resource);
        endif;

        session(C('VAR_CAPTCHA'), $this->randStr);
    }
}


