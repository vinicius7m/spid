<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "root";
    $conn = mysqli_connect($servidor, $usuario, $senha);
    mysqli_select_db($conn, 'banco');

    if(!$conn) {
        echo "Não conectou!";
    } else {
        // echo "Não conectou!";
    }
?>