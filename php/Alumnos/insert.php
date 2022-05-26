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
    <title>Document</title>
</head>
<body>

    <?php

        include '../connection.php';

        //RECUPERAR DATOS
        $dni = $_POST['DNI'];
        $nom = $_POST['Nombre'];
        $ape1 = $_POST['1rApellido'];
        $ape2 = $_POST['2nApellido'];
        $telf = $_POST['Telefono'];
        $email = $_POST['Email'];
        $nclasse = $_POST['Clase'];
        $path=date('h-i-s-j-m-y')."-".$_FILES['foto_alu']['name'];        
        $sqllook = mysqli_query($connection, "SELECT id_classe FROM tbl_classe where nom_classe = '$nclasse'");
        $sqlnom = mysqli_fetch_array($sqllook);
        $classe = $sqlnom['id_classe'];
        $select = mysqli_query($connection, "SELECT id_classe From tbl_classe where nom_classe='$classe'");

        move_uploaded_file($_FILES['foto_alu']['tmp_name'],'../../img/'.$path);
        $sql = "INSERT INTO tbl_alumne (`dni_alu`,`nom_alu`, `cognom1_alu`, `cognom2_alu`,`telf_alu`,`email_alu`,`classe`,`foto_alu`) VALUES ('$dni','$nom','$ape1','$ape2','$telf','$email','$classe','$path')";
        $insert = mysqli_query($connection, $sql);  

    ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Usuario creado',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                })
        }

        aviso('../mostrar.php?alu=1');
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>
