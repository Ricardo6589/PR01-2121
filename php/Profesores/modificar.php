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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        /* background: linear-gradient(-45deg, #ee7752, #943ce7, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite; */
        /*---------------FONDO-CAMBIO-DE-COLOR-----------------*/
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
            margin-top:1%;
            padding-left: 1%;
            padding-right: 1%;
            color: white;                              
            margin-left: 25%;
            margin-right: 25%;
            border-radius: 2%;
            /* background-image: url(../../img/fondo_modificar.jpg);        */
                
        }
        
    </style>
    <title>Modificar </title>
    <link rel="stylesheet" type="text/css" href="../../css/view.css" media="all">  
    <script type="text/javascript" src="../../js/fvalidacion.js"></script>
    <script type="text/javascript" src="../../js/valida_Prof.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <a class="navbar-brand" href="../mostrar.php?prof=1"><img src="../../img/flechapatras.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a href="../mostrar.php?prof=1" class="nav-link active" aria-current="page">Volver<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a href="./exit.php" class="nav-link" role="button" aria-disabled="true">Log Out</a>
            </li>
            </ul>
        </div>
        <br>
        <br>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <div class="botones">
        
        </div>     
        </nav>
    <?php

        include '../connection.php';
        $sql = "SELECT * FROM tbl_professor WHERE id_professor={$_GET['id']}";
        $result = mysqli_query($connection, $sql);
        $tbl_professor = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $sqllook = mysqli_query($connection, "SELECT nom_dept FROM tbl_dept where id_dept = {$tbl_professor['dept']}");
        $sqlnom = mysqli_fetch_array($sqllook);

    ?>
    
        
   
    
    <div class="casilla">
        <h3>Modificar Profesor</h3>
        <br>
        <form action="./update.php" method="post" enctype="multipart/form-data" onsubmit="return validaFormulario();">
        <div >          
            <div class="form-group">
                <label>Nombre</label>
                <input id="element_2"type="text" class="form-control" required="required" name="Nombre" placeholder="Nombre" value="<?php echo $tbl_professor['nom_prof']; ?>">
                <span id="element_2_msg"></span>
            </div>
            <div class="form-group">
                <label>Primer Apellido</label>
                <input id="element_2_1" type="text" class="form-control" required="required" name="1rApellido" placeholder="Apellido1" value="<?php echo $tbl_professor['cognom1_prof']; ?>">
                <span id="element_2_1_msg"></span>
            </div>
            <div class="form-group">
                <label>Segundo Apellido</label>
                <input id="element_2_2" type="text" class="form-control" required="required" name="2nApellido" placeholder="Apellido2" value="<?php echo $tbl_professor['cognom2_prof']; ?>">
                <span id="element_2_2_msg"></span>
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input id="element_3" type="text" class="form-control" required="required" name="Telefono" placeholder="Telefono" value="<?php echo $tbl_professor['telf']; ?>">
                <span id="element_3_msg"></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input id="element_4"type="email" class="form-control" required="required" name="Email" placeholder="Correo" value="<?php echo $tbl_professor['email_prof']; ?>">
                <span id="element_4_msg"></span>
            </div>
            <label>Departamento</label>
            <div  class="form-group">
                <select id="element_5" name= "Departamento" class="form-control" required="required">
                    <option name="<?php echo $tbl_professor['id_professor']; ?>"><?php echo $sqlnom['nom_dept'];?></option>
                    <option name="1" id="1">SMX</option>               
                    <option name="4" id="4">ASIX</option>
                    <option name="5" id="5">DAW</option>                
                    <option name="8" id="8">DAM</option>
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
        </div>

        </form>
   
    </div>
  
</body>
</html>