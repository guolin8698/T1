<?php
//echo json_encode($_POST);
require_once('connect.php');
//if ( isset($_POST['name']) && isset($_POST['password']) ){//如果用户名和密码都不为空
 
$name = $_POST['name'];
 
//$password = md5(trim($_POST['password']));
 
$sql = " SELECT username FROM adminuser where username ='$name' limit 1  ";
	//$sql = " SELECT id, username, password,limits FROM adminuser WHERE username = '$name' AND password = '$password' LIMIT 1";

$result = mysqli_query( $conn , $sql );//执行sql 用户名和密码
 
$userlist = mysqli_num_rows( $result );
//$userlist=['peter','jack','mike','lin'];
//$user=isset($_POST['name'])?$_POST['name']:'';
if ($userlist==1){echo '1';}else{echo '0';}
//echo in_array($user,$userlist)?1:0;
//
	?>