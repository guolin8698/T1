
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
	<?php 
	
	
	include 'connect.php';

include 'checklog.php';	   
	
	
	
$ctstart = strtotime( $_POST['screatetime'] );

$ctend = strtotime($_POST['endtime'])+60*60*24*1-1;

if($ctstart<$ctend){
	
	
	
	$_SESSION['sdtime']= $ctstart;
$_SESSION['sdendtime']=$ctend;	
	

   
		   
		   
$ctmdates= $ctstart;
$ctmdatee= $ctend;	
$tmcount_sql = "select count(id) as c from userdata where `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee' ";
$tmresult = mysqli_query($conn, $tmcount_sql);
$tmdata = mysqli_fetch_assoc($tmresult);
$tmlcount_sql = "select count(login) as l from userdata where login = '1.宏脉' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmlcresult = mysqli_query($conn, $tmlcount_sql);
$tmldata = mysqli_fetch_assoc($tmlcresult);
$tmsmcount_sql = "select count(login) as sm from userdata where login like '%上门%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee' ";
$tmsmresult = mysqli_query($conn, $tmsmcount_sql);
$tmsmdata = mysqli_fetch_assoc($tmsmresult);		   
$tmcjcount_sql = "select count(login) as cj from userdata where login = '3.上门已成交' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmcjresult = mysqli_query($conn, $tmcjcount_sql);
$tmcjdata = mysqli_fetch_assoc($tmcjresult);
		   
$tmcount = $tmdata['c'];
$tmlcount = $tmldata['l'];		   
$tmsmcount = $tmsmdata['sm'];		   
if($tmcount>0){$tmsmlcount = $tmsmcount/$tmcount*100;} else {echo "没有对应数据或日期选择错误,请重新选择日期查询";
	exit;}
$tmcjcount = $tmcjdata['cj'];
if ($tmcount>0) {$tmcjlcount = $tmcjcount/$tmsmcount*100;}	   
	   
	   
	   
	   
	   
	   

	 
	   
	   
	   
	   
	   
	   
	   
$tmqd1count_sql = "select count(qdname) as zx168 from userdata where qdname like '%crm.hyyzx.com%1.整形168(医美汇)%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmqd1cresult = mysqli_query($conn, $tmqd1count_sql);
$tmqd1data = mysqli_fetch_assoc($tmqd1cresult);	 
	   
$tmqd2count_sql = "select count(qdname) as mbw from userdata where qdname like '%ky.meibangzx.com%2.美帮网%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmqd2cresult = mysqli_query($conn, $tmqd2count_sql);
$tmqd2data = mysqli_fetch_assoc($tmqd2cresult);	   
	   
$tmqd3count_sql = "select count(qdname) as alb from userdata where qdname like '%duan.rouwai.com%3.爱丽帮%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmqd3cresult = mysqli_query($conn, $tmqd3count_sql);
$tmqd3data = mysqli_fetch_assoc($tmqd3cresult);	   
	   
	   $tmqd4count_sql = "select count(qdname) as mlwy from userdata where qdname like '%ld.meiliwuyou.cn/admin/yylogin%4.美丽无忧%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmqd4cresult = mysqli_query($conn, $tmqd4count_sql);
$tmqd4data = mysqli_fetch_assoc($tmqd4cresult);
	   
	   $tmqd5count_sql = "select count(qdname) as nem from userdata where qdname like '%hospital.nuomeier.com/Login.aspx/\">%5.诺美尔%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmqd5cresult = mysqli_query($conn, $tmqd5count_sql);
$tmqd5data = mysqli_fetch_assoc($tmqd5cresult);
	   
	   $tmqd6count_sql = "select count(qdname) as mdw from userdata where qdname like '%zm.xhkykt.com/HeadQuarters/HQLogin%6.米多网%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmqd6cresult = mysqli_query($conn, $tmqd6count_sql);
$tmqd6data = mysqli_fetch_assoc($tmqd6cresult);	
	   
	   $tmqd7count_sql = "select count(qdname) as myw from userdata where qdname like '%www.meiyazx.com%7.美丫网%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmqd7cresult = mysqli_query($conn, $tmqd7count_sql);
$tmqd7data = mysqli_fetch_assoc($tmqd7cresult);	   
	   
	   $tmqd8count_sql = "select count(qdname) as hsam from userdata where qdname like '%xt.amlmr.cn%8.韩式爱美%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmqd8cresult = mysqli_query($conn, $tmqd8count_sql);
$tmqd8data = mysqli_fetch_assoc($tmqd8cresult);	   
	  
	   $tmqd9count_sql = "select count(qdname) as um from userdata where qdname like '%crm.youmeiw.com%9.U美-整形驿站%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmqd9cresult = mysqli_query($conn, $tmqd9count_sql);
$tmqd9data = mysqli_fetch_assoc($tmqd9cresult);	   
	   
	   $tmqd10count_sql = "select count(qdname) as zrw from userdata where qdname like '%kf.zhurongwang.com%10.驻容%/爱尚美%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmqd10cresult = mysqli_query($conn, $tmqd10count_sql);
$tmqd10data = mysqli_fetch_assoc($tmqd10cresult);	   
	   
	   $tmqd11count_sql = "select count(qdname) as bm from userdata where qdname like '%www.bemay.net/customer%11.彼美%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmqd11cresult = mysqli_query($conn, $tmqd11count_sql);
$tmqd11data = mysqli_fetch_assoc($tmqd11cresult);	   
	   
	   $tmqd12count_sql = "select count(qdname) as meb from userdata where qdname like '%h.meierbei.com%12.美尔贝%' AND `createtime` >= '$ctmdates'  AND `createtime` <= '$ctmdatee'";
$tmqd12cresult = mysqli_query($conn, $tmqd12count_sql);
$tmqd12data = mysqli_fetch_assoc($tmqd12cresult);	   
	   

	$tmczx168=$tmqd1data['zx168'];   
	$tmcmbw=$tmqd2data['mbw'];   
	$tmcalb=$tmqd3data['alb'];   
	$tmcmlwy=$tmqd4data['mlwy'];   
	$tmcnem=$tmqd5data['nem'];   
	$tmcmdw=$tmqd6data['mdw'];   
	$tmcmyw=$tmqd7data['myw']; 
	$tmchsam=$tmqd8data['hsam'];  
	$tmcum=$tmqd9data['um']; 
	$tmczrw=$tmqd10data['zrw']; 
	$tmcbm=$tmqd11data['bm']; 
	$tmcmeb=$tmqd12data['meb'];
	   	   
	   
	
}
	else{
		echo "没有对应数据或日期选择错误,请重新选择日期查询";
	exit;
	}
	
	
	
	
	
	
	
	
	
	?>

