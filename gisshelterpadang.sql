-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 08:35 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gisshelterpadang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(10) NOT NULL,
  `kodelogin` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `kodelogin`, `password`, `akses`) VALUES
('admin1', 'admingis', 'e41644fa66d5eeaefeb4854d9d4414f1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `daftarshelter`
--

CREATE TABLE IF NOT EXISTS `daftarshelter` (
  `idshelter` varchar(20) NOT NULL,
  `namashelter` text NOT NULL,
  `alamatshelter` text NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `fungsi` varchar(25) NOT NULL,
  `jumlahlantai` varchar(10) NOT NULL,
  `dayatampung` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftarshelter`
--

INSERT INTO `daftarshelter` (`idshelter`, `namashelter`, `alamatshelter`, `latitude`, `longitude`, `fungsi`, `jumlahlantai`, `dayatampung`) VALUES
('ST-001', 'Bank Indonesia', 'Jl. Jenderal Sudirman', '-0.9430657', '100.362563', 'Kantor', '4', 'Belum '),
('ST-002', 'Bank Nagari', 'Jl. Pemuda', '-0.9493657', '100.3546635', 'Kantor', '6', '1000'),
('ST-003', 'Badan Pemeriksa Keuangan (BPK)', 'Jl. Khatib Sulaiman', '-0.9112454', '100.3565133', 'Kantor', '4', '800'),
('ST-004', 'Bappeda Prov. Sumbar', 'Jl. Khatib Sulaiman', '-0.9257198', '100.360956', 'Kantor', '4', 'Belum '),
('ST-005', 'Dinas Peternakan Prov. Sumbar', 'Jl. Rasuna Said', '-0.9319333', '100.3616896', 'Kantor', '3', 'Belum '),
('ST-006', 'Dinas PU dan Pemukiman Prov. Sumbar', 'Jl. Taman Siswa No. 1', '-0.9299176', '100.3636982', 'Kantor', '3', 'Belum '),
('ST-007', 'PSDA Prov. Sumbar', 'Jl. S. Parman, Ulak Karang', '-0.9050836', '100.351538', 'Kantor', '3', '200'),
('ST-008', 'DPRD Sumatera Barat', 'Jl. S. Parman, Ulak Karang', '-0.9061998', '100.3513718', 'Kantor', '4', '100'),
('ST-009', 'Escape Building Kantor Gubernur', 'Jl. Jend. Sudirman No. 51, Padang Barat ', '-0.9376515', '100.3604359', 'Kantor', 'Belum ', 'Belum '),
('ST-010', 'Pustaka Daerah', 'Jl. Khairil Anwar (jl. Diponegoro no. 4)', '-0.9536077', '100.356233', 'Kantor', '5', 'Belum '),
('ST-011', 'Polda Sumbar', 'Jl. Sudriman, Padang Pasir', '-0.936003', '100.3611689', 'Kantor', '8', '1500'),
('ST-012', 'Telkom', 'Jl. Bagindo Azis chan', '-0.9539181', '100.363552', 'Kantor', '7', '300'),
('ST-013', 'PT Sutan Kasim', 'Jl. Veteran ', '-0.93944', '100.3537489', 'Kantor', '4', '800'),
('ST-014', 'Daihatsu & ACC Finance', 'Jl. Khatib Sulaiman', '-0.9080356', '100.35308', 'Kantor', '3', '30'),
('ST-015', 'Rumah Sakit M. Jamil', 'Jl. Perintis Kemerdekaan', '-0.9436911', '100.3676627', 'Rumahsakit', '6', 'Belum '),
('ST-016', 'Rumah Sakit Yos Sudarso', 'Jl. Situjuh', '-0.9367503', '100.3627149', 'Rumahsakit', '5', '300'),
('ST-017', 'Pasar Inpres', 'Jl. Sandang Pangan (Pasar Raya)', '-0.949008', '100.3601456', 'Pasar', '4', '4000'),
('ST-018', 'Damar Plaza', 'Jl. Damar Kp. Olo', '-0.9443992', '100.3548929', 'Supermarket', '5', '1000'),
('ST-019', 'Villa Hadis', 'Jl. Khatib Sulaiman', '-0.9042744', '100.3523843', 'Perumahan', 'Belum ', 'Belum '),
('ST-020', 'Sekolah Al Azhar 32 ', 'Jl. Khatib Sulaiman', '-0.9093138', '100.355124', 'Sekolah', '3', '1000'),
('ST-021', 'SD 03, 04, 21 Purus', 'Jl. Veteran', '-0.9392521', '100.3541875', 'Sekolah', '4', 'Belum '),
('ST-022', 'SD Agnes', 'Jl. Bandar Gereja', '-0.9558765', '100.358014', 'Sekolah', '3', 'Belum '),
('ST-023', 'SD Percobaan', 'Jl. Ujung Gurun ', '-0.9339472', '100.3603822', 'Sekolah', '3', 'Belum '),
('ST-024', 'SDN 23 dan 24 Ujung Gurun', 'Jl. Veteran No. 82 Padang', '-0.9334007', '100.3547523', 'Sekolah', '4', 'Belum '),
('ST-025', 'SMP Frater', 'Jl. Khairil Anwar', '-0.9553809', '100.3569387', 'Sekolah', '4', 'Belum '),
('ST-026', 'SMP Maria', 'Jl. Bandar Gereja', '-0.9556838', '100.357683', 'Sekolah', '3', 'Belum '),
('ST-027', 'SMPN 7 Padang', 'Jl. S. Parman Lolong Padang', '-0.9209753', '100.3515693', 'Sekolah', '4', '2000'),
('ST-028', 'SMPN 25 Padang', 'Jl. Beringin Belanti Timur', '-0.9192506', '100.3573271', 'Sekolah', '3', 'Belum '),
('ST-029', 'SMAN 1 Padang', 'Jl. Belanti Raya No. 11 Padang', '-0.9190785', '100.3538673', 'Sekolah', '4', '2000'),
('ST-030', 'SMKN 5 Padang', 'Jl. Beringin No. 4 Padang', '-0.9217701', '100.3519032', 'Sekolah', '4', '2000'),
('ST-031', 'Fakultas Ilmu Pendidikan UNP', 'Jl. Hamka, Air Tawar, Padang', '-0.8965767', '100.3500085', 'Kampus', '5', '1500'),
('ST-032', 'Pasca Sarjana UNP', 'Jl. Hamka, Air Tawar, Padang', '-0.8964364', '100.3493191', 'Kampus', '6', '1000'),
('ST-033', 'Perpustakaan UNP', 'Jl. Hamka, Air Tawar, Padang', '-0.8961165', '100.3471137', 'Kampus', '6', '1000'),
('ST-034', 'Universitas Muhammadiyah Sumbar', 'Jl. Pasie Kandang, Parupuk Tabing', '-0.8567062', '100.3326252', 'Kampus', '3', '1500'),
('ST-035', 'AMIK Indonesia', 'Jl. Khatib Sulaiman', '-0.91372', '100.358114', 'Kampus', '3', 'Belum '),
('ST-036', 'Universitas Bung Hatta', 'Jl. Bunda Raya, Ulak Karang', '-0.906817', '100.343559', 'Kampus', '4', '600'),
('ST-037', 'Universitas Ekasakti - AAI', 'Jl. Veteran Dalam, Banda Purus', '-0.9385967', '100.3561545', 'Kampus', '6', '800'),
('ST-038', 'STBA Prayoga', 'Jl. Veteran', '-0.9417261', '100.3549841', 'Sekolah', '5', 'Belum '),
('ST-039', 'SPR Plaza', 'Jl. M. Yamin', '-0.9512808', '100.3592065', 'Plaza', 'Belum ', 'Belum '),
('ST-040', 'Plaza Andalas', 'Jl. Pemuda', '-0.9499267', '100.3556899', 'Plaza', 'Belum ', 'Belum '),
('ST-041', 'Hotel Pangeran Beach ', 'Jl. Juanda', '-0.9238512', '100.3503189', 'Hotel', '7', 'Belum '),
('ST-042', 'Basko Hotel & Plaza', 'Jl. Hamka, Air Tawar, Padang', '-0.9017204', '100.3510345', 'Hotel', '8', 'Belum '),
('ST-043', 'Hotel Ibis ', 'Jl. Taman Siswa', '-0.9296815', '100.3630079', 'Hotel', '12', 'Belum '),
('ST-044', 'Hotel Daima', 'Jl. Sudirman', '-0.9439775', '100.3618737', 'Hotel', '6', 'Belum '),
('ST-045', 'Hotel Grand Zuri ', 'Jl. MH. Thamrin', '-0.9547283', '100.3643184', 'Hotel', '8', 'Belum '),
('ST-046', 'Hotel Rocky ', 'Jl. Permindo', '-0.9467053', '100.359286', 'Hotel', 'Belum ', 'Belum '),
('ST-047', 'Axana Hotel', 'Jl. Bundo Kanduang', '-0.954441', '100.359193', 'Hotel', 'Belum ', 'Belum '),
('ST-048', 'Bumi Minang Hotel', 'Jl. Gereja', '-0.9554737', '100.3585461', 'Hotel', '8', 'Belum '),
('ST-049', 'Hotel HW ', 'Jl. Hayam Wuruk', '-0.9585633', '100.3551701', 'Hotel', 'Belum ', 'Belum '),
('ST-050', 'Hotel Inna Muara ', 'Jl. Gereja', '-0.9565914', '100.3571106', 'Hotel', '6', 'Belum '),
('ST-051', 'Hotel Mercure ', 'Jl. Purus IV', '-0.9359077', '100.3527233', 'Hotel', 'Belum ', 'Belum '),
('ST-052', 'Rusunawa', 'Jl. Purus IV', '-0.9368663', '100.3519532', 'Perumahan', '5', 'Belum '),
('ST-053', 'Masjid Al Wustha', 'Jl. Veteran', '-0.938172', '100.3545609', 'Ibadah', '4', 'Belum '),
('ST-054', 'Masjid Muhajirin', 'Komp. Pasir Putih RT. 3 RW 5 Kel Bungo Pasang, Koto Tangah', '-0.8656363', '100.3358871', 'Ibadah', '3', '600'),
('ST-055', 'Masjid Raya Sumbar', 'Jl. Khatib Sulaiman', '-0.9242686', '100.3626424', 'Ibadah', '2', '15000'),
('ST-056', 'Masjid Taqwa Muhammadiyah', 'Jl. M. Yamin (Pasar Raya)', '-0.9517244', '100.3598402', 'Ibadah', '4', '2500'),
('ST-057', 'Shelter Air Tawar Timur ', 'Air Tawar Timur ', '-0.893613', '100.355738', 'Kantor', '4', '200');

-- --------------------------------------------------------

--
-- Table structure for table `markershelter`
--

CREATE TABLE IF NOT EXISTS `markershelter` (
  `idmarker` varchar(10) NOT NULL,
  `fungsimarker` varchar(25) NOT NULL,
  `marker` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markershelter`
--

INSERT INTO `markershelter` (`idmarker`, `fungsimarker`, `marker`) VALUES
('MARKER-001', 'Kantor', 'icon/marker.png'),
('MARKER-002', 'Rumahsakit', 'icon/marker.png'),
('MARKER-003', 'Pasar', 'icon/marker.png'),
('MARKER-004', 'Supermarket', 'icon/marker.png'),
('MARKER-005', 'Perumahan', 'icon/marker.png'),
('MARKER-006', 'Sekolah', 'icon/marker2.png'),
('MARKER-007', 'Kampus', 'icon/marker.png'),
('MARKER-008', 'Plaza', 'icon/marker.png'),
('MARKER-009', 'Hotel', 'icon/marker.png'),
('MARKER-010', 'Ibadah', 'icon/marker.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftarshelter`
--
ALTER TABLE `daftarshelter`
  ADD PRIMARY KEY (`idshelter`);

--
-- Indexes for table `markershelter`
--
ALTER TABLE `markershelter`
  ADD PRIMARY KEY (`idmarker`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
