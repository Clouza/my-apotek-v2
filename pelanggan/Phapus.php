<?php
require_once '../koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "DELETE FROM tb_pelanggan WHERE idpelanggan = $id");

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
        alert('Ciahhh di pecat GOBLOK');
        document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Ga jadi di pecat masih butuh');
        document.location.href='index.php';
        </script>";
    }
}
