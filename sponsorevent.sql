-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2021 pada 03.17
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sponsorevent`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` varchar(6) NOT NULL,
  `id_event_creator` varchar(6) NOT NULL,
  `id_kategori_event` varchar(6) NOT NULL,
  `id_kategori_peserta` varchar(6) NOT NULL,
  `nama_event` varchar(40) NOT NULL,
  `tanggal` date NOT NULL,
  `proposal` text NOT NULL,
  `lokasi_event` text NOT NULL,
  `deskripsi_event` text NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `dana_anggaran` double NOT NULL DEFAULT 0,
  `dana_terkumpul` double NOT NULL DEFAULT 0,
  `tanggal_batas_pendanaan` date NOT NULL,
  `status_terdanai` varchar(40) NOT NULL,
  `feedback` text NOT NULL,
  `tanggal_terlaksana` date DEFAULT NULL,
  `status_terlaksana` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `id_event_creator`, `id_kategori_event`, `id_kategori_peserta`, `nama_event`, `tanggal`, `proposal`, `lokasi_event`, `deskripsi_event`, `jumlah_peserta`, `dana_anggaran`, `dana_terkumpul`, `tanggal_batas_pendanaan`, `status_terdanai`, `feedback`, `tanggal_terlaksana`, `status_terlaksana`) VALUES
