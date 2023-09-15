<?php

if ($_GET["t"] == null) {
    header("Location: index.html");
} else {
    $tarea = $_GET["t"];
}

// conectar a db

$servername = "localhost";
$username = "root";
$password = "";
$db = "grupo_programacion";

$connect = mysqli_connect($servername, $username, $password, $db);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// obtener datos de la tarea

$sql = "SELECT * FROM tareas WHERE id_tarea = '$tarea'";

$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $nombre = $row["titulo_tarea"];
        $descripcion = $row["descripcion_tarea"];
        $fecha = $row["fecha_entrega"];
        $imagen = $row["imagenes_tarea"];
        $materia = $row["materia_tarea"];
    }
} else {
    header("Location: index.html");
}

mysqli_close($connect);

$acentos = array('á', 'é', 'í', 'ó', 'ú');
$sinAcentos = array('a', 'e', 'i', 'o', 'u');

$materiaClean = mb_strtolower($materia);
$materiaClean = str_replace($acentos, $sinAcentos, $materiaClean);





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title><?php echo $nombre ?></title>
</head>

<body id="body">

    <div class="container-fluid container-everything">

        <div class="container-fluid container-top">

            <div class="row top-bar">
                <div class="col d-flex justify-content-center">
                    <h2><?php echo $nombre ?></h2>
                </div>
            </div>

            <div class="row to-home justify-content-center h-25">
                <div class="col-md-3">
                    <button onclick="toHome()" type="button" name="" class="">
                        <span>Regresar</span>
                    </button>
                </div>
            </div>

        </div>

        <div class="container-fluid container-content">


            <div class="container">

                <div class="row">
                    <div class="col">
                        <h3>Descripción:</h3>
                        <p><?php echo $descripcion ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <img onclick="viewFull('img/<?php echo $materiaClean ?>/<?php echo $imagen ?>')"
                            class="imagen-tarea" src="img/<?php echo $materiaClean ?>/<?php echo $imagen ?>" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h3>Fecha de entrega</h3>
                        <p><?php echo $fecha ?></p>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <h3>Materia</h3>
                        <p><?php echo $materia ?></p>
                    </div>
                </div>

            </div>


            <div class="container">



            </div>


        </div>




    </div>

    <div id="image-fullscreen" class="image-fullscreen">

        <div onclick="exitFull()" id="image-fullscreen-content" class="image-fullscreen-content">
            <img id="image-in-fullscreen" src="" alt="">
        </div>

    </div>


    <script src="js/tarea.js"></script>

</body>

</html>