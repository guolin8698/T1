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
    <link rel="stylesheet" type="text/css" href="css/b_login.css">
	<link rel="stylesheet" type="text/css" href="css/styepage.css">
	<script language="javascript" type="text/javascript" src="./My97DatePicker/WdatePicker.js"></script>
	</head>
<body>
	 
	 
<form  method="post">
	<h6>日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期:<input type="text" name="" value="<?php echo $sdate;?>" readonly>
		修改为：<input id="createtime" type="Wdate" name="createtime" onClick="WdatePicker()" placeholder="点击选择日期"><span style="color:red;">*</span></h6>
		<br>

   <h6>渠道名称:<input type="text" name="" value="<?php echo $eqdname;?>" readonly>修改为：
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
	        <option value='<a target="_blank" href="kf.zhurongwang.com/">10.驻容/爱尚美</a>'>10.驻容/爱尚美</option>
	        <option value='<a target="_blank" href="https://www.bemay.net/customer/">11.彼美</a>'>11.彼美</option>
	        <option value='<a target="_blank" href="https://h.meierbei.com/">12.美尔贝</a>'>12.美尔贝</option>
            
            </select><span style="color:red;">*</span></h6>
<br>
			
   <h6>顾客姓名:<input id="username" type="text" name="username" value="<?php echo $data['username'];?>" ><span style="color:red;">*</span></h6>
<br>
			
   <h6>手&nbsp;&nbsp;机&nbsp;&nbsp;号:<input  id="pnumber" type="text" name="pnumber" value="<?php echo $data['pnumber'];?>"><span style="color:red;">*</span></h6>
<br>
		
   <h6>微&nbsp;&nbsp;信&nbsp;&nbsp;号:<input  id="wechat" type="text" name="wechat" value="<?php echo $data['wechat'];?>"></h6>
<br>
			
   <h6>咨询项目:<input id="project" type="text" name="project" value="<?php echo $data['project'];?>"></h6>
<br>
			
   <h6>接&nbsp;&nbsp;待&nbsp;&nbsp;员:<input type="text" name="" value="<?php echo $data['jdy'];?>" readonly>修改为：
	   <select id="jdy" name="jdy">
            <option value="0" selected="selected">选择接待员</option>
            <option value="中生">1.中生</option>
            <option value="小卫">2.小卫</option>
            <option value="双双">3.双双</option>
	         </select>
	    <span style="color:red;">*</span>
	   </h6>
	<br>
			
   <h6>上门情况: <input type="text" name="" value="<?php echo $data['login'];?>" readonly>修改为：
	   <select id="login" name="login">
            <option value="0" selected="selected">选择上门情况</option>
            <option value="1.宏脉">1.宏脉</option>
            <option value="2.上门未成交">2.上门未成交</option>
            <option value="3.上门已成交">3.上门已成交</option>
	         <option value="4.无">4.无</option>
	         </select>     <span style="color:red;">*</span>
	   </h6>
<br>
		
   <h6><label>备&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注:</label>
		<textarea id="description" name="description" cols="30" rows="4"> 
         
      </textarea></h6>
	<br>	
			
   <h6>跟踪进度:<input id="gzjd" type="text" name="gzjd" value="<?php echo $data['gzjd'];?>"></h6>
<h3><span style="color:red;">注意 红色 “*”星号项为必选，必填项否则无法修改</span></h3>
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

</form>
<p id="eresult"></p>
	
</body>
	<script>
	var eup = document.getElementById('eup');
		eup.onclick = function(){
		//1，创建AJAX对象
			var xhr = new XMLHttpRequest();
		//2,创建请求事件的监听 ,并给它回调function（自身self）	
			xhr.onreadystatechange=function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					//console.log( xhr.responseText);
				//解析返回的jason字符串
	     	        //if(xhr.responseText==0){
						//var resultp = JSON.parse(xhr.responseText);
						var eresult = document.getElementById('eresult');
						    eresult.innerHTML= xhr.responseText;
						//spresult.innerHTML='用户不存在，请核实后重新输入';
						  
						     
						//}
					//var json = JSON.parse(xhr.responseText);
					//var tips = document.getElementById('tips');
				      //   tips.innerHTML='json';
					//} else { 
						//var checkok = document.getElementById('checkok');
						  //  checkok.innerHTML='√ 用户核实通过，请输入密码';
						
						
					//}id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd 
				}
				
			}
		//3，初始化一个URL请求
			var id = document.getElementById('id').value;
			var createtime = document.getElementById('createtime').value;
			var qdname= document.getElementById('qdname').value;
			var username= document.getElementById('username').value;
			var pnumber= document.getElementById('pnumber').value;
			var wechat= document.getElementById('wechat').value;
			var project= document.getElementById('project').value;
			var jdy= document.getElementById('jdy').value;
			var login= document.getElementById('login').value;
			var description= document.getElementById('description').value;
			var gzjd= document.getElementById('gzjd').value;
			
			//var password= document.getElementById('password').value;
			//var data='name='+user+'&password='+password; //生成POST请求数据
			var data='id='+id+'&createtime='+createtime+'&qdname='+qdname+'&username='+username+'&pnumber='+pnumber+'&wechat='+wechat+'&project='+project+'&jdy='+jdy+'&login='+login+'&description='+description+'&gzjd='+gzjd; 
			var url='update.php'; //生成url地址
			xhr.open('post',url,true);
			//4,设置请求头
			xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
			
			//5，发送请求
			
			xhr.send(data);
			
			return false;
			//}
			
			//return false;//禁止sumbit提交按钮的默认行为
				
			//return false;
		}
	</script>
	
</html>
		<?php

mysqli_close($conn);

?>