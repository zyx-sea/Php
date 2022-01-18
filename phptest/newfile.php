<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>测试</title>
</head>
    <body>
    <p>打印结果</p>
    <?php

require_once ('mssql.php');    
//打印测试，传入值
echo "打印测试，sql语句 <br>";
//执行方法
//userliset();
//show_totable();
add_date();
//结果集显示
function userliset(){
    global $mssql;

    $sql = "select * FROM butie_QJZ5 
    WHERE 交易时间> '2021-12-01'
    and   交易时间< '2021-12-05'
    and   商户号='56145207538QJZ5'";

    echo  $sql ;
    //$sql = " select * FROM butie_QJZ5 WHERE 交易时间> '2021-12-01' and   交易时间< '2021-12-05'
    //and   商户号='56145207538QJZ5'";

    $mer_select_list = $mssql->getAll_array_number ($sql);
  
    //var_dump($mssql->getAll_array_number($sql));
    //var_dump($mssql->getRow_utf8($sql));
    var_dump($mer_select_list);

}   

//在表格中显示表的数据
function show_totable(){
    global $mssql;

    $sql = "select * FROM butie_QJZ5 
    WHERE 交易时间> '2021-12-01'
    and   交易时间< '2021-12-05'
    and   商户号='56145207538QJZ5'";

    echo  $sql ."<br>";
    $mer_select_list = $mssql->getAll_array_string($sql);
    //var_dump($mssql->getRow($sql));
    //var_dump($mer_select_list[5]);
    //$jiaoyie = array_column($mer_select_list, '交易金额', '商户号');
    //print_r($jiaoyie);

    echo '<table border="1" width="1200" align="center">';
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
function add_date(){
    global $mssql;

    $sql = " INSERT INTO zhouyx.dbo.butie_QJZ5 
    VALUES('211','2','3','4','5','6') ";

    echo  $sql ;
    $result = $mssql->query($sql);
    if( !$result ) {
        alert("添加失败！");
    }else{
        alert("添加成功！");
    }
}    
	?>
	
    </body>

</html>