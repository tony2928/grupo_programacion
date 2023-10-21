<?php
    
    // conectar a db
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "grupo_programacion";
    
    $connect = mysqli_connect($servername, $username, $password, $db);
    
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
?>