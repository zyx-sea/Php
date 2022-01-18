<?php
$con=mysqli_connect("127.0.0.1","root","","test"); //连接数据库，且定位到数据库web1
if(!$con){die("error:".mysqli_connect_error());} //如果连接失败就报错并且中断程序
$user=$_POST['user'];
$pass=$_POST['pass'];
if($user==null||$pass==null){
    //die("账号和密码不能为空!");
    //header("location:login.html");
    echo "<script>alert('填写有误！')</script>";
    header("Refresh:3;url=login.html");
}

  $sql='select * from test where user='."'{$user}'and password="."'$pass';";
  $res=mysqli_query($con,$sql);
  $row=$res->num_rows; //将获取到的用户名和密码拿到数据库里面去查找匹配
  if($row!=0)
  {
      echo "<h1>登录成功，欢迎您&nbsp{$user}！</h1>";
     // header("Refresh:3;url=index1.php");
  }
  else
  {
      echo "<script>alert('用户名或密码有误！')</script>";
  }

?>