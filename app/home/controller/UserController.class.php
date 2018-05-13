<?php
/**
 * @Author: anchen
 * @Date:   2018-04-17 21:12:20
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-05-12 09:48:33
 */

namespace home\Controller;
use \home\controller\CommonController as Controller;

class UserController extends Controller{
    private $_user_article;
    private $_user_follow;
    private $_user_cate;

    private $rowNum = 5;

    public function __construct(){
        parent::__construct();
        $this->_user_article    = M('\\model\\CollectArticleModel')->table('bl_user_collect_article');
        $this->_user_follow     = M('\\model\\UserFollowModel')->table('bl_user_follow');
        $this->_user_cate       = M('\\model\\UserFollowCateModel')->table('bl_user_follow_cate');
    }

    public function index(){
        $user = session('user');
        $condition = ['u_id' => $user['id']];

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $this->rowNum;
        $count = count( $this->_user_article->select($condition) );

        $condition = ['bl_user_collect_article.u_id' => $user['id']];
        $articles = $this->_user_article->field('bl_blog.*')->join('bl_blog on bl_blog.id = bl_user_collect_article.a_id')->join('bl_cate_category on bl_cate_category.id = bl_blog.c_c_id')->limit("$offset, $page")->select($condition);
        $condition = ['a.u_id' => $user['id']];
        $follows  = $this->_user_follow->alias('a')->join('bl_user as b on b.id = a.f_u_id')->select($condition);

        $condition = ['u_id' => $user['id']];
        $cates    = $this->_user_cate->select($condition);

        // 收藏文章数量
        $blogMOdel = M('\\model\\BlogModel')->table('bl_blog');
        $aCount = count($blogMOdel->select());

        $this->assign('aCount', $count ? $aCount + 55: 0);
        $this->assign('count', $count ?  $count/ $aCount * 100 : 0);

        $this->assign('articles', $articles);
        $this->assign('follows', $follows);
        $this->assign('cates'. $cates);
        $this->assign('user', $user);
        $this->display('User/index.html');
    }

}