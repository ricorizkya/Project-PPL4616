<?php

  session_start();
    include 'koneksi.php';
    include 'functions.php';


	if (isset($_SESSION['is_login'])) {
    include 'header1.php';
	  }else{
		header("location: login.php");
    }

  if(isset($_POST['submit_order'])){
    order($_POST['submit_order']);
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
<center>
<section class="ftco-section contact-section">
<div class="container">
    		<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big">Order</h1>
            <h2 class="mb-4">Your Order</h2>
          </div>
        </div>
        <div class="goto-here"></div>
      <div class="container mt-5">
            <div class="col-md-6 ftco-animate">
            <form action="" method="POST" class="contact-form" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <p style="text-align: left;"><b>Personal Data</b></p>
                    <?php
                    $id = $_SESSION['username'];
                    $profil = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$id'");
                    while($d = mysqli_fetch_array($profil)){
                    ?>
                    <div class="container" style="text-align: left;">
                      <div class="row">
                        <div class="col-sm">
                          <b>Name </b>
                        </div>
                        <div class="col-sm">
                          <?php echo $d['nama'];?>
                          <input type="hidden" name="username" value="<?php echo $d['username']; ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <b>Email</b>
                        </div>
                        <div class="col-sm">
                          <?php echo $d['email'];?>
                          <input type="hidden" name="email" value="<?php echo $d['email']; ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <b>Phone</b>
                        </div>
                        <div class="col-sm">
                          <?php echo $d['no_hp'];?>
                          <input type="hidden" name="phone" value="<?php echo $d['no_hp']; ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <b>Address</b>
                        </div>
                        <div class="col-sm">
                          <?php echo $d['alamat'];?>
                          <input type="hidden" name="alamat" value="<?php echo $d['alamat']; ?>">
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $d['id_users']; ?>">
                    <input type="hidden" name="username" value="<?php echo $d['username']; ?>">
                    <?php } ?><br><br>

                    <p style="text-align: left;"><b>Packages</b></p>
                    <?php
                      $idp = $_GET['id'];
                      $paket = mysqli_query($koneksi, "SELECT * FROM paket WHERE id='$idp'");
                      while($e = mysqli_fetch_array($paket)){ ?>
                    <div class="container" style="text-align: left;">
                      <div class="row">
                        <div class="col-sm">
                          <b>Provider</b>
                        </div>
                        <div class="col-sm">
                          <?php echo $e['nama_mitra'];?>
                          <input type="hidden" name="mitra" value="<?php echo $e['nama_mitra'];?>">
                          <input type="hidden" name="userMitra" value="<?php echo $e['username'];?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <b>Packages</b>
                        </div>
                        <div class="col-sm">
                          <?php echo $e['nama_gunung'];?> <?php $e['durasi'];?>
                          <input type="hidden" name="gunung" value="<?php echo $e['nama_gunung'];?>">
                          <input type="hidden" name="durasi" value="<?php echo $e['durasi'];?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <b>Price</b>
                        </div>
                        <div class="col-sm">
                          USD <?php echo $e['harga'];?>.00
                          <input type="hidden" name="harga" value="<?php echo $e['harga'];?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <b>Date of Departure</b>
                        </div>
                        <div class="col-sm">
                        <input type="date" name="tgl_berangkat" id="tgl_berangkat" style="align: left;">
                        </div>
                      </div>
                    </div>
                      <?php } ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" name="submit_order" value="Order" class="btn btn-primary py-3 px-5">
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