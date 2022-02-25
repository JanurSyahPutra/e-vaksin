<?php

include '../fungsi.php';

$id = $_GET["id_admin"];

if (hapusdokter($id)) {
	echo "

		<script>
			alert('Data Berhasil di Hapus');
			document.location.href = 'dokter.php';
		</script>

		";
}else {

	echo "

		<script>
			alert('Data Gagal di Hapus');
			document.location.href = 'dokter.php';
		</script>

		";
}

 ?>