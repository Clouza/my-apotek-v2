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

        // read obat
        $queryObat = "SELECT * FROM tb_obat JOIN tb_supplier ON tb_obat.idsupplier = tb_supplier.idsupplier";
        $resultObat = mysqli_query($conn, $queryObat);
        $readObat = readData($resultObat);

        // read supplier
        $querySupplier = "SELECT * FROM tb_supplier";
        $resultSupplier = mysqli_query($conn, $querySupplier);
        ?>
        <h2>Obat</h2>
        <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
            <a href="Ohalamancreate.php"><button id="tambahView" class="btn btn-tambah">Tambah Obat</button></a>
        <?php endif; ?>
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
                <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
                    <th>Aksi</th>
                <?php endif; ?>

            </tr>
            <?php $i = 1; ?>
            <?php foreach ($readObat as $r) : ?>
                <tr class="tbody">
                    <td><?= $i++; ?></td>
                    <td><?= $r['perusahaan']; ?></td>
                    <td><?= $r['namaobat']; ?></td>
                    <td><?= $r['kategoriobat']; ?></td>
                    <td><?= $r['hargajual']; ?></td>
                    <td><?= $r['hargabeli']; ?></td>
                    <td><?= $r['stok_obat']; ?></td>
                    <td><?= $r['keterangan']; ?></td>
                    <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
                        <td>
                            <form action="" method="post">
                                <a href="Oedit.php?id=<?= $r['idobat']; ?>">Edit</a>
                                <a href="Ohapus.php?id=<?= $r['idobat']; ?>" onclick="return confirm('Anda yakin?')">Hapus</a>
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
</div>

<?php require_once '../templates/footer.php'; ?>