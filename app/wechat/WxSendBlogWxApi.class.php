<?php
/**
 * Created by PhpStorm.
 * User: Binge
 * Date: 2018-05-13
 * Time: 20:31
 */
//include dirname(dirname(dirname(realpath(__FILE__)))) . '/core/WeChatApi.class.php';
//include dirname(dirname(dirname(realpath(__FILE__)))) . '/core/WeChat.class.php';
//include dirname(dirname(dirname(realpath(__FILE__)))) . '/core/Model.class.php';
//include dirname(dirname(dirname(realpath(__FILE__)))) . '/core/Func.php';

class WxSendBlogWxApi extends \core\WeChat
{
    public function sendBlogs()
    {
        $blogModel = new \core\Model();
        $blogModel = $blogModel->table('bl_blog');
        $blogs = $blogModel->join('bl_category on bl_category.id = bl_blog.c_c_id')->order('post_date desc, view_times desc')->limit('5')->select();
        var_dump($blogs);
        foreach ($blogs as $key => $value) {
            $blogs[$key]['Title'] = $value['title'];
            $blogs[$key]['Desc'] = htmlspecialchars( $value['intro'] );
            $blogs[$key]['PicUrl'] = 'https://www.bingeblog.xin/' . $value['cover_img'];
            $blogs[$key]['Url'] = U('wechat/webWxApi/blog', ['id' => $value['id'], 'category' => $value['name']]);
        }

        $this->reNews($blogs);
    }
}

//$wxSendBlog = new WxSendBlogWxApi();
//$wxSendBlog->sendBlogs();



