<?php

session_start();
//if (is_numeric($_GET['id'])) {

  // $id = (int) $_GET['id'];

//}
include 'connect.php';
include 'checklog.php';
//if (!$_SESSION['limits']==1){echo " <script>alert('未登录，请返回登录页面！');location.href='login.html'; </script>";}//if (is_array($_POST['id'])){
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
   $_SESSION['imgupid']=$id;
}
else{
	echo " <script>alert('错误操作！');location.href='page.php'; </script>";
	exit();}
/*if ($ulimits==1){ $sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd from userdata where id = " . $id;}
else{ $sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd from userdata  where limits = '$ulimits' and id = " . $id;} */

$sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd from userdata where id = " . $id;
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
    <!--link rel="stylesheet" type="text/css" href="css/b_login.css"-->
	<link rel="stylesheet" type="text/css" href="css/styepage.css">
	<!--script language="javascript" type="text/javascript" src="./My97DatePicker/WdatePicker.js"></script-->
	
	</head>
	<script>
function setFile(f1){ 
	var str = f1;
	var n = str.lastIndexOf("/")  //获取斜杠最后一次出现的位置
document.frm.logoImg.value= str.substring(n+1);   
     }
</script>
<body>
<div class="edit">
  <table border="1" width="1050" >
  <tr><td colspan="4" align="center" style="font-size: 16px">客户资料</td></tr>
		<tr>
    <th align="center" >日期</th>
    <th align="center" >顾客姓名</th>
	  <th align="center" >手机号</th>
	  <th align="center" >微信号</th>
  </tr>
  <tr>
    <td  align="center" height="40px" style="color:green"><?php echo $sdate?></td>
    <td  align="center" height="40px" style="color:green"><?php echo $data['username']?></td>
	   <td align="center"  height="40px" style="color:green"><?php echo $data['pnumber']?></td>
	   <td align="center"  height="40px" style="color:green"><?php echo $data['wechat']?></td>
  </tr>
	
	<th height="30px">渠道名称</th> <td   height="30px" style="color:green" colspan="3"><?php echo $eqdname?></td>	
	<tr><th height="30px">咨询项目</th><td  height="30px" style="color:green" colspan="3"><?php echo $data['project']?></td></tr> 
		<tr><th height="30px">接单员</th><td  height="30px" style="color:green" colspan="3"><?php echo $data['jdy']?></td></tr> 
		<tr><th height="30px">上门情况</th> <td height="30px"  style="color:green" colspan="3"><?php echo $data['login']?></td></tr>
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
<h4><p  style="color:brown">备注图片：</p></h4>
		
