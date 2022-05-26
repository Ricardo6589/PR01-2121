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
        $nom = $_POST['Nombre'];
        $ape1 = $_POST['1rApellido'];
        $ape2 = $_POST['2nApellido'];
        $telf = $_POST['Telefono'];
        $email = $_POST['Email'];
        $ndept = $_POST['Departamento'];
        $foto = $_FILES['foto_prof']['name']; 
        if ($foto==NULL) {
            $foto="predeterminada.png";
        } else {
            $foto=date('h-i-s-j-m-y')."-".$_FILES['foto_prof']['name'];
        }
        $sqllook = mysqli_query($connection, "SELECT id_dept FROM tbl_dept where nomcor_dept = '$ndept'");
        $sqlnom = mysqli_fetch_array($sqllook);
        $dept = $sqlnom['id_dept'];

        move_uploaded_file($_FILES['foto_prof']['tmp_name'],'../../img/'.$foto);
        $sql = "INSERT INTO tbl_professor (`nom_prof`,`cognom1_prof`, `cognom2_prof`,`telf`,`email_prof`,`dept`,`foto_prof`) VALUES ('$nom','$ape1','$ape2','$telf','$email','$dept','$foto')";
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

        aviso('../mostrar.php?prof=1');
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>
