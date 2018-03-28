<?php
/**
 * @Author: anchen
 * @Date:   2017-12-03 11:16:23
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-20 12:06:55
 */
namespace admin\controller;
use \core\Controller;

class CollectArticleController extends Controller{
    public function showList(){
        $rows = M("\\model\\CollectArticleModel")->alias("c")
                                                 ->join("bl_blog as b on c.a_id = b.id")
                                                 ->getRows("c.*, b.u_nickname as b_name, b.title, b.c_name", "bl_user_collect_article", 1);

        $this->assign("rows", $rows);
        // var_dump(M("\\model\\CollectArticleModel")->getSql());die;
        // echo "<pre>";
        // var_dump($rows);die;
        $this->display("CollectArticle/list.html");
    }

    public function showUpd(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : "";

        $row = M("\\model\\CollectArticleModel")->getRow("id,name", "bl_user_collect_article", "id={$id}");
        $this->assign("flag", 2);
        $this->assign("row", $row);

        $this->showList();
    }

    public function del(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : 0;

        if( M("\\model\\CollectArticleModel")->getRow("id", "bl_user_collect_article", "parent_id={$id}") ){
            header("location:" . C("URL") . "/index.php?p=admin&m=cate&a=showList&re=" . urlencode("此分类下面有子分类，请先删除子分类"));
            exit;
        }

        if( M("\\model\\BlogModel")->getRow("id", "bl_blog", "c_id={$id}") ){
            header("location:" . C("URL") . "/index.php?p=admin&m=cate&a=showList&re=" . urlencode("此分类下面有文章，请先删除文章"));
            exit;
        }

        $sql = "delete from bl_user_collect_article where id ={$id}";
        $re = M("\\model\\CollectArticleModel")->setData($sql);

        $re = $re ? 33 : 30;

        header("location:" . C('URL') . "/index.php?p=admin&m=collectArticle&a=showList&re={$re}");
    }
}