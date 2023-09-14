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
        $imagenes = $row["imagenes_tarea"];
        $materia = $row["materia_tarea"];
    }
} else {
    header("Location: index.html");
}

mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title><?php echo $tarea ?></title>
</head>

<body>

    <div class="container-fluid container-everything">

        <div class="container-fluid container-top">

            <div class="row top-bar">
                <div class="col d-flex justify-content-center">
                    <h2><?php echo $nombre ?></h2>
                </div>
            </div>

        </div>

        <div class="container">


            <div class="container">


            </div>


            <div class="container">


            </div>


        </div>




    </div>




</body>