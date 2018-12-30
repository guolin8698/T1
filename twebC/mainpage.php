<?php

session_start();

//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/base.css">  -->
	    <!--script src="/static/js/jquery-3.2.1.min.js"></script>
    <!--<script src="/static/js/layer/layer.js"></script>-->
    <script src="/js/jquery-1.4.2.js"></script>
    <link rel="stylesheet" type="text/css" href="css/b_login.css">
	<link rel="stylesheet" type="text/css" href="css/styepage.css">
	<script language="javascript" type="text/javascript" src="./My97DatePicker/WdatePicker.js"></script>
	
	
		
	
</head>
<body  >

		

<h6>				      
	
<?php
include 'connect.php';

include 'checklog.php';
	

/*if ($ulimits==1){$count_sql = "select count(id) as c from userdata";} else {
$count_sql = "select count(id) as c from userdata where limits = '$ulimits'";}*/
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
	  //echo '<td>' . $row['description'] . '</td>';
	  //echo '<td>' . $row['gzjd'] . '</td>';
	  echo '<td>' . $row['czy'] . '</td>';
	   echo '<td><input id='. $row['id'] .' type="button" value="编辑数据"   data-toggle="modal" data-target=".bs-example-modal-lg" onclick="etest(this.id)"></td>';
	  echo '<td><input id='. $row['id'] .' type="button" value="查看详情"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="ldesc(this.id)"></td>';
	  echo '</tr>';
 }

echo '<tr><td colspan="14"><input id='. 1 .' type="button" value="首页" onclick="upage(this.id)"> <input id='. ($page - 1) .' type="button" value="上一页" onclick="upage(this.id)"> <input id='. ($page + 1) .' type="button" value="下一页" onclick="npage(this.id)">  <input id=' . $total . ' type="button" value="尾页" onclick="upage(this.id)"> 当前是第 ' . $page . '页 共' . $total . '页  总计：'.$count.'条记录 </td></tr>';
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
	
		?> 
 </h6>				      	<br />

			
 <!--div id="diva" style="display:none;">
	
	<script>
	var spnumberb = document.getElementById('spnumberb');
		spnumberb.onclick = function(){
		//1，创建AJAX对象
			var xhr = new XMLHttpRequest();
		//2,创建请求事件的监听 ,并给它回调function（自身self）	
			xhr.onreadystatechange=function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					//console.log( xhr.responseText);
				//解析返回的jason字符串
	     	        //if(xhr.responseText==0){
						//var resultp = JSON.parse(xhr.responseText);
						var spresult = document.getElementById('spresult');
						    spresult.innerHTML= xhr.responseText;
						//spresult.innerHTML='用户不存在，请核实后重新输入';
						  var rep = document.getElementById('rep');
					           rep.onclick=function(){
					         spresult.innerHTML= '';}
						     
						//}
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
	var adddata = document.getElementById('adddata');
		adddata.onclick = function(){
		//1，创建AJAX对象
			var xhr = new XMLHttpRequest();
		//2,创建请求事件的监听 ,并给它回调function（自身self）	
			xhr.onreadystatechange=function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					//console.log( xhr.responseText);
				//解析返回的jason字符串
	     	       if(xhr.responseText==0){
					   var warning= document.getElementById("warning");
					   warning.innerHTML= "此手机号已提交过，请核实后再录入！！！";
				   }
						else{
							//var resultp = JSON.parse(xhr.responseText);
					    var deshow = document.getElementById('deshow');
					         deshow.style.display='none';
						var mainshow = document.getElementById('mainshow');
							warning.innerHTML='';
					        mainshow.innerHTML='';
						    mainshow.innerHTML= xhr.responseText;
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
			var description= document.getElementById('description').value;
			var gzjd= document.getElementById('gzjd').value;
			
			//var password= document.getElementById('password').value;
			//var data='name='+user+'&password='+password; //生成POST请求数据
			var data='createtime='+createtime+'&qdname='+qdname+'&username='+username+'&pnumber='+pnumber+'&wechat='+wechat+'&project='+project+'&jdy='+jdy+'&login='+login+'&description='+description+'&gzjd='+gzjd; 
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
	 
	   
  <p id="spresult" ></p>

	   
	   <p id="sedit"></p>
	
		
	<script>
		
function etest(id){
   var xhr = new XMLHttpRequest(); //创建 AJAX对象
			xhr.onreadystatechange= function(){
				if(xhr.readyState == 4 && xhr.status == 200){
              	//var sedit =document.getElementById('sedit');
				var editshow = document.getElementById('editshow');
					editshow.style.display='block';
					var editw = document.getElementById('editw');
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
   var xhr = new XMLHttpRequest(); //创建 AJAX对象
			xhr.onreadystatechange= function(){
				if(xhr.readyState == 4 && xhr.status == 200){
              	//var sedit =document.getElementById('sedit');
				var editshow = document.getElementById('editshow');
					editshow.style.display='block';
					var editw = document.getElementById('editw');
					editw.height=document.documentElement.clientHeight;
					//editw.width=document.documentElement.clientWidth;
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
				var editshow = document.getElementById('editshow');
					editshow.style.display='block';
					var editw = document.getElementById('editw');
					//editw.height=document.documentElement.clientHeight;
					//editw.width=document.documentElement.clientWidth;
					 //editw.src= 'page.php?page='+id;
					//sedit.innerHTML= xhr.response;                
 				}
			}
		

		xhr.open('get','page.php?page='+id,true);
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
	 <br /-->
		
	
	
		
	
 
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


	
</body>
</html>

<?php


mysqli_close($conn);

?>

