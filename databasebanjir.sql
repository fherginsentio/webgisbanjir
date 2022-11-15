-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 13. Januari 2021 jam 14:31
-- Versi Server: 5.1.33
-- Versi PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `databasebanjir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email_admin` text NOT NULL,
  `almt_admin` text NOT NULL,
  `hp_admin` varchar(12) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `email_admin`, `almt_admin`, `hp_admin`, `password`) VALUES
('2020001', 'fhergin', 'fhergin_sentioputrana@gmail.com', 'jl.aurduri1', '08995607203', '2203dark');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kapasitas`
--

CREATE TABLE IF NOT EXISTS `tb_kapasitas` (
  `id_kapasitas` varchar(10) NOT NULL,
  `indeks_kapasitasdaerah` varchar(7) NOT NULL,
  `kelas_kapasitasdaerah` varchar(10) NOT NULL,
  `indeks_siapsiagalurah` varchar(7) NOT NULL,
  `kelas_siapsiagalurah` varchar(10) NOT NULL,
  `indeks_kapasitas` varchar(7) NOT NULL,
  `kelas_kapasitas` varchar(10) NOT NULL,
  `id_kec` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kapasitas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kapasitas`
--

INSERT INTO `tb_kapasitas` (`id_kapasitas`, `indeks_kapasitasdaerah`, `kelas_kapasitasdaerah`, `indeks_siapsiagalurah`, `kelas_siapsiagalurah`, `indeks_kapasitas`, `kelas_kapasitas`, `id_kec`) VALUES
('kap001', '0,433', 'SEDANG', '0,456', 'SEDANG', '0,447', 'SEDANG', 'kec001'),
('kap002', '0,433', 'SEDANG', '0,508', 'SEDANG', '0,478', 'SEDANG', 'kec002'),
('kap003', '0,433', 'SEDANG', '0,406', 'SEDANG', '0,417', 'SEDANG', 'kec003'),
('kap004', '0,433', 'SEDANG', '0,402', 'SEDANG', '0,415', 'SEDANG', 'kec004'),
('kap005', '0,433', 'SEDANG', '0,443', 'SEDANG', '0,439', 'SEDANG', 'kec005'),
('kap006', '0,433', 'SEDANG', '0,464', 'SEDANG', '0,452', 'SEDANG', 'kec006'),
('kap007', '0,433', 'SEDANG', '0,519', 'SEDANG', '0,485', 'SEDANG', 'kec007'),
('kap008', '0,433', 'SEDANG', '0,376', 'SEDANG', '0,399', 'SEDANG', 'kec008'),
('kap009', '0,433', 'SEDANG', '0,481', 'SEDANG', '0,462', 'SEDANG', 'kec009'),
('kap010', '0,433', 'SEDANG', '0,441', 'SEDANG', '0,438', 'SEDANG', 'kec010'),
('kap011', '0,433', 'SEDANG', '0,491', 'SEDANG', '0,468', 'SEDANG', 'kec011');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kecamatan`
--

CREATE TABLE IF NOT EXISTS `tb_kecamatan` (
  `id_kec` varchar(10) NOT NULL,
  `nama_kec` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kec`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kec`, `nama_kec`) VALUES
('kec001', 'BUNGUS TELUK KABUNG'),
('kec002', 'KOTO TANGAH'),
('kec003', 'KURANJI'),
('kec004', 'LUBUK BEGALUNG'),
('kec005', 'LUBUK KILANGAN'),
('kec006', 'NANGGALO'),
('kec007', 'PADANG BARAT'),
('kec008', 'PADANG SELATAN'),
('kec009', 'PADANG TIMUR'),
('kec010', 'PADANG UTARA'),
('kec011', 'PAUH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kerugian`
--

