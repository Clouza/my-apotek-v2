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

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $result = mysqli_query($conn, "SELECT * FROM tb_supplier WHERE idsupplier = $id");

            $rows = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }

            $reads = $rows;
        }

        if (isset($_POST['tambahsupplier'])) {
            $perusahaan = $_POST['perusahaan'];
            $alamatsupplier = $_POST['alamatsup'];
            $telpsupplier = $_POST['telpsup'];
            $keterangansupplier = $_POST['keterangansup'];
            $id = $_POST['id'];

            $isp = "UPDATE tb_supplier SET perusahaan='$perusahaan', telp='$telpsupplier', alamat='$alamatsupplier', keterangan='$keterangansupplier' WHERE idsupplier=$id";

            $rsp = mysqli_query($conn, $isp);

            return header("Location: index.php");
        }
        ?>

        <?php foreach ($reads as $r) : ?>
            <form action="" method="post">
                <h1>Edit Supplier</h1>
                <input type="hidden" name="id" value="<?= $r['idsupplier'] ?>">
                <input type="text" name="perusahaan" placeholder="Perusahaan" value="<?= $r['perusahaan'] ?>">
                <input type="text" name="telpsup" placeholder="Telp" value="<?= $r['telp'] ?>">
                <input type="text" name="alamatsup" placeholder="Alamat" value="<?= $r['alamat'] ?>">
                <input type="text" name="keterangansup" placeholder="Keterangan" value="<?= $r['keteranganSupplier'] ?>">
                <button type="submit" name="tambahsupplier" class="btn btn-tambah">Edit Supplier</button>
            </form>
        <?php endforeach; ?>
    </main>
</div>
<?php require_once '../templates/footer.php'; ?>