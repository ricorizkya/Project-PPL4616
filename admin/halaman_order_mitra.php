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
    <li class="nav-item">
        <a class="nav-link" href="halaman_mitra.php">Paket<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
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
      <th scope="col">Nama User</th>
      <th scope="col">Tanggal Keberangkatan</th>
      <th scope="col">Nama Mitra</th>
      <th scope="col">Nama Layanan</th>
      <th scope="col">Guides</th>
      <th scope="col">Status</th>
      <th scope="col">Catatan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <?php
        include 'koneksi.php';
        $id = $_SESSION['username'];
        $data = mysqli_query($koneksi, "SELECT * FROM checkout WHERE username_mitra='$id'");
        $no=1;
        while($d = mysqli_fetch_array($data)){
    ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $d['username']; ?></td>
      <td><?php echo $d['tanggal']; ?></td>
      <td><?php echo $d['nama_mitra']; ?></td>
      <td><?php echo $d['nama_gunung']; ?> <?php echo $d['durasi']; ?></td>
      <td><?php echo $d['guide']; ?></td>
      <td><?php echo $d['status']; ?></td>
      <td><?php echo $d['note']; ?></td>
      <td>
        <a href="handle.php?id=<?php echo $d['id']; ?>" class="btn btn-success">Handle</a>
      </td>
    </tr>
  </tbody>
        <?php $no++; } ?>
</table>
</body>
</html>