<?php
include 'koneksi.php';

  if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $level = $_POST['level'];
    $foto = $_FILES['foto']['name'];
	  $lokasi =$_FILES['foto']['tmp_name'];
	  move_uploaded_file($lokasi, "../images/".$foto);
    $sql = "UPDATE admin SET foto='$foto', nama='$nama', username='$username', email='$email', telepon='$telepon', level='$level' WHERE id='$id'";
    if(mysqli_query($koneksi, $sql)){
      header("location: halaman_admin.php");
    }else{
      echo "ERROR, Data gagal diupdate".mysqli_error();
    }
    
  }
?>
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
        <a class="nav-link" href="halaman_admin.php">Mitra <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="halaman_user.php">User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="halaman_order.php">Order</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    </div>
    </nav><br>
    <!-- End Nav -->
<div class="col-sm-8">
<?php 
  if(!isset($_GET['id'])){
    header("halaman_admin.php");
  }

  $id = $_GET['id'];
  $sql = "SELECT * FROM admin WHERE id=$id";
  $query = mysqli_query($koneksi, $sql);
  while($d = mysqli_fetch_assoc($query)){
?>
    <h3><b>Edit Data</b></h3>
    <form method="POST" action="" enctype="multipart/form-data"> 
        <div class="row">
        <div class="col-sm-4">
            <label for="nama">Nama</label>
            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
            <input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $d['username']; ?>">
        </div>
        </div>
        <div class="row">
        <div class="col-sm-4">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo $d['password']; ?>">
        </div>
        <div class="col-sm-4">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" value="<?php echo $d['email']; ?>">
        </div>
        </div>
        <div class="row">
        <div class="col-sm-8">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat']; ?>">
        </div>
        </div>
        <div class="row">
        <div class="col-sm-4">
            <label for="telepon">No. Telepon</label>
            <input type="number" class="form-control" name="telepon" value="<?php echo $d['telepon']; ?>">
        </div>
        <div class="col-sm-4">
            <label for="level" value="<?php echo $d['level']; ?>">Level</label><br>
            <input type="radio" id="admin" name="level" value="admin">
  		    <label for="admin">Admin</label>
		    <input type="radio" id="mitra" name="level" value="mitra">
  		    <label for="admin">Mitra</label><br>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-4">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" name="foto" value="../images/<?php echo $d['foto']; ?>" required>
        </div>
        </div>
        <br>
  <?php } ?>
        <button class="btn btn-success" type="submit" name="submit">Submit</button>
    </form>
</div>
</body>
</html>