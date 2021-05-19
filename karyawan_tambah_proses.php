<?php 
session_start();

// jika tidak ada session login, jangan izinkan halaman ini diakses
if(!isset($_SESSION['login'])){
	header('Location: index.php');
	exit;
}

include 'koneksi.php';

// tangkap semua input
$nama 		= htmlspecialchars($_POST['nama']);
$nipy			= htmlspecialchars($_POST['nipy']);
$gender		= htmlspecialchars($_POST['gender']);
$tmplahir	= htmlspecialchars($_POST['tmplahir']);
$tgllahir = htmlspecialchars($_POST['tgllahir']);

$namaFoto 	= $_FILES['foto']['name'];
$errorFoto	= $_FILES['foto']['error'];
$tmpFoto		= $_FILES['foto']['tmp_name'];

// jika tidak ada foto yg diupload, pakai foto default
// jika ada foto diupload, pakai foto tersebut
if($errorFoto === 4){
	if($gender == 'Ikhwan'){
		$foto = 'ikhwan.jpg';
	} else{
		$foto = 'akhwat.jpg';
	}
} else{
	// Lakukan Validasi Foto yang Diupload

	// tentukan jenis file yg boleh diupload (foto)
	$ekstensiLegalFoto = ['jpg','jpeg','png'];

	// ambil ekstensi file yg diupload
	$ekstensiFoto = explode('.',$namaFoto);
	$ekstensiFoto = strtolower(end($ekstensiFoto));

	// beri peringatan jika file yg diupload bukan foto
	if(!in_array($ekstensiFoto,$ekstensiLegalFoto)){
		echo "<script>
						alert('yang diupload bukan foto!');
						document.location.href = 'karyawan_tambah.php';
					</script>";
		die;
	}

	// buat nama baru untuk foto yg diupload
	$namaBaruFoto = uniqid();
	$namaBaruFoto .= '.';
	$namaBaruFoto .= $ekstensiFoto;

	// simpan terlebih dahulu foto yg diupload
	move_uploaded_file($tmpFoto,'img/'.$namaBaruFoto);

	// tangkap nama baru foto yg diupload
	$foto = $namaBaruFoto;
}


// tambahkan data karyawan baru ini ke database
$query = "INSERT INTO calonguru VALUES
					('','$nama','$nipy','$gender','$tmplahir','$tgllahir','$foto')";
mysqli_query($kon,$query);

// beri pemberitahuan jika berhasil, beri peringatan jika gagal
if(mysqli_affected_rows($kon) > 0){
	echo "<script>
					alert('karyawan baru berhasil ditambahkan');
					document.location.href = 'karyawan.php';
				</script>";
} else{
	echo "<script>
					alert('karyawan baru gagal ditambahkan');
				</script>";
}
?>