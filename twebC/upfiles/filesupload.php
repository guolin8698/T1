<meta charset='utf-8'>
<?php 
include '../connect.php';
include '../checklog.php';
if(!empty($_GET['submit'])) 
{ 
$path="../filesup/"; //上传路径 
//echo $_FILES["filename"]["type"]; 
 
if(!file_exists($path)) 
{ 
//检查是否有该文件夹，如果没有就创建，并给予最高权限 
mkdir("$path", 0700); 
}//END IF 
 
//允许上传的文件格式 
//$tp = array("application/zip","application/vnd.ms-excel","application/msword","application/octet-stream"); 
//检查上传文件是否在允许上传的类型 
 
//if(!in_array($_FILES["filename"]["type"],$tp)) 
//{ 
//echo "<script>alert('格式不对,请返回重新选择');location.href='fupload.htm'; </script>"; 
//exit; 
//}//END IF 
	$filename=$_FILES["filename"]["name"];
	$filetype=$_FILES["filename"]["type"];
	$filesize=round(($_FILES["filename"]["size"]/1024),2);
	if($filename){
		echo "<script> alert('-文件属性,-文件名:$filename-,--,-文件大小:$filesize KBye-');</script>";	
	//echo "上传文件名: " . $_FILES["filename"]["name"] . "<br>";
		//echo "文件类型: " . $_FILES["filename"]["type"] . "<br>";
		//echo "文件大小: " . ($_FILES["filename"]["size"] ) . " Bye<br>";
	}
if($filesize==0){
	echo "<script>alert('上传文件超出大小限制');location.href='fupload.htm'; </script>"; 
	 exit;
}	
	
 if($filesize<30554400) 
{ 
$file1=$_FILES["filename"]["name"]; 
$file2 = $path.time().$file1; 
$flag=1; 
}//END IF 
 else{
	echo "<script>alert('上传文件超出大小限制');location.href='righttop.php'; </script>"; 
	 exit;
	 
 }
if($flag) $result=move_uploaded_file($_FILES["filename"]["tmp_name"],$file2); 
 
//特别注意这里传递给move_uploaded_file的第一个参数为上传到服务器上的临时文件 
if($result) 
{ 
	$addfilesuser=$uname;
	//$iid= $_SESSION['imgupid'];
	//$upfilesdate=date('Y年m月d日H点m分s秒', time());
	$upfilesdate=time();
	
	$sql = "insert into comment(user,upfilespath,upfilesdate)values('$addfilesuser','$file2','$upfilesdate')";
//}
   $filesupresult = mysqli_query($conn, $sql);

if ($filesupresult) 
// echo $sql; 
{
	
	
//echo "上传成功!".$file2; 
echo "<script language='javascript'>"; 
echo "alert(\"上传成功！\");"; 
	
//echo " location='add_aaa.php?pname=$file2'"; 
     
echo "</script>";}
	
        echo "上传文件名: " . $_FILES["filename"]["name"] . "<br>";
		echo "文件类型: " . $_FILES["filename"]["type"] . "<br>";
		echo "文件大小: " . $filesize . " KBye<br>";
		//echo "文件临时存储的位置: " . $_FILES["filename"]["tmp_name"] . "<br>";	
	
echo("<input style=\"float:right\"type=\"button\" name=\"Submit\" value=\"关闭\" onClick=\"window.close();\">");
//echo "服务器文件名称：".$file2;
		
// echo "<img src='../upimages/$file2'>";
}//END IF 
} else {
echo "file is null!";
}
?>
