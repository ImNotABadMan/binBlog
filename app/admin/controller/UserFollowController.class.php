<?php
/**
 * @Author: anchen
 * @Date:   2017-12-03 11:16:23
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-20 08:43:10
 */
namespace admin\controller;
use \core\Controller;

class UserFollowController extends Controller{
    public function showList(){
        $rows = M("\\model\\UserFollowModel")->getRows("*", "bl_user_follow", 1);
        $cols = M("\\model\\UserFollowModel")->getColumns("bl_user_follow");

        $this->assign("cols", $cols);
        $this->assign("rows", $rows);

        $this->display("UserFollow/list.html");
    }

    public function showUpd(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : "";

        $row = M("\\model\\UserFollowModel")->getRow("id,name", "bl_user_follow", "id={$id}");
        $this->assign("flag", 2);
        $this->assign("row", $row);

        $this->showList();
    }

    public function upd(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : 0;
        $name = isset($_POST["name"]) ? V($_POST["name"]) : "";
        $sql = "update bl_user_follow set name = '{$name}' where id ={$id}";
        $re = M("\\model\\UserFollowModel")->setData($sql);
        $re = $re ? 22 : 20;

        header("location:" . C('URL') . "/index.php?p=admin&m=cate&a=showList&re={$re}");
    }

    public function add(){
        $name = !empty($_POST["name"]) ? V($_POST["name"]) : "";
        $parent_id = isset($_POST['parent_id']) ? V($_POST['parent_id']) : "";
        $sql = "insert into bl_user_follow values(null, '{$name}', {$parent_id})";

        $re = M("\\model\\UserFollowModel")->setData($sql);
        $re = $re ? 11 : 10;

        header("location:" . C('URL') . "?p=admin&m=cate&a=showList&re=" . $re);
    }

    public function del(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : 0;

        if( M("\\model\\UserFollowModel")->getRow("id", "bl_user_follow", "parent_id={$id}") ){
            header("location:" . C("URL") . "/index.php?p=admin&m=cate&a=showList&re=" . urlencode("此分类下面有子分类，请先删除子分类"));
            exit;
        }

        if( M("\\model\\BlogModel")->getRow("id", "bl_blog", "c_id={$id}") ){
            header("location:" . C("URL") . "/index.php?p=admin&m=cate&a=showList&re=" . urlencode("此分类下面有文章，请先删除文章"));
            exit;
        }

        $sql = "delete from bl_user_follow where id ={$id}";
        $re = M("\\model\\UserFollowModel")->setData($sql);

        $re = $re ? 33 : 30;

        header("location:" . C('URL') . "/index.php?p=admin&m=cate&a=showList&re={$re}");
    }
}