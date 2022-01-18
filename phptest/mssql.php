<?php

    function sun_utf2gbk($str){
     $charset = mb_detect_encoding($str,"UTF-8,GBK,GB2312");
     $charset = strtolower($charset);
     $str = mb_convert_encoding($str, 'gbk', $charset);
     return $str;
    }
        
    /**
     *自动判断把gbk或gb2312编码的字符串转为utf8
     *能自动判断输入字符串的编码类，如果本身是utf-8就不用转换，否则就转换为utf-8的字符串
     *支持的字符编码类型是：utf-8,gbk,gb2312
     *@param $str:string
     */
    function yang_gbk2utf8($str){
     $charset = mb_detect_encoding($str,"UTF-8,GBK,GB2312");
     $charset = strtolower($charset);
     if('cp936' == $charset){
     $charset='GBK';
     }
     if("utf-8" != $charset){
     $str = iconv($charset,"UTF-8//IGNORE",$str);
     }
    return $str;
    }

//require_once (dirname(__FILE__).'/'.'../inc/fun.php');
$mssql = new mssql_DB();
class mssql_DB {
    var $con = null;

    //数据库信息查询
    function __construct() {
        $dbhost="10.71.254.6";
        $dbuser="zhouyx";
        $dbpass="Zyx1996";
        $dbname='zhouyx';
        $connectionInfo =  array("UID"=>$dbuser,"PWD"=>$dbpass,"Database"=>$dbname);
        $this->con = sqlsrv_connect($dbhost,$connectionInfo);
    }
    
    //查询
    function query($sql){
        $sql = sun_utf2gbk($sql);
        $result = sqlsrv_query($this->con, $sql);
        if( !$result ) {
            die( $this-> sqlsrv_errors_utf8());
        }
        return $result;
    }
    
    function getRow($sql){
        $sql = sun_utf2gbk($sql);
        $result = sqlsrv_query($this->con, $sql);
        if( !$result ) {
            die( $this-> sqlsrv_errors_utf8());
        }
        $arr = array();
        while($row = sqlsrv_fetch_array($result))
        {
            $arr[] = $row;
        }
        return yang_gbk2utf8_arr($arr[0]);
    }
    
    function getRow_utf8($sql){
        $sql = sun_utf2gbk($sql);
        $result = sqlsrv_query($this->con, $sql);
        if( !$result ) {
            die( $this-> sqlsrv_errors_utf8());
        }
        $arr = array();
        while($row = sqlsrv_fetch_array($result))
        {
            $arr[] = $row[0];
        }
        return $arr;
    }
/**
 * 直接执行sql语句
 * @param string $sql*/
    function exec($sql = ''){
        $qty = 0; $id = 0;
        $result = sqlsrv_prepare( $this->con, $sql, array( &$qty, &$id));
        if( !$result ) {
            die( $this-> sqlsrv_errors_utf8());
        }
        else {
            if( sqlsrv_execute( $result ) === false ) {
                die( $this-> sqlsrv_errors_utf8());
            }
        }
        return $result;
    }

    
    /**
     * 直接执行sql语句
     * @param string $sql*/
    function exec_iconv($sql = ''){
        $qty = 0; $id = 0;
        $sql=iconv ( "utf-8", "gb2312//IGNORE", $sql);//数据库语句仅识别gb2312
        $result = sqlsrv_prepare( $this->con, $sql, array( &$qty, &$id));
        if( !$result ) {
            die( $this-> sqlsrv_errors_utf8());
        }
        else {
            if( sqlsrv_execute( $result ) === false ) {
                die( $this-> sqlsrv_errors_utf8());
            }
        }
        return $result;
    }
    
    
    
    
    //
  
/**报差错信息转UTF-8，可以直接查看
 * */    
    function sqlsrv_errors_utf8(){
        $arr=sqlsrv_errors();
        foreach ($arr as $row) {
            foreach ($row as $key => $value) {
                if(!is_numeric($key)){
                $res[yang_gbk2utf8($key)]=  yang_gbk2utf8($row[$key]);
                 }
            }
            $result[] = $res;
        }
        var_dump($result);
    }
    
/**
 * 返回所有的结果数组
 * @param string $sql
 * @return string[]*/
    function getAll($sql=''){
        $sql = sun_utf2gbk($sql);
        $result = sqlsrv_query($this->con, $sql);
        if( !$result ) {
            die( $this-> sqlsrv_errors_utf8());
        }
        $arr = array();
        while($row = sqlsrv_fetch_array($result))
        {
            foreach ($row as $key => $value) {
                //$row[yang_gbk2utf8($key)] = yang_gbk2utf8($row[$key]);
                $res[yang_gbk2utf8($key)]=  yang_gbk2utf8($row[$key]);
            }
            
            $arr[] = $res;
        }
        return $arr;
    }
    

/**
 * 返回中文的SQL语句，字段为数字的结果
 * @param string $sql
 * @return string[]*/
    function getAll_array_number($sql = ""){
        $sql = sun_utf2gbk($sql);
        $result = sqlsrv_query($this->con, $sql);
        if( !$result ) {
            die( $this-> sqlsrv_errors_utf8());
        }
        $arr = array();
        while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_NUMERIC))
        {
            foreach ($row as $key => $value) { 
               
                $res[yang_gbk2utf8($key)]=  yang_gbk2utf8($row[$key]);
                
            }
            
            $arr[] = $res;
        }
        return $arr;
    }
    
/**
 * 返回中文的SQL语句，字段为字段名的结果
 * SQLSRV_FETCH_ASSOC, SQLSRV_FETCH_NUMERIC, and SQLSRV_FETCH_BOTH (the default).
 * @param string $sql
 * @return string[]*/    
    function getAll_array_string($sql = ""){
        $sql = sun_utf2gbk($sql);
        $result = sqlsrv_query($this->con, $sql);
        if( !$result ) {
            die( $this-> sqlsrv_errors_utf8());
        }
        $arr = array();
        while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
        {
            foreach ($row as $key => $value) {
                    
                    $res[yang_gbk2utf8($key)] =  yang_gbk2utf8($row[$key]);
                
            }
            
            $arr[] = $res;
        }
        return $arr;
    }
   
    
    function __destruct() {
        unset($this->con);
    }
}




