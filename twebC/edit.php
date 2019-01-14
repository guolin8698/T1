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
/*if ($ulimits==1){ $sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd from userdata where id = " . $id;}
else{ $sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd from userdata  where limits = '$ulimits' and id = " . $id;} */
$sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description from userdata where id = " . $id;

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
    <!--link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/base.css">  -->
    <link rel="stylesheet" type="text/css" href="css/edit.css">
	<!--link rel="stylesheet" type="text/css" href="css/styepage.css"-->
	<script language="javascript" type="text/javascript" src="./My97DatePicker/WdatePicker.js"></script>
	
	</head>
<body>
<div class="edit">	 
	 
<form  method="post">
	<h4>日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期:<input type="text" name="" value="<?php echo $sdate;?>" readonly>
		修改为：<input id="createtime" type="Wdate" name="createtime" onClick="WdatePicker()" placeholder="点击选择日期"><span style="color:red;">*</span></h4>
		

   <h4>渠道名称:<input type="text" name="" value="<?php echo $eqdname;?>" readonly>修改为：
	   <select id="qdname" name="qdname">
            <option value="0" selected="selected">选择渠道名称</option>
            <option value='<a target="_blank" href="http://crm.hyyzx.com/">1.整形168(医美汇)</a>'>1.整形168(医美汇)</option>
            <option value='<a target="_blank" href="http://ky.meibangzx.com/">2.美帮网</a>'>2.美帮网</option>
            <option value='<a target="_blank" href="http://duan.rouwai.com/">3.爱丽帮</a>'>3.爱丽帮</option>
            <option value='<a target="_blank" href="http://ld.meiliwuyou.cn/admin/yylogin">4.美丽无忧</a>'>4.美丽无忧</option>
            <option value='<a target="_blank" href="http://hospital.nuomeier.com/Login.aspx/">5.诺美尔</a>'>5.诺美尔</option>
            <option value='<a target="_blank" href="http://zm.xhkykt.com/HeadQuarters/HQLogin">6.米多网</a>'>6.米多网</option>
            <option value='<a target="_blank" href="www.meiyazx.com/">7.美丫网</a>'>7.美丫网</option>
	        <option value='<a target="_blank" href="http://xt.amlmr.cn/">8.韩式爱美</a>'>8.韩式爱美</option>
	        <option value='<a target="_blank" href="http://crm.youmeiw.com/">9.U美-整形驿站</a>'>9.U美-整形驿站</option>
	        <option value='<a target="_blank" href="kf.zhurongwang.com/">10.驻容网/爱尚美</a>'>10.驻容网/爱尚美</option>
	        <option value='<a target="_blank" href="https://www.bemay.net/customer/">11.彼美</a>'>11.彼美</option>
	        <option value='<a target="_blank" href="https://h.meierbei.com/">12.美尔贝</a>'>12.美尔贝</option>
            
            </select><span style="color:red;">*</span></h4>

			
   <h4>顾客姓名:<input id="username" type="text" name="username" value="<?php echo $data['username'];?>" ><span style="color:red;">*</span></h4>

			
   <h4>手&nbsp;&nbsp;机&nbsp;&nbsp;号:<input  id="pnumber" type="text" name="pnumber" value="<?php echo $data['pnumber'];?>"><span style="color:red;">*</span></h4>

		
   <h4>微&nbsp;&nbsp;信&nbsp;&nbsp;号:<input  id="wechat" type="text" name="wechat" value="<?php echo $data['wechat'];?>"></h4>

			
   <h5>咨询项目:&nbsp;&nbsp;&nbsp;&nbsp;<input id="project" type="text" name="project" value="<?php echo $data['project'];?>"></h4>

			
   <h4>接&nbsp;&nbsp;待&nbsp;&nbsp;员:<input type="text" name="" value="<?php echo $data['jdy'];?>" readonly>修改为：
	   <select id="jdy" name="jdy">
            <option value="0" selected="selected">选择接待员</option>
            <option value="中生">1.中生</option>
            <option value="小卫">2.小卫</option>
            <option value="双双">3.双双</option>
	         </select>
	    <span style="color:red;">*</span>
	   </h4>
				
   <h4>上门情况: <input type="text" name="" value="<?php echo $data['login'];?>" readonly>修改为：
	   <select id="login" name="login">
            <option value="0" selected="selected">选择上门情况</option>
            <option value="1.宏脉">1.宏脉</option>
            <option value="2.上门未成交">2.上门未成交</option>
            <option value="3.上门已成交">3.上门已成交</option>
	         <option value="4.无">4.无</option>
	         </select>     <span style="color:red;">*</span>
	   </h4>

		
   <!--h6><label>备&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注:</label>
		<textarea id="description" name="description" cols="30" rows="4"> 
         
      </textarea></h6-->
		
			
   <!--h6>跟踪进度:<input id="gzjd" type="text" name="gzjd" value=""></h6-->
<h4><span style="color:red;">注意 红色 “*”星号项为必选，必填项否则无法修改</span></h4>
	<h2><p id="eresult" style="color:chartreuse"></p></h2><h2><p id="erresult" style="color:red"></p></h2>
	<!--		
<div class="col-lg-4">	
  <h2> 用户名：<input type="text" name="username" value="<?php// echo $data['username'];?>"class="form-control" readonly></h2><br />
</div><div class="col-lg-4">	
  <h2> 手机号：<input type="text" name="pnumber" value="<?php //echo $data['pnumber'];?>"class="form-control"><br /></h2></div>
	<div class="col-lg-4">	
  <h2> 地  点：<input type="text" name="address" value="<?php// echo $data['address'];?>"class="form-control"></h2><br />
</div>
	<div class="col-lg-4"><h2>	
   操作员：<input type="text" name="description" value="<?php //echo $data['description'];?>"class="form-control" readonly></h2><br /></div>-->
	   <input id="id" type="hidden" value="<?php echo $data['id'];?>" name="id" />
   <div class="col-lg-5 ">
   <input id="eup" type="button" value="提交"class="btn btn-danger btn-lg"></div>
	
	<script>
	var eup = document.getElementById('eup');
		eup.onclick = function(){
		
			var xhr = new XMLHttpRequest();
			
			xhr.onreadystatechange=function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					if (xhr.responseText==0){
						//var eresult = document.getElementById('eresult');
						    //eresult.innerHTML="数据修改成功！！！";
						    alert("数据修改成功");
					}
					else{
						var erresult = document.getElementById('erresult');
						erresult.innerHTML= "数据修改失败！！！";
					
				}
				}
				
			}
		
			var id = document.getElementById('id').value;
			var createtime = document.getElementById('createtime').value;
			var qdname= document.getElementById('qdname').value;
			var username= document.getElementById('username').value;
			var pnumber= document.getElementById('pnumber').value;
			var wechat= document.getElementById('wechat').value;
			var project= document.getElementById('project').value;
			var jdy= document.getElementById('jdy').value;
			var login= document.getElementById('login').value;
			//var description= document.getElementById('description').value;
			//var gzjd= document.getElementById('gzjd').value;
			
			var data='id='+id+'&createtime='+createtime+'&qdname='+qdname+'&username='+username+'&pnumber='+pnumber+'&wechat='+wechat+'&project='+project+'&jdy='+jdy+'&login='+login; 
			var url='update.php'; 
			xhr.open('post',url,true);
			
			xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
			
			
			
			xhr.send(data);
			
			return false;
			//}
			
			//return false;//禁止sumbit提交按钮的默认行为
				
			//return false;
		}
	</script>
	

</form>
 </div>
	
</body>
	
</html>
		<?php

mysqli_close($conn);

?>