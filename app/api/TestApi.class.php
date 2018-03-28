<?php
/**
 * @Author: anchen
 * @Date:   2018-01-22 20:01:22
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-24 08:33:07
 */
namespace api;

class TestApi{
    public function get(){
        echo file_get_contents('http://api.map.baidu.com/geocoder/v2/?ak=Xh2kiT2FWMD0fPRaWU2zGxYdBZCPKP87');
    }
}