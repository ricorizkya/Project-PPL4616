<?php

  session_start();
    include 'koneksi.php';
    include 'functions.php';


	if (isset($_SESSION['is_login'])) {
    include 'header1.php';
	  }else{
		header("location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>LUPIN</title>
	<link href="images/logo.png" rel="shortcut icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="hero-wrap hero-bread" style="background-image: url('images/header2.jfif');">
      <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        	<h3 class="v">Lupin - Time to get a better experience</h3>
        	<h3 class="vr">Since - 2020</h3>
            <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Order</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Order</span></p>
          </div>
        </div>
      </div>
    </div>
<section class="ftco-section contact-section">
<div class="container">
    		<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big">Profile</h1>
            <h2 class="mb-4">Your Profile</h2>
          </div>
        </div>
        <div class="goto-here"></div>
      <div class="container mt-5">
            <div class="col-md-6 ftco-animate">
            <form action="" method="POST" class="contact-form" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <p style="text-align: left;"><b><h4>Personal Data</h4></b></p>
                    <?php
                    $id = $_SESSION['username'];
                    $profil = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$id'");
                    while($d = mysqli_fetch_array($profil)){
                    ?>
                    <div class="container">
                      <div class="row">
                        <div class="col-sm">
                          <b>Name </b>
                        </div>
                        <div class="col-sm">
                          <?php echo $d['nama_depan'];?> <?php echo $d['nama_belakang'];?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <b>Email</b>
                        </div>
                        <div class="col-sm">
                          <?php echo $d['email'];?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <b>Phone</b>
                        </div>
                        <div class="col-sm">
                          <?php echo $d['telepon'];?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <b>Address</b>
                        </div>
                        <div class="col-sm">
                          <?php echo $d['alamat'];?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <b>Username</b>
                        </div>
                        <div class="col-sm">
                          <?php echo $d['username'];?>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $d['id'];?>">
                    <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-primary py-3 px-5">Edit</a>
                    <?php } ?><br><br>

                    <p style="text-align: left;"><b><h4>Your Order</h4></b></p>
                      <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Date of Departure</th>
                          <th scope="col">Provider</th>
                          <th scope="col">Packages</th>
                          <th scope="col">Price</th>
                          <th scope="col">Guides</th>
                          <th scope="col">Status</th>
                          <th scope="col">Note</th>
                        </tr>
                      </thead>
                      <?php
                          $id = $_SESSION['username'];
                          $data = mysqli_query($koneksi, "SELECT * FROM checkout WHERE username='$id'");
                      ?>
                      <tbody>
                      <?php
                          $no=1;
                          while($e = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no ?></th>
                          <th scope="row"><?php echo $e['tanggal']; ?></th>
                          <th scope="row"><?php echo $e['nama_mitra']; ?></th>
                          <th scope="row"><?php echo $e['nama_gunung']; ?>  <?php echo $e['durasi'];?></th>
                          <th scope="row">USD <?php echo $e['harga']; ?>.00</th>
                          <th scope="row"><?php echo $e['guide']; ?></th>
                          <th scope="row"><?php echo $e['status']; ?></th>
                          <th scope="row"><?php echo $e['note']; ?></th>
                        </tr>
                    <?php $no++; } ?>
                      </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </form>
          </div>
    </section>
    </center>
 <!-- loader -->
 <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>