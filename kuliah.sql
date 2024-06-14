-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Jun 2024 pada 08.34
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id` int NOT NULL,
  `mahasiswa_npm` char(13) NOT NULL,
  `matakuliah_kodemk` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id`, `mahasiswa_npm`, `matakuliah_kodemk`) VALUES
(8, '29120001', 'MK01'),
(9, '29120002', 'MK02'),
(10, '29120003', 'MK01'),
(11, '29120004', 'MK03'),
(12, '29120005', 'MK04'),
(13, '29120006', 'MK01'),
(14, '29120007', 'MK01'),
(15, '29120008', 'MK02'),
(16, '29120009', 'MK02'),
(17, '29120010', 'MK03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` char(13) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `jurusan`, `alamat`) VALUES
('29120001', 'Siska Putri', 'Sistem Informasi', 'Malang'),
('29120002', 'Ujang Aziz', 'Teknik Informatika', 'Sumedang'),
('29120003', 'Veronica Setyano', 'Teknik Informatika', 'Padang'),
('29120004', 'Rizka Nurmala Sari', 'Sistem Informasi', 'Cikarang'),
('29120005', 'Eren Putra', 'Teknik Informatika', 'Tegal'),
('29120006', 'Putra Abdul Rachman', 'Sistem Informasi', 'Brebes'),
('29120007', 'Rahmat Andriyadi', 'Teknik Informatika', 'Indramayu'),
('29120008', 'Ayu Puspitasari', 'Teknik Informatika', 'Bogor'),
('29120009', 'Putri Ayuni', 'Teknik Informatika', 'Tambun'),
('29120010', 'Andri Muhammad', 'Teknik Informatika', 'Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kodemk` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_sks` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kodemk`, `nama`, `jumlah_sks`) VALUES
('MK01', 'Basis Data', 3),
('MK02', 'Pemrograman Berbasis Web', 3),
('MK03', 'Algoritma dan Struktur Data', 3),
('MK04', 'Kajian Jurnal Informatika', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(3, 'Malik@gmail.com', '$2y$10$JGeTtMIB14iPunsjlnAtJOCFiUuVVbXtBBbnyxpHc.wx2f6jgCGnG'),
(4, 'maliks@gmail.com', '$2y$10$nFgMumauqeKfNyqOtsQ9qOttJBxJgxhPKt9wYeUkKIt8UR1zYDymW'),
(5, 'maliksyafii426@gmail.com', '$2y$10$cL5bGpJVZ1xQp0K5Yohst.9suxg46Bfq/5AIxCjEDOk5LxUIq6BT.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiwa` (`mahasiswa_npm`),
  ADD KEY `matakuliah` (`matakuliah_kodemk`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kodemk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`mahasiswa_npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`matakuliah_kodemk`) REFERENCES `matakuliah` (`kodemk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
