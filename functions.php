<?php
function readdata($result)
{
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function dd($data)
{
    var_dump($data);
    die;
}

/**
 * Dashboard functions
 */
function countKaryawan()
{
    include 'koneksi.php';
    $query = "SELECT * FROM tb_karyawan";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result);
}

function getKaryawan()
{
    include 'koneksi.php';
    $query = "SELECT * FROM tb_karyawan";
    $result = mysqli_query($conn, $query);

    return $result;
}

function countObat()
{
    include 'koneksi.php';
    $query = "SELECT * FROM tb_obat";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result);
}

function countPelanggan()
{
    include 'koneksi.php';
    $query = "SELECT * FROM tb_pelanggan";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result);
}

function getPelanggan()
{
    include 'koneksi.php';
    $query = "SELECT * FROM tb_pelanggan";
    $result = mysqli_query($conn, $query);

    return $result;
}

function countSupplier()
{
    include 'koneksi.php';
    $query = "SELECT * FROM tb_supplier";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result);
}
