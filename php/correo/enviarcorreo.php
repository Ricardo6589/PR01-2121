<?php
session_start();
include '../connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$sql=mysqli_query($connection,"SELECT * FROM tbl_admin where admin_login = '{$_SESSION['user']}'");
$ver= mysqli_num_rows($sql);
$user=mysqli_fetch_array($sql);
$sqlprof = mysqli_query($connection, "SELECT * FROM tbl_professor where nom_prof = '{$_SESSION['user']}'");
$userprof = mysqli_fetch_array($sqlprof);
$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$titulo = $_POST['asunto'];
$contenido = $_POST['mensaje'];

if ($ver == 1) {

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "{$user['email_admin']}";                     //SMTP username
        $mail->Password   = "{$user['admin_pwd']}";                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("$correo", "$nombre");
        $mail->addAddress("$correo");     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "$titulo";
        $mail->Body    = "$contenido";

        $mail->send();
        header('Location: ../mostrar.php');
    } catch (Exception $e) {
        echo "Mensaje de error: {$mail->ErrorInfo}";
        header('Location: ../mostrar.php?error=true');
    }
} else {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "{$userprof['email_prof']}";                     //SMTP username
        $mail->Password   = "{$user['pwd_profe']}";                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("$correo", "$nombre");
        $mail->addAddress("$correo");     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "$titulo";
        $mail->Body    = "$contenido";

        $mail->send();
        header('Location: ../mostrar.php');
    } catch (Exception $e) {
        echo "Mensaje de error: {$mail->ErrorInfo}";
        header('Location: ../mostrar.php?error=true');
    }
}
