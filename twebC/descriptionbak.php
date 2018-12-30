<?php

session_start();
//if (is_numeric($_GET['id'])) {

  // $id = (int) $_GET['id'];

//}
include 'connect.php';
include 'checklog.php';
if (!$_SESSION['limits']==1){echo " <script>alert('未登录，请返回登录页面！');location.href='login.html'; </script>";}//if (is_array($_POST['id'])){
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
else{
	echo " <script>alert('错误操作！');location.href='page.php'; </script>";
	exit();}
if ($ulimits==1){ $sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd from userdata where id = " . $id;}
else{ $sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd from userdata  where limits = '$ulimits' and id = " . $id;}


//$sql = "select id,username,pnumber,address,description from user  where limits = '$ulimits' and id = " . $id;
//$sql = "select id,username,pnumber,address,description from user id = " . $id;
$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_assoc($result);
if (!empty($data['createtime'])){$sdate=date('Y年m月d日',$data['createtime']);}
$eqdname=$data['qdname'];
$eqdname=preg_replace('|[0-9a-zA-Z/<>=.:_"]+|','',$eqdname); 



?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/base.css">  -->
    <link rel="stylesheet" type="text/css" href="css/b_description.css">
	<link rel="stylesheet" type="text/css" href="css/styepage.css">
	<!--script language="javascript" type="text/javascript" src="./My97DatePicker/WdatePicker.js"></script-->
	
	</head>
<body>
<div class="edit">
  <table border="1" width="1050" >
  <tr><td colspan="4" align="center" style="font-size: 16px">客户资料</td></tr>
		<tr>
    <th>日期</th>
    <th>顾客姓名</th>
	  <th>手机号</th>
	  <th>微信号</th>
  </tr>
  <tr>
    <td><?php echo $sdate?></td>
    <td style="color:green"><?php echo $data['username']?></td>
	   <td><?php echo $data['pnumber']?></td>
	   <td><?php echo $data['wechat']?></td>
  </tr>
	
	<th>渠道名称</th> <td colspan="3"><?php echo $eqdname?></td>	
	<tr><th>咨询项目</th><td colspan="3"><?php echo $data['project']?></td></tr> 
		<tr><th>接单员</th><td colspan="3"><?php echo $data['jdy']?></td></tr> 
		<tr><th>上门情况</th> <td colspan="3"><?php echo $data['login']?></td></tr>
</table>
   	<!--div class="sdesc">
	<table id="sdescription" border="1" width="1050" >
	  <tr><th  valign="top" width="55" >备注：</th><th width="1000" height="100"  valign="top" bgcolor="#C3C498"><?php  

//$sql='select * from comment where sid ='. $id;
//$res=mysqli_query($conn,$sql);
//$array=array();
//while($row=mysqli_fetch_array($res)){ ?>
    <b>//<?php //echo $row['user'] ?></b>"备注:
   <p><?php //echo $row['comment'] ?></p>
	<p>时间<?php// echo date('Y年m月d日', $row['cdate'])?></p>
	<p>------------------------------------------------</p>	  
<?php
//}
?> </th> 
	  </tr>
  </table></div-->
<h4><p style="color:brown">备注信息：</p></h4>
<!--textarea   style= "background:transparent; border-style:none;"  cols="180" rows="10"  readonly -->
	<textarea id="deshow"  style= "background:#ABBB87; border-style:none;"  cols="180" rows="10"  readonly ><?php  

$sql='select * from comment where sid ='. $id;
$res=mysqli_query($conn,$sql);
$array=array();
while($row=mysqli_fetch_array($res)){ ?>
    用户：<?php echo $row['user'] ?>&#10;
	备注:<?php echo $row['comment'] ?>  &#10;
	时间：<?php echo date('Y年m月d日h点m分s秒', $row['cdate'])?>&#10;
	------------------------------------------------&#10;	  
<?php
}
?> </textarea> 
	<h6><span style="vertical-align:top">添加备注：</span>
		<textarea id="description" name="description" cols="80" rows="3"> 
         
      </textarea></h6>
  
	
  <h2><p id="eresult" style="color:chartreuse"></p></h2><h2><p id="erresult" style="color:red"></p></h2>
  
<input id="id" type="hidden" value="<?php echo $data['id'];?>" name="id" />
   <div class="col-lg-5 ">
   <input id="updesc" type="button" value="提交"class="btn btn-danger btn-lg"></div>
	
	
	<script>
	var  updesc = document.getElementById('updesc');
		updesc.onclick = function(){
					var xhr = new XMLHttpRequest();
			
			xhr.onreadystatechange=function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					   if (xhr.responseText==0){
						   var erresult = document.getElementById('erresult');
						  // function ResetText(){
                               
						   //var description =document.getElementById('description');
							   //document.getElementById('description').Value = '';}
						   
						  alert("提交数据为空！！！");
					   }
					else{
						var deshow = document.getElementById('deshow');
											//function ResetText(){
												var description =document.getElementById('description');
                              // document.getElementById('description').Value = '';}
						description.innerHTML="";    
						deshow.innerHTML= "";
					        //description.innerHTML="";    
						deshow.innerHTML=xhr.responseText;
					}
				}
				
			}
		
			var id = document.getElementById('id').value;
			var description = document.getElementById('description').value;
						
			var data='id='+id+'&description='+description; 
			var url='dt.php'; 
			xhr.open('post',url,true);
			
			xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
			
			
						xhr.send(data);
			
			return false;
			//}
			
			//return false;//禁止sumbit提交按钮的默认行为
				
			//return false;
		}
	</script>
	

</div>
	
</body>
	
</html>
		<?php

mysqli_close($conn);

?>