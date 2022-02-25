<?php

session_start();
include '../fungsi.php';

if (!isset($_SESSION["login_superadmin"])) {
	header("Location: ../index.php");
	exit;
}

if (isset($_POST["tambah"])) {
	if (tambahdokter($_POST) > 0) {
		
		echo "
		<script>
			alert('Data Berhasil di Tambahkan');
			document.location.href = 'dokter.php';
		</script>

		";
	}
	else {
		echo "
		<script>
			alert('Data Gagal di Tambahkan');
			document.location.href = 'dokter.php';
		</script>

		";
	}
}

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
	<title>E-Vaksin | Tambah Dokter</title>
</head>
<body>
	<div class="container-sm mt-5 w-75">
		<form action="" method="POST">

		<div class="mb-2">
			<label class="label">Username</label>
			<input type="text" name="username" id="username" required="" class="form-control" required="" >
		</div>

		<div class="mb-2">
			<label class="label">Password</label>
			<input type="text" name="password" id="password" required="" class="form-control" required="" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Nama Dokter</label>
			<input type="text" name="nama_admin" id="nama_admin" required="" class="form-control" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Rumah Sakit</label>
			<input type="text" name="rumah_sakit" id="rumah_sakit" required="" class="form-control" autocomplete="off">
		</div>

		<div class="mb-2">
			<input type="submit" name="tambah" value="Selesai" class="btn btn-primary">
			<input type="button" name="kembali" value="Kembali" class="btn btn-danger" onclick="history.back()">
		</div>
	</form>
	<?php
	require('../template/footer.php');
	?>
	</div>
</body>
</html>