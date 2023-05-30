-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2023 pada 19.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gacoan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pemesanan`
--

CREATE TABLE `tb_detail_pemesanan` (
  `id_detail_pemesanan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_detail_pemesanan`
--

INSERT INTO `tb_detail_pemesanan` (`id_detail_pemesanan`, `id_pemesanan`, `id_menu`, `jumlah`) VALUES
(33, 17, 3, 1),
(34, 18, 3, 2),
(35, 19, 3, 1),
(36, 19, 19, 1),
(37, 20, 3, 1),
(38, 20, 4, 1),
(39, 21, 3, 1),
(40, 21, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_interface`
--

CREATE TABLE `tb_interface` (
  `id_interface` int(11) NOT NULL,
  `nama_interface` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_interface`
--

INSERT INTO `tb_interface` (`id_interface`, `nama_interface`) VALUES
(1, 'Beranda'),
(2, 'User'),
(3, 'menu'),
(4, 'pemesanan'),
(5, 'pembayaran'),
(6, 'levelmenu'),
(7, 'Kasir'),
(8, 'laporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Kasir'),
(3, 'Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level_menu`
--

CREATE TABLE `tb_level_menu` (
  `id_level_menu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_interface` int(11) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_level_menu`
--

INSERT INTO `tb_level_menu` (`id_level_menu`, `id_level`, `id_interface`, `status`) VALUES
(1, 1, 1, 'aktif'),
(2, 1, 2, 'aktif'),
(3, 1, 3, 'aktif'),
(4, 1, 4, 'aktif'),
(5, 1, 5, 'aktif'),
(6, 1, 6, 'aktif'),
(7, 2, 1, 'aktif'),
(8, 2, 2, 'aktif'),
(9, 2, 3, 'aktif'),
(10, 2, 4, 'tidak'),
(11, 2, 5, 'tidak'),
(12, 2, 6, 'tidak'),
(13, 3, 1, 'aktif'),
(14, 3, 2, 'tidak'),
(15, 3, 3, 'tidak'),
(16, 3, 4, 'aktif'),
(17, 3, 5, 'aktif'),
(18, 3, 6, 'tidak'),
(19, 1, 7, 'tidak'),
(20, 2, 7, 'aktif'),
(21, 3, 7, 'tidak'),
(22, 1, 8, 'aktif'),
(23, 2, 8, 'aktif'),
(24, 3, 8, 'tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('tersedia','tidak','','') NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `harga`, `status`, `gambar`) VALUES
(1, 'Mie Angel', 10000, 'tidak', '1684738597_b3634451b233b5f926f8.jpg'),
(3, 'Mie Iblis', 15000, 'tersedia', 'mie_iblis.jpg'),
(4, 'Pangsit Goreng', 10000, 'tersedia', '1684241345_399e0d964891f6fdb5ac.jpg'),
(5, 'Dimsum', 10000, 'tersedia', '1684242357_55b3c32efa37dcc5dc06.jpg'),
(19, 'Seblak', 12000, 'tersedia', '1685273775_35979e5e3fee73ac04a4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` enum('sudah bayar','belum bayar','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_user`, `tanggal_pemesanan`, `jumlah`, `total_harga`, `status`) VALUES
(17, 1, '2023-05-27 00:00:00', 1, 10000, 'sudah bayar'),
(18, 1, '2023-05-28 00:00:00', 2, 30000, 'sudah bayar'),
(19, 1, '2023-05-28 00:00:00', 2, 27000, 'sudah bayar'),
(20, 3, '2023-05-28 00:00:00', 2, 25000, 'sudah bayar'),
(21, 1, '2023-05-28 23:55:51', 2, 25000, 'sudah bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'admin', 'Admin', 1),
(2, 'putra', '123', 'Putra', 2),
(3, 'meja1', '123', 'Meja 1', 3),
(4, 'meja2', '123', 'Meja 2', 3),
(5, 'meja3', '123', 'Meja 3', 3),
(7, 'meja5', '1234', 'Meja 5', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_detail_pemesanan`
--
ALTER TABLE `tb_detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `tb_interface`
--
ALTER TABLE `tb_interface`
  ADD PRIMARY KEY (`id_interface`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_level_menu`
--
ALTER TABLE `tb_level_menu`
  ADD PRIMARY KEY (`id_level_menu`),
  ADD KEY `id_user` (`id_level`),
  ADD KEY `id_level` (`id_interface`);

--
-- Indeks untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_user` (`id_pemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- Indeks untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_detail_pemesanan`
--
ALTER TABLE `tb_detail_pemesanan`
  MODIFY `id_detail_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tb_interface`
--
ALTER TABLE `tb_interface`
  MODIFY `id_interface` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_level_menu`
--
ALTER TABLE `tb_level_menu`
  MODIFY `id_level_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_pemesanan`
--
ALTER TABLE `tb_detail_pemesanan`
  ADD CONSTRAINT `tb_detail_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `tb_pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `tb_detail_pemesanan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `tb_menu` (`id_menu`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_level_menu`
--
ALTER TABLE `tb_level_menu`
  ADD CONSTRAINT `tb_level_menu_ibfk_2` FOREIGN KEY (`id_interface`) REFERENCES `tb_interface` (`id_interface`),
  ADD CONSTRAINT `tb_level_menu_ibfk_3` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `tb_pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_pembayaran_ibfk_3` FOREIGN KEY (`id_kasir`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD CONSTRAINT `tb_pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
