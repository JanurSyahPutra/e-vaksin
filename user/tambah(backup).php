<?php

include '../fungsi.php';


if (isset($_POST["tambah"])) {

	$nik =  $_POST["nik"];
	$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE nik = '$nik'");
	$data = mysqli_fetch_assoc($cek);
	$res = mysqli_num_rows($cek);

	$password = $_POST["password"];

	if ($res != 0) {
		echo "<script>
			alert('Nik Sudah Terdaftar !');
			document.location.href = 'tambah.php';
		</script>";
	} elseif (strlen($password) <= 6 ) {
		echo "<script>
			alert('Password Minimal 6 Karakter !');
			document.location.href = 'tambah.php';
		</script>";
	} else {
			if (tambah ($_POST) > 0) {
		
		echo "

		<script>
			alert('Data Berhasil di Tambahkan');
			document.location.href = 'tambah.php';
		</script>

		";
	}
	else {
		echo "
		<script>
			alert('Data Gagal di Tambahkan');
			document.location.href = 'tambah.php';
		</script>

		";
	}
	}

}

$waktu = date("Y-m-d H:i:s");
$tahun = date("Y");
$tanggal = date("d");
$bulan = date("m");

$mydate=getdate(date("U"));

?>

<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
	<title>Registrasi</title>
</head>
<body>
<div class="container-sm">
		<form action="" method="POST">
		<br>

		<div class="row">
    		<label for="tanggal" class="col-sm-1 col-form-label">Tanggal</label>
    		<div class="col">
      		<input type="text" readonly class="form-control-plaintext" id="tanggal" value="<?php echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]" ;?>">
    		</div>
  		</div>

  		<div class="mb-2">
  			<label class="label">NIK</label>
			<input type="text" name="nik" id="nik" required="" class="form-control" placeholder="NIK" autocomplete="off">
  		</div>

  		<div class="mb-2">
  			<label class="label">Nama</label>
			<input type="text" name="nama" id="nama" required="" class="form-control" placeholder="Nama" autocomplete="off">
  		</div>

  		<div class="mb-2">
			<label class="label">Tanggal Lahir</label>
			<input type="date" name="tgl_lahir" id="tgl_lahir" required="" class="form-control" autocomplete="off">
		</div>

		<div class="mb-2">
		<label class="label">Jenis Kelamin</label>
		<select class="form-select" name="jk" id="jk">
		  <option selected>Jenis Kelamin</option>
		  <option value="Laki-Laki">Laki-Laki</option>
		  <option value="Perempuan">Perempuan</option>
		</select>
		</div>

		<div class="mb-2">
			<label class="label">Alamat</label>
			<input type="text" name="alamat" id="alamat" required="" class="form-control" placeholder="Alamat" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Pekerjaan</label>
			<input type="text" name="pekerjaan" id="pekerjaan" required="" class="form-control" placeholder="Penerima" autocomplete="off">
		</div>

		<label class="label">Password</label>
		<input type="password" name="password" id="password" required="" class="form-control" placeholder="Password" autocomplete="off">
		<div id="passwordHelpBlock" class="form-text">
  			Password minimal 6 harus karakter.
		</div>

		<input type="hidden" name="status" value="Belum Vaksin">

		<input type="hidden" name="waktu_daftar" id="waktu_daftar" required="" class="form-control" value="<?php echo $waktu ?>" aria-label="Disabled input example" readonly>

		<input type="hidden" name="jenis" value="Belum Vaksin">

		<div class="mt-2">
		<input type="submit" name="tambah" value="Tambah" class="btn btn-primary">
		<input type="reset" name="reset" value="Reset" class="btn btn-warning">
		</div>
		
	</form>
	</div>
</body>
</html>
