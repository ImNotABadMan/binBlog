<?php

namespace core;  //创建了一个  全局空间  下的 core空间

class Model{
    //private $_type;//连接数据库的类型,默认使用MYSQL数据库
    //private $_host;//数据库的IP地址，默认使用localhost表示本地
    //private $_port;//数据库连接的端口号，默认使用3306
    //private $_char;//设置的字符集，默认使用utf8
    //private $_dbname;//需要选择的数据库名，默认使用db1数据库

    //private $_acc;//连接数据库的帐号
    //private $_pwd;//连接数据库的密码

    //private $_pdo;//保存PDO类的对象的属性
    //private $_pdostatement;//保存PDOStatement类的对象的属性

    protected $_type;//连接数据库的类型,默认使用MYSQL数据库
    protected $_host;//数据库的IP地址，默认使用localhost表示本地
    protected $_port;//数据库连接的端口号，默认使用3306
    protected $_char;//设置的字符集，默认使用utf8
    protected $_dbname;//需要选择的数据库名，默认使用db1数据库

    protected $_acc;//连接数据库的帐号
    protected $_pwd;//连接数据库的密码

    protected $_pdo;//保存PDO类的对象的属性
    protected $_pdostatement;//保存PDOStatement类的对象的属性
    //用于连接操作
    private $sql = '';
    private $orderSql = '';
    private $limitSql = '';
    private $preSql = '';

    //public function __construct($type='mysql', $host='localhost', $port=3306, $char='utf8', $dbname='db1', $acc='root', $pwd='123abc'){
    public function __construct($type='', $host='', $port='', $char='', $dbname='', $acc='', $pwd=''){

        //初始化属性
        //$this->_type = $type;
        //$this->_host = $host;
        //$this->_port = $port;
        //$this->_char = $char;
        //$this->_dbname = $dbname;

        //$this->_acc = $acc;
        //$this->_pwd = $pwd;

        //$this->_type = empty($type) ? $GLOBALS['conf']['pdo']['type'] : $type;
        //$this->_host = empty($host) ? $GLOBALS['conf']['pdo']['host'] : $host;
        //$this->_port = empty($port) ? $GLOBALS['conf']['pdo']['port'] : $port;
        //$this->_char = empty($char) ? $GLOBALS['conf']['pdo']['char'] : $char;
        //$this->_dbname = empty($dbname) ? $GLOBALS['conf']['pdo']['db'] : $dbname;

        //$this->_acc = empty($acc) ? $GLOBALS['conf']['pdo']['acc'] : $acc;
        //$this->_pwd = empty($pwd) ? $GLOBALS['conf']['pdo']['pwd'] : $pwd;

        $this->_type = empty($type) ? C('pdo.type') : $type;
        $this->_host = empty($host) ? C('pdo.host') : $host;
        $this->_port = empty($port) ? C('pdo.port') : $port;
        $this->_char = empty($char) ? C('pdo.char') : $char;
        $this->_dbname = empty($dbname) ? C('pdo.db') : $dbname;

        $this->_acc = empty($acc) ? C('pdo.acc') : $acc;
        $this->_pwd = empty($pwd) ? C('pdo.pwd') : $pwd;

        //实例化PDO类的对象
        $dsn = "{$this->_type}:host={$this->_host};port={$this->_port};charset={$this->_char};dbname={$this->_dbname}";

        $this->_pdo = new \PDO($dsn, $this->_acc, $this->_pwd);

        //开启异常错误处理模式
        $this->_pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    //错误信息输出方法
    private function errMsg($err){
        echo '错误信息为：' . $err->getMessage() . '<br/>';
        echo '出错的文件：' . $err->getFile() . '<br/>';
        echo '在文件中出错的位置：' . $err->getLine();
        exit;
    }

    //设置数据（增、删、改操作）
    public function setData($sql){
        try{
            $this->_pdo->exec($sql);
        }catch(\PDOException $aa){

            $this->errMsg($aa);
        }
        return true;
    }
    //得到sql语句
    public function getSql(){
        return $this->preSql;
    }
    //连接操作
    public function join($sql){
        $this->sql .= " join {$sql} ";
        return $this;
    }

    //别名操作
    public function alias($sql){
        $this->sql .= " as {$sql} ";
        return $this;
    }

    public function order($sql){
        $this->orderSql .= " order by {$sql} ";
        return $this;
    }

    public function limit($sql){
        $this->limitSql .= " limit {$sql} ";
        return $this;
    }

    //获得一条数据记录的方法
    public function getRow($fields, $tbname, $condition){
        $this->sql = $sql = "select {$fields} from {$tbname} {$this->sql} where {$condition} {$this->orderSql} limit 1";
        $this->preSql = $this->sql;
	
        try{
            $this->_pdostatement = $this->_pdo->query($sql);//执行查询SQL语句
        }catch(\PDOException $err){
            $this->preSql = $this->sql;
            $this->errMsg($err);//输出错误信息
        }

        $res = $this->_pdostatement->fetch(\PDO::FETCH_ASSOC);//解析一条记录并且作为返回值返回
        $this->sql = '';
        return $res;
    }

    //获得多条数据的方法
    public function getRows($fields, $tbname, $condition){

        $this->sql = $sql = "select {$fields} from {$tbname} {$this->sql} where {$condition} {$this->orderSql} {$this->limitSql}";
        $this->preSql = $this->sql;
        //var_dump($this->sql);
        try{
            $this->_pdostatement = $this->_pdo->query($sql);//执行查询SQL语句
        }catch(\PDOException $err){
            $this->preSql = $this->sql;
            $this->errMsg($err);//输出错误信息
        }

        $res = $this->_pdostatement->fetchAll();//解析全部的记录并且作为返回值返回
        $this->sql = '';
        return $res;
    }

    public function getColumns($tbname){
        $sql = "select * from {$tbname} limit 1";
        $arr = array();
        try{
            $this->_pdostatement = $this->_pdo->query($sql);
            $count = $this->_pdostatement->columnCount();
            for($i = 0; $i < $count; $i++){
                $arr[] = $this->_pdostatement->getColumnMeta($i);
            }
        }catch(\PDOException $err){
            $this->errMsg($err);
        }

        return $arr;
    }

}