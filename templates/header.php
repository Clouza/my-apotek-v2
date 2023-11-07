<?php
$currentActiveURL = explode('/', $_SERVER['REQUEST_URI'])[1];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>MyApotek</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../templates/css/style.css">
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="las la-clinic-medical"></span> <span>MyApotek</span></h2>
        </div>

        <!-- sidebar -->
        <div class="sidebar-menu">
            <ul>
                <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
                    <li>
                        <a href="../dashboard/index.php" class="<?= $currentActiveURL == 'dashboard' ? 'active' : '' ?>"><span class="las la-home"></span>
                            <span>Home</span></a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['leveluser'] == ADMIN || $_SESSION['leveluser'] == KARYAWAN) : ?>
                    <li>
                        <a href="../obat/index.php" class="<?= $currentActiveURL == 'obat' ? 'active' : '' ?>">
                            <span class="las la-stethoscope"></span>
                            <span>Obat</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['leveluser'] == ADMIN) : ?>
                    <li>
                        <a href="../karyawan/index.php" class="<?= $currentActiveURL == 'karyawan' ? 'active' : '' ?>">
                            <span class="las la-user"></span>
                            <span>Karyawan</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['leveluser'] == ADMIN || $_SESSION['leveluser'] == KARYAWAN) : ?>
                    <li>
                        <a href="../pelanggan/index.php" class="<?= $currentActiveURL == 'pelanggan' ? 'active' : '' ?>">
                            <span class="las la-user-injured"></span>
                            <span>Pelanggan</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['leveluser'] == ADMIN || $_SESSION['leveluser'] == KARYAWAN) : ?>
                    <li>
                        <a href="../supplier/index.php" class="<?= $currentActiveURL == 'supplier' ? 'active' : '' ?>">
                            <span class="las la-book-medical"></span>
                            <span>Supplier</span>
                        </a>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="../transaksi/index.php" class="<?= $currentActiveURL == 'transaksi' ? 'active' : '' ?>">
                        <span class="las la-history"></span>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="../login/logout.php"><span class="las la-sign-out-alt"></span>
                        <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>