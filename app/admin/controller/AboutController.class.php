<?php
/**
 * @Author: anchen
 * @Date:   2017-12-02 11:12:54
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-19 15:23:54
 */
namespace admin\controller;
use \core\Controller;
use \plugins\PageTool;

class AboutController extends Controller{

    public function showAbout(){
        /***********************显示S********************************/
        //获得数据的总行数
        $countResult = M("\\model\\AboutModel")->getRow("count(id) as num", "bl_about", 1);
        // var_dump($countResult);die;
        $pageRows = 10;//显示条数
        $pageCount = (int)ceil( ((int)$countResult["num"])/$pageRows);//总页数
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;//page,当前页
        $offsetRow = ($page - 1) * $pageRows;//偏移量

        $list = M("\\model\\AboutModel")->getRows("id,title,intro,our_ability", "bl_about", "1 limit {$offsetRow}, {$pageRows}");

        $cols = M("\\model\\AboutModel")->getColumns("bl_about");
        $pageHtml = PageTool::pageHtml($page, $pageCount, C("URL") . "?p=admin&m=About&a=showAbout&page");

        //行
        $this->assign("list", $list);
        //列
        $this->assign("cols", $cols);

        $this->assign("pageHtml", $pageHtml);//分页
        $this->assign("page", $page);
        $this->assign("pageCount", $pageCount);

        // $this->assign("flag", $flag);
        /***********************显示E*********************************/
        $this->display("About/list.html");
    }

    public function showUpd(){
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;

        $upData = M("\\model\\AboutModel")->getRow("*", "bl_about", "id={$id}");

        $this->assign("upData", $upData);
        $this->assign("flag", 2);

        $this->showAbout();
    }

    public function upd(){
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;

        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        $intro = isset($_POST["intro"]) ? $_POST["intro"] : "";
        $content = isset($_POST["content"]) ? $_POST["content"] : "";
        $design_cont = isset($_POST["design_cont"]) ? $_POST["design_cont"] : " ";
        $our_ability = isset($_POST["our_ability"]) ? $_POST["our_ability"] : "";

        $sql = "update bl_about set title='{$title}',intro='{$intro}',content='{$content}',design_cont='{$design_cont}',our_ability='{$our_ability}' where id = {$id}";

        $re = M("\\model\\AboutModel")->setData($sql);

        $this->assign("re", $re ? 22 : 20);

        $this->showAbout();
    }

    public function add(){
        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        $intro = isset($_POST["intro"]) ? $_POST["intro"] : "";
        $content = isset($_POST["content"]) ? $_POST["content"] : "";
        $design_cont = isset($_POST["design_cont"]) ? $_POST["design_cont"] : "";
        $our_ability = isset($_POST["our_ability"]) ? $_POST["our_ability"] : "";

        $sql = "insert into bl_about values(null,'{$title}','{$intro}','{$content}','{$design_cont}','{$our_ability}')";

        $re = M("\\model\\AboutModel")->setData($sql);
        $this->assign("re", $re ? 11 : 10);

        $this->showAbout();
    }

    public function del(){
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;

        $sql = "delete from bl_about where id = {$id}";
        $re = M("\\model\\AboutModel")->setData($sql);

        $this->assign("re", $re ? 33 : 30);

        $this->showAbout();
    }

}