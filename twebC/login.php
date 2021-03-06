<?php
session_start(); 
require_once ('connect.php'); 
 
$action = $_GET['action']; 
if ($action == 'login') {  //登录 
    $user = stripslashes(trim($_POST['user'])); 
    $pass = stripslashes(trim($_POST['pass'])); 
    if (empty ($user)) { 
        echo '用户名不能为空'; 
        exit; 
    } 
    if (empty ($pass)) { 
        echo '密码不能为空'; 
        exit; 
    } 
    $md5pass = md5($pass); //密码使用md5加密 
    $query = mysqli_query("select * from usert where username='$user'"); 
 
    $us = is_array($row = mysql_fetch_array($query)); 
 
    $ps = $us ? $md5pass == $row['password'] : FALSE; 
    if ($ps) { 
        $counts = $row['login_counts'] + 1; 
        $_SESSION['user'] = $row['username']; 
        $_SESSION['login_time'] = $row['login_time']; 
        $_SESSION['login_counts'] = $counts; 
        $ip = get_client_ip(); //获取登录IP 
        $logintime = mktime(); 
        $rs = mysqli_query("update usert set login_time='$logintime',login_ip='$ip', 
login_counts='$counts'"); 
        if ($rs) { 
            $arr['success'] = 1; 
            $arr['msg'] = '登录成功！'; 
            $arr['user'] = $_SESSION['user']; 
            $arr['login_time'] = date('Y-m-d H:i:s',$_SESSION['login_time']); 
            $arr['login_counts'] = $_SESSION['login_counts']; 
        } else { 
            $arr['success'] = 0; 
            $arr['msg'] = '登录失败'; 
        } 
    } else { 
        $arr['success'] = 0; 
        $arr['msg'] = '用户名或密码错误！'; 
    } 
    echo json_encode($arr); //输出json数据 
} 
elseif ($action == 'logout') {  //退出 
    unset($_SESSION); 
    session_destroy(); 
    echo '1'; 
} 
?>	 