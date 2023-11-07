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


        <form action="create.php" method="post">
            <h1>Tambah supplier</h1>
            <input type="text" name="perusahaan" placeholder="Perusahaan">
            <input type="text" name="telpsup" placeholder="Telp">
            <input type="text" name="alamatsup" placeholder="Alamat">
            <input type="text" name="keterangansup" placeholder="Keterangan">
            <button type="submit" name="tambahsupplier" class="btn btn-tambah">Tambah supplier</button>
        </form>
    </main>
</div>

<?php require_once '../templates/footer.php'; ?>