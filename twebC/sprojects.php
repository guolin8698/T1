
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/base.css">  -->
  	<link rel="stylesheet" type="text/css" href="css/styepage.css">
	
</head>
<body>

<h6>	
	
<?php
	
include 'connect.php';
	   include 'checklog.php';
	
//if ($_GET){
	
	//goto sresult;
	

//}	
//else{ 


$cproject = $_SESSION['csproject'];


//header("refresh:0;url=searchresult.php");
	

	
	   
	  /* 
	   if ($ulimits==1){$count_sql = "select count(id) as c from userdata where `createtime` >= '$start'  AND `createtime` <= '$end'";} else {
$count_sql = "select count(id) as c from userdata where limits = '$ulimits' AND `createtime` >= '$start'  AND `createtime` <= '$end'";}
	*/
	
	
	$count_sql = "select count(id) as c from userdata where project like '%$cproject%'";

$result = mysqli_query($conn, $count_sql);

$data = mysqli_fetch_assoc($result);

//得到总的用户数
$count = $data['c'];

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;


$num = 10;

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
	
	
	
	
	
	/*
	if ($ulimits==1){$sql = "select 
	 id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd,limits,czy 
	from
	userdata
	where `createtime` >= '$start'  AND `createtime` <= '$end' 
	
	order by id desc limit $offset , $num";}
				 else {$sql = "select 
				 id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd
				 from 
				 userdata 
				 where limits = '$ulimits' AND `createtime` >= '$start'  AND `createtime` <= '$end'
				 order by id desc limit $offset , $num";} 
	*/
	
	
	$sql = "select 
	 id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd,limits,czy 
	from
	userdata
	where project like '%$cproject%'
	
	order by id desc limit $offset , $num";
$result = mysqli_query($conn, $sql);
	

		
	
	
	
//
if ($result && mysqli_num_rows($result)) {

 



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
	//echo'<th>备注</th>';
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
	 if (!empty($row['createtime'])){
	  echo '<td>' . date('Y年m月d日', $row['createtime']) . '</td>';}
      //echo '<td>' . $row['createtime'] . '</td>';
      echo '<td>' . $row['qdname'] . '</td>';
	  echo '<td>' . $row['username'] . '</td>';
 //echo '<td>' . date('Y年m月d日', $row['createtime']) . '</td>';
      echo '<td>' . $row['pnumber'] . '</td>';
      echo '<td>' . $row['wechat'] . '</td>';
      echo '<td>' . $row['project'] . '</td>';
      echo '<td>' . $row['jdy'] . '</td>';
	  echo '<td>' . $row['login'] . '</td>';
	 // echo '<td>' . $row['description'] . '</td>';
	  echo '<td>' . $row['gzjd'] . '</td>';
	  echo '<td>' . $row['czy'] . '</td>';
	  //echo '<td><input type="button" value="编辑数据" onclick="showedit();"></td>';
	   //echo '<td><a href="edit.php?id=' . $row['id'] . '">编辑数据</a></td>';
	   echo '<td><input id='. $row['id'] .' type="button" value="编辑数据"   data-toggle="modal" data-target=".bs-example-modal-lg" onclick="etest(this.id)"></td>';
	  echo '<td><input id='. $row['id'] .' type="button" value="查看详情"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="ldesc(this.id)"></td>';
	  echo '</tr>';
 }

 echo '<tr><td colspan="14"><input id='. 1 .' type="button" value="首页" onclick="spropage(this.id)"> <input id='. ($page - 1) .' type="button" value="上一页" onclick="spropage(this.id)"> <input id='. ($page + 1) .' type="button" value="下一页" onclick="spropage(this.id)">  <input id=' . $total . ' type="button" value="尾页" onclick="spropage(this.id)"> 当前是第 ' . $page . '页 共' . $total . '页   总计：'.$count.'条记录 </td></tr>';
	//if ($_SESSION['limits']==1){
//echo '<tr><td align="right" colspan="10" ><input type="submit" value="选择删除" /></td></tr>';
//echo '<tr><td align="right" colspan="10" ><a href="useredit.php"><input type="button" value="用户管理" /></a></td></tr>';	
	//echo '</form>';
//	}
 echo '</table><br />';

} 

	else {
 		echo "没有对应数据,请重新选择日期查询";
}
 //}
?>
</h6>

	

</body>
</html>
	
	
	
	
	
<?php


mysqli_close($conn);

?>	