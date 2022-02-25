<?php 

session_start();
include '../fungsi.php';

if (!isset($_SESSION["login"])) {
	header("Location: ../index.php");
	exit;
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
	<title>E-Vaksin | Bantuan</title>
</head>
<body>
	<div class="container mt-5">
		<?php
	require('../template/navbar_user.php');
	?>
	<div class="card mt-2">
  		<div class="card-body">
  			<h5 class="card-title" style="color: #18b3ab;">Petunjuk</h5>
  			<ol>
				<li class="mb-1">Setelah Anda berhasil Login WEB E-Vaksin, jika Anda belum melengkapi data Kartu Vaksinisasi Covid-19 pastikan Anda telah menyiapkan KTP atau data diri Anda untuk mempermudah proses pengisian.</li>
				<li class="mb-1">Tekan tombol Ubah pada halaman data kartu Vaksinisasi Covid-19 untuk mengisi atau merubah data diri.</li>
				<li class="mb-1">Ubah sesuai data diri Anda, setelah Anda yakin kemudian tekan tombol Selesai pada halaman edit data untuk verifikasi data Anda.</li>
				<li class="mb-1">Setelah data berhasil diubah, anda hanya harus menunggu panggil dari dokter yang dipilih.</li>
				<li>Surat vaksin hanya bisa di cetak saat anda sudah vaksin dah sudah diverifikasi oleh dokter.</li>
			</ol>
			<blockquote class="blockquote mb-0 text-end">
          <footer class="blockquote-footer"><cite title="Source Title">Penanggung Jawab Vaksin</cite></footer>
        </blockquote>
  		</div>
  	</div>

  	<?php
	require('../template/footer.php');
	?>
	</div>
</body>
</html>