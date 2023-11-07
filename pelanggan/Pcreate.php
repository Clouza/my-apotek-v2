<?php
require_once '../koneksi.php';
if (isset($_POST['tambahpelanggan'])) {
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamatpelanggan'];
    $telp = $_POST['telppelanggan'];
    $usia = $_POST['usiapelanggan'];
    $buktifotoresep = $_POST['bukti'];

    $isp = "INSERT INTO tb_pelanggan VALUES('','$namalengkap','$alamat','$telp','$usia','$buktifotoresep')";

    $rsp = mysqli_query($conn, $isp);

    return header("Location: index.php");
}
