<?php
require_once '../koneksi.php';

$query = "SELECT * FROM tb_karyawan";
$result = mysqli_query($conn, $query);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Karyawan</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto');

    * {
        margin: 0;
        padding: 0;
        outline: 0;
    }

    table {
        position: absolute;
        z-index: 2;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 60%;
        border-collapse: collapse;
        border-spacing: 0;
        box-shadow: 0 2px 15px rgba(64, 64, 64, .7);
        border-radius: 12px 12px 0 0;
        overflow: hidden;

    }

    td,
    th {
        padding: 15px 20px;
        text-align: center;


    }

    th {
        background-color: #ba68c8;
        color: #fafafa;
        font-family: 'Open Sans', Sans-serif;
        font-weight: 200;
        text-transform: uppercase;

    }

    tr {
        width: 100%;
        background-color: #fafafa;
        font-family: 'Montserrat', sans-serif;
    }

    tr:nth-child(even) {
        background-color: #eeeeee;
    }

    .back-button {

        color: white;
        font-size: 20px;
        font-weight: 500;
        border: none;
        text-decoration: none;
        padding: .35em 2em;
        margin: 0 .14em;
        border-radius: 100px;
        cursor: pointer;
        background-color: #baacab;
        color: white;
        box-shadow: 10px 10px 20px rgba(196, 196, 196, .5);

        position: absolute;
        z-index: 2;
        left: 50%;
        bottom: 50%;
        transform: translate(-50%, 400%);
    }
</style>

<body>



    <table width="100%" border=1>
        <tr>
            <td>#</td>
            <td>Nama</td>
            <td>Telp</td>
            <td>Alamat</td>
            <td>aksi</td>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row['namakaryawan'] ?></td>
                <td><?= $row['telp'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                    <a href="Kedit.php?id=<?= $row['idkaryawan'] ?>">edit</a>
                    <a href="Khapus.php?id=<?= $row['idkaryawan'] ?>">hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../login/index.php">
        <-- Kembali</a>
            <a href="Khalamancreate.php" class="back-button">tambahkaryawan</a>
            <button><a href="../login/logout.php">Logout</a>
            </button>

</body>

</html>