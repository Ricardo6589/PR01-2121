<?php
session_start();
include '../connection.php';
if (empty($_SESSION['user'])) {
    header('Location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <a class="navbar-brand" href="../mostrar.php?alu=1"><img src="../../img/flechapatras.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link active" aria-current="page">Volver<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
            <a href="../exit.php" class="nav-link" role="button" aria-disabled="true">Log Out</a>
            </li>
            </ul>
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
        </nav>
    <br>
    <br>
    <br>
                       
        <?php
       $id = $_GET['id']; 
       $ruta= "../../img/";

            $listadodept = mysqli_query($connection, "SELECT * FROM tbl_alumne where id_alumne={$id};");            
        
            
            foreach ($listadodept as $alu) {
                $sqllook = mysqli_query($connection, "SELECT nom_classe FROM tbl_classe where id_classe = {$alu['classe']}");
                $sqlnom = mysqli_fetch_array($sqllook);
                echo '<tr class="Fondo_Perfil">';  
                    echo '<div class="campos1">';
                        echo '<div class="parte1">';
                            echo "<td ><img class='FotoPerfil' src=$ruta"."{$alu['foto_alu']}></td>";                
                            echo "<td ><p class='datos'>DNI</p></td>";                                     
                            echo "<td ><p class='datos1'>{$alu['dni_alu']}</p></td>";  
                        echo '</div>';
                        echo '<div class="parte2">';                       
                            echo "<td><p class='datos3'>Nombre</p></td>";                  
                            echo "<td><p class='datos2'>{$alu['nom_alu']}</p></td>";                  
                            echo "<td><p class='datos3'>1r Apellido</p></td>";                
                            echo "<td><p class='datos2'>{$alu['cognom1_alu']}</p></td>";                  
                            echo "<td><p class='datos3'>2n Apellido</p></td>";
                            echo "<td><p class='datos2'>{$alu['cognom2_alu']}</p></td>"; 
                        echo '</div>';  
                        
                        echo '<div class="parte3">';                                           
                            echo "<td><p class='datos3'>Telefono</p></td>";                    
                            echo "<td><p class='datos2'>{$alu['telf_alu']}</p></td>";                
                            echo "<td><p class='datos3'>Email</p></td>";                
                            echo "<td><p class='datos2'>{$alu['email_alu']}</p></td>";                
                            echo "<td><p class='datos3'>Clase</p></td>";                 
                            echo "<td><p class='datos2'>{$sqlnom['nom_classe']}</p></td>";   
                        echo '</div>'; 
                    echo '</div>'; 

                echo '</tr>'; 
                              
                     
    
            }
          
                    
        
        ?>   
    
</body>
</html>