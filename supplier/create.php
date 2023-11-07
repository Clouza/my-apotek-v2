<?php
require_once '../koneksi.php';
if (isset($_POST['tambahsupplier'])) {
    $perusahaan = $_POST['perusahaan'];
    $alamatsupplier = $_POST['alamatsup'];
    $telpsupplier = $_POST['telpsup'];
    $keterangansupplier = $_POST['keterangansup'];

    $isp = "INSERT INTO tb_supplier VALUES('','$perusahaan','$telpsupplier','$alamatsupplier','$keterangansupplier')";

    $rsp = mysqli_query($conn, $isp);

    return header("Location: index.php");
}
