<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/newTarea.css">
    <title>Nueva Tarea</title>
</head>
<body>

    <div class="container-all">
        <div class="center-container">

       

            <h2>

<?php

    // conectar a db

    include "db.php";

    // obtener datos de la tarea

    if (isset($_POST["titulo"]) && isset($_POST["materia"]) && isset($_POST["descripcion"]) && isset($_POST["fecha"])) {
        $tarea = $_POST["titulo"];
        $materia = $_POST["materia"];
        $descripcion = $_POST["descripcion"];
        $fecha = $_POST["fecha"];
        if (isset($_POST["imagenes"])) {
            $imagenes = $_POST["imagenes"];
        } else {
            $imagenes = "";
        }
        
        // insertar datos en db

        $sql = "INSERT INTO tareas (titulo_tarea, materia_tarea, descripcion_tarea, fecha_entrega, imagenes_tarea) VALUES ('$tarea', '$materia', '$descripcion', '$fecha', '$imagenes')";

        if ($connect->query($sql) === TRUE) {
            echo "Nueva tarea creada exitosamente, redireccionando al panel de Administrador...";
            header("refresh:3; url=../admin.php");
        } else {
            echo "Error: " . $sql . "<br>";
        }

    } else {
        echo "Error: no se recibieron los datos de la tarea, redireccionando al panel de Administrador...";
        // header("refresh:3; url=../admin.php");
    }

    // cerrar conexion

    $connect->close();

?>

            </h2>

        </div>
    </div>

</body>
</html>


