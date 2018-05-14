<?php
/**
 * Created by PhpStorm.
 * User: Binge
 * Date: 2018-05-12
 * Time: 23:12
 */

use \core\Controller as Controller;

class WebWxApi extends Controller
{
    private $_userModel;
    private $_user_article;
    private $_user_follow;
    private $_user_cate;
    private $_blogModel;
    private $_openid;

    private $rowNum = 5;

    public function __construct()
    {
        parent::__construct();
        $this->_userModel       = M('\\model\\UserModel')->table('bl_user');
        if( session('wxData') ){
            $user = M('\\model\\UserModel')->table('bl_user')->select(['openid' => session('wxData')['openid']])[0];
            session('user', $user);
        }
        $this->_user_article    = M('\\model\\CollectArticleModel')->table('bl_user_collect_article');
        $this->_user_follow     = M('\\model\\UserFollowModel')->table('bl_user_follow');
        $this->_user_cate       = M('\\model\\UserFollowCateModel')->table('bl_user_follow_cate');

        $this->_blogModel       = M('\\model\\BlogModel')->table('bl_blog');


        // 微信授权，获取openid
        if( IS_GET ) {
            if (!isset($_GET['code'])) {
                $uri = '';
                $isFirst = true;
                foreach ($_GET as $key => $item) {
                    if ($isFirst) {
                        $uri .= "%3F{$key}%3D{$item}";
                        $isFirst = false;
                    }
                    $uri .= "%26{$key}%3D{$item}";
                }
                header("location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxde85cdb773c8050a&redirect_uri=https%3A%2F%2Fwww.bingeblog.xin%2Findex.php{$uri}&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect");
            }
            $WeChat = new \core\WeChat();
            $code = $_GET['code'];

            $data = $WeChat->codeTransAccessInfo($code);
            $this->_openid = $data['openid'];
            session('wxData', $data);
        }
    }

    public function getUrl()
    {
        define("TOKEN", "weixin");
        $WeChat = new \core\WeChat();
//        $url = U('wechat/webWxApi/login');
        $url = U('wechat/webWxApi/user');
        var_dump($url);
        $url = \core\WeChatApi::setAccess($url);
        var_dump($url);
    }

    public function login()
    {
        if( IS_AJAX ){
            $acc = isset($_POST['username']) ? V($_POST['username']) : '';
            $pwd = isset($_POST['pwd']) ? V($_POST['pwd']) : '';
            $openid = session('wxData')['openid'];
            $condition = [
                'acc' => $acc,
                'pwd' => md5($pwd)
            ];
            $user = $this->_userModel->select($condition)[0];
            if( !$user ){
                echo ajaxJson(['code' => 1, 'msg' => '没有此用户']);die;
            }
            $data = ['openid' => $openid];
            $res = $this->_userModel->update($data);
            if( !$res ){
                echo json_encode(['code' => 2, 'msg' => '绑定失败']);die;
            }

            echo json_encode(['code' => 0, 'msg' => '绑定成功']);die;

        }
        // 微信授权
//        $WeChat = new \core\WeChat();
//        $code = $_GET['code'];
//
//        $data = $WeChat->codeTransAccessInfo($code);
        $data = session('wxData');

        if( $this->_userModel->select(['openid' => $data['openid']]) ){
            echo "<script>alert('已经绑定，不需要再次绑定{$data['openid']}');</script>";die;
        }

        // 获取用户信息
//        $userInfo = $WeChat->getUserInfo($data['access_token'], $data['openid']);

        $this->display('login.html');
    }

    public function success()
    {
        $this->display('success.html');
    }

    public function user()
    {
        $condition = [
            'openid' => session('wxData')['openid'],
        ];
        $user = $this->_userModel->select($condition)[0];
        if( !$user ){
            echo "<h3 style='font-size: 5rem;text-align: center;'>未绑定用户</h3>";
            header('Refresh:2;url=' . U('login', [], ''));die;
        }

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
        $this->display('user.html');
    }

    public function blog()
    {
        $id = isset($_GET["id"]) ? V($_GET["id"]) : 0;

        $row = M("\\model\\BlogModel")->getRow("*", "bl_blog", "id={$id}");

        M('\\model\\BlogModel')->table('bl_blog')->update(['view_times' => $row['view_times'] + 1], ['id' => $row['id']]);

        $where = "article_id = {$id} and is_release = 1";
        $comRowCount = M("\\model\\CommentModel")->getRow("count(*) as count_num", "bl_comment", $where);
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

        $this->assign("row", $row);
        $this->assign("comRowCount", $comRowCount);
        $this->assign("comRows", $comRows);

        $this->display("blog.html");
    }

    public function allBlog()
    {
        $condition = ['openid' => $this->_openid];
        $user = M('\\model\\UserModel')->table('bl_user')->select($condition)[0];
        $c_id = session('c_id') ?: $user['c_id'];
        $c_c_id = isset($_GET['c_c_id']) ? $_GET['c_c_id'] : 0;

        $this->_showBlog($c_id, $c_c_id);

        $this->display('blogs.html');
    }

    private function _showBlog($c_id = '', $c_c_id = '')
    {
        if( $c_id && $c_c_id ){
            $condition = [
                'c_c_id' => $c_c_id,
                'c_id'   => $c_id
            ];
            $blogs = $this->_blogModel->order('post_date desc')->select($condition);
        }else{
            $blogs = $this->_blogModel->order('post_date desc')->select(['c_id' => $c_id]);
        }

        /****************************博客******************************/
        if(session('user') ) {
            $condition = ['u_id' => session('user')['id']];
            $collects = M('\\model\\CollectArticleModel')->table('bl_user_collect_article')->select($condition);
            $this->assign("collects", $collects);
        }

        $this->assign('rows', $blogs);
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