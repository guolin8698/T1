<?php
include 'connect.php';
include 'checklog.php';

$filesql='select user,upfilespath,upfilesdate from comment where upfilespath !="" and upfilespath like "%.xlsx" ORDER BY upfilesdate DESC LIMIT 1;';
$filelist=mysqli_query($conn,$filesql);
$files=mysqli_fetch_array($filelist);
$dpath=$files['upfilespath'];
$cdpath=substr($dpath,21);
$downf=substr($dpath,2);
$upuser=$files['user'];
?>
<html>
<head>
<meta charset="utf-8">
<!--meta http-equiv="refresh" content="20"-->
<title></title>
	<script>
function show(){
   var thistime = new Date().toLocaleString();
   document.getElementById('areabox').innerHTML = thistime;
}
function showTime() {
    setInterval(show, 1000);  //每秒刷新一次
		}
				
</script>
		
</head>
<body onload="showTime();" >
	<div style="background:rgba(0,0,0,0.17);border:6px solid rgba(0,0,0,0.16)">
	<div style="background:rgba(22,167,237,0.50);border:1.5px solid rgba(0,0,0,0.9);padding:5px;">
<div style="color:aquamarine" class="newstime">时间：<b><div id="areabox" style="color:palegreen;"></div></b></div>	
<p style="color:aquamarine">当前登录用户名：<?php echo $uname; ?></p>
		<p id="newfile" style="color: coral">最新报表文件<?php echo "<a href='http://192.168.1.56$downf'>$cdpath</a>"; ?>
			此文件由<span style="color:chartreuse"><?php echo $upuser ?></span>上传
		
			<br>
		<strong><button id="upfiles" style=" cursor:pointer;color:chocolate;float:right" data-toggle="modal" data-target=".bs-example-modal-lg" onClick="window.open('./upfiles/allfiles.php','上传','height=500,width=380,top=200,left=200')">查看全部文件</button></strong>
			<button id="upfiles" style=" cursor:pointer;color:chocolate;float:right" onClick="window.open('./upfiles/fupload.htm','上传','height=300,width=380,top=200,left=200')">上传</button></p>
		<br>
			</div>
		</div>
</body>
</html>