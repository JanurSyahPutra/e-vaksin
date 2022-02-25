<?php

session_start();
include '../fungsi.php';

if (!isset($_SESSION["login_admin"])) {
	header("Location: ../index.php");
	exit;
}

// mendapatkan id berdasarkan baris yang di klik "Edit"
$id=$_GET["id"];
$data= getuserid($id);

$dokter = getalladmin();


if (isset($_POST["edit"])) {

	if (edit($_POST) > 0) {
		echo "

		<script>
			alert('Profil Berhasil di Edit');
			document.location.href = 'halaman_admin.php';
		</script>

		";
	}
	else {
		echo "
		<script>
			alert('Profil Gagal di Edit');
			document.location.href = 'halaman_admin.php';
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
		<input type="hidden" name="password" value="<?php echo $data["password"] ?>">	
		<input type="hidden" name="panggil" value="<?php echo $data["panggil"] ?>">	
		<input type="hidden" name="foto2" value="<?php echo $data["foto"] ?>">

		<div class="mb-2">
			<label class="label">NIK</label>
			<input type="text" name="nik" id="nik" required="" class="form-control" value="<?php echo $data["nik"] ?>" aria-label="Disabled input example" readonly>
		</div>

		<div class="mb-2">
		<label class="label">Foto</label>
			<img width="120" src="../img/<?php echo $data["foto"]?>" name="foto"><input type="file" name="foto">
		</div>

		<div class="mb-2">
			<label class="label">Nama</label>
			<input type="text" name="nama" id="nama" required="" class="form-control" value="<?php echo $data["nama"] ?>" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Tanggal Lahir</label>
			<input type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo $data["tgl_lahir"] ?>" class="form-control" autocomplete="off">
		</div>

		<div class="mb-2">
			<label class="label">Jenis Kelamin</label>
			<select class="form-control" name="jk" id="jk">
				<option selected>Pilih Jenis Kelamin</option>
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

		<div class="mb-2">
			<label class="label">Nama Dokter</label>
			<select class="form-control" name="dokter" id="dokter" aria-label="Disabled select example" disabled>
				<?php foreach ($dokter as $row) :?>
                <?php if ($data["nama_admin"] == $row["nama_admin"]) :?>
                    <option selected value="<?=$row["id_admin"]?>"><?=$row["nama_admin"]?></option>
                <?php else:?>
                    <option value="<?=$row["id_admin"]?>"><?=$row["nama_admin"]?></option>
                <?php endif;?>
            <?php endforeach; ?>
			</select>
		</div>

		<div class="mb-2">
			<label class="label">Tanggal Daftar</label>
			<input type="date" name="waktu_daftar" id="waktu_daftar" value="<?php echo $data["waktu_daftar"] ?>" class="form-control" readonly>
		</div>

		<div class="mb-2">
			<label>Status</label>
			<input type="text" name="status" class="form-control" value="<?php echo $data["status"] ?>" aria-label="Disabled input example" readonly>
		</div>

		<div class="mb-2">
			<label class="label">Tanggal Vaksin</label>
			<input type="date" name="tgl_vaksin" id="tgl_vaksin" value="<?php echo $data["tgl_vaksin"] ?>" class="form-control">
		</div>

		<div class="mb-2">
			<label class="label">Jenis Vaksin</label>
			<input type="text" name="jenis" class="form-control" value="<?php echo $data["jenis"] ?>">
		</div>

		<div class="mb-2">
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