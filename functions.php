<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include 'koneksi.php';

function login($username, $password, $remember){
    global $koneksi;
    $query = mysqli_query($koneksi, "SELECT * FROM `users` WHERE username='$username' && password='$password'");
    $message = "Username atau Password Salah";

    if (mysqli_num_rows($query)==0) {
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("location: login.php");
    }else{
        $data = $query->fetch_array();
        if($remember){
            setcookie('username', $username, time() + (86400 * 3), '/');
            setcookie('password', $password, time() + (86400 * 3), '/');
        }
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['is_login'] = TRUE;
        return TRUE;
    }
}

function relogin($username)
{
    $query = mysqli_query($this->koneksi,"SELECT * FROM user WHERE username='$username'");
    $data_user = $query->fetch_array();
    $_SESSION['username'] = $username;
    $_SESSION['nama_depan'] = $data_user['nama_depan'];
    $_SESSION['is_login'] = TRUE;
}

function order($order){
    global $koneksi;
    $idUser = $_POST['id'];
    $user   = $_POST['username'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $tgl    = $_POST['tgl_berangkat'];
    $userM  = $_POST['userMitra'];
    $mitra  = $_POST['mitra'];
    $gunung = $_POST['gunung'];
    $durasi = $_POST['durasi'];
    $harga  = $_POST['harga'];
    $guides = "-";
    $status = "Waiting";
    $note   = "-";
    mysqli_query($koneksi, "INSERT INTO checkout VALUES ('','$idUser','$user','$email','$phone','$tgl','$userM','$mitra','$gunung','$durasi','$harga','$guides','$status','$note')");
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
          $mail->Subject = 'Order Confirmation';
          $mail->Body    = '
          <h3>Order Confirmation</h3>
          <table>
              <tr>
                  <td>Name</td>
                  <td> : </td>
                  <td>'.$user.'</td>
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
                  <td>'.$guides.'</td>
              </tr>
              <tr>
                  <td>Date</td>
                  <td> : </td>
                  <td>'.$tgl.'</td>
              </tr>
              <tr>
                  <td>Status</td>
                  <td> : </td>
                  <td><b>'.$status.'</b></td>
              </tr>
          </table>
          <h3>All payments are made via BCA bank transfer a / n LUPIN ADVENTURE 8678728. And confirm to our customer service at contact@lupin.com. Thank you!</h3>
      ';
          $mail->AltBody = 'LUPIN ADVENTURE';

          $mail->send();
          echo '<script>alert("Message has be sent")</script>';
        header("location: account.php");
    } catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: ")</script>', $mail->ErrorInfo;
    }
}

function editAcc($edit){
    global $koneksi;
    $id         = $_POST['id'];
    $depan      = $_POST['nama_depan'];
    $belakang   = $_POST['nama_belakang'];
    $email      = $_POST['email'];
    $telp       = $_POST['telp'];
    $alamat     = $_POST['alamat'];
    $username   = $_POST['username'];
    $password   = $_POST['pass'];
    $updt = "UPDATE user SET nama_depan='$depan', nama_belakang='$belakang', telepon='$telp', email='$email', alamat='$alamat', username='$username', password='$password' WHERE id='$id'";
    if(mysqli_query($koneksi, $updt)){
        header("location: account.php");
      }else{
        echo "ERROR, Data gagal diupdate".mysqli_error();
      }
}
?>