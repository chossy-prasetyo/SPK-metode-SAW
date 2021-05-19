<?php
session_start();

// hapus dulu session sebelum pindah halaman
session_destroy();

// pindahkan ke halaman utama
header("Location: index.php");
?>