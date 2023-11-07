<?php
require_once '../koneksi.php';

// read data
function readData($result)
{
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
$queryTransaksi = "SELECT * FROM tb_transaksi JOIN tb_pelanggan ON tb_transaksi.idpelanggan = tb_pelanggan.idpelanggan";
$resultTransaksi = mysqli_query($conn, $queryTransaksi);
$readTransaksi = readData($resultTransaksi);

$queryPelanggan = "SELECT * FROM tb_pelanggan";
$resultPelanggan = mysqli_query($conn, $queryPelanggan);
$readPelanggan = readData($resultPelanggan);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transaksi</title>
</head>
<style>
    button {
        font-size: 1rem;
        padding: .2em 1em;
        border: none;
        margin: 2em 0;
        background-color: transparent;
        border: 2px solid green;
        border-radius: 4px;
        color: green;
        transition-duration: .2s;
        cursor: pointer;
    }
</style>

<body>



    <table width="100%" border=1>
        <tr>
            <td>#</td>
            <td>Tanggal</td>
            <td>Pelanggan</td>
            <td>Kategori</td>
            <td>Total</td>
            <td>Bayar</td>
            <td>Kembali</td>
            <td>aksi</td>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($readTransaksi as $row) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row['tgltransaksi'] ?></td>
                <td><?= $row['idpelanggan'] ?></td>
                <td><?= $row['kategoripelanggan'] ?></td>
                <td><?= $row['totalbayar'] ?></td>
                <td><?= $row['bayar'] ?></td>
                <td><?= $row['kembali'] ?></td>
                <td>
                    <a href="Td.php?id=<?= $row['idtransaksi']; ?>">Detail</a> |
                    <a href="">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../login/index.php">
        <-- Kembali</a>
            <button><a href="Thalamancreate.php">TambahTransaksi</a>
            </button>
            <button><a href="../login/logout.php">Logout</a>
            </button>

</body>

</html>