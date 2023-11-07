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
                $rqkar = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE idkaryawan = $id");

                $readKaryawan = readData($rqkar)[0]; // read spesific 
            }

            // edit data karyawan
            if (isset($_POST['editKaryawanButton'])) {
                $namaKaryawan = $_POST['namaKaryawan'];
                $alamatKaryawan = $_POST['alamatKaryawan'];
                $telpKaryawan = $_POST['telpKaryawan'];
                $id = $_POST['id'];

                $ukar = "UPDATE tb_karyawan SET namakaryawan='$namaKaryawan', alamat='$alamatKaryawan', telp='$telpKaryawan' WHERE idkaryawan = $id";

                $rkar = mysqli_query($conn, $ukar);

                if ($rkar) {
                    echo "<script>
                    alert('Karyawan berhasil diubah');
                    document.location.href = 'index.php';
                </script>";
                } else {
                    echo "<script>
                            alert('Karyawan gagal diubah');
                            document.location.href = 'index.php';
                        </script>";
                }
            }
            ?>


            <form action="" method="post">
                <h1>Edit Karyawan</h1>
                <input type="hidden" name="id" value="<?= $readKaryawan['idkaryawan']; ?>">

                <input type="text" name="namaKaryawan" id="namaKaryawan" value="<?= $readKaryawan['namakaryawan'] ?>" required>
                <input type="text" name="alamatKaryawan" id="alamat" value="<?= $readKaryawan['alamat'] ?>" required>


                <input type="text" name="telpKaryawan" id="telp" value="<?= $readKaryawan['telp'] ?>" required>

                <button type="submit" name="editKaryawanButton" class="btn btn-tambah">Tambah Karyawan</button>
            </form>

        </main>
    <?php endif; ?>
</div>
<?php require_once '../templates/footer.php'; ?>