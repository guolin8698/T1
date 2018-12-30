<?php
include 'config.php';
/*$nameErr="";
if (empty($_POST['name'])) {
     $nameErr = "请填写姓名";
	echo $nameErr;
   } else {
     $username = trim($_POST['name']);
     // 检查姓名是否包含字母和空白字符
     if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
       $nameErr = "只允许字母和空格"; 
		 echo $nameErr;
     }
*/

if (empty($_POST['name'])){ 
	echo "<script>
alert('姓名不能为空，请填写姓名');
setTimeout(function(){window.location.href='login.html';},300);
</script>";
 exit;  
	 }

if (trim($_POST['password']) != trim($_POST['repassword'])) {

 echo "<script>
alert('两次密码输入不一致，请返回重新填写');
setTimeout(function(){window.location.href='login.html';},300);
</script>";
exit;
}


$username = trim($_POST['name']);
$password = md5(trim($_POST['password']));

//$time = time();

//$ip = $_SERVER['REMOTE_ADDR'];

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD);

//如果有错误，存在错误号
if (mysqli_errno($conn)) {

 echo mysqli_error($conn);

 exit;
}

mysqli_select_db($conn, DB_NAME);

mysqli_set_charset($conn, DB_CHARSET);
//$sql="select count(*) username from adminuser where username='$username'";
$sql="select username from adminuser where username='$username'"; 
// echo $sql; 
$query = mysqli_query($conn,$sql); 
$rows = mysqli_num_rows($query); 
if($rows>0){
//if($rows['username'] != 0){ 
echo "<script type='text/javascript'> alert('用户名已存在,请重新注册');location='javascript:history.back()';</script>"; 
}else
{   
	
     $Nid = date("his").round(100,999)+123; 	
	//$Nid = md5(time() . mt_rand(1,1000000));
	$sql = "insert into adminuser(id,username,password) values('". $Nid ."','" . $username . "','" . $password . "')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
 echo '成功';
} else {
 echo '失败';

}
/*$user_in = "insert into user_info (username,pass,sex,qq,email,img) values ('$_POST[username]',md5('$_POST[pass]'),'$_POST[sex]','$_POST[qq]','$_POST[email]','$_POST[img_select]')"; 
//echo $user_in; 
mysql_query($user_in);
*/
echo "<script type='text/javascript'>alert('注册成功！！');location.href='login.html';</script>"; 
} 
//javascript:history.go(-1) 
 





/*
if ($result) {
 echo '成功';
} else {
 echo '失败';

}
echo "<script>
alert('注册成功,请返回登录');
setTimeout(function(){window.location.href='login.html';},1000);
</script>";
//echo '当前用户插入的ID为' . mysqli_insert_id($conn);
*/
mysqli_close($conn);
?>
