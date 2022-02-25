<?php

session_start();
include '../fungsi.php';

if (!isset($_SESSION["login_superadmin"])) {
	header("Location: ../index.php");
	exit;
}

$id=$_SESSION["superid"];
$admin = getsuperadminid($id);

// $cek = mysqli_query($koneksi, "SELECT * FROM user_all");
// $data = mysqli_fetch_assoc($cek);

$cek_belum = count(query("SELECT * FROM user_all WHERE status = 'Belum Vaksin' "));
// $res = mysqli_num_rows($cek);


$cek_sudah = count(query("SELECT * FROM user_all WHERE status = 'Sudah Vaksin' "));
// $res2 = mysqli_num_rows($cek2);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
     <script src="../js/Chart.js"></script>

    <link rel="icon" type="image/png" href="../icon/vaccine.png">
	<title>E-Vaksin | Beranda</title>
</head>
<body>
	<div class="container mt-5">
		<?php
	require('../template/navbar_superadmin.php');
	?>

	<div class="alert alert-success mt-2" role="alert">
	  <h4 class="alert-heading">Hai, <?php echo $admin["nama"] ?></h4>
	  <p>Selamat datang di halaman admin.</p>
	  <hr>
	  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
	</div>

  <div class="card mt-2">
    <h3 class="text-center mb-2">Presentasi jumlah yang melakukan vaksin dan yang belum melakukan vaksin</h3>
	<canvas id="inicanvas"></canvas>
    <script>
 
        var ctx = document.getElementById("inicanvas").getContext("2d");
        // tampilan chart
        var piechart = new Chart(ctx,{type: 'pie',
          data : {
        // label nama setiap Value
        labels:[
                  'Sudah Vaksin',
                  'Belum Vaksin'
          ],
        datasets: [{
          // Jumlah Value yang ditampilkan
           data:[<?php echo $cek_sudah ?>, <?php echo $cek_belum ?>],
 
          backgroundColor:[
                 'rgba(164, 255, 118, 0.5)',
                 'rgba(255, 118, 130, 0.5)'
                 ]
        }],
        }
        });
 
    </script>
  </div>
	<?php
	require('../template/footer.php');
	?>
</div>
</body>
</html>