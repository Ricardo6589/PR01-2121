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
    <title>Crear</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../css/view.css" media="all">  
    <script type="text/javascript" src="../../js/fvalidacion.js"></script>
    <script type="text/javascript" src="../../js/valida_Alu.js"></script>
    <style>
      body {
        /* font-family: "Poppins", sans-serif;
        min-height: 100vh;
        background: linear-gradient(#000046, #1cb5e0); */
        background: linear-gradient(-45deg, #ee7752, #7dddff, #23a6d5, #23d5ab);
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
    <link rel="stylesheet" href="../css/style.css">


</head>
<body>
    <div class ="barranav">
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
                    <a href="../exit.php" class="nav-link" role="button" aria-disabled="true">Log Out</a>
                </li>
                </ul>
            </div>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
           
            </nav> 
    </div>
   <br>
   <br>
   <br>
    <div id="form_container" class =datos>

        <!-- <h1><a>Datos personales</a></h1> -->
        <form id="form_1078726" class="appnitro" action="./insert.php" method="post" enctype="multipart/form-data" onsubmit="return validaFormulario();">
            <div class="form_description">
                <h2>Datos del Alumno</h2>
            </div>
            <ul>
                <li id="li_7">
                    <label class="description" for="element_1">DNI </label>
                    <div>
                        <input id="element_1" name="DNI" class="element text medium" required="required" type="text" maxlength="255" value="" />
                        <label for="element_1">12345678A</label>
                        <span id="element_1_msg"></span>
                    </div>
                </li> 

                <li id="li_1">
                    <label class="description" for="element_1">Nombre</label>
                    <span>
						<input id="element_2" name= "Nombre" class="element text" required="required" maxlength="255" size="24" value="" oninput="this.style.backgroundColor='white'" />
						<label>Nombre</label>
						<span id="element_2_msg"></span>
                    </span>
                    <span>
						<input id="element_2_1" name= "1rApellido" class="element text" required="required" maxlength="255" size="48" value="" oninput="this.style.backgroundColor='white'"/>
						<label>Primer Apellido</label>
						<span id="element_2_1_msg"></span>
                    </span>
                    <span>
						<input id="element_2_2"name= "2nApellido" class="element text" required="required" maxlength="255" size="48" value="" oninput="this.style.backgroundColor='white'" x="2n Apellido"/>
						<label>Segundo Apellido</label>
						<span id="element_2_2_msg"></span>
                    </span>
                </li>
                <li id="li_5">
                    <label class="description" for="element_3">Teléfono </label>
                    <div>
                        <input id="element_3" name="Telefono" class="element text medium"  required="required" type="number" maxlength="255" value="" x="Telefono" />
                        <label for="element_3">999 999 999</label>
                        <span id="element_3_msg"></span>
                    </div>
                </li>                                
                              
                
                <li id="li_9">
                    <label class="description" for="element_5">Clase</label><div>
                        <select class="element select medium" id="element_5"  name="Clase" required="required" onchange="this.style.backgroundColor='white'" x="Classe">
							<option value="" selected="selected"></option>
							<option value="1rSMX" >SMX 1</option>
                            <option value="2nSMX" >SMX 2</option>
                            <option value="1rASIX" >ASIX 1</option>
                            <option value="2nASIX" >ASIX 2</option>
                            <option value="1rDAW" >DAW 1</option>
                            <option value="2nDAW" >DAW 2</option>
                            <option value="1rDAM" >DAM 1</option>
                            <option value="2nDAM" >DAM 2</option>
                		</select>
                        <br>
                       
                        <span id="element_5_msg"></span>
                    </div>
                </li>

                <li id="li_4">
                    <label class="description" for="element_4">Email </label>
                    <div>
                        <input id="element_4"  name="Email" class="element text medium" required="required" type="email" maxlength="255" value="" x="Email" />
                        <br>
                        <span id="element_4_msg"></span>
                    </div>
                </li>
                <li id="li_8">
                    <label class="description" for="element_6">Foto </label>
                    <div class="description" for="element_6">
                        <input  id="element_6" type="file" name="foto_alu" placeholder="Foto" maxlength="255" value="" x="Foto"/>
                    </div>
                </li>                             
                <li class="buttons">                
                    <input id="saveForm" class="button_text" type="submit" value="Crear"/>
                </li>
            </ul>
        </form>        
    </div>   
    
</body>

</html>