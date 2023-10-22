<?php

include "php/db.php";

$sql = "SELECT * FROM tareas";

$result = $connect->query($sql);

// formato de fecha 23/10/23
$fecha_actual = date("d/m/y");

// Convierte las fechas en objetos DateTime usando un formato específico
$fecha_actual_obj = date_create_from_format('d/m/y', $fecha_actual);

// Obtén timestamps de los objetos DateTime
$timestamp_actual = $fecha_actual_obj->getTimestamp();
echo "<script>console.log('Timestamp actual: " . $timestamp_actual . "')</script>";

for ($i = 0; $i < $result->num_rows; $i++) {
    $row = $result->fetch_assoc();
    $fecha_entrega = $row["fecha_entrega"];
    $fecha_entrega_obj = date_create_from_format('d/m/y', $fecha_entrega);
    $timestamp_entrega = $fecha_entrega_obj->getTimestamp();


    if ($timestamp_entrega < $timestamp_actual) {
        echo "<script>console.log('Tarea(s) eliminada')</script>";
        $sql2 = "DELETE FROM tareas WHERE id_tarea = " . $row["id_tarea"];
        if ($connect->query($sql2) === TRUE) {
        }
    }
}

function materiaAcentos($materia_sin_acentos) {
    switch ($materia_sin_acentos) {
        case "ingles":
            $materia_acentos = "Inglés";
            break;
        case "calculo":
            $materia_acentos = "Cálculo integral";
            break;
        case "fisica":
            $materia_acentos = "Física";
            break;
        case "tutoria":
            $materia_acentos = "Tutoría";
            break;
        case "sub1":
            $materia_acentos = "Sub 1";
            break;
        case "sub2":
            $materia_acentos = "Sub 2";
            break;
        case "ctsv":
            $materia_acentos = "C.T.S.V.";
            break;
        default:
            $materia_acentos = $materia_sin_acentos;
    }
    return $materia_acentos;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Home</title>
</head>

<body>

    <div class="container-fluid container-everything">

        <div class="container-fluid container-top">

            <div class="row top-bar">
                <div class="col d-flex justify-content-center">
                    <h2>5° "A" Programación Matutino</h2>
                </div>
            </div>

            <div class="row d-flex justify-content-center">

                <div class="col-md-6 col-sm-12 btn-group button-slider">

                    <div id="button-background" class="col-md-12 button-background"></div>

                    <div class="col d-flex justify-content-center">
                        <button type="button" name="" id="boton-tareas" class="botones btn-lg">
                            <span>Tareas</span>
                        </button>
                        <div class="button-background-hover-left"></div>
                    </div>


                    <div class="col d-flex justify-content-center">
                        <button type="button" name="" id="boton-actividades" class="botones btn-lg">
                            <span>Actividades</span>
                        </button>
                        <div class="button-background-hover-center"></div>
                    </div>


                    <div class="col d-flex justify-content-center">
                        <button type="button" name="" id="boton-horario" class="botones btn-lg">
                            <span>Horario</span>
                        </button>
                        <div class="button-background-hover-right"></div>
                    </div>

                </div>

            </div>

        </div>

        <div class="container-fluid container-varios">

            <div id="container-tareas" class="container container-all">

                <div class="row gap-5 row-containers d-flex justify-content-center">

                    <div class="col-md-3 col-sm-10 col-containers">

                        <?php

                        $sql = "SELECT * FROM tareas ORDER BY id_tarea ASC LIMIT 1";

                        $result = $connect->query($sql);
                        $row = $result->fetch_assoc();

                        $titulo = "Nada";
                        $materia = "Nada";
                        $descripcion = "";
                        $fecha = "";
                        $imagenes = "";
                        $id = "";

                        if ($result->num_rows > 0) {
                            $titulo = $row["titulo_tarea"];
                            $materia = $row["materia_tarea"];
                            $descripcion = $row["descripcion_tarea"];
                            $fecha = $row["fecha_entrega"];
                            $imagenes = $row["imagenes_tarea"];
                            $id = $row["id_tarea"];
                            $circuloDerecha = '<div onclick="more(' . $id . ')" class="more my-tooltip" data-tooltip="Ver más"></div>';
                        } else {
                            $titulo = "Nada";
                            $materia = "Nada";
                            $descripcion = "";
                            $fecha = "";
                            $imagenes = "";
                            $id = "";
                            $circuloDerecha = '<div class="my-tooltip" data-tooltip="Nada"></div>';
                        }

                        if ($imagenes == "") {
                            $imagenes_direccion = "";
                        } else {
                            $imagenes_direccion = "src='" . "img/" . $materia . "/" . $imagenes . "'";
                        }

                        $materia_acentos = materiaAcentos($materia);

                        ?>

                        <div class="row">
                            <span class="titulo-tarea" onclick="more('<?php echo $id?>')"><?php echo $titulo?></span>
                        </div>

                        <img class="imagen-container-tarea" <?php echo $imagenes_direccion?> alt="">

                        <div class="circulo c-<?php echo $materia?> my-tooltip" data-tooltip="<?php echo $materia_acentos?>"></div>

                        <?php echo $circuloDerecha?>

                    </div>

                    <!-- ---------- -->

                    <div class="col-md-3 col-sm-10 col-containers">

                    <?php

$sql = "SELECT * FROM tareas ORDER BY id_tarea ASC LIMIT 1,1";

$result = $connect->query($sql);
$row = $result->fetch_assoc();

$titulo = "Nada";
$materia = "Nada";
$descripcion = "";
$fecha = "";
$imagenes = "";
$id = "";

if ($result->num_rows > 0) {
    $titulo = $row["titulo_tarea"];
    $materia = $row["materia_tarea"];
    $descripcion = $row["descripcion_tarea"];
    $fecha = $row["fecha_entrega"];
    $imagenes = $row["imagenes_tarea"];
    $id = $row["id_tarea"];
    $circuloDerecha = '<div onclick="more(' . $id . ')" class="more my-tooltip" data-tooltip="Ver más"></div>';
} else {
    $titulo = "Nada";
    $materia = "Nada";
    $descripcion = "";
    $fecha = "";
    $imagenes = "";
    $id = "";
    $circuloDerecha = '<div class="my-tooltip" data-tooltip="Nada"></div>';
}

if ($imagenes == "") {
    $imagenes_direccion = "";
} else {
    $imagenes_direccion = "src='" . "img/" . $materia . "/" . $imagenes . "'";
}

$materia_acentos = materiaAcentos($materia);

?>

                        <div class="row">
                            <span class="titulo-tarea" onclick="more('<?php echo $id?>')"><?php echo $titulo?></span>
                        </div>

                        <img class="imagen-container-tarea" <?php echo $imagenes_direccion?> alt="">

                        <div class="circulo c-<?php echo $materia?> my-tooltip" data-tooltip="<?php echo $materia_acentos?>"></div>

                        <?php echo $circuloDerecha?>

                    </div>

                    <!-- ---------- -->

                    <div class="col-md-3 col-sm-10 col-containers">

                    <?php

$sql = "SELECT * FROM tareas ORDER BY id_tarea ASC LIMIT 2,2";

$result = $connect->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
    $titulo = $row["titulo_tarea"];
    $materia = $row["materia_tarea"];
    $descripcion = $row["descripcion_tarea"];
    $fecha = $row["fecha_entrega"];
    $imagenes = $row["imagenes_tarea"];
    $id = $row["id_tarea"];
    $circuloDerecha = '<div onclick="more(' . $id . ')" class="more my-tooltip" data-tooltip="Ver más"></div>';
} else {
    $titulo = "Nada";
    $materia = "Nada";
    $descripcion = "";
    $fecha = "";
    $imagenes = "";
    $id = "";
    $circuloDerecha = '<div class="my-tooltip" data-tooltip="Nada"></div>';
}

