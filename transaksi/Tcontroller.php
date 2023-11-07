<?php
require_once '../koneksi.php';
$queryTransaksi = "SELECT * FROM tb_transaksi JOIN tb_pelanggan ON tb_transaksi.idpelanggan = tb_pelanggan.idpelanggan";
$resultTransaksi = mysqli_query($conn, $queryTransaksi);
$readTransaksi = readData($resultTransaksi);

$queryPelanggan = "SELECT * FROM tb_pelanggan";
$resultPelanggan = mysqli_query($conn, $queryPelanggan);
$readPelanggan = readData($resultPelanggan);

// transaksi lanjutan
if (isset($_POST['nextTransaksiButton'])) {
    $_SESSION['tanggalTransaksi'] = $_POST['tanggalTransaksi'];
    $_SESSION['pelanggan'] = $_POST['pelanggan'];
    $_SESSION['kategoriPelangganTransaksi'] = $_POST['kategoriPelangganTransaksi'];

    return header("Location: advance.php");
}

// tambahan obat 
if (isset($_POST['addButton'])) {
    $idObat = $_POST['idObat'];
    $jumlahObat = $_POST['jumlahObat'];

    $queryObat = "SELECT * FROM tb_obat WHERE idobat = $idObat";
    $resultObat = mysqli_query($conn, $queryObat);
    $readObat = readData($resultObat);
    $readObat[0]['jumlahobat'] = $jumlahObat;
    $endObat = $_SESSION['daftarObat'];

    if ($_SESSION['daftarObat'][0]) {
        if (end($endObat)['idobat'] == $idObat) {
            $_SESSION['pesanobat'] = 'Obat sudah masuk!';
            return header("Location: advance.php");
        } else {
            // array_push() // $_SESSION['daftarObat], $readObat
            array_push($_SESSION['daftarObat'], $readObat[0]);

            unset($_SESSION['pesanobat']);
            return header("Location: advance.php");
        }
    } else {
        $_SESSION['daftarObat'] = $readObat;
        return header("Location: advance.php");
    }
}

// final transaksi
if (isset($_POST['finalTransaksi'])) {
    // variables
    $tanggal = $_POST['tanggalTransaksi'];
    $pelanggan = $_POST['pelanggan'];
    $kategoriPelanggan = $_POST['kategoriPelangganTransaksi'];
    $arrLength = (int)$_POST['arrLength'];
    $bayar = $_POST['bayar'];
    $grandTotal = $_POST['grandTotal'];
    $kembali = $bayar - $grandTotal;

    // transaksi
    $queryTransaksiFinal = "INSERT INTO tb_transaksi VALUES('', '$tanggal', '$pelanggan', '$kategoriPelanggan', '$grandTotal', '$bayar', '$kembali')";
    $resultTransaksiFinal = mysqli_query($conn, $queryTransaksiFinal);

    $queryTransaksiRead = "SELECT * FROM tb_transaksi";
    $resultTransaksiRead = mysqli_query($conn, $queryTransaksiRead);
    $readTransaksiFinal = readData($resultTransaksiRead);
    $transaksiTerakhir = end($readTransaksiFinal)['idtransaksi'];

    if (isset($transaksiTerakhir)) {
        for ($i = 1; $i <= $arrLength; $i++) {
            $idObat = $_POST['idObat' . $i];
            $hargaJual = $_POST['hargaJual' . $i];
            $jumlahObat = $_POST['jumlahObat' . $i];
            $total = $jumlahObat * $hargaJual;

            $queryDetail = "INSERT INTO tb_detail_transaksi VALUES('', '$transaksiTerakhir', '$idObat', '$jumlahObat', '$hargaJual', '$total')";
            $resultDetail = mysqli_query($conn, $queryDetail);
        }
        unset($_SESSION['tanggalTransaksi']);
        unset($_SESSION['pelanggan']);
        unset($_SESSION['kategoriPelangganTransaksi']);
        unset($_SESSION['daftarObat']);

        return header("Location: td.php?id=$transaksiTerakhir");
    }
}

// delete transaksi
if (isset($_GET['idd'])) {
    $id = $_GET['idd'];
    $resultDelete1 = mysqli_query($conn, "DELETE FROM tb_transaksi WHERE idtransaksi = $id");
    $resultDelete2 = mysqli_query($conn, "DELETE FROM tb_detail_transaksi WHERE idtransaksi = $id");

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
        alert('Transaksi berhasil dihapus');
        document.location.href = 'transaksi.php';
    </script>";
    } else {
        echo "<script>
        alert('Transaksi gagal dihapus');
        document.location.href = 'transaksi.php';
    </script>";
    }
}
