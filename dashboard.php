<?php
include 'nav.php';

// query jumlah karyawan
$karyawan       = mysqli_query($kon,"SELECT * FROM calonguru");
$jumlah_karyawan= mysqli_num_rows($karyawan);

// query jumlah ikhwan 
$ikhwan         = mysqli_query($kon,"SELECT * FROM calonguru where gender='Ikhwan'");
$jumlah_ikhwan  = mysqli_num_rows($ikhwan);

// query jumlah akhwat
$akhwat         = mysqli_query($kon,"SELECT * FROM calonguru where gender='Akhwat'");
$jumlah_akhwat  = mysqli_num_rows($akhwat);
?>

<div class="container-fluid">
  <div class="card mt-3">
    <div class="card-header bg-dark text-light"><h4>Beranda</h4></div>
      <div class="card-body">
        <div class="row justify-content-center">

          <!-- Karyawan Card -->
          <div class="col-md-3">
            <div class="card">
              <h4 class="card-header text-light text-center bg-success">Karyawan</h4>
              <div class="card-body text-center">
                <i class="fas fa-users fa-5x"></i>
                <h1><?php echo $jumlah_karyawan; ?></h1>
              </div>
            </div>
          </div>

          <!-- Ikhwan Card -->
          <div class="col-md-3">
            <div class="card">
              <h4 class="card-header text-center bg-primary text-light">Ikhwan</h4>
              <div class="card-body text-center">
                <i class="fas fa-male fa-5x"></i>
                <h1><?php echo $jumlah_ikhwan; ?></h1>
              </div>
            </div>
          </div>

          <!-- Akhwat Card -->
          <div class="col-md-3">
            <div class="card">
              <h4 class="card-header text-center bg-danger text-light">Akwat</h4>
              <div class="card-body text-center">
                <i class="fas fa-female fa-5x"></i>
                <h1><?php echo $jumlah_akhwat; ?></h1>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="card-footer bg-dark text-light">Programmed By : Risa Laida</div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
