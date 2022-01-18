<?php
header("Content-type: text/html; charset=utf-8");
require_once ('mssql.php');

userliset();

function userliset(){
    global $mssql;
    //$sql = "select * from kaohe2020.dbo.各部门关键考核指标完成情况月报202009毛利润 where 姓名 = '钱薇'";
    //$sql = "select * from kaohe2020.dbo.各部门关键考核指标完成情况月报202009毛利润 ";   
    //$sql = "SELECT * FROM qdtlzf.dbo.userlist201710 where uid =38 or uid = 39";
    $sql = "select * from tlzf_syb.dbo.sybls_交易状态";
    //echo '钱薇';
    $orders_add_list = $mssql->getAll_array_number($sql);
    //var_dump($orders_add_list);
    
    var_dump(update_qianwei($orders_add_list,1,2,3));
    
   
}


function update_qianwei($arr,$tuandui,$bumen,$name){
		//var_dump($arr);
	
	    foreach ($arr as $key =>  $value_input) {
		    //var_dump( $value_input);
		    
		    if($value_input[$tuandui] =='金融服务部' and $value_input[$bumen] =='跨境业务部'  and $value_input[$name] <> '侯静') 
		    {
				    //
				    var_dump($key);
				    $arr[$key][$name] = '钱薇';
				    
		    }
		    	    
	    } 

	    return $arr;
	
}
?>