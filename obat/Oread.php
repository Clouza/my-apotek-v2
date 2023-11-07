<?php
require_once '../koneksi.php';


// read obat
$queryobat = "SELECT * FROM tb_obat JOIN tb_supplier ON tb_obat.idsupplier = tb_supplier.idsupplier";
$resultOobat = mysqli_query($conn, $queryobat);
$readobat = readData($resultobat);

// read supplier
$querysupplier = "SELECT * FROM tb_supplier";
$resultsupplier = mysqli_query($conn, $querysupplier);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obat</title>
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


    <table width=100% border=1>
        <tr class="thead">
            <th>#</th>
            <th>Supplier</th>
            <th>Nama Obat</th>
            <th>Kategori</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Stok</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($readobat as $r) : ?>
            <tr class="tbody">
                <td><?= $i++; ?></td>
                <td><?= $r['perusahaan']; ?></td>
                <td><?= $r['namaobat']; ?></td>
                <td><?= $r['kategoriobat']; ?></td>
                <td><?= $r['hargajual']; ?></td>
                <td><?= $r['hargabeli']; ?></td>
                <td><?= $r['stok_obat']; ?></td>
                <td><?= $r['keterangan']; ?></td>
                <td>
                    <form action="" method="post">
                        <a href="Oedit.php?id=<?= $r['idobat']; ?>">Edit</a>
                        <a href="Ohapus.php?id=<?= $r['idobat']; ?>" onclick="return confirm('Anda yakin?')">Hapus</a>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
    <div class="tambahView">
        <a href="../login/index.php">&leftarrow; Kembali</a>
        <a href="Ohalamancreate.php"><button id="tambahView">Tambah Obat</button></a>
        <button><a href="../login/logout.php">Logout</a>
    </div>
</body>

</html>