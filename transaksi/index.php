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
        $queryTransaksi = "SELECT * FROM tb_transaksi JOIN tb_pelanggan ON tb_transaksi.idpelanggan = tb_pelanggan.idpelanggan";
        $resultTransaksi = mysqli_query($conn, $queryTransaksi);
        $readTransaksi = readData($resultTransaksi);

        $queryPelanggan = "SELECT * FROM tb_pelanggan";
        $resultPelanggan = mysqli_query($conn, $queryPelanggan);
        $readPelanggan = readData($resultPelanggan);
        ?>
        <h2>Transaksi</h2>

        <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
            <button><a href="Thalamancreate.php" class="btn btn-tambah">TambahTransaksi</a></button>
        <?php endif; ?>

        <table width="100%" border="1">
            <tr>
                <td>#</td>
                <td>Tanggal</td>
                <td>Pelanggan</td>
                <td>Kategori</td>
                <td>Total</td>
                <td>Bayar</td>
                <td>Kembali</td>
                <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
                    <td>aksi</td>
                <?php endif; ?>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($readTransaksi as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['tgltransaksi'] ?></td>
                    <td><?= $row['namalengkap'] ?></td>
                    <td><?= $row['kategoripelanggan'] ?></td>
                    <td><?= $row['totalbayar'] ?></td>
                    <td><?= $row['bayar'] ?></td>
                    <td><?= $row['kembali'] ?></td>
                    <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
                        <td>
                            <a href="Td.php?id=<?= $row['idtransaksi']; ?>">Detail| </a>
                            <a href="Hapus.php?idd=<?= $row['idtransaksi']; ?>">|hapus</a>

                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
</div>

<?php require_once '../templates/footer.php'; ?>