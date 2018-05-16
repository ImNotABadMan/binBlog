<?php
/**
 * @Author: anchen
 * @Date:   2017-12-02 08:51:15
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-05-12 09:14:00
 */
namespace home\controller;
use \home\controller\CommonController as Controller;
use \plugins\PageTool;

class BlogController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function showBlog(){

        $c_c_c_id = isset($_GET["c_id"]) ? V($_GET["c_id"]) : "";//搜索分类
        $c_c_id = isset($_GET['ccid']) ? V($_GET['ccid']) : "";//所属分类
        $c_sql = "1";
        if($c_c_c_id != ""){
            $c_sql .= " and c_c_c_id = {$c_c_c_id}";
        }

        $countResult = M("\\model\\BlogModel")->getRow("count(id) as num", "bl_blog", $c_sql);

        $pageRows = 3;//显示条数
        $pageCount = (int)ceil($countResult["num"]/$pageRows);//总页数
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;//page,当前页
        $offsetRow = ($page - 1) * $pageRows;//偏移量
        if($c_c_c_id){
            //索引加多了，查询索引rows会变多c_id,post_date 294007和c_id 142236
            //post_date,post_date 294007 和post_date 31117
            //cover_img,title,u_id,u_nickname,post_date,content,c_id,c_name,intro
            $sql = "c_c_c_id = {$c_c_c_id} and post_date<=(select post_date from bl_blog where c_c_c_id = {$c_c_c_id} order by post_date desc limit {$offsetRow},1) order by post_date desc limit {$pageRows}";
        }else{
            $sql = "1 and c_c_id = {$c_c_id} and post_date<=(select post_date from bl_blog order by post_date desc limit {$offsetRow},1) order by post_date desc limit {$pageRows}";
        }

        // var_dump($sql);die;
        $rows = M("\\model\\BlogModel")->getRows("id,cover_img,title,u_nickname,post_date,c_name,intro,view_times", "bl_blog", $sql);

        $pageHtml = PageTool::pageHtml($page, $pageCount, C("URL") . "?p=admin&m=blog&a=showList&c_c_id={$c_c_id}&c_c_c_id={$c_c_c_id}&page");
        /****************************博客******************************/
        // var_dump($rows);die;
        //分类
        $cates = M("\\model\\CCateModel")->getRows("*", "bl_cate_category", 1);
        $tree = array();
        $cate = M("\\model\\CCateModel")->recursive($tree, $cates);

        if(session('user') ) {
            $condition = ['u_id' => session('user')['id']];
            $collects = M('\\model\\CollectArticleModel')->table('bl_user_collect_article')->select($condition);
            $this->assign("collects", $collects);
        }

        $this->assign("pageHtml", $pageHtml);//分页
        $this->assign("page", $page);
        $this->assign("pageCount", $pageCount);
        $this->assign("cate", $tree);
        $this->assign("c_c_c_id", $c_c_c_id);
        $this->assign("rows", $rows);
        $this->display("blog/blog.html");
    }

    public function showDetails(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : 0;

        $row = M("\\model\\BlogModel")->getRow("*", "bl_blog", "id={$id}");

        M('\\model\\BlogModel')->table('bl_blog')->update(['view_times' => $row['view_times'] + 1], ['id' => $row['id']]);

        $where = "article_id = {$id} and is_release = 1";
        $comRowCount = M("\\model\\CommentModel")->getRow("count(*) as count_num", "bl_comment", $where)['count_num'];
        $comRowsArr = M("\\model\\CommentModel")->order('post_date desc')->getRows('*', 'bl_comment', $where);
        $comRows = [];
        M("\\model\\CommentModel")->recursive($comRows, $comRowsArr);
        if( session('user') ) {
            $condition = [
                'u_id' => session('user')['id']
            ];
            $collect = M('\\model\\CollectArticleModel')->table('bl_user_collect_article')->select($condition);
            $this->assign('collect', $collect[0]);
        }

        // echo "<pre>";
        // print_r($comRowsArr);
        // print_r($comRows);die;

        $this->assign("row", $row);
        $this->assign("comRowCount", $comRowCount);
        $this->assign("comRows", $comRows);

        $this->display("blog/blog_details.html");
    }

    public function collect(){
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        if( !$id ){
            echo json_encode(['code' => 2, 'msg' => '无效id']);die;
        }

        $user = session('user');
        if( !$user ){
            echo json_encode(['code' => 2, 'msg' => '请登录']);die;
        }

        $model = M('\\model\\CollectArticleModel')->table('bl_user_collect_article');
        $condition = [
            'a_id' => $id,
            'u_id' => $user['id']
        ];
        $info = $model->find($condition);
        if( $info ){
            $model->delete($condition);
            echo json_encode(['code' => 1, 'msg' => '已取消收藏']);die;
        }
        $data = [
            'u_id' => $user['id'],
            'u_nickname' => $user['nickname'],
            'a_id' => $id,
            'collected_at' => time()
        ];
        $model->insert($data);
        echo json_encode(['code' => 0, 'msg' => '收藏成功']);die;
    }
}


