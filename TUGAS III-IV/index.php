<?php
@session_start();
include "inc/koneksi.php";

if(@$_SESSION['admin'] || @$_SESSION['mahasiswa']){
?>

<?php
include("conn.php");
?>

<html>
<head><title>CRUD</title>
	
<link href="css/style.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
	<header>
		<h3>CRUD Operation</h3>
	</header>
	<nav>
		<ul>
			<li><b>MENU</b></li><br>
			<li><a href="#">Menu 1</a></li>
			<li><a href="#">Menu 2</a></li><br>
			<li><a href="logout.php">Log Out</a></li>
		</ul>
	</nav>
	<article>
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$nim = $_GET['nim'];
				$cek = mysqli_query($conn, "SELECT * FROM mhs WHERE nim='$nim'");
				if(mysqli_num_rows($cek) == 0){
					echo 'Data Not Found...!!!</div>';
				}else{
					$delete = mysqli_query($conn, "DELETE FROM mhs WHERE nim='$nim'");
					if($delete){
						echo 'Success..!!!';
					}else{
						echo 'Failed ..!!!';
					}
				}
			}
			?>

<table class="table table-striped table-hover">
			<a href="add.php" class="btn btn-link btn-sm"> INSERT DATA</a>
			<tr>
				<td><b>No</b></td>
				<td><b>Nim</b></td>
				<td><b>Name</b></td>
				<td><b>Address</b></td>
				<td><b>Action</b></td>
			</tr>
	<?php
	$sql = mysqli_query($conn, "SELECT * FROM mhs WHERE nim ");
	if(mysqli_num_rows($sql) == 0){
		echo '<tr><td colspan="5">Data not found...</td></tr>';
	}else{
		$no = 1;
		while($row = mysqli_fetch_assoc($sql)){
	echo '<tr>
	
			<td>'.$no.'</td>
			<td>'.$row['nim'].'</td>
			<td>'.$row['nama'].'</td>
			<td>'.$row['alamat'].'</td>';

	echo  '<td>
			<a href="edit.php?nim='.$row['nim'].'" title="Edit Data" class="btn btn-primary btn-sm">Edit</a>
			<a href="index.php?aksi=delete&nim='.$row['nim'].'" title="Are You Sure to Delete...? '.$row['nama'].'?\')" class="btn btn-danger btn-sm">Delete</a></td>
		</tr>';
		$no++;
		}
	}

?>                 
		</table>
	</article>
	<footer>Copyright@Ade Wahyudin - 14.111.111</footer>
</body>
</html>

<?php
} else {
	header("location: login.php");
}
?>