<?php
/**
 * @Author: anchen
 * @Date:   2017-12-03 11:16:23
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-19 15:24:38
 */
namespace admin\controller;
use \core\Controller;
use plugins\PageTool;

class CommentController extends Controller{
    private $_model;
    private $rowNum = 10;

    public function __construct()
    {
        parent::__construct();
        $this->_model = M('\\model\\CommentModel')->table('bl_comment');
    }

    public function showList(){
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $this->rowNum;
        $count = $this->_model->field('count(*) as c')->select()[0]['c'];
        $pageAll = ceil($count/$this->rowNum);
        $rows = $this->_model->field('*')->limit("$offset, $this->rowNum")->select();
        $tree = [];
        $this->_model->recursive($tree, $rows);
        $pageHtml = PageTool::pageHtml($page, $pageAll, U('Comment/showList&page'));

        $this->assign('pageHtml', $pageHtml);
        $this->assign('rows', $rows);
        $this->assign('tree', $tree);
        $this->display("Comment/list.html");
    }


    public function release(){
        if( !IS_AJAX ){
            echo json_encode(['code' => 2, 'msg' => '无效的请求']);
        }
        $id = isset($_POST["id"]) ? V($_POST["id"]) : 0;
        $info = $this->_model->select(['id' => $id])[0];
        $isRelease = $info['is_release'] ? 0 : 1;
        $sql = "update bl_comment set is_release = $isRelease where id ={$id}";
        $re = $this->_model->setData($sql);

        if( !$re ){
            echo json_encode(['code' => 1, 'msg' => '修改失败']);
        }

        echo json_encode(['code' => 0, 'msg' => '修改成功']);
    }

}