if ($imagenes == "") {
    $imagenes_direccion = "";
} else {
    $imagenes_direccion = "src='" . "img/" . $materia . "/" . $imagenes . "'";
}

$materia_acentos = materiaAcentos($materia);

?>

                        <div class="row">
                            <span class="titulo-tarea" onclick="more('<?php echo $id?>')"><?php echo $titulo?></span>
                        </div>

                        <img class="imagen-container-tarea" <?php echo $imagenes_direccion?> alt="">

                        <div class="circulo c-<?php echo $materia?> my-tooltip" data-tooltip="<?php echo $materia_acentos?>"></div>

                        <?php echo $circuloDerecha?>

                    </div>

                    <!-- ---------- -->

                    <div class="col-md-3 col-sm-10 col-containers">

                    <?php

$sql = "SELECT * FROM tareas ORDER BY id_tarea ASC LIMIT 3,3";

$result = $connect->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
    $titulo = $row["titulo_tarea"];
    $materia = $row["materia_tarea"];
    $descripcion = $row["descripcion_tarea"];
    $fecha = $row["fecha_entrega"];
    $imagenes = $row["imagenes_tarea"];
    $id = $row["id_tarea"];
    $circuloDerecha = '<div onclick="more(' . $id . ')" class="more my-tooltip" data-tooltip="Ver más"></div>';
} else {
    $titulo = "Nada";
    $materia = "Nada";
    $descripcion = "";
    $fecha = "";
    $imagenes = "";
    $id = "";
    $circuloDerecha = '<div class="my-tooltip" data-tooltip="Nada"></div>';
}

