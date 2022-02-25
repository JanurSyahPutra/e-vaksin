<?php
session_start();
if (!isset($_SESSION["login"])) {
	echo "

		<script>
			alert('Error');
			document.location.href = 'user/halaman_user.php';
		</script>

		";
	// header("Location: login.php");
	// exit;
} else {
	session_start();
	session_unset();
	session_destroy();
	header("Location: index.php");
	exit;
}

if (!isset($_SESSION["login_admin"])) {
	echo "

		<script>
			alert('Error');
			document.location.href = 'admin/halaman_admin.php';
		</script>

		";
	// header("Location: login.php");
	// exit;
} else {
	session_start();
	session_unset();
	session_destroy();
	header("Location: index.php");
	exit;
}

if (!isset($_SESSION["login_superadmin"])) {
	echo "

		<script>
			alert('Error');
			document.location.href = 'superadmin/halaman_super.php';
		</script>

		";
	// header("Location: login.php");
	// exit;
} else {
	session_start();
	session_unset();
	session_destroy();
	header("Location: index.php");
	exit;
}

?>