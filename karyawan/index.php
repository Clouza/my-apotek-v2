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
        require_once '../koneksi.php';

        $query = "SELECT * FROM tb_karyawan";
        $result = mysqli_query($conn, $query);

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }


        ?>
        <H2>Karyawan</H2>
        <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
            <a href="Khalamancreate.php" class="btn btn-tambah">Tambah Karyawan</a>
        <?php endif; ?>

        <table width="100%" border="1">
            <tr>
                <td>#</td>
                <td>Nama</td>
                <td>Telp</td>
                <td>Alamat</td>
                <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
                    <td>aksi</td>
                <?php endif; ?>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['namakaryawan'] ?></td>
                    <td><?= $row['telp'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
                        <td>
                            <a href="Kedit.php?id=<?= $row['idkaryawan'] ?>">edit|</a>
                            <a href="Khapus.php?id=<?= $row['idkaryawan'] ?>">hapus</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>

</div>

<?php require_once '../templates/footer.php'; ?>