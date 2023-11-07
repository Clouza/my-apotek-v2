<?php
require_once '../koneksi.php';
if (isset($_POST['tambahobat'])){
    $idsupplier = $_POST['supplierObat'];
    $namaobat = $_POST['namaobat'];
    $kategoriobat = $_POST['kategoriobat'];
    $hargajual = $_POST['hargajual'];
    $hargabeli = $_POST['hargabeli'];
    $stok_obat = $_POST['stok_obat'];
    $keterangan = $_POST['keterangan'];

    $isp = "INSERT INTO tb_obat VALUES('','$idsupplier','$namaobat','$kategoriobat','$hargajual','$hargabeli','$stok_obat','$keterangan')";

    $rsp = mysqli_query($conn,$isp);

    return header ("Location: index.php");
}
