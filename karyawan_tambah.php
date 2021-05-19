<?php include 'nav.php'; ?>

<div class ="container">
	<div class="row">
		<div class="col-md-6">
			<div class ="card mt-3 shadow-lg">
				<div class ="card-header bg-dark text-light">
					<h5>Tambah Karyawan</h5>
				</div>
				<div class="card-body">
					<form method="post" action="karyawan_tambah_proses.php" enctype="multipart/form-data">

						<!-- Input Nama -->
					  <div class="form-group row">
					    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
					    <div class="col-sm-9">
					      <input type="text" name="nama" class="form-control" id="nama" required autocomplete="off">
					    </div>
					  </div>

						<!-- Input NIPY -->
					  <div class="form-group row">
					    <label for="nipy" class="col-sm-3 col-form-label">NIPY</label>
					    <div class="col-sm-9">
					      <input type="text" name="nipy" class="form-control" id="nipy" required autocomplete="off">
					    </div>
					  </div>

						<!-- Opsi Gender -->
					  <div class="form-group row">
					    <label for="nipy" class="col-sm-3 col-form-label">Gender</label>
					    <div class="col-sm-9">
						    <select name="gender" class="form-control">
									<option value="Ikhwan">Ikhwan</option>
									<option value="Akhwat">Akhwat</option>
								</select>
					    </div>
					  </div>

						<!-- Input Tempat Lahir -->
					  <div class="form-group row">
					    <label for="tmplahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
					    <div class="col-sm-9">
					      <input type="text" name="tmplahir" class="form-control" id="tmplahir" required autocomplete="off">
					    </div>
					  </div>

						<!-- Input Tempat Lahir -->
					  <div class="form-group row">
					    <label for="tgllahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
					    <div class="col-sm-9">
					      <input type="date" name="tgllahir" class="form-control" id="tgllahir" required>
					    </div>
					  </div>

						<!-- Upload Foto -->
					  <div class="form-group row">
					    <label for="foto" class="col-sm-3 col-form-label">Upload Foto</label>
					    <div class="col-sm-9">
					      <input type="file" name="foto" id="foto">
					    </div>
					  </div>

						<!-- Tombol Eksekusi -->
						<button class="btn btn-sm btn-success float-right ml-1" name="tambah">
							<i class="fas fa-save"></i>
							Tambah
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