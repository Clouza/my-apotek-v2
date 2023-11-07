<?php
require_once '../koneksi.php';

$query = "SELECT * FROM tb_supplier";
$result = mysqli_query($conn, $query);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>read</title>
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
            <td>Nama</td>
            <td>Telp</td>
            <td>Alamat</td>
            <td>Keterangan</td>
            <td>aksi</td>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row['perusahaan'] ?></td>
                <td><?= $row['telp'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['keterangan'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['idsupplier'] ?>">edit</a>
                    <a href="hapus.php?id=<?= $row['idsupplier'] ?>">hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../login/index.php">
        <-- Kembali</a>
            <button><a href="halamancreate.php">tambahsupplier</a>
            </button>
            <button><a href="../login/logout.php">Logout</a>
            </button>

</body>

</html>