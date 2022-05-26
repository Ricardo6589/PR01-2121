<?php
session_start();
include 'connection.php';
if (empty($_SESSION['user'])) {
    header('Location: ../index.php');
}

$sqllo=mysqli_query($connection,"SELECT * FROM tbl_professor where email_prof = '{$_SESSION['user']}'");
$sqlogin = mysqli_num_rows($sqllo);

if ($_SESSION['user']=='admin' || $_SESSION['user']=='admin2') {
    if (!empty($_POST['buscaralu'])) {
        $buscaralu = $_POST['buscaralu'];
    } else {
        $buscaralu = NULL;
    }
    if (!empty($_POST['buscarprof'])) {
        $buscarprof = $_POST['buscarprof'];
    } else {
        $buscarprof = NULL;
    }
/* BUSCADOR PARA ALUMNO SQL*/
$sqlbusalu = "SELECT a.id_alumne, a.dni_alu, c.nom_classe, a.nom_alu, a.cognom1_alu, a.cognom2_alu, a.telf_alu, a.email_alu FROM tbl_alumne a INNER JOIN tbl_classe c ON a.classe= c.id_classe WHERE
(a.dni_alu like '%$buscaralu%' OR
c.nom_classe like '%$buscaralu%' OR
a.nom_alu like '%$buscaralu%' OR
a.cognom1_alu like '%$buscaralu%' OR
a.cognom2_alu like '%$buscaralu%' OR
a.telf_alu like '%$buscaralu%' OR
a.email_alu like '%$buscaralu%')";
$sqlcontar = mysqli_query($connection,"SELECT count(*)
AS total FROM tbl_alumne a INNER JOIN tbl_classe c ON a.classe= c.id_classe WHERE 
(a.dni_alu like '%$buscaralu%' OR
c.nom_classe like '%$buscaralu%' OR
a.nom_alu like '%$buscaralu%' OR
a.cognom1_alu like '%$buscaralu%' OR
a.cognom2_alu like '%$buscaralu%' OR
a.telf_alu like '%$buscaralu%' OR
a.email_alu like '%$buscaralu%')");
$buscarsql = mysqli_query($connection, $sqlbusalu);
$contar = mysqli_fetch_array($sqlcontar);
$totalalu = $contar['total'];

/*BUSCADOR PARA PROFESOR SQL*/
$sqlbusprof = "SELECT p.id_professor, p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf, d.nomcor_dept FROM tbl_professor p INNER JOIN tbl_dept d ON p.dept=d.id_dept WHERE p.baja_prof=0 AND
(p.nom_prof like '%$buscarprof%' OR
d.nomcor_dept like '%$buscarprof%' OR
p.cognom1_prof like '%$buscarprof%' OR
p.cognom2_prof like '%$buscarprof%' OR
p.email_prof like '%$buscarprof%' OR
p.telf like '%$buscarprof%')";
$sqlcontarprof =mysqli_query($connection, "SELECT count(*)
AS total FROM tbl_professor p INNER JOIN tbl_dept d ON p.dept=d.id_dept WHERE p.baja_prof=0 AND
(p.nom_prof like '%$buscarprof%' OR
d.nomcor_dept like '%$buscarprof%' OR
p.cognom1_prof like '%$buscarprof%' OR
p.cognom2_prof like '%$buscarprof%' OR
p.email_prof like '%$buscarprof%' OR
p.telf like '%$buscarprof%')");
$buscarsqlprof= mysqli_query($connection,$sqlbusprof);
$contarpro = mysqli_fetch_array($sqlcontarprof);
$totalprof = $contarpro['total'];
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
        <!-- JS     -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- link de css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Libreria Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css%22%3E">

    <title>Mostrar</title>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
</head>
<body>
    <!-- Comienzo de navbar -->
    <div class="menu">                  
                    
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <a class="navbar-brand" href="./mostrar.php?id=1">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="?alu=1">Alumno<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?prof=1">Professor</a>
            </li>
            <li class="nav-item active">
                <a href="./exit.php" role="button" class="nav-link" aria-disabled="true">Log Out</a>
            </li>
            </ul>
        </div>
        <?php
            if (!empty($_GET['alu'])) { ?>
            <form class="form-inline my-2 my-lg-0" action="./mostrar.php?alu=1" method="POST">
                <span class="searchmargen"><?php echo $totalalu. " Datos en tu busqueda" ?></span>
                <input class="form-control mr-sm-2" name= "buscaralu" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        <?php 
            } elseif (!empty($_GET['prof'])) { ?>
            <form class="form-inline my-2 my-lg-0" action="./mostrar.php?prof=1" method="POST">
                <span class="searchmargen"><?php echo $totalprof. " Datos en tu busqueda" ?></span>
                <input class="form-control mr-sm-2" name= "buscarprof" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        <?php    
        }
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
        </nav> 
    </div>
    
    <!-- acabar navbar -->


    <?php
        if (isset($_GET['alu'])) { 
            if (empty($buscaralu)) { //Si esta vacio el buscar tabla normal
                //cantidad de registros por página
                $cantPorPagina = 10;    
                //Saber cuantos registros hay
                $sql = "SELECT * FROM tbl_alumne;";
                $queryAnim = mysqli_query($connection, $sql);
                //mysqli_num_rows = cantidad de registros que me devuelve
                $numFilas = mysqli_num_rows($queryAnim);                                                              
                //mostrar el número de registros                                
                //echo $numFilas."<br>";                                        

                //Saber la cantidad de páginas según la cantidad de registros por página
                $cantidadPaginas = ceil($numFilas/$cantPorPagina); //CEIL = Redondear al número elevado (ej: 5.1 -> 6)
                //Saber si estamos en la página 1 u en otra
                if (empty($_GET["alu"])) {
                    $inicioPagina = 0;
                }
                else {
                    $inicioPagina = ($_GET["alu"]-1)*$cantPorPagina;
                }

            //La query final
            
                $listadodept = mysqli_query($connection, "SELECT * FROM tbl_alumne LIMIT $inicioPagina, $cantPorPagina;");
                ?>          

                <nav aria-label="Page navigation example">
                <ul class="pagination">
                <?php
                if ($_GET['alu']!=1) {
                        ?><li class="page-item"><a class="page-link" href="./mostrar.php?alu=<?php $pagina=$_GET['alu']-1; echo $pagina;?>"><</a></li><?php
                    }
                    ?>
                    <?php
                    for ($i=1; $i <=$cantidadPaginas ; $i++) { 
                    ?> <li class="page-item"><a class="page-link" href="<?php echo "./mostrar.php?alu=$i"; ?>"><?php echo $i; ?></a></li><?php
                    }
                    if ($_GET['alu']<$cantidadPaginas) {
                        ?><li class="page-item"><a class="page-link" href="./mostrar.php?alu=<?php $pagina=$_GET['alu']+1; echo $pagina;?>">></a></li><?php
                    }
                    ?>
                </ul>
                </nav>
                <?php 
        
                echo '<table class="tbl_propidades">';
                    echo '<tr>';                       
                        echo '<th>DNI</th>';
                        echo '<th>Nombre</th>';
                        echo '<th>1r Apellido</th>';
                        echo '<th>2n Apellido</th>';    
                        echo '<th>Telefono</th>';   
                        echo '<th>Email</th>';
                        echo '<th>Classe</th>';
                        echo '<th>Perfil</th>';
                        echo '<th>Borrar</th>';
                        echo '<th>Modificar</th>';
                        
                    echo '</tr>';
                    foreach ($listadodept as $alu) {
                        $sqllook = mysqli_query($connection, "SELECT nom_classe FROM tbl_classe where id_classe = {$alu['classe']}");
                        $sqlnom = mysqli_fetch_array($sqllook);
                        echo '<tr>';
                        echo "<td>{$alu['dni_alu']}</td>";               
                        echo "<td>{$alu['nom_alu']}</td>";
                        echo "<td>{$alu['cognom1_alu']}</td>";
                        echo "<td>{$alu['cognom2_alu']}</td>";        
                        echo "<td>{$alu['telf_alu']}</td>";
                        echo "<td>{$alu['email_alu']}</td>";
                        echo "<td>{$sqlnom['nom_classe']}</td>";        
            
                        ?>
                        <td><button class = "borrar" onclick="window.location.href='./Alumnos/perfil.php?id=<?php echo $alu['id_alumne']?>'"><img src="../img/perfil.png"></button></td>                        
                        <td><button class = "borrar" onClick="aviso('./Alumnos/borrar.php?id=<?php echo $alu['id_alumne']; ?>');"><img src="../img/borrar.png" alt="borrar"></button></td>
                        <td><button class = "borrar" onClick="aviso('./Alumnos/modificar.php?id=<?php echo $alu['id_alumne']; ?>');"><img src="../img/modificar.png" alt="Modificar"></button></td>
            
                        </tr>
                        <?php
                    }      
                                    
                echo '</table>';          
            
            
                
            }else { //Si buscar hay algo sale la tabla de filtro
                echo "<br>";
                echo "<br>";
                echo '<table class="tbl_propidades">';
                echo '<tr>';
                    echo '<div class="CamposTabla">';
                        echo '<th>DNI</th>';
                        echo '<th>Nombre</th>';
                        echo '<th>1r Apellido</th>';
                        echo '<th>2n Apellido</th>';    
                        echo '<th>Telefono</th>';   
                        echo '<th>Email</th>';
                        echo '<th>Classe</th>';  
                        echo '<th>Perfil</th>';              
                        echo '<th>Borrar</th>';
                        echo '<th>Modificar</th>';
                    echo '</div>';
                echo '</tr>';
                foreach ($buscarsql as $searchalu) {
                    echo '<tr>';
                    echo "<td>{$searchalu['dni_alu']}</td>";               
                    echo "<td>{$searchalu['nom_alu']}</td>";
                    echo "<td>{$searchalu['cognom1_alu']}</td>";
                    echo "<td>{$searchalu['cognom2_alu']}</td>";        
                    echo "<td>{$searchalu['telf_alu']}</td>";
                    echo "<td>{$searchalu['email_alu']}</td>";
                    echo "<td>{$searchalu['nom_classe']}</td>"; 
                
                ?>
                <td><button class = "borrar" onclick="window.location.href='./Alumnos/perfil.php?id=<?php echo $alu['id_alumne']; ?>'"><img src="../img/perfil.png"></button></td>  
                <td><button class="borrar" onClick="aviso('./Alumnos/borrar.php?id=<?php echo $searchalu['id_alumne']; ?>');"><img src="../img/borrar.png" alt="borrar"></button></td>
                <td><button class="borrar" onClick="aviso('./Alumnos/modificar.php?id=<?php echo $searchalu['id_alumne']; ?>');"><img src="../img/modificar.png" alt="modificar"></button></td>
                </tr>
                <?php
                }
            }     
            
            echo '</table>';     
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <br>
            <div class="botones">
                <a href="./Alumnos/crear.php" class="btn btn-success btn-lg estilo" role="button" aria-disabled="true">Crear</a>
                <a href="./Alumnos/descargar.php" class="btn btn-success btn-lg estilo" role="button" aria-disabled="true">Descargar</a>
            </div>
            <?php 
            
        echo "</div>";
        } elseif (isset($_GET['prof'])) { //Si el buscardor esta el prof tabla de prof
            if (empty($buscarprof)) { //Si no hay nada en el filtro tabla normal
                //cantidad de registros por página
                $cantPorPagina = 10;

                    
                //Saber cuantos registros hay
                $sql = "SELECT * FROM tbl_professor where baja_prof=0;";
                $queryAnim = mysqli_query($connection, $sql);
                //mysqli_num_rows = cantidad de registros que me devuelve
                $numFilas = mysqli_num_rows($queryAnim);                                                              
                //mostrar el número de registros                                
                //echo $numFilas."<br>";                                        
    
                //Saber la cantidad de páginas según la cantidad de registros por página
                $cantidadPaginas = ceil($numFilas/$cantPorPagina); //CEIL = Redondear al número elevado (ej: 5.1 -> 6)
                //Saber si estamos en la página 1 u en otra
            if (empty($_GET["prof"])) {
                $inicioPagina = 0;
            }
            else {
                $inicioPagina = ($_GET["prof"]-1)*$cantPorPagina;
            }

         
    
            //La query final
                
                $listadodept = mysqli_query($connection, "SELECT * FROM tbl_professor where baja_prof=0 LIMIT $inicioPagina, $cantPorPagina;");
                ?>          
    
                <nav aria-label="Page navigation example">
                <ul class="pagination">
                <?php
                if ($_GET['prof']!=1) {
                        ?><li class="page-item"><a class="page-link" href="./mostrar.php?prof=<?php $pagina=$_GET['prof']-1; echo $pagina;?>"><</a></li><?php
                    }
                    ?>
                    <?php
                    for ($i=1; $i <=$cantidadPaginas ; $i++) { 
                    ?> <li class="page-item"><a class="page-link" href="<?php echo "./mostrar.php?prof=$i"; ?>"><?php echo $i; ?></a></li><?php
                    }
                    if ($_GET['prof']<$cantidadPaginas) {
                        ?><li class="page-item"><a class="page-link" href="./mostrar.php?prof=<?php $pagina=$_GET['prof']+1; echo $pagina;?>">></a></li><?php
                    }
                    ?>
                </ul>
                </nav>
                <?php         
                echo '<table class="tbl_propidades">';
                echo '<tr>';
                    echo '<th>Nombre</th>';
                    echo '<th>1r Apellido</th>';
                    echo '<th>2n Apellido</th>';
                    echo '<th>Email</th>';     
                    echo '<th>Telefono</th>';   
                    echo '<th>Departamento</th>';
                    echo '<th>Perfil</th>';
                    echo '<th>Borrar</th>';
                    echo '<th>Modificar</th>';
                echo '</tr>';
                foreach ($listadodept as $prof) {
                    $deptlook = mysqli_query($connection,"SELECT nomcor_dept FROM tbl_dept WHERE id_dept={$prof['dept']}");
                    $dept = mysqli_fetch_array($deptlook);
                    echo '<tr>';
                    echo "<td>{$prof['nom_prof']}</td>";               
                    echo "<td>{$prof['cognom1_prof']}</td>";
                    echo "<td>{$prof['cognom2_prof']}</td>"; 
                    echo "<td>{$prof['email_prof']}</td>";       
                    echo "<td>{$prof['telf']}</td>";
                    echo "<td>{$dept['nomcor_dept']}</td>";        
        
                    ?>
                    <td><button class = "borrar" onclick="window.location.href='./Profesores/perfil.php?id=<?php echo $prof['id_professor']; ?>'"><img src="../img/perfil.png"></button></td>
                    <td><button class="borrar" onClick="aviso('./Profesores/borrar.php?id=<?php echo $prof['id_professor']; ?>');"><img src="../img/borrar.png" alt="borrar"></button></td>
                    <td><button class="borrar" onClick="aviso('./Profesores/modificar.php?id=<?php echo $prof['id_professor']; ?>');"><img src="../img/modificar.png" alt="modificar"></button></td>
        
                    </tr>
                    <?php
                }                           
                echo '</table>';
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <br>
                <div class="botones">
                    <a href="./Profesores/crear.php" class="btn btn-success btn-lg estilo" role="button" aria-disabled="true">Crear</a>
                    <a href="./Profesores/descargar.php" class="btn btn-success btn-lg estilo" role="button" aria-disabled="true">Descargar</a>
                </div>
                <?php 
            } else { //Si usuario busca algo profesor
                echo "<br>";
                echo "<br>";
                echo '<table class="tbl_propidades">';
                    echo '<tr>';
                        echo '<th>Nombre</th>';
                        echo '<th>1r Apellido</th>';
                        echo '<th>2n Apellido</th>';
                        echo '<th>Email</th>';     
                        echo '<th>Telefono</th>';   
                        echo '<th>Departamento</th>';
                        echo '<th>Perfil</th>';
                        echo '<th>Borrar</th>';
                        echo '<th>Modificar</th>';
                    echo '</tr>';
                    foreach ($buscarsqlprof as $searchprofe) {
                        echo '<tr>';
                        echo "<td>{$searchprofe['nom_prof']}</td>";               
                        echo "<td>{$searchprofe['cognom1_prof']}</td>";
                        echo "<td>{$searchprofe['cognom2_prof']}</td>"; 
                        echo "<td>{$searchprofe['email_prof']}</td>";       
                        echo "<td>{$searchprofe['telf']}</td>";
                        echo "<td>{$searchprofe['nomcor_dept']}</td>";        
            
                        ?>
                        <td><button class = "borrar" onclick="window.location.href='./Profesores/perfil.php?id=<?php echo $alu['id_alumne']?>'"><img src="../img/perfil.png"></button></td>  
                        <td><button class="borrar" onClick="aviso('./Profesores/borrar.php?id=<?php echo $searchprofe['id_professor']; ?>');"><img src="../img/borrar.png" alt="borrar"></button></td>
                        <td><button class="borrar" onClick="aviso('./Profesores/modificar.php?id=<?php echo $searchprofe['id_professor']; ?>');"><img src="../img/modificar.png" alt="modificar"></button></td>
            
                        </tr>
                        <?php
                    }
                                
                echo '</table>';
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <br>
                <div class="botones">
                    <a href="./Profesores/crear.php" class="btn btn-success btn-lg estilo" role="button" aria-disabled="true">Crear</a>
                    <a href="./Profesores/descargar.php" class="btn btn-success btn-lg estilo" role="button" aria-disabled="true">Descargar</a>
                </div>
            <?php            
            }     
                            
                    
            } else { //Si no hay prof ni alu sale una tabla.
        $select= mysqli_query($connection,"SELECT * FROM tbl_classe");
        ?>
        <div class="menu100">
        <br>
        <div class="menu20">
            <?php
            foreach ($select as $classe) {
            ?>
            <div class="menuRes">
            <form action="./mostrar.php?id=<?php echo $classe['id_classe'] ?>" method="POST">
                <button type="submit" class="enviarmail"><?php echo $classe['nom_classe'];?></button>
            </form>
            </div> 
            <?php
            }
            ?>
            <div class="padres">
            <form action="./correo/correo.php" method="post">
                <input type="submit" value="ENVIAR CORREO" class="enviarmail"/>
            </form>
            </div>
            
        </div>
        <div class="menu80">
        <?php
        if (!empty($_GET['id'])) {
            $sql=mysqli_query($connection,"SELECT nom_classe FROM tbl_classe WHERE id_classe={$_GET['id']}");
            $sql2= mysqli_query($connection,"SELECT * FROM tbl_alumne WHERE classe={$_GET['id']}");
            $classe= mysqli_fetch_array($sql);
            echo '<table class="tbl_propidades">';
            echo '<tr>';
                echo '<th>DNI</th>';
                echo '<th>Nombre</th>';
                echo '<th>1r Apellido</th>';
                echo '<th>2n Apellido</th>';    
                echo '<th>Telefono</th>';   
                echo '<th>Email</th>';
                echo '<th>Classe</th>'; 
                echo '<th>Perfil</th>';               
                echo '<th>Borrar</th>';
                echo '<th>Modificar</th>';
            echo '</tr>';
            foreach ($sql2 as $alu) {
                echo '<tr>';
                echo "<td>{$alu['dni_alu']}</td>";               
                echo "<td>{$alu['nom_alu']}</td>";
                echo "<td>{$alu['cognom1_alu']}</td>";
                echo "<td>{$alu['cognom2_alu']}</td>";        
                echo "<td>{$alu['telf_alu']}</td>";
                echo "<td>{$alu['email_alu']}</td>";
                echo "<td>{$classe['nom_classe']}</td>";    

                ?>
                <td><button class="borrar" onclick="window.location.href='./Alumnos/perfil.php?id=<?php echo $alu['id_alumne']?>'"><img class ="resimg" src="../img/perfil.png"></button></td>  
                <td><button class="borrar" onClick="aviso('./Profesores/borrar.php?id=<?php echo $searchprofe['id_professor']; ?>');"><img class ="resimg" src="../img/borrar.png" alt="borrar"></button></td>
                <td><button class="borrar" onClick="aviso('./Profesores/modificar.php?id=<?php echo $searchprofe['id_professor']; ?>');"><img class ="resimg" src="../img/modificar.png" alt="modificar"></button></td>
                </tr>
                <?php
            }
        }
    }
        ?>
        </div>
        </div>    
        <script>

            function aviso(url) {
                Swal.fire({
                    title: '¿Estas seguro?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                    })
            }

        </script>        
</body>
</html>

<!-- DEBAJO ES PARA PROFESORES -->
<?php
} elseif ($sqlogin==1) {
    if (!empty($_POST['buscaralu'])) {
        $buscaralu = $_POST['buscaralu'];
    } else {
        $buscaralu = NULL;
    }
$sqlalucurso = mysqli_fetch_array($sqllo);
$securso = mysqli_query($connection,"SELECT * FROM tbl_classe where tutor={$sqlalucurso['id_professor']}");
$soloalu = mysqli_fetch_array($securso);
/*CONTAR PARA ALUMNO*/
$sqlcontar = mysqli_query($connection,"SELECT count(*)
AS total FROM tbl_alumne a INNER JOIN tbl_classe c ON a.classe= c.id_classe WHERE
(a.dni_alu like '%$buscaralu%' OR
c.nom_classe like '%$buscaralu%' OR
a.nom_alu like '%$buscaralu%' OR
a.cognom1_alu like '%$buscaralu%' OR
a.cognom2_alu like '%$buscaralu%' OR
a.telf_alu like '%$buscaralu%' OR
a.email_alu like '%$buscaralu%')
group by classe HAVING classe = {$soloalu['id_classe']}");
$contar = mysqli_fetch_array($sqlcontar);
$totalalu = $contar['total'];

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
        <!-- JS     -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- link de css -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Mostrar</title>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
</head>
<body>
    <div class="menu">                           
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <a class="navbar-brand" href="./mostrar.php?alu=1"><?php echo $soloalu['nom_classe']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
        </div>
        <?php
            if (!empty($_GET['alu'])) { ?>
            <form class="form-inline my-2 my-lg-0" action="./mostrar.php?alu=1" method="POST">
                <span class="searchmargen"><?php echo $totalalu. " Alumnos en tu clase" ?></span>
            </form>
        <?php 
            }
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <div>
        <a href="./exit.php" class="btn btn-warning" role="button" aria-disabled="true">Log Out</a>
        </div>     
        </nav> 
    </div>
    <?php
                //cantidad de registros por página
                $cantPorPagina = 10;    
                //Saber cuantos registros hay
                $sql = "SELECT * FROM tbl_alumne where classe = {$soloalu['id_classe']};";
                $queryAnim = mysqli_query($connection, $sql);
                //mysqli_num_rows = cantidad de registros que me devuelve
                $numFilas = mysqli_num_rows($queryAnim);                                                              
                //mostrar el número de registros                                
                //echo $numFilas."<br>";                                        

                //Saber la cantidad de páginas según la cantidad de registros por página
                $cantidadPaginas = ceil($numFilas/$cantPorPagina); //CEIL = Redondear al número elevado (ej: 5.1 -> 6)
                //Saber si estamos en la página 1 u en otra
                if (empty($_GET["alu"])) {
                    $inicioPagina = 0;
                }
                else {
                    $inicioPagina = ($_GET["alu"]-1)*$cantPorPagina;
                }

            //La query final
                $listadodept = mysqli_query($connection, "SELECT * FROM tbl_alumne where classe = {$soloalu['id_classe']} LIMIT $inicioPagina, $cantPorPagina;");
                ?>          

                <nav aria-label="Page navigation example">
                <ul class="pagination">
                <?php
                if ($_GET['alu']!=1) {
                        ?><li class="page-item"><a class="page-link" href="./mostrar.php?alu=<?php $pagina=$_GET['alu']-1; echo $pagina;?>"><</a></li><?php
                    }
                    ?>
                    <?php
                    for ($i=1; $i <=$cantidadPaginas ; $i++) { 
                    ?> <li class="page-item"><a class="page-link" href="<?php echo "./mostrar.php?alu=$i"; ?>"><?php echo $i; ?></a></li><?php
                    }
                    if ($_GET['alu']<$cantidadPaginas) {
                        ?><li class="page-item"><a class="page-link" href="./mostrar.php?alu=<?php $pagina=$_GET['alu']+1; echo $pagina;?>">></a></li><?php
                    }
                    ?>
                </ul>
                </nav>
                <?php
                echo '<table class="tbl_propidades">';
                    echo '<tr>';
                        echo '<th>DNI</th>';
                        echo '<th>Nombre</th>';
                        echo '<th>1r Apellido</th>';
                        echo '<th>2n Apellido</th>';    
                        echo '<th>Telefono</th>';   
                        echo '<th>Email</th>';
                        echo '<th>Classe</th>';
                        echo '<th>Perfil</th>'; 
                    echo '</tr>';
                    foreach ($listadodept as $alu) {
                        $sqllook = mysqli_query($connection, "SELECT nom_classe FROM tbl_classe where id_classe = {$alu['classe']}");
                        $sqlnom = mysqli_fetch_array($sqllook);
                        echo '<tr>';
                        echo "<td>{$alu['dni_alu']}</td>";               
                        echo "<td>{$alu['nom_alu']}</td>";
                        echo "<td>{$alu['cognom1_alu']}</td>";
                        echo "<td>{$alu['cognom2_alu']}</td>";        
                        echo "<td>{$alu['telf_alu']}</td>";
                        echo "<td>{$alu['email_alu']}</td>";
                        echo "<td>{$sqlnom['nom_classe']}</td>";        
                        ?> 
                        <td><button class = "borrar" onclick="window.location.href='./Alumnos/perfil.php?id=<?php echo $alu['id_alumne']?>'"><img src="../img/perfil.png"></button></td>
                        </tr>
                        
                        <?php

                    }            
                echo '</table>';          
        echo "</div>";
    } else {
}


?>

