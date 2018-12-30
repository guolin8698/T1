<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    




<link rel="stylesheet" href="./bootstrap/css/bootstrap.css">






   
	
	
	
	
	
	
	
	<!-- <link rel="stylesheet" type="text/css" href="../public/css/base.css">  -->
	
	
	
	
	  <script type="text/javascript" src="./js/jquery-2.1.0.min.js"></script>
	
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	
	
	
	<!--
	
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-table.min.css">
	
	
	
	
	
	<link rel="stylesheet" type="text/css" href="assets/css/iconfont.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	
	
	
	
	
	
	
	
	
	
	
	-->
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	    
    <!--<script src="/static/js/layer/layer.js"></script>-->
   
	
	
	
	
	
	
	
	

	
	
	
	
	<script src="/js/jquery-1.4.2.js"></script>
	<link rel="stylesheet" type="text/css" href="css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/b_login.css">
	<link rel="stylesheet" type="text/css" href="css/styepage.css">
	<script language="javascript" type="text/javascript" src="./My97DatePicker/WdatePicker.js"></script>
	








	<script>
function show(){
   var thistime = new Date().toLocaleString();
   document.getElementById('areabox').innerHTML = thistime;
}
function showTime() {
    setInterval(show, 1000);  //每秒刷新一次
	
}
				
</script>

	
	<script type="text/javascript">
	      
		 function showsearch(){
			var divb= document.getElementById('divb');
			 var divc= document.getElementById('divc')
			if (divb.style.display=='none') divb.style.display='block';
			 else 
				 divb.style.display='none';
			if (divc.style.display=='block') divc.style.display='none';
			 else 
				  divc.style.display='block';
				
		}
	
	function  showadd(){
			 var diva= document.getElementById('diva');
			       if(diva.style.display=='none') diva.style.display='block';
			                      else 
									  diva.style.display='none';
			
					
		 }	
		function showlist(){
			var divlist= document.getElementById('divlist');
			var divdesc= document.getElementById('divdesc');
			if (divlist.style.display=='block') divlist.style.display='none';
			else
				divlist.style.display='block';
			if (divdesc.style.display=='none') divdesc.style.display='block';
			else
				divdesc.style.display='none';
			}
		
	
	
	</script>
		
	<title>后台页面</title>
</head>
<body onload="showTime();" class="sidebar-expanded" style="">
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="skin-default" id="wrapper">
	
	
	
	
	
	
	
	
	
	<div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">顾客详情</h4>
                    </div>
                    <div class="modal-body">
                        <p>
						<iframe id="editw" width="1050" scr='' frameborder="0" scrolling="no" ></iframe> </p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <!--button type="button" class="btn btn-primary">提交</button-->
                    </div>
                </div>
            </div>
        </div>
	
		
	
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		


		
<div class="login">
   <div class="loginmain">
	  
	   <img src="images/Klogo.png" width="48" height="64"><br ;/>
	   
	 <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理系统</h2>
	   <br>
	  <div class="newstime"><div id="areabox"></div></div>
	   <div class="col-lg-6">
	   <h4>
     <input  type="button" value="添加数据" class="btn btn-danger" onClick="showadd();" />
   </h4></div>
	 
	   
	   <div class="col-lg-6">
	   <h4>
     <input type="button" value="按日期查询" class="btn btn-danger " onClick="showsearch();" />
   </h4></div>
<br>  
	   <h4>
     <input type="button" value="导出当前数据至EXCEL" class="btn btn-danger " onClick="javascript:location.href='downexcel.php'" />
   </h4> <form>
 输入手机号：<input type="text" name="spnumber" id="spnumber" placeholder="输入手机号"><button id="spnumberb">查询</button><input id="rep" name="button" type="reset" value="重置">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	  项目内容查询：<input type="text" name="sproject" id="sproject" placeholder="请输入项目关键字"><button id="sprojectb">查询</button><input id="reproject" name="button" type="reset" value="重置"></form>
	   <br>
<!--<div id="diva" style="display:none;">			          <!-- 让表单在一行中显示form-horizontal -->
	   <p id="mainshow">
	<dir id="deshow" style="display:block;">
	   <h6>
<?php
include 'connect.php';

include 'checklog.php';
	
//找session
// if (empty($_SESSION['name']) && isset($_SESSION['id']))
//{ 
//echo " <script>alert('未登录，请返回登录页面！');location.href='login.html'; </script>"; 
//exit;
//}
//if (empty($_session["admin"])){
	//header("location:login.html");
//}
//else{