if ($imagenes == "") {
    $imagenes_direccion = "";
} else {
    $imagenes_direccion = "src='" . "img/" . $materia . "/" . $imagenes . "'";
}

$materia_acentos = materiaAcentos($materia);

?>

                        <div class="row">
                            <span class="titulo-tarea" onclick="more('<?php echo $id?>')"><?php echo $titulo?></span>
                        </div>

                        <img class="imagen-container-tarea" <?php echo $imagenes_direccion?> alt="">

                        <div class="circulo c-<?php echo $materia?> my-tooltip" data-tooltip="<?php echo $materia_acentos?>"></div>

                        <?php echo $circuloDerecha?>

                    </div>

                    <div class="col-md-3 col-sm-10 col-containers">

                    <?php

$sql = "SELECT * FROM tareas ORDER BY id_tarea ASC LIMIT 4,4";

$result = $connect->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
    $titulo = $row["titulo_tarea"];
    $materia = $row["materia_tarea"];
    $descripcion = $row["descripcion_tarea"];
    $fecha = $row["fecha_entrega"];
    $imagenes = $row["imagenes_tarea"];
    $id = $row["id_tarea"];
    $circuloDerecha = '<div onclick="more(' . $id . ')" class="more my-tooltip" data-tooltip="Ver más"></div>';
} else {
    $titulo = "Nada";
    $materia = "Nada";
    $descripcion = "";
    $fecha = "";
    $imagenes = "";
    $id = "";
    $circuloDerecha = '<div class="my-tooltip" data-tooltip="Nada"></div>';
}

if ($imagenes == "") {
    $imagenes_direccion = "";
} else {
    $imagenes_direccion = "src='" . "img/" . $materia . "/" . $imagenes . "'";
}

$materia_acentos = materiaAcentos($materia);

?>

                        <div class="row">
                            <span class="titulo-tarea" onclick="more('<?php echo $id?>')"><?php echo $titulo?></span>
                        </div>

                        <img class="imagen-container-tarea" <?php echo $imagenes_direccion?> alt="">

                        <div class="circulo c-<?php echo $materia?> my-tooltip" data-tooltip="<?php echo $materia_acentos?>"></div>

                        <?php echo $circuloDerecha?>

                    </div>

                    <div class="col-md-3 col-sm-10 col-containers">

                    <?php

$sql = "SELECT * FROM tareas ORDER BY id_tarea ASC LIMIT 5,5";

$result = $connect->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
    $titulo = $row["titulo_tarea"];
    $materia = $row["materia_tarea"];
    $descripcion = $row["descripcion_tarea"];
    $fecha = $row["fecha_entrega"];
    $imagenes = $row["imagenes_tarea"];
    $id = $row["id_tarea"];
    $circuloDerecha = '<div onclick="more(' . $id . ')" class="more my-tooltip" data-tooltip="Ver más"></div>';
} else {
    $titulo = "Nada";
    $materia = "Nada";
    $descripcion = "";
    $fecha = "";
    $imagenes = "";
    $id = "";
    $circuloDerecha = '<div class="my-tooltip" data-tooltip="Nada"></div>';
}

if ($imagenes == "") {
    $imagenes_direccion = "";
} else {
    $imagenes_direccion = "src='" . "img/" . $materia . "/" . $imagenes . "'";
}

$materia_acentos = materiaAcentos($materia);

