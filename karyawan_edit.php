<?php
include 'nav.php';

// tangkap id karyawan yg akan diedit
$kd				= $_GET['kd'];

// query dulu data yg akan diedit
$hasil		= mysqli_query($kon,"SELECT * FROM calonguru WHERE kd=$kd");
$karyawan = mysqli_fetch_assoc($hasil);
?>

<div class ="container">
	<div class="row">
		<div class="col-md-6">
			<div class ="card mt-3 shadow-lg">
				<div class ="card-header bg-dark text-light">
					<h5>Edit Data Karyawan</h5>
				</div>
				<div class="card-body">
					<form method="post" action="karyawan_edit_proses.php" enctype="multipart/form-data">

						<!-- Input Nama -->
					  <div class="form-group row">
					    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
					    <div class="col-sm-9">
					    	<input type="hidden" name="kd" value="<?php echo $karyawan['kd']; ?>">
					    	<input type="hidden" name="fotolama" value="<?php echo $karyawan['foto']; ?>">
					      <input type="text" name="nama" class="form-control" id="nama" required autocomplete="off" value="<?php echo $karyawan['nama']; ?>">
					    </div>
					  </div>

						<!-- Input NIPY -->
					  <div class="form-group row">
					    <label for="nipy" class="col-sm-3 col-form-label">NIPY</label>
					    <div class="col-sm-9">
					      <input type="text" name="nipy" class="form-control" id="nipy" required autocomplete="off" value="<?php echo $karyawan['nipy']; ?>">
					    </div>
					  </div>

						<!-- Opsi Gender -->
					  <div class="form-group row">
					    <label for="nipy" class="col-sm-3 col-form-label">Gender</label>
					    <div class="col-sm-9">
						    <select name="gender" class="form-control">
									<option value="Ikhwan" <?php if($karyawan['gender']=='Ikhwan'){ echo 'selected'; } ?>>Ikhwan</option>
									<option value="Akhwat" <?php if($karyawan['gender']=='Akhwat'){ echo 'selected'; } ?>>Akhwat</option>
								</select>
					    </div>
					  </div>

						<!-- Input Tempat Lahir -->
					  <div class="form-group row">
					    <label for="tmplahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
					    <div class="col-sm-9">
					      <input type="text" name="tmplahir" class="form-control" id="tmplahir" required autocomplete="off" value="<?php echo $karyawan['tmplahir']; ?>">
					    </div>
					  </div>

						<!-- Input Tempat Lahir -->
					  <div class="form-group row">
					    <label for="tgllahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
					    <div class="col-sm-9">
					      <input type="date" name="tgllahir" class="form-control" id="tgllahir" required value="<?php echo $karyawan['tgllahir']; ?>">
					    </div>
					  </div>

						<!-- Upload Foto -->
					  <div class="form-group row">
					    <label for="foto" class="col-sm-3 col-form-label">Upload Foto</label>
					    <div class="col-sm-9" style="display: flex; align-items: center;">
					    	<img src="img/<?php echo $karyawan['foto']; ?>" width="100" class="mr-2 shadow">
					      <input type="file" name="foto" id="foto">
					    </div>
					  </div>

						<!-- Tombol Eksekusi -->
						<button class="btn btn-sm btn-success float-right ml-1" name="simpan" onclick="return confirm('ubah data ?')">
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