if ($ulimits==1){$count_sql = "select count(id) as c from userdata";} else {
$count_sql = "select count(id) as c from userdata where limits = '$ulimits'";}

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
/*if ($ulimits==1){$sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd,limits,czy from userdata  order by id desc limit $offset , $num";}
				 else {$sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd,limits,czy  from userdata where limits = '$ulimits' order by id desc limit $offset , $num";}*/
			
$sql = "select id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd,limits,czy from userdata  order by id desc limit $offset , $num";	
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
	 // echo '<td>' . $row['description'] . '</td>';
	  //echo '<td>' . $row['gzjd'] . '</td>';
	  echo '<td>' . $row['czy'] . '</td>';
	  echo '<td><input id='. $row['id'] .' type="button" value="编辑数据"   data-toggle="modal" data-target=".bs-example-modal-lg" onclick="etest(this.id)"></td>';
	  echo '<td><input id='. $row['id'] .' type="button" value="查看详情"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="ldesc(this.id)"></td>';
	  echo '</tr>';
 }
echo '<tr><td colspan="14"><input id='. 1 .' type="button" value="首页" onclick="upage(this.id)"> <input id='. ($page - 1) .' type="button" value="上一页" onclick="upage(this.id)"> <input id='. ($page + 1) .' type="button" value="下一页" onclick="npage(this.id)">  <input id=' . $total . ' type="button" value="尾页" onclick="upage(this.id)"> 当前是第 ' . $page . '页 共' . $total . '页    总计：'.$count.'条记录</td></tr>';
  /*echo '<tr><td colspan="14"><a href="mainpage.php?page=1">首页</a> <input id='. 1 .' type="button" value="首页" onclick="upage(this.id)"><a href="mainpage.php?page=' . ($page - 1) . '">上一页</a> <input id='. ($page - 1) .' type="button" value="上一页" onclick="upage(this.id)"> <a href="mainpage.php?page=' . ($page + 1) . '">下一页</a><input id='. ($page + 1) .' type="button" value="下一页" onclick="npage(this.id)"> <a href="mainpage.php?page=' . $total . '">尾页</a> <input id=' . $total . ' type="button" value="尾页" onclick="upage(this.id)"> 当前是第 ' . $page . '页 共' . $total . '页 </td></tr>'; */
	//if ($_SESSION['limits']==1){
//echo '<tr><td align="right" colspan="10" ><input type="submit" value="选择删除" /></td></tr>';
//echo '<tr><td align="right" colspan="10" ><a href="useredit.php"><input type="button" value="用户管理" /></a></td></tr>';	
	//echo '</form>';
//	}
 echo '</table><br />';

} 

	else {
 echo '没有数据,请点击添加数据按钮添加数据';
}
	
		?> </h6>
 	<br />
</div>
	</p>
	
	
	
	
	
	
	
	
	
	
	
	
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  <h2><p id="warning" style="color:red"></p></h2>	
 <div id="diva" style="display:none;">
	 <div class="col-lg-7"><button id="addclose" onclick="closeadd();" class="btn btn-danger" > X </button></div>
	<form method="post">
   
	
   <h6>日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期:<input id="createtime" type="Wdate" name="createtime" onClick="WdatePicker()" placeholder="点击选择日期"></h6>
		<br>

   <h6>渠道名称:<select id="qdname" name="qdname">
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
            </select></h6>
<br>
			

		<h6>顾客姓名:<input id="username" type="text" name="username" ></h6>
		<br>
		<h6>手&nbsp;&nbsp;机&nbsp;&nbsp;号:<input id="pnumber" type="text" name="pnumber"></h6>
        <br>
		<h6>微&nbsp;&nbsp;信&nbsp;&nbsp;号:<input id="wechat" type="text" name="wechat" ></h6>
		<br>			
   <h6>咨询项目:<input id="project" type="text" name="project" ></h6>
<br>
			
   <h6>接&nbsp;&nbsp;待&nbsp;&nbsp;员:<select id="jdy" name="jdy">
            <option value="0" selected="selected">选择接待员</option>
            <option value="中生">1.中生</option>
            <option value="小卫">2.小卫</option>
            <option value="双双">3.双双</option>
	        <option value="吴彤">4.吴彤</option>
	        <option value="圆圆">5.圆圆</option>
	         </select>     
	   </h6>
	<br>
			
   <h6>上门情况:<select id="login" name="login">
            <option value="0" selected="selected">选择上门情况</option>
            <option value="1.宏脉">1.宏脉</option>
            <option value="2.上门未成交">2.上门未成交</option>
            <option value="3.上门已成交">3.上门已成交</option>
	         <option value="4.无">4.无</option>
	         </select>     
	   </h6>
