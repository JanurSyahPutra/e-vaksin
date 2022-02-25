<?php

session_start();

if (isset($_SESSION["userid"])) {
	header("Location: user/halaman_user.php");
}

if (isset($_SESSION["adminid"])) {
	header("Location: admin/halaman_admin.php");
}

if (isset($_SESSION["superid"])) {
	header("Location: superadmin/halaman_super.php");
}

include 'fungsi.php';

if (isset($_POST["login"])) {

	$nik = $_POST["nik"];
	$password = $_POST["password"];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE nik = '$nik' AND password = '$password' ");

	$data = mysqli_fetch_assoc($cek); //menyeleksi kolom sesuai yang telah ditentukan
	$res = mysqli_num_rows($cek); //menghitung seluruh kolom

	if ($res == 1) {
		$_SESSION['userid']= $data['id'];
		$_SESSION["login"] = true;

		header("Location: user/halaman_user.php");
		exit;
	}

	$error = true;

}

if (isset($_POST["regis"])) {

	$nik =  $_POST["nik"];
	$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE nik = $nik");
	// $data = mysqli_fetch_assoc($cek);
	$res = mysqli_num_rows($cek);

	$password = $_POST["password"];

	if ($res != 0) {
		echo "<script>
			alert('Nik Sudah Terdaftar !');
			document.location.href = 'index.php';
		</script>";
	} elseif (strlen($password) < 6 ) {  //menghitung jumlah karakter yang diinputkan strlen
		echo "<script>
			alert('Password Minimal 6 Karakter !');
			document.location.href = 'index.php';
		</script>";
	} else {
			if (regis ($_POST) > 0) {
		
		echo "
		<script>
			alert('Data Berhasil di Tambahkan');
			document.location.href = 'index.php';
		</script>

		";
	}
	else {
		echo "
		<script>
			alert('Data Gagal di Tambahkan');
			document.location.href = 'index.php';
		</script>

		";
	}
	}
}