?>

                        <div class="row">
                            <span class="titulo-tarea" onclick="more('<?php echo $id?>')"><?php echo $titulo?></span>
                        </div>

                        <img class="imagen-container-tarea" <?php echo $imagenes_direccion?> alt="">

                        <div class="circulo c-<?php echo $materia?> my-tooltip" data-tooltip="<?php echo $materia_acentos?>"></div>

                        <?php echo $circuloDerecha?>

                    </div>


                </div>
                

            </div>



            <div id="container-actividades" class="container container-all h-100 justify-content-center align-items-center">

                <div class="col h-100 justify-content-center align-content-center">
                    <p>Todavía no disponible</p>
                </div>

            </div>



            <div id="container-horario" class="container">

                <table class="table table-responsive tabla-horario">
                    <tr class="tr-horario">
                        <th><div class="centrar-texto">Hora</div></th>
                        <th class="lunes"><div class="centrar-texto">Lunes</div></th>
                        <th class="martes"><div class="centrar-texto">Martes</div></th>
                        <th class="miercoles"><div class="centrar-texto">Miércoles</div></th>
                        <th class="jueves"><div class="centrar-texto">Jueves</div></th>
                        <th class="viernes"><div class="centrar-texto">Viernes</div></th>
                    </tr class="tr-horario">
                    <tr class="tr-horario">
                        <td>7:00 - 7:50</td>
                        <td class="lunes" data-materia="ingles">Inglés</td>
                        <td class="martes" data-materia="ingles">Inglés</td>
                        <td class="miercoles" data-materia="sub1">Sub 1</td>
                        <td class="jueves" data-materia="sub1">Sub 1</td>
                        <td class="viernes" data-materia="sub1">Sub 1</td>
                    </tr class="tr-horario">
                    <tr class="tr-horario">
                        <td>7:50 - 8:40</td>
                        <td class="lunes" data-materia="calculo">Cálculo integral</td>
                        <td class="martes" data-materia="calculo">Cálculo integral</td>
                        <td class="miercoles" data-materia="sub1">Sub 1</td>
                        <td class="jueves" data-materia="calculo">Cálculo integral</td>
                        <td class="viernes" data-materia="fisica">Física</td>
                    </tr class="tr-horario">
                    <tr class="tr-horario">
                        <td>8:40 - 9:00</td>
                        <td class="lunes">Receso</td>
                        <td class="martes">Receso</td>
                        <td class="miercoles">Receso</td>
                        <td class="jueves">Receso</td>
                        <td class="viernes">Receso</td>
                    </tr class="tr-horario">
                    <tr class="tr-horario">
                        <td>9:00 - 9:50</td>
                        <td class="lunes" data-materia="tutoria">Tutoria</td>
                        <td class="martes" data-materia="fisica">Física</td>
                        <td class="miercoles" data-materia="fisica">Física</td>
                        <td class="jueves" data-materia="ingles">Inglés</td>
                        <td class="viernes" data-materia="calculo">Cálculo integral</td>
                    </tr class="tr-horario">
                    <tr class="tr-horario">
                        <td>9:50 - 10:40</td>
                        <td class="lunes" data-materia="sub1">Sub 1</td>
                        <td class="martes" data-materia="sub1">Sub 1</td>
                        <td class="miercoles" data-materia="calculo">Cálculo integral</td>
                        <td class="jueves" data-materia="ingles">Inglés</td>
                        <td class="viernes" data-materia="ingles">Inglés</td>
                    </tr class="tr-horario">
                    <tr class="tr-horario">
                        <td>10:40 - 11:30</td>
                        <td class="lunes" data-materia="sub2">Sub 2</td>
                        <td class="martes" data-materia="sub2">Sub 2</td>
                        <td class="miercoles" data-materia="ctsv">C.T.S.V.</td>
                        <td class="jueves" data-materia="sub2">Sub 2</td>
                        <td class="viernes" data-materia="ctsv">C.T.S.V.</td>
                    </tr class="tr-horario">
                    <tr class="tr-horario">
                        <td>11:30 - 12:20</td>
                        <td class="lunes" data-materia="sub2">Sub 2</td>
                        <td class="martes" data-materia="sub2">Sub 2</td>
                        <td class="miercoles"></td>
                        <td class="jueves" data-materia="sub2">Sub 2</td>
                        <td class="viernes"></td>
                    </tr class="tr-horario">
                    <tr class="tr-horario">
                        <td>12:20 - 1:10</td>
                        <td class="lunes" data-materia="fisica">Física</td>
                        <td class="martes" data-materia="ctsv">C.T.S.V.</td>
                        <td class="miercoles"></td>
                        <td class="jueves" data-materia="ctsv">C.T.S.V.</td>
                        <td class="viernes"></td>
                </table>

            </div>

        </div>

    </div>


    <?php
    
    $connect->close();

    ?>

    <script src="js/index.js"></script>

</body>

</html>