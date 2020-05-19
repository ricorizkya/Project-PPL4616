<?php
include 'koneksi.php';

function login($username, $password, $remember){
    global $koneksi;
    $query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE username='$username' && password='$password'");
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
    $tgl    = $_POST['tgl_berangkat'];
    $userM  = $_POST['userMitra'];
    $mitra  = $_POST['mitra'];
    $gunung = $_POST['gunung'];
    $durasi = $_POST['durasi'];
    $harga  = $_POST['harga'];
    $guides = "-";
    $status = "Waiting";
    $note   = "-";
    mysqli_query($koneksi, "INSERT INTO checkout VALUES ('','$idUser','$user','$tgl','$userM','$mitra','$gunung','$durasi','$harga','$guides','$status','$note')");
    header("location: account.php");
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