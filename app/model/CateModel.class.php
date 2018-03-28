<?php
/**
 * @Author: anchen
 * @Date:   2017-12-02 10:35:47
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-12-03 13:21:59
 */
namespace model;
use \core\Model;

class CateModel extends Model{
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

