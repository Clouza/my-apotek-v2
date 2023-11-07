<?php
require_once '../koneksi.php';
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $result = mysqli_query($conn,"DELETE FROM tb_obat WHERE idobat = $id");

    if (mysqli_affected_rows($conn) > 0) {
        echo"<script>
        alert('Supplier berhasil dihapus');
        document.location.href='index.php';
        </script>";
    } 
    else {
      echo"<script>
        alert('supplier gagal diHapus');
        document.location.href='index.php';
        </script>";
    }
}
