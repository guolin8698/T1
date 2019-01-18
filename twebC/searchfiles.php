<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/base.css">  -->
	    <!--script src="/static/js/jquery-3.2.1.min.js"></script>
    <!--<script src="/static/js/layer/layer.js"></script>-->
    <!--script src="/js/jquery-1.4.2.js"></script>
    <link rel="stylesheet" type="text/css" href="css/b_login.css">
	<link rel="stylesheet" type="text/css" href="css/styepage.css">
	<script language="javascript" type="text/javascript" src="./My97DatePicker/WdatePicker.js"></script-->
	
	
		
	
</head>
<body  style="background:rgba(219,85,164,0.88)">
<h6>
<?php
include 'connect.php';
 include 'checklog.php';




$searchfile = trim($_POST['sfile']);
	

	
	$sfilesql="select * from comment where upfilespath like '%$searchfile%' ORDER BY upfilesdate DESC;";
$sfilelist=mysqli_query($conn,$sfilesql);


echo "<table border='0'>";
			
	while($sfiles=mysqli_fetch_array($sfilelist)){
			//$sdeimg=$deimg;
	$sfnname=substr($sfiles['upfilespath'],21);
		$sfpath=substr($sfiles['upfilespath'],2);
		
	$sfdate=$sfiles['upfilesdate'];
		$scafdate=date('Y年m月d日',$sfdate);
	 $sfilesaddu=$sfiles['user'];
	  //if ($sdeimg['imgpath']>0){
		 // echo "图片上传者：",$sdeimg['user'],"&#10";
		if($sfiles['upfilespath']){ 
		     //if($allfiles['upfilesdate']){$upfilesd=$allfiles['upfilesdate'];}
			//echo "<p id='imgs' hidden='hidden' ><img src=$imgpath></p><br>";
			
			echo "<tr style='font-size: 12px' >";
			echo "<td align='center' height='25px'  onmouseover=\"this.style.backgroundColor='rgba(219,85,164,0.48)'\" onmouseout=\"this.style.backgroundColor=''\" ><strong><span style='color:lightseagreen;font-size:14px;'>$sfnname</span></strong><br>";
			echo "<a href='../downfile.php? url=$sfpath'> <input type='button' style='color:chocolate;' value='下载'/></a>"; 
			//http://192.168.1.56$fpath'>$fnname</a><br>";
			if($sfiles['user']){echo "<h7><p style='color:chocolate'>此文件片由",$sfilesaddu,"于",$scafdate,"上传</h7>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>";}
			echo "</td>";
			echo "</tr>";
			
			
		}
	  //}
		 	
	
	
		
		
		


	
	}
	
	
		echo "</table>";
	
	
	
	
	
	

	
	


 

	

		
	?>
 
</h6>









</body>
</html>

<?php


mysqli_close($conn);

?>




























