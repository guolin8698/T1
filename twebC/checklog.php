<?php  
if (!session_id()) session_start();
//session_start();  

   
//检测是否登录，若没登录则转向登录界面  

 if(!isset($_SESSION['limits']) || empty($_SESSION['name']) ){ //|| empty($_SESSION['limits'])) {  

    //echo " <script>location.href='npage.php'; </script>";
	echo " <script>alert('未登录，请返回登录页面！');location.href='login.html'; </script>";
	//header("Location:login.html");  

    exit();  

}  

$ulimits = $_SESSION['limits'];
$uname = $_SESSION['name'];
/*switch ($_SESSION['limits']){
	case 2;
   $tname = 'user';
   break;
case 3;
$tname = 'usera';
break;
case 4;
$tname ='userb';
break;
}*/


//elseif (!isset($_SESSION['id']) || empty($_SESSION['name'])  ) {}


//包含数据库连接文件  

//include('connect.php');  

//$userid = $_SESSION['id'];  

//$username = $_SESSION['name'];  

//$user_query = mysql_query("select * from user_list where userid = '$userid' limit 1");  

//$row = mysql_fetch_array($user_query);  

//exit();
//echo '用户信息：<br />';  

//echo '用户ID：',$userid,'<br />';  

//echo '用户名：',$username,'<br />';  

//echo '<a href="login.php?action=logout">注销</a> 登录<br />';  

?>