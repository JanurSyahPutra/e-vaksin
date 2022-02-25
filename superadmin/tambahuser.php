<?php

session_start();
include '../fungsi.php';

if (!isset($_SESSION["login_superadmin"])) {
	header("Location: ../index.php");
	exit;
}


if (isset($_POST["tambah"])) {

	$nik =  $_POST["nik"];
	$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE nik = '$nik'");
	$data = mysqli_fetch_assoc($cek);
	$res = mysqli_num_rows($cek);

	$password = $_POST["password"];

	if ($res != 0) {
		echo "<script>
			alert('Nik Sudah Terdaftar !');
			document.location.href = 'user.php';
		</script>";
	} elseif (strlen($password) < 6 ) {
		echo "<script>
			alert('Password Minimal 6 Karakter !');
			document.location.href = 'yser.php';
		</script>";
	} else {
			if (tambah ($_POST) > 0) {
		
		echo "

		<script>
			alert('Data Berhasil di Tambahkan');
			document.location.href = 'user.php';
		</script>

		";
	}
	else {
		echo "
		<script>
			alert('Data Gagal di Tambahkan');
			document.location.href = 'user.php';
		</script>

		";
	}
	}

}

$waktu = date("Y-m-d");

$mydate=getdate(date("U"));

$dokter = getalladmin();


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
	<title>E-Vaksin | Tambah User</title>
</head>
<body>
<div class="container-sm mt-5 w-75">
		<form action="" method="POST" enctype="multipart/form-data">
		<br>

		<div class="mb-2">
			<label class="label">NIK</label>
			<input type="text" name="nik" id="nik" required="" class="form-control" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Foto</label>
			<input type="file" name="foto" id="foto" required="">
		</div>

		<div class="mb-2">
			<label class="label">Password</label>
			<input type="password" name="password" id="password" required="" class="form-control" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Nama</label>
			<input type="text" name="nama" id="nama" required="" class="form-control" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Tanggal Lahir</label>
			<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required="" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Jenis Kelamin</label>
			<select class="form-select" name="jk" id="jk">
			  <option selected>Pilih Jenis Kelamin</option>
			  <option value="Laki-Laki">Laki-Laki</option>
			  <option value="Perempuan">Perempuan</option>
			</select>
		</div>

		<div class="mb-2">
			<label class="label">Alamat</label>
			<input type="text" name="alamat" id="alamat" required="" class="form-control" autocomplete="off">
		</div>
		
		<div class="mb-2">
			<label class="label">Pekerjaan</label>
			<input type="text" name="pekerjaan" id="pekerjaan" required="" class="form-control" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Nama Dokter</label>
			<select name="dokter" class="form-select" required>
			    	<option value="">Pilih Dokter</option>
                <?php foreach ($dokter as $row) :?>
                    <option value="<?=$row['id_admin']?>"><?=$row['nama_admin']?></option>
                <?php endforeach; ?>
            </select>
			</select>
		</div>

		<div class="mb-2">
			<label class="label">Tanggal Daftar</label>
			<input type="date" name="waktu_daftar" id="waktu_daftar" value="<?php echo $waktu ?>" class="form-control" readonly>
		</div>

		<div class="mb-2">
			<label>Status</label>
			<input type="text" name="status" class="form-control" value="Belum Vaksin" aria-label="Disabled input example" readonly>
		</div>

		<div class="mb-2">
			<label class="label">Tanggal Vaksin</label>
			<input type="date" name="tgl_vaksin" id="tgl_vaksin" value="Belum Vaksin" class="form-control" readonly>
		</div>

		<div class="mb-2">
			<label class="label">Jenis Vaksin</label>
			<input type="text" name="jenis" class="form-control" value="Tidak Ada" readonly>
		</div>

		<div class="mb-2">
			<label class="label">Status Pemanggilan</label>
			<input type="text" name="panggil" class="form-control" value="Belum Dipanggil" readonly>
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
