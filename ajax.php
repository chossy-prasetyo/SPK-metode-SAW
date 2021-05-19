<!-- 
<?php 
include 'koneksi.php';

// jika tidak ada session login, jangan izinkan halaman ini diakses
if(!isset($_SESSION['login'])){
  header("location: index.php");
  exit;
}

$keyword = $_GET['keyword'];

$query = "SELECT * FROM calonguru WHERE
						nama LIKE '%$keyword%' OR
						nipy LIKE '%$keyword%' OR
            gender LIKE '%$keyword%' OR
						tmplahir LIKE '%$keyword%' OR
						tgllahir LIKE '%$keyword%'
					ORDER BY nama ASC";

$result = mysqli_query($kon,$query);
$karyawan = [];
while($hasil = mysqli_fetch_assoc($result)){
	$karyawan[] = $hasil;
}
?>

<table class ="table table-bordered table-striped">
  <thead align="center">
    <th>No</th>
    <th>Nama</th>
    <th>NIPY</th>
    <th>Jenis Kelamin</th>
    <th>Tempat, Tanggal Lahir</th>
    <th>Foto</th>
    <th colspan="3">Aksi</th>
  </thead>
  
  <tbody>
    <?php $no = 1; foreach($karyawan as $k){ ?>
      <tr>
        <td align="center"><?php echo $no;?></td>
        <td><?php echo $k['nama'];?></td>
        <td><?php echo $k['nipy'];?></td>
        <td align="center"><?php echo $k['gender'];?></td>
        <td><?php echo $k['tmplahir'].', '.$k['tgllahir'];?></td>
        <td align="center">
          <img src="img/<?php echo $k['foto'];?>" width="100">
        </td>
        <td align="center">
          <a href="karyawan_hapus.php?kd=<?php echo $k['kd'];?>" onclick="return confirm('hapus <?php echo $k["nama"]; ?> ?')" class="btn btn-danger btn-sm">
            <i class ="fas fa-trash"></i>
            Hapus
          </a>
        </td>
        <td align="center">
          <a href="karyawan_edit.php?kd=<?php echo $k['kd'];?>" class="btn btn-warning btn-sm">
            <i class ="fas fa-edit"></i>
            Update
          </a>
        </td>
        <td align="center">
          <a href="karyawan_nilai.php?kd=<?php echo $k['kd'];?>" class="btn btn-success btn-sm">
            <i class ="fas fa-plus"></i>
            Input Nilai
          </a>
        </td>
      </tr>
    <?php $no++; } ?>                
  </tbody>
</table>
 -->