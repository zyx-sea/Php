<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/css/layui.css">
    <link rel="stylesheet" href="../assets/css/view.css"/>
    <title></title>
</head>
<body class="layui-view-body">
    <div class="layui-content">
        <div class="layui-row">
            <div class="layui-card">
                <div class="layui-card-header">表单</div>
                <form class="layui-form layui-card-body" action="../views/add.php">
                  <div class="layui-form-item">
                    <label class="layui-form-label">参考号</label>
                    <div class="layui-input-block">
                      <input type="text" name="ckh" required  lay-verify="required" placeholder="请输入参考号" autocomplete="off" class="layui-input" >
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">外部交易号</label>
                    <div class="layui-input-block">
                      <input type="text" name="wbjyh" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">交易时间</label>
                    <div class="layui-input-block">
                      <input type="text" name="jysj" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input" >
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">商户号</label>
                    <div class="layui-input-block">
                      <input type="text" name="shh" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input" >
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">交易金额</label>
                    <div class="layui-input-block">
                      <input type="text" name="jyje" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                   </div>
                    <div class="layui-form-item">
                    <label class="layui-form-label">分期贴息</label>
                    <div class="layui-input-block">
                      <input type="text" name="fqtx" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input" >
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn layui-btn-blue" lay-submit lay-filter="formDemo">立即提交</button>
                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                  </div>
                </form>  
            </div>
        </div>
    </div>
    <script src="../assets/layui.all.js"></script>
    <script>
      var form = layui.form
        ,layer = layui.layer;
    </script>
</body>
<?php
header("Content-type: text/html; charset=utf-8");
//require_once ('mssql.php');
require_once (dirname(__FILE__).'\mssql.php');
//执行方法
//shjg_show_html();
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
    //$sql="INSERT INTO butie_QJZ5 VALUES('1','2','3','4','5','6')";
    echo  $sql;
    if($ckh != null){
      $mssql->query($sql);
      echo "添加成功";
    }
   }
?>
</html>