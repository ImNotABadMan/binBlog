<?php
/**
 * @Author: anchen
 * @Date:   2018-01-24 08:59:31
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-29 10:50:26
 */
namespace api;

class CityApi{
    public function getCity(){
        $id = isset($_GET['province_id']) ? trim($_GET['province_id']) : '';
        if($id != ''){
            $city = M("\\model\\CateModel")->getRows('*', 'bl_category', "parent_id = {$id}");

            echo ajaxJson(array('errCode'=>0, 'msg'=>$city));
        }else{

        }

    }

    public function getCityByProvince(){
        $name = isset($_GET['province_id']) ? trim($_GET['province_id']) : '';
        if($name != ''){
            $id = M("\\model\\CateModel")->getRow('*', 'bl_category', "name = '{$name}'")['id'];

            $city = M("\\model\\CateModel")->getRows('*', 'bl_category', "parent_id = {$id}");

            echo ajaxJson(array('errCode'=>0, 'msg'=>$city));
        }else{

        }

    }
    public function getProvince(){
        $provinces = M("\\model\\CateModel")->getRows('*', 'bl_category', 'parent_id = 0');
        // $content = file_get_contents('http://api.map.baidu.com/geocoder/v2/?ak=Xh2kiT2FWMD0fPRaWU2zGxYdBZCPKP87&location=23.542919,116.390911&output=json');
        echo ajaxJson(array('errCode'=>0, 'msg'=>$provinces));
    }
}