<br>
		
   <!--h6><label>备&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注:</label>
		<textarea  id="description" name="description" cols="30" rows="4"> 
         
      </textarea></h6-->
	<br>	
			
   <!--h6>跟踪进度:<input id="gzjd" type="text" name="gzjd" ></h6-->
		
		
		
		
		
		
 
  
   <input id="adddata" type="submit" value="添加" class="btn btn-danger btn-lg">
		
</form><br>
</div>
	
	 
<div id="divb" style="display:none;">
		<form action="" method="post" class="form-horizontal">
		
	  <div class="col-lg-4">	<h4>
   选择起始日期：<input id="screatetime" type="Wdate" name="screatetime" onClick="WdatePicker()" placeholder="点击选择日期"><br>
   选择结束日期：<input id="endtime" type="Wdate" name="endtime" onClick="WdatePicker()" placeholder="点击选择日期" >
	</h4>
	</div><br>
	  <div class="pull-xs-6">
<input id="tsearch" type="button" value="查询" class="btn btn-danger">
<br></div>
			
	</form>
	   </div>  
	<script>
	var tsearch = document.getElementById('tsearch');
		tsearch.onclick = function(){
		//1，创建AJAX对象
			var xhr = new XMLHttpRequest();
		//2,创建请求事件的监听 ,并给它回调function（自身self）	
			xhr.onreadystatechange=function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					//console.log( xhr.responseText);
				//解析返回的jason字符串
	     	        if(xhr.responseText==0){
						        alert('请重新输入起始日期和结束日期！！！');
						//var resultp = JSON.parse(xhr.responseText);
					}else{
						var spresult = document.getElementById('spresult');
						    var tshow = document.getElementById('tshow');
		                      tshow.style.display="block";
						spresult.innerHTML= xhr.responseText;
						//spresult.innerHTML='用户不存在，请核实后重新输入';
						  						     
						}
					//var json = JSON.parse(xhr.responseText);
					//var tips = document.getElementById('tips');
				      //   tips.innerHTML='json';
					//} else { 
						//var checkok = document.getElementById('checkok');
						  //  checkok.innerHTML='√ 用户核实通过，请输入密码';
						
						
					//}
				}
				
			}
		//3，初始化一个URL请求
			var screatetime= document.getElementById('screatetime').value;
			var endtime= document.getElementById('endtime').value;
			//var password= document.getElementById('password').value;
			//var data='name='+user+'&password='+password; //生成POST请求数据
			var data='screatetime='+screatetime+'&endtime='+endtime; 
			var url='searchresult.php'; //生成url地址
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
	
	<script>
	var spnumberb = document.getElementById('spnumberb');
		spnumberb.onclick = function(){
			var tshow = document.getElementById('tshow');
			
		//1，创建AJAX对象
			var xhr = new XMLHttpRequest();
		//2,创建请求事件的监听 ,并给它回调function（自身self）	
			xhr.onreadystatechange=function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					//console.log( xhr.responseText);
				//解析返回的jason字符串
	     	        if(xhr.responseText==0){
						        alert('没有查询到改号码的记录，请核实后再查找')
						//var resultp = JSON.parse(xhr.responseText);
					}else{
						var spresult = document.getElementById('spresult');
						tshow.style.display="block";    
						spresult.innerHTML="";
						spresult.innerHTML= xhr.responseText;
						//spresult.innerHTML='用户不存在，请核实后重新输入';
						  var rep = document.getElementById('rep');
					           rep.onclick=function(){
					         spresult.innerHTML= '';}
						     
						}
					//var json = JSON.parse(xhr.responseText);
					//var tips = document.getElementById('tips');
				      //   tips.innerHTML='json';
					//} else { 
						//var checkok = document.getElementById('checkok');
						  //  checkok.innerHTML='√ 用户核实通过，请输入密码';
						
						
					//}
				}
				
			}
		//3，初始化一个URL请求
			var spnumber= document.getElementById('spnumber').value;
			//var password= document.getElementById('password').value;
			//var data='name='+user+'&password='+password; //生成POST请求数据
			var data='spnumber='+spnumber; 
			var url='searchpnn.php'; //生成url地址
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
	<script>
	var sprojectb = document.getElementById('sprojectb');
		sprojectb.onclick = function(){
			var tshow = document.getElementById('tshow');
			
		//1，创建AJAX对象
			var xhr = new XMLHttpRequest();
		//2,创建请求事件的监听 ,并给它回调function（自身self）	
			xhr.onreadystatechange=function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					//console.log( xhr.responseText);
				//解析返回的jason字符串
	     	        if(xhr.responseText==0){
						        alert('没有该记录，请核实后再查找')
						//var resultp = JSON.parse(xhr.responseText);
					}else{
						var deshow = document.getElementById('deshow');
					        deshow.style.display='none';
						var mainshow = document.getElementById('mainshow');
					         mainshow.innerHTML= "";
					mainshow.innerHTML= xhr.responseText;
						//spresult.innerHTML='用户不存在，请核实后重新输入';
						  var rep = document.getElementById('rep');
					           rep.onclick=function(){
					         spresult.innerHTML= '';}
						     
						}
					//var json = JSON.parse(xhr.responseText);
					//var tips = document.getElementById('tips');
				      //   tips.innerHTML='json';
					//} else { 
						//var checkok = document.getElementById('checkok');
						  //  checkok.innerHTML='√ 用户核实通过，请输入密码';
						
						
					//}
				}
				
			}
		//3，初始化一个URL请求
			var sproject= document.getElementById('sproject').value;
			//var password= document.getElementById('password').value;
			//var data='name='+user+'&password='+password; //生成POST请求数据
			var data='sproject='+sproject; 
			var url='searchproject.php'; //生成url地址
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
	
	
	<script>
	var adddata = document.getElementById('adddata');
		adddata.onclick = function(){
		 var warning= document.getElementById("warning");
			var tshow = document.getElementById('tshow');
			
			//1，创建AJAX对象
			var xhr = new XMLHttpRequest();
		//2,创建请求事件的监听 ,并给它回调function（自身self）	
			xhr.onreadystatechange=function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					//console.log( xhr.responseText);
				//解析返回的jason字符串
	     	       if(xhr.responseText==0) {
					   
				 alert("注意~！此手机号已经录入过，请核实后再录入！！！");
					   
					   
					   
				   }
						else{
							//var resultp = JSON.parse(xhr.responseText);
					    var deshow = document.getElementById('deshow');
					        deshow.style.display='none';
						var mainshow = document.getElementById('mainshow');
							
		                       
							var spresult = document.getElementById('spresult');
						   mainshow.innerHTML= "";
						   mainshow.innerHTML= xhr.responseText;
							alert('记录添加成功');
						//spresult.innerHTML='用户不存在，请核实后重新输入';
						  
						     
						}
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
			//var id = document.getElementById('id').value;
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
			
			//var password= document.getElementById('password').value;
			//var data='name='+user+'&password='+password; //生成POST请求数据
			var data='createtime='+createtime+'&qdname='+qdname+'&username='+username+'&pnumber='+pnumber+'&wechat='+wechat+'&project='+project+'&jdy='+jdy+'&login='+login; 
			var url='infoup.php'; //生成url地址
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
	 
	   
  
	<div id="tshow"  style="display:none;">
	<div class="col-lg-7"><button id="closetshow" onclick="closetshow();" class="btn btn-danger" > X </button></div>
<p id="spresult" ></p>
	   </div>
	<script>
	function closetshow(){
		var tshow = document.getElementById('tshow');
		     tshow.style.display="none";
		
	}
	</script>
	   <p id="sedit"></p>
	<div id="editshow"  style="display:none;">
		<!--div class="col-lg-7"><button id="close" onclick="closeiframe();" class="btn btn-danger" > X </button></div>
		<iframe id="editw" width="1048" scr='' frameborder="0" scrolling="no" ></iframe-->
		
		</div>
		<!--script>
	function closeiframe(){
		var editshow = document.getElementById('editshow');
		     editshow.style.display="none";
		
	}
	</script-->
	<script>
	function closeadd(){
		var diva = document.getElementById('diva');
		     diva.style.display="none";
		
	}
	</script>
	<script>
		
function etest(id){
	var editw = document.getElementById('editw');
	editw.src='loading.html';
	
   var xhr = new XMLHttpRequest(); //创建 AJAX对象
			xhr.onreadystatechange= function(){
				if(xhr.readyState == 4 && xhr.status == 200){
              	//var sedit =document.getElementById('sedit');
					var diva =document.getElementById('diva');
				diva.style.display="none";
					var editshow = document.getElementById('editshow');
					
					editshow.style.display='block';
					
					
					editw.height=document.documentElement.clientHeight;
					//editw.width=document.documentElement.clientWidth;
					
					 editw.src= 'edit.php?id='+id;
					//sedit.innerHTML= xhr.response;                
 				}
			}
		

		xhr.open('get','/edit.php?id='+id,true);
		xhr.send(null);
	
	}

	   </script>
		
		
	   <script>
		
function ldesc(id){
	var editw = document.getElementById('editw');
	editw.src='loading.html';
   var xhr = new XMLHttpRequest(); //创建 AJAX对象
			xhr.onreadystatechange= function(){
				if(xhr.readyState == 4 && xhr.status == 200){
              	//var sedit =document.getElementById('sedit');
					var diva =document.getElementById('diva');
				diva.style.display="none";
				var editshow = document.getElementById('editshow');
					editshow.style.display='block';
					var editw = document.getElementById('editw');
					editw.height=document.documentElement.clientHeight;
					//editw.width=document.documentElement.clientWidth;
					editw.src='';
					 editw.src= 'description.php?id='+id;
					//sedit.innerHTML= xhr.response;                
 				}
			}
		

		xhr.open('get','/description.php?id='+id,true);
		xhr.send(null);
	
	}

	   </script>
	    <script>
		
function npage(id){
   var xhr = new XMLHttpRequest(); //创建 AJAX对象
			xhr.onreadystatechange= function(){
				if(xhr.readyState == 4 && xhr.status == 200){
              	//var sedit =document.getElementById('sedit');
					var deshow = document.getElementById('deshow');
					deshow.style.display="none";
				var mainshow = document.getElementById('mainshow');
					mainshow.innerHTML= "";
					mainshow.innerHTML= xhr.responseText;
					 
					//sedit.innerHTML= xhr.response;                
 				}
			}
		

		xhr.open('get','/mainpage.php?page='+id,true);
		xhr.send(null);
	
	}

	   </script>
	    <script>
		
function upage(id){
   var xhr = new XMLHttpRequest(); //创建 AJAX对象
			xhr.onreadystatechange= function(){
				if(xhr.readyState == 4 && xhr.status == 200){
              	//var sedit =document.getElementById('sedit');
					var deshow = document.getElementById('deshow');
					deshow.style.display="none";
				var mainshow = document.getElementById('mainshow');
					mainshow.innerHTML= "";
					mainshow.innerHTML= xhr.responseText;
					 
					//sedit.innerHTML= xhr.response;                
 				}
			}
		

		xhr.open('get','/mainpage.php?page='+id,true);
		xhr.send(null);
	
	}

	   </script>
	<script>
		
function stnpage(id){
   var xhr = new XMLHttpRequest(); //创建 AJAX对象
			xhr.onreadystatechange= function(){
				if(xhr.readyState == 4 && xhr.status == 200){
              	//var sedit =document.getElementById('sedit');
					
				var spresult = document.getElementById('spresult');
						    var tshow = document.getElementById('tshow');
		                      tshow.style.display="block";
						spresult.innerHTML= xhr.responseText;
					
					 
					//sedit.innerHTML= xhr.response;                
 				}
			}
		

		xhr.open('get','/sdresult.php?page='+id,true);
		xhr.send(null);
	
	}

	   </script>
	
	<script>
		
function spropage(id){
   var xhr = new XMLHttpRequest(); //创建 AJAX对象
			xhr.onreadystatechange= function(){
				if(xhr.readyState == 4 && xhr.status == 200){
              	//var sedit =document.getElementById('sedit');
					var mainshow = document.getElementById('mainshow');
					mainshow.innerHTML= "";
					mainshow.innerHTML= xhr.responseText;
				
					
					 
					//sedit.innerHTML= xhr.response;                
 				}
			}
		

		xhr.open('get','/sprojects.php?page='+id,true);
		xhr.send(null);
	
	}

	   </script>
	
	
	
	<br />
	 <br />
	 <br />
	 <br /><br />
	 <br />
	 <br />
	 <br /><br />
	 <br />
	 <br />
	 <br />
	<br />
	 <br />
	 <br />
	 <br />
		
	
	   
	<div class="col-lg-6">
   <h3>
     <input type="button" value="退出登录" class="btn btn-danger" onClick="javascript:location.href='logout.php'" />
	      </h3>	</div>
 </div>
 

		
	
 
		
	
	
	
	
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


	

<script src="./public/js/delaunay.js"></script>
<script src="./public/js/TweenMax.js"></script>
<script src="js/effect.js"></script>
<!--	<script type="text/javascript" src="./js/alpha.js"></script>
    <script type="text/javascript">
    $(function() {})
    </script> -->
</body>
</html>

<?php


mysqli_close($conn);

?>

