<?php
/**
 * @Author: anchen
 * @Date:   2018-01-21 08:29:59
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-02-04 09:21:30
 */
namespace api;
use \plugins\PageTool;

class BlogApi{
    public function getBlog(){

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

        $list = M("\\model\\BlogModel")->getRows("id,intro,title,u_nickname,post_date,c_name", "bl_blog", $sql . " and id >= (select id from bl_blog limit {$offsetRow},1) order by id limit {$pageRows}");


        $pageHtml = PageTool::pageHtml($page, $pageCount, C("URL") . "?p=admin&m=blog&a=showList&stitle={$stitle}&sc_id={$sc_id}&su_nickname={$su_nickname}&page");

        //分类
        $cate = M("\\model\\CateModel")->getRows("*", "bl_category", 1);
        $tree = array();
        M("\\model\\CateModel")->recursive($tree, $cate);

        //用户
        $users = M("\\model\\UserModel")->getRows("id,nickname", "bl_user", 1);

        $arr['blogList'] = $list;
        // $arr['pageHtml'] = $pageHtml;
        $arr['tree'] = $tree;
        $arr['users'] = $users;
        echo ajaxJson($arr);
    }

    public function lastBlog(){
        $province = isset($_GET['province']) ? trim($_GET['province']): '广东';
        $province = substr($province, 0, -3);
        $city = isset($_GET['city']) ? trim($_GET['city']): '';
        $city = substr($city, 0, -3);
        if($city == ''){
            $cate = M('\\model\\CateModel')->getRow('id', 'bl_category', "name = '{$city}'");

        }else{
            $cate = M('\\model\\CateModel')->getRow('id', 'bl_category', "name = '{$province}'");
        }
        //var_dump($cate);
        $data = M('\\model\\BlogModel')->order('post_date desc')->limit(9)->getRows('id,cover_img, title', 'bl_blog', "c_id = {$cate['id']}");
        // var_dump(M('\\model\\BlogModel')->getSql());die;

        echo ajaxJson(array('errCode' => 0, 'msg' => $data));
    }
}