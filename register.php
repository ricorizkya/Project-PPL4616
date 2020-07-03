<?php
  include 'koneksi.php';

  if (isset($_POST['submit_register'])) {
    $nama_depan = $_POST['nama_depan'];
    $email = $_POST['email'];
    $phone_member = $_POST['phone_member'];
    $street_member = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $token=hash('sha256', md5(date('Y-m-d'))) ;

    $user_check_query = "SELECT * FROM users WHERE email='".$email."'";
    $result = mysqli_query($koneksi, $user_check_query);
    $cek = mysqli_num_rows($result);
    $message = "Username already taken";
    if ($cek>0) { // if user exists
      echo "<script type='text/javascript'>alert('$message');</script>";
      }else{
        $insert = mysqli_query($koneksi, "INSERT INTO users VALUES ('','$username','$password','$nama_depan','$email','$phone_member','$street_member','$token','0')");
        include("mail.php");
        if($insert) {
          echo '<script>alert("Registration successful. Please check the email for verification.")</script>';
        }
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>LUPIN</title>
    <link href="images/logo.png" rel="shortcut icon">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" type="text/css" href="owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" type="text/css" href="no.arrow.css">
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
  <?php include "header.php"; ?>
    <!-- END nav -->

    <section>
    <div class="hero-wrap js-fullheight" style="background-image: url('images/header3.jfif');">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
        	<h3 class="v">Lupin - Time to get a better experience</h3>
        	<h3 class="vr">Since - 2020</h3>
          <div class="col-md-11 ftco-animate text-center">
            <h1>Register</h1>
            <h2><span>Get Different Experiences</span></h2>
          </div>
          <div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
						</a>
		  </div>
        </div>
      </div>
    </div>
  </section>

    <section class="ftco-section contact-section">
        <div class="goto-here"></div>
      <center>
      <div class="container mt-5">
            <div class="col-md-6 ftco-animate">
            <form action="" method="POST" class="contact-form" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="nama_depan" placeholder="Name" autocomplete="off" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="number" class="form-control" name="phone_member" placeholder="Phone" autocomplete="off" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="address" placeholder="Address" autocomplete="off" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
                  </div>
                  </div>
              </div>
              <div class="form-group">
                <input type="submit" name="submit_register" value="Register" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
            </center>
    </section>

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