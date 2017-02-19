<?php
@session_start();
include "inc/koneksi.php";

if(@$_SESSION['admin'] || @$_SESSION['mahasiswa']){
	header("location: index.php");
} else {
?>

<html>
<head><title>CRUD</title>

<link href="css/style.css" rel="stylesheet">

</head>
<body>
<div class="container">
	<header>
		<BR><br><br>
	</header>
		
	<br>
	<center><img src="S.jpg" width="100px" height="100px"></center>
		<center>
		<table class="table table-striped table-hover">	
		<form method="POST">
			<tr>
			<td style="margin-top: 10px;">
			<center><input type="text" name="user" placeholder="Username" class="lg" size="40"/></center>
			</td>
			</tr>
			<tr>
			<td style="margin-top: 10px;">
			<input type="password" name="pass" placeholder="Password" class="lg" size="40" />
			</td>
			</tr>
			<tr>
			<td  style="margin-top: 10px;">
			<center><input type="submit" name="login" value="Login" style='size=300px' /></center>
			</td>
			</tr>
			<br>
		
		
	<?php
	$user = @$_POST['user'];
	$pass = @$_POST['pass'];
	$login = @$_POST['login'];

	if($login){
		if($user == "" || $pass == ""){
			?> <script type="text/javascript">alert("Username/Password Don't Empety...!!!");</script> <?php
		} else {
			$sql = mysql_query("select * from tb_login where username = '$user'and password = md5('$pass')" ) or die (mysql_error());
			$data = mysql_fetch_array($sql);
			$cek = mysql_num_rows($sql);
			if($cek >= 1) {
				if($data['level'] == "admin"){
					@$_SESSION['admin'] = $data['kode_user'];
					header("location: index.php");
				} else if($data['level'] == "mahasiswa"){
						@$_SESSION['mahasiswa'] = $data['kode_user'];
					header("location: index.php");
				}
			} else {
				?> <script type="text/javascript">alert("Sorry Login Failed...!!! ");</script> <?php
			}

		}
	}
	?>
	</form>
		</table></center>
	<br><br><br>
	<footer>Copyright@Ade Wahyudin - 14.111.111</footer>
</body>
</html>
<?php
}
?>