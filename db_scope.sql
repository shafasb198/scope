-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2024 at 10:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scope`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('Siswa','Guru','Admin') NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `username`, `password`, `status`, `foto`) VALUES
('SCP0001', 'shafa198', 'sapa192816', 'Guru', 'Shafa.png'),
('SCP0002', 'taylorswift', '123', 'Siswa', 'taylor.jpg'),
('SCP0003', 'zaynmalik', '123', 'Siswa', 'zayn.jpeg'),
('SCP0004', 'bellahadid', '123', 'Siswa', 'bella.jpeg'),
('SCP0005', 'arianagrande', '123', 'Siswa', 'ariana.jpg'),
('SCP0006', 'meghantrainor', '123', 'Siswa', 'meghantrainor.png'),
('SCP0007', 'vernonchwe', '123', 'Siswa', 'vernon.jpg'),
('SCP0008', 'aaaa', 'aaa', 'Siswa', 'lariii.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_balasanproyek`
--

CREATE TABLE `tb_balasanproyek` (
  `id_balasanproyek` varchar(10) NOT NULL,
  `id_komentarproyek` varchar(10) NOT NULL,
  `isi_balasanproyek` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `id_guru` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_balasantugas`
--

CREATE TABLE `tb_balasantugas` (
  `id_balasantugas` varchar(10) NOT NULL,
  `isi_balasantugas` varchar(200) NOT NULL,
  `id_komentartugas` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_guru` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_balasantugas`
--

INSERT INTO `tb_balasantugas` (`id_balasantugas`, `isi_balasantugas`, `id_komentartugas`, `tanggal`, `id_guru`) VALUES
('BLT0001', 'jawaban', 'KMT0001', '2024-03-17', 'GRU001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` varchar(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `id_akun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `id_akun`) VALUES
('GRU001', '12345678', 'Shafa Salsabila', 'SCP0001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id_jawaban` varchar(10) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `id_soal` varchar(10) NOT NULL,
  `id_opsi` varchar(10) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id_jawaban`, `id_siswa`, `id_soal`, `id_opsi`, `poin`) VALUES
('JAW0001', 'SIS0001', 'SOA0001', 'OPS0001', 20),
('JAW0002', 'SIS0001', 'SOA0002', 'OPS0006', 20),
('JAW0003', 'SIS0001', 'SOA0003', 'OPS0011', 20),
('JAW0004', 'SIS0001', 'SOA0004', 'OPS0016', 20),
('JAW0005', 'SIS0001', 'SOA0005', 'OPS0022', 0),
('JAW0006', 'SIS0006', 'SOA0001', 'OPS0001', 20),
('JAW0007', 'SIS0006', 'SOA0002', 'OPS0006', 20),
('JAW0008', 'SIS0006', 'SOA0003', 'OPS0011', 20),
('JAW0009', 'SIS0006', 'SOA0004', 'OPS0017', 0),
('JAW0010', 'SIS0006', 'SOA0005', 'OPS0021', 20),
('JAW0011', 'SIS0005', 'SOA0001', 'OPS0001', 20),
('JAW0012', 'SIS0005', 'SOA0002', 'OPS0006', 20),
('JAW0013', 'SIS0005', 'SOA0003', 'OPS0011', 20),
('JAW0014', 'SIS0005', 'SOA0004', 'OPS0018', 0),
('JAW0015', 'SIS0005', 'SOA0005', 'OPS0021', 20),
('JAW0016', 'SIS0001', 'SOA0016', 'OPS0076', 20),
('JAW0017', 'SIS0001', 'SOA0017', 'OPS0081', 20),
('JAW0018', 'SIS0001', 'SOA0018', 'OPS0086', 20),
('JAW0019', 'SIS0001', 'SOA0019', 'OPS0091', 20),
('JAW0020', 'SIS0001', 'SOA0020', 'OPS0097', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelompok`
--

CREATE TABLE `tb_kelompok` (
  `id_kelompok` varchar(10) NOT NULL,
  `nama_kelompok` varchar(50) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `id_proyek` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelompok`
--

INSERT INTO `tb_kelompok` (`id_kelompok`, `nama_kelompok`, `jumlah_anggota`, `id_proyek`) VALUES
('KLP0001', 'Kelompok 1', 3, 'PRO0001'),
('KLP0002', 'Kelompok 2', 3, 'PRO0001'),
('KLP0003', 'sss', 2, 'PRO0002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelompoksiswa`
--

CREATE TABLE `tb_kelompoksiswa` (
  `id_kelompoksiswa` varchar(10) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `id_kelompok` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelompoksiswa`
--

INSERT INTO `tb_kelompoksiswa` (`id_kelompoksiswa`, `id_siswa`, `id_kelompok`) VALUES
('KSW0001', 'SIS0001', 'KLP0001'),
('KSW0002', 'SIS0002', 'KLP0001'),
('KSW0003', 'SIS0003', 'KLP0001'),
('KSW0004', 'SIS0004', 'KLP0002'),
('KSW0005', 'SIS0005', 'KLP0002'),
('KSW0006', 'SIS0006', 'KLP0002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ketua`
--

CREATE TABLE `tb_ketua` (
  `id_ketua` varchar(10) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `id_kelompok` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ketua`
--

INSERT INTO `tb_ketua` (`id_ketua`, `id_siswa`, `id_kelompok`) VALUES
('KET0001', 'SIS0001', 'KLP0001'),
('KET0002', 'SIS0004', 'KLP0002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ketuntasanmateri`
--

CREATE TABLE `tb_ketuntasanmateri` (
  `id_ketuntasanmateri` varchar(10) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `id_materi` varchar(10) NOT NULL,
  `status` enum('Selesai','Belum Dimulai') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ketuntasanmateri`
--

INSERT INTO `tb_ketuntasanmateri` (`id_ketuntasanmateri`, `id_siswa`, `id_materi`, `status`, `tanggal`) VALUES
('KTM0001', 'SIS0001', 'MTR0001', 'Selesai', '2024-03-08'),
('KTM0002', 'SIS0002', 'MTR0001', 'Belum Dimulai', '2024-03-08'),
('KTM0003', 'SIS0003', 'MTR0001', 'Belum Dimulai', '0000-00-00'),
('KTM0004', 'SIS0004', 'MTR0001', 'Belum Dimulai', '0000-00-00'),
('KTM0005', 'SIS0005', 'MTR0001', 'Selesai', '2024-03-11'),
('KTM0006', 'SIS0006', 'MTR0001', 'Selesai', '2024-03-11'),
('KTM0007', 'SIS0001', 'MTR0002', 'Belum Dimulai', '0000-00-00'),
('KTM0008', 'SIS0002', 'MTR0002', 'Belum Dimulai', '0000-00-00'),
('KTM0009', 'SIS0003', 'MTR0002', 'Belum Dimulai', '0000-00-00'),
('KTM0010', 'SIS0004', 'MTR0002', 'Belum Dimulai', '0000-00-00'),
('KTM0011', 'SIS0005', 'MTR0002', 'Belum Dimulai', '0000-00-00'),
('KTM0012', 'SIS0006', 'MTR0002', 'Belum Dimulai', '0000-00-00'),
('KTM0013', 'SIS0001', 'MTR0003', 'Belum Dimulai', '0000-00-00'),
('KTM0014', 'SIS0002', 'MTR0003', 'Belum Dimulai', '0000-00-00'),
('KTM0015', 'SIS0003', 'MTR0003', 'Belum Dimulai', '0000-00-00'),
('KTM0016', 'SIS0004', 'MTR0003', 'Belum Dimulai', '0000-00-00'),
('KTM0017', 'SIS0005', 'MTR0003', 'Belum Dimulai', '0000-00-00'),
('KTM0018', 'SIS0006', 'MTR0003', 'Belum Dimulai', '0000-00-00'),
('KTM0019', 'SIS0001', 'MTR0004', 'Selesai', '2024-03-20'),
('KTM0020', 'SIS0002', 'MTR0004', 'Belum Dimulai', '0000-00-00'),
('KTM0021', 'SIS0003', 'MTR0004', 'Belum Dimulai', '0000-00-00'),
('KTM0022', 'SIS0004', 'MTR0004', 'Belum Dimulai', '0000-00-00'),
('KTM0023', 'SIS0005', 'MTR0004', 'Belum Dimulai', '0000-00-00'),
('KTM0024', 'SIS0006', 'MTR0004', 'Belum Dimulai', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ketuntasanproyek`
--

CREATE TABLE `tb_ketuntasanproyek` (
  `id_ketuntasanproyek` varchar(10) NOT NULL,
  `id_proyekstep` varchar(10) NOT NULL,
  `id_kelompok` varchar(10) NOT NULL,
  `tgl_pengumpulan` date NOT NULL,
  `file` varchar(500) NOT NULL,
  `status` enum('Selesai','Belum Dimulai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ketuntasanproyek`
--

INSERT INTO `tb_ketuntasanproyek` (`id_ketuntasanproyek`, `id_proyekstep`, `id_kelompok`, `tgl_pengumpulan`, `file`, `status`) VALUES
('KTP0001', 'PST0001', 'KLP0001', '0000-00-00', '', 'Belum Dimulai'),
('KTP0002', 'PST0001', 'KLP0002', '0000-00-00', '', 'Belum Dimulai'),
('KTP0003', 'PST0002', 'KLP0001', '0000-00-00', '', 'Belum Dimulai'),
('KTP0004', 'PST0002', 'KLP0002', '0000-00-00', '', 'Belum Dimulai'),
('KTP0005', 'PST0003', 'KLP0001', '0000-00-00', '', 'Belum Dimulai'),
('KTP0006', 'PST0003', 'KLP0002', '0000-00-00', '', 'Belum Dimulai'),
('KTP0007', 'PST0004', 'KLP0001', '0000-00-00', '', 'Belum Dimulai'),
('KTP0008', 'PST0004', 'KLP0002', '0000-00-00', '', 'Belum Dimulai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ketuntasantugas`
--

CREATE TABLE `tb_ketuntasantugas` (
  `id_ketuntasantugas` varchar(10) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `id_tugas` varchar(10) NOT NULL,
  `status` enum('Selesai','Belum Dimulai') NOT NULL,
  `file` varchar(500) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ketuntasantugas`
--

INSERT INTO `tb_ketuntasantugas` (`id_ketuntasantugas`, `id_siswa`, `id_tugas`, `status`, `file`, `tanggal`) VALUES
('KTT0001', 'SIS0001', 'TGS0001', 'Selesai', 'Pertemuan 1.pdf', '2024-03-12'),
('KTT0002', 'SIS0002', 'TGS0001', 'Selesai', 'Pertemuan 1.pdf', '2024-03-12'),
('KTT0003', 'SIS0003', 'TGS0001', 'Belum Dimulai', '', '0000-00-00'),
('KTT0004', 'SIS0004', 'TGS0001', 'Belum Dimulai', '', '0000-00-00'),
('KTT0005', 'SIS0005', 'TGS0001', 'Belum Dimulai', '', '0000-00-00'),
('KTT0006', 'SIS0006', 'TGS0001', 'Belum Dimulai', '', '0000-00-00'),
('KTT0007', 'SIS0001', 'TGS0002', 'Belum Dimulai', '', '0000-00-00'),
('KTT0008', 'SIS0002', 'TGS0002', 'Belum Dimulai', '', '0000-00-00'),
('KTT0009', 'SIS0003', 'TGS0002', 'Belum Dimulai', '', '0000-00-00'),
('KTT0010', 'SIS0004', 'TGS0002', 'Belum Dimulai', '', '0000-00-00'),
('KTT0011', 'SIS0005', 'TGS0002', 'Belum Dimulai', '', '0000-00-00'),
('KTT0012', 'SIS0006', 'TGS0002', 'Belum Dimulai', '', '0000-00-00'),
('KTT0013', 'SIS0001', 'TGS0003', 'Belum Dimulai', '', '0000-00-00'),
('KTT0014', 'SIS0002', 'TGS0003', 'Belum Dimulai', '', '0000-00-00'),
('KTT0015', 'SIS0003', 'TGS0003', 'Belum Dimulai', '', '0000-00-00'),
('KTT0016', 'SIS0004', 'TGS0003', 'Belum Dimulai', '', '0000-00-00'),
('KTT0017', 'SIS0005', 'TGS0003', 'Belum Dimulai', '', '0000-00-00'),
('KTT0018', 'SIS0006', 'TGS0003', 'Belum Dimulai', '', '0000-00-00'),
('KTT0019', 'SIS0001', 'TGS0004', 'Belum Dimulai', '', '0000-00-00'),
('KTT0020', 'SIS0002', 'TGS0004', 'Belum Dimulai', '', '0000-00-00'),
('KTT0021', 'SIS0003', 'TGS0004', 'Belum Dimulai', '', '0000-00-00'),
('KTT0022', 'SIS0004', 'TGS0004', 'Belum Dimulai', '', '0000-00-00'),
('KTT0023', 'SIS0005', 'TGS0004', 'Belum Dimulai', '', '0000-00-00'),
('KTT0024', 'SIS0006', 'TGS0004', 'Belum Dimulai', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentarproyek`
--

CREATE TABLE `tb_komentarproyek` (
  `id_komentarproyek` varchar(10) NOT NULL,
  `id_proyekstep` varchar(10) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `isi_komentarproyek` varchar(200) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komentarproyek`
--

INSERT INTO `tb_komentarproyek` (`id_komentarproyek`, `id_proyekstep`, `id_siswa`, `isi_komentarproyek`, `tanggal`) VALUES
('KMP0001', 'PST0001', 'SIS0001', 'a', '2024-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentartugas`
--

CREATE TABLE `tb_komentartugas` (
  `id_komentartugas` varchar(10) NOT NULL,
  `isi_komentartugas` varchar(200) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `id_tugas` varchar(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komentartugas`
--

INSERT INTO `tb_komentartugas` (`id_komentartugas`, `isi_komentartugas`, `id_siswa`, `id_tugas`, `tanggal`) VALUES
('KMT0001', 'pertanyaan', 'SIS0001', 'TGS0001', '2024-03-12'),
('KMT0002', 'Pertanyaan', 'SIS0001', 'TGS0002', '2024-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuis`
--

CREATE TABLE `tb_kuis` (
  `id_kuis` varchar(10) NOT NULL,
  `id_materi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kuis`
--

INSERT INTO `tb_kuis` (`id_kuis`, `id_materi`) VALUES
('KUI0001', 'MTR0001'),
('KUI0002', 'MTR0002'),
('KUI0003', 'MTR0003'),
('KUI0004', 'MTR0004');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` varchar(10) NOT NULL,
  `id_topik` varchar(10) NOT NULL,
  `nama_materi` varchar(50) NOT NULL,
  `link_video` varchar(50) NOT NULL,
  `isi` varchar(2000) NOT NULL,
  `file` varchar(500) NOT NULL,
  `status` enum('Selesai','Belum Dimulai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `id_topik`, `nama_materi`, `link_video`, `isi`, `file`, `status`) VALUES
('MTR0001', 'TPK0001', 'Konsep dan Perencanaan Website', 'https://www.youtube.com/watch?v=Z_gjlIji8hU', 'Materi ini bertujuan memberikan gambaran dan wawasan terkait perencanaan proyek pengembangan aplikasi website sederhana. Diskusikan pemahaman yang Anda dapatkan dengan rekan kelompok dan bersama-sama buatlah perencanaan aplikasi Anda sendiri.', 'Konsep dan Perencanaan Website.pdf', 'Belum Dimulai'),
('MTR0002', 'TPK0002', 'Pengembangan Frontend Website', 'https://www.youtube.com/watch?v=02G2xumxSLk', 'Materi ini bertujuan memberikan gambaran dan wawasan terkait pembuatan halaman frontend website sederhana. Diskusikan pemahaman yang Anda dapatkan dengan rekan kelompok dan bersama-sama buatlah kode program Anda sendiri.', 'Pengembangan Frontend.pdf', 'Belum Dimulai'),
('MTR0003', 'TPK0003', 'Pengembangan Backend Website', 'https://www.youtube.com/watch?v=gOghS3BmaxI', 'Materi ini bertujuan memberikan gambaran dan wawasan terkait pembuatan halaman backend website sederhana. Diskusikan pemahaman yang Anda dapatkan dengan rekan kelompok dan bersama-sama buatlah kode program Anda sendiri.', 'Pengembangan Backend.pdf', 'Belum Dimulai'),
('MTR0004', 'TPK0004', 'Integrasi dan Penyelesaian', 'https://www.youtube.com/watch?v=tHKsZdS8Oug', 'Materi ini bertujuan memberikan gambaran dan wawasan terkait kegiatan integrasi website. Diskusikan pemahaman yang Anda dapatkan dengan rekan kelompok.', 'Integrasi Website.pdf', 'Belum Dimulai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilaimateri`
--

CREATE TABLE `tb_nilaimateri` (
  `id_nilaimateri` varchar(10) NOT NULL,
  `id_ketuntasanmateri` varchar(10) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nilaimateri`
--

INSERT INTO `tb_nilaimateri` (`id_nilaimateri`, `id_ketuntasanmateri`, `id_siswa`, `nilai`) VALUES
('NLM0001', 'KTM0001', 'SIS0001', 100),
('NLM0002', 'KTM0002', 'SIS0002', 0),
('NLM0003', 'KTM0003', 'SIS0003', 0),
('NLM0004', 'KTM0004', 'SIS0004', 0),
('NLM0005', 'KTM0005', 'SIS0005', 100),
('NLM0006', 'KTM0006', 'SIS0006', 100),
('NLM0007', 'KTM0007', 'SIS0001', 0),
('NLM0008', 'KTM0008', 'SIS0002', 0),
('NLM0009', 'KTM0009', 'SIS0003', 0),
('NLM0010', 'KTM0010', 'SIS0004', 0),
('NLM0011', 'KTM0011', 'SIS0005', 0),
('NLM0012', 'KTM0012', 'SIS0006', 0),
('NLM0013', 'KTM0013', 'SIS0001', 0),
('NLM0014', 'KTM0014', 'SIS0002', 0),
('NLM0015', 'KTM0015', 'SIS0003', 0),
('NLM0016', 'KTM0016', 'SIS0004', 0),
('NLM0017', 'KTM0017', 'SIS0005', 0),
('NLM0018', 'KTM0018', 'SIS0006', 0),
('NLM0019', 'KTM0019', 'SIS0001', 100),
('NLM0020', 'KTM0020', 'SIS0002', 0),
('NLM0021', 'KTM0021', 'SIS0003', 0),
('NLM0022', 'KTM0022', 'SIS0004', 0),
('NLM0023', 'KTM0023', 'SIS0005', 0),
('NLM0024', 'KTM0024', 'SIS0006', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilaistep`
--

CREATE TABLE `tb_nilaistep` (
  `id_nilaistep` varchar(10) NOT NULL,
  `id_ketuntasanproyek` varchar(10) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nilaistep`
--

INSERT INTO `tb_nilaistep` (`id_nilaistep`, `id_ketuntasanproyek`, `nilai`) VALUES
('NLS0001', 'KTP0001', 0),
('NLS0002', 'KTP0002', 0),
('NLS0003', 'KTP0003', 0),
('NLS0004', 'KTP0004', 0),
('NLS0005', 'KTP0005', 0),
('NLS0006', 'KTP0006', 0),
('NLS0007', 'KTP0007', 0),
('NLS0008', 'KTP0008', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilaitugas`
--

CREATE TABLE `tb_nilaitugas` (
  `id_nilaitugas` varchar(10) NOT NULL,
  `id_ketuntasantugas` varchar(10) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nilaitugas`
--

INSERT INTO `tb_nilaitugas` (`id_nilaitugas`, `id_ketuntasantugas`, `id_siswa`, `nilai`) VALUES
('NLT0001', 'KTT0001', 'SIS0001', 90),
('NLT0002', 'KTT0002', 'SIS0002', 0),
('NLT0003', 'KTT0003', 'SIS0003', 0),
('NLT0004', 'KTT0004', 'SIS0004', 0),
('NLT0005', 'KTT0005', 'SIS0005', 0),
('NLT0006', 'KTT0006', 'SIS0006', 0),
('NLT0007', 'KTT0007', 'SIS0001', 0),
('NLT0008', 'KTT0008', 'SIS0002', 0),
('NLT0009', 'KTT0009', 'SIS0003', 0),
('NLT0010', 'KTT0010', 'SIS0004', 0),
('NLT0011', 'KTT0011', 'SIS0005', 0),
('NLT0012', 'KTT0012', 'SIS0006', 0),
('NLT0013', 'KTT0013', 'SIS0001', 0),
('NLT0014', 'KTT0014', 'SIS0002', 0),
('NLT0015', 'KTT0015', 'SIS0003', 0),
('NLT0016', 'KTT0016', 'SIS0004', 0),
('NLT0017', 'KTT0017', 'SIS0005', 0),
('NLT0018', 'KTT0018', 'SIS0006', 0),
('NLT0019', 'KTT0019', 'SIS0001', 0),
('NLT0020', 'KTT0020', 'SIS0002', 0),
('NLT0021', 'KTT0021', 'SIS0003', 0),
('NLT0022', 'KTT0022', 'SIS0004', 0),
('NLT0023', 'KTT0023', 'SIS0005', 0),
('NLT0024', 'KTT0024', 'SIS0006', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_opsi`
--

CREATE TABLE `tb_opsi` (
  `id_opsi` varchar(10) NOT NULL,
  `id_soal` varchar(10) NOT NULL,
  `opsi` varchar(500) NOT NULL,
  `status` enum('Benar','Salah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_opsi`
--

INSERT INTO `tb_opsi` (`id_opsi`, `id_soal`, `opsi`, `status`) VALUES
('OPS0001', 'SOA0001', 'Nama unik yang digunakan untuk mengidentifikasi website di internet.', 'Benar'),
('OPS0002', 'SOA0001', 'Alamat IP tempat website di-host.', 'Salah'),
('OPS0003', 'SOA0001', 'Nama server yang menyimpan file website.', 'Salah'),
('OPS0004', 'SOA0001', 'Jenis bahasa pemrograman yang digunakan untuk membuat website.', 'Salah'),
('OPS0005', 'SOA0001', 'Domain adalah perangkat lunak yang menjalankan operasi dasar pada website.', 'Salah'),
('OPS0006', 'SOA0002', 'Untuk menentukan tata letak dan struktur halaman website.', 'Benar'),
('OPS0007', 'SOA0002', 'Untuk mengidentifikasi masalah keamanan dalam website.', 'Salah'),
('OPS0008', 'SOA0002', 'Untuk memilih warna dan font yang sesuai.', 'Salah'),
('OPS0009', 'SOA0002', 'Wireframe hanya memperlambat proses pengembangan website.', 'Salah'),
('OPS0010', 'SOA0002', 'Untuk menentukan harga pengembangan website.', 'Salah'),
('OPS0011', 'SOA0003', 'Website dinamis menggunakan database untuk menghasilkan konten secara dinamis, sedangkan website statis tidak.', 'Benar'),
('OPS0012', 'SOA0003', 'Website statis tidak memerlukan hosting, sedangkan website dinamis memerlukan hosting.', 'Salah'),
('OPS0013', 'SOA0003', 'Website statis lebih lambat dalam memuat halaman daripada website dinamis.', 'Salah'),
('OPS0014', 'SOA0003', 'Website dinamis hanya dapat diakses oleh pengguna tertentu, sedangkan website statis terbuka untuk umum.', 'Salah'),
('OPS0015', 'SOA0003', 'Website statis adalah jenis website yang bisa diubah secara real-time oleh pengguna, sedangkan website dinamis adalah website yang tidak pernah berubah dan tetap statis sepanjang waktu.', 'Salah'),
('OPS0016', 'SOA0004', 'IV-I-III-II-V', 'Benar'),
('OPS0017', 'SOA0004', 'I-II-III-IV-V', 'Salah'),
('OPS0018', 'SOA0004', 'I-II-V-IV-III', 'Salah'),
('OPS0019', 'SOA0004', 'IV-I-III-V-II', 'Salah'),
('OPS0020', 'SOA0004', 'IV-III -I -V-II', 'Salah'),
('OPS0021', 'SOA0005', 'Desain responsif penting untuk memastikan tampilan website tetap baik di berbagai perangkat.', 'Benar'),
('OPS0022', 'SOA0005', 'Perencanaan desain website melibatkan penentuan tata letak halaman dan struktur navigasi.', 'Salah'),
('OPS0023', 'SOA0005', 'Memilih warna dan font yang sesuai tidak memengaruhi pengalaman pengguna (user experience/UX).', 'Salah'),
('OPS0024', 'SOA0005', 'Perencanaan desain website hanya perlu dilakukan sekali pada awal pembuatan, tanpa revisi berkelanjutan.', 'Salah'),
('OPS0025', 'SOA0005', 'Penggunaan gambar dan grafik merupakan bagian penting dari perencanaan desain website.', 'Salah'),
('OPS0026', 'SOA0006', 'Mengelompokkan elemen-elemen HTML', 'Benar'),
('OPS0027', 'SOA0006', 'Menambahkan gambar', 'Salah'),
('OPS0028', 'SOA0006', 'Membuat link', 'Salah'),
('OPS0029', 'SOA0006', 'Membuat tabel', 'Salah'),
('OPS0030', 'SOA0006', 'Menambahkan audio', 'Salah'),
('OPS0031', 'SOA0007', 'Menambahkan gambar background-color', 'Benar'),
('OPS0032', 'SOA0007', 'color-background', 'Salah'),
('OPS0033', 'SOA0007', 'add-background', 'Salah'),
('OPS0034', 'SOA0007', 'bg-color', 'Salah'),
('OPS0035', 'SOA0007', 'set-color', 'Salah'),
('OPS0036', 'SOA0008', 'a', 'Benar'),
('OPS0037', 'SOA0008', 'link', 'Salah'),
('OPS0038', 'SOA0008', 'h1', 'Salah'),
('OPS0039', 'SOA0008', 'p', 'Salah'),
('OPS0040', 'SOA0008', 'div', 'Salah'),
('OPS0041', 'SOA0009', 'Array', 'Benar'),
('OPS0042', 'SOA0009', 'Number', 'Salah'),
('OPS0043', 'SOA0009', 'Boolean', 'Salah'),
('OPS0044', 'SOA0009', 'String', 'Salah'),
('OPS0045', 'SOA0009', 'Undefined', 'Salah'),
('OPS0046', 'SOA0010', 'Interaksi dengan pengguna', 'Benar'),
('OPS0047', 'SOA0010', 'Logika bisnis', 'Salah'),
('OPS0048', 'SOA0010', 'Pemrosesan data', 'Salah'),
('OPS0049', 'SOA0010', 'Penyimpanan data', 'Salah'),
('OPS0050', 'SOA0010', 'Manajemen server', 'Salah'),
('OPS0051', 'SOA0011', 'Memproses logika bisnis dan mengelola data', 'Benar'),
('OPS0052', 'SOA0011', 'Mengatur tampilan dan interaksi dengan pengguna', 'Salah'),
('OPS0053', 'SOA0011', 'Mengatur interaksi dengan pengguna', 'Salah'),
('OPS0054', 'SOA0011', 'Menampilkan konten dan gambar', 'Salah'),
('OPS0055', 'SOA0011', 'Menyediakan tampilan yang dinamis di sisi client', 'Salah'),
('OPS0056', 'SOA0012', 'Bahasa untuk mengelola database relasional', 'Benar'),
('OPS0057', 'SOA0012', 'Mengatur Bahasa untuk mengelola server web', 'Salah'),
('OPS0058', 'SOA0012', 'Bahasa untuk mengatur tampilan pada halaman web', 'Salah'),
('OPS0059', 'SOA0012', 'Bahasa untuk membuat animasi pada website', 'Salah'),
('OPS0060', 'SOA0012', 'Bahasa untuk mengontrol tampilan dan interaksi dengan pengguna', 'Salah'),
('OPS0061', 'SOA0013', 'Menghemat biaya pengembangan', 'Benar'),
('OPS0062', 'SOA0013', 'Memungkinkan integrasi antara aplikasi yang berbed', 'Salah'),
('OPS0063', 'SOA0013', 'Meningkatkan skalabilitas aplikasi', 'Salah'),
('OPS0064', 'SOA0013', 'Memfasilitasi pengelolaan logika bisnis', 'Salah'),
('OPS0065', 'SOA0013', 'Memisahkan tugas antara frontend dan backend', 'Salah'),
('OPS0066', 'SOA0014', 'Mengambil semua data dari tabel users di mana usia lebih dari 18 tahun', 'Benar'),
('OPS0067', 'SOA0014', 'Menghapus semua data dari tabel users di mana usia lebih dari 18 tahun', 'Salah'),
('OPS0068', 'SOA0014', 'Mengambil semua data dari tabel users di mana usia kurang dari 18 tahun', 'Salah'),
('OPS0069', 'SOA0014', 'Mengedit data table user dimana usia lebih dari 18 tahun', 'Salah'),
('OPS0070', 'SOA0014', 'Menambahkan data baru ke dalam tabel users jika usia lebih dari 18 tahun', 'Salah'),
('OPS0071', 'SOA0015', 'Perulangan while akan berhenti ketika kondisi menjadi false', 'Benar'),
('OPS0072', 'SOA0015', 'Perulangan while dieksekusi setidaknya satu kali', 'Salah'),
('OPS0073', 'SOA0015', 'Perulangan while selalu dieksekusi sebanyak yang ditentukan', 'Salah'),
('OPS0074', 'SOA0015', 'Perulangan while hanya dapat digunakan untuk mengulangi arra', 'Salah'),
('OPS0075', 'SOA0015', 'Perulangan while hanya dapat digunakan untuk mengulangi string', 'Salah'),
('OPS0076', 'SOA0016', 'Penyatuan tampilan dan fungsionalitas website', 'Benar'),
('OPS0077', 'SOA0016', 'Proses menyatukan warna dan tata letak halaman web.', 'Salah'),
('OPS0078', 'SOA0016', 'Menggabungkan elemen-elemen HTML dengan CSS', 'Salah'),
('OPS0079', 'SOA0016', 'Menerapkan teknik SEO pada website', 'Salah'),
('OPS0080', 'SOA0016', 'Menyusun struktur database untuk website', 'Salah'),
('OPS0081', 'SOA0017', 'Frontend bertanggung jawab untuk tampilan pengguna, sementara backend untuk logika aplikasi.', 'Benar'),
('OPS0082', 'SOA0017', 'Frontend hanya menggunakan CSS, sementara backend menggunakan JavaScript.', 'Salah'),
('OPS0083', 'SOA0017', 'Frontend tidak memerlukan pengaturan server, sementara backend tidak memiliki antarmuka pengguna', 'Salah'),
('OPS0084', 'SOA0017', 'Frontend tidak memiliki akses ke database, sementara backend tidak dapat menampilkan konten kepada pengguna', 'Salah'),
('OPS0085', 'SOA0017', 'Frontend tidak memerlukan JavaScript, sementara backend tidak memerlukan HTML', 'Salah'),
('OPS0086', 'SOA0018', 'Menyajikan tampilan pengguna yang menarik', 'Benar'),
('OPS0087', 'SOA0018', 'Menyimpan dan mengambil data dari database', 'Salah'),
('OPS0088', 'SOA0018', 'Menangani autentikasi pengguna', 'Salah'),
('OPS0089', 'SOA0018', 'Memproses data yang diterima dari frontend', 'Salah'),
('OPS0090', 'SOA0018', 'Menangani permintaan HTTP', 'Salah'),
('OPS0091', 'SOA0019', 'Agar website dapat berfungsi dengan baik secara keseluruhan', 'Benar'),
('OPS0092', 'SOA0019', 'Agar website terlihat menarik', 'Salah'),
('OPS0093', 'SOA0019', 'Untuk mempercepat waktu pemuatan halaman', 'Salah'),
('OPS0094', 'SOA0019', 'Memastikan keamanan website', 'Salah'),
('OPS0095', 'SOA0019', 'Untuk memastikan ketersediaan server', 'Salah'),
('OPS0096', 'SOA0020', 'Menyimpan dan mengelola data', 'Benar'),
('OPS0097', 'SOA0020', 'Mengatur tampilan pengguna', 'Salah'),
('OPS0098', 'SOA0020', 'Menyediakan tata letak halaman', 'Salah'),
('OPS0099', 'SOA0020', 'Menentukan logika bisnis', 'Salah'),
('OPS0100', 'SOA0020', 'Mengatur request HTTP', 'Salah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_proyek`
--

CREATE TABLE `tb_proyek` (
  `id_proyek` varchar(10) NOT NULL,
  `nama_proyek` varchar(50) NOT NULL,
  `deskripsi_proyek` varchar(2000) NOT NULL,
  `jumlah_step` int(11) NOT NULL,
  `jumlah_kelompok` int(11) NOT NULL,
  `status` enum('Selesai','Belum Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_proyek`
--

INSERT INTO `tb_proyek` (`id_proyek`, `nama_proyek`, `deskripsi_proyek`, `jumlah_step`, `jumlah_kelompok`, `status`) VALUES
('PRO0001', 'Website Rumah Makan', 'Membuat aplikasi sederhana untuk kebutuhan rumah makan berbasis website', 4, 2, 'Belum Selesai'),
('PRO0002', '', '', 1, 1, 'Belum Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_proyekstep`
--

CREATE TABLE `tb_proyekstep` (
  `id_proyekstep` varchar(10) NOT NULL,
  `nama_step` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `id_proyek` varchar(10) NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_proyekstep`
--

INSERT INTO `tb_proyekstep` (`id_proyekstep`, `nama_step`, `deskripsi`, `tgl_mulai`, `tgl_akhir`, `id_proyek`, `file`) VALUES
('PST0001', 'Perencanaan Website', 'Pada tahap ini, diskusikan dengan teman-teman kelompok mengenai website yang akan dibuat dan unggah hasil pekerjaan sebelum tenggat pengumpulan', '2024-03-12', '2024-03-19', 'PRO0001', 'Panduan Tahapan Proyek 1 - Perencanaan Website.pdf'),
('PST0002', 'Perancangan Frontend', 'Pada tahap ini, buatlah tampilan frontend website rumah makan yang akan dibuat', '2024-03-19', '2024-03-26', 'PRO0001', 'Panduan Tahapan Proyek 2 - Pengembangan Frontend.pdf'),
('PST0003', 'Perancangan Backend', 'Pada tahap ini, buat tampilan backend (halaman admin) untuk website rumah makan', '2024-03-26', '2024-04-02', 'PRO0001', 'Pertemuan 1.pdf'),
('PST0004', 'Integrasi dan Penyelesaian', 'Pada tahapan ini, pastikan website yang dibuat dapat berjalan dengan baik. Jika sudah berfungsi dengan baik, hosting website dan cantumkan link website pada dokumen presentasi yang dokumpulkan', '2024-04-02', '2024-04-09', 'PRO0001', 'Pertemuan 1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` varchar(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `id_akun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nama_siswa`, `id_akun`) VALUES
('SIS0001', 'Taylor Swift', 'SCP0002'),
('SIS0002', 'Zayn Malik', 'SCP0003'),
('SIS0003', 'Bella Hadid', 'SCP0004'),
('SIS0004', 'Ariana Grande', 'SCP0005'),
('SIS0005', 'Meghan Trainor', 'SCP0006'),
('SIS0006', 'Vernon Chwe', 'SCP0007'),
('SIS0007', 'Vernon Chwe', 'SCP0008');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` varchar(10) NOT NULL,
  `id_kuis` varchar(10) NOT NULL,
  `nomor` int(11) NOT NULL,
  `isi_soal` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `id_kuis`, `nomor`, `isi_soal`) VALUES
('SOA0001', 'KUI0001', 1, 'Apa yang dimaksud dengan domain pada website?'),
('SOA0002', 'KUI0001', 2, 'Apa manfaat membuat wireframe saat merencanakan sebuah website?'),
('SOA0003', 'KUI0001', 3, 'Apa perbedaan antara website statis dan website dinamis?'),
('SOA0004', 'KUI0001', 4, 'Perhatikan urutan pengembangan website berikut ini: I. Menentukan struktur database dan menyusun skema; II. Menulis kode program (coding) dan mengembangkan fitur website; III.	 Membuat keputusan tentang tata letak dan desain visual; IV. Mengidentifikasi kebutuhan fungsional dan teknis; V. Melakukan pengujian dan debugging. Susun langkah-langkah berikut menjadi urutan yang benar dalam pengembangan website.'),
('SOA0005', 'KUI0001', 5, 'Pernyataan manakah yang tidak benar tentang perencanaan desain website?'),
('SOA0006', 'KUI0002', 1, 'Apa peran tag div dalam HTML?'),
('SOA0007', 'KUI0002', 2, 'Bagaimana cara menambahkan warna latar belakang pada elemen HTML menggunakan CSS?'),
('SOA0008', 'KUI0002', 3, 'Tag mana yang digunakan untuk membuat hyperlink di HTML?'),
('SOA0009', 'KUI0002', 4, 'Mana yang bukan merupakan tipe data primitif di JavaScript?'),
('SOA0010', 'KUI0002', 5, 'Apa yang menjadi fokus utama dalam pengembangan frontend?'),
('SOA0011', 'KUI0003', 1, 'Apa peran dari backend dalam aplikasi web?'),
('SOA0012', 'KUI0003', 2, 'Apa yang dimaksud dengan SQL?'),
('SOA0013', 'KUI0003', 3, 'Di antara berikut ini, manakah yang bukan merupakan keuntungan menggunakan API dalam pengembangan backend?'),
('SOA0014', 'KUI0003', 4, 'SELECT * FROM users WHERE age > 18. Manakah pernyataan yang benar dari SQL ini?'),
('SOA0015', 'KUI0003', 5, 'Mana pernyataan yang benar tentang perulangan while dalam PHP?'),
('SOA0016', 'KUI0004', 1, 'Apa yang dimaksud dengan integrasi frontend dan backend dalam pembuatan website?'),
('SOA0017', 'KUI0004', 2, 'Perbedaan utama antara frontend dan backend adalah'),
('SOA0018', 'KUI0004', 3, 'Manakah dari berikut yang tidak termasuk dalam tugas backend?'),
('SOA0019', 'KUI0004', 4, 'Mengapa integrasi antara frontend dan backend sangat penting dalam pengembangan website yang kompleks?'),
('SOA0020', 'KUI0004', 5, 'Apa fungsi utama database dalam integrasi frontend dan backend?');

-- --------------------------------------------------------

--
-- Table structure for table `tb_topik`
--

CREATE TABLE `tb_topik` (
  `id_topik` varchar(10) NOT NULL,
  `nama_topik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_topik`
--

INSERT INTO `tb_topik` (`id_topik`, `nama_topik`) VALUES
('TPK0001', 'Konsep Website'),
('TPK0002', 'Pengembangan Frontend'),
('TPK0003', 'Pengembangan Backend'),
('TPK0004', 'Integrasi Website');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tugas`
--

CREATE TABLE `tb_tugas` (
  `id_tugas` varchar(10) NOT NULL,
  `nama_tugas` varchar(50) NOT NULL,
  `id_topik` varchar(10) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `file` varchar(500) NOT NULL,
  `deadline` date NOT NULL,
  `status` enum('Selesai','Belum Dimulai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tugas`
--

INSERT INTO `tb_tugas` (`id_tugas`, `nama_tugas`, `id_topik`, `deskripsi`, `file`, `deadline`, `status`) VALUES
('TGS0001', 'Merencanakan Aplikasi Website', 'TPK0001', 'Buatlah Flowchart dari aplikasi yang sering kalian gunakan dalam kehidupan sehari-hari', 'Panduan Tugas Merencanakan Website.pdf', '2024-03-11', 'Belum Dimulai'),
('TGS0002', 'Membuat Tabel Sederhana', 'TPK0001', 'Buatlah kode program tabel sederhana yang menampilkan beberapa informasi', 'Panduan Tugas Membuat Tabel Sederhana.pdf', '2024-03-26', 'Belum Dimulai'),
('TGS0003', 'Form Sederhana', 'TPK0001', 'Buatlah kode program sederhana form yang dapat melakukan penginputan dan menampilkan data', 'Panduan Tugas Membuat Form Sederhana.pdf', '2024-04-02', 'Belum Dimulai'),
('TGS0004', 'Integrasi Website', 'TPK0001', 'Buat kode program untuk menghubungkan tabel dan form yang telah dibuat sebelumnya', 'Panduan Tugas Membuat Integrasi Website.pdf', '2024-04-09', 'Belum Dimulai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tb_balasanproyek`
--
ALTER TABLE `tb_balasanproyek`
  ADD PRIMARY KEY (`id_balasanproyek`),
  ADD KEY `id_komentarproyek` (`id_komentarproyek`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `tb_balasantugas`
--
ALTER TABLE `tb_balasantugas`
  ADD PRIMARY KEY (`id_balasantugas`),
  ADD KEY `id_komentar` (`id_komentartugas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_siswa` (`id_siswa`,`id_soal`,`id_opsi`),
  ADD KEY `id_soal` (`id_soal`),
  ADD KEY `id_opsi` (`id_opsi`);

--
-- Indexes for table `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  ADD PRIMARY KEY (`id_kelompok`),
  ADD KEY `id_matpel` (`id_proyek`);

--
-- Indexes for table `tb_kelompoksiswa`
--
ALTER TABLE `tb_kelompoksiswa`
  ADD PRIMARY KEY (`id_kelompoksiswa`),
  ADD KEY `id_siswa` (`id_siswa`,`id_kelompok`),
  ADD KEY `id_kelompok` (`id_kelompok`);

--
-- Indexes for table `tb_ketua`
--
ALTER TABLE `tb_ketua`
  ADD PRIMARY KEY (`id_ketua`),
  ADD KEY `id_siswa` (`id_siswa`,`id_kelompok`),
  ADD KEY `id_kelompok` (`id_kelompok`);

--
-- Indexes for table `tb_ketuntasanmateri`
--
ALTER TABLE `tb_ketuntasanmateri`
  ADD PRIMARY KEY (`id_ketuntasanmateri`),
  ADD KEY `id_siswa` (`id_siswa`,`id_materi`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `tb_ketuntasanproyek`
--
ALTER TABLE `tb_ketuntasanproyek`
  ADD PRIMARY KEY (`id_ketuntasanproyek`),
  ADD KEY `id_proyekstep` (`id_proyekstep`,`id_kelompok`),
  ADD KEY `id_kelompok` (`id_kelompok`);

--
-- Indexes for table `tb_ketuntasantugas`
--
ALTER TABLE `tb_ketuntasantugas`
  ADD PRIMARY KEY (`id_ketuntasantugas`),
  ADD KEY `id_siswa` (`id_siswa`,`id_tugas`),
  ADD KEY `id_tugas` (`id_tugas`);

--
-- Indexes for table `tb_komentarproyek`
--
ALTER TABLE `tb_komentarproyek`
  ADD PRIMARY KEY (`id_komentarproyek`),
  ADD KEY `id_proyekstep` (`id_proyekstep`,`id_siswa`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_komentartugas`
--
ALTER TABLE `tb_komentartugas`
  ADD PRIMARY KEY (`id_komentartugas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_materi` (`id_tugas`),
  ADD KEY `id_tugas` (`id_tugas`);

--
-- Indexes for table `tb_kuis`
--
ALTER TABLE `tb_kuis`
  ADD PRIMARY KEY (`id_kuis`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `nama_topik` (`id_topik`);

--
-- Indexes for table `tb_nilaimateri`
--
ALTER TABLE `tb_nilaimateri`
  ADD PRIMARY KEY (`id_nilaimateri`),
  ADD KEY `id_ketuntasanmateri` (`id_ketuntasanmateri`,`id_siswa`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_nilaistep`
--
ALTER TABLE `tb_nilaistep`
  ADD PRIMARY KEY (`id_nilaistep`),
  ADD KEY `id_ketuntasanproyek` (`id_ketuntasanproyek`);

--
-- Indexes for table `tb_nilaitugas`
--
ALTER TABLE `tb_nilaitugas`
  ADD PRIMARY KEY (`id_nilaitugas`),
  ADD KEY `id_ketuntasantugas` (`id_ketuntasantugas`,`id_siswa`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_opsi`
--
ALTER TABLE `tb_opsi`
  ADD PRIMARY KEY (`id_opsi`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indexes for table `tb_proyek`
--
ALTER TABLE `tb_proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `tb_proyekstep`
--
ALTER TABLE `tb_proyekstep`
  ADD PRIMARY KEY (`id_proyekstep`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_kuis` (`id_kuis`);

--
-- Indexes for table `tb_topik`
--
ALTER TABLE `tb_topik`
  ADD PRIMARY KEY (`id_topik`);

--
-- Indexes for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_topik` (`id_topik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_balasanproyek`
--
ALTER TABLE `tb_balasanproyek`
  ADD CONSTRAINT `tb_balasanproyek_ibfk_1` FOREIGN KEY (`id_komentarproyek`) REFERENCES `tb_komentarproyek` (`id_komentarproyek`),
  ADD CONSTRAINT `tb_balasanproyek_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id_guru`);

--
-- Constraints for table `tb_balasantugas`
--
ALTER TABLE `tb_balasantugas`
  ADD CONSTRAINT `tb_balasantugas_ibfk_1` FOREIGN KEY (`id_komentartugas`) REFERENCES `tb_komentartugas` (`id_komentartugas`),
  ADD CONSTRAINT `tb_balasantugas_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id_guru`);

--
-- Constraints for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD CONSTRAINT `tb_guru_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Constraints for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD CONSTRAINT `tb_jawaban_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `tb_soal` (`id_soal`),
  ADD CONSTRAINT `tb_jawaban_ibfk_2` FOREIGN KEY (`id_opsi`) REFERENCES `tb_opsi` (`id_opsi`),
  ADD CONSTRAINT `tb_jawaban_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`);

--
-- Constraints for table `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  ADD CONSTRAINT `tb_kelompok_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `tb_proyek` (`id_proyek`);

--
-- Constraints for table `tb_kelompoksiswa`
--
ALTER TABLE `tb_kelompoksiswa`
  ADD CONSTRAINT `tb_kelompoksiswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`),
  ADD CONSTRAINT `tb_kelompoksiswa_ibfk_2` FOREIGN KEY (`id_kelompok`) REFERENCES `tb_kelompok` (`id_kelompok`);

--
-- Constraints for table `tb_ketua`
--
ALTER TABLE `tb_ketua`
  ADD CONSTRAINT `tb_ketua_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`),
  ADD CONSTRAINT `tb_ketua_ibfk_2` FOREIGN KEY (`id_kelompok`) REFERENCES `tb_kelompok` (`id_kelompok`);

--
-- Constraints for table `tb_ketuntasanmateri`
--
ALTER TABLE `tb_ketuntasanmateri`
  ADD CONSTRAINT `tb_ketuntasanmateri_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`),
  ADD CONSTRAINT `tb_ketuntasanmateri_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`);

--
-- Constraints for table `tb_ketuntasanproyek`
--
ALTER TABLE `tb_ketuntasanproyek`
  ADD CONSTRAINT `tb_ketuntasanproyek_ibfk_1` FOREIGN KEY (`id_kelompok`) REFERENCES `tb_kelompok` (`id_kelompok`),
  ADD CONSTRAINT `tb_ketuntasanproyek_ibfk_2` FOREIGN KEY (`id_proyekstep`) REFERENCES `tb_proyekstep` (`id_proyekstep`);

--
-- Constraints for table `tb_ketuntasantugas`
--
ALTER TABLE `tb_ketuntasantugas`
  ADD CONSTRAINT `tb_ketuntasantugas_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`),
  ADD CONSTRAINT `tb_ketuntasantugas_ibfk_2` FOREIGN KEY (`id_tugas`) REFERENCES `tb_tugas` (`id_tugas`);

--
-- Constraints for table `tb_komentarproyek`
--
ALTER TABLE `tb_komentarproyek`
  ADD CONSTRAINT `tb_komentarproyek_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`),
  ADD CONSTRAINT `tb_komentarproyek_ibfk_2` FOREIGN KEY (`id_proyekstep`) REFERENCES `tb_proyekstep` (`id_proyekstep`);

--
-- Constraints for table `tb_komentartugas`
--
ALTER TABLE `tb_komentartugas`
  ADD CONSTRAINT `tb_komentartugas_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`),
  ADD CONSTRAINT `tb_komentartugas_ibfk_2` FOREIGN KEY (`id_tugas`) REFERENCES `tb_tugas` (`id_tugas`);

--
-- Constraints for table `tb_kuis`
--
ALTER TABLE `tb_kuis`
  ADD CONSTRAINT `tb_kuis_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`);

--
-- Constraints for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `tb_materi_ibfk_1` FOREIGN KEY (`id_topik`) REFERENCES `tb_topik` (`id_topik`);

--
-- Constraints for table `tb_nilaimateri`
--
ALTER TABLE `tb_nilaimateri`
  ADD CONSTRAINT `tb_nilaimateri_ibfk_1` FOREIGN KEY (`id_ketuntasanmateri`) REFERENCES `tb_ketuntasanmateri` (`id_ketuntasanmateri`),
  ADD CONSTRAINT `tb_nilaimateri_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`);

--
-- Constraints for table `tb_nilaistep`
--
ALTER TABLE `tb_nilaistep`
  ADD CONSTRAINT `tb_nilaistep_ibfk_1` FOREIGN KEY (`id_ketuntasanproyek`) REFERENCES `tb_ketuntasanproyek` (`id_ketuntasanproyek`);

--
-- Constraints for table `tb_nilaitugas`
--
ALTER TABLE `tb_nilaitugas`
  ADD CONSTRAINT `tb_nilaitugas_ibfk_1` FOREIGN KEY (`id_ketuntasantugas`) REFERENCES `tb_ketuntasantugas` (`id_ketuntasantugas`),
  ADD CONSTRAINT `tb_nilaitugas_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`);

--
-- Constraints for table `tb_opsi`
--
ALTER TABLE `tb_opsi`
  ADD CONSTRAINT `tb_opsi_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `tb_soal` (`id_soal`);

--
-- Constraints for table `tb_proyekstep`
--
ALTER TABLE `tb_proyekstep`
  ADD CONSTRAINT `tb_proyekstep_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `tb_proyek` (`id_proyek`);

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Constraints for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`id_kuis`) REFERENCES `tb_kuis` (`id_kuis`);

--
-- Constraints for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD CONSTRAINT `tb_tugas_ibfk_1` FOREIGN KEY (`id_topik`) REFERENCES `tb_topik` (`id_topik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
