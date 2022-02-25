<?php

session_start();
include '../fungsi.php';

if (!isset($_SESSION["login"])) {
	header("Location: ../index.php");
	exit;
}

$id = $_SESSION['userid'];
$user = getuserid($_SESSION['userid']); //memanggil data id yang login




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
	require('../template/navbar_user.php'); //memanggil file navbar 
	?>
	<?php
	if ($user["status"] == "Belum Vaksin") {
		if ($user["panggil"] == "Belum Dipanggil" ) {
		?>
		<div class="alert bg-danger alert-dismissible mt-2 text-light" role="alert">
  			<strong>Perhatian!</strong> Mohon tunggu panggilan dari dokter.
  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>

	<?php } else {
		?>
		<div class="alert bg-success alert-dismissible mt-2 text-light" role="alert">
  			<strong>Perhatian!</strong> Anda sudah mendapat panggilan untuk vaksin, dimohon untuk segera datang ke lokasi vaksin yang telah ditentukan.
  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php }
	 } else {
	 	?>
	 	<div class="alert bg-success alert-dismissible mt-2 text-light" role="alert">
  			<strong>Anda Sudah Vaksin!</strong> klik cetak untuk mendapatkan bukti surat vaksin.
  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	 <?php } ?>
	<div id="print">
	<div class="card mt-2">
  		<div class="card-body">
  		<div class="row">
		    <div class="col">
		      <img src="../icon/KK.png" alt="" width="128" height="64" class="d-inline-block align-text-top">
		    </div>
		    <div class="col text-center">
		    	<div class="h2">
  					Kartu Vaksinasi Covid-19
  				</div>
		    </div>
		    <div class="col text-end">
		    	<img src="../icon/GM.png" alt="" width="128" height="64" class="d-inline-block align-text-top">
		    </div>
		  </div>
  		<table class="table table-borderless table-responsive fs-5 mt-4">
  		<tr>
			<td class="col-sm-2">No. Registrasi</td>
			<td>: VKNCVD19-<?php echo $user["id"]; ?></td>
		</tr>
		<tr>
			<td class="col-sm-2">NIK</td>
			<td>: <?php echo $user["nik"]; ?></td>
		</tr>
		<tr>
			<td class="col-sm-2">Nama Lengkap</td>
			<td>: <?php echo $user["nama"]; ?></td>
		</tr>
		<tr>
			<td class="col-sm-2">Tanggal Lahir</td>
			<td>: <?php echo $user["tgl_lahir"]; ?></td>
		</tr>
		<tr>
			<td class="col-sm-2">Jenis Kelamin</td>
			<td>: <?php echo $user["jk"]; ?></td>
		</tr>
		<tr>
			<td class="col-sm-2">Alamat</td>
			<td>: <?php echo $user["alamat"]; ?></td>
		</tr>
		<tr>
			<td class="col-sm-2">Pekerjaan</td>
			<td>: <?php echo $user["pekerjaan"]; ?></td>
		</tr>
		<tr>
			<td class="col-sm-2">Status Vaksin</td>
			<td>: <?php echo $user["status"]; ?></td>
		</tr>

		<tr>
			<td class="col-sm-2">Nama Dokter</td>
			<td>: <?php echo $user["nama_admin"]; ?></td>
		</tr>

		<tr>
			<td class="col-sm-2">Lokasi Vaksin</td>
			<td>: <?php echo $user["rumah_sakit"]; ?></td>
		</tr>
		<?php if ($user["panggil"] == "Sudah Dipanggil") {
			?>
			<?php
		} else {
			?>
		<tr>
			<td class="col-sm-2">Status Pemanggilan</td>
			<td>: <?php echo $user["panggil"]; ?></td>
		</tr>
		<?php } ?>
		<?php if ($user['status'] == "Belum Vaksin") {
			?>
		<?php
		} else {
			?>
		<tr>
			<td class="col-sm-2">Tanggal Vaksin</td>
			<td>: <?php echo $user["tgl_vaksin"]; ?></td>
		</tr>
		<tr>
			<td class="col-sm-2">Jenis</td>
			<td>: <?php echo $user["jenis"]; ?></td>
		</tr>
		<?php } ?>
	</table>

		<?php if ($user['status'] == "Belum Vaksin") {
			?>
			<?php
		} else {
			?>
			<div class="row p-2">
		    <div class="col">
		    <div class="text-center">
		    <h5 class="text-center fs-6">Mengetahui, <?php echo $user["tgl_vaksin"]; ?></h5>
		      <img src="../img/TTD_KHU.png" width="150" height="150" alt="...">
		      <h5 class="text-center text-decoration-underline fs-6">Khurun 'Ain Muzaqi</h5>
		      <h5 class="text-center fs-6">Penanggung Jawab Vaksin</h5>
		    </div>
		      
		    </div>
		    <div class="col">
		      
		    </div>
		    <div class="col">
		    </div>
		  	</div>

		<?php } ?>
  		</div>
	</div>
	</div>
	
	<div class="mt-2 mb-3">
		<?php 
		if ($user['status'] != "Belum Vaksin") {
			?>
			<input type='submit' class="btn btn-primary" value='Cetak' onclick='printDiv("print");'>
			<?php
		} else {
			?>
			<div class="alert bg-danger alert-dismissible text-light" role="alert">
  			<strong>Anda Belum Vaksin!</strong> Untuk Cetak Dokumen Diharuskan Melakukan Vaksin Terlebih dahulu.
  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php } ?>
		<a href="edit.php?id=<?php echo $user["id"]; ?>"><button type="button" class="btn btn-primary">Ubah</button></a>
	</div>

	<?php
	require('../template/footer.php');
	?>
	</div>
	<script src="../print/print.js"></script>
</body>
</html>