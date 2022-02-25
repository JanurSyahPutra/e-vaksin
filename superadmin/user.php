<?php

session_start();
include '../fungsi.php';

if (!isset($_SESSION["login_superadmin"])) {
	header("Location: ../index.php");
	exit;
}

$id=$_SESSION["superid"];
$admin = getsuperadminid($id);


// $user = getUserbyAdmin($id);

$user = query("SELECT * FROM user_all");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>

    <link rel="icon" type="image/png" href="../icon/vaccine.png">
	<title>E-Vaksin | Data User</title>
</head>
<body>
	<div class="container mt-5">
		<?php
	require('../template/navbar_superadmin.php');
	?>

	<div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
			<h4 class="alert-heading">Hai, <?php echo $admin["nama"] ?> !</h4>
			<hr>
			  <p class="mb-0">Berikut Adalah Daftar Pasien Vaksinasi.</p>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<div class="mt-2 position-relative"> <a href="tambahuser.php" class="position-absolute top-0 end-0"><button class="btn btn-info">Tambah User</button></a></div>
	<div class="table-responsive">
	<table class="table table-hover mt-5">
	  <thead>
	    <tr>
	      <th scope="col">No</th>
	      <th scope="col">NIK</th>
	      <th scope="col">Foto</th>
	      <th scope="col">Nama</th>
	      <th scope="col">Alamat</th>
	      <th scope="col">Jenis Kelamin</th>
	      <th scope="col">Status</th>
	      <th scope="col">Tanggal Vaksin</th>
	      <th scope="col">Opsi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $i = 1; ?>
		<?php foreach ($user as $row): ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row["nik"] ?></td>
			<td><img width="150" style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;" src="../img/<?php echo $row['foto'];?>"></td>
			<td><?php echo $row["nama"] ?></td>
			<td><?php echo $row["alamat"] ?></td>
			<td><?php echo $row["jk"] ?></td>
			<td><?php echo $row["status"] ?></td>
			<td><?php echo $row["tgl_vaksin"] ?></td>
			<td>
				<div class="btn-group" role="group" aria-label="Basic outlined example">
				<a href="edituser.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-info text-decoration-none text-dark">Edit</a>
				 <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick = "return confirm('Anda Yakin Ingin Menghapus ini?');" class="btn btn-outline-danger text-decoration-none text-dark">Hapus</a>
				</div>
			</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	    
	  </tbody>
	</table>
	</div>
	<?php
	require('../template/footer.php');
	?>
	</div>
</body>
</html>