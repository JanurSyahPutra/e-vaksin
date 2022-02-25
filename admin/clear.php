<?php

session_start();
if (!isset($_SESSION["login_admin"])) {
	header("Location: login.php");
	exit;
} 

include '../fungsi.php';
$dokter_id = $_SESSION["adminid"];

if (clearById($dokter_id)) {
	echo "
		<script>
			alert('Data Berhasil di clear');
			document.location.href = 'halaman_admin.php';
		</script>

		";
}else {

	echo "

		<script>
			alert('Data Gagal di clear');
			document.location.href = 'halaman_admin.php';
		</script>

		";
}

 ?>