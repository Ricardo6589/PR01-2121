<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link de bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- link de css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- JS     -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Correo</title>
    <script type="text/javascript" src="../../js/fvalidacion.js"></script>
    <script type="text/javascript" src="../../js/valida_Email.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/view.css" media="all">
    <style>
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
        }

        body{
                        /* background-image: url(../../img/fondo_modificar.jpg);        */
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
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <a class="navbar-brand" href="../mostrar.php?id=1"><img src="../../img/flechapatras.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a href= "../mostrar.php?id=1" class="nav-link active" aria-current="page">Volver<span class="sr-only">(current)</span></a>
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
    <div id="FormularioCorreo casilla" class ="campos1 casilla">
      <form action="enviarcorreo.php" method="post" onsubmit="return validaFormulario();">
        <label class="description" for="element_1">Nombre</label>
        <input  id="element_1"type="text" required="required" name="nombre" class="form-control" placeholder="Remitente">
        <span id="element_1_msg"></span>        
        <br>
        <label class="description" for="element_2">Correo</label>
        <input id="element_2" type="email" required="required" name="email" class="form-control" placeholder="Destinatario">
        <span id="element_2_msg"></span>
        <br>
        <label>Asunto</label>
        <input type="text" name="asunto" class="form-control" placeholder="Pon el Asunto del mensaje">
        <br>
        <label class="description" for="element_3">Mensaje</label>
        <textarea id="element_3" name="mensaje" id="" required="required" class="form-control" rows="8" placeholder="Escribe tu mensaje..."></textarea>
        <span id="element_3_msg"></span>
        <br>
        <button class="button" style="vertical-align:middle"><span>Enviar</span></button>
    </form>  
    </div>
    
    
</body>
</html>