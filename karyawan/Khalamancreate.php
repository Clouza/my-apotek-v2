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
            <form action="Kcreate.php" method="post">
                <h1>Tambah karyawan</h1>
                <input type="text" name="karyawan" placeholder="karyawan">
                <input type="text" name="telpkar" placeholder="Telp">
                <input type="text" name="alamatkar" placeholder="Alamat">
                <button type="submit" name="tambahkaryawan" class="btn btn-tambah">Tambah karyawan</button>
            </form>
        </main>
    <?php endif; ?>
</div>
<?php require_once '../templates/footer.php'; ?>