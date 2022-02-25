<?php

include '../fungsi.php';

$id = $_GET["id"];

if (hapusall ($id)) {
	echo "

		<script>
			alert('Data Berhasil di Hapus');
			document.location.href = 'user.php';
		</script>

		";
}else {

	echo "

		<script>
			alert('Data Gagal di Hapus');
			document.location.href = 'user.php';
		</script>

		";
}

 ?>