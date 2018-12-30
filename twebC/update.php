<?php
include 'connect.php';
include 'checklog.php';

//if ($_POST['id']) { 
	//if (!empty($_POST['createtime'])&& !empty($_POST['qdname'])&& !empty($_POST['username'])&& !empty($_POST['pnumber']) ){
 $ecreatetime = strtotime($_POST['createtime']);
$eqdname = $_POST['qdname'];
$egname = $_POST['username'];	
$epnumber = $_POST['pnumber'];
$ewechat = $_POST['wechat'];
	$eproject = $_POST['project'];
	$ejdy = $_POST['jdy'];
	$elogin = $_POST['login'];
	//$edescription = $_POST['description'];
	//$egzjd = $_POST['gzjd'];
	$id = $_POST['id'];
//}
	//else {
	//echo "<script type='text/javascript'> alert('数据提交不完整，请重新输入！！！');location='javascript:history.back()';</script>"; 
	//exit();
	//}
	

//} else {

 //echo "<script>alert('数据修改失败');</script>";
//}
//$sql="select pnumber from userdata where pnumber='$epnumber'"; 
// echo $sql; 
//$query = mysqli_query($conn,$sql); 
 //$rows = mysqli_num_rows($query); 
//if($rows>0){
//if($rows['username'] != 0){ 
//echo "<script type='text/javascript'> alert('此手机号已提交过，请重新输入！！！');location='javascript:history.back()';</script>"; 
	//exit();
//}
/*if ($ulimits==1){$sql = "update userdata set createtime='$ecreatetime',qdname='$eqdname',username='$egname',pnumber='$epnumber',wechat='$ewechat',project='$eproject',jdy='$ejdy',login='$elogin',gzjd='$egzjd' WHERE id = $id";}
else {$sql = "update userdata set 
createtime='$ecreatetime'
,qdname='$eqdname'
,username='$egname'
,pnumber='$epnumber'
,wechat='$ewechat'
,project='$eproject'
,jdy='$ejdy'
,login='$elogin'

,gzjd='$egzjd'

where  limits = '$ulimits' and id = $id";}*/
$sql = "update userdata set createtime='$ecreatetime',qdname='$eqdname',username='$egname',pnumber='$epnumber',wechat='$ewechat',project='$eproject',jdy='$ejdy',login='$elogin' WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
echo 0;
	//echo "<script> alert('数据修改成功');setTimeout(function(){window.location.href='page.php';},1000);</script>";
}
else{
	echo 1;
}
?>