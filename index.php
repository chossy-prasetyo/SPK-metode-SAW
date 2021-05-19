<?php
include ("koneksi.php");

session_start();

// jika session login sudah ada, halaman login tidak boleh ditampilkan lagi
if(isset($_SESSION['login'])){
  header('Location: dashboard.php');
  exit;
}

// jika tombol login ditekan, lakukan proses login
if(isset($_POST['login'])){

  // ambil input username
  $username = $_POST['username'];

  // cek ketersediaan username di database
  $user = mysqli_query($kon,"SELECT * FROM user WHERE username='$username'");

  // jika username ada, lanjutkan proses login
  if(mysqli_num_rows($user) == 1){

    // ambil input password dan enkripsi terlebih dahulu
    $password = md5($_POST['password']);

    // siapkan akun yang telah diquery
    $akun = mysqli_fetch_assoc($user);

    // jika password sama, login berhasil
    if($password == $akun['password']){

      // buat session sebagai izin login
      session_start();
      $_SESSION['login'] = true;

      // pindahkan ke halaman utama
      header("Location: dashboard.php");
      exit;

    } else{   // jika password salah, buat error
      $error = 'password salah!';
    }

  } else{     // jika username tidak ada, buat error
    $error = "username salah!";
  }
}
?>

<DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <title>Login Page</title>
  </head>

  <body>
  	<div class="container">
      <div class="row justify-content-center">
        <div class="col-4">
          <div class="card mt-5 shadow-lg">
            <h5 class="card-header bg-dark text-light text-center">Login Page</h5>
            <div class="card-body">
          		<form method="post">

                <!-- Notifikasi Login -->
                <?php if(isset($error)): ?>
                  <p class="text-center" style="color: red; font-style: italic;"><?= $error; ?></p>
                <?php endif; ?>

                <!-- Input Userame -->
          			<div class="form-group">
            			<input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off">
                </div>

                <!-- Input Password -->
            		<div class="form-group">
            			<input type="password" name="password" class="form-control" placeholder="Password" required>
            		</div>

                <!-- Tombol Login -->
            		<button class="btn btn-block btn-dark mt-3" type="submit" name="login">Login</button>

            	</form>
            </div>
          </div>          
        </div>
      </div>
    </div>
  </body>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>