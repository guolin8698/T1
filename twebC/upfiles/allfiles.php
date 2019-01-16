

<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body >
<div style="background:rgba(0,0,0,0.2);border:2px solid rgba(0,0,0,0.4)">	
<div align="center"><p><h2>全部文件列表</2></p><div>	
<p align="center">	<?php
include '../connect.php';
include '../checklog.php';

$allfilesql='select * from comment where upfilespath !="";';
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
			echo "<td align='center' height='25px'  onmouseover=\"this.style.backgroundColor='rgba(149,204,43,0.7)'\" onmouseout=\"this.style.backgroundColor=''\" ><a href='http://192.168.1.56$fpath'>$fnname</a><br>";
			if($allfiles['user']){echo "<h7><p style='color:chocolate'>此文件片由",$filesaddu,"于",$cafdate,"上传</h7>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>";}
			echo "</td>";
			echo "</tr>";
			
			
		}
	  //}
		} 
		
		
			echo "</table>";




?></p>
	</div>
</body>
</html>