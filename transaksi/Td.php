<?php
require_once '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // $queryTransaksi = "SELECT * FROM tb_transaksi JOIN tb_detail_transaksi ON tb_transaksi.idtransaksi = tb_detail_transaksi.idtransaksi JOIN tb_obat ON tb_obat.idobat = tb_detail_transaksi.idobat";
    $queryTransaksi = "SELECT * FROM tb_transaksi JOIN tb_pelanggan ON tb_transaksi.idpelanggan = tb_pelanggan.idpelanggan WHERE idtransaksi = $id";
    $resultTransaksi = mysqli_query($conn, $queryTransaksi);

    // $queryDetail = "SELECT * FROM tb_detail_transaksi WHERE idtransaksi = $id";
    $queryDetail = "SELECT * FROM tb_detail_transaksi JOIN tb_obat ON tb_detail_transaksi.idobat = tb_obat.idobat WHERE idtransaksi = $id";
    $resultDetail = mysqli_query($conn, $queryDetail);

    $readTransaksi = readData($resultTransaksi)[0];
    $readDetail = readData($resultDetail);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- icons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- css -->
    <link rel="stylesheet" href="../../assets/css/transaksi.css">
</head>
<style>
    /* simple reset css */
    * {
        padding: 0;
        margin: 0;
        font-family: 'Poppins', sans-serif;

        /* variables */
    }

    body {
        height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* form */
    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 1em;
    }

    .form-group input {
        font-size: 1.2rem;
        padding: .2em 1em;
        height: 40px;
        max-width: 250px;
        border: 2px solid hsl(0, 0%, 80%);
        box-shadow: 0 0 .1em rgba(0, 0, 0, .15);
        outline-color: black;
        outline: none;
    }

    .form-group input:hover {
        border-color: hsl(0, 0%, 60%);
    }

    .form-group input:focus {
        border-color: hsl(234, 100%, 62%);
        box-shadow: 0 0 .5em rgba(60, 80, 255, 0.15);
    }

    .form-group select,
    option {
        font-size: 1.2rem;
        padding: .2em 1em;
        height: 50px;
        max-width: 290px;
        border: 2px solid hsl(0, 0%, 80%);
        box-shadow: 0 0 .1em rgba(0, 0, 0, .15);
        outline: none;
    }

    .form-group select:hover {
        border-color: hsl(0, 0%, 60%);
    }

    .form-group select:focus {
        border-color: hsl(234, 100%, 62%);
        box-shadow: 0 0 .5em rgba(60, 80, 255, 0.15);
    }

    .confirmButton {
        margin: .5rem 0;
        color: white;
        background-color: hsl(220, 15%, 23%);
        border: none;
        padding: 1em 2em;
        outline: none;
    }

    .confirmButton:active {
        background-color: hsl(220, 15%, 40%);
    }

    .addButton {
        margin: .5rem 0;
        color: hsl(220, 15%, 23%);
        border: 1px solid hsl(220, 15%, 23%);
        padding: 1em 2em;
        outline: none;
    }

    .addButton:active {
        background-color: hsl(220, 15%, 40%);
        color: white;
    }

    /* table */
    table {
        width: 100%;
    }

    /* first */
    .first-table {
        border-collapse: collapse;
    }

    .first-table td {
        border: 1px solid hsl(224, 100%, 88%);
        padding: .5rem 2rem;
    }

    /* second */
    .second-table {
        margin-top: 1rem;
        border-collapse: collapse;
        text-align: center;
    }

    .second-table th,
    .second-table td {
        padding: .5rem 2rem;
    }

    .second-table thead {
        box-shadow: 0 5px 10px rgba(225, 229, 238, 1);
    }

    .second-table th {
        text-transform: uppercase;
        letter-spacing: .1rem;
    }

    .second-table tr:nth-child(even) {
        background-color: hsl(223, 47%, 97%);
    }

    .second-table tfoot {
        border-top: 1px solid black;
    }

    /* container */
    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .sticky-top {
        position: sticky;
        top: 0;
    }

    /* button */
    .btn {
        font-size: 1.2em;
        padding: .1em .8em;
        cursor: pointer;
    }

    .btn.btn-tambah {
        background-color: hsl(0, 0%, 20%);
        border: none;
        color: white;
        border-radius: 4px;
        outline: none;
    }
</style>

<body>
    <a href="index.php">&leftarrow; Kembali</a>


    <div class="container">
        <div class="table" style="margin: 0 1rem;">
            <table class="first-table sticky-top">
                <thead>
                    <tr>
                        <td>Tanggal Transaksi</td>
                        <td><?= $readTransaksi['tgltransaksi']; ?></td>
                    </tr>
                    <tr>
                        <td>Pelanggan</td>
                        <td><?= $readTransaksi['namalengkap']; ?></td>
                    </tr>
                    <tr>
                        <td>Kategori Pelanggan</td>
                        <td><?= $readTransaksi['kategoripelanggan']; ?></td>
                    </tr>
                </thead>
            </table>


        </div>

        <div class="table">
            <table class="second-table">
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($readDetail as $rd) : ?>
                        <tr>
                            <td><?= $rd['namaobat']; ?></td>
                            <td><?= number_format($rd['jumlah'], 0, ',', '.'); ?></td>
                            <td>Rp<?= number_format($rd['hargasatuan'], 0, ',', '.'); ?></td>
                            <td>Rp<?= number_format($rd['totalharga'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Grand Total</td>
                        <td>Rp<?= number_format($readTransaksi['totalbayar'], 0, ',', '.'); ?></td>
                    </tr>
                </tfoot>
            </table>

            <table class="first-table">
                <thead>
                    <tr>
                        <td>Bayar</td>
                        <td>Rp<?= number_format($readTransaksi['bayar'], 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Total Bayar</td>
                        <td>Rp<?= number_format($readTransaksi['totalbayar'], 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Kembali</td>
                        <td>Rp<?= number_format($readTransaksi['kembali'], 0, ',', '.'); ?></td>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
    <a href="" class="btn btn-tambah" onclick="cetakNota()">Cetak Nota</a>

    <script>
        function cetakNota() {
            window.print();
        }
    </script>

</body>

</html>