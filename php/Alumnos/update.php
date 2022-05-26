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
    <title>Document</title>
</head>
<body>
    
    <?php

        include '../connection.php';
        $nclasse = $_POST['Clase'];
        $sqllook = mysqli_query($connection, "SELECT id_classe FROM tbl_classe where nom_classe = '$nclasse'");
        $sqlnom = mysqli_fetch_array($sqllook);
        $dni = $_POST['DNI'];
        $nombre = $_POST['Nombre'];
        $ape1 = $_POST['1rApellido'];
        $ape2 = $_POST['2nApellido'];
        $telf = $_POST['Telefono'];
        $email = $_POST['Email'];
        $classe = $sqlnom['id_classe'];
        $foto=$_FILES['foto_alu']['name'];
        if ($foto==NULL) {
            $foto="predeterminada.png";
        } else {
            $foto=date('h-i-s-j-m-y')."-".$_FILES['foto_alu']['name'];  
        }
        $id = $_POST['id'];
        move_uploaded_file($_FILES['foto_alu']['tmp_name'],'../../img/'.$foto);
        $sql = "UPDATE `tbl_alumne` SET `dni_alu` = '$dni',`nom_alu` = '$nombre', `cognom1_alu` = '$ape1', `cognom2_alu` = '$ape2', `telf_alu` = '$telf', `email_alu` = '$email', `classe` = '$classe', `foto_alu` = '$foto' WHERE `id_alumne` = $id";
        mysqli_query($connection, $sql);   
       

    ?>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Usuario modificado',
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

</body>
</html>
