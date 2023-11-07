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
        $query = "SELECT * FROM tb_supplier";
        $result = mysqli_query($conn, $query);

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        ?>

        <H2>Supplier</H2>
        <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
            <button><a href="halamancreate.php" class="btn btn-tambah">tambahsupplier</a>
            </button>
        <?php endif; ?>

        <table width="100%" border=1>
            <tr>
                <td>#</td>
                <td>Nama</td>
                <td>Telp</td>
                <td>Alamat</td>
                <td>Keterangan</td>
                <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
                    <td>aksi</td>
                <?php endif; ?>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['perusahaan'] ?></td>
                    <td><?= $row['telp'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['keteranganSupplier'] ?></td>
                    <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
                        <td>
                            <a href="edit.php?id=<?= $row['idsupplier'] ?>">edit</a> |
                            <a href="hapus.php?id=<?= $row['idsupplier'] ?>">hapus</a>
                        </td>
                    <?php endif; ?>
                </tr>

            <?php endforeach; ?>
        </table>
    </main>

    <?php require_once '../templates/footer.php'; ?>