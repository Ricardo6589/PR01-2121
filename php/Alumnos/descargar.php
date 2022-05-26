<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: ../../index.php');
}
include '../connection.php';
    
$sql = "SELECT * FROM tbl_alumne";
$listadodept = mysqli_query($connection, $sql);
file_put_contents("../../csv/registros_alumnos.csv","DNI;Nombre;1r_Apellido;2n_Apellido;Telefono;Email;Clase;\n");
foreach ($listadodept as $lista) {
     $sqllook = mysqli_query($connection, "SELECT nom_classe FROM tbl_classe where id_classe = {$lista['classe']}");
     $sqlnom = mysqli_fetch_array($sqllook);
     file_put_contents("../../csv/registros_alumnos.csv","{$lista['dni_alu']};{$lista['nom_alu']};{$lista['cognom1_alu']};{$lista['cognom2_alu']};{$lista['telf_alu']};{$lista['email_alu']};{$sqlnom['nom_classe']};\n",FILE_APPEND);
}
header ('Location: ../mostrar.php?alu=1') ;

                                                               
