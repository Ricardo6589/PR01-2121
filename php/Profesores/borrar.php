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
    <title>Borrar</title>
</head>
<body>

    <?php

        include '../connection.php';
        $sql1 = "UPDATE tbl_professor SET baja_prof = 1 where id_professor ={$_GET['id']}";
        $insert1 = mysqli_query($connection,$sql1);
        

    ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Usuario borrado',
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
