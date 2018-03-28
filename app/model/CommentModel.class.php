<?php
/**
 * @Author: anchen
 * @Date:   2018-02-21 10:03:45
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-02-21 10:37:42
 */
namespace model;
use \core\Model;

class CommentModel extends Model{
    public function recursive(&$tree, $arr, $pid = 0, $level = 0){
        foreach ($arr as $key => $value) {
            if($value['p_id'] == $pid){
                $value['level'] = $level;
                $tree[$value['id']] = $value;
                $this->recursive($tree, $arr, $value['id'], $level + 1);
            }
        }
    }
}