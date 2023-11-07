<?php
require_once '../koneksi.php';

if (!isset($_SESSION['userlogin'])) {
    return header("Location: ../login/index.php");
}

require_once '../templates/header.php';

// cards
$totalKaryawan = countKaryawan();
$totalObat = countObat();
$totalPelanggan = countPelanggan();
$totalSupplier = countSupplier();

$karyawan = readdata(getKaryawan());
$pelanggan = readdata(getPelanggan());

?>

<div class="main-content">
    <header>
        <h2>
            <label for="nav-toggle">
                <span class="las la-bars"></span>
            </label> Dashboard
        </h2>

        <div class="user-wrapper">
            <img src="img/Avatar.png" width="40px" height="40px" alt="">
            <div>
                <h4><?= $_SESSION['userlogin'] ?></h4>
            </div>
        </div>
    </header>

    <main>
        <div class="cards">

            <div class="card-single">
                <div>
                    <h1><?= $totalKaryawan ?></h1>
                    <span>Karyawan</span>
                </div>
                <div>
                    <span class="las la-users"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1><?= $totalObat ?></h1>
                    <span>Obat</span>
                </div>
                <div>
                    <span class="las la-stethoscope"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1><?= $totalPelanggan ?></h1>
                    <span>Pelanggan</span>
                </div>
                <div>
                    <span class="las la-wheelchair"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1><?= $totalSupplier ?></h1>
                    <span>Supplier</span>
                </div>
                <div>
                    <span class="lab la-wpforms"></span>
                </div>
            </div>
        </div>

        <!--Tabla-->
        <div class="recent-grid">
            <div class="projects">
                <div class="card">
                    <div class="card-header">
                        <h3>Karyawan</h3>

                        <a href="../karyawan/index.php" style="cursor: pointer;">
                            <button style="cursor: pointer;">
                                Karyawan
                                <span class="las la-arrow-right"></span>
                            </button>
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Nama</td>
                                        <td>Telphone</td>
                                        <td>Alamat</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($karyawan as $staff) : ?>
                                        <tr>
                                            <td><?= $staff['namakaryawan'] ?></td>
                                            <td><?= $staff['telp'] ?></td>
                                            <td><?= $staff['alamat'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div class="customers">

                <div class="card">
                    <div class="card-header">
                        <h3>Pelanggan</h3>

                        <a href="../pelanggan/index.php" style="cursor: pointer;">
                            <button style="cursor: pointer;">
                                Pelanggan
                                <span class="las la-arrow-right"></span>
                            </button>
                        </a>
                    </div>

                    <div class="card-body">
                        <?php $i = 0; ?>
                        <div class="customer">

                            <?php foreach ($pelanggan as $customer) : ?>
                                <?php $i++; ?>

                                <div class="info">
                                    <img src="avatars/<?= $i ?>.png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4><?= $customer['namalengkap'] ?></h4>
                                        <small><?= $customer['usia'] ?></small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="lab la-whatsapp"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php require_once '../templates/footer.php'; ?>