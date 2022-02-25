<?php

include '../fungsi.php';

// mendapatkan id berdasarkan baris yang di klik "batal"
$id = $_GET["id"];

// untuk mengubah status panggilan yang tadinya "Sudah Dipanggil" jadi "Belum Dipanggil" berdasarkan baris yang diklik "batal"
$sql = "UPDATE user, user_all SET user.panggil = 'Belum Dipanggil', user_all.panggil = 'Belum Dipanggil' WHERE user.id = '$id'";
if(mysqli_query($koneksi, $sql)){
	echo "<script>
		alert('Pembatalan Pasien Untuk Vaksin Berhasil!')
		document.location.href = 'halaman_admin.php';
		</script>";
}

?>