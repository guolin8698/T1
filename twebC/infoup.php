<?php 
session_start();
include 'connect.php';
include 'checklog.php';
//if (!empty($_POST['createtime'])&& !empty($_POST['qdname'])&& !empty($_POST['username'])&& !empty($_POST['pnumber']) ){

$createtime = strtotime($_POST['createtime']);
$qdname = $_POST['qdname'];
$gname = $_POST['username'];	
$pnumber = $_POST['pnumber'];
$wechat = $_POST['wechat'];
$project = $_POST['project'];
$jdy = $_POST['jdy'];
$login = $_POST['login'];
//$description = $_POST['description'];
//$gzjd = $_POST['gzjd'];
//$conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD);
//}
//else {
	
//	echo " <script>alert('录入信息不完整,请返回上一页！');location.href='page.php'; </script>";
	
//	exit();
//}



//如果有错误，存在错误号
//if (mysqli_errno($conn)) {

   //echo mysqli_error($conn);

 //  exit;
//}

//mysqli_select_db($conn, DB_NAME);

//mysqli_set_charset($conn, DB_CHARSET);
$sql="select pnumber from userdata where pnumber='$pnumber'"; 
// echo $sql; 
$query = mysqli_query($conn,$sql); 
$rows = mysqli_num_rows($query); 
if($rows>0){
//if($rows['username'] != 0){ 
echo 0;
	//echo '此手机号已提交过，请重新输入！！！'; 
	exit();
}
else
 {	
/*
switch($_SESSION['limits']){
case 2;
$sql = "insert into user(username,pnumber,address,createtime,createip) values('$username','$pnumber','$addr','$time','$ip')";
break;
case 3;
$sql = "insert into usera(username,pnumber,address,createtime,createip) values('$username','$pnumber','$addr','$time','$ip')";
break;
case 4;
$sql = "insert into userb(username,pnumber,address,createtime,createip) values('$username','$pnumber','$addr','$time','$ip')";
}*/
$sql = "insert into userdata(createtime,qdname,username,pnumber,wechat,project,jdy,login,limits,czy)values('$createtime','$qdname','$gname','$pnumber','$wechat','$project','$jdy','$login','$ulimits','$uname')";
//}
$result = mysqli_query($conn, $sql);}

if ($result) {
  
	//if ($ulimits==1){$count_sql = "select count(id) as c from userdata";} 	else {$count_sql = "select count(id) as c from userdata where limits = '$ulimits'";}
$count_sql = "select count(id) as c from userdata";
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
/*if ($ulimits==1){$sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,gzjd,limits,czy from userdata  where pnumber='$pnumber' order by id desc limit $offset , $num";} else {$sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,gzjd,limits,czy  from userdata where pnumber='$pnumber' and limits = '$ulimits' order by id desc limit $offset , $num";} */
			
$sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,gzjd,limits,czy from userdata  where pnumber='$pnumber' order by id desc limit $offset , $num";	
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result)) {

 //存在数据则循环将数据显示出来
//if ($_SESSION['limits']==1){echo '<form action="delete.php" method="post">';}
    echo '<table id="table" width="1000" border="1" >';
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
	  //echo '<td>' . $row['description'] . '</td>';
	  //echo '<td>' . $row['gzjd'] . '</td>';
	  echo '<td>' . $row['czy'] . '</td>';
	echo '<td><input id='. $row['id'] .' type="button" value="编辑数据"   data-toggle="modal" data-target=".bs-example-modal-lg" onclick="etest(this.id)"></td>';
	  echo '<td><input id='. $row['id'] .' type="button" value="查看详情"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="ldesc(this.id)"></td>';
	  echo '</tr>';
 }

 echo '<tr><td colspan="14"><input id='. 1 .' type="button" value="首页" onclick="upage(this.id)"> <input id='. ($page - 1) .' type="button" value="上一页" onclick="upage(this.id)"> <input id='. ($page + 1) .' type="button" value="下一页" onclick="npage(this.id)">  <input id=' . $total . ' type="button" value="尾页" onclick="upage(this.id)"> 当前是第 ' . $page . '页 共' . $total . '页 </td></tr>';
	//if ($_SESSION['limits']==1){
//echo '<tr><td align="right" colspan="10" ><input type="submit" value="选择删除" /></td></tr>';
//echo '<tr><td align="right" colspan="10" ><a href="useredit.php"><input type="button" value="用户管理" /></a></td></tr>';	
	//echo '</form>';
//	}
 echo '</table><br />';

} 
	
	
	
	
	
	
  	//echo "<script>
//setTimeout(function(){window.location.href='page.php';},300);
//</script>";
	//echo '当前用户插入的ID为' . mysqli_insert_id($conn);	
} else {
   echo '失败';

}
mysqli_close($conn);


//echo "<script>
	//setTimeout(function(){window.location.href='page.php';},1000);
      //                </script>";



//echo "
//<script>
//function close_main(){
  //          window.opener=null;
    //        window.open('','_self');
      //      window.close();
        //} 

//echo '<script>window.close();</script>';		


//echo "<script type='text/javascript'>
//window.open("close.html", '_self');
//window.close();
//	</script>";

?>