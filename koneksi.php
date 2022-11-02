<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "produk";

    $conn = mysqli_connect($server, $user, $password, $db);

    if(!$conn)
    {
        die("Gagal tersambung ke database : ". mysqli_connect_error());
    }

?>