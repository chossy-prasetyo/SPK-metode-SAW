<?php
session_start();

// jika session login sudah ada, halaman login tidak boleh ditampilkan lagi
if(isset($_SESSION['login'])){
  header('Location: dashboard.php');
  exit;
}

include ("koneksi.php");

if(isset($_POST['daftar'])){

  $email = $_POST['email'];

  $result = mysqli_query($kon,"SELECT email FROM user WHERE email='$email'");

  if(mysqli_num_rows($result) == 0){

    $password = mysqli_real_escape_string($kon,$_POST['password']);
    $password2 = mysqli_real_escape_string($kon,$_POST['password2']);

    if($password2 == $password){

      $password = password_hash($password,PASSWORD_DEFAULT);

      mysqli_query($kon,"INSERT INTO user VALUES ('','$email','$password')");

      if(mysqli_affected_rows($kon) > 0){
        echo '<script>
                alert("registrasi berhasil");
                document.location.href = "index.php";
              </script>';
      } else{
        echo '<script>
                alert("registrasi gagal");
              </script>';
        echo mysqli_error($kon);
      }
    } else{
      $error = 'konfirmasi password salah!';
    }
  } else{
    $error = 'email sudah terdaftar!';
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

    <title>Registrasi</title>
  </head>

  <body>
  	<div class="container">
      <div class="row justify-content-center">
        <div class="col-4">
          <div class="card mt-5 shadow-lg">
            <h5 class="card-header bg-dark text-light text-center" style="padding: 24px 15px 24px 15px;">Halaman Registrasi</h5>
            <div class="card-body p-4">
          		<form method="post">

                <!-- notifikasi registrasi -->
                <?php if(isset($error)): ?>
                  <p class="text-center" style="color: red; font-style: italic;"><?= $error; ?></p>
                <?php endif; ?>

                <!-- input email -->
          			<div class="form-group mb-4">
            			<input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="off">
                </div>

                <!-- input password -->
            		<div class="form-group mb-4">
            			<input type="password" name="password" class="form-control" placeholder="Password" required>
            		</div>

                <!-- input ulangi password -->
                <div class="form-group mb-4">
                  <input type="password" name="password2" class="form-control" placeholder="Ulangi Password" required>
                </div>

                <!-- Tombol Login -->
            		<button class="btn btn-block btn-dark mt-3" type="submit" name="daftar">Daftar</button>

            	</form>

              <p class="text-center font-weight-light">kembali ke halaman <a href="index.php">Login</a></p>
            </div>
          </div>          
        </div>
      </div>
    </div>
  </body>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>