<?php
/**
 * @Author: anchen
 * @Date:   2017-12-04 13:33:32
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-19 15:56:31
 */
namespace admin\controller;
use \core\Controller;
use \plugins\PageTool;

class UserController extends Controller{
    public function showList(){
        $page = isset($_GET["page"]) ? V($_GET["page"]) : 1;//当前页
        $pageRowsCount = C("pageRowsCount");//每页行数
        $rowsCount = M("\\model\\UserModel")->getRow("count(id) as num", "bl_user", 1)["num"];//总行数
        $pageCount = (int)ceil($rowsCount/$pageRowsCount);//总页数
        $offsetRow = ($page - 1) * $pageRowsCount;//偏移行数

        $rows = M("\\model\\UserModel")->getRows("*", "bl_user", "1 limit {$offsetRow},{$pageRowsCount}");

        $pageHtml = PageTool::pageHtml($page, $pageCount, C('URL') . "/index.php?p=admin&m=user&a=showList&page");

        //列
        $cols = M("\\model\\UserModel")->getColumns("bl_user");
        $this->assign("rows", $rows);
        $this->assign("page", $page);
        $this->assign("pageCount", $pageCount);
        $this->assign("cols", $cols);

        //分页
        $this->assign("pageHtml", $pageHtml);

        $this->display("User/list.html");
    }

    public function showUpd(){
        $id = isset($_GET["id"]) ? V($_GET["id"]) : 0;
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;
        $row = M("\\model\\UserModel")->getRow("*", "bl_user", "id={$id}");

        $this->assign("row", $row);
        $this->assign("flag", 2);
        $this->assign("page", $page);

        $this->showList();
    }

    public function upd(){
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;

        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $nickname = isset($_POST['nickname']) ? V($_POST["nickname"]) : "";
        $pwd = isset($_POST["pwd"]) ? V($_POST["pwd"]) : "";
        $email = isset($_POST['email']) ? V($_POST['email']) : "";
        $is_admin = isset($_POST["is_admin"]) ? V($_POST["is_admin"]) : "";

        if($pwd != ""){
            $pwd = md5($pwd);
            $sql = "update bl_user set nickname='{$nickname}', email='{$email}', pwd='{$pwd}', is_admin={$is_admin} where id = {$id}";
        }else{
            $sql = "update bl_user set nickname='{$nickname}', email='{$email}', is_admin={$is_admin} where id = {$id}";
        }

        $re = M("\\model\\UserModel")->setData($sql);
        $re = $re ? 22 : 20;
        if($re == 22){
            $page = isset($_GET["page"]) ? $_GET["page"] : 1;
            header("location:" . C('URL') . "/index.php?p=admin&m=user&a=showList&page={$page}&re=" . $re);
            exit;
        }else{
            $this->showUpd();
        }
    }

    public function add(){
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;
        $acc = isset($_POST["acc"]) ? V($_POST["acc"]) : "";
        $nickname = isset($_POST['nickname']) ? V($_POST["nickname"]) : "";
        $pwd = isset($_POST["pwd"]) ? V($_POST["pwd"]) : "";
        $email = isset($_POST['email']) ? V($_POST['email']) : "";
        $is_admin = isset($_POST['is_admin']) ? V($_POST['is_admin']) : "";

        if( !(empty($acc) || empty($pwd) || empty($email)) || empty($is_admin) ){
            $register_date = time();
            $pwd = md5($pwd);
            $sql = "insert into bl_user values(null, '{$acc}', '{$pwd}', '{$nickname}', '{$email}', {$register_date}, {$is_admin})";
            $re = M("\\model\\UserModel")->setData($sql);
            $re = $re ? 11 : 10;
        }else{
            $re = urlencode("新增信息不能留空");
        }

        header("location:" . C('URL') . "/index.php?p=admin&m=user&a=showList&page={$page}&re=" . $re);
    }

    public function del(){
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;

        $sql = "delete from bl_user where id = {$id}";
        $re = M("\\model\\UserModel")->setData($sql);
        $re = $re ? 33 : 30;

        header("location:" . C('URL') . "/index.php?p=admin&m=user&a=showList&page={$page}&re=" . $re);
    }
}