<?php

if ($_GET["t"] == null) {
    header("Location: index.html");
} else {
    $tarea = $_GET["t"];
}

// conectar a db

include "php/db.php";

// obtener datos de la tarea

$sql = "SELECT * FROM tareas_todas WHERE id_tarea = '$tarea'";

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
    header("Location: index.php");
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

                <div class="row row-title-tarea">
                    <div class="col">
                        <div class="svg-and-txt">
                        <div class="svg-tarea">
                            <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" class=" NMm5M hhikbc"><path d="M7 15h7v2H7zm0-4h10v2H7zm0-4h10v2H7z"></path><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-.14 0-.27.01-.4.04a2.008 2.008 0 0 0-1.44 1.19c-.1.23-.16.49-.16.77v14c0 .27.06.54.16.78s.25.45.43.64c.27.27.62.47 1.01.55.13.02.26.03.4.03h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7-.25c.41 0 .75.34.75.75s-.34.75-.75.75-.75-.34-.75-.75.34-.75.75-.75zM19 19H5V5h14v14z"></path></svg>
                        </div>
                        <h2><?php echo $nombre ?></h2>
                        </div>
                    </div>
                </div>

                <div class="row texto-tarea">
                    <div class="col">
                        <h3>Descripción:</h3>
                        <p><?php echo $descripcion ?></p>
                    </div>
                </div>

                <div class="row texto-tarea">
                    <div class="col">
                        <img onclick="viewFull('img/<?php echo $materiaClean ?>/<?php echo $imagen ?>')"
                            class="imagen-tarea" src="img/<?php echo $materiaClean ?>/<?php echo $imagen ?>" alt="">
                    </div>
                </div>

                <div class="row texto-tarea">
                    <div class="col">
                        <h3>Fecha de entrega</h3>
                        <p><?php echo $fecha ?></p>
                    </div>
                </div>


                <div class="row texto-tarea">
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