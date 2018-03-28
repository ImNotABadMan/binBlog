<?php
/**
 * @Author: anchen
 * @Date:   2018-01-20 18:59:27
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-20 19:12:34
 */
namespace model;
use \core\Model;

class UserFollowCateModel extends Model{
    public function recursive(&$tree, $arr, $pid = 0, $level = 0){
        foreach ($arr as $key => $value) {
            if($value['parent_id'] == $pid){
                $value['level'] = $level;
                $tree[ $value['id'] ] = $value;
                $this->recursive($tree, $arr, $value['id'], $level + 1);
            }
        }
    }
}