<table border="1" width="100%" >
	<tr><td colspan="12" align="center" style="font-size: 16px">搜索结果统计信息</td></tr> </table>
<table border="0" width="100%" >
	<tr onmouseover="this.style.backgroundColor='rgba(45,183,222,0.6)'" onmouseout="this.style.backgroundColor=''">
	<th align="center" >搜索结果总记录数<td  align="left" style="color:darkorange">总计<?php echo $tmcount ?>条</td></th>
      <th align="center" >搜索结果上门量<td align="left" style="color:darkorange"><?php echo $tmsmcount ?> &nbsp;&nbsp;&nbsp;&nbsp;     </td></th>
	  <th align="center" >搜索结果上门率<td align="left" style="color:darkorange"><?php echo round($tmsmlcount,2) ?>%</td></th>
	  <th align="center" >搜索结果成交量为<td align="left" style="color:darkorange"><?php echo $tmcjcount ?>&nbsp;&nbsp;&nbsp;&nbsp; </td></th>
	  <th align="center" >搜索结果成交率<td align="left" style="color:darkorange"><?php echo round($tmcjlcount,2) ?>%</td></th>
	  <th align="left" >搜索结果宏脉登记<td align="left" style="color:darkorange">总计<?php echo $tmlcount ?>条</td></th>		
</tr>
</table>	   
	   
	    
	   
<table border="0" width="100%" >
	<tr><td colspan="12" align="center" style="font-size: 16px;color:lightblue" >搜索结果三方派单量明细</td></tr> </table>	
	   
	<table border="0" width="100%" >
	<tr onmouseover="this.style.backgroundColor='rgba(45,183,222,0.6)'" onmouseout="this.style.backgroundColor=''">
			
