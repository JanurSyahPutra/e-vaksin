<?php

session_start();
include '../fungsi.php';

if (!isset($_SESSION["login"])) {
	header("Location: ../index.php");
	exit;
}

// mendapatkan id berdasarkan  user yang sedang login 
$id=$_GET["id"];
$data= getuserid($id);

$dokter = getalladmin();


if (isset($_POST["edit"])) {

	if (edit($_POST) > 0) {
		echo "

		<script>
			alert('Profil Berhasil di Edit');
			document.location.href = 'halaman_user.php';
		</script>

		";
	} else {
		echo "
		<script>
			alert('Profil Gagal di Edit');
			document.location.href = 'halaman_user.php';
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
	<title>E-Vaksin | Edit</title>
</head>
<body>
<div class="container-sm mt-5 w-75">
		<form action="" method="POST" enctype="multipart/form-data">

		<input type="hidden" name="id" value="<?php echo $data["id"] ?>">
		<input type="hidden" name="foto2" value="<?php echo $data["foto"] ?>">

		<div class="mb-2">
			<label class="label">NIK</label>
			<input type="text" name="nik" id="nik" required="" class="form-control" value="<?php echo $data["nik"] ?>" aria-label="Disabled input example" readonly>
		</div>

		<div>
		<label class="label">Foto</label>
			<img width="120" src="../img/<?php echo $data["foto"]?>">
			<input type="file" name="foto" id="foto">
		</div>

		<div class="mb-2">
			<label class="label">Nama</label>
			<input type="text" name="nama" id="nama" required="" class="form-control" value="<?php echo $data["nama"] ?>" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Password</label>
			<input type="text" name="password" id="password" required="" class="form-control" value="<?php echo $data["password"] ?>" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Tanggal Lahir</label>
			<input type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo $data["tgl_lahir"] ?>" class="form-control" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Jenis Kelamin</label>
			<select class="form-select" name="jk" id="jk">
				<option selected>Pilih Jenis Kelamin...</option>
				<option value="Laki-Laki" <?php if ($data["jk"] == "Laki-Laki") {
					echo "selected"; } ?> >Laki-Laki</option>
				<option value="Perempuan" <?php if ($data["jk"] == "Perempuan") {
					echo "selected"; } ?> >Perempuan</option>
			</select>
		</div>

		<div class="mb-2">
			<label class="label">Alamat</label>
			<input type="text" name="alamat" id="alamat" required="" class="form-control" value="<?php echo $data["alamat"] ?>"  autocomplete="off">
		</div>
		
		<div class="mb-2">
			<label class="label">Pekerjaan</label>
			<input type="text" name="pekerjaan" id="pekerjaan" required="" class="form-control" value="<?php echo $data["pekerjaan"] ?>" autocomplete="off">
		</div>


		<label>Status</label>
		<input type="text" name="status" class="form-control" value="<?php echo $data["status"] ?>" aria-label="Disabled input example" readonly>

		<input type="hidden" name="jenis" value="<?php echo $data["jenis"] ?>">
		<input type="hidden" name="panggil" value="<?php echo $data["panggil"] ?>">

		<div class="mt-2 mb-2">
			<input type="submit" name="edit" value="Selesai" class="btn btn-primary">
			<input type="button" name="kembali" value="Kembali" class="btn btn-danger" onclick="history.back()">
		</div>
	</form>
	<?php
	require('../template/footer.php');
	?>
	</div>
</body>
</html>