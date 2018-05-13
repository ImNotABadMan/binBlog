<?php

namespace core;  //创建了一个  全局空间  下的 core空间

class Model{
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

    // 2.0
    private $_sql;
    private $_table; // 数据表
    private $_condition;// 条件
    protected $_field = '*';
    private $_join = '';
    private $_limit = '';
    private $_alias = '';
    private $_order = '';

    public function __construct($type='', $host='', $port='', $char='', $dbname='', $acc='', $pwd=''){

        //初始化属性
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
        echo 'SQL语句：' . $this->_sql . "<br />";
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
        $this->_join .= "join {$sql}  ";
        $this->sql .= " join {$sql} ";
        return $this;
    }

    //别名操作
    public function alias($sql){
        $this->_alias = " as {$sql} ";
        $this->sql .= " as {$sql} ";
        return $this;
    }

    public function order($sql){
        $this->_order = " order by {$sql} ";
        $this->orderSql .= " order by {$sql} ";
        return $this;
    }

    public function limit($sql){
        $this->_limit = " limit {$sql} ";
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

    /************************2.0*******************************/
    public function field($str){
        $this->_field = $str;
        return $this;
    }

    public function table($str){
        $this->_table = $str;
        return $this;
    }

    private function _condition($condition){
        $str = '';
        foreach ($condition as $key => $val) {
            if($str != '' && $val[0] != 'or'){
                $str .= ' and ';
            }
            switch ($val) {
                case is_string($val):
                    $str .= " $key = '$val' ";
                    break;
                case is_numeric($val):
                    $str .= " $key = $val ";
                    break;
                case is_array($val):
                    // [ 'id' => ['<', 123456] ]
                    if( is_array($val) ){
                        // [ 'id' => ['<', 123456] ]
                        if( is_array($val[0]) ){
                            // [ 'id' => ['<', 123456] ]
                            // [ 'id' => [ ['>', 123456], ['<', 123459] ]
                            foreach ($val as $k => $v) {
                                $str .= " $key {$v[0]} '$v[1]' ";
                                // echo $k . ' ' . (count($val) - 1) . "\n";
                                if( $k != count($val) - 1 ){
                                    if( isset($v[2]) ){
                                        $str .= $v[2];
                                    }else{
                                        $str .= ' and ';
                                    }
                                }
                            }
                        }else{
                            $str .= " $key {$val[0]} '$val[1]' ";
                        }
                    }else{
                        $str .= " $key {$val[0]} '$val[1]' ";
                    }
                    break;
                default:
                    $str .= " $key = '$val' ";
                    break;
            }
        }
        $this->_condition = $str;
        return $this;
    }

    public function getSql2(){
        return $this->_sql;
    }

    public function select($condition = [], $type = ""){
        if( !empty($condition) ){
            $this->_condition($condition);
            $this->_condition = 'where ' . $this->_condition;
        }
        $sql = "select {$this->_field} from {$this->_table} {$this->_alias} {$this->_join} {$this->_condition} {$this->_order} {$this->_limit}";
        $this->_sql = $sql;

        try{
            $this->_pdostatement = $this->_pdo->query($sql);
        }catch(\PDOException $err){
            $this->errMsg($err);//输出错误信息
        }
        $PDOType = !empty($type) ? $type : \PDO::FETCH_ASSOC;
        return $this->_pdostatement->fetchAll($PDOType);
    }

    public function find($condition = [], $type = ""){
        if( !empty($condition) ){
            $this->_condition($condition);
            $this->_condition = 'where ' . $this->_condition;
        }
        $sql = "select {$this->_field} from {$this->_table} {$this->_condition}";
        $this->_sql = $sql;

        try{
            $this->_pdostatement = $this->_pdo->query($sql);
        }catch(\PDOException $err){
            $this->errMsg($err);//输出错误信息
        }
        $PDOType = !empty($type) ? $type : \PDO::FETCH_ASSOC;
        return $this->_pdostatement->fetch($PDOType);
    }

    private function _setData($data){
        $str = '';
        foreach ($data as $key => $val) {
            if( $str != '' ){
                $str .= ' , ';
            }
            if( is_string($val) ){
                $str .= " $key = '$val' ";
            }else if( is_numeric($val) ){
                $str .= " $key = $val ";
            }
        }
        return $str;
    }

    public function update($data, $condition = ''){
        if( !empty($condition) ){
            $this->_condition($condition);
            $this->_condition = ' where ' . $this->_condition;
        }
        $data = $this->_setData($data);
        $sql = "update {$this->_table} set {$data} {$this->_condition}";

        try{
            $this->_pdo->exec($sql);
        }catch(\PDOException $err){
            $this->errMsg($err);
        }

        return true;
    }

    public function insert($data){
        $dataStr = $this->_setData($data);
        $keyStr = "(";
        $index = 1;
        foreach ($data as $key => $val) {
            if( $index != 1 ){
                $keyStr .= ',';
            }
            $keyStr .= $key;
            $index++;
        }
        $keyStr .= ")";

        $dataStr = '(';
        $index = 1;
        foreach ($data as $key => $val) {
            if( $index != 1 ){
                $dataStr .= ',';
            }
            if( is_string($val) ){
                $dataStr .= "'{$val}'";
            }else if(is_numeric($val)){
                $dataStr .= $val;
            }
            $index++;
        }
        $dataStr .= ")";

        $sql = "insert into {$this->_table}{$keyStr} values{$dataStr}";
        $this->_sql = $sql;

        try{
            $this->_pdo->exec($sql);
        }catch(\PDOException $err){
            $this->errMsg($err);
        }

        return true;
    }

    public function delete($condition){
        if( !empty($condition) ){
            $this->_condition($condition);
            $this->_condition = 'where ' . $this->_condition;
        }
        $sql = "delete from {$this->_table} {$this->_condition}";
        $this->_sql = $sql;

        try{
            $this->_pdostatement = $this->_pdo->query($sql);
        }catch(\PDOException $err){
            $this->errMsg($err);//输出错误信息
        }

        return true;
    }
}


