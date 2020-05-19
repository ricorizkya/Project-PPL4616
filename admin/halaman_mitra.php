<!DOCTYPE html>
<html>
<head>
    <title>Web Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
  }
 
	?>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Halaman Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="halaman_mitra.php">Paket<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="halaman_order_mitra.php">Order</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    </div>
    </nav><br>
    <!-- End Nav -->
    
    <h3>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</h3><br>
    
    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Mitra</th>
      <th scope="col">Nama Layanan</th>
      <th scope="col">Durasi</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Foto</th>
      <th scope="col">Harga</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <?php
        include 'koneksi.php';
        $nama = $_SESSION['username'];
        $data = mysqli_query($koneksi, "SELECT * FROM paket WHERE username='$nama'");
        $no=1;
        while($d = mysqli_fetch_array($data)){
    ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $d['nama_mitra']; ?></td>
      <td><?php echo $d['nama_gunung']; ?></td>
      <td><?php echo $d['durasi']; ?></td>
      <td><?php echo mb_strimwidth($d['deskripsi'],0,100,'...'); ?></td>
      <td><img src="../images/<?php echo $d['foto']; ?>" width="100px"></td>
      <td>USD <?php echo $d['harga']; ?>.00</td>
      <td>
        <a href="update_paket.php?id=<?php echo $d['id']; ?>" class="btn btn-success">Edit</a>
        <a href="delete_paket.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">Hapus</a>
      </td>
    </tr>
  </tbody>
        <?php
        $no++; 
      } ?>
</table>
&nbsp;&nbsp;&nbsp;<a href="tambah_paket.php" class="btn btn-success">Tambah Layanan</a></span>
</body>
</html>