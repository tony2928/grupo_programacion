<?php

    // conectar a db

    include "php/db.php";

    // obtener datos de la tarea

    if (isset($_POST["titulo"]) && isset($_POST["materia"]) && isset($_POST["descripcion"]) && isset($_POST["fecha"])) {
        $tarea = $_POST["tarea"];
        $materia = $_POST["materia"];
        $descripcion = $_POST["descripcion"];
        $fecha = $_POST["fecha"];
        if (isset($_POST["imagenes"])) {
            $imagenes = $_POST["imagenes"];
        } else {
            $imagenes = "";
        }
    } else {
        echo "Error: no se recibieron los datos de la tarea, redireccionando al panel de Administrador...";
        header("refresh:3; url=../admin.php");
    }

    // insertar datos en db

    $sql = "INSERT INTO tareas (titulo_tarea, materia_tarea, descripcion_tarea, fecha_entrega, imagenes_tarea) VALUES ('$tarea', '$materia', '$descripcion', '$fecha', '$imagenes')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva tarea creada exitosamente, redireccionando al panel de Administrador...";
        header("refresh:3; url=../admin.php");
    } else {
        echo "Error: " . $sql . "<br>";
    }

?>