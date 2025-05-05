-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2025 pada 07.49
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_produk`
--

INSERT INTO `jenis_produk` (`id`, `nama`) VALUES
(3, 'Elektronik'),
(4, 'Makanan'),
(5, 'Minuman'),
(6, 'Sembako');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_tokoh`
--

CREATE TABLE `kategori_tokoh` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_tokoh`
--

INSERT INTO `kategori_tokoh` (`id`, `nama`) VALUES
(2, 'Pelanggan Reguler'),
(3, 'Pelanggan Baru'),
(4, 'Pelanggan VIP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `nama` varchar(45) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `min_stok` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `jenis_produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `harga`, `stok`, `rating`, `min_stok`, `deskripsi`, `jenis_produk_id`) VALUES
(4, 'E001', 'TV 24 Inch', 2500000, 40, 5, 5, 'TV LED', 3),
(5, 'M001', 'Coca-cola', 7000, 100, 3, 20, 'Minuman cola segar', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_tokoh` varchar(45) DEFAULT NULL,
  `komentar` varchar(200) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `produk_id` int(11) NOT NULL,
  `kategori_tokoh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `tanggal`, `nama_tokoh`, `komentar`, `rating`, `produk_id`, `kategori_tokoh_id`) VALUES
(2, '2025-05-01', 'Udin', 'TV nya retak saat barang sampai, ga respect banget sama kurirnya!!!!!', 1, 4, 2),
(3, '2025-05-01', 'Raka', 'Seger wir minumannya', 5, 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_lengkap` varchar(45) DEFAULT NULL,
  `role` enum('Admin') DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`, `role`) VALUES
(1, 'RakaDr', '$2y$10$N4p5Y3zy3.2ddx0mhj0M.ebSUXOUQIdNgut2c2oqTyBYe4ivMLpMS', 'Raka Dwi Randika', 'Admin'),
(4, 'Yanti Elnaya', '$2y$10$YrU..mmm/xu1RMkxjp.fNe41q8HNKgYY3VfkdV1I81/bYhwYXHj4u', 'Yanti Elnaya Putri', 'Admin'),
(5, 'Nur Indah', '$2y$10$N4p5Y3zy3.2ddx0mhj0M.ebSUXOUQIdNgut2c2oqTyBYe4ivMLpMS', 'Nur Indah', 'Admin'),
(6, 'Al Hijir', '$2y$10$N4p5Y3zy3.2ddx0mhj0M.ebSUXOUQIdNgut2c2oqTyBYe4ivMLpMS', 'Al Hijir', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_tokoh`
--
ALTER TABLE `kategori_tokoh`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produk_jenis_produk` (`jenis_produk_id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_testimoni_produk1` (`produk_id`),
  ADD KEY `fk_testimoni_kategori_tokoh1` (`kategori_tokoh_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori_tokoh`
--
ALTER TABLE `kategori_tokoh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_jenis_produk` FOREIGN KEY (`jenis_produk_id`) REFERENCES `jenis_produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `fk_testimoni_kategori_tokoh1` FOREIGN KEY (`kategori_tokoh_id`) REFERENCES `kategori_tokoh` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_testimoni_produk1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
