<!DOCTYPE html>
<html>
<head>
    <title>Web Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
    </style>
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
        <a class="nav-link" href="halaman_admin">Mitra <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="halaman_user.php">User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="halaman_order.php">Order</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="halaman_testimoni.php">Testimoni</a>
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
      <th scope="col">Foto Profil</th>
      <th scope="col">Nama Mitra</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Telepon</th>
      <th scope="col">Level</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <?php
        include 'koneksi.php';
        $data = mysqli_query($koneksi, "SELECT * FROM admin");
        $no=1;
        while($d = mysqli_fetch_array($data)){
    ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><img src="../images/<?php echo $d['foto']; ?>" width="100px"></td>
      <td><?php echo $d['nama']; ?></td>
      <td><?php echo $d['username']; ?></td>
      <td><?php echo $d['email']; ?></td>
      <td><?php echo $d['telepon']; ?></td>
      <td><?php echo $d['level']; ?></td>
      <td>
        <a href="update_data.php?id=<?php echo $d['id']; ?>" class="btn btn-success">Edit</a>
        <a href="delete_data.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">Hapus</a>
      </td>
    </tr>
  </tbody>
        <?php
        $no++;
      } ?>
</table>
&nbsp;&nbsp;&nbsp;<a href="tambah_mitra.php" class="btn btn-success">Tambah Data</a>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>