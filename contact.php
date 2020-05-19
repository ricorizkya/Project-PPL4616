<?php
	session_start();
	if (isset($_SESSION['is_login'])) {
		include "header1.php";
		//header('login.php');
		//exit();
	  }else{
		include "header.php";
		//exit();
    }
    
    include 'koneksi.php';

    if(isset($_POST['submit_message'])){
      $nama = $_POST['name'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $main = $_POST['main'];

      $sql = mysqli_query($koneksi, "INSERT INTO testimoni VALUES ('','$nama','$email','$subject','$main')");
      header("location: contact.php");

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
    <!-- END nav -->
		
		<div class="hero-wrap hero-bread" style="background-image: url('images/header2.jfif');">
      <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        	<h3 class="v">Lupin - Time to get a better experience</h3>
        	<h3 class="vr">Since - 2020</h3>
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Contact</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Contact</span></p>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section">
      <div class="container mt-5">
        <div class="row block-9">
					<div class="col-md-4 contact-info ftco-animate">
						<div class="row">
							<div class="col-md-12 mb-4">
	              <h2 class="h4">Contact Information</h2>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Address:</span><a href="https://goo.gl/maps/Mg3PB7QsAnv6g4BP6"> Semarang Indah Block B2 No.4, West Semarang, Semarang</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Phone:</span> <a href="tel://1234567920">+6282144285606</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Email:</span> <a href="mailto:info@yoursite.com">contact@lupin.com</a></p>
	            </div>
              <div class="col-md-12 mb-3">
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
	            </div>
						</div>
					</div>
					<div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate">
            <form action="" method="POST" class="contact-form">
            	<div class="row">
            		<div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" class="form-control" name="name" placeholder="Name" autocomplete="off" required>
	                </div>
                </div>
                <div class="col-md-6">
	                <div class="form-group">
	                  <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" required>
	                </div>
	                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject" autocomplete="off" required>
              </div>
              <div class="form-group">
                <textarea id="" cols="30" rows="7" class="form-control" name="main" placeholder="Message" autocomplete="off" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit_message" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
      </div>
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
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>