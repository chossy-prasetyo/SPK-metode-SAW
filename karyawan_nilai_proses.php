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

// tambahkan nilai karyawan ini ke database
$query = "INSERT INTO nilai VALUES
					('','$kd','$c1','$c2','$c3','$c4')";
mysqli_query($kon,$query);

// beri pemberitahuan jika berhasil, beri peringatan jika gagal
if(mysqli_affected_rows($kon) > 0){
	echo "<script>
					alert('nilai karyawan berhasil ditambahkan');
					document.location.href = 'karyawan.php';
				</script>";
} else{
	echo "<script>
					alert('nilai karyawan gagal ditambahkan');
				</script>";
}
?>


