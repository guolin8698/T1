<?php

include 'connect.php';
include 'checklog.php';

if (empty($_POST['id'])){"<script>
alert('未选取任何数据');location='javascript:history.back()';</script>";}
if (is_array($_POST['id'])) {

   $id = join(',', $_POST['id']);
    }
elseif (is_numeric($_GET['id'])) {

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
if($ulimits==1){$sql = "delete from user where id in($id)";} else{
$sql = "delete from user where limits = '$ulimits' and id in($id)"; }

$result = mysqli_query($conn, $sql);

if ($result)
{
 echo '删除成功',"
                      <script>
                            setTimeout(function(){window.location.href='page.php';},1000);
                      </script>";
	                   

}
else 
{
	
 echo '删除失败';
}
?>