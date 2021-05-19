<?php
session_start();

// jika tidak ada session login, jangan izinkan halaman ini diakses
if(!isset($_SESSION['login'])){
	header('Location: index.php');
	exit;
}

include 'koneksi.php';

// tangkap semua input
$kd	= $_POST['kd'];
$c1	= htmlspecialchars($_POST['c1']);
$c2	= htmlspecialchars($_POST['c2']);
$c3	= htmlspecialchars($_POST['c3']);
$c4	= htmlspecialchars($_POST['c4']);

// update nilai karyawan ini dg nilai baru di database
$query = "UPDATE nilai SET
						c1 = '$c1',
						c2 = '$c2',
						c3 = '$c3',
						c4 = '$c4'
					WHERE kd=$kd";
mysqli_query($kon,$query);

// beri pemberitahuan jika berhasil, beri peringatan jika gagal
if(mysqli_affected_rows($kon) > 0){
	echo "<script>
					alert('nilai karyawan berhasil diubah');
					document.location.href = 'karyawan.php';
				</script>";
} else{
	echo "<script>
					alert('nilai karyawan gagal diubah');
				</script>";
}	 
?>


