<?php
/**
 * @Author: anchen
 * @Date:   2018-01-31 22:59:31
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-31 22:59:43
 */
namespace model;
use \core\Model;

class CCateModel extends Model{
    public function recursive(&$tree, $arr, $id=0, $level=0){
        foreach($arr as $key=>$value){
            if($value["parent_id"] == $id){
                $value["level"] = $level;
                $tree[] = $value;
                $this->recursive($tree, $arr, $value["id"], $level + 1);
            }
        }
    }
}