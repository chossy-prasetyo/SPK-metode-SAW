<?php
include 'nav.php';

// ambil data semua karyawan
$query = mysqli_query($kon,"SELECT c1,c2,c3,c4,nama,nipy,foto
                            FROM nilai JOIN calonguru
                            ON `nilai`.`kd` = `calonguru`.`kd` 
                            ORDER BY nama ASC");

// siapkan wadah hasil database
$nilai = [];

// masukkan setiap karyawan ke dalam wadah
while($hasil = mysqli_fetch_assoc($query)){
  $nilai[]  = $hasil;
}

// var_dump($nilai);

// siapkan wadah nilai kriteria
$c1 = [];
$c2 = [];
$c3 = [];
$c4 = [];
$nama = [];
$nipy = [];
$foto = [];

// pisahkan nilai setiap kriteria dari setiap karyawan
foreach($nilai as $nilai){
  $c1[] = $nilai['c1'];
  $c2[] = $nilai['c2'];
  $c3[] = $nilai['c3'];
  $c4[] = $nilai['c4'];
  $nama[] = $nilai['nama'];
  $nipy[] = $nilai['nipy'];
  $foto[] = $nilai['foto'];
}

// var_dump($c1);
// var_dump($c2);
// var_dump($c3);
// var_dump($c4);
// var_dump($nama);
// var_dump($nipy);
// var_dump($foto);

// siapkan wadah nilai normalisasi
$normalisasic1 = [];
$normalisasic2 = [];
$normalisasic3 = [];
$normalisasic4 = [];

// hitung jumlah karyawan
$jumlahKaryawan = count($c1);

// lakukan normalisasi
for($i = 0; $i < $jumlahKaryawan; $i++){
  $normalisasic1[] = round($c1[$i] / max($c1),3);
  $normalisasic2[] = round($c2[$i] / max($c2),3);
  $normalisasic3[] = round($c3[$i] / max($c3),3);
  $normalisasic4[] = round($c4[$i] / max($c4),3);
}

// var_dump($normalisasic1);
// var_dump($normalisasic2);
// var_dump($normalisasic3);
// var_dump($normalisasic4);

// siapkan wadah nilai preferensi
$preferensic1 = [];
$preferensic2 = [];
$preferensic3 = [];
$preferensic4 = [];

// dapatkan nilai preferensi
for($i = 0; $i < $jumlahKaryawan; $i++){
  $preferensic1[] = round($normalisasic1[$i] * 0.5,3);
  $preferensic2[] = round($normalisasic2[$i] * 0.3,3);
  $preferensic3[] = round($normalisasic3[$i] * 0.1,3);
  $preferensic4[] = round($normalisasic4[$i] * 0.1,3);
}

// var_dump($preferensic1);
// var_dump($preferensic2);
// var_dump($preferensic3);
// var_dump($preferensic4);

// siapkan wadah jumlah nilai preferensi
$preferensi = [];

// jumlahkan nilai preferensi
for($i = 0; $i < $jumlahKaryawan; $i++){
  $preferensi[] = $preferensic1[$i]+$preferensic2[$i]+$preferensic3[$i]+$preferensic4[$i];
}

// var_dump($preferensi);

// siapkan copy data preferensi yg akan dilogikakan
$bahan = [];

// copy data preferensi
foreach($preferensi as $p){
  $bahan[] = $p;
}
// var_dump($bahan);

// siapkan wadah penampung peringkat
$peringkat = [];

// dapatkan peringkat
for($i = 0; $i < $jumlahKaryawan; $i++){
  $max    = max($bahan);
  $index  = array_keys($bahan,$max);
  $peringkat[$index[0]] = $i+1;
  unset($bahan[$index[0]]);
}

// var_dump($peringkat);

// susun nilai peringkat berdasarkan indexnya
$array = array_keys($peringkat);

// var_dump($array);

// ambil nilai karyawan
$query = mysqli_query($kon,"SELECT c1,c2,c3,c4,nama,nipy
                            FROM nilai JOIN calonguru
                            ON `nilai`.`kd` = `calonguru`.`kd` 
                            ORDER BY nama ASC");

// siapkan wadah hasil database
$karyawan = [];

// masukkan setiap karyawan ke dalam wadah
while($hasil = mysqli_fetch_assoc($query)){
  $karyawan[]  = $hasil;
}

// var_dump($karyawan);
?>

<div class="container-fluid">
  <div class="card mt-3">
    <div class="card-header bg-dark text-light"><h4>Laporan Peringkat</h4></div>
    <div class="card-body">

      <!-- Tabel Peringkat Karyawan -->

      <div class="mb-5">
        <table class ="table table-striped">
          <thead align="center">
            <th>Peringkat</th>
            <th colspan="2">Karyawan</th>
            <th>NIPY</th>
            <th>Nilai</th>
          </thead>
          <tbody>
            <?php for($i = 0; $i < $jumlahKaryawan; $i++){ ?>
              <tr align="center">
                <td>
                  <?php if($i+1 == 1){ ?>
                    <img src="img/crown2-gold.png" width="60">
                  <?php } elseif($i+1 == 2){ ?>
                    <img src="img/crown2-silver.png" width="50">
                  <?php } elseif($i+1 == 3){ ?>
                    <img src="img/crown2-bronze.png" width="40">
                  <?php } else{ ?>
                    <?php echo $i+1; ?>
                  <?php } ?>
                </td>
                <td align="right"><img src="img/<?php echo $foto[$array[$i]]; ?>" width="50"></td>
                <td align="left"><?php echo $nama[$array[$i]]; ?></td>
                <td><?php echo $nipy[$array[$i]]; ?></td>
                <td><?php echo $preferensi[$array[$i]]; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- Akhir Tabel Peringkat Karyawan -->


      <!-- Tabel Laporan Nilai -->
      <h5 class="mb-3">Laporan Nilai Karyawan</h5>

      <div class="mb-5">
        <table class ="table table-bordered table-striped">
          <thead align="center">
            <tr>
              <th rowspan="2">No</th>
              <th rowspan="2">Nama</th>
              <th rowspan="2">NIPY</th>
              <th colspan="2">Microteaching</th>              
              <th colspan="2">Ujian Tertulis</th>              
              <th colspan="2">Ujian Baca Tulis<br>Al-Qur'an</th>              
              <th colspan="2">Wawancara</th>              
              <th rowspan="2">Jumlah Preferensi</th>              
              <th rowspan="2">Peringkat</th>              
            </tr>
            <tr>
              <th>Normalisasi</th>
              <th>Preferensi</th>
              <th>Normalisasi</th>
              <th>Preferensi</th>
              <th>Normalisasi</th>
              <th>Preferensi</th>
              <th>Normalisasi</th>
              <th>Preferensi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; for($i = 0; $i < $jumlahKaryawan; $i++){ ?>
              <tr>
                <td align="center"><?php echo $no; ?></td>
                <td><?php echo $karyawan[$i]['nama']; ?></td>
                <td><?php echo $karyawan[$i]['nipy']; ?></td>
                <td align="center"><?php echo $normalisasic1[$i]; ?></td>
                <td align="center"><?php echo $preferensic1[$i]; ?></td>
                <td align="center"><?php echo $normalisasic2[$i]; ?></td>
                <td align="center"><?php echo $preferensic2[$i]; ?></td>
                <td align="center"><?php echo $normalisasic3[$i]; ?></td>
                <td align="center"><?php echo $preferensic3[$i]; ?></td>
                <td align="center"><?php echo $normalisasic4[$i]; ?></td>
                <td align="center"><?php echo $preferensic4[$i]; ?></td>
                <td align="center"><?php echo $preferensi[$i]; ?></td>
                <td align="center"><?php echo $peringkat[$i]; ?></td>
              </tr>
            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
      <!-- Akhir Tabel Laporan Nilai -->

      <!-- Tabel Nilai Karyawan -->
      <h5 class="mb-3">Nilai Karyawan</h5>

      <div>
        <table class ="table table-bordered table-striped">
          <thead align="center">
            <tr>
              <th rowspan="2">No</th>
              <th rowspan="2">Nama</th>
              <th rowspan="2">NIPY</th>
              <th colspan="4">Nilai</th>              
            </tr>
            <tr>
              <th>Microteaching</th>
              <th>Ujian Tertulis</th>
              <th>Ujian Baca Tulis Al-Qur'an</th>
              <th>Wawancara</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach($karyawan as $k){ ?>
              <tr>
                <td align="center"><?php echo $no; ?></td>
                <td><?php echo $k['nama']; ?></td>
                <td><?php echo $k['nipy']; ?></td>
                <td align="center"><?php echo $k['c1']; ?></td>
                <td align="center"><?php echo $k['c2']; ?></td>
                <td align="center"><?php echo $k['c3']; ?></td>
                <td align="center"><?php echo $k['c4']; ?></td>
              </tr>
            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
      <!-- Akhir Tabel Nilai Karyawan -->

    </div>
    <div class="card-footer bg-dark text-light">Programmed By : Risa Laida</div>
  </div>
</div>

<?php include 'footer.php' ?>