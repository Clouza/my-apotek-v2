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
    <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
        <main>
            <?php

            // get spesific data karyawan 
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $rqkar = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE idpelanggan = $id");

                $readKaryawan = readData($rqkar)[0]; // read spesific 
            }

            // edit data karyawan
            if (isset($_POST['editPelangganButton'])) {
                $namalengkap = $_POST['namalengkap'];
                $alamat = $_POST['alamat'];
                $telp = $_POST['telp'];
                $usia = $_POST['usia'];
                $buktifotoresep = $_POST['buktifotoresep'];
                $id = $_POST['id'];

                $ukar = "UPDATE tb_pelanggan SET namalengkap='$namalengkap', alamat='$alamat', telp='$telp',usia='$usia',buktifotoresep='$buktifotoresep'WHERE idpelanggan = $id";

                $rkar = mysqli_query($conn, $ukar);

                if ($rkar) {
                    echo "<script>
                    alert('Pelanggan berhasil diubah');
                    document.location.href = 'index.php';
                    </script>";
                } else {
                    echo "<script>
                    alert('Pelanggan gagal diubah');
                    document.location.href = 'index.php';
                    </script>";
                }
            }
            ?>

            <form action="" method="post">
                <h1>Edit Pelanggan</h1>
                <input type="hidden" name="id" value="<?= $readKaryawan['idpelanggan']; ?>">
                <input type="text" name="namalengkap" id="namalengkap" value="<?= $readKaryawan['namalengkap'] ?>" required>
                <input type="text" name="alamat" id="alamat" value="<?= $readKaryawan['alamat'] ?>" required>
                <input type="text" name="telp" id="telp" value="<?= $readKaryawan['telp'] ?>" required>
                <input type="text" name="usia" id="usia" value="<?= $readKaryawan['usia'] ?>" required>
                <input type="text" name="buktifotoresep" id="buktifotoresep" value="<?= $readKaryawan['buktifotoresep'] ?>" required>

                <button type="submit" name="editPelangganButton" class="btn btn-tambah">Tambah Pelanggan</button>
            </form>

        <?php endif; ?>
        </main>

</div>

<?php require_once '../templates/footer.php'; ?>