<?php

// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit;
// } 

include '../fungsi.php';

// mendapatkan id berdasarkan baris yang di klik "hapus"
$id = $_GET["id"];

if (hapus ($id)) {
	echo "

		<script>
			alert('Data Berhasil di Hapus');
			document.location.href = 'halaman_admin.php';
		</script>

		";
}else {

	echo "

		<script>
			alert('Data Gagal di Hapus');
			document.location.href = 'halaman_admin.php';
		</script>

		";
}

 ?>