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
            <h1 class="mb-0 bread">Travel</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Travel</span></p>
          </div>
        </div>
      </div>
    </div><br><br><br>

    <section>
    <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big">Partners</h1>
            <h2 class="mb-4">Our Partners</h2>
          </div>
        </div>
    </section>
		
    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
				<?php 
					
				?>
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/klpco.jpg);">
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-5 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">About <br>Kelompok Satu <br>
	            </div>
	          </div>
	          <div class="pb-md-5">
							<p>Kelompok Satu is a company engaged in services that provides several attractive offers in the field of climbing. Founded in 2017, we accompany many people who want to climb mountains in Indonesia.</p>
							<p>The packages we offer start from fast climbing (one day), normal climbing (2-3 days) and also packages for families. All packages that we offer have several categories, ranging from regular to private. </p>
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section ftco-product">
    	<div class="container">
    		<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big">Packages</h1>
            <h2 class="mb-4">Our Packages</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="product-slider owl-carousel ftco-animate">
					<?php 
			include 'koneksi.php';
			$sql = mysqli_query($koneksi, "SELECT * FROM paket WHERE nama_mitra='Kelompok Satu'");
			while($d = mysqli_fetch_array($sql)){
		?>
    					<div class="item">
		    				<div class="product">
		    					<a href="detail_paket.php?id= <?php echo $d['id']; ?> &detail" class="img-prod"><img class="img-fluid" src="images/<?php echo $d['foto']; ?>"></a>
		    					<div class="text pt-3 px-3">
		    						<h3><a href="#"><?php echo $d['nama_gunung']; ?></a></h3>
									<p><?php echo $d['durasi']; ?><br>
									<b>USD <?php echo $d['harga']; ?>.00</b><br>
		    					</div>
								<input type="button" class="btn btn-primary py-3 px-5" value="Order">
		    				</div>
	    				</div>
			<?php } ?>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/klp2.webp);">
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-5 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">About <br>Sunrise Adventure Consultant<br>
	            </div>
	          </div>
	          <div class="pb-md-5">
							<p>Sunrise Adventure Consultant is a company engaged in the service sector. Its work in the climbing world has long and often get clients from other countries. Join the climbing world since 2015, we accompany many people who want to climb mountains in Indonesia.</p>
							<p>The packages we offer start from fast climbing (one day), normal climbing (2-3 days) and also packages for families. All packages that we offer have several categories, ranging from regular to private. </p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-product">
    	<div class="container">
    		<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big">Packages</h1>
            <h2 class="mb-4">Our Packages</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="product-slider owl-carousel ftco-animate">
					<?php 
			include 'koneksi.php';
			$sql = mysqli_query($koneksi, "SELECT * FROM paket WHERE nama_mitra='Sunrise Adventure Consultant'");
			while($d = mysqli_fetch_array($sql)){
		?>
    					<div class="item">
		    				<div class="product">
		    					<a href="detail_paket.php?id= <?php echo $d['id']; ?> &detail" class="img-prod"><img class="img-fluid" src="images/<?php echo $d['foto']; ?>"></a>
		    					<div class="text pt-3 px-3">
		    						<h3><a href="#"><?php echo $d['nama_gunung']; ?></a></h3>
									<p><?php echo $d['durasi']; ?><br>
									<b>USD <?php echo $d['harga']; ?>.00</b><br>
									<input type="hidden" name="hidden_id" value="<?php echo $d['id']; ?>">
		    					</div>
								<a href="order.php?id= <?php echo $d['id']; ?> &action=add"><input type="button" name="order" class="btn btn-primary py-3 px-5" value="Order"></a>
		    				</div>
	    				</div>
			<?php } ?>
    				</div>
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