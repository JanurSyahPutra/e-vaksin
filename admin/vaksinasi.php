<?php

include '../fungsi.php';

// mendapatkan id berdasarkan baris yang di klik "verifikasi"
$id = $_GET["id"];

// mendapatkan tanggal hari ini (tgl vaksinasi)
$tgl_vaksin = date("Y-m-d");

// untuk mengubah status vaksin yang tadinya "Belum Vaksin" jadi "Sudah Vaksin" berdasarkan baris yang diklik "verifikasi"

// untuk mengubah jenis vaksin yang tadinya "kosong" jadi "Sinovac" berdasarkan baris yang diklik "verifikasi"

// untuk mengubah tanggal vaksin yang tadinya "kosong" jadi "tanggal vaksin" berdasarkan baris yang diklik "verifikasi"
$sql = "UPDATE user, user_all SET user.status = 'Sudah Vaksin', user_all.status = 'Sudah Vaksin', user.jenis = 'SINOVAC', user_all.jenis = 'SINOVAC', user.tgl_vaksin = '$tgl_vaksin', user_all.tgl_vaksin = '$tgl_vaksin' WHERE user.id = '$id'";
if(mysqli_query($koneksi, $sql)){
	echo "<script>
		alert('Verifikasi Vaksin Berhasil')
		document.location.href = 'halaman_admin.php';
		</script>";
}

?>