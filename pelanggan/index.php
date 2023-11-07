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
        $query = "SELECT * FROM tb_pelanggan";
        $result = mysqli_query($conn, $query);

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }


        ?>
        <H2>Pelanggan</H2>
        <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
            <a href="Phalamancreate.php" class="btn btn-tambah">Tambah Pelanggan</a>
        <?php endif; ?>

        <table width="100%" border=1>
            <tr>
                <td>#</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Telp</td>
                <td>usia</td>
                <td>buktifotoresep</td>
                <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
                    <td>aksi</td>
                <?php endif; ?>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['namalengkap'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['telp'] ?></td>
                    <td><?= $row['usia'] ?></td>
                    <td><?= $row['buktifotoresep'] ?></td>
                    <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
                        <td>
                            <a href="Pedit.php?id=<?= $row['idpelanggan'] ?>">Edit|</a>
                            <a href="Phapus.php?id=<?= $row['idpelanggan'] ?>">Hapus</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
</div>

<?php require_once '../templates/footer.php'; ?>