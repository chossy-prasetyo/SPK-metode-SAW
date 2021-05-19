<?php
session_start();

// jika tidak ada session login, jangan izinkan halaman ini diakses
if(!isset($_SESSION['login'])){
	header('Location: index.php');
	exit;
}

include 'koneksi.php';

// tangkap id karyawan yg akan dihapus
$kd = $_GET['kd'];

// hapus karyawan dari database
mysqli_query($kon,"DELETE FROM calonguru WHERE kd=$kd");
mysqli_query($kon,"DELETE FROM nilai WHERE kd=$kd");

// beri pemberitahuan jika berhasil, beri peringatan jika gagal
if(mysqli_affected_rows($kon) > 0){
	echo '<script>
					alert("karyawan berhasil dihapus");
					document.location.href = "karyawan.php";
				</script>';
} else{
	echo '<script>
					alert("karyawan gagal dihapus");
				</script>';
}
?>