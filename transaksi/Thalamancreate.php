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
        $querypelanggan = "SELECT * FROM tb_pelanggan";
        $resultpelanggan = mysqli_query($conn, $querypelanggan);
        $readpelanggan = readData($resultpelanggan);

        if (isset($_POST['nextTransaksiButton'])) {
            $_SESSION['tanggalTransaksi'] = $_POST['tanggalTransaksi'];
            $_SESSION['pelanggan'] = $_POST['pelanggan'];
            $_SESSION['kategoriPelangganTransaksi'] = $_POST['kategoriPelangganTransaksi'];

            return header("Location: advance.php");
        }

        ?>


        <form action="" method="post">
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggalTransaksi" id="tanggal" required>
            </div>
            <div class="form-group">
                <select name="pelanggan" id="pelanggan" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    <?php foreach ($readpelanggan as $rp) : ?>
                        <option value="<?= $rp['idpelanggan']; ?>"><?= $rp['namalengkap']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kategoriPelanggan">Kategori Pelanggan</label>
                <input type="text" name="kategoriPelangganTransaksi" id="kategoriPelanggan" required>
            </div>

            <button type="submit" name="nextTransaksiButton" class="btn btn-tambah">Selanjutnya &rightarrow;</button>
        </form>

    </main>
</div>

<?php require_once '../templates/footer.php'; ?>