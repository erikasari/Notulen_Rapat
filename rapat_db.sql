-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2021 pada 07.17
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapat_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_jenis`
--

CREATE TABLE `mst_jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis_rapat` text NOT NULL,
  `created_jenis` date NOT NULL,
  `status_jenis` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_jenis`
--

INSERT INTO `mst_jenis` (`id_jenis`, `jenis_rapat`, `created_jenis`, `status_jenis`) VALUES
(1, 'Rapat Tinggi Manajemen', '2020-05-30', 1),
(2, 'Rapat Pemasaran', '2020-05-30', 1),
(3, 'Rapat HRD', '2020-06-13', 1),
(4, 'Rapat Keuangan', '2020-06-13', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_peserta`
--

CREATE TABLE `mst_peserta` (
  `id_peserta` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` int(13) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `image` text NOT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_peserta`
--

INSERT INTO `mst_peserta` (`id_peserta`, `username`, `nama`, `email`, `telepon`, `password`, `date_created`, `image`, `is_active`) VALUES
(1, 'Erika Sari', 'er', 'erika@gmail.com', 2147483647, '12345', '0000-00-00', '', 1),
(2, 'Noviar Graha', 'supe', 'noviargraha@gmail.com', 888888888, 'noviar', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_user`
--

CREATE TABLE `mst_user` (
  `id_user` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL,
  `date_created` date NOT NULL,
  `image` text NOT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_user`
--

INSERT INTO `mst_user` (`id_user`, `nama`, `email`, `password`, `level`, `date_created`, `image`, `is_active`) VALUES
(15, 'Erika Sari', 'admin@gmail.com', '$2y$10$1CGoPtKRjQXU.kjmLiIoueroxm6TSleJ8NjyIKTKeDzOqvmyJcYwW', 'Admin', '2019-10-02', 'bg_register.jpg', 1),
(16, 'Erika Sari', 'user@gmail.com', '$2y$10$NGmQodWSoUG0G/OILB/i9.MmegCLTLi0JjsA5VS/goZI3hK64mefm', 'User', '2019-10-02', 'bg_register.jpg', 1),
(17, 'Erika Sari', 'erikasari043@gmail.com', 'erikasari', '', '2020-12-22', 'bg_register.jpg', 0),
(18, 'Erika Sari', 'noviargraha@gmail.com', '$2y$10$TfmVJMmdTbY0IKMeoqKmbOUcLIAQb8EiBA8kjzHUYu4QQGBOfjbma', 'User', '2020-12-26', 'bg_register.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notulen`
--

CREATE TABLE `tb_notulen` (
  `id_notulen` int(11) NOT NULL,
  `rapat_id_not` int(11) NOT NULL,
  `rapat_kode_not` text NOT NULL,
  `tuj_rapat` text NOT NULL,
  `hasil_rapat` longtext NOT NULL,
  `pembuat_notulen` text NOT NULL,
  `jabatan_notulen` text NOT NULL,
  `divisi_notulen` text NOT NULL,
  `nik_notulen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_notulen`
--

INSERT INTO `tb_notulen` (`id_notulen`, `rapat_id_not`, `rapat_kode_not`, `tuj_rapat`, `hasil_rapat`, `pembuat_notulen`, `jabatan_notulen`, `divisi_notulen`, `nik_notulen`) VALUES
(5, 1, 'RAP/002/001', 'Rapat Laporan Bulanan', '<p xss=removed><span xss=removed>Hari/tanggal : Minggu, 12 April 2018</span><span xss=removed><br></span><span xss=removed>Waktu : 08.00 WIB – 10.00 WIB</span><span xss=removed><br></span><span xss=removed>Tempat : Aula Rapat Gedung Utama Forum Nuklir Jawa Barat</span><span xss=removed><br></span><span xss=removed>Pemimpin Rapat : Fakhri Hasyim Abdullah</span><span xss=removed><br></span><span xss=removed>Jumlah Peserta : Dua Puluh Orang</span><span xss=removed><br></span><span xss=removed>Materi Rapat : Persiapan Sosialisasi Pemanfaatan Nuklir Untuk Kesejahteraan Masyarakat di Jawa Barat</span></p><p xss=removed><span xss=removed>Hasil Keputusan Rapat :</span></p><p xss=removed><span xss=removed>Pada hari Minggu, 12 April 2018 telah dilaksanakan rapat di aula rapat gedung utama forum nuklir Jawa Barat dan telah dibentuk susunan panitia sebagai berikut :</span></p><ol xss=removed><li xss=removed><span xss=removed>Ketua Pelaksana : Adli Muhaiminuk Minin</span></li><li xss=removed><span xss=removed>Wakil Ketua Panitia : Ari Nur Cintia Bela</span></li><li xss=removed><span xss=removed>Sekretaris : Ara Nur Cintia Bela</span></li><li xss=removed><span xss=removed>Bendahara : Nur Jannati Muslimina</span></li><li xss=removed><span xss=removed>Seksi Acara : Muna Waroh, Birwil Agna Muhsin, Rahmah Fitri, Delavia Nova, Kurniasari</span></li><li xss=removed><span xss=removed>Seksi Konsumsi : Robi Pranata, Priyoga Pratama, Niko Muhsinin, Andri Noverman, Killua</span></li><li xss=removed><span xss=removed>Seksi Dokumentasi : Gin Fendiati, Maherzain, Kurniasari Anggrilita, Putra Wahana,</span></li><li xss=removed><span xss=removed>Minan Muslimin</span></li><li xss=removed><span xss=removed>Seksi Hubungan Masyarakat : Dewi Minasari, Loli Agna, Winda Sari, Rara Kurniwati, Tutui Alawiyah</span></li></ol><p xss=removed><span xss=removed>Dengan susunan acara sebagai berikut :</span></p><ol xss=removed><li xss=removed><span xss=removed>Pembukaan</span></li><li xss=removed><span xss=removed>Pembacaan do’a</span></li><li xss=removed><span xss=removed>Sosialisasi nuklir untuk kesejahteraan masyarakat</span></li><li xss=removed><span xss=removed>Penanaman tanaman padi yang memanfaatkan teknologi nuklir</span></li><li xss=removed><span xss=removed>Hiburan dan permainan</span></li><li xss=removed><span xss=removed>Makan bersama</span></li><li xss=removed><span xss=removed>Penutup</span></li></ol>', 'Harjo Winangun', 'Staf', 'Gudang', '4321234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id_peserta` int(11) NOT NULL,
  `rapat_id` int(11) NOT NULL,
  `rapat_kode` text NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `nama_samar` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `divisi` text NOT NULL,
  `jabatan` text NOT NULL,
  `status_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `rapat_id`, `rapat_kode`, `nama_peserta`, `nama_samar`, `no_hp`, `email`, `password`, `divisi`, `jabatan`, `status_peserta`) VALUES
(2, 2, 'RAP/002/003', 'Samuel', '', '1234569877', 'samuel@gmail.com', '', 'Akunting', 'STAF Akunting', 1),
(3, 1, 'RAP/002/001', 'Donny Kurniawan', '', '2147483647', '', '', 'Gudang', 'Staf Gudang', 1),
(5, 1, 'RAP/002/001', 'Audi Van Roy', '', '2147483647', '', '', 'Logistik', 'Staf Logistik', 1),
(6, 2, 'RAP/002/003', 'Si Cantik Jembatan Kuning', '', '242353', '', '', '45345', 'Admin', 1),
(8, 3, 'RAP/002/004', 'Harjo Kusuma', '', '2147483647', '', '', 'Pembelian', 'Kabag Pembelian', 1),
(9, 3, 'RAP/002/004', 'Salman', '', '82345667', 'salman@gmail.com', '', 'keuangan', 'kabag penjualan', 1),
(10, 0, '', 'Erika Sari', 'er', '2147483647', 'erika@gmail.com', '12345', '', '', 0),
(11, 0, '', 'Noviar Graha', 'noo', '085654321778', 'noviargraha@gmail.com', '12345', '', '', 0),
(12, 0, '', 'adadeh', 'ada', '089764534223', 'ada@gmail.com', '12345', '', '', 0),
(13, 3, 'RAP/002/004', 'Erika Sari', '', '0854325567', 'erikasari@gmail.com', '', 'keuangan', 'MAHASISWA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rapat`
--

CREATE TABLE `tb_rapat` (
  `id_rapat` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `kode_rapat` text NOT NULL,
  `tgl_rapat` date NOT NULL,
  `tema_rapat` text NOT NULL,
  `nama_rapat` text NOT NULL,
  `pengisi_rapat` text NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `status_rapat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rapat`
--

INSERT INTO `tb_rapat` (`id_rapat`, `jenis_id`, `kode_rapat`, `tgl_rapat`, `tema_rapat`, `nama_rapat`, `pengisi_rapat`, `jam_mulai`, `jam_selesai`, `status_rapat`) VALUES
(1, 1, 'RAP/002/001', '2020-02-09', 'Laporan Keuangan dan kinerja tiap divisi', 'Rapat Laporan Bulanan', 'Drs. Majawan', '09:00:00', '11:00:00', 0),
(2, 2, 'RAP/002/003', '2020-03-11', 'Bagaimana mengembangkan dan promosi', 'Rapat Pengembangan Usaha', 'Maijan, SE, MM', '09:09:00', '12:00:00', 0),
(3, 2, 'RAP/002/004', '2020-05-12', 'Bagaimana membuat kinerja yang baik', 'Rapat Rutin Laporan Kinerja', 'Harjo Winangun, S.Pd, M.Pd', '09:00:00', '12:00:00', 2),
(4, 3, 'RAP/004/004', '2020-05-05', 'Bagaimana merekrut karyawan dan melihat skill calon karyawan baru', 'Laporan Perekrutan Karyawan Baru', 'Drs. Suharno Maringis', '10:00:00', '13:00:00', 1),
(5, 4, 'RAP/0345/123', '2020-04-21', '-', 'Laporan Keuangan Divisi', 'Hendro Lukito, SE', '09:00:00', '12:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload_foto`
--

CREATE TABLE `upload_foto` (
  `id_file` int(11) NOT NULL,
  `rapat_id_pict` int(11) NOT NULL,
  `rapat_kode_pict` text NOT NULL,
  `file1` varchar(250) NOT NULL,
  `file2` varchar(250) NOT NULL,
  `file3` varchar(250) NOT NULL,
  `file4` varchar(250) NOT NULL,
  `file5` varchar(250) NOT NULL,
  `file6` varchar(250) NOT NULL,
  `file7` varchar(250) NOT NULL,
  `file8` varchar(250) NOT NULL,
  `file9` varchar(250) NOT NULL,
  `file10` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `upload_foto`
--

INSERT INTO `upload_foto` (`id_file`, `rapat_id_pict`, `rapat_kode_pict`, `file1`, `file2`, `file3`, `file4`, `file5`, `file6`, `file7`, `file8`, `file9`, `file10`) VALUES
(2, 1, 'RAP/002/001', 'asuransi_(2)1.jpg', 'asuransi1.jpg', 'avatar1.png', 'avatar21.png', 'avatar31.png', 'avatar041.png', 'avatar51.png', 'default_idcard1.jpg', 'default-user-profile-image-png-61.png', 'download1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload_foto_sat`
--

CREATE TABLE `upload_foto_sat` (
  `id_foto` int(11) NOT NULL,
  `rapat_id_gbr` int(11) NOT NULL,
  `rapat_kode_gbr` text NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `upload_foto_sat`
--

INSERT INTO `upload_foto_sat` (`id_foto`, `rapat_id_gbr`, `rapat_kode_gbr`, `gambar`) VALUES
(49, 1, 'RAP/002/001', 'user4-128x1281.jpg'),
(50, 1, 'RAP/002/001', 'user5-128x128.jpg'),
(51, 1, 'RAP/002/001', 'user6-128x128.jpg'),
(52, 2, 'RAP/002/003', 'user6-128x1281.jpg'),
(53, 2, 'RAP/002/003', 'user7-128x128.jpg'),
(54, 2, 'RAP/002/003', 'user8-128x128.jpg'),
(57, 2, 'RAP/002/003', 'happyfacemusic.jpg'),
(58, 2, 'RAP/002/003', 'image2.jpg'),
(63, 1, 'RAP/002/001', 'user3-128x128.jpg'),
(64, 1, 'RAP/002/001', 'user7-128x1281.jpg'),
(66, 2, 'RAP/002/003', 'images3.jpg'),
(67, 2, 'RAP/002/003', 'images5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mst_jenis`
--
ALTER TABLE `mst_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `mst_peserta`
--
ALTER TABLE `mst_peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD UNIQUE KEY `password` (`id_peserta`);

--
-- Indeks untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_notulen`
--
ALTER TABLE `tb_notulen`
  ADD PRIMARY KEY (`id_notulen`);

--
-- Indeks untuk tabel `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indeks untuk tabel `tb_rapat`
--
ALTER TABLE `tb_rapat`
  ADD PRIMARY KEY (`id_rapat`);

--
-- Indeks untuk tabel `upload_foto`
--
ALTER TABLE `upload_foto`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `upload_foto_sat`
--
ALTER TABLE `upload_foto_sat`
  ADD PRIMARY KEY (`id_foto`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mst_jenis`
--
ALTER TABLE `mst_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mst_peserta`
--
ALTER TABLE `mst_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_notulen`
--
ALTER TABLE `tb_notulen`
  MODIFY `id_notulen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_rapat`
--
ALTER TABLE `tb_rapat`
  MODIFY `id_rapat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `upload_foto`
--
ALTER TABLE `upload_foto`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `upload_foto_sat`
--
ALTER TABLE `upload_foto_sat`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
