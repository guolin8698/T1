<?php
session_start();
header("Content-Type: text/html; charset=utf8");
//if( !isset($_POST["submit"]) ){
//die("错误执行");
//}//检测是否有submit操作
 
require_once('connect.php');//链接数据库
 
if ( isset($_POST['name']) && isset($_POST['password']) ){//如果用户名和密码都不为空
 
$name = $_POST['name'];
 
$password = md5(trim($_POST['password']));
 
$sql = " SELECT id, username, password,limits FROM adminuser WHERE username = '$name' AND password = '$password' LIMIT 1";
 
$result = mysqli_query( $conn , $sql );//执行sql 用户名和密码
 
$rows = mysqli_num_rows( $result );//返回用户名密码是否存在
 
if( $rows != 0 ){
 

 
while( $rows_other = mysqli_fetch_assoc($result) ){
 
    $_SESSION['id'] = $rows_other['id'];
	$_SESSION['name'] = $name;
    $_SESSION['limits'] = $rows_other['limits'];
}
 
header("refresh:0;url=page.php");//跳转至welcome.html页面
 
exit;
 
}else{
 
echo "用户名或密码错误";
 
echo "<script>
alert('用户名或密码错误');
setTimeout(function(){window.location.href='login.html';},800);
</script>";
 exit;
}
 
}else{
 
echo "表单填写不完整(用户名或密码为空)";
 
echo "<script>
alert('表单填写不完整');
setTimeout(function(){window.location.href='login.html';},800);
</script>";
 exit;
}
?>