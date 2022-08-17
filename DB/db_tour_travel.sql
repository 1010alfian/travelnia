-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2022 pada 10.38
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tour_travel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kd_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(35) DEFAULT NULL,
  `username_admin` varchar(30) DEFAULT NULL,
  `password_admin` varchar(256) DEFAULT NULL,
  `img_admin` varchar(35) DEFAULT NULL,
  `email_admin` varchar(35) DEFAULT NULL,
  `level_admin` varchar(12) DEFAULT NULL,
  `status_admin` int(1) DEFAULT NULL,
  `date_create_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nama_admin`, `username_admin`, `password_admin`, `img_admin`, `email_admin`, `level_admin`, `status_admin`, `date_create_admin`) VALUES
('ADM0001', 'Nia Sulastri', 'supervisor', '$2y$10$GbrdkfCg.Su9SrLpOvNMQeNQO.eYdPZnqkKYqoZvQwB6NOoidmPBu', 'assets/backend/img/default.png', 'owner@gmail.com', '1', 1, '1552819095'),
('ADM0002', 'dedeh widiyanti', 'admin', '$2y$10$v25.H4XMgDztA2NmxeJQSeaRl2nKboXeRTo1BjPe37R0JG3rXraZG', 'assets/backend/img/default.png', 'adm@gmail.com', '2', 1, '1552276812');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `kd_bank` varchar(50) NOT NULL,
  `nasabah_bank` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `nomrek_bank` varchar(50) DEFAULT NULL,
  `photo_bank` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bank`
--

INSERT INTO `tbl_bank` (`kd_bank`, `nasabah_bank`, `nama_bank`, `nomrek_bank`, `photo_bank`) VALUES
('BNK0001', 'Travel', 'BCA', '54902520644', 'assets/frontend/img/bank/bca-icon.jpg'),
('BNK0002', 'Travel', 'MANDIRI', '6666666666', 'assets/frontend/img/bank/mandiri-icon.jpg'),
('BNK0003', 'Travel', 'BRI', '7777777777', 'assets/frontend/img/bank/bri-icon.jpg'),
('BNK0004', 'Travel', 'BNI', '8888888888', 'assets/frontend/img/bank/bni-icon.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bus`
--

