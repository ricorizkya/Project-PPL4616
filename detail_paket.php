<?php
    include 'koneksi.php';
    include 'header1.php';
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
            <h1 class="mb-0 bread">Detail Packages</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Detail Packages</span></p>
          </div>
        </div>
    </div>
</div>

<section>
<div class="container mt-5">
    <?php
        $id = $_GET['id'];
        $sql = mysqli_query($koneksi, "SELECT * FROM paket WHERE id=$id");
        while($d = mysqli_fetch_array($sql)){
    ?>
    <h2><?php echo $d['nama_gunung'];?> from <?php echo $d['nama_mitra'];?></h2>
    <input type="hidden" name="userMitra" value="<?php echo $d['username'];?>">
    <img src="images/<?php echo $d['foto']; ?>" width="1100px">
    <div class="text pt-3 px-3">
    <p><?php echo $d['deskripsi']; ?></p><br>
    <p><?php echo $d['durasi']; ?></p>
    <b>USD <?php echo $d['harga']; ?>.00</b>
    </div>
    <a href="order.php?id= <?php echo $d['id']; ?>"><input type="button" name="order" class="btn btn-primary py-3 px-5" value="Order"></a>
    <?php } ?>
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
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>