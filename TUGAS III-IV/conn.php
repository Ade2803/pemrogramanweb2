<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "mahasiswa";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	// echo 'Not Connected to Database...!!! : '.mysqli_connect_error();
}
?>