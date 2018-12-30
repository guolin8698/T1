<?php

include 'connect.php';
include 'checklog.php';

/*
if (is_array($_POST['limits'])) {

   $id = join(',', $_POST['limits']);
    }
else*/
if (isset($_GET['id'])) {

   $id = (int) $_GET['id'];
  
}
	/*
if (is_array($_POST['id'])) 
{ $id = join(',', $_POST['id']);
}else
if (is_numeric($_GET['id'])) {
 $id = (int) $_GET['id'];}
 */
else {
 echo '数据不合法';
 exit;
}
//if($ulimits==1){$sql = "delete from adminuser where id in($id)";}
//else{echo '请以管理员身份登录',"<script>setTimeout(function(){window.location.href='login.html';},300);</script>";}
$sql = "delete from adminuser where id in ($id)";
$result = mysqli_query($conn, $sql);

if ($result)
{
 echo '删除成功',"<script>setTimeout(function(){window.location.href='useredit.php';},300);</script>";
	                   

}
else 
{
	
 echo '删除失败';
}
?>