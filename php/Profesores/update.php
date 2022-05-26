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
        $ndept = $_POST['Departamento'];
        $sqllook = mysqli_query($connection, "SELECT id_dept FROM tbl_dept where nom_dept = '$ndept'");
        $sqlnom = mysqli_fetch_array($sqllook);        
        $nombre = $_POST['Nombre'];
        $ape1 = $_POST['1rApellido'];
        $ape2 = $_POST['2nApellido'];
        $telf = $_POST['Telefono'];
        $email = $_POST['Email'];
        $foto = $_FILES['foto_prof']['name']; 
        if ($foto==NULL) {
            $foto="predeterminada.png";
        } else {
            $foto=date('h-i-s-j-m-y')."-".$_FILES['foto_prof']['name'];
        }
        echo $_FILES['foto_prof']['name'];
        $dept = $sqlnom['id_dept'];
        $id = $_POST['id'];
        move_uploaded_file($_FILES['foto_prof']['tmp_name'],'../../img/'.$foto);
        $sql = "UPDATE `tbl_professor` SET `nom_prof` = '$nombre', `cognom1_prof` = '$ape1', `cognom2_prof` = '$ape2', `telf` = '$telf', `email_prof` = '$email', `dept` = '$dept', `foto_prof` = '$foto' WHERE `id_professor` = $id";
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

        aviso('../mostrar.php?prof=1');
    </script>

</body>
</html>
