<?php
include 'connect.php';
include 'checklog.php';
$comment = trim($_POST['description']);
//print_r($_POST['description']);
if ($comment){   
	   
	$user = $uname;
$sid =$_POST['id'];
//$comment = trim($_POST['description']);
date_default_timezone_set('PRC');
$cdate =time();
//print_r($_POST);
$sql="insert into comment(user,comment,sid,cdate) values('$user','$comment','$sid','$cdate')";
$result = mysqli_query($conn, $sql);

	
}
else{
	echo 0;
     exit;
}
if ($result){
          

$sql='select * from comment where comment !="" AND sid ='. $sid;
$res= mysqli_query($conn,$sql);
	$array=array();
	
while($row=mysqli_fetch_array($res)){ 
	 $sdedate = date('Y年m月d日H点m分s秒', $row['cdate']);
     echo  "用户：",$row['user'],"&#10"; //&#10;
	 echo  "备注：",$row['comment'],"&#10" ;  //&#10;
	 echo  "备注添加时间：",$sdedate,"&#10"; //&#10;
	echo "---------------------------------------------&#10"	;  

}
      
    
    }


?>