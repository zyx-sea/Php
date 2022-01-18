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


<body class="layui-view-body">

    <div class="layui-content">
        <div class="layui-page-header">
            <div class="pagewrap">
                <span class="layui-breadcrumb">
                  <a href="">首页</a>
                  <a href="">查询结果</a>
                  <a><cite>日期段数据</cite></a>
                </span>
                <h2 class="title">日期段数据</h2>
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-card">
                <div class="layui-card-body">
                    <div class="form-box">
                        <div class="layui-form layui-form-item">
                            <div class="layui-inline" >
                              <!-- 提交查询条件到select.php-->
                              <form class="login-form" action="../views/select.php" method="post">
                                <div class="layui-form-mid">商户名:</div>
                                <div class="layui-input-inline" style="width: 100px;">
                                  <input type="text" autocomplete="off" class="layui-input" name="uid" value="">
                                </div>
                                <div class="layui-form-mid">开始时间:</div>
                                <div class="layui-input-inline" style="width: 100px;">
                                  <input type="text" autocomplete="off" class="layui-input" name="starttime" value="">
                                </div>
                                <div class="layui-form-mid">结束时间:</div>
                                <div class="layui-input-inline" style="width: 100px;">
                                  <input type="text" autocomplete="off" class="layui-input" name="endtime" value="">
                                </div>
                                <button class="layui-btn layui-btn-blue">查询</button>
                                <button class="layui-btn layui-btn-primary">重置</button>
                              </form>
                            </div>
                        </div>
                        <button class="layui-btn layui-btn-blue">
                          <i class="layui-icon" href="views/form.html">&#xe654;</i>
                          <a href="../views/add.php">新增</a>
                        </button>
                        <table id="demo"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/layui.all.js"></script>
    <script>
      var element = layui.element;
      var table = layui.table;
      var form = layui.form;
    </script>
<!-- 展示已知数据
  table.render({
    elem: '#demo'
    ,cols: [[ //标题栏
      {field: 'ckh', title: '参考号', width: 80, sort: true}
      ,{field: 'wbjyh', title: '外部交易号', width: 120}
      ,{field: 'jysj', title: '交易时间', minWidth: 150}
      ,{field: 'shh', title: '商户名', minWidth: 160}
      ,{field: 'jyje', title: '交易金额', width: 80}
      ,{field: 'fqbt', title: '分期贴息', width: 100}
    ]]
    ,data: [{
      "ckh": "10001"
      ,"wbjyh": "杜甫"
      ,"jysj": "xianxin@layui.com"
      ,"shh": "男"
      ,"jyje": "浙江杭州"
      ,"fqbt": "人生恰似一场修行"

    }]

    ,skin: 'line' //表格风格
    ,even: true
    ,page: true //是否显示分页
    ,limits: [5, 7, 10]
    ,limit: 5 //每页默认显示的数量
  });  -->   
</body>

<?php
header("Content-type: text/html; charset=utf-8");
//require_once ('mssql.php');
require_once (dirname(__FILE__).'\mssql.php');

//执行方法
shjg_show_html();

function shjg_show_html(){
    global $mssql;

    $starttime=$_POST['starttime'];
    $endtime=$_POST['endtime'];
    $uid=$_POST['uid'];
                 
    $sql="select * FROM butie_QJZ5 
    WHERE 交易时间> '$starttime'
    and   交易时间< '$endtime'
    and   商户号='$uid'";
    //echo  $sql;

    $mer_select_list=$mssql->getAll_array_string($sql);
    
    echo '<table border="0.8" width="95%"  align="center">';
    echo '<tr bgcolor="#dddddd">';
    echo '<th>参考号</th><th>外部交易号</th><th>交易时间</th><th>商户号</th><th>交易金额</th><th>分期补贴</th>';
    echo '</tr>';

    foreach($mer_select_list as $key => $value){
        print_r("<tr>");

        print_r("<td>".$value['参考号']."</td>");
        print_r("<td>".$value['外部交易号']."</td>");
        print_r("<td>".$value['交易时间']."</td>");
        print_r("<td>".$value['商户号']."</td>");
        print_r("<td>".$value['交易金额']."</td>");
        print_r("<td>".$value['分期贴息']."</td>");

        print_r("</tr>");
    }
    print_r("</table>");
   }
?>

</html>