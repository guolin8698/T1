<?php 
include 'config.php';

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD);


if (mysqli_errno($conn)) {

   echo mysqli_error($conn);

   exit;
}

mysqli_select_db($conn, DB_NAME);

mysqli_set_charset($conn, DB_CHARSET);


?>