CREATE TABLE IF NOT EXISTS `tb_kerugian` (
  `id_rugi` varchar(10) NOT NULL,
  `fisik` varchar(7) NOT NULL,
  `ekonomi` varchar(7) NOT NULL,
  `tot_kerugianrupiah` varchar(7) NOT NULL,
  `indeks_kerugianrupiah` varchar(7) NOT NULL,
  `kelas_kerugianrupiah` varchar(10) NOT NULL,
  `tot_rusaklingkungan` varchar(4) NOT NULL,
  `indeks_rusaklingkungan` varchar(7) NOT NULL,
  `kelas_rusaklingkungan` varchar(10) NOT NULL,
  `id_kec` varchar(10) NOT NULL,
  PRIMARY KEY (`id_rugi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kerugian`
--

INSERT INTO `tb_kerugian` (`id_rugi`, `fisik`, `ekonomi`, `tot_kerugianrupiah`, `indeks_kerugianrupiah`, `kelas_kerugianrupiah`, `tot_rusaklingkungan`, `indeks_rusaklingkungan`, `kelas_rusaklingkungan`, `id_kec`) VALUES
('rugi001', '4,31', '7,98', '12,29', '0,299', 'RENDAH', '201', '0,383', 'SEDANG', 'kec001'),
('rugi002', '262,45', '115,17', '377,62', '0,394', 'SEDANG', '3.42', '0,436', 'SEDANG', 'kec002'),
('rugi003', '222,88', '59,44', '282,31', '0,400', 'SEDANG', '2.05', '0,444', 'SEDANG', 'kec003'),
('rugi004', '342,99', '16,40', '359,39', '0,352', 'SEDANG', '431', '0,385', 'SEDANG', 'kec004'),
('rugi005', '31,48', '14,45', '45,93', '0,338', 'SEDANG', '484', '0,428', 'SEDANG', 'kec005'),
('rugi006', '228,76', '18,78', '247,54', '0,400', 'SEDANG', '323', '0,389', 'SEDANG', 'kec006'),
('rugi007', '684,04', '9,77', '693,81', '0,373', 'SEDANG', '', '0,333', 'RENDAH', 'kec007'),
('rugi008', '271,39', '4,33', '275,72', '0,294', 'RENDAH', '72', '0,341', 'SEDANG', 'kec008'),
('rugi009', '631,08', '16,74', '647,82', '0,392', 'SEDANG', '193', '0,343', 'SEDANG', 'kec009'),
('rugi010', '453,07', '15,62', '468,70', '0,400', 'SEDANG', '171', '0,357', 'SEDANG', 'kec010'),
('rugi011', '46,64', '23,00', '69,64', '0,376', 'SEDANG', '1.01', '0,444', 'SEDANG', 'kec011');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_luasbahaya`
--

CREATE TABLE IF NOT EXISTS `tb_luasbahaya` (
  `id_luas` varchar(10) NOT NULL,
  `rendah` varchar(7) NOT NULL,
  `sedang` varchar(7) NOT NULL,
  `tinggi` varchar(7) NOT NULL,
  `tot_luas` varchar(7) NOT NULL,
  `indeks_bahaya` varchar(7) NOT NULL,
  `kelas_bahaya` varchar(10) NOT NULL,
  `id_kec` varchar(10) NOT NULL,
  PRIMARY KEY (`id_luas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_luasbahaya`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_terpapar`
--

CREATE TABLE IF NOT EXISTS `tb_terpapar` (
  `id_terpapar` varchar(10) NOT NULL,
  `penduduk_terpapar` varchar(6) NOT NULL,
  `rasio_jk` varchar(3) NOT NULL,
  `klmpk_umurrentan` varchar(5) NOT NULL,
  `penduduk_miskin` varchar(4) NOT NULL,
  `penduduk_cacat` varchar(4) NOT NULL,
  `indeks_terpapar` varchar(7) NOT NULL,
  `kelas_terpapar` varchar(10) NOT NULL,
  `id_kec` varchar(10) NOT NULL,
  PRIMARY KEY (`id_terpapar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_terpapar`
--

INSERT INTO `tb_terpapar` (`id_terpapar`, `penduduk_terpapar`, `rasio_jk`, `klmpk_umurrentan`, `penduduk_miskin`, `penduduk_cacat`, `indeks_terpapar`, `kelas_terpapar`, `id_kec`) VALUES
('tpp001', '5.298', '105', '1.531', '19', '13', '0,666', 'TINGGI', 'kec001'),
('tpp002', '149.11', '99', '9.431', '228', '319', '0,836', 'TINGGI', 'kec002'),
('tpp003', '125.77', '97', '8.777', '176', '151', '0,866', 'TINGGI', 'kec003'),
('tpp004', '51.633', '100', '10.23', '113', '125', '0,823', 'TINGGI', 'kec004'),
('tpp005', '24.378', '100', '2.154', '45', '59', '0,723', 'TINGGI', 'kec005'),
('tpp006', '58.501', '94', '2.249', '98', '128', '0,866', 'TINGGI', 'kec006'),
('tpp007', '39.359', '100', '7.925', '96', '90', '0,866', 'TINGGI', 'kec007'),
('tpp008', '19.379', '99', '4.838', '49', '79', '0,716', 'TINGGI', 'kec008'),
('tpp009', '75,535', '96', '11.69', '178', '78', '0,866', 'TINGGI', 'kec009'),
('tpp010', '65.662', '90', '6.184', '86', '184', '0,866', 'TINGGI', 'kec010'),
('tpp011', '34.075', '100', '9.307', '38', '100', '0,777', 'TINGGI', 'kec011');
