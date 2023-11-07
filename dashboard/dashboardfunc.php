<?php
require_once '../koneksi.php';

function getKaryawan()
{
    require_once '../koneksi.php';
    $query = "SELECT * FROM tb_karyawan";
    $result = mysqli_query($conn, $query);

    // $rows = [];
    // while ($row = mysqli_fetch_assoc($result)) {
    //     $rows[] = $row;
    // }
    var_dump($conn);
    return 0;
}

function getObat()
{
    return 0;
}

function getPelanggan()
{
    return 0;
}

function getSupplier()
{
    return 0;
}
