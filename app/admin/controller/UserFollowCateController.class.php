<?php
/**
 * @Author: anchen
 * @Date:   2018-01-20 18:53:57
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-20 19:20:56
 */
namespace admin\controller;
use \core\Controller;

class UserFollowCateController extends Controller{
    public function showList(){
        $rows = M("\\model\\UserFollowCateModel")->alias('uc')
                                                 ->join("bl_category as c on uc.c_id = c.id")
                                                 ->getRows("*", "bl_user_follow_cate", 1);
        $tree = array();

        M("\\model\\UserFollowCateModel")->recursive($tree, $rows);
        $this->assign("tree", $tree);

        $this->display("UserFollowCate/list.html");
    }

    public function showUpd(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : "";

        $row = M("\\model\\UserFollowCateModel")->getRow("id,name", "bl_user_follow_cate", "id={$id}");
        $this->assign("flag", 2);
        $this->assign("row", $row);

        $this->showList();
    }

    public function upd(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : 0;
        $name = isset($_POST["name"]) ? V($_POST["name"]) : "";
        $sql = "update bl_user_follow_cate set name = '{$name}' where id ={$id}";
        $re = M("\\model\\UserFollowCateModel")->setData($sql);
        $re = $re ? 22 : 20;

        header("location:" . C('URL') . "/index.php?p=admin&m=cate&a=showList&re={$re}");
    }

    public function add(){
        $name = !empty($_POST["name"]) ? V($_POST["name"]) : "";
        $parent_id = isset($_POST['parent_id']) ? V($_POST['parent_id']) : "";
        $sql = "insert into bl_user_follow_cate values(null, '{$name}', {$parent_id})";

        $re = M("\\model\\UserFollowCateModel")->setData($sql);
        $re = $re ? 11 : 10;

        header("location:" . C('URL') . "?p=admin&m=cate&a=showList&re=" . $re);
    }

    public function del(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : 0;

        if( M("\\model\\UserFollowCateModel")->getRow("id", "bl_user_follow_cate", "parent_id={$id}") ){
            header("location:" . C("URL") . "/index.php?p=admin&m=cate&a=showList&re=" . urlencode("此分类下面有子分类，请先删除子分类"));
            exit;
        }

        if( M("\\model\\BlogModel")->getRow("id", "bl_blog", "c_id={$id}") ){
            header("location:" . C("URL") . "/index.php?p=admin&m=cate&a=showList&re=" . urlencode("此分类下面有文章，请先删除文章"));
            exit;
        }

        $sql = "delete from bl_user_follow_cate where id ={$id}";
        $re = M("\\model\\UserFollowCateModel")->setData($sql);

        $re = $re ? 33 : 30;

        header("location:" . C('URL') . "/index.php?p=admin&m=cate&a=showList&re={$re}");
    }
}