('EVT001', 'ECT001', 'KTE007', 'IKT004', 'school contest', '2021-04-08', 'EVT001_2021-04-20_05-19-46_proposaldensel.pdf', ' lapangan SMA Negeri 2 Kediri', 'kompetisi band antar SMA se - karisidenan Kediri ', 500, 50000000, 6500000, '2021-04-01', 'BELUM TERDANAI', ' para sponsor mendapatkan masing - masing 1 tenda untuk promosi dan di promosikan di panggung juga.', '0000-00-00', 'belum terlaksana'),
('EVT002', 'ECT001', 'KTE004', 'IKT005', 'Pahaya', '2021-06-15', 'EVT002_2021-04-08_10-43-08_proposal3.pdf', ' Halaman SMA Negeri 2 Kediri', ' Pameran buku - buku dari para distributor yang bekerja sama dengan sekolah', 200, 20000000, 5000000, '2021-04-01', 'BELUM TERDANAI', ' sponsor mendapatkan promosi di panggung dan banner promosi bersama banner event.', '0000-00-00', 'belum terlaksana'),
('EVT003', 'ECT002', 'KTE009', 'IKT007', 'Wilis Wana Laga', '2021-11-07', 'EVT003_2021-04-08_10-51-21_proposal6.pdf', ' Start air merambat Roro Kuning\r\nFinish lapangan desa Sukorejo Sawahan', ' Lomba napak tilas route gerilya panglima besar jendral Sudirman', 1000, 150000000, 50000000, '2021-10-24', 'BELUM TERDANAI', 'di sediakan tenda di lapangan untuk promosi. mendapatkan promosi dipanggung. untuk produk yang memadai di pergunakan untuk acara.', '0000-00-00', 'belum terlaksana'),
('EVT004', 'ECT002', 'KTE008', 'IKT007', 'Live Musik', '2021-04-14', 'EVT004_2021-04-08_10-56-22_Proposal5.pdf', ' Stadion Anjuk Ladang Nganjuk', ' Parade musik untuk memperingati hari jadi kota Nganjuk', 300, 100000000, 37500000, '2021-04-10', 'BELUM TERDANAI', ' mendapatkan tenda promosi dan promosi dipanggung', '0000-00-00', 'belum terlaksana'),
('EVT005', 'ECT002', 'KTE011', 'IKT007', 'Bonsai Raya', '2021-07-06', 'EVT005_2021-04-08_12-59-07_proposal8.pdf', ' Alun - alun Kabupaten Nganjuk', ' pameran tanaman bonsai se kabupaten Nganjuk', 200, 30000000, 9000000, '2021-06-26', 'BELUM TERDANAI', ' Promosi di panggung, banner dan umbul - umbul. ', '0000-00-00', 'belum terlaksana'),
('EVT006', 'ECT003', 'KTE010', 'IKT005', 'Seminara', '2021-05-27', 'EVT006_2021-04-08_01-05-49_proposal6.pdf', ' Gedung Balai desa Tanjunganom', ' Seminar tentang penyalahgunaan narkoba, AIDS, dan pergaulan bebas', 300, 25000000, 8000000, '2021-05-13', 'BELUM TERDANAI', ' promosi di panggung dan penggunaan produk untuk acara', '0000-00-00', 'belum terlaksana'),
('EVT007', 'ECT003', 'KTE014', 'IKT007', 'Bazar UMKM dan lomba menyanyi', '2021-08-14', 'EVT007_2021-04-08_01-11-01_proposal3.pdf', ' Stadion Warujayeng, Nganjuk', 'Bazar UMKM sekecamatan Tanjunganom dan lomba menyanyi dewasa dalam rangka memperingati HUT RI ', 500, 50000000, 17500000, '2021-08-01', 'BELUM TERDANAI', ' promosi di panggung, tanda promosi, dan umbul - umbul sponsor.', '0000-00-00', 'belum terlaksana'),
('EVT008', 'ECT003', 'KTE015', 'IKT006', 'Lomba memasak makanan khas', '2021-06-01', 'EVT008_2021-04-08_01-19-54_proposal1.pdf', ' Gedung Balai desa Tanjunganom', ' perlombaaan memasak untuk ibu - ibu PKK se kecamatan Tanjunganom', 150, 35000000, 4000000, '2021-05-25', 'BELUM TERDANAI', ' promosi produk di panggung, stan untuk menjual produk dan juga penggunaan produk untuk acara', '0000-00-00', 'belum terlaksana'),
('EVT009', 'ECT003', 'KTE003', 'IKT001', 'Lomba Mewarnai Mamamia', '2021-08-05', 'EVT009_2021-04-08_02-30-55_Proposal5.pdf', ' Balai desa Tanjunganom, Nganjuk', ' Lomba mewarnai tingkat PAUD dan TK didampingi ibu siswa', 250, 20000000, 4500000, '2021-07-24', 'BELUM TERDANAI', ' Promosi produk, penggunaan dan produk dalam kegiatan', '0000-00-00', 'belum terlaksana'),
('EVT010', 'ECT004', 'KTE009', 'IKT004', 'Raimuna Cabang', '2021-08-13', 'EVT010_2021-04-08_02-42-30_proposal6.pdf', ' Bumi perkemahan Plangkat Bajulan, Nganjuk', ' Perkemahan pramuka penegak yang berisi lomba - lomba guna meningkatkan kreatifitas para anggotanya guna memperingati hari Pramuka.', 400, 150000000, 8500000, '2021-08-01', 'BELUM TERDANAI', ' promosi produk, penggunaaan produk dalam kegiatan dan umbul - umbul.', '0000-00-00', 'belum terlaksana'),
('EVT011', 'ECT004', 'KTE009', 'IKT004', 'LT II', '2021-09-15', 'EVT011_2021-04-08_03-11-32_proposal8.pdf', 'lapangan sugihwaras, Prambon, Nganjuk', ' Lomba tingkat provinsi bagi anggota Pramuka penegak yang di adakan tiap 2 tahun sekali.', 250, 150000000, 5500000, '2021-09-02', 'BELUM TERDANAI', ' produknya di gunakan saat acara, promosi dan juga umbul - umbul.', '0000-00-00', 'belum terlaksana'),
('EVT012', 'ECT005', 'KTE002', 'IKT007', 'Nganjuk Contest And Show Car', '2021-04-16', 'EVT012_2021-04-08_03-28-37_proposal6.pdf', ' Stadion Warujayeng, Nganjuk', ' temu kangen dan kompetisi mobil accord maestro', 100, 100000000, 46000000, '2021-04-10', 'BELUM TERDANAI', ' Promosi produk, tenda penjualan dan juga umbul - umbul.', '0000-00-00', 'belum terlaksana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_creator`
--

CREATE TABLE `event_creator` (
  `id_event_creator` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `nama_eo` varchar(20) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event_creator`
--

INSERT INTO `event_creator` (`id_event_creator`, `id_user`, `nama_eo`, `alamat`, `no_telp`) VALUES
('ECT001', 'USR001', 'OSIS SMA 2 Kediri', 'Jl. Veteran no.7, Mojoroto, Kec. Mojorot', '081344563780'),
('ECT002', 'USR002', 'Dinas Pariwisata Nga', ' Jl. Diponegoro No.77, Ganung Kidul, Kec', '081375674343'),
('ECT003', 'USR003', 'Karang Taruna Anom', 'Jl.Imam Bonjol, No. 35, Warujayeng, Tanj', '085586574546'),
('ECT004', 'USR004', 'DKC Anjuk Ladang', 'Jl. Sutoyo No. 02, Nganjuk', '085321236787'),
('ECT005', 'USR005', 'HAP JATIM', 'Jl. Diponegoro No. 20,  Prambon, Nganjuk', '085546769091');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_event`
--

CREATE TABLE `foto_event` (
  `id_foto_event` int(11) NOT NULL,
  `id_event` varchar(6) NOT NULL,
  `nama_foto_event` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_event`
--

CREATE TABLE `kategori_event` (
  `id_kategori_event` varchar(6) NOT NULL,
  `kategori_event` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_event`
--

INSERT INTO `kategori_event` (`id_kategori_event`, `kategori_event`) VALUES
('KTE001', 'Pameran Musik dan Bazar Musik'),
('KTE002', 'Otomotif Pameran Mobil'),
('KTE003', 'Lomba Mewarnai'),
('KTE004', 'Pameran Buku Dan Bazar Buku'),
('KTE005', 'Olahraga'),
('KTE006', 'Pendidikan'),
('KTE007', 'Festival Musik'),
('KTE008', 'Parade Musik'),
('KTE009', 'Lomba Pecinta Alam'),
('KTE010', 'Seminar Kesehatan'),
('KTE011', 'Pameran Tanaman'),
('KTE012', 'Ulang Tahun Sekolah'),
('KTE013', 'Otomotif Pameran Motor'),
('KTE014', 'Bazar Makanan dan Minuman'),
('KTE015', 'Lomba Memasak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_peserta`
--

CREATE TABLE `kategori_peserta` (
  `id_kategori_peserta` varchar(6) NOT NULL,
  `kategori_peserta` text NOT NULL,
  `deskripsi_kategori_peserta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_peserta`
--

INSERT INTO `kategori_peserta` (`id_kategori_peserta`, `kategori_peserta`, `deskripsi_kategori_peserta`) VALUES
('IKT001', 'Dibawah 7 Tahun', 'Anak-Anak Usia Dibawah 7 Tahuh'),
('IKT002', 'Diatas 7 Tahun Dibawah 13 Tahun', 'Usia Anak diatas 7 tahun sampai dibawah 13 tahun atau setingkat anak sekolah dasar'),
('IKT003', 'Usia diatas 13 tahun Dibawah 17 tahun', 'Usia remaja diatas usia 13 tahun dan dibawah 17 tahun atau setingkat anak sekolah menengah pertama'),
('IKT004', 'Diatas umur 16 tahun Dibawah umur 19 tahun', 'Usia remaja diatas umur 16 tahun dibawah 19 tahun atau setingkat sekolah menengah atas'),
('IKT005', 'Usia diatas 13 tahun dibawah 19 tahun', 'Usia remaja diatas 13 tahun di bawah 19 tahun atau setingkat sekolah menengah pertama dan sekolah menengah atas'),
('IKT006', 'Umum Wanita', 'Usia tidak ada batas umur tertentu dikhususkan untuk perempuan '),
('IKT007', 'Umum', 'Tidak ada batasan umur baik wanita dan pria');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_sponsorship`
--

CREATE TABLE `kategori_sponsorship` (
  `id_kategori_sponsorship` varchar(6) NOT NULL,
  `nama_kategori_sponsorship` text NOT NULL,
  `deskripsi_kategori_sponsorship` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_sponsorship`
--

INSERT INTO `kategori_sponsorship` (`id_kategori_sponsorship`, `nama_kategori_sponsorship`, `deskripsi_kategori_sponsorship`) VALUES
('IKS001', 'Produk Kesehatan', 'Semua jenis usaha produk kesehatan dan produsen produk kesehatan'),
('IKS002', 'Produk Kecantikan', 'Semua jenus usaha di bidang kecantikan dan Produsen bidang kecantikan'),
('IKS003', 'Produk Sport Olahraga', 'Semua usaha di bidang produk olahraga atau produsen di bidang produk olahraga'),
('IKS004', 'Produk Elektronik dan IT', 'Semua usaha di bidang elektronik dan IT atau produsen di bidang elektronik dan IT'),
('IKS005', 'Produk Otomotif', 'Semua usaha di bidang otomotif atau produsen di bidang otomotif'),
('IKS006', 'Produk Makanan dan Minuman', 'Semua usaha di bidang makanan dan minuman atau produsen makanan dan minuman'),
('IKS007', 'Produk Textile', 'Usaha di bidang textile seperti kaos, celana, kain dan barang pakaian '),
('IKS008', 'Produk Rokok', 'Produsen yang memproduksi rokok'),
('IKS009', 'Jasa Percetakan', 'Usaha yang bergerak di bidang jasa percetakan undangan,banner, spanduk, tanggalan dan lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_event`
--

CREATE TABLE `pengajuan_event` (
  `id_pengajuan_event` varchar(6) NOT NULL,
  `id_event` varchar(6) NOT NULL,
  `id_sponsorship` varchar(6) NOT NULL,
  `dana_event` int(20) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_event`
--

INSERT INTO `pengajuan_event` (`id_pengajuan_event`, `id_event`, `id_sponsorship`, `dana_event`, `status`) VALUES
('PJE001', 'EVT001', 'SPR001', 5000000, 'DI TERIMA'),
('PJE002', 'EVT001', 'SPR004', 0, 'DI TOLAK'),
('PJE003', 'EVT002', 'SPR002', 0, 'DI TOLAK'),
('PJE004', 'EVT002', 'SPR005', 5000000, 'DI TERIMA'),
('PJE005', 'EVT001', 'SPR002', 0, 'DI TOLAK'),
('PJE006', 'EVT001', 'SPR003', 1500000, 'DI TERIMA'),
('PJE007', 'EVT003', 'SPR001', 15000000, 'DI TERIMA'),
('PJE008', 'EVT004', 'SPR001', 10000000, 'DI TERIMA'),
('PJE009', 'EVT005', 'SPR001', 0, 'DI TOLAK'),
('PJE010', 'EVT003', 'SPR002', 3000000, 'DI TERIMA'),
('PJE011', 'EVT004', 'SPR002', 0, 'DI TOLAK'),
('PJE012', 'EVT005', 'SPR002', 3000000, 'DI TERIMA'),
('PJE013', 'EVT003', 'SPR003', 2000000, 'DI TERIMA'),
('PJE014', 'EVT004', 'SPR003', 3000000, 'DI TERIMA'),
('PJE015', 'EVT005', 'SPR003', 0, 'DI TOLAK'),
('PJE016', 'EVT003', 'SPR004', 15000000, 'DI TERIMA'),
('PJE017', 'EVT004', 'SPR004', 0, 'DI TOLAK'),
('PJE018', 'EVT005', 'SPR004', 3000000, 'DI TERIMA'),
('PJE019', 'EVT003', 'SPR005', 3500000, 'DI TERIMA'),
('PJE020', 'EVT004', 'SPR005', 0, 'DI TOLAK'),
('PJE021', 'EVT005', 'SPR005', NULL, 'DI AJUKAN'),
('PJE022', 'EVT003', 'SPR006', 0, 'DI TOLAK'),
('PJE023', 'EVT004', 'SPR006', 2000000, 'DI TERIMA'),
('PJE024', 'EVT005', 'SPR006', 0, 'DI TOLAK'),
('PJE025', 'EVT003', 'SPR007', 3500000, 'DI TERIMA'),
('PJE026', 'EVT004', 'SPR007', 7500000, 'DI TERIMA'),
('PJE027', 'EVT005', 'SPR007', 1000000, 'DI TERIMA'),
('PJE028', 'EVT003', 'SPR008', 5000000, 'DI TERIMA'),
('PJE029', 'EVT004', 'SPR008', 0, 'DI TOLAK'),
('PJE030', 'EVT005', 'SPR008', NULL, 'DI AJUKAN'),
('PJE031', 'EVT004', 'SPR009', 15000000, 'DI TERIMA'),
('PJE032', 'EVT003', 'SPR010', 3000000, 'DI TERIMA'),
('PJE033', 'EVT004', 'SPR010', 0, 'DI TOLAK'),
('PJE034', 'EVT005', 'SPR010', 2000000, 'DI TERIMA'),
('PJE035', 'EVT007', 'SPR001', 2500000, 'DI TERIMA'),
('PJE036', 'EVT008', 'SPR001', 0, 'DI TOLAK'),
('PJE037', 'EVT006', 'SPR002', 5000000, 'DI TERIMA'),
('PJE038', 'EVT008', 'SPR002', NULL, 'DI AJUKAN'),
('PJE039', 'EVT007', 'SPR003', NULL, 'DI AJUKAN'),
('PJE040', 'EVT007', 'SPR004', 4000000, 'DI TERIMA'),
('PJE041', 'EVT008', 'SPR003', 0, 'DI TOLAK'),
('PJE042', 'EVT006', 'SPR005', 3000000, 'DI TERIMA'),
('PJE043', 'EVT009', 'SPR005', 4500000, 'DI TERIMA'),
('PJE044', 'EVT007', 'SPR006', 7000000, 'DI TERIMA'),
('PJE045', 'EVT008', 'SPR006', 1500000, 'DI TERIMA'),
('PJE046', 'EVT007', 'SPR010', 4000000, 'DI TERIMA'),
('PJE047', 'EVT008', 'SPR010', 2500000, 'DI TERIMA'),
('PJE048', 'EVT010', 'SPR001', NULL, 'DI AJUKAN'),
('PJE049', 'EVT011', 'SPR001', NULL, 'DI AJUKAN'),
('PJE050', 'EVT010', 'SPR002', 5000000, 'DI TERIMA'),
('PJE051', 'EVT011', 'SPR002', NULL, 'DI AJUKAN'),
('PJE052', 'EVT010', 'SPR003', NULL, 'DI AJUKAN'),
('PJE053', 'EVT011', 'SPR003', NULL, 'DI AJUKAN'),
('PJE054', 'EVT010', 'SPR004', NULL, 'DI AJUKAN'),
('PJE055', 'EVT011', 'SPR004', 1000000, 'DI TERIMA'),
('PJE056', 'EVT010', 'SPR005', 1000000, 'DI TERIMA'),
('PJE057', 'EVT011', 'SPR005', 1000000, 'DI TERIMA'),
('PJE058', 'EVT010', 'SPR006', NULL, 'DI AJUKAN'),
('PJE059', 'EVT011', 'SPR006', NULL, 'DI AJUKAN'),
('PJE060', 'EVT010', 'SPR007', NULL, 'DI AJUKAN'),
('PJE061', 'EVT011', 'SPR007', 0, 'DI TOLAK'),
('PJE062', 'EVT010', 'SPR008', 2500000, 'DI TERIMA'),
('PJE063', 'EVT011', 'SPR008', 1500000, 'DI TERIMA'),
('PJE064', 'EVT010', 'SPR010', NULL, 'DI AJUKAN'),
('PJE065', 'EVT011', 'SPR010', 2000000, 'DI TERIMA'),
('PJE066', 'EVT012', 'SPR003', 1000000, 'DI TERIMA'),
('PJE067', 'EVT012', 'SPR004', 0, 'DI TOLAK'),
('PJE068', 'EVT012', 'SPR006', NULL, 'DI AJUKAN'),
('PJE069', 'EVT012', 'SPR007', 20000000, 'DI TERIMA'),
('PJE070', 'EVT012', 'SPR008', 0, 'DI TOLAK'),
('PJE071', 'EVT012', 'SPR009', 20000000, 'DI TERIMA'),
('PJE072', 'EVT012', 'SPR010', 5000000, 'DI TERIMA');

--
-- Trigger `pengajuan_event`
--
DELIMITER $$
CREATE TRIGGER `update_dana_terkumpul` AFTER UPDATE ON `pengajuan_event` FOR EACH ROW BEGIN
 UPDATE event SET dana_terkumpul=dana_terkumpul+NEW.dana_event,
 				status_terdanai = IF(dana_terkumpul >= dana_anggaran,"SUDAH TERDANAI",status_terdanai)
 WHERE id_event=NEW.id_event;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sponsorship`
--

CREATE TABLE `sponsorship` (
  `id_sponsorship` varchar(6) NOT NULL,
  `id_user` varchar(6) DEFAULT NULL,
  `id_kategori_sponsorship` varchar(6) NOT NULL,
  `judul_sponsorship` text NOT NULL,
  `nama_sponsorship` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `deskripsi_sponsorship` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sponsorship`
--

INSERT INTO `sponsorship` (`id_sponsorship`, `id_user`, `id_kategori_sponsorship`, `judul_sponsorship`, `nama_sponsorship`, `alamat`, `no_telp`, `deskripsi_sponsorship`) VALUES
('SPR001', 'USR006', 'IKS005', 'Dealer motor honda', 'ANDRE MOTOR', 'Jl. Mawar No.02, Prambon, Nganjuk', '081932436547', 'dealer sepedah motor yang menjual produk motor honda'),
('SPR002', 'USR007', 'IKS001', 'Apotik', 'Apotik Sono Farma', 'Jl. Gading No.45, Prambon, Nganjuk', '0356 54376', 'Toko yang menjual obat dan juga alat - alat kesehatan'),
('SPR003', 'USR008', 'IKS004', 'Counter HP dan Laptop', 'EKA CELL', 'Jl. Jetis No. 04, Jetis, Tanjunganom, Nganjuk', '085354376532', 'bergerak di bidang penjualan hp semua merk, laptop, acc hp dan laptop serta melayani service hp.'),
('SPR004', 'USR009', 'IKS007', 'Pengrajin kain batik tradisional', 'Batik TETUKO', 'Ds. Sumberkepuh, Tanjunganom, Nganjuk', '081933546754', 'produsen kain batik tradisional secara tulis dan cap'),
('SPR005', 'USR010', 'IKS009', 'Foto Copy dan Percetakan Buku', 'Rama Media', 'Jln Ngetrep, Prambon,Nganjuk', '085799414352', 'Toko foto copy dan juga menerima percetakan buku,undanganddan lain-lain'),
('SPR006', 'USR011', 'IKS006', 'Gethuk Pisang', 'Bu Tutik Getuk', 'Tanjungtani, Prambon, Nganjuk', '081245678584', 'Produsen gethuk pisang asli'),
('SPR007', 'USR012', 'IKS005', 'toko spareparts dan bengkel mobil', 'Lala Auto Mobil', 'Jl. Sutoyo No. 32, Berbek, Nganjuk', '085686543276', 'menjual segala jenis spareparts mobil dan bengkel mobil segala merk'),
('SPR008', 'USR013', 'IKS003', 'pabrik shuttlechock', 'PT. Adicipta', 'Jl. Surabaya - Madiun No. 54, Sukomoro, Nganjuk', '0356 43243', 'pabrik yang memproduksi shuttlechock di area Nganjuk'),
('SPR009', 'USR014', 'IKS008', 'pabrik rokok', 'PT.Tosa', 'Jl. RA. Kartini No. 34, Loceret, Nganjuk', '0356 76548', 'pabrik yang memproduksi rokok kretek'),
('SPR010', 'USR015', 'IKS006', 'pabrik manisan nanas', 'CV. Arunika', 'Jl. Melati No. 23, Kertosono, Nganjuk', '081255764321', 'pabrik rumahan yang memproduksi manisan nanas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(6) NOT NULL,
  `email` char(30) NOT NULL,
  `password` char(20) NOT NULL,
  `level` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `level`) VALUES
('USR001', 'smadaosis@gmail.com', 'smadakediri', 'event_creator'),
('USR002', 'disparnganjuk@yahoo.com', 'dinaspariwisata', 'event_creator'),
('USR003', 'kt_tanjunganom@gmail.co.id', 'pemudapemudi', 'event_creator'),
('USR004', 'dkc_anjukladang@pramuka.co.id', 'dewankerja', 'event_creator'),
('USR005', 'hap_jatim@yahoo.co.id', 'accordselamanya', 'event_creator'),
('USR006', 'andremotor@gmail.com', 'andre1357', 'sponsorship'),
('USR007', 'sonofarma@yahoo.com', 'sonofarma', 'sponsorship'),
('USR008', 'ekacell@eka.co.id', 'ekacelluler', 'sponsorship'),
('USR009', 'batik_tetuko@yahoo.co.id', 'tetuko1234', 'sponsorship'),
('USR010', 'mediarama@gmail.com', 'ramamedia45', 'sponsorship'),
('USR011', 'getuk_tutik@yahoo.com', 'getuktutik', 'sponsorship'),
('USR012', 'lalaauto@gmail.co.id', 'lalaautomobil', 'sponsorship'),
('USR013', 'adicipta12@adi.com', 'adicipta57', 'sponsorship'),
('USR014', 'tosa@pt.co.id', 'rokoktosa', 'sponsorship'),
('USR015', 'arunika@gmail.com', 'arunika16', 'sponsorship');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_eventcreator` (`id_event_creator`),
  ADD KEY `id_kategori_event` (`id_kategori_event`),
  ADD KEY `id_kategori_peserta` (`id_kategori_peserta`);

--
-- Indeks untuk tabel `event_creator`
--
ALTER TABLE `event_creator`
  ADD PRIMARY KEY (`id_event_creator`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `foto_event`
--
ALTER TABLE `foto_event`
  ADD PRIMARY KEY (`id_foto_event`);

--
-- Indeks untuk tabel `kategori_event`
--
ALTER TABLE `kategori_event`
  ADD PRIMARY KEY (`id_kategori_event`);

--
-- Indeks untuk tabel `kategori_peserta`
--
ALTER TABLE `kategori_peserta`
  ADD PRIMARY KEY (`id_kategori_peserta`);

--
-- Indeks untuk tabel `kategori_sponsorship`
--
ALTER TABLE `kategori_sponsorship`
  ADD PRIMARY KEY (`id_kategori_sponsorship`);

--
-- Indeks untuk tabel `pengajuan_event`
--
ALTER TABLE `pengajuan_event`
  ADD PRIMARY KEY (`id_pengajuan_event`);

--
-- Indeks untuk tabel `sponsorship`
--
ALTER TABLE `sponsorship`
  ADD PRIMARY KEY (`id_sponsorship`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `foto_event`
--
ALTER TABLE `foto_event`
  MODIFY `id_foto_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sponsorship`
--
ALTER TABLE `sponsorship`
  ADD CONSTRAINT `sponsorship_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
