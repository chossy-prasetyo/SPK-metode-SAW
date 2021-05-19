<?php
include 'nav.php';

// tangkap id karyawan yg akan diedit
$kd       = $_GET['kd'];

// opsi : query nama karyawan yg akan diinputkan nilainya
$hasil    = mysqli_query($kon,"SELECT nama FROM calonguru WHERE kd=$kd");
$karyawan = mysqli_fetch_assoc($hasil);
?>

<div class ="container">
  <div class="row">
    <div class="col-md-7">
      <div class ="card mt-3 shadow-lg">
        <div class ="card-header bg-dark text-light">
          <h5>Input Nilai <?php echo $karyawan['nama']; ?></h5>
        </div>
        <div class="card-body">
          <form method="post" action="karyawan_nilai_proses.php" enctype="multipart/form-data">

            <!-- Input Nilai Microteaching -->
            <div class="form-group row">
              <label for="c1" class="col-sm-5 col-form-label">Nilai Microteaching</label>
              <div class="col-sm-7">
                <input type="hidden" name="kd" value="<?= $kd; ?>">
                <input type="text" name="c1" class="form-control" id="c1" required autocomplete="off">
              </div>
            </div>

            <!-- Input Nilai Ujian Tertulis -->
            <div class="form-group row">
              <label for="c2" class="col-sm-5 col-form-label">Nilai Ujian Tertulis</label>
              <div class="col-sm-7">
                <input type="text" name="c2" class="form-control" id="c2" required autocomplete="off">
              </div>
            </div>

            <!-- Input Nilai Ujian Baca Tulis Al-Qur'an -->
            <div class="form-group row">
              <label for="c3" class="col-sm-5 col-form-label">Nilai Ujian Baca Tulis Al-Qur'an</label>
              <div class="col-sm-7">
                <input type="text" name="c3" class="form-control" id="c3" required autocomplete="off">
              </div>
            </div>

            <!-- Input Nilai Wawancara -->
            <div class="form-group row">
              <label for="c4" class="col-sm-5 col-form-label">Nilai Wawancara</label>
              <div class="col-sm-7">
                <input type="text" name="c4" class="form-control" id="c4" required autocomplete="off">
              </div>
            </div>

            <!-- Tombol Eksekusi -->
            <button class="btn btn-sm btn-success float-right ml-1" name="simpan">
              <i class="fas fa-save"></i>
              Simpan
            </button>
            <a href="karyawan.php" class="btn btn-sm btn-secondary float-right">Batal</a>

          </form>
        </div>
        <div class="card-footer bg-dark text-light">
          Programed By : Risa Laida
        </div>
      </div>      
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
