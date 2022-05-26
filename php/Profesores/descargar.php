<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: ../../index.php');
}
include '../connection.php';


$sql = "SELECT * FROM tbl_professor";
$listadodept = mysqli_query($connection, $sql);
file_put_contents("../../csv/registros_profesores.csv","Nombre;1r_Apellido;2n_Apellido;Telefono;Email;Departamento;\n");
foreach ($listadodept as $lista) {
     $sqllook = mysqli_query($connection, "SELECT nomcor_dept FROM tbl_dept where id_dept = {$lista['dept']}");
     $sqlnom = mysqli_fetch_array($sqllook);
     file_put_contents("../../csv/registros_profesores.csv","{$lista['nom_prof']};{$lista['cognom1_prof']};{$lista['cognom2_prof']};{$lista['telf_prof']};{$lista['email_prof']};{$sqlnom['nomcor_dept']};\n",FILE_APPEND);
}
header ('Location: ../mostrar.php?prof=1') ;                          
