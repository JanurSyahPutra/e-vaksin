<?php

session_start();
include '../fungsi.php';

if (!isset($_SESSION["login_admin"])) {
	header("Location: ../index.php");
	exit;
}

// mendapatkan id dokter yang login pada saat itu juga, kemudian ditampung di variabel "$id"
$id=$_SESSION["adminid"];

// memanggil fungsi getadminid dengan parameter $id yang ada pada fungsi.php
$admin = getadminid($id);


$user = getUserbyAdmin($id);

$userid = query("SELECT * FROM user");

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
	<title>E-Vaksin | Beranda</title>
</head>
<body>
	<div class="container mt-5">
		<?php
	require('../template/navbar_admin.php');
	?>
		<div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
			<h4 class="alert-heading">Hai, <?php echo $admin["nama_admin"] ?> !</h4>
			<hr>
			  <p class="mb-0">Berikut Adalah Daftar Pasien Vaksinasi Anda.</p>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<span class="badge bg-info p-3 mb-2 text-dark">Asal Rumah Sakit : <?php echo $admin["rumah_sakit"] ?></span>
	<div class="table-responsive">
	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col" class="text-center">No</th>
	      <th scope="col" class="text-center">NIK</th>
	      <th scope="col" class="text-center">Foto</th>
	      <th scope="col" class="text-center">Nama</th>
	      <th scope="col" class="text-center">Dokter</th>
	      <th scope="col" class="text-center">Status</th>
	      <th scope="col" class="text-center">Status Pemanggilan</th>
	      <th scope="col" class="text-center">Tanggal Daftar</th>
	      <th scope="col" class="text-center">Tanggal Vaksin</th>
	      <th scope="col" class="text-center">Opsi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php 
	  	if ($user != $admin["id_admin"]) {
	  		?>
	  	<?php $i = 1; ?>
		<?php foreach ($user as $row): ?>
		<tr>
			<td class="text-center"><?php echo $i; ?></td>
			<td class="text-center"><?php echo $row["nik"] ?></td>
			<td class="text-center"><img width="128" style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;" src="../img/<?php echo $row['foto'];?>"></td>
			<td class="text-center"><?php echo $row["nama"] ?></td>
			<td class="text-center"><?php echo $row["nama_admin"] ?></td>
			<td class="text-center"><?php echo $row["status"] ?></td>
			<td class="text-center"><?php echo $row["panggil"] ?></td>
			<td class="text-center"><?php echo $row["waktu_daftar"] ?></td>
			<td class="text-center"><?php echo $row["tgl_vaksin"] ?></td>
			<td class="text-center">
				<div class="btn-group" role="group" aria-label="Basic outlined example">
					<a href="edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-primary text-decoration-none text-dark">Edit</a>
				  <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick = "return confirm('Anda Yakin Ingin Menghapus Ini?');" class="btn btn-outline-primary text-decoration-none text-dark">Hapus</a>
				  <a href="vaksinasi.php?id=<?= $row["id"]; ?>" class="btn btn-outline-primary text-decoration-none text-dark" onclick="return confirm('Anda Yakin Ingin Memverifikasi Pasien Ini?');">Verifikasi</a>

				  <?php if ($row["panggil"] == "Sudah Dipanggil") {
				  	?>
				  	<a href="batal.php?id=<?= $row["id"]; ?>" class="btn btn-outline-danger text-decoration-none text-dark" onclick="return confirm('Anda Yakin Ingin Membatalkan Pasien Ini?');">Batal</a>
				  	<?php
				  } else {
				  	?> <a href="panggil.php?id=<?= $row["id"]; ?>" class="btn btn-outline-primary text-decoration-none text-dark">Panggil</a>
				 <?php } ?>
				  
				</div>
			</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	  	<?php } ?>
	    
	  </tbody>
	</table>
	</div>
	<!-- <a href="clear.php" onclick = "return confirm('Yakin Ingin Menghapus Semua Data?');"><button class="btn btn-danger">Clear</button></a> -->
	<hr>
	<?php
	require('../template/footer.php');
	?>
	</div>
</body>
</html>