<?php
session_start();
include 'connect.php';

include 'checklog.php';
//if ( !empty($_POST['createtime']) ){//如果用户名和密码都不为空
if ( !empty($_POST['createtime']) && !empty($_POST['endtime']) ){

$_SESSION['createtime'] = strtotime( $_POST['createtime'] );
//$start = date('Y-m-d 00:00:00',$_POST['createtime']);
$_SESSION['endtime'] = strtotime($_POST['endtime'])+60*60*24*1;
	//$end =  date("Y-m-d H:i:s A",(strtotime($_POST['endtime']+60*60*24*3)));
//$end =  date('Y-m-d H:i:s',$_POST['endtime']);	
//exit;
header("refresh:0;url=searchresult.php");
}

else{
	echo "<script>
alert('没有选择日期,请选择日期');
setTimeout(function(){window.location.href='page.php';},1000);
</script>";
exit;
}
	
//找session
// if (empty($_SESSION['name']) && isset($_SESSION['id']))
//{ 
//echo " <script>alert('未登录，请返回登录页面！');location.href='login.html'; </script>"; 
//exit;
//}
//if (empty($_session["admin"])){
	//header("location:login.html");
//}
//else{
?>

