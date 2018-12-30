
<!DOCTYPE html>
<!--<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/base.css">  
    <link rel="stylesheet" type="text/css" href="css/b_login.css">
	<link rel="stylesheet" type="text/css" href="css/styepage.css">
	
</head>
<body>

<div class="login">
   <div class="loginmain">
	  <img src="images/Klogo.png" width="48" height="64"><br ;/>
	   
	 <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理系统</h2>	
	
	<!-- <input type="button" value="导出当前数据至EXCEL" class="btn btn-danger " onClick="javascript:location.href='downsexcel.php'" />
   </h4></div> 
	 <div class="col-lg-6">
	   <h4>
     <input type="button" value="返回主页" class="btn btn-danger" onClick="javascript:location.href='page.php'" />
   </h4></div>-->
	
	
	
	
	
	
	
<?php
include 'connect.php';
	   include 'checklog.php';
	//if(!empty($_POST['spnumber'])) {
	 //  $spnumber = trim($_POST['spnumber']);
	//}
	 //  else{
		 //  echo " <script>alert('信息不完整,请返回上一页,重新输入');location.href='page.php'; </script>";
	
	//exit();
	 //  }
$spnumber = trim($_POST['spnumber']);
	  // if ($ulimits==1){$count_sql = "select count(id) as c from userdata where `pnumber` = '$spnumber' ";} else {

		//  $count_sql = "select count(id) as c from userdata where limits = '$ulimits' AND `pnumber` = '$spnumber' ";}
$count_sql = "select count(id) as c from userdata where `pnumber` = '$spnumber' ";
$result = mysqli_query($conn, $count_sql);

$data = mysqli_fetch_assoc($result);

//得到总的用户数
$count = $data['c'];

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

/*
if (isset($_GET['page'])) {
 $page = (int) $_GET['page'];
} else {
 $page = 1;
}
*/

//每页显示数

$num = 15;

//得到总页数
$total = ceil($count / $num);

if ($page <= 1) {
 $page = 1;
}

if ($page >= $total) {
 $page = $total;
}


