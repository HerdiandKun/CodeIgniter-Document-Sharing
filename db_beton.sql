-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Feb 2015 pada 23.17
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_beton`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
  `id_dok` varchar(12) NOT NULL,
  `nama_dok` varchar(100) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `id_tipe` varchar(6) NOT NULL,
  `revisi` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `download`
--

CREATE TABLE IF NOT EXISTS `download` (
`id_download` int(11) NOT NULL,
  `id_dokumen` varchar(12) NOT NULL,
  `nama_dokumen` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `download`
--

INSERT INTO `download` (`id_download`, `id_dokumen`, `nama_dokumen`, `id_user`, `waktu`) VALUES
(1, 'GEN-01 A1R0', 'Profil3.docx', 0, '2015-02-14'),
(2, 'GEN-01 A1R0', 'Profil3.docx', 0, '2015-02-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE IF NOT EXISTS `hak_akses` (
  `id_tipe` varchar(6) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_tipe`, `id_jabatan`) VALUES
('QM', 1),
('QM', 2),
('QM', 3),
('QM', 4),
('QM', 5),
('QM', 6),
('QM', 7),
('QM', 8),
('QM', 9),
('QM', 10),
('QM', 11),
('QM', 12),
('QM', 13),
('QM', 14),
('QM', 15),
('GEN-01', 1),
('GEN-01', 2),
('GEN-01', 4),
('GEN-01', 5),
('GEN-01', 8),
('GEN-01', 11),
('GEN-01', 14),
('GEN-02', 3),
('GEN-02', 4),
('GEN-02', 5),
('GEN-02', 6),
('GEN-02', 7),
('GEN-02', 8),
('GEN-02', 9),
('GEN-02', 10),
('GEN-02', 11),
('GEN-02', 13),
('GEN-02', 14),
('GEN-02', 15),
('PRO-21', 5),
('PRO-21', 8),
('PRO-21', 11),
('PRO-22', 1),
('PRO-22', 4),
('PRO-22', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
`id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'QA'),
(2, 'Direktur Operasional'),
(3, 'Direktur Finance'),
(4, 'Direktur Utama'),
(5, 'Kadept Peng. HRD'),
(6, 'Kadept Finance'),
(7, 'Kadept Pro'),
(8, 'Kepala Operasi'),
(9, 'Kadiv Vin'),
(10, 'Kadiv Purc'),
(11, 'Kadiv WH'),
(12, 'Kadiv HRD'),
(13, 'Ka. QCC'),
(14, 'PM'),
(15, 'SM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_dokumen`
--

CREATE TABLE IF NOT EXISTS `tipe_dokumen` (
  `id_tipe` varchar(6) NOT NULL,
  `tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_dokumen`
--

INSERT INTO `tipe_dokumen` (`id_tipe`, `tipe`) VALUES
('GEN-01', 'uji coba hak akses'),
('GEN-02', 'Manajemen Pemasaran'),
('PRO-21', 'ini tipe baru'),
('PRO-22', 'jdshgjsdf'),
('QM', 'Quality Control');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama`, `id_jabatan`) VALUES
('AMN', 'herdiandkun@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Amanah', 5),
('ARF', 'arief.kalbu49@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Arif Kalbu Adi', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
 ADD PRIMARY KEY (`id_dok`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
 ADD PRIMARY KEY (`id_download`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tipe_dokumen`
--
ALTER TABLE `tipe_dokumen`
 ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
MODIFY `id_download` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
