<?php
include 'connect.php';
 include 'checklog.php';
$spnumber = trim($_POST['spnumber']);
/*
if ($ulimits==1){$count_sql = "select count(id) as c from userdata";} else {
$count_sql = "select count(id) as c from userdata where limits = '$ulimits'";}
*/
$count_sql = "select count(id) as c from userdata";

$result = mysqli_query($conn, $count_sql);

$data = mysqli_fetch_assoc($result);

//得到总的用户数
$count = $data['c'];

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;


$num = 10;

//得到总页数
$total = ceil($count / $num);

if ($page <= 1) {
 $page = 1;
}

if ($page >= $total) {
 $page = $total;
}


$offset = ($page - 1) * $num;

$sql = "select 
	 id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd,limits,czy 
	from
	userdata
	where pnumber = '$spnumber'  
		";


$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result)) {



 echo '<table width="1000" border="1" >';
//echo '<h3<caption>红包统计信息</caption></h2>';
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
	//echo'<th>跟踪进度</th>';
	echo'<th>录单人员</th>';
	echo'<th></th>';
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
	  else {echo '<td></td>';}
      //echo '<td>' . $row['createtime'] . '</td>';
      echo '<td>' . $row['qdname'] . '</td>';
	  echo '<td>' . $row['username'] . '</td>';
 //echo '<td>' . date('Y年m月d日', $row['createtime']) . '</td>';
      echo '<td>' . $row['pnumber'] . '</td>';
      echo '<td>' . $row['wechat'] . '</td>';
      echo '<td>' . $row['project'] . '</td>';
      echo '<td>' . $row['jdy'] . '</td>';
	  echo '<td>' . $row['login'] . '</td>';
	  //echo '<td>' . $row['description'] . '</td>';
	  //echo '<td>' . $row['gzjd'] . '</td>';
	  echo '<td>' . $row['czy'] . '</td>';
	   echo '<td><input id='. $row['id'] .' type="button" value="编辑数据"   data-toggle="modal" data-target=".bs-example-modal-lg" onclick="etest(this.id)"></td>';
	  echo '<td><input id='. $row['id'] .' type="button" value="查看详情"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="ldesc(this.id)"></td>';
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
 
	
	echo '0';
	}
?>
 







































