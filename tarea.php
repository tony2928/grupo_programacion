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

        </div>

        <div class="container-fluid container-content">


            <div class="container">

                <div class="row">
                    <div class="col">
                        <h3>Descripción:</h3>
                        <p><?php echo $descripcion ?></p>
                        <p><b>Reading text: An email from a friend</b>
                            <br>
                            <br>
                            Hi Samia,
                            <br>
                            <br>
                            Quick email to say that sounds like a great idea. Saturday is better for me because I'm
                            meeting my parents on Sunday. So if that's still good for you, why don't you come here? Then
                            you can see the new flat and all the work we've done on the kitchen since we moved in. We
                            can eat at home and then go for a walk in the afternoon. It's going to be so good to catch
                            up finally. I want to hear all about your new job!
                            <br>
                            <br>
                            Our address is 52 Charles Road, but it's a bit difficult to find because the house numbers
                            are really strange here. If you turn left at the post office and keep going past the big
                            white house on Charles Road, there's a small side street behind it with the houses 50-56 in.
                            Don't ask me why the side street doesn't have a different name! But call me if you get lost
                            and I'll come and get you.
                            <br>
                            <br>
                            Let me know if there's anything you do/don't like to eat. Really looking forward to seeing
                            you!
                            <br>
                            <br>
                            See you soon!
                            <br>
                            <br>
                            Gregor
                        </p>
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