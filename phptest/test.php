<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../assets/css/layui.css">
    <link rel="stylesheet" href="../assets/css/view.css"/>
    <link rel="icon" href="/favicon.ico">
    <title>管理后台</title>
</head>


<body >
<h2>PHP 表单验证实例</h2>
<form method="post" action=" "> 
   参考号: <input type="text" name="ckh">
   <br><br>
   外部交易号: <input type="text" name="wbjyh">
   <br><br>
   交易时间: <input type="text" name="jysj">
   <br><br>
   商户号: <input type="text" name="shh">
   <br><br>
   交易金额: <input type="text" name="jyje">
   <br><br>
   分期贴息: <input type="text" name="fqtx">
   <br><br>  
   <input type="submit" name="submit" value="提交"> 
</form>
</body>

<?php
header("Content-type: text/html; charset=utf-8");
//require_once ('mssql.php');
require_once (dirname(__FILE__).'\mssql.php');

//执行方法
shjg_add_html();

//添加一条记录
function shjg_add_html(){
    global $mssql;
    //获取添加信息
    $ckh=$_POST['ckh'];
    $wbjyh=$_POST['wbjyh'];
    $jysj=$_POST['jysj'];
    $shh=$_POST['shh'];
    $jyje=$_POST['jyje'];
    $fqtx=$_POST['fqtx'];
  
    $sql="INSERT INTO butie_QJZ5 VALUES('$ckh','$wbjyh','$jysj','$shh','$jyje','$fqtx')"; 
    echo  $sql;
    if($ckh != null){
      $mssql->query($sql);
      echo "添加成功";
    }
   }

?>

</html>