<?php

    // conectar a db

    include "php/db.php";

    // obtener datos de la tarea

    if (isset($_POST["tarea"])) {
        $tarea = $_POST["tarea"];
    } else {
        header("Location: index.html");
    }

?>