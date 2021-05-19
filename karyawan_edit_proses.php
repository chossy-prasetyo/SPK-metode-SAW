<?php
session_start();

// jika tidak ada session login, jangan izinkan halaman ini diakses
if(!isset($_SESSION['login'])){
	header('Location: index.php');
	exit;
}

include 'koneksi.php';

// tangkap semua input
$kd				= $_POST['kd'];
$nama			= htmlspecialchars($_POST['nama']);
$nipy			= htmlspecialchars($_POST['nipy']);
$gender		= htmlspecialchars($_POST['gender']);
$tmplahir	= htmlspecialchars($_POST['tmplahir']);
$tgllahir	= htmlspecialchars($_POST['tgllahir']);
$fotoLama	= $_POST['fotolama'];

// pakai foto lama jika tidak ada foto baru
// pakai foto baru jika diupload
if($_FILES['foto']['error'] == 4){

	// tangkap nama foto lama berdasarkan gender
	if($gender == 'Ikhwan'){
		$foto = 'ikhwan.jpg';
	} else{
		$foto = 'akhwat.jpg';
	}
} else{

	// tangkap properti foto baru yg diupload
	$namaFoto 	= $_FILES['foto']['name'];
	$errorFoto	= $_FILES['foto']['error'];
	$tmpFoto		= $_FILES['foto']['tmp_name'];

	// Lakukan Validasi Foto Baru yang Diupload

	// tentukan jenis file yg boleh diupload (foto)
	$ekstensiLegalFoto = ['jpg','jpeg','png'];

	// ambil ekstensi file yg diupload
	$ekstensiFoto = explode('.',$namaFoto);
	$ekstensiFoto = strtolower(end($ekstensiFoto));

	// beri peringatan jika file yg diupload bukan foto
	if(!in_array($ekstensiFoto,$ekstensiLegalFoto)){
		echo "<script>
						alert('yang diupload bukan foto!');
						document.location.href = 'karyawan_edit.php';
					</script>";
		die;
	}

	// buat nama baru untuk foto baru yg diupload
	$namaBaruFoto = uniqid();
	$namaBaruFoto .= '.';
	$namaBaruFoto .= $ekstensiFoto;

	// simpan terlebih dahulu foto baru yg diupload
	move_uploaded_file($tmpFoto,'img/'.$namaBaruFoto);

	// tangkap nama baru foto baru yg diupload
	$foto = $namaBaruFoto;
}

// update data karyawan ini dg data baru di database
$query = "UPDATE calonguru SET
						nama 			= '$nama',
						nipy 			= '$nipy',
						gender 		= '$gender',
						tmplahir	= '$tmplahir',
						tgllahir	= '$tgllahir',
						foto 			= '$foto'
					WHERE kd=$kd";
mysqli_query($kon,$query);

// beri pemberitahuan jika berhasil, beri peringatan jika gagal
if(mysqli_affected_rows($kon) > 0){
	echo "<script>
					alert('data karyawan berhasil diubah');
					document.location.href = 'karyawan.php';
				</script>";
} else{
	echo "<script>
					alert('data karyawan gagal diubah');
				</script>";
}	 
?>