<?php

$koneksi = mysqli_connect("localhost","root","","db_vaksin");

function query($query){
	global $koneksi;
	$res = mysqli_query($koneksi, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($res)){
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data){
	global $koneksi;

	$nik = htmlspecialchars($data["nik"]);

	$foto = upload();
	if (!$foto) {
		return false;
	}

	$pass = htmlspecialchars($data["password"]);
	$nama = htmlspecialchars($data["nama"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$jk = htmlspecialchars($data["jk"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$pekerjaan = htmlspecialchars($data["pekerjaan"]);
	$status = htmlspecialchars($data["status"]);
	$tanggal = htmlspecialchars($data["waktu_daftar"]);
	$jenis = htmlspecialchars($data["jenis"]);
	$tgl_vaksin = htmlspecialchars($data["tgl_vaksin"]);
	$panggil = htmlspecialchars($data["panggil"]);
	$dokter = htmlspecialchars($data["dokter"]);

	$tambah = "INSERT INTO user
		values 
	('','$nik','$foto','$pass','$nama','$tgl_lahir','$jk','$alamat','$pekerjaan','$status','$tanggal','$jenis','$tgl_vaksin','$panggil','$dokter')";
	mysqli_query($koneksi, $tambah);	
	
	$tambah_all = "INSERT INTO user_all
		values 
	('','$nik','$foto','$pass','$nama','$tgl_lahir','$jk','$alamat','$pekerjaan','$status','$tanggal','$jenis','$tgl_vaksin','$panggil','$dokter')";
	mysqli_query($koneksi, $tambah_all);

	return mysqli_affected_rows($koneksi);
}

function regis($data){
	global $koneksi;

	$nik = htmlspecialchars($data["nik"]);

	$foto = upload_regis();
	if (!$foto) {
		return false;
	}

	$pass = htmlspecialchars($data["password"]);
	$nama = htmlspecialchars($data["nama"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$jk = htmlspecialchars($data["jk"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$pekerjaan = htmlspecialchars($data["pekerjaan"]);
	$status = htmlspecialchars($data["status"]);
	$tanggal = htmlspecialchars($data["waktu_daftar"]);
	$jenis = htmlspecialchars($data["jenis"]);
	$tgl_vaksin = htmlspecialchars($data["tgl_vaksin"]);
	$panggil = htmlspecialchars($data["panggil"]);
	$dokter = htmlspecialchars($data["dokter"]);

	$tambah = "INSERT INTO user
		values 
	('','$nik','$foto','$pass','$nama','$tgl_lahir','$jk','$alamat','$pekerjaan','$status','$tanggal','$jenis','$tgl_vaksin','$panggil','$dokter')";
	mysqli_query($koneksi, $tambah);	
	
	$tambah_all = "INSERT INTO user_all
		values 
	('','$nik','$foto','$pass','$nama','$tgl_lahir','$jk','$alamat','$pekerjaan','$status','$tanggal','$jenis','$tgl_vaksin','$panggil','$dokter')";
	mysqli_query($koneksi, $tambah_all);

	return mysqli_affected_rows($koneksi);
}

function edit($data){
	global $koneksi;
	$Id = $data["id"];
	$nik = htmlspecialchars($data["nik"]); 

	$foto2 = htmlspecialchars($data["foto2"]);

 	//cek apakah upload gambar baru
 	if ($_FILES["foto"]["error"]===4) {
 		$foto = $foto2;
 	} else {
 		$foto = upload();
 	}

	$pass = htmlspecialchars($data["password"]); 
	$nama = htmlspecialchars($data["nama"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$jk = htmlspecialchars($data["jk"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$pekerjaan = htmlspecialchars($data["pekerjaan"]);
	$status = htmlspecialchars($data["status"]);
	$jenis = htmlspecialchars($data["jenis"]);
	$panggil = htmlspecialchars($data["panggil"]);

	$query = "UPDATE user, user_all SET user.nik = '$nik', user_all.nik = '$nik', user.foto = '$foto', user_all.foto = '$foto', user.password = '$pass', user_all.password = '$pass', user.nama = '$nama', user_all.nama = '$nama', user.tgl_lahir = '$tgl_lahir', user_all.tgl_lahir = '$tgl_lahir', user.jk = '$jk', user_all.jk = '$jk', user.alamat = '$alamat', user_all.alamat = '$alamat', user.pekerjaan = '$pekerjaan', user_all.pekerjaan = '$pekerjaan', user.status = '$status', user_all.status = '$status', user.jenis = '$jenis', user_all.jenis = '$jenis', user.panggil = '$panggil', user_all.panggil = '$panggil' WHERE user.id = '$Id' ";
	// $query = "UPDATE user SET nik = '$nik', foto = '$foto', password = '$pass', nama = '$nama', tgl_lahir = '$tgl_lahir', jk = '$jk', alamat = '$alamat', pekerjaan = '$pekerjaan', status = '$status', jenis = '$jenis', panggil = '$panggil' WHERE id = '$Id' ";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function edituserall($data){
	global $koneksi;
	$Id = $data["id"];
	$nik = htmlspecialchars($data["nik"]); 

	$foto2 = htmlspecialchars($data["foto2"]);

	if ($_FILES["foto"]["error"]===4) {
 		$foto = $foto2;
 	} else {
 		$foto = upload();
 	}

	$pass = htmlspecialchars($data["password"]); 
	$nama = htmlspecialchars($data["nama"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$jk = htmlspecialchars($data["jk"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$pekerjaan = htmlspecialchars($data["pekerjaan"]);
	$status = htmlspecialchars($data["status"]);
	$jenis = htmlspecialchars($data["jenis"]);
	$panggil = htmlspecialchars($data["panggil"]);
	$dokter = htmlspecialchars($data["dokter"]);

	$query = "UPDATE user_all SET nik = '$nik', foto = '$foto', password = '$pass', nama = '$nama', tgl_lahir = '$tgl_lahir', jk = '$jk', alamat = '$alamat', pekerjaan = '$pekerjaan', status = '$status', jenis = '$jenis', panggil = '$panggil', dokter = '$dokter' WHERE id = '$Id' ";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapus($id){

	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM user WHERE id = $id");
	return mysqli_affected_rows($koneksi);
}

function hapusall($id){

	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM user_all WHERE id = $id");
	return mysqli_affected_rows($koneksi);

}

function upload(){

	$namafile = $_FILES["foto"]["name"];
	$ukuranfile = $_FILES["foto"]["size"];
	$error = $_FILES["foto"]["error"];
	$tmpName = $_FILES["foto"]["tmp_name"];

	//cek apakah tidak ada gambar yang diupload 
	if ($error===4) {
		echo "<script>
		alert('pilih gambar')</script>";
		return false;
	}

	//cek ekstensi 
	$ekstensi = ['jpg','jpeg','png'];
	$format = explode('.', $namafile);
	$format = strtolower(end($format));

	 
	$namafile1 = uniqid();
	$namafile1 .= '.';
	$namafile1 .= $format;
	move_uploaded_file($tmpName, '../img/'.$namafile1);
	return $namafile1;
}

function upload_regis(){

	$namafile = $_FILES["foto"]["name"];
	$ukuranfile = $_FILES["foto"]["size"];
	$error = $_FILES["foto"]["error"];
	$tmpName = $_FILES["foto"]["tmp_name"];

	//cek apakah tidak ada gambar yang diupload 
	if ($error===4) {
		echo "<script>
		alert('pilih gambar')</script>";
		return false;
	}

	//cek ekstensi 
	$ekstensi = ['jpg','jpeg','png'];
	$format = explode('.', $namafile);
	$format = strtolower(end($format));

	 
	$namafile1 = uniqid();
	$namafile1 .= '.';
	$namafile1 .= $format;
	move_uploaded_file($tmpName, 'img/'.$namafile1);
	return $namafile1;
}

function tambahdokter($data){

	global $koneksi;
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$nama_admin = htmlspecialchars($data["nama_admin"]);
	$rs = htmlspecialchars($data["rumah_sakit"]);

	$tambah = "INSERT INTO admin values ('','$username','$password','$nama_admin','$rs')";
	mysqli_query($koneksi, $tambah);

	return mysqli_affected_rows($koneksi);

}

function hapusdokter($id){

	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$id' ");
	return mysqli_affected_rows($koneksi);
}

// function getuserid($id){
// 	global $koneksi;
//     $query = "SELECT * FROM user WHERE id = $id";
//     $result = mysqli_query($koneksi, $query);
//     return mysqli_fetch_assoc($result);
// }

function getuserid($id){
	global $koneksi;
    $query = "SELECT user.id, user.nik, user.foto, user.password, user.nama, user.tgl_lahir, user.jk, user.alamat, user.pekerjaan, user.status, user.waktu_daftar, user.jenis, user.tgl_vaksin, user.panggil, admin.nama_admin, admin.rumah_sakit FROM user LEFT JOIN admin ON user.dokter = admin.id_admin WHERE user.id = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function getuserallid($id){
	global $koneksi;
    $query = "SELECT user_all.id, user_all.nik, user_all.foto, user_all.password, user_all.nama, user_all.tgl_lahir, user_all.jk, user_all.alamat, user_all.pekerjaan, user_all.status, user_all.waktu_daftar, user_all.jenis, user_all.tgl_vaksin, user_all.panggil, admin.nama_admin, admin.rumah_sakit FROM user_all LEFT JOIN admin ON user_all.dokter = admin.id_admin WHERE user_all.id = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function getUserByDokter($dokter_id){
	global $koneksi;
	$query = "SELECT user.id, user.nik, user.password, user.nama, user.tgl_lahir, user.jk, user.alamat, user.pekerjaan, user.status, user.waktu_daftar, user.jenis, user.tgl_vaksin, user.panggil, user.dokter FROM user RIGHT JOIN admin ON user.dokter = admin.id_admin WHERE admin.id_admin = $dokter_id";
	$result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function getadminid($id){
	global $koneksi;
    $query = "SELECT * FROM admin WHERE id_admin = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function getsuperadminid($id){
	global $koneksi;
    $query = "SELECT * FROM bener_admin WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function getalluser()
{
    global $koneksi;
    $sql = "SELECT user.id, user.nik, user.password, user.nama, user.tgl_lahir, user.jk, user.alamat, user.pekerjaan, user.status, user.waktu_daftar, user.jenis, user.tgl_vaksin, user.panggil, admin.nama_admin FROM user LEFT JOIN admin ON user.dokter = admin.id_admin ORDER BY admin.nama_admin, admin.rumah_sakit, user.nama";
    $result = mysqli_query($koneksi, $sql);
    $rows =[];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]= $row;
	}
	return $rows;
}

function getalladmin(){
	global $koneksi;
    $sql = "SELECT * FROM admin ORDER BY nama_admin";
    $result = mysqli_query($koneksi, $sql);
    $rows =[];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]= $row;
	}
	return $rows;
}

function getUserbyAdmin($id)
{
    global $koneksi;
    $sql = "SELECT user.id, user.nik, user.nama, user.foto, user.jk, user.waktu_daftar, user.tgl_vaksin, user.jenis, user.status, user.panggil, admin.nama_admin FROM user LEFT JOIN admin ON user.dokter = admin.id_admin WHERE admin.id_admin = '$id' LIMIT 10";
    $result = mysqli_query($koneksi, $sql);
    $rows =[];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]= $row;
	}
	return $rows;
}

function getdokterbyid($id){
	global $koneksi;
	$sql = "SELECT * FROM admin WHERE id_admin = $id";
	$result = mysqli_query($koneksi, $sql);
	return mysqli_fetch_assoc($result);
}

function editdokter($data){
	global $koneksi;
	$id = $data["id_admin"];
	$username = htmlspecialchars($data["username"]);  
	$password = htmlspecialchars($data["password"]);
	$namaadmin = htmlspecialchars($data["nama_admin"]);
	$rs = htmlspecialchars($data["rumah_sakit"]);

	$query = "UPDATE admin SET username = '$username', password = '$password', nama_admin = '$namaadmin', rumah_sakit = '$rs' WHERE id_admin = '$id' ";
	mysqli_query($koneksi, $query);
	return mysqli_affected_rows($koneksi);
}

function getDokById($id){
	global $koneksi;
	$query = "SELECT * FROM admin WHERE id_admin IN (SELECT id FROM user WHERE id = $id )";
	mysqli_query($koneksi, $query);
	return mysqli_affected_rows($koneksi);

}

?>