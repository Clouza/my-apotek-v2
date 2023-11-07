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

        // read all data supplier
        $querySupplier = "SELECT * FROM tb_supplier";
        $resultSupplier = mysqli_query($conn, $querySupplier);
        $readSupplier = readData($resultSupplier);

        // get spesific data obat 
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = mysqli_query($conn, "SELECT * FROM tb_obat JOIN tb_supplier ON tb_obat.idsupplier = tb_supplier.idsupplier  WHERE idobat = $id");
            $readObat = readData($result)[0]; // read spesific 
        }

        // edit data obat
        if (isset($_POST['editObatButton'])) {
            $supplierObat = $_POST['supplierObat'];
            $namaObat = $_POST['namaobat'];
            $kategoriObat = $_POST['kategoriobat'];
            $hargajualObat = $_POST['hargajualobat'];
            $hargabeliObat = $_POST['hargabeliobat'];
            $stokObat = $_POST['stokobat'];
            $keteranganObat = $_POST['keteranganobat'];
            $id = $_POST['id'];

            $query = "UPDATE tb_obat SET idsupplier='$supplierObat', namaobat='$namaObat', kategoriobat='$kategoriObat', hargajual='$hargajualObat', hargabeli='$hargabeliObat', stok_obat='$stokObat', keterangan='$keteranganObat' WHERE idobat = $id";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script>
            alert('Obat berhasil diubah');
            document.location.href = 'index.php';
        </script>";
            } else {
                echo "<script>
            alert('Obat gagal diubah');
            document.location.href = 'index.php';
        </script>";
            }
        }
        ?>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $readObat['idobat']; ?>">

            <div class="formgroup">
                <label for="supplier">Supplier Obat</label>
                <select name="supplierObat" id="supplier">
                    <?php foreach ($readSupplier as $rp) : ?>
                        <option value="<?= $rp['idsupplier']; ?>"><?= $rp['perusahaan']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="formgroup">
                <label for="nama">Nama Obat</label>
                <input type="text" name="namaobat" id="nama" value="<?= $readObat['namaobat']; ?>" required>
            </div>
            <div class="formgroup">
                <label for="kategori">Kategori Obat</label>
                <input type="text" name="kategoriobat" id="kategori" value="<?= $readObat['kategoriobat']; ?>" required>
            </div>
            <div class="formgroup">
                <label for="hargajual">Harga Jual</label>
                <input type="number" name="hargajualobat" id="hargajual" value="<?= $readObat['hargajual']; ?>" required>
            </div>
            <div class="formgroup">
                <label for="hargabeli">Harga Beli</label>
                <input type="number" name="hargabeliobat" id="hargabeli" value="<?= $readObat['hargabeli']; ?>" required>
            </div>
            <div class="formgroup">
                <label for="stok">Stok</label>
                <input type="number" name="stokobat" id="stok" value="<?= $readObat['stok_obat']; ?>" required>
            </div>
            <div class="formgroup">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keteranganobat" id="keterangan" value="<?= $readObat['keterangan']; ?>" required>
            </div>

            <button type="submit" name="editObatButton" class="btn btn-tambah">Ubah Obat</button>
        </form>
    </main>
</div>
<?php require_once '../templates/footer.php'; ?>