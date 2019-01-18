

<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body >
<div style="background:rgba(0,0,0,0.2);border:2px solid rgba(0,0,0,0.4)">	
<div align="center" style="color:lightseagreen"><p><h2>全部文件列表</2></p><div>	
	<input type="text" name="filesearch" id="sfile" placeholder="请输入文件关键字"><button id="sfileb">查找</button><input id="resfiles" name="button" type="reset" value="重置">
<div id="sfresult"  align="center" style="color:darkred;display:none">	
   <span >查询结果：</span>
	</div>
	
	
	
	<p id="sfshow"></p>
	

   <div id="afshow" style="display:block;"><p align="center">	<?php
include '../connect.php';
include '../checklog.php';

$allfilesql='select * from comment where upfilespath !="" ORDER BY upfilesdate DESC;';
$allfilelist=mysqli_query($conn,$allfilesql);


echo "<table border='0'>";
			
	while($allfiles=mysqli_fetch_array($allfilelist)){
			//$sdeimg=$deimg;
	$fnname=substr($allfiles['upfilespath'],21);
		$fpath=substr($allfiles['upfilespath'],2);
		
	$afdate=$allfiles['upfilesdate'];
		$cafdate=date('Y年m月d日',$afdate);
	 $filesaddu=$allfiles['user'];
	  //if ($sdeimg['imgpath']>0){
		 // echo "图片上传者：",$sdeimg['user'],"&#10";
		if($allfiles['upfilespath']){ 
		     //if($allfiles['upfilesdate']){$upfilesd=$allfiles['upfilesdate'];}
			//echo "<p id='imgs' hidden='hidden' ><img src=$imgpath></p><br>";
			
			echo "<tr style='font-size: 12px' >";
			echo "<td align='center' height='25px'  onmouseover=\"this.style.backgroundColor='rgba(149,204,43,0.7)'\" onmouseout=\"this.style.backgroundColor=''\" ><strong><span style='color:lightseagreen;font-size:14px;'>$fnname</span></strong><br>";
			echo "<a href='../downfile.php? url=$fpath'> <input type='button' style='color:chocolate;' value='下载'/></a>"; 
			//http://192.168.1.56$fpath'>$fnname</a><br>";
			if($allfiles['user']){echo "<h7><p style='color:chocolate'>此文件片由",$filesaddu,"于",$cafdate,"上传</h7>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>";}
			echo "</td>";
			echo "</tr>";
			
			
		}
	  //}
		} 
		
		
			echo "</table>";




?></p> </div>
	</div>
	<script>
	var sfileb = document.getElementById('sfileb');
		sfileb.onclick = function(){
			var sfshow = document.getElementById('sfshow');
			
		//1，创建AJAX对象
			var xhr = new XMLHttpRequest();
		//2,创建请求事件的监听 ,并给它回调function（自身self）	
			xhr.onreadystatechange=function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					//console.log( xhr.responseText);
				//解析返回的jason字符串
	     	        if(xhr.responseText==0){
						 sfshow.innerHTML="没有该文件，请核实后再查找";
						        alert('没有该文件，请核实后再查找')
						//var resultp = JSON.parse(xhr.responseText);
					}else{
						var afshow = document.getElementById('afshow');
					        afshow.style.display='none';
						var sfresult = document.getElementById('sfresult');
						    sfresult.style.display='block'; 
					       sfshow.innerHTML= "";
					sfshow.innerHTML= xhr.responseText;
						//spresult.innerHTML='用户不存在，请核实后重新输入';
						  //var rep = document.getElementById('rep');
					        //   rep.onclick=function(){
					         //spresult.innerHTML= '';}
						     
						}
					
				}
				
			}
		//3，初始化一个URL请求
			var sfile= document.getElementById('sfile').value;
			//var password= document.getElementById('password').value;
			//var data='name='+user+'&password='+password; //生成POST请求数据
			var data='sfile='+sfile; 
			var url='../searchfiles.php'; //生成url地址
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
		var resfiles = document.getElementById('resfiles');
		
		
					        resfiles.onclick=function(){
                                  var sfshow = document.getElementById('sfshow');
								           sfshow.innerHTML= '';
								
								var sfresult = document.getElementById('sfresult');
						              sfresult.style.display='none'; 
									
		                        var afshow = document.getElementById('afshow');
								 afshow.style.display='block';
								var sfile = document.getElementById('sfile');
								    sfile.value='';
								
							    
							}
		</script>
	
	
	
	
</body>
</html>