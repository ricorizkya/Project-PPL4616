<!DOCTYPE html>
<html>
<head>
    <title>Web Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
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
    
    <div class="col-sm-12">
    <h3><b>Tambah Paket</b></h3>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="row">
        <div class="col-sm-4">
            <label for="nama">Nama Mitra</label><br>
            <select name="mitra" id="nama">
                <option value="pilih">-- Pilih Mitra --</option>
                <option value="kelompoksatu">Kelompok Satu</option>
                <option value="sunrise">Sunrise Adventure Consultant</option>
            </select>
        </div>
        <div class="col-sm-4">
            <label for="nama_layanan">Nama Layanan</label>
            <input type="text" class="form-control" name="nama_layanan" required>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-4">
            <label for="Harga">Harga</label>
            <input type="number" class="form-control" name="harga" required>
        </div>
        <div class="col-sm-4">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" name="foto" required>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-8">
            <label for="nama_layanan">Durasi</label>
            <input type="text" class="form-control" name="durasi" required>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-8">
            <label for="nama_layanan">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="10" id="editor" required></textarea>
        </div>
        </div>
        <br>
        <script>
                window.onload = function() {
                CKEDITOR.replace( 'editor' );
       };
      </script>
        <input type="submit" class="btn btn-success" name="submit" value="Submit">
        <?php 
            include "koneksi.php";
            if(isset($_POST['submit'])){
                $nama       = $_POST['mitra'];
                $layanan    = $_POST['nama_layanan'];
                $harga      = $_POST['harga'];
                $foto       = $_FILES['foto']['name'];
                $lokasi     = $_FILES['foto']['tmp_name'];
                move_uploaded_file($lokasi, "../images/".$foto);
                $durasi     = $_POST['durasi'];
                $deskripsi  = $_POST['deskripsi'];
                if($nama=="sunrise"){
                  $mitra = "Sunrise Adventure Consultant";
                }else{
                  $mitra = "Kelompok Satu";
                }
                
                $sql = "INSERT INTO paket VALUES ('','$nama','$mitra','$layanan','$durasi','$deskripsi','$foto','$harga')";
                if(mysqli_query($koneksi, $sql)){
                    header("location: halaman_mitra.php");
                }else{
                    echo "Error";
                }
            }
        ?>
    </form>
</div>
<script src="vendor/ckeditor/ckeditor/ckeditor.js"></script>
</body>
</html>