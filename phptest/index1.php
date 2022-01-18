<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>首页</title>

	</head>
	<body>

			<?php
              
				//echo phpinfo();
				$serverName = "10.71.254.6"; //数据库服务器地址
				$uid = "zhouyx";     //数据库用户名
				$pwd = "Zyx1996"; //数据库密码
				$database="zhouyx";
				$connectionInfo = array("UID"=>$uid, "PWD"=>$pwd, "Database"=>$database);
				$conn = sqlsrv_connect($serverName, $connectionInfo);
				if( $conn == false){
					echo "连接失败！";
					//var_dump(sqlsrv_errors());
					//exit;
				}else{
					echo "连接成功！";
				}
		
			?>
		
	</body>
</html>