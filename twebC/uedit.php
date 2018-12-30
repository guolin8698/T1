<?php

session_start();
//if (is_numeric($_GET['id'])) {

  // $id = (int) $_GET['id'];

//}
include 'connect.php';
include 'checklog.php';
if (!$_SESSION['limits']==1){
	echo " <script>alert('未登录，请返回登录页面！');location.href='login.html'; </script>";
							 exit();
}
//if (is_array($_POST['id'])){
//$id = join(',', $_POST['id']);
//}elseif(is_numeric($_GET['id'])){
 //$id = (int) $_GET['id'];} 
//else{
 //echo '数据不合法';
 //exit;
//}

//$sql = "select id,username,pnumber,descrption from user where id=".$id;

//$result = mysqli_query($conn, $sql);

//$dataa = mysqli_fetch_assoc($result);


if (is_numeric($_GET['id'])) {

   $id = (int) $_GET['id'];

}

/*
if ($ulimits==1){ $sql = "select id,username,password,address,createtime,description from user where id = " . $id;}
else{ $sql = "select id,username,pnumber,address,createtime,description from user  where limits = '$ulimits' and id = " . $id;}

/*
switch ($_SESSION['limits']){
		case 2;
$sql = "select id,username,pnumber,address,description from user where id = " . $id;
break;
		case 3;
$sql = "select id,username,pnumber,address,description from usera where id = " . $id;
break;
		case 4;
$sql = "select id,username,pnumber,address,description from userb where id = " . $id;
break;}*/
//$sql = "select id,username,pnumber,address,description from user  where limits = '$ulimits' and id = " . $id;
//$sql = "select id,username,pnumber,address,description from user id = " . $id;
$sql = "select id,username,password from adminuser where id = " . $id;
$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_assoc($result);

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/base.css">  -->
    <link rel="stylesheet" type="text/css" href="css/b_login.css">
	</head>
<body>
	<div class="login">
	<div class="loginmain">
<form action="uupdate.php" method="post">
<div class="col-lg-4">	
  <h2> 用户名：<input type="text" name="username" value="<?php echo $data['username'];?>"class="form-control"></h2><br />
</div><div class="col-lg-4">	
  <h2> 密  码：<input type="text" name="password" class="form-control"><br /></h2></div>
   <input type="hidden" value="<?php echo $data['id'];?>" name="id" />
   <div class="col-lg-5 ">
   <input type="submit" value="确定修改"class="btn btn-danger btn-lg"></div>

</form>
</div>
		</div>
	<script src="./public/js/jquery-3.1.1.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./public/js/delaunay.js"></script>
<script src="./public/js/TweenMax.js"></script>
<script src="js/effect.js"></script>
</body>
</html>
		<?php

mysqli_close($conn);

?>