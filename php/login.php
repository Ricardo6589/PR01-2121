<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: ../index.php');
}
$user=$_POST['user'];
$pwd=$_POST['pwd'];
include 'connection.php';

$select2 = "SELECT * FROM tbl_professor where email_prof = '$user'";
$select3 = "SELECT * FROM tbl_admin where admin_login = '$user'";
$sele2= mysqli_query($connection, $select2);
$sele3= mysqli_query($connection, $select3);
$seleL2 = mysqli_num_rows($sele2);
$seleL3 = mysqli_num_rows($sele3);

if ($seleL2 == 1) {
    $seleF2=mysqli_fetch_array($sele2);
    if ($seleF2['email_prof'] == $user && $seleF2['pwd_profe'] == $pwd ) {
        $_SESSION['user']=$user;
        $_SESSION['pwd']=$pwd;
        header('Location: ./mostrar.php?alu=1');
    } else {
        header('Location: ../index.php?fallo=false');
    }
} elseif ($seleL3 == 1) {
    $seleF3 =mysqli_fetch_array($sele3);
    if ($seleF3['admin_login'] == $user && $seleF3['admin_pwd'] == $pwd) {
    $_SESSION['user']=$user;
    $_SESSION['pwd']=$pwd;
    header('Location: ./mostrar.php?id=1');
    } else {
        header('Location: ../index.php?fallo=false');
    }
} else {
    header('Location: ../index.php?exist=0');
}