<?php 
	echo"<lable style='color:brown'>点击图片放大查看</lable><br>";
	$imsql='select * from comment where imgpath !="" AND sid ='. $id;
    $imgres=mysqli_query($conn,$imsql);
	//$deimg=mysqli_fetch_assoc($imgres);	
	while($sdeimg=mysqli_fetch_array($imgres)){
			//$sdeimg=$deimg;
	$imgpath=$sdeimg['imgpath'];
	
	
	
		
 $imgaddu=$sdeimg['user'];
	  //if ($sdeimg['imgpath']>0){
		 // echo "图片上传者：",$sdeimg['user'],"&#10";
		if($sdeimg['imgpath']){ 
		     if($sdeimg['upimgdate']){$upimgdate=$sdeimg['upimgdate'];}
			echo "<img   class='imgsize' style='width:15%;height:15%;' alt='点击放大' src=$imgpath><br>";
			if($sdeimg['user']){echo "<p style='color:chocolate'>此图片由",$imgaddu,"于",$upimgdate,"上传<br> </p>";}
			
			
		}
	  //}
		} 
		
		
	?>	
	
	
	<script>
		var  imgsize = document.getElementsByClassName('imgsize');
		      
		       imgsize[0].onclick=function(){
				   if (imgsize[0].style.height=="15%"&&imgsize[0].style.width=="15%"){
				   imgsize[0].style.height="70%";
				   imgsize[0].style.width="70%";}
				   else{
					   
					    imgsize[0].style.height="15%";
				   imgsize[0].style.width="15%";
				   }
			   }
		 imgsize[1].onclick=function(){
				   if (imgsize[1].style.height=="15%"&&imgsize[1].style.width=="15%"){
				   imgsize[1].style.height="70%";
				   imgsize[1].style.width="70%";}
				   else{
					   
					    imgsize[1].style.height="15%";
				   imgsize[1].style.width="15%";
				   }
			   }
		
		imgsize[2].onclick=function(){
				   if (imgsize[2].style.height=="15%"&&imgsize[2].style.width=="15%"){
				   imgsize[2].style.height="70%";
				   imgsize[2].style.width="70%";}
				   else{
					   
					    imgsize[2].style.height="15%";
				   imgsize[2].style.width="15%";
				   }
			   }
		imgsize[3].onclick=function(){
				   if (imgsize[3].style.height=="15%"&&imgsize[3].style.width=="15%"){
				   imgsize[3].style.height="70%";
				   imgsize[3].style.width="70%";}
				   else{
					   
					    imgsize[3].style.height="15%";
				   imgsize[3].style.width="15%";
				   }
			   }
		imgsize[4].onclick=function(){
				   if (imgsize[4].style.height=="15%"&&imgsize[4].style.width=="15%"){
				   imgsize[4].style.height="70%";
				   imgsize[4].style.width="70%";}
				   else{
					   
					    imgsize[4].style.height="15%";
				   imgsize[4].style.width="15%";
				   }
			   }
		imgsize[5].onclick=function(){
				   if (imgsize[5].style.height=="15%"&&imgsize[5].style.width=="15%"){
				   imgsize[5].style.height="70%";
				   imgsize[5].style.width="70%";}
				   else{
					   
					    imgsize[5].style.height="15%";
				   imgsize[5].style.width="15%";
				   }
			   }
		imgsize[6].onclick=function(){
				   if (imgsize[6].style.height=="15%"&&imgsize[6].style.width=="15%"){
				   imgsize[6].style.height="70%";
				   imgsize[6].style.width="70%";}
				   else{
					   
					    imgsize[6].style.height="15%";
				   imgsize[6].style.width="15%";
				   }
			   }
		imgsize[7].onclick=function(){
				   if (imgsize[7].style.height=="15%"&&imgsize[7].style.width=="15%"){
				   imgsize[7].style.height="70%";
				   imgsize[7].style.width="70%";}
				   else{
					   
					    imgsize[7].style.height="15%";
				   imgsize[7].style.width="15%";
				   }
			   }
		imgsize[8].onclick=function(){
				   if (imgsize[8].style.height=="15%"&&imgsize[8].style.width=="15%"){
				   imgsize[8].style.height="70%";
				   imgsize[8].style.width="70%";}
				   else{
					   
					    imgsize[8].style.height="15%";
				   imgsize[8].style.width="15%";
				   }
			   }
		
		
		</script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<h4><p style="color:brown">备注信息：</p></h4>
<!--textarea   style= "background:transparent; border-style:none;"  cols="180" rows="10"  readonly -->
	<textarea id="deshow"  style= "background:#ffcccc; border-style:none;"  cols="180" rows="7"  readonly ><?php  

$sql='select * from comment where comment !="" AND sid ='. $id;
$res=mysqli_query($conn,$sql);
$array=array();
while($row=mysqli_fetch_array($res)){ ?>
   <?php
	$sdedate = date('Y年m月d日h点m分s秒', $row['cdate']);
     echo  "用户：",$row['user'],"&#10"; //&#10;
	 echo  "备注：",$row['comment'],"&#10" ;  //&#10;
	 echo  "备注添加时间：",$sdedate,"&#10"; //&#10;
	echo "---------------------------------------------&#10";
	?>
<?php
}
?> </textarea> 
	<h6><span style="vertical-align:top">添加备注：</span>
		<textarea id="description" name="description" cols="80" rows="2"> 
         
      </textarea></h6>
  
	
  <h2><p id="eresult" style="color:chartreuse"></p></h2><h2><p id="erresult" style="color:red"></p></h2>
  
<input id="id" type="hidden" value="<?php echo $data['id'];?>" name="id" />
   <div class="col-lg-5 ">
   <input id="updesc" type="button" value="提交"class="btn btn-danger btn-lg"></div>
	<form action="#" method="post"  name="frm">  
      <input name="pic_name" id="logoImg"   type="hidden" size="30"/ >
<label id="upimg" class="btn btn-danger btn-lg" style=" cursor:pointer;color:aqua" onClick="window.open('./upimgt/upload.htm','上传图片','height=600,width=1050,top=200,left=200')">上传图片</label>
</form>
	
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
						    
						deshow.innerHTML= "";
					        //description.innerHTML="";    
						deshow.innerHTML=xhr.responseText;
						description.value="";
						alert("提交成功！！！");
						
						
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