if (isset($_POST["login_admin"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

	$data = mysqli_fetch_assoc($cek);
	$res = mysqli_num_rows($cek);

	if ($res == 1) {
		$_SESSION['adminid']= $data['id_admin'];
		$_SESSION["login_admin"] = true;

		header("Location: admin/halaman_admin.php");
		
	} else {
		echo "<script>
			alert('Gagal Login Sebagai Dokter !');
			document.location.href = 'index.php';
		</script>";
	}

}

if (isset($_POST["login_superadmin"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM bener_admin WHERE username = '$username' AND password = '$password'");

	$data = mysqli_fetch_assoc($cek);
	$res = mysqli_num_rows($cek);

	if ($res == 1) {
		$_SESSION['superid']= $data['id'];
		$_SESSION["login_superadmin"] = true;

		header("Location: superadmin/halaman_super.php");
		
	} else {
		echo "<script>
			alert('Gagal Login Sebagai Admin !');
			document.location.href = 'index.php';
		</script>";
	}

}


$waktu = date("Y-m-d");
$dokter = getalladmin();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <link rel="icon" type="image/png" href="icon/vaccine.png">
	<title>E-Vaksin</title>
</head>
<body style="background-image:  url(img/vaksin.jpg); background-repeat: no-repeat;background-size: cover;">
	
	<div class="w-50 p-3 position-absolute top-0 end-0">
	<!-- ACCORDION -->
	<div class="accordion" id="accordionExample">
  	<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Login User
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      	<?php if (isset($error)) : ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
  			<strong>Login Gagal !</strong> Nik atau Password Salah.
  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php endif; ?>
        <form method="POST" action="" class="inpform">

        	<div class="row g-3 align-items-center mb-2">
			  <div class="col-2">
			    <label for="inputPassword6" class="col-form-label">NIK</label>
			  </div>
			  <div class="col-auto">
			    <input type="text" name="nik" id="nik" class="form-control" required="">
			  </div>
			</div>

			<div class="row g-3 align-items-center mb-2">
			  <div class="col-2">
			    <label for="inputPassword6" class="col-form-label">Password</label>
			  </div>
			  <div class="col-auto">
			    <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelpInline" required="">
			  </div>
			</div>
			
		<button type="submit" name="login" class="btn btn-primary">Masuk</button>
		<br>
	</form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Pendaftaran User
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">

      	<form action="" method="POST" enctype="multipart/form-data">
      		<div class="row g-3 align-items-center mb-2">
			  <div class="col-2">
			    <label for="inputPassword6" class="col-form-label">NIK</label>
			  </div>
			  <div class="col-auto">
			    <input type="text" name="nik" id="nik" class="form-control" required="" autocomplete="off">
			  </div>
			</div>

			<div class="row g-3 align-items-center mb-2">
			  <div class="col-2">
			    <label for="inputPassword6" class="col-form-label">Foto User</label>
			  </div>
			  <div class="col-auto">
			    <input type="file" name="foto" required="">
			  </div>
			</div>
			

			<div class="row g-3 align-items-center mb-2">
			  <div class="col-2">
			    <label for="inputPassword6" class="col-form-label">Nama</label>
			  </div>
			  <div class="col-auto">
			    <input type="text" name="nama" id="nama" class="form-control" aria-describedby="passwordHelpInline" required="" autocomplete="off">
			  </div>
			</div>

			<div class="row g-3 align-items-center mb-2">
			  <div class="col-2">
			    <label for="inputPassword6" class="col-form-label">Dokter</label>
			  </div>
			  <div class="col-auto">
			    <select name="dokter" class="form-select" required>
			    	<option value="">Pilih Dokter</option>
                <?php foreach ($dokter as $row) :?>
                    <option value="<?=$row['id_admin']?>"><?=$row['nama_admin']?></option>
                <?php endforeach; ?>
            </select>
			  </div>
			  <div class="col-auto">
    				<span id="passwordHelpInline" class="form-text">
      					Dokter hanya bisa dipilih sekali.
    				</span>
 				 </div>
			</div>

			<div class="row g-3 align-items-center mb-2">
			  <div class="col-2">
			    <label for="inputPassword6" class="col-form-label">Password</label>
			  </div>
			  <div class="col-auto">
			    <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelpInline" required="">
			   <!--  <div id="passwordHelpBlock" class="form-text" style="font-size: 12px;">
  					Password minimal 6 harus karakter.
				</div> -->
			  </div>
			  	<div class="col-auto">
    				<span id="passwordHelpInline" class="form-text">
      					Password minimal 6 karakter.
    				</span>
 				 </div>

			</div>

				<input type="hidden" name="tgl_lahir" value="Kosong">
				<input type="hidden" name="jk" value="Kosong">
				<input type="hidden" name="alamat" value="Kosong">
				<input type="hidden" name="pekerjaan" value="Kosong">
				<input type="hidden" name="status" value="Belum Vaksin">
				<input type="hidden" name="waktu_daftar" value="<?php echo $waktu ?>">
				<input type="hidden" name="jenis" value="Tidak Ada">
				<input type="hidden" name="panggil" value="Belum Dipanggil">
				<input type="hidden" name="tgl_vaksin" value="Belum Vaksin">


			<button type="submit" name="regis" class="btn btn-primary">Daftar</button>
		</form>
        <strong>Daftar Disini !</strong>, untuk mendapatkan nomor antri vaksin dan cetak surat vaksin sebagai bukti sudah melakukan vaksin.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Login Dokter
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      	<?php if (isset($error)) : ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
  			<strong>Login Gagal !</strong> Nik atau Password Salah.
  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php endif; ?>
        <form method="POST" action="" class="inpform">

        	<div class="row g-3 align-items-center mb-2">
			  <div class="col-2">
			    <label for="inputPassword6" class="col-form-label">Username</label>
			  </div>
			  <div class="col-auto">
			    <input type="text" name="username" id="username" class="form-control" required="">
			  </div>
			</div>

			<div class="row g-3 align-items-center mb-2">
			  <div class="col-2">
			    <label for="inputPassword6" class="col-form-label">Password</label>
			  </div>
			  <div class="col-auto">
			    <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelpInline" required="">
			  </div>
			</div>
			
		<button type="submit" name="login_admin" class="btn btn-primary">Masuk</button>
		<br>
	</form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
        Login Admin
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form method="POST" action="">

        	<div class="row g-3 align-items-center mb-2">
			  <div class="col-2">
			    <label for="inputPassword6" class="col-form-label">Username</label>
			  </div>
			  <div class="col-auto">
			    <input type="text" name="username" id="username" class="form-control" required="">
			  </div>
			</div>

			<div class="row g-3 align-items-center mb-2">
			  <div class="col-2">
			    <label for="inputPassword6" class="col-form-label">Password</label>
			  </div>
			  <div class="col-auto">
			    <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelpInline" required="">
			  </div>
			</div>
			
		<button type="submit" name="login_superadmin" class="btn btn-primary">Masuk</button>
		<br>
	</form>
      </div>
    </div>
  </div>
</div>
<?php
	require('template/footer.php');
	?>
	</div>
	
</body>
</html>