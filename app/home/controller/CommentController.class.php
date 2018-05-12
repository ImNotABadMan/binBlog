<?php

namespace home\controller; //创建了一个  全局空间 下的 admin空间 下的 controller空间
use home\controller\CommonController as Controller;

//定义一个控制器类
class CommentController extends Controller{

    private $_model;

    public function __construct(){
        $this->_model = M('\\model\CommentModel')->table('bl_comment');
    }

    //展示列表页的方法
    public function addAnswer(){
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $text = isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ' ';
        $aid = isset($_POST['aid']) ? $_POST['aid'] : 0;
        $user = session('user');

        $_articleModel = M('\\model\\BlogModel')->table('bl_blog');
        $blog = $_articleModel->find(['id'=> $aid]);

        $data = [
            'content' => $text,
            'article_id' => $aid,
            'cat_title' => $blog['title'],
            'u_id'  => $user['id'],
            'u_nickname' => $user['nickname'],
            'post_date' => time(),
            'p_id' => $id
        ];

        $res = $this->_model->insert($data);

        if( !$res ){
            echo json_encode(['code' => 1, 'msg' => 'faild']);
            die;
        }

        echo json_encode(['code' => 0, 'msg' => 'success']);
    }

    public function addComment(){
        $text = isset($_POST['comment']) ? htmlspecialchars($_POST['comment']) : ' ';
        $aid = isset($_POST['id']) ? $_POST['id'] : 0;
        $title = isset($_POST['cat_title']) ? $_POST['cat_title'] : ' ';
        $user = session('user');

        $data = [
            'content' => $text,
            'article_id' => $aid,
            'cat_title' => $title,
            'u_id'  => $user['id'],
            'u_nickname' => $user['nickname'],
            'post_date' => time(),
            'p_id' => 0
        ];

        $this->_model->insert($data);

        header('location: ' . U('blog/showDetails') . "&id={$aid}");
    }

}

