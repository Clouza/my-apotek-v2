<?php
require_once '../koneksi.php';

if (!isset($_SESSION['userlogin'])) {
    return header("Location: ../login/index.php");
}

require_once '../templates/header.php';
?>

<div class="main-content">
    <header>
        <h2>
            <label for="nav-toggle">
                <span class="las la-bars"></span>
            </label> Dashboard
        </h2>

        <div class="user-wrapper">
            <img src="../Dashboard//img/Avatar.png" width="40px" height="40px" alt="">
            <div>
                <h4><?= $_SESSION['userlogin'] ?></h4>
            </div>
        </div>
    </header>
    <main>
        <?php

        // read data obat
        $queryObat = "SELECT * FROM tb_obat";
        $resultObat = mysqli_query($conn, $queryObat);
        $readObat = readData($resultObat);

        // read data pelanggan
        $idp = $_SESSION['pelanggan'];
        $queryPelanggan = "SELECT * FROM tb_pelanggan WHERE idpelanggan = $idp";
        $resultPelanggan = mysqli_query($conn, $queryPelanggan);
        $readPelanggan = readData($resultPelanggan)[0];

        $grand = 0;
        ?>
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
        </style>

        <div class="container">
            <form action="Tcontroller.php" method="post" style="margin: 0 1rem;">

                <!-- pesan -->
                <?php if (isset($_SESSION['pesanobat'])) : ?>
                    <h4>Obat sudah masuk!</h4>
                <?php endif; ?>

                <div class="sticky-top">
                    <div class="form-group">
                        <label for="obat">Obat</label>
                        <select name="idObat" id="obat" required>
                            <option value="">-- Pilih Obat --</option>
                            <?php foreach ($readObat as $r) : ?>
                                <option value="<?= $r['idobat']; ?>"><?= $r['namaobat'] . ' | Rp' . number_format($r['hargajual'], 0, ',', '.'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlahObat" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="addButton" class="addButton" id="addButton">Tambah Obat Lainnya</button>
                    </div>
                </div>
            </form>

            <form action="Tcontroller.php" method="post">
                <input type="hidden" name="tanggalTransaksi" value="<?= $_SESSION['tanggalTransaksi']; ?>">
                <input type="hidden" name="pelanggan" value="<?= $_SESSION['pelanggan']; ?>">
                <input type="hidden" name="kategoriPelangganTransaksi" value="<?= $_SESSION['kategoriPelangganTransaksi']; ?>">
                <div class="table">
                    <table class="first-table">
                        <thead>
                            <tr>
                                <td>Tanggal Transaksi</td>
                                <td><?= $_SESSION['tanggalTransaksi']; ?></td>
                            </tr>
                            <tr>
                                <td>Pelanggan</td>
                                <td><?= $readPelanggan['namalengkap']; ?></td>
                            </tr>
                            <tr>
                                <td>Kategori Pelanggan</td>
                                <td><?= $_SESSION['kategoriPelangganTransaksi']; ?></td>
                            </tr>
                        </thead>
                    </table>

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
                            <?php
                            $i = 1;
                            $j = 1;
                            $l = 1;
                            ?>
                            <?php if (isset($_SESSION['daftarObat'])) :  ?>
                                <?php foreach ($_SESSION['daftarObat'] as $dob) : ?>
                                    <tr>
                                        <input type="hidden" name="idObat<?= $i++; ?>" value="<?= $dob['idobat'] ?>">
                                        <input type="hidden" name="hargaJual<?= $j++; ?>" value="<?= $dob['hargajual'] ?>">
                                        <input type="hidden" name="jumlahObat<?= $l++; ?>" value="<?= $dob['jumlahobat'] ?>">
                                        <input type="hidden" name="arrLength" value="<?= count($_SESSION['daftarObat']); ?>">
                                        <td><?= $dob['namaobat']; ?></td>
                                        <td><?= number_format($dob['jumlahobat'], 0, ',', '.'); ?></td>
                                        <td>Rp<?= number_format($dob['hargajual'], 0, ',', '.'); ?></td>

                                        <?php $grand += $dob['jumlahobat'] * $dob['hargajual']; ?>
                                        <td>Rp<?= number_format($dob['jumlahobat'] * $dob['hargajual'], 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">Grand Total</td>
                                <td>Rp<?= number_format($grand, 0, ',', '.'); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="form-group">
                    <label for="bayar">Bayar</label>
                    <input type="number" name="bayar" id="bayar" placeholder="Rp">
                </div>

                <div class="form-group">
                    <input type="hidden" name="grandTotal" value="<?= $grand; ?>">
                    <button type="submit" class="confirmButton" name="finalTransaksi">Selesaikan Transaksi</button>
                </div>
            </form>
        </div>
    </main>

</div>

<?php require_once '../templates/footer.php'; ?>