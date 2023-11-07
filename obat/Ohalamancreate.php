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

        // $querysupplier="SELECT * FROM tb_obat JOIN tb_supplier ON tb_obat.idsupplier = tb_supplier.idsupplier";
        // $resultsupplier = mysqli_query($conn,$querysupplier);
        // $readsupplier = readData($resultsupplier);

        $querysupplier = "SELECT * FROM tb_supplier";
        $resultsupplier = mysqli_query($conn, $querysupplier);
        $readsupplier = readData($resultsupplier);
        ?>
        <form action="Ocreate.php" method="post">
            <h1>Tambah Obat</h1>
            <label for="supplier">Supplier Obat</label>
            <select name="supplierObat" id="supplier" required>
                <option value="">-- Daftar Supplier --</option>
                <?php foreach ($readsupplier as $rp) : ?>
                    <option value="<?= $rp['idsupplier'] ?>"><?= $rp['perusahaan'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="namaobat" placeholder="namaobat">
            <input type="text" name="kategoriobat" placeholder="kategoriobat">
            <input type="text" name="hargajual" placeholder="hargajual">
            <input type="text" name="hargabeli" placeholder="hargabeli">
            <input type="text" name="stok_obat" placeholder="stok_obat">
            <input type="text" name="keterangan" placeholder="keterangan">
            <button type="submit" name="tambahobat" class="btn btn-tambah">Tambah Obat</button>
        </form>
    </main>
</div>

<?php require_once '../templates/footer.php'; ?>