-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2021 pada 05.53
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vaksin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `rumah_sakit` varchar(255) NOT NULL DEFAULT 'Tidak_Ada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `rumah_sakit`) VALUES
(1, 'Khurun', '12345', 'dr.Khurun AM S.pog', 'RSI Banjarnegara'),
(3, 'Putra', '123123', 'dr. Putra, S.pog', 'Rumah Sakit Umum Margono');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bener_admin`
--

CREATE TABLE `bener_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bener_admin`
--

INSERT INTO `bener_admin` (`id`, `username`, `nama`, `password`) VALUES
(1, 'Superadmin', 'superadmin', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(255) DEFAULT 'Kosong',
  `alamat` varchar(255) DEFAULT 'Kosong',
  `pekerjaan` varchar(255) DEFAULT 'Kosong',
  `status` varchar(255) DEFAULT 'Belum Vaksin',
  `waktu_daftar` date NOT NULL,
  `jenis` varchar(255) NOT NULL DEFAULT 'Tidak Ada',
  `tgl_vaksin` date DEFAULT NULL,
  `panggil` varchar(255) NOT NULL,
  `dokter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nik`, `password`, `nama`, `tgl_lahir`, `jk`, `alamat`, `pekerjaan`, `status`, `waktu_daftar`, `jenis`, `tgl_vaksin`, `panggil`, `dokter`) VALUES
(4, 156, '1234567', 'Dwiki', '1999-11-11', 'Laki-Laki', 'Kalimantan', 'Mahasiswa', 'Belum Vaksin', '2021-04-18', 'Tidak Ada', '0000-00-00', 'Belum Dipanggil', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_all`
--

CREATE TABLE `user_all` (
  `id` int(11) NOT NULL,
  `nik` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(255) DEFAULT 'Kosong',
  `alamat` varchar(255) DEFAULT 'Kosong',
  `pekerjaan` varchar(255) DEFAULT 'Kosong',
  `status` varchar(255) DEFAULT 'Belum Vaksin',
  `waktu_daftar` date NOT NULL,
  `jenis` varchar(255) NOT NULL DEFAULT 'Tidak Ada',
  `tgl_vaksin` date DEFAULT NULL,
  `panggil` varchar(255) NOT NULL,
  `dokter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_all`
--

INSERT INTO `user_all` (`id`, `nik`, `password`, `nama`, `tgl_lahir`, `jk`, `alamat`, `pekerjaan`, `status`, `waktu_daftar`, `jenis`, `tgl_vaksin`, `panggil`, `dokter`) VALUES
(7, 178, '123456', 'Janur SP', '1999-01-04', 'Laki-Laki', 'PWT', 'nganggur', 'Sudah Vaksin', '2021-04-18', 'SINOVAC', '2021-04-18', 'Sudah Dipanggil', 1),
(9, 156, '1234567', 'Dwiki', '1999-11-11', 'Laki-Laki', 'Kalimantan', 'Mahasiswa', 'Belum Vaksin', '2021-04-18', 'Tidak Ada', '0000-00-00', 'Belum Dipanggil', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `bener_admin`
--
ALTER TABLE `bener_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter` (`dokter`);

--
-- Indeks untuk tabel `user_all`
--
ALTER TABLE `user_all`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter` (`dokter`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bener_admin`
--
ALTER TABLE `bener_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_all`
--
ALTER TABLE `user_all`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `dokter` FOREIGN KEY (`dokter`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
