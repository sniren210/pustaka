-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2019 pada 07.29
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(8) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id_agama` int(2) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_agama`
--

INSERT INTO `tb_agama` (`id_agama`, `agama`) VALUES
(2, 'Islam'),
(3, 'Kristen'),
(4, 'budha'),
(5, 'Katholik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `id_agama` int(2) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `id_kelas`, `id_agama`, `jenis_kelamin`, `hp`, `alamat`, `ket`) VALUES
('ANGG000002', 'Abdullah awokawokk', 4, 3, 'L', '019273981293871', 'tidak tau', 'belum ade keterangan'),
('ANGG000003', 'Ariandi AS', 4, 2, 'L', '085382005325', 'dw', 'fdw'),
('ANGG000004', 'amel', 6, 2, 'Laki-laki', '093029340', 'aoskdqopw', 'KWKWKWKWKW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` char(15) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `id_penerbit` int(3) NOT NULL,
  `id_pengarang` int(3) NOT NULL,
  `no_rak` int(2) NOT NULL,
  `thn_terbit` year(4) NOT NULL,
  `stok` int(3) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `ISBN`, `judul`, `id_kategori`, `id_penerbit`, `id_pengarang`, `no_rak`, `thn_terbit`, `stok`, `ket`) VALUES
('1', '1244242', 'roso', 1, 1, 1, 1, 2017, 20, ''),
('12', '961-097-21-234', 'Simulasi UNBK', 2, 4, 1, 1, 2013, 3, 'Siswa'),
('12345678', '1234', 'test', 1, 1, 1, 1, 2019, 16, ''),
('123458768687', '1244242', 'test', 1, 1, 1, 1, 2012, 18, 'feqfq'),
('3', '23456', 'prakarya', 2, 1, 1, 1, 2019, 7, 'fefqefqefeq'),
('6', '1244242', 'mboh', 3, 1, 1, 1, 2017, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id_denda` int(6) NOT NULL,
  `denda` int(6) NOT NULL,
  `status` enum('A','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_denda`
--

INSERT INTO `tb_denda` (`id_denda`, `denda`, `status`) VALUES
(1, 2500, 'N'),
(3, 3000, 'N'),
(5, 3000, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_buku`
--

CREATE TABLE `tb_detail_buku` (
  `id_detail_buku` int(11) NOT NULL,
  `id_buku` char(15) NOT NULL,
  `no_buku` int(4) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_buku`
--

INSERT INTO `tb_detail_buku` (`id_detail_buku`, `id_buku`, `no_buku`, `status`) VALUES
(4, '12345678', 3, '0'),
(22, '12345678', 1, '1'),
(23, '12345678', 2, '1'),
(24, '12345678', 3, '0'),
(25, '12345678', 4, '1'),
(26, '12345678', 5, '0'),
(27, '12345678', 6, '1'),
(28, '12345678', 7, '0'),
(29, '12345678', 8, '1'),
(30, '12345678', 9, '1'),
(31, '12345678', 10, '1'),
(32, '12345678', 11, '1'),
(33, '12345678', 12, '1'),
(34, '12345678', 13, '1'),
(35, '12345678', 14, '1'),
(36, '123458768687', 12, '1'),
(37, '12', 1, '0'),
(38, '12', 2, '1'),
(39, '12', 3, '0'),
(44, '3', 14, '1'),
(45, '3', 15, '1'),
(46, '3', 16, '1'),
(47, '3', 17, '1'),
(48, '3', 18, '1'),
(49, '3', 19, '1'),
(50, '3', 20, '1'),
(51, '1', 1, '1'),
(52, '1', 2, '1'),
(53, '1', 3, '1'),
(54, '1', 4, '1'),
(55, '1', 5, '1'),
(56, '1', 6, '1'),
(57, '1', 7, '1'),
(58, '1', 8, '1'),
(59, '1', 9, '1'),
(60, '1', 10, '1'),
(61, '1', 11, '1'),
(62, '1', 12, '1'),
(63, '1', 13, '1'),
(64, '1', 14, '1'),
(65, '1', 15, '1'),
(66, '1', 16, '1'),
(67, '1', 17, '1'),
(68, '1', 18, '1'),
(69, '1', 19, '1'),
(70, '1', 20, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pinjam`
--

CREATE TABLE `tb_detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_buku` char(15) NOT NULL,
  `no_buku` int(4) NOT NULL,
  `flag` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_pinjam`
--

INSERT INTO `tb_detail_pinjam` (`id_detail_pinjam`, `id_pinjam`, `id_buku`, `no_buku`, `flag`) VALUES
(75, 71, '12345678', 2, 1),
(76, 72, '12345678', 2, 1),
(79, 72, '12', 3, 1),
(80, 76, '12345678', 1, 1),
(81, 78, '12', 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(3) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Pendidikan Agama Islam'),
(2, 'komik'),
(3, 'cerpen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(2) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(4, '7A'),
(5, '8A'),
(6, '9C'),
(7, '9A'),
(8, '9D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `terlambat` int(2) NOT NULL,
  `id_denda` int(6) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `id_pinjam`, `tgl_dikembalikan`, `terlambat`, `id_denda`, `denda`) VALUES
(191, 71, '2017-05-13', 5, 5, 15000),
(192, 72, '2017-05-22', 1, 5, 3000),
(193, 76, '2017-05-22', 1, 5, 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(75) NOT NULL,
  `stts` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `stts`) VALUES
('14111063', '3792bfd72c8a9071ac790a4b3b60d15a', 'petugas'),
('14111064', 'dd9723ecc8e1583b290e0e93f7fa1198', 'admin'),
('14111101', '2f8639feef43f2964be0cee184dad78c', 'petugas'),
('14121004', 'ef64284c0c38cf5816d7af7c88c1d114', 'admin'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id_penerbit` int(3) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `id_provinsi` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id_penerbit`, `nama_penerbit`, `id_provinsi`) VALUES
(1, 'Gunawan', 1),
(4, 'Andi', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengarang`
--

CREATE TABLE `tb_pengarang` (
  `id_pengarang` int(3) NOT NULL,
  `nama_pengarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengarang`
--

INSERT INTO `tb_pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(1, 'suroso'),
(2, 'Tere Liye'),
(3, 'Graha Mulia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_agama` int(2) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama`, `img`, `jenis_kelamin`, `alamat`, `password`, `id_agama`, `hp`, `ket`) VALUES
('14111063', 'Tri Gunawan', 'LGATSIM9QXWP6O5VZ3J8YB4UKF10DRH7E2NC.jpg', 'L', 'Harnowo', '0806', 2, '019273981293871', ''),
('14111064', 'Ariandi AS', 'DU7COEIKF1RPBS03J48569TZLNWXHGYQVAM2.bmp', 'L', 'Sumatera Selatan', '0318', 2, '085382005325', ''),
('14111101', 'Khoirul Musthofa', 'PJO5UTR2NXLDSC8I7ZYB364AEVM10GWF9QKH.PNG', 'L', 'Pacitan', '0130', 2, '08xxxxxxxxxxxxx', 'tidak ada keterangan\r\n'),
('14121004', 'adito', '', 'L', 'jogja', 'adito', 2, '053xxxx', 'ggg'),
('admin', 'sunu widodo', 'XUE73TBORI8ZN2MYQJF1H64LGAV50PKC9SWD.jpg', 'L', 'bantul', 'admin', 2, '053xxxx', 'testing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_buku` int(4) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `tgl_pinjam`, `id_anggota`, `tgl_kembali`, `total_buku`, `status`) VALUES
(71, '2017-05-14', 'ANGG000003', '2017-05-08', 1, 1),
(72, '2017-05-14', 'ANGG000003', '2017-05-21', 2, 1),
(76, '2017-05-20', 'ANGG000003', '2017-05-21', 1, 1),
(78, '2017-05-21', 'ANGG000003', '2017-05-22', 1, 0),
(79, '2017-05-21', 'ANGG000003', '2017-05-22', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_provinsi` int(2) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_provinsi`, `nama_provinsi`, `kota`) VALUES
(1, 'Sumatera Selatan', 'Palembang'),
(2, 'D.I.Y Yogyakarta', 'Yogya'),
(4, 'Jambi', 'Jambi Kota'),
(6, 'Pekan Baru', 'Riau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rak`
--

CREATE TABLE `tb_rak` (
  `no_rak` int(2) NOT NULL,
  `nama_rak` varchar(50) NOT NULL,
  `id_kategori` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rak`
--

INSERT INTO `tb_rak` (`no_rak`, `nama_rak`, `id_kategori`) VALUES
(1, '200-600', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `test`
--

CREATE TABLE `test` (
  `kode` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `mboh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `test`
--

INSERT INTO `test` (`kode`, `nama`, `mboh`) VALUES
('', 'ari', ''),
('Kode000001', 'ari2', ''),
('Kode000002', 'ari2', ''),
('Kode000003', 'Ariandi AS', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `roleId` int(1) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `roleId`, `email`, `gambar`) VALUES
(2, 'user', '$2y$10$vwQjIia/V9PleTJOL7Lim.1dpYz74nP3ijsih26VbQWTMUhPLhcPW', 0, '', ''),
(3, 'admin', '$2y$10$UmaKb4Aub2y1RHV4V1b9oOQAGni4AyAmUrZsWUxYcX8ytygZQUpCu', 1, '', ''),
(4, 'sniren', '$2y$10$KR63POGzUHV9cBs656UhaevA58WSbf63r9FxIfb9d4jfp.5TQJE.y', 0, 'sniren', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_admin` (`id_admin`,`password`,`nama`,`alamat`,`no_hp`),
  ADD KEY `id_admin_2` (`id_admin`,`password`,`nama`,`alamat`,`no_hp`,`img`);

--
-- Indeks untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_pengarang` (`id_pengarang`),
  ADD KEY `no_rak` (`no_rak`),
  ADD KEY `id_buku` (`id_buku`,`ISBN`,`judul`,`id_kategori`,`id_penerbit`,`id_pengarang`,`no_rak`,`thn_terbit`,`stok`);

--
-- Indeks untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indeks untuk tabel `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  ADD KEY `id_detail_buku` (`id_detail_buku`,`id_buku`,`no_buku`,`status`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD KEY `id_anggota` (`id_pinjam`),
  ADD KEY `id_detail_pinjam` (`id_detail_pinjam`,`id_pinjam`,`id_buku`,`no_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_detail` (`id_pinjam`),
  ADD KEY `id_kembali` (`id_kembali`,`id_pinjam`,`tgl_dikembalikan`,`terlambat`,`id_denda`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`,`password`,`stts`);

--
-- Indeks untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`id_penerbit`),
  ADD KEY `id_penerbit` (`id_penerbit`,`nama_penerbit`,`id_provinsi`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indeks untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_detail` (`tgl_kembali`),
  ADD KEY `id_buku` (`id_anggota`),
  ADD KEY `id_pinjam` (`id_pinjam`,`tgl_pinjam`,`id_anggota`,`tgl_kembali`,`total_buku`);

--
-- Indeks untuk tabel `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`no_rak`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id_agama` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id_denda` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  MODIFY `id_detail_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  MODIFY `id_penerbit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  MODIFY `id_pengarang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `id_provinsi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `no_rak` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `tb_agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `tb_penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_3` FOREIGN KEY (`id_pengarang`) REFERENCES `tb_pengarang` (`id_pengarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_4` FOREIGN KEY (`no_rak`) REFERENCES `tb_rak` (`no_rak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  ADD CONSTRAINT `tb_detail_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD CONSTRAINT `tb_kembali_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD CONSTRAINT `tb_penerbit_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `tb_provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `tb_agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD CONSTRAINT `tb_pinjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD CONSTRAINT `tb_rak_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
