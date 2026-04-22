<?php
function conectar() {
    $host = "localhost";
    $user = "u156482620_tp6";  
    $pass = "#TP6gestor";
    $db = "u156482620_tp6";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}
?>