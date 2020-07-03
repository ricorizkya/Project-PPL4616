<?php
include 'koneksi.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

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
    $mail->addAddress('ricorizkya26@gmail.com', 'Rico');     // Add a recipient
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
            <td>Rico</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td> : </td>
            <td>08273882</td>
        </tr>
        <tr>
            <td>Package</td>
            <td> : </td>
            <td>Merbabu</td>
        </tr>
        <tr>
            <td>Guide</td>
            <td> : </td>
            <td>Sapek</td>
        </tr>
        <tr>
            <td>Date</td>
            <td> : </td>
            <td>09-07-2020</td>
        </tr>
        <tr>
            <td>Status</td>
            <td> : </td>
            <td><b>On Process</b></td>
        </tr>
    </table>
';
    $mail->AltBody = 'LUPIN ADVENTURE';

    $mail->send();
    echo '<script>alert("Message has be sent")</script>';
} catch (Exception $e) {
    echo '<script>alert("Message could not be sent. Mailer Error: ")</script>', $mail->ErrorInfo;
}