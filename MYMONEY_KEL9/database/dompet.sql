-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2023 pada 14.32
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
-- Database: `dompet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutag`
--

CREATE TABLE `hutag` (
  `id_hutang` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `total_hutang` text NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status` text NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hutag`
--

INSERT INTO `hutag` (`id_hutang`, `username`, `total_hutang`, `tgl_bayar`, `status`, `catatan`) VALUES
(1, 'fera', '250.000', '2023-06-22', 'lunas', 'cicilan hp'),
(2, 'fera', '1500', '2023-06-02', 'belum', 'kredit emas'),
(4, 'tata', '1500', '2023-05-29', 'belum', 'cicilan hp'),
(5, 'tata', '250000', '2023-06-01', 'belum', 'kredit emas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `saldo` text NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabungan`
--

INSERT INTO `tabungan` (`id_tabungan`, `username`, `jenis`, `saldo`, `tanggal`, `catatan`) VALUES
(1, 'fera', 'tabungan utama', '500000', '2023-06-06', 'kebutuhan sehari hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `jumlah` text NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `kategori` enum('','pendapatan','pengeluaran') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `username`, `keterangan`, `jumlah`, `tanggal`, `kategori`) VALUES
(4, 'fera', 'belanja', '200000', '2023-06-10', 'pengeluaran'),
(25, 'fera', 'gaji', '1250000', '2023-05-30', 'pendapatan'),
(27, 'fera', 'liburan', '500000', '2023-05-01', 'pengeluaran'),
(31, 'tata', 'gaji', '1250000', '2023-06-04', 'pendapatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('fera', 'fera00@gmail.com', 'admin123'),
('qila', 'qila12@gmail.com', 'qila00'),
('tata', 'ata@g', 'ata11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hutag`
--
ALTER TABLE `hutag`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indeks untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hutag`
--
ALTER TABLE `hutag`
  MODIFY `id_hutang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
