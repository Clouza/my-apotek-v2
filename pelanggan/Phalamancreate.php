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

            require_once 'Pcreate.php';

            ?>

            <body>

                <form action="" method="post">
                    <h1>Tambah pelanggan</h1>
                    <input type="text" name="namalengkap" placeholder="NamaLengkap">
                    <input type="text" name="alamatpelanggan" placeholder="Alamat">
                    <input type="text" name="telppelanggan" placeholder="Telp">
                    <input type="text" name="usiapelanggan" placeholder="Usia">
                    <input type="text" name="bukti" placeholder="Buktifotoresep">
                    <button type="submit" name="tambahpelanggan" class="btn btn-tambah">Tambah Pelanggan</button>
                </form>
            </body>

        </main>
    <?php endif; ?>
</div>

<?php require_once '../templates/footer.php'; ?>