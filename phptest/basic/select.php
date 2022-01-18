<!DOCTYPE HTML>
<html>
<body style="background-color:#eef6fd">
    <head>
        <meta charset="utf-8">
        <title>查询结果显示</title>
    </head>

<form align="center" action="select.php" method="post" enctype="multipart/form-data">
<fieldset>
  <legend>查询商户贴息信息</legend>
  开始时间：<input type="text" name="starttime" value=""  />
  结束时间：<input type="text" name="endtime" value="" />
  商户号： <input type="text" name="uid" value="" />
  <input type="submit" name="submit" value="查询">
</fieldset>

</form>

<?php
header("Content-type: text/html; charset=utf-8");
//require_once ('mssql.php');
require_once (dirname(__FILE__).'/'.'../mssql.php');

//执行方法
//shjg_show();
shjg_show_html();


//查询结果显示
class Select_show{  
    }
    //商户查询结果
    function shjg_show(){
        global $mssql;

        $starttime=$_POST['starttime'];
        $endtime=$_POST['endtime'];
        $uid=$_POST['uid'];
                 
        $sql="select * FROM butie_QJZ5 
        WHERE 交易时间> '$starttime'
        and   交易时间< '$endtime'
        and   商户号='$uid'";
        echo  $sql;

        $mer_select_list=$mssql->getAll_array_number($sql);
        var_dump($mer_select_list);

        while($row<=10){
            //print_r($mer_select_list[$row]);
            //print_r("<br>");
            $row ++;
        }
        
   }
   
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
    
    echo '<table border="0.8" width="1300"  align="center">';
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
</body>
</html>