<th align="center" ><td>整形168（医美汇）</td><td style="color:lightgreen">总计<?php echo $tmczx168 ?>单</td></th>
<th align="center" ><td>美帮网</td><td style="color:lightgreen">总计<?php echo $tmcmbw ?>单</td></th>
<th align="center" ><td>爱丽帮</td><td style="color:lightgreen">总计<?php echo $tmcalb ?>单</td></th>
<th align="center" ><td>美丽无忧</td><td style="color:lightgreen">总计<?php echo $tmcmlwy ?>单</td></th>
<th align="center" ><td>诺而美</td><td style="color:lightgreen">总计<?php echo $tmcnem ?>单</td></th>
<th align="center" ><td>米多网</td><td style="color:lightgreen">总计<?php echo $tmcmdw ?>单</td></th>
	
  </tr>	 
<tr  onmouseover="this.style.backgroundColor='rgba(45,183,222,0.6)'" onmouseout="this.style.backgroundColor=''">
<th align="center" ><td>美丫网</td><td style="color:lightgreen">总计<?php echo $tmcmyw ?>单</td></th>
<th align="center" ><td>韩式爱美</td><td style="color:lightgreen">总计<?php echo $tmchsam ?>单</td></th>
<th align="center" ><td>U美-整形驿站</td><td style="color:lightgreen">总计<?php echo $tmcum ?>单</td></th>
<th align="center" ><td>驻容网</td><td style="color:lightgreen">总计<?php echo $tmczrw ?>单</td></th>
<th align="center" ><td>彼美网</td><td style="color:lightgreen">总计<?php echo $tmcbm ?>单</td></th>
<th align="center" ><td>美尔呗</td><td style="color:lightgreen">总计<?php echo $tmcmeb ?>单</td></th>


</tr>
</table>	      	
	
<?php
	
//if ($_GET){
	
	//goto sresult;
	

//}	
//else{ 



//header("refresh:0;url=searchresult.php");
	
if ($ctstart) {
	$start = $ctstart;
	   $end = $ctend;
	   
	   
	   /*if ($ulimits==1){$count_sql = "select count(id) as c from userdata where `createtime` >= '$start'  AND `createtime` <= '$end'";} else {
$count_sql = "select count(id) as c from userdata where limits = '$ulimits' AND `createtime` >= '$start'  AND `createtime` <= '$end'";}*/
$count_sql = "select count(id) as c from userdata where `createtime` >= '$start'  AND `createtime` <= '$end'";
$result = mysqli_query($conn, $count_sql);

$data = mysqli_fetch_assoc($result);

//得到总的用户数
$count = $data['c'];

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;


$num = 50;

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
	
	
	
	
	
	
	/*if ($ulimits==1){$sql = "select 
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
				 order by id desc limit $offset , $num";}*/ 
	$sql = "select 
	 id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd,limits,czy 
	from
	userdata
	where `createtime` >= '$start'  AND `createtime` <= '$end' 
	
	order by id desc limit $offset , $num";
$result = mysqli_query($conn, $sql);
	}

else{
	echo 0;
exit;
}
		
	
	
	
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
       echo '<tr  onmouseover="this.style.backgroundColor=\'rgba(45,183,222,0.6)\'" onmouseout="this.style.backgroundColor=\'\'">';
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
	 // echo '<td>' . $row['gzjd'] . '</td>';
	  echo '<td>' . $row['czy'] . '</td>';
	  //echo '<td><input type="button" value="编辑数据" onclick="showedit();"></td>';
	   //echo '<td><a href="edit.php?id=' . $row['id'] . '">编辑数据</a></td>';
	  echo '<td><input id='. $row['id'] .' type="button" value="编辑数据"   data-toggle="modal" data-target=".bs-example-modal-lg" onclick="etest(this.id)"></td>';
	  echo '<td><input id='. $row['id'] .' type="button" value="查看详情"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="ldesc(this.id)"></td>';
	  echo '</tr>';
 }

 echo '<tr><td colspan="14"><input id='. 1 .' type="button" value="首页" onclick="stnpage(this.id)"> <input id='. ($page - 1) .' type="button" value="上一页" onclick="stnpage(this.id)"> <input id='. ($page + 1) .' type="button" value="下一页" onclick="stnpage(this.id)">  <input id=' . $total . ' type="button" value="尾页" onclick="stnpage(this.id)"> 当前是第 ' . $page . '页 共' . $total . '页    总计：'.$count.'条记录 </td></tr>';
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


	

</body>
</html>
	
	
	
	
	
<?php


mysqli_close($conn);

?>	