CREATE TABLE `tbl_bus` (
  `kd_bus` varchar(50) NOT NULL,
  `nama_bus` varchar(50) DEFAULT NULL,
  `plat_bus` varchar(50) DEFAULT NULL,
  `kapasitas_bus` int(13) DEFAULT NULL,
  `status_bus` int(1) DEFAULT NULL,
  `desc_bus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bus`
--

INSERT INTO `tbl_bus` (`kd_bus`, `nama_bus`, `plat_bus`, `kapasitas_bus`, `status_bus`, `desc_bus`) VALUES
('T001', 'Bus Bandung', 'T 4514 BLN', 19, 1, '--'),
('T002', 'Bus PGC', 'T 4514 BLO', 19, 1, '--'),
('T004', 'Bus Bekasi', 'T 4514 BLQ', 19, 1, '--'),
('T005', 'Bus Cikarang', 'T 4561 BLR', 19, 1, '--'),
('TB03', 'Bus Blora', 'T 4514 BLP', 19, 1, '--');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `kd_jadwal` varchar(50) NOT NULL,
  `kd_bus` varchar(50) DEFAULT NULL,
  `kd_tujuan` varchar(50) DEFAULT NULL,
  `kd_asal` varchar(50) DEFAULT NULL,
  `wilayah_jadwal` varchar(50) DEFAULT NULL,
  `jam_berangkat_jadwal` time DEFAULT NULL,
  `jam_tiba_jadwal` time DEFAULT NULL,
  `harga_jadwal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`kd_jadwal`, `kd_bus`, `kd_tujuan`, `kd_asal`, `wilayah_jadwal`, `jam_berangkat_jadwal`, `jam_tiba_jadwal`, `harga_jadwal`) VALUES
('J0001', 'T001', 'TJ003', 'TJ001', 'Bandung', '08:00:00', '10:00:00', '80000'),
('J0002', 'T002', 'TJ002', 'TJ001', 'PGC', '08:00:00', '10:00:00', '100000'),
('J0003', 'TB03', 'TJ004', 'TJ001', 'Blora', '08:00:00', '10:00:00', '100000'),
('J0004', 'T004', 'TJ005', 'TJ001', 'BEKASI', '08:00:00', '10:00:00', '70000'),
('J0005', 'T005', 'TJ006', 'TJ001', 'Cikarang', '08:00:00', '10:00:00', '70000'),
('J0006', 'T004', 'TJ001', 'TJ005', 'Subang', '15:27:00', '06:27:00', '100000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `kd_konfirmasi` varchar(50) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `nama_konfirmasi` varchar(50) DEFAULT NULL,
  `nama_bank_konfirmasi` varchar(50) DEFAULT NULL,
  `norek_konfirmasi` varchar(50) DEFAULT NULL,
  `total_konfirmasi` varchar(50) DEFAULT NULL,
  `photo_konfirmasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konfirmasi`
--

INSERT INTO `tbl_konfirmasi` (`kd_konfirmasi`, `kd_order`, `nama_konfirmasi`, `nama_bank_konfirmasi`, `norek_konfirmasi`, `total_konfirmasi`, `photo_konfirmasi`) VALUES
('KF0001', 'ORD00002', 'user1', 'BCA', '1234567', '80000', '/assets/frontend/upload/payment/wallpaperflare_com_wallpaper.jpg'),
('KF0002', 'ORD00003', 'user2', 'Mandiri', '123456789', '70000', '/assets/frontend/upload/payment/094233600_1442821951-27060-Four-baby-rabbits-white-background.jpg'),
('KF0003', 'ORD00004', 'nia', 'BCA', '123456789', '80000', '/assets/frontend/upload/payment/094233600_1442821951-27060-Four-baby-rabbits-white-background1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level`
--

CREATE TABLE `tbl_level` (
  `kd_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_level`
--

INSERT INTO `tbl_level` (`kd_level`, `nama_level`) VALUES
(1, 'owner'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `kd_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`kd_menu`, `nama_menu`) VALUES
(1, 'owner'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `kd_tiket` varchar(50) DEFAULT NULL,
  `kd_jadwal` varchar(50) DEFAULT NULL,
  `kd_pelanggan` varchar(50) DEFAULT NULL,
  `kd_bank` varchar(50) DEFAULT NULL,
  `asal_order` varchar(200) DEFAULT NULL,
  `nama_order` varchar(50) DEFAULT NULL,
  `tgl_beli_order` varchar(50) DEFAULT NULL,
  `tgl_berangkat_order` varchar(50) DEFAULT NULL,
  `nama_kursi_order` varchar(50) DEFAULT NULL,
  `umur_kursi_order` varchar(50) DEFAULT NULL,
  `no_kursi_order` varchar(50) DEFAULT NULL,
  `no_ktp_order` varchar(50) DEFAULT NULL,
  `no_tlpn_order` varchar(50) DEFAULT NULL,
  `alamat_order` varchar(100) DEFAULT NULL,
  `email_order` varchar(100) DEFAULT NULL,
  `expired_order` varchar(50) DEFAULT NULL,
  `qrcode_order` varchar(100) DEFAULT NULL,
  `status_order` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `kd_order`, `kd_tiket`, `kd_jadwal`, `kd_pelanggan`, `kd_bank`, `asal_order`, `nama_order`, `tgl_beli_order`, `tgl_berangkat_order`, `nama_kursi_order`, `umur_kursi_order`, `no_kursi_order`, `no_ktp_order`, `no_tlpn_order`, `alamat_order`, `email_order`, `expired_order`, `qrcode_order`, `status_order`) VALUES
(47, 'ORD00002', 'T0002202207271', 'J0001', 'PL0001', 'BNK0001', 'TJ001', 'user1', 'Rabu, 27 Juli 2022, 17:37', '2022-07-27', 'User1', '35', '1', '123456789', '081234567654', '--', 'user1@gmail.com', '28-07-2022 17:37:58', 'assets/frontend/upload/qrcode/ORD00002.png', '2'),
(48, 'ORD00003', 'T0003202207283', 'J0004', 'PL0002', 'BNK0001', 'TJ001', 'user2', 'Kamis, 28 Juli 2022, 21:15', '2022-07-28', 'user2', '39', '3', '123456789', '123456789', '----------------', 'user2@gmail.com', '29-07-2022 21:15:22', 'assets/frontend/upload/qrcode/ORD00003.png', '2'),
(49, 'ORD00004', 'T0004202207315', 'J0001', 'PL0003', 'BNK0001', 'TJ001', 'user3', 'Minggu, 31 Juli 2022, 14:16', '2022-07-31', 'nia', '25', '5', '123456789', '081258574885', 'manyeti', 'user3@gmail.com', '01-08-2022 14:16:03', 'assets/frontend/upload/qrcode/ORD00004.png', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `kd_pelanggan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username_pelanggan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password_pelanggan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `no_ktp_pelanggan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_pelanggan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat_pelanggan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email_pelanggan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telpon_pelanggan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `img_pelanggan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `status_pelanggan` int(1) DEFAULT NULL,
  `date_create_pelanggan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`kd_pelanggan`, `username_pelanggan`, `password_pelanggan`, `no_ktp_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `email_pelanggan`, `telpon_pelanggan`, `img_pelanggan`, `status_pelanggan`, `date_create_pelanggan`) VALUES
('PL0001', 'user1', '$2y$10$rAIdrmh9Fd7NXZxcRK4k0uJM6qSG1OOjrqk/JR5Up9L2SOT58p6PC', '', 'user1', '--', 'user1@gmail.com', '081234567654', 'assets/frontend/img/default.png', 1, '1658918163'),
('PL0002', 'user2', '$2y$10$QzbJzUYWipvm1D6.JebjU.Nw3T8q82zGAnfEv8KXmVz0yB.aAccJS', '', 'user2', '----------------', 'user2@gmail.com', '123456789', 'assets/frontend/img/default.png', 1, '1659016829'),
('PL0003', 'user3', '$2y$10$ph38n1lprSjKPt8jjVMn0OHMUIaYWNmeTwylj5d3H7DrBP5xJOFTG', '', 'user3', 'manyeti', 'user3@gmail.com', '081258574885', 'assets/frontend/img/default.png', 1, '1659251666');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tiket`
--

CREATE TABLE `tbl_tiket` (
  `kd_tiket` varchar(50) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `nama_tiket` varchar(50) DEFAULT NULL,
  `kursi_tiket` varchar(50) DEFAULT NULL,
  `umur_tiket` varchar(50) DEFAULT NULL,
  `asal_beli_tiket` varchar(50) DEFAULT NULL,
  `harga_tiket` varchar(50) NOT NULL,
  `etiket_tiket` varchar(100) DEFAULT NULL,
  `status_tiket` varchar(50) NOT NULL,
  `create_tgl_tiket` date DEFAULT NULL,
  `create_admin_tiket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tiket`
--

INSERT INTO `tbl_tiket` (`kd_tiket`, `kd_order`, `nama_tiket`, `kursi_tiket`, `umur_tiket`, `asal_beli_tiket`, `harga_tiket`, `etiket_tiket`, `status_tiket`, `create_tgl_tiket`, `create_admin_tiket`) VALUES
('T0002202207271', 'ORD00002', 'User1', '1', '35 Tahun', 'TJ001', '80000', 'assets/backend/upload/etiket/ORD00002.pdf', '2', '2022-07-27', 'supervisor'),
('T0003202207283', 'ORD00003', 'user2', '3', '39 Tahun', 'TJ001', '70000', 'assets/backend/upload/etiket/ORD00003.pdf', '2', '2022-07-28', 'admin'),
('T0004202207315', 'ORD00004', 'nia', '5', '25 Tahun', 'TJ001', '80000', 'assets/backend/upload/etiket/ORD00004.pdf', '2', '2022-07-31', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tujuan`
--

CREATE TABLE `tbl_tujuan` (
  `kd_tujuan` varchar(50) NOT NULL,
  `kota_tujuan` varchar(50) NOT NULL,
  `nama_terminal_tujuan` varchar(50) NOT NULL,
  `terminal_tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tujuan`
--

INSERT INTO `tbl_tujuan` (`kd_tujuan`, `kota_tujuan`, `nama_terminal_tujuan`, `terminal_tujuan`) VALUES
('TJ001', 'Subang', '', 'Lampu Satu'),
('TJ002', 'PGC', '', 'Point Pusat Cililitan PGC'),
('TJ003', 'Bandung', '', 'Bandung'),
('TJ004', 'Blora', '', 'Point Blora'),
('TJ005', 'BEKASI', '', 'Point Bekasi'),
('TJ006', 'Cikarang', '', 'Lipo Cikarang'),
('TJ007', 'krw', '', 'terminal krw');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indeks untuk tabel `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`kd_bank`);

--
-- Indeks untuk tabel `tbl_bus`
--
ALTER TABLE `tbl_bus`
  ADD PRIMARY KEY (`kd_bus`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD KEY `kd_bus` (`kd_bus`),
  ADD KEY `kd_tujuan` (`kd_tujuan`);

--
-- Indeks untuk tabel `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`kd_konfirmasi`),
  ADD KEY `kode_order` (`kd_order`);

--
-- Indeks untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`kd_level`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`kd_menu`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `kd_jadwal` (`kd_jadwal`),
  ADD KEY `kd_kustomer` (`kd_pelanggan`),
  ADD KEY `kd_tiket` (`kd_tiket`),
  ADD KEY `kd_bank` (`kd_bank`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indeks untuk tabel `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  ADD PRIMARY KEY (`kd_tiket`),
  ADD KEY `kode_order` (`kd_order`);

--
-- Indeks untuk tabel `tbl_tujuan`
--
ALTER TABLE `tbl_tujuan`
  ADD PRIMARY KEY (`kd_tujuan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `kd_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `kd_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
