<?php
require_once '../koneksi.php';
if (isset($_POST['tambahkaryawan'])) {
    $namakaryawan = $_POST['karyawan'];
    $alamat = $_POST['alamatkar'];
    $telp = $_POST['telpkar'];

    $isp = "INSERT INTO tb_karyawan VALUES('','$namakaryawan','$alamat','$telp')";

    $rsp = mysqli_query($conn, $isp);

    return header("Location: index.php");
}
