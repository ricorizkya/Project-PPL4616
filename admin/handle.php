<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include 'koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM checkout WHERE id=$id";
$query = mysqli_query($koneksi, $sql);

  if(isset($_POST['submit'])){
    $id       = $_POST['id'];
    $username = $_POST['user'];
    $email    = $_POST['email_member'];
    $phone    = $_POST['phone_member'];
    $tanggal  = $_POST['tgl'];
    $mitra    = $_POST['mitra'];
    $gunung   = $_POST['gunung'];
    $durasi   = $_POST['durasi'];
    $harga    = $_POST['harga'];
    $guide    = $_POST['guide'];
    $status   = $_POST['status'];
    $note     = $_POST['note'];
    $sql = "UPDATE checkout SET guide='$guide', status='$status', note='$note' WHERE id='$id'";
    if(mysqli_query($koneksi, $sql)){

      $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
      try {
          //Server settings
          $mail->SMTPDebug = 0;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'gilangakbar120596@gmail.com';                 // SMTP username
          $mail->Password = '18november99';                           // SMTP password
          $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 465;                                    // TCP port to connect to

          //Recipients
          $mail->setFrom('gilangakbar120596@gmail.com', 'LUPIN');
          $mail->addAddress($email, $username);     // Add a recipient
          //$mail->addAddress('ellen@example.com');               // Name is optional
          //$mail->addReplyTo('info@example.com', 'Information');
          //$mail->addCC('cc@example.com');
          //$mail->addBCC('bcc@example.com');

          //Attachments
          //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
          //$id = $_GET['id'];
          //$sql = "SELECT * FROM checkout WHERE id=$id";
          //$query = mysqli_query($koneksi, $sql);
          //while($d = mysqli_fetch_assoc($query)){

          //}
          //Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Order Detail';
          $mail->Body    = '
          <h3>Order Detail</h3>
          <table>
              <tr>
                  <td>Name</td>
                  <td> : </td>
                  <td>'.$username.'</td>
              </tr>
              <tr>
                  <td>Phone</td>
                  <td> : </td>
                  <td>'.$phone.'</td>
              </tr>
              <tr>
                  <td>Package</td>
                  <td> : </td>
                  <td>'.$gunung.'  '.$durasi.'</td>
              </tr>
              <tr>
                  <td>Partner</td>
                  <td> : </td>
                  <td>'.$mitra.'</td>
              </tr>
              <tr>
                  <td>Price</td>
                  <td> : </td>
                  <td>$'.$harga.'.0</td>
              </tr>
              <tr>
                  <td>Guide</td>
                  <td> : </td>
                  <td>'.$guide.'</td>
              </tr>
              <tr>
                  <td>Date</td>
                  <td> : </td>
                  <td>'.$tanggal.'</td>
              </tr>
              <tr>
                  <td>Status</td>
                  <td> : </td>
                  <td><b>'.$status.'</b></td>
              </tr>
          </table>
      ';
          $mail->AltBody = 'LUPIN ADVENTURE';

          $mail->send();
          echo '<script>alert("Message has be sent")</script>';
      } catch (Exception $e) {
          echo '<script>alert("Message could not be sent. Mailer Error: ")</script>', $mail->ErrorInfo;
    }
      header("location: halaman_order_mitra.php");
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
      <li class="nav-item">
        <a class="nav-link" href="halaman_admin.php">Mitra <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="halaman_user.php">User</a>
      </li>
      <li class="nav-item active">
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


  while($d = mysqli_fetch_assoc($query)){
?>
    <h3><b>Handle Order</b></h3>
    <form method="POST" action="" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-2">
            <b>Nama User</b><br>
            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
            <input type="hidden" name="user" value="<?php echo $d['username']; ?>">
            <input type="hidden" name="email_member" value="<?php echo $d['email_member']; ?>">
            <input type="hidden" name="phone_member" value="<?php echo $d['phone_member']; ?>">
            <?php echo $d['username']; ?>
        </div>
        <div class="col-sm-4">
            <b>Tanggal Keberangkatan</b><br>
            <input type="hidden" name="tgl" value="<?php echo $d['tanggal']; ?>">
            <?php echo $d['tanggal']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <b>Nama Mitra</b><br>
            <input type="hidden" name="mitra" value="<?php echo $d['nama_mitra']; ?>">
            <?php echo $d['nama_mitra']; ?>
        </div>
        <div class="col-sm-4">
            <b>Nama Paket</b><br>
            <input type="hidden" name="gunung" value="<?php echo $d['nama_gunung']; ?>">
            <input type="hidden" name="durasi" value="<?php echo $d['durasi']; ?>">
            <input type="hidden" name="harga" value="<?php echo $d['harga']; ?>">
            <?php echo $d['nama_gunung']; ?> <?php echo $d['durasi']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <b>Guides</b><br>
            <input type="text" name="guide" style="width:450px;">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <b>Status</b><br>
            <input type="radio" name="status" id="proses" value="On Process">
            <label for="proses">On Process</label>
        </div>
        <div class="col-sm-2">
            <br>
            <input type="radio" name="status" id="done" value="Done">
            <label for="done">Done</label>
        </div>
        <div class="sm-2">
            <br>
            <input type="radio" name="status" id="deny" value="Deny">
            <label for="deny">Deny</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <b>Catatan</b><br>
            <textarea class="form-control" name="note" id="note" cols="53" rows="10"></textarea>
        </div>
    </div>
    <script>
                window.onload = function() {
                CKEDITOR.replace( 'note' );
       };
      </script>
<?php } ?><br>
        <button class="btn btn-success" type="submit" name="submit">Submit</button>
    </form>
</div>
<script src="vendor/ckeditor/ckeditor/ckeditor.js"></script>
</body>
</html>