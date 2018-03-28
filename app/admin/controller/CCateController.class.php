<?php
/**
 * @Author: anchen
 * @Date:   2018-01-31 22:57:03
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-02-03 21:19:23
 */

namespace admin\controller;
use \core\Controller;

class CCateController extends Controller{
    public function showList(){
        $rows = M("\\model\\CCateModel")->getRows("*", "bl_cate_category", 1);
        $tree = array();

        M("\\model\\CCateModel")->recursive($tree, $rows);

        $this->assign("tree", $tree);

        $this->display("CCate/list.html");
    }

    public function showUpd(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : "";

        $row = M("\\model\\CCateModel")->getRow("id,name", "bl_cate_category", "id={$id}");
        $this->assign("flag", 2);
        $this->assign("row", $row);

        $this->showList();
    }

    public function upd(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : 0;
        $name = isset($_POST["name"]) ? V($_POST["name"]) : "";
        $sql = "update bl_cate_category set name = '{$name}' where id ={$id}";
        $re = M("\\model\\CCateModel")->setData($sql);
        $re = $re ? 22 : 20;

        header("location:" . C('URL') . "/index.php?p=admin&m=ccate&a=showList&re={$re}");
    }

    public function add(){
        $name = !empty($_POST["name"]) ? V($_POST["name"]) : "";
        $parent_id = isset($_POST['parent_id']) ? V($_POST['parent_id']) : "";
        $sql = "insert into bl_cate_category values(null, '{$name}', {$parent_id})";

        $re = M("\\model\\CCateModel")->setData($sql);
        $re = $re ? 11 : 10;

        header("location:" . C('URL') . "?p=admin&m=ccate&a=showList&re=" . $re);
    }

    public function del(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : 0;

        if( M("\\model\\CCateModel")->getRow("id", "bl_cate_category", "parent_id={$id}") ){
            header("location:" . C("URL") . "/index.php?p=admin&m=ccate&a=showList&re=" . urlencode("此分类下面有子分类，请先删除子分类"));
            exit;
        }

        if( M("\\model\\BlogModel")->getRow("id", "bl_blog", "c_id={$id}") ){
            header("location:" . C("URL") . "/index.php?p=admin&m=ccate&a=showList&re=" . urlencode("此分类下面有文章，请先删除文章"));
            exit;
        }

        $sql = "delete from bl_cate_category where id ={$id}";
        $re = M("\\model\\CCateModel")->setData($sql);

        $re = $re ? 33 : 30;

        header("location:" . C('URL') . "/index.php?p=admin&m=ccate&a=showList&re={$re}");
    }
}