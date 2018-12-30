<?php
include 'connect.php';
	   include 'checklog.php';
	if(!empty($_POST['spnumber'])) {
	   $spnumber = trim($_POST['spnumber']);
	}
	   else{
		   echo " <script>alert('信息不完整,请返回上一页,重新输入'); </script>";
	
	exit();
	   }
	   if ($ulimits==1){$count_sql = "select count(id) as c from userdata where `pnumber` = '$spnumber' ";} else {

		  $count_sql = "select count(id) as c from userdata where limits = '$ulimits' AND `pnumber` = '$spnumber' ";}

$result = mysqli_query($conn, $count_sql);
	   echo $result;
?>