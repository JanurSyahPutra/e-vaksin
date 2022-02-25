<?php

session_start();

if (isset($_SESSION["userid"])) {
	header("Location: user/halaman_user.php");
}

include 'fungsi.php';

if (isset($_POST["login"])) {

	$nik = $_POST["nik"];
	$password = $_POST["password"];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE nik = '$nik' AND password = '$password'");

	$data = mysqli_fetch_assoc($cek);
	$res = mysqli_num_rows($cek);

	if ($res == 1) {
		$_SESSION['userid']= $data['id'];
		$_SESSION["login"] = true;

		header("Location: user/halaman_user.php");
		exit;
	}

	$error = true;

}

?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
	<title>Login</title>
</head>
<body>
	<form method="POST" action="" class="inpform">
		<label>Nik</label>
		<input type="text" name="nik" id="nik" class="forminput" autocomplete="off" required="">

		<br>

		<label>Password</label>
		<input type="password" name="password" id="password" class="forminput" required="">

		<button type="submit" name="login" class="tombolsign">Sign in</button>
		<button type="button" name="login" class="tombolregis" id="myBtn">Registrasi</button>
		<br>
		</p>
		<a href="index.php" class="beranda">Kembali Ke Beranda</a>
		<div class="garis3"></div>
	</form>
</main>
</body>
</html>