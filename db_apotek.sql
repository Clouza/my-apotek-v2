-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2022 pada 11.46
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `iddetailtransaksi` int(11) NOT NULL,
  `idtransaksi` int(11) NOT NULL,
  `idobat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargasatuan` double NOT NULL,
  `totalharga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`iddetailtransaksi`, `idtransaksi`, `idobat`, `jumlah`, `hargasatuan`, `totalharga`) VALUES
(1, 1, 1, 10, 10000, 100000),
(2, 2, 1, 2, 10000, 20000),
(3, 2, 2, 2, 1000, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `idkaryawan` int(11) NOT NULL,
  `namakaryawan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`idkaryawan`, `namakaryawan`, `alamat`, `telp`) VALUES
(1, 'Clouza', 'Denpasar', 1123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `leveluser` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `leveluser`) VALUES
('Siwananda R.', 'siwa', 'admin'),
('nanda', 'nanda', 'karyawan'),
('escanor', 'escan', 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `idobat` int(11) NOT NULL,
  `idsupplier` varchar(4) NOT NULL,
  `namaobat` varchar(100) NOT NULL,
  `kategoriobat` varchar(10) NOT NULL,
  `hargajual` double NOT NULL,
  `hargabeli` double NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`idobat`, `idsupplier`, `namaobat`, `kategoriobat`, `hargajual`, `hargabeli`, `stok_obat`, `keterangan`) VALUES
(1, '1', 'SSH', 'Obat Ultim', 10000, 12000, 200, 'Obat paling gg dan wp ezpz '),
(2, '1', 'Somewhere', 'Keras', 1000, 2000, 10, 'Vieieie'),
(3, '1', 'Fallen', 'EZ', 292929, 929292, 15, 'Nothing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` int(15) NOT NULL,
  `usia` int(2) NOT NULL,
  `buktifotoresep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`idpelanggan`, `namalengkap`, `alamat`, `telp`, `usia`, `buktifotoresep`) VALUES
(1, 'Zuae', 'Jiji', 928, 88, 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `idsupplier` int(11) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `keteranganSupplier` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`idsupplier`, `perusahaan`, `telp`, `alamat`, `keteranganSupplier`) VALUES
(1, 'Care', '123', 'Tidak Tahu', 'Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `idpelanggan` varchar(4) NOT NULL,
  `kategoripelanggan` varchar(15) NOT NULL,
  `totalbayar` double DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `kembali` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`idtransaksi`, `tgltransaksi`, `idpelanggan`, `kategoripelanggan`, `totalbayar`, `bayar`, `kembali`) VALUES
(1, '2022-01-19', '1', 'Pemuda Pancasil', 100000, 200000, 100000),
(2, '2022-01-26', '1', 'Pepa', 22000, 30000, 8000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`iddetailtransaksi`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`idobat`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`idsupplier`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `iddetailtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `idkaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `idobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `idsupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
