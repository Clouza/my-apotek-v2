<?php
require_once '../koneksi.php';

// delete transaksi
if (isset($_GET['idd'])) {
    $id = $_GET['idd'];
    $resultDelete1 = mysqli_query($conn, "DELETE FROM tb_transaksi WHERE idtransaksi = $id");
    $resultDelete2 = mysqli_query($conn, "DELETE FROM tb_detail_transaksi WHERE idtransaksi = $id");

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
        alert('Transaksi berhasil dihapus');
        document.location.href = 'index.php';
    </script>";
    } else {
        echo "<script>
        alert('Transaksi berhasil dihapus');
        document.location.href = 'index.php';
    </script>";
    }
}

?>
