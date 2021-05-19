<?php
include 'nav.php';

// ambil data semua karyawan
$query = mysqli_query($kon,"SELECT * FROM calonguru ORDER BY nama ASC");

// siapkan wadah penampung hasil database
$karyawan = [];

// untuk setiap karyawan, masukkan ke dalam wadah
while($hasil = mysqli_fetch_assoc($query)){
  $karyawan[]  = $hasil;
}

// ambil kd karyawan yg sudah diinputkan nilainya
$query = mysqli_query($kon,"SELECT kd FROM nilai");

$nilai = [];

while($hasil = mysqli_fetch_assoc($query)){
  $nilai[] = $hasil;
}

$kd = [];

foreach($nilai as $n){
  $kd[] = $n['kd'];
}
?>

<div class="container-fluid">
  <div class="card mt-3">
    <div class="card-header bg-dark text-light"><h4>Karyawan</h4></div>
    <div class="card-body">

      <div class="row">
        <div class="col-5">
          <div class="row">
            <!-- Input Cari Karyawan -->
            <!-- 
            <div class="col-7">
              <form action="" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Cari karyawan" name="keyword" autocomplete="off" id="keyword">
                </div>            
              </form>
            </div>
             -->
            <!-- Tombol Tambah Karyawan -->
            <div class="col-5 mb-3">
              <a class="btn btn-success" href="karyawan_tambah.php">
                <i class="fas fa-user-plus"></i>
                Tambah Karyawan
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Tabel Karyawan -->
      <div id="live">
        <table class ="table table-bordered table-striped">
          <thead align="center">
            <th>No</th>
            <th>Nama</th>
            <th>NIPY</th>
            <th>Jenis Kelamin</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Foto</th>
            <th colspan="4">Aksi</th>
          </thead>
          
          <tbody>
            <?php $no = 1; foreach($karyawan as $k){ ?>
              <tr>
                <td align="center"><?php echo $no; ?></td>
                <td><?php echo $k['nama']; ?></td>
                <td><?php echo $k['nipy']; ?></td>
                <td align="center"><?php echo $k['gender']; ?></td>
                <td><?php echo $k['tmplahir'].', '.$k['tgllahir']; ?></td>
                <td align="center"><img src="img/<?php echo $k['foto']; ?>" width="100">
                </td>
                <td align="center">
                  <a href="karyawan_hapus.php?kd=<?php echo $k['kd']; ?>" onclick="return confirm('hapus <?php echo $k["nama"]; ?> ?')" class="btn btn-danger btn-sm">
                    <i class ="fas fa-trash"></i>
                    Hapus
                  </a>
                </td>
                <td align="center">
                  <a href="karyawan_edit.php?kd=<?php echo $k['kd']; ?>" class="btn btn-warning btn-sm">
                    <i class ="fas fa-edit"></i>
                    Edit
                  </a>
                </td>
                <td align="center">
                  <a href="karyawan_nilai.php?kd=<?php echo $k['kd']; ?>" class="btn btn-success btn-sm <?php if(in_array($k['kd'],$kd)){ echo 'disabled'; } ?>">
                    <i class ="fas fa-plus"></i>
                    Input Nilai
                  </a>                    
                </td>
                <td align="center">
                  <a href="karyawan_nilai_edit.php?kd=<?php echo $k['kd']; ?>" class="btn btn-warning btn-sm <?php if(!in_array($k['kd'],$kd)){ echo 'disabled'; } ?>">
                    <i class="fas fa-sync-alt"></i>
                    Ubah Nilai
                  </a>
                </td>
              </tr>
            <?php $no++; } ?>                
          </tbody>
        </table>
      </div>
      <!-- Akhir Tabel Karyawan -->

    </div>
    <div class="card-footer bg-dark text-light">Programmed By : Risa Laida</div>
  </div>
</div>

<!-- My Javascript -->
<!-- <script src="script.js"></script> -->

<?php include 'footer.php'; ?>