$offset = ($page - 1) * $num;
/*if ($ulimits==1){$sql = "select id,username,pnumber,address,createtime,createip,description from user  order by id desc limit $offset , $num";}
				 else {$sql = "select id,username,pnumber,address,createtime,createip from user where limits = '$ulimits' order by id desc limit $offset , $num";} */
	
	
	
	
	
	
	if ($ulimits==1){$sql = "select 
	 id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd,limits,czy 
	from
	userdata
	where `pnumber` = '$spnumber'   
	
	order by id desc limit $offset , $num";}
				 else {$sql = "select 
				 id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd
				 from 
				 userdata 
				 where limits = '$ulimits' AND `pnumber` = '$spnumber'
				 order by id desc limit $offset , $num";} 
	/*switch($_SESSION['limits']){
		case 2;

$sql = "select id,username,pnumber,address,createtime,createip,description from user order by id desc limit $offset , $num";
break;
		case 3;
		$sql = "select id,username,pnumber,address,createtime,createip,description from usera order by id desc limit $offset , $num";
		break;
		case 4;
		$sql = "select id,username,pnumber,address,createtime,createip,description from userb order by id desc limit $offset , $num";
}*/
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result)) {

 //存在数据则循环将数据显示出来

/*echo '<table width="1000" border="1" >';
//echo '<h3<caption>红包统计信息</caption></h2>';
echo '<th>编号</th>';
 echo'<th>姓名</th>';
 echo'<th>手机号</th>';
	echo'<th>扫粉地段</th>';
 echo'<th>提交日期</th>';
 echo'<th>IP地址</th>';
 if ($_SESSION['limits']==1) { 
	echo'<th>操作员</th>';
 
 echo'<th></th>';
 echo'<th></th>';
 
}
  while ($row = mysqli_fetch_assoc($result)) {
 echo '<tr>';
 echo '<td>' . $row['id'] . '</td>';	 
 echo '<td>' . $row['username'] . '</td>';
 echo '<td>' . $row['pnumber'] . '</td>';
	  echo '<td>' . $row['address'] . '</td>';
 echo '<td>' . date('Y年-m月-d日', $row['createtime']) . '</td>';
 echo '<td>' . $row['createip'] . '</td>';
 	 
if ($ulimits==1) { 
 echo '<td>' . $row['description'] . '</td>';
 echo '<td><a href="edit.php?id=' . $row['id'] . '">编辑用户</a></td>';
 echo '<td><a href="delete.php?id=' . $row['id'] . '">删除用户</a></td>';
}

	  echo '</tr>';
 }

 echo '<tr><td colspan="9"><a href="searchresult.php?page=1">首页</a> <a href="searchresult.php?page=' . ($page - 1) . '">上一页</a> <a href="searchresult.php?page=' . ($page + 1) . '">下一页</a> <a href=searchresult.php?page=' . $total . '">尾页</a> 当前是第 ' . $page . '页 共' . $total . '页 </td></tr>';

 echo '</table><br />';*/

	echo '<table width="1000" border="1" >';
//if ($_SESSION['limits']==1){echo '<th>选择</th>';	}
    echo '<th>编号</th>';
    echo'<th>日期</th>';
    echo'<th>渠道名称</th>';
    echo'<th>顾客姓名</th>';
    echo'<th>手机号</th>';
	echo'<th>微信号</th>';
	echo'<th>咨询项目</th>';
	echo'<th>接待员</th>';
	echo'<th>上门情况</th>';
	echo'<th>备注</th>';
	echo'<th>跟踪进度</th>';
	echo'<th>录单人员</th>';
	echo'<th></th>';
	
 //if ($_SESSION['limits']==1) { 
	//echo'<th>员工姓名</th>';
 
// echo'<th></th>';
 //echo'<th></th>';
 
//}
  while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
//if ($_SESSION['limits']==1)	{  echo '<td><input type="checkbox" name="id[]" value="' . $row['id'] . '" /></td>';}
 //echo '<td><input type="checkbox" name="id[]" value="' . $row['id'] . '" /></td>';
      echo '<td>' . $row['id'] . '</td>';	 
	  echo '<td>' . date('Y年m月d日', $row['createtime']) . '</td>';
      //echo '<td>' . $row['createtime'] . '</td>';
      echo '<td>' . $row['qdname'] . '</td>';
	  echo '<td>' . $row['username'] . '</td>';
 //echo '<td>' . date('Y年m月d日', $row['createtime']) . '</td>';
      echo '<td>' . $row['pnumber'] . '</td>';
      echo '<td>' . $row['wechat'] . '</td>';
      echo '<td>' . $row['project'] . '</td>';
      echo '<td>' . $row['jdy'] . '</td>';
	  echo '<td>' . $row['login'] . '</td>';
	  echo '<td>' . $row['description'] . '</td>';
	  echo '<td>' . $row['gzjd'] . '</td>';
	  echo '<td>' . $row['czy'] . '</td>';
	  //echo '<td><input type="button" value="编辑数据" onclick="showedit();"></td>';
	   echo '<td><a href="edit.php?id=' . $row['id'] . '">编辑数据</a></td>';
	  echo '</tr>';
 }

 echo '<tr><td colspan="14"><a href="page.php?page=1">首页</a> <a href="page.php?page=' . ($page - 1) . '">上一页</a> <a href="page.php?page=' . ($page + 1) . '">下一页</a> <a href="page.php?page=' . $total . '">尾页</a> 当前是第 ' . $page . '页 共' . $total . '页 </td></tr>';
	//if ($_SESSION['limits']==1){
//echo '<tr><td align="right" colspan="10" ><input type="submit" value="选择删除" /></td></tr>';
//echo '<tr><td align="right" colspan="10" ><a href="useredit.php"><input type="button" value="用户管理" /></a></td></tr>';	
	//echo '</form>';
//	}
 echo '</table><br />';
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
} 

	else {
 		echo "<script>
alert('没有对应数据,请检查你输入的号码是否正确');
setTimeout(function(){window.location.href='page.php';},3000);
</script>";
}
?>
<!--<div class="col-lg-6">
   <h3>
     <input type="button" value="退出登录" class="btn btn-danger" onClick="javascript:location.href='logout.php'" />
	      </h3>	
	   
<script src="./public/js/jquery-3.1.1.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./public/js/delaunay.js"></script>
<script src="./public/js/TweenMax.js"></script>
<script src="js/effect.js"></script>
	

</body>
</html>-->
	
	
	
	
	
<?php


mysqli_close($conn);

?>	