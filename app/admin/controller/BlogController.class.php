<?php
/**
 * @Author: anchen
 * @Date:   2017-12-02 11:12:54
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-02-06 14:08:06
 */
namespace admin\controller;
use \core\Controller;
use \plugins\PageTool;
use \plugins\FileUploadTool;

class BlogController extends Controller{

    public function showList(){

        //page_id-----以比较索引值id进行数据极快的查询
        // $page_id = isset($_GET["page_id"]) ? V($_GET["page_id"]) : 0;

        //查询条件，在新增页面的form，新增方法的跳转，以及更新
        $stitle = isset($_REQUEST["stitle"]) ? V($_REQUEST["stitle"]) : "";
        $sc_id = !empty($_REQUEST["sc_id"]) ? V($_REQUEST["sc_id"]) : "";
        $su_nickname = isset($_REQUEST["su_nickname"]) ? V($_REQUEST["su_nickname"]) : "";

        // var_dump($stitle, $sc_id, $su_nickname);die;
        $sql = "1";
        if($stitle !== ""){
            $sql .= " and title like '%{$stitle}%'";
        }
        if($sc_id !== ""){
            $sql .= " and c_id={$sc_id}";
        }
        if($su_nickname !== ""){
            $sql .= " and u_nickname like '%{$su_nickname}%'";
        }
        // var_dump($sql, $_REQUEST);die;

        //测试上万数据的查询速度
        // $t = time();
        /***********************显示S********************************/
        //获得数据的总行数
        $countResult = M("\\model\\BlogModel")->getRow("count(id) as num", "bl_blog", $sql);
        // var_dump($countResult);die;
        $pageRows = 10;//显示条数
        $pageCount = (int)ceil( ((int)$countResult["num"])/$pageRows);//总页数
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;//page,当前页
        if(!empty($_POST)){//重新搜索page变为1
            $page = 1;
        }
        $offsetRow = ($page - 1) * $pageRows;//偏移量

        $list = M("\\model\\BlogModel")->getRows("id,intro,title,u_nickname,post_date,c_name,c_c_name", "bl_blog", $sql . " and id >= (select id from bl_blog limit {$offsetRow},1) order by id limit {$pageRows}");


        $cols = M("\\model\\BlogModel")->getColumns("bl_blog");
        $pageHtml = PageTool::pageHtml($page, $pageCount, C("URL") . "?p=admin&m=blog&a=showList&stitle={$stitle}&sc_id={$sc_id}&su_nickname={$su_nickname}&page");

        //测试上万数据的查询速度
        // $t1 = time();

        //分类
        $cate = M("\\model\\CateModel")->getRows("*", "bl_category", 1);
        $tree = array();
        M("\\model\\CateModel")->recursive($tree, $cate);

        //用户
        $users = M("\\model\\UserModel")->getRows("id,nickname", "bl_user", 1);


        //行
        $this->assign("list", $list);
        //列
        $this->assign("cols", $cols);
        $this->assign("tree", $tree);
        $this->assign("users", $users);

        $this->assign("pageHtml", $pageHtml);//分页
        $this->assign("page", $page);
        $this->assign("pageCount", $pageCount);

        //搜索
        $this->assign("stitle", $stitle);
        $this->assign("sc_id", $sc_id);
        $this->assign("su_nickname", $su_nickname);-

        //测试上万数据的查询速度
        // var_dump(date("H:i:s", $t), date("H:i:s", $t1));
        // $this->assign("flag", $flag);
        /***********************显示E*********************************/
        $this->display("Blog/list.html");
    }

    public function showUpd(){
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;//page,当前页

        $row = M("\\model\\BlogModel")->getRow("*", "bl_blog", "id={$id}");

        //分类
        $cate = M("\\model\\CateModel")->getRows("*", "bl_category", 1);
        $tree = array();
        M("\\model\\CateModel")->recursive($tree, $cate);
        //

        $this->assign("row", $row);
        $this->assign("flag", 2);
        $this->assign("tree", $tree);
        $this->assign("page", $page);

        $this->showList();
    }

    public function upd(){

        //查询条件
        $stitle = isset($_GET["stitle"]) ? V($_GET["stitle"]) : "";
        $sc_id = !empty($_GET["sc_id"]) ? V($_GET["sc_id"]) : "";
        $su_nickname = isset($_GET["su_nickname"]) ? V($_GET["su_nickname"]) : "";

        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;//page,当前页

        $title = isset($_POST["title"]) ? V($_POST["title"]) : "";
        $intro = isset($_POST["intro"]) ? V($_POST["intro"]) : "";
        $u_id_and_name = isset($_POST["u_id_and_name"]) ? explode("-", V($_POST["u_id_and_name"])) : 0;
        $c_id_and_name = isset($_POST["c_id_and_name"]) ? explode("-", V($_POST["c_id_and_name"])) : 0;
        $content = isset($_POST["content"]) ? htmlspecialchars(V($_POST["content"])) : " ";
        $cover_img = !empty($_FILES["cover_img"]["name"]) ? $_FILES["cover_img"] : "";

        if($cover_img != ''){
            $picName = FileUploadTool::fileUpload($cover_img);
            $sql = "update bl_blog set cover_img='{$picName}',title='{$title}',content='{$content}',u_id={$u_id_and_name[0]}, u_nickname='{$u_id_and_name[1]}', c_id={$c_id_and_name[0]},c_name='{$c_id_and_name[1]}', intro='{$intro}' where id = {$id}";
        }else{
            $sql = "update bl_blog set title='{$title}',content='{$content}',u_id={$u_id_and_name[0]}, u_nickname='{$u_id_and_name[1]}',c_id={$c_id_and_name[0]},c_name='{$c_id_and_name[1]}', intro='{$intro}' where id = {$id}";
        }

        $re = M("\\model\\BlogModel")->setData($sql);

        $re = $re ? 22 : 20;

        header("location:" . C("URL") . "/index.php?p=admin&m=blog&a=showList&stitle={$stitle}&sc_id={$sc_id}&su_nickname={$su_nickname}&page={$page}&re=".$re);


    }

    public function add(){

        //查询条件
        $stitle = isset($_GET["stitle"]) ? V($_GET["stitle"]) : "";
        $sc_id = !empty($_GET["sc_id"]) ? V($_GET["sc_id"]) : "";
        $su_nickname = isset($_GET["su_nickname"]) ? V($_GET["su_nickname"]) : "";

        $page = isset($_GET["page"]) ? $_GET["page"] : 1;//page,当前页

        $title = isset($_POST["title"]) ? V($_POST["title"]) : "";
        $intro = isset($_POST["intro"]) ? V($_POST["intro"]) : "";
        $u_id_and_name = isset($_POST["u_id_and_name"]) ? explode("-", V($_POST["u_id_and_name"])) : 0;
        $c_id_and_name = isset($_POST["c_id_and_name"]) ? explode("-", V($_POST["c_id_and_name"])) : 0;
        $content = isset($_POST["content"]) ? htmlspecialchars(V($_POST["content"])) : " ";

        $cover_img = isset($_FILES["cover_img"]) ? $_FILES["cover_img"] : "";

        $picName = FileUploadTool::fileUpload($cover_img);

        $post_date = time();

        $sql = "insert into bl_blog values(null,'{$picName}','{$title}',{$u_id_and_name[0]},'{$u_id_and_name[1]}',{$post_date},'{$content}',{$c_id_and_name[0]},'{$c_id_and_name[1]}', '{$intro}',0,'0',0,0)";

        $re = M("\\model\\BlogModel")->setData($sql);
        $re = $re ? 11 : 10;

        header("location:" . C("URL") . "/index.php?p=admin&m=blog&a=showList&stitle={$stitle}&sc_id={$sc_id}&su_nickname={$su_nickname}&page={$page}&re=".$re);
        // $this->showList();
    }

    public function del(){

        //查询条件
        $stitle = isset($_GET["stitle"]) ? V($_GET["stitle"]) : "";
        $sc_id = !empty($_GET["sc_id"]) ? V($_GET["sc_id"]) : "";
        $su_nickname = isset($_GET["su_nickname"]) ? V($_GET["su_nickname"]) : "";

        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;//page,当前页

        $sql = "delete from bl_blog where id = {$id}";
        $re = M("\\model\\BlogModel")->setData($sql);

        $re = $re ? 33 : 30;

        header("location:" . C("URL") . "/index.php?p=admin&m=blog&a=showList&stitle={$stitle}&sc_id={$sc_id}&su_nickname={$su_nickname}&page={$page}&re=" . $re);
    }

    public function getUser(){
        $u_nickname = !empty($_GET['u_nickname']) ? urldecode(V($_GET['u_nickname'])) : "";
        // var_dump($u_nickname);die;
        $rows = M("\\model\\UserModel")->getRows("nickname", "bl_user", "nickname like '%{$u_nickname}%'");

        echo json_encode($rows);
    }

}