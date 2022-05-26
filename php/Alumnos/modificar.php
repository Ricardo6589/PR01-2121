<?php
session_start();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>  
        body {
        /* font-family: "Poppins", sans-serif;
        min-height: 100vh;
        background: linear-gradient(#000046, #1cb5e0); */
        background: linear-gradient(90deg, #42cdff, #7dddff, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        } 
        @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
        }
        


        .button {
        display: inline-block;
        border-radius: 7px;
        background-color: black;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 15px;
        padding: 15px;
        width: 125px;
        transition: all 0.1s;
        cursor: pointer;
        margin: 5px;
        }

        .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
        }

        .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
        }

        .button:hover span {
        padding-right: 25px;
        }

        .button:hover span:after {
        opacity: 1;
        right: 0;
        }
        .casilla {
            margin-top:1.75%;
            padding-left: 1%;
            padding-right: 1%;
            color: white;                  
            margin-left: 25%;
            margin-right: 25%;
            border-radius: 2%;
        }
       
</style>
    <title>Modificar</title>
    <link rel="stylesheet" type="text/css" href="../../css/view.css" media="all">  
    <script type="text/javascript" src="../../js/fvalidacion.js"></script>
    <script type="text/javascript" src="../../js/valida_Alu.js"></script>
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
                <a href="../mostrar.php?alu=1" class="nav-link active" aria-current="page">Volver<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a href="./exit.php" class="nav-link" role="button" aria-disabled="true">Log Out</a>
            </li>
            </ul>
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
        </nav> 
    </div>

    <?php

        include '../connection.php';
        $sql = "SELECT * FROM tbl_alumne WHERE id_alumne={$_GET['id']}";
        $result = mysqli_query($connection, $sql);
        $tbl_alumne = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $sqllook = mysqli_query($connection, "SELECT nom_classe FROM tbl_classe where id_classe = {$tbl_alumne['classe']}");
        $sqlnom = mysqli_fetch_array($sqllook);

    ?>
   
        
    <div class="casilla">
        <h3>Modificar Alumno</h3>
        <form action="./update.php" method="post" enctype="multipart/form-data" onsubmit="return validaFormulario();">
            <div class="form-group">
                <label>DNI</label>
                <input id="element_1" type="text" class="form-control" required="required" name="DNI" placeholder="DNI" value="<?php echo $tbl_alumne['dni_alu']; ?>">                
                <span id="element_1_msg"></span>
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input id="element_2" type="text" class="form-control" required="required" name="Nombre" placeholder="Nombre" value="<?php echo $tbl_alumne['nom_alu']; ?>">
                <span id="element_2_msg"></span>
            </div>
            <div class="form-group">
                <label>Primer Apellido</label>
                <input id="element_2_1" type="text" class="form-control" required="required" name="1rApellido" placeholder="Apellido1" value="<?php echo $tbl_alumne['cognom1_alu']; ?>">
                <span id="element_2_1_msg"></span>
            </div>
            <div class="form-group">
                <label>Segundo Apellido</label>
                <input id="element_2_2" type="text" class="form-control" required="required" name="2nApellido" placeholder="Apellido2" value="<?php echo $tbl_alumne['cognom2_alu']; ?>">
                <span id="element_2_2_msg"></span>
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input id="element_3" type="text" class="form-control" required="required" name="Telefono" placeholder="Telefono" value="<?php echo $tbl_alumne['telf_alu']; ?>">
                <span id="element_3_msg"></span>
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input id="element_4" type="email" class="form-control" required="required" name="Email" placeholder="Correo" value="<?php echo $tbl_alumne['email_alu']; ?>">
                <span id="element_4_msg"></span>
            </div>
            <div class="form-group">
                <label>Classe</label>
                <select id="element_5" name= "Clase" required="required" class="form-control"  placeholder="Clase" value="<?php echo $tbl_alumne['classe_alu']; ?>">
                    <option name="<?php echo $tbl_alumne['id_alumne']; ?>"><?php echo $sqlnom['nom_classe'];?></option>
                    <option name="1" id="1">1rSMX</option>
                    <option name="2" id="2">2nSMX</option>
                    <option name="3" id="3">1rASIX</option>
                    <option name="4" id="4">2nASIX</option>
                    <option name="5" id="5">1rDAW</option>
                    <option name="6" id="6">2nDAW</option>
                    <option name="7" id="7">1rDAM</option>
                    <option name="8" id="8">2nDAM</option>
                </select>
                <span id="element_5_msg"></span>
            </div>
            
            <div class="form-group">
                <label>Foto</label>         
                <br>       
                <input  id="element_6" type="file" name="foto_alu" placeholder="Foto" maxlength="255" value="" x="Foto"/>
                
            </div> 
            <br>            
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <button class="button" style="vertical-align:middle"><span>Modificar</span></button>
        

        </form>
    </div>  
    
    

</body>
</html>