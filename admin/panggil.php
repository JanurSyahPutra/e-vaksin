<?php

include '../fungsi.php';

// mendapatkan id berdasarkan baris yang di klik "panggil"
$id = $_GET["id"];

// untuk mengubah status panggilan yang tadinya "Belum Dipanggil" jadi "Sudah Dipanggil" berdasarkan baris yang diklik "panggil"
$sql = "UPDATE user, user_all SET user.panggil = 'Sudah Dipanggil', user_all.panggil = 'Sudah Dipanggil' WHERE user.id = '$id'";
if(mysqli_query($koneksi, $sql)){
	echo "<script>
		alert('Pemanggilan Pasien Untuk Vaksin Berhasil!')
		document.location.href = 'halaman_admin.php';
		</script>";
}

?>