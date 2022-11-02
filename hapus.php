<?php
require "koneksi.php";

$id = $_GET["id"];

$sql = "DELETE FROM merek WHERE id = $id";

$result = mysqli_query($conn, $sql);

if($result)
{
    echo
    "<script>
    alert('Data Sudah Dihapus');
    document.location.href = 'daftar.php'
    </script>";
}

else
{
    echo
    "<script>
    alert('Data Gagal Dihapus');
    document.location.href = 'daftar.php'
    </script>";
}
?>