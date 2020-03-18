-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 05:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k4991560_webtour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin_nama` varchar(50) DEFAULT NULL,
  `admin_username` varchar(100) DEFAULT NULL,
  `admin_password` varchar(32) DEFAULT NULL,
  `admin_view_password` varchar(32) DEFAULT NULL,
  `admin_level` char(2) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_nama`, `admin_username`, `admin_password`, `admin_view_password`, `admin_level`) VALUES
(1, 'admin', 'admin', 'e00cf25ad42683b3df678c61f42c6bda', 'admin1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE `mainmenu` (
  `seq` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `active_menu` varchar(50) NOT NULL,
  `icon_class` varchar(50) NOT NULL,
  `link_menu` varchar(50) NOT NULL,
  `menu_akses` varchar(12) NOT NULL,
  `entry_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_user` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`seq`, `idmenu`, `nama_menu`, `active_menu`, `icon_class`, `link_menu`, `menu_akses`, `entry_date`, `entry_user`) VALUES
(9, 9, 'Beranda', '', 'fas fa-home fa-2x', 'C_beranda', '', '2018-12-27 15:56:31', NULL),
(10, 10, 'Paket Wisata', '', 'fas fa-box-open fa-2x', 'C_produk', '', '2019-03-27 06:54:59', NULL),
(11, 11, 'Galeri', '', 'fa fa-images fa-2x', 'C_galeri', '', '2018-12-27 15:56:31', NULL),
(12, 12, 'Kontak', '', 'fa fa-phone fa-2x', 'Kontak', '', '2018-12-28 13:13:02', NULL),
(13, 13, 'Setting Ukuran', '', 'fas fa-cogs fa-2x', 'Setting_ukuran', '', '2019-01-09 09:00:09', NULL),
(14, 14, 'Setting Title', '', 'fas fa-wrench fa-2x', 'Setting_title', '', '2019-01-09 10:43:03', NULL),
(15, 15, 'Setting User', '', 'fas fa-user fa-2x', 'setting_user', '', '2019-01-09 15:10:21', NULL),
(19, 16, 'Aktivitas', '', 'fas fa-box-open fa-2x', 'C_aktivitas', '', '2019-02-07 09:59:17', NULL),
(20, 17, 'Pendaftaran', '', 'fas fa-user fa-2x', 'Pendaftaran', '', '2020-03-16 09:29:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meta_beranda`
--

CREATE TABLE `meta_beranda` (
  `id_meta_beranda` int(11) NOT NULL,
  `title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `link_canonical` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta_beranda`
--

INSERT INTO `meta_beranda` (`id_meta_beranda`, `title`, `meta_keyword`, `meta_description`, `link_canonical`) VALUES
(1, 'Berandae', 'keyworde', 'desce', '11');

-- --------------------------------------------------------

--
-- Table structure for table `meta_galeri`
--

CREATE TABLE `meta_galeri` (
  `id_meta_galeri` int(11) NOT NULL,
  `title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `link_canonical` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta_galeri`
--

INSERT INTO `meta_galeri` (`id_meta_galeri`, `title`, `meta_keyword`, `meta_description`, `link_canonical`) VALUES
(1, 'Galerie', 'keyworde', 'alale', '11');

-- --------------------------------------------------------

--
-- Table structure for table `meta_kontak`
--

CREATE TABLE `meta_kontak` (
  `id_meta_kontak` int(11) NOT NULL,
  `title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `link_canonical` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta_kontak`
--

INSERT INTO `meta_kontak` (`id_meta_kontak`, `title`, `meta_keyword`, `meta_description`, `link_canonical`) VALUES
(1, 'Kontake', 'keyworde', 'yryee', '11');

-- --------------------------------------------------------

--
-- Table structure for table `meta_produk`
--

CREATE TABLE `meta_produk` (
  `id_meta_produk` int(11) NOT NULL,
  `title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `link_canonical` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta_produk`
--

INSERT INTO `meta_produk` (`id_meta_produk`, `title`, `meta_keyword`, `meta_description`, `link_canonical`) VALUES
(1, 'Produke', 'keyworde', 'oooooe', '11');

-- --------------------------------------------------------

--
-- Table structure for table `setting_ukuran`
--

CREATE TABLE `setting_ukuran` (
  `id_setting_ukuran` int(11) NOT NULL,
  `ukuran_foto_slider` char(15) NOT NULL,
  `ukuran_foto_tentang` char(15) NOT NULL,
  `ukuran_foto_produk` char(15) NOT NULL,
  `ukuran_foto_galeri` char(15) NOT NULL,
  `footer` char(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_ukuran`
--

INSERT INTO `setting_ukuran` (`id_setting_ukuran`, `ukuran_foto_slider`, `ukuran_foto_tentang`, `ukuran_foto_produk`, `ukuran_foto_galeri`, `footer`) VALUES
(1, '1000x500', '1000x1000', '2000x2000', '400x500', '200x200');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id_sub` int(11) NOT NULL,
  `nama_sub` varchar(50) NOT NULL,
  `mainmenu_idmenu` int(11) NOT NULL,
  `active_sub` varchar(20) NOT NULL,
  `icon_class` varchar(100) NOT NULL,
  `link_sub` varchar(50) NOT NULL,
  `sub_akses` varchar(12) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_user` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_sub`, `nama_sub`, `mainmenu_idmenu`, `active_sub`, `icon_class`, `link_sub`, `sub_akses`, `entry_date`, `entry_user`) VALUES
(1, 'Entry User', 8, '', '', 'User', '', '2017-10-18 00:28:25', NULL),
(2, 'Kategori Produk', 4, '', '', 'Produk', '', '2017-10-18 00:34:17', NULL),
(3, 'Produk', 4, '', '', 'Produk/detail', '', '2017-10-18 00:34:26', NULL),
(4, 'Album', 5, '', '', 'Gallery', '', '2017-10-18 00:34:34', NULL),
(5, 'Foto', 5, '', '', 'Gallery/foto', '', '2017-10-18 00:34:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tab_akses_mainmenu`
--

CREATE TABLE `tab_akses_mainmenu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `c` int(11) DEFAULT '0',
  `r` int(11) DEFAULT '0',
  `u` int(11) DEFAULT '0',
  `d` int(11) DEFAULT '0',
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_user` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_akses_mainmenu`
--

INSERT INTO `tab_akses_mainmenu` (`id`, `id_menu`, `id_level`, `c`, `r`, `u`, `d`, `entry_date`, `entry_user`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL, '2017-09-25 23:49:01', 'direktur'),
(8, 7, 1, 0, 1, 0, 0, '2017-10-27 03:52:10', ''),
(9, 9, 1, 0, 1, 0, 0, '2018-01-20 04:05:57', ''),
(10, 10, 1, 0, 1, 0, 0, '2018-12-27 10:29:38', ''),
(11, 11, 1, 0, 1, 0, 0, '2018-12-27 10:29:38', ''),
(12, 12, 1, 0, 1, 0, 0, '2018-12-27 10:29:38', ''),
(13, 13, 1, 0, 1, 0, 0, '2019-01-08 11:27:14', ''),
(14, 14, 1, 0, 1, 0, 0, '2019-01-09 10:43:47', ''),
(15, 15, 1, 0, 1, 0, 0, '2019-01-09 14:59:44', ''),
(23, 16, 1, 0, 1, 0, 0, '2019-02-07 10:00:02', ''),
(24, 17, 1, 0, 1, 0, 0, '2020-03-16 09:31:08', '');

-- --------------------------------------------------------

--
-- Table structure for table `tab_akses_submenu`
--

CREATE TABLE `tab_akses_submenu` (
  `id` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `c` int(11) DEFAULT '0',
  `r` int(11) DEFAULT '0',
  `u` int(11) DEFAULT '0',
  `d` int(11) DEFAULT '0',
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_user` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_akses_submenu`
--

INSERT INTO `tab_akses_submenu` (`id`, `id_sub_menu`, `id_level`, `c`, `r`, `u`, `d`, `entry_date`, `entry_user`) VALUES
(1, 1, 1, 0, 1, 0, 0, '2017-10-14 00:45:40', ''),
(2, 2, 1, 0, 1, 0, 0, '2017-10-16 05:59:02', ''),
(3, 3, 1, 0, 0, 0, 0, '2017-10-18 11:12:32', ''),
(4, 4, 1, 0, 1, 0, 0, '2017-10-16 05:59:16', ''),
(5, 5, 1, 0, 0, 0, 0, '2017-10-18 11:12:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `nama_aktivitas` text NOT NULL,
  `file_foto_aktivitas` text NOT NULL,
  `deskripsi_aktivitas` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aktivitas`
--

INSERT INTO `tb_aktivitas` (`id_aktivitas`, `nama_aktivitas`, `file_foto_aktivitas`, `deskripsi_aktivitas`) VALUES
(1, 'Makalah NuruddinHady Diksusi Lapasila', 'gambar.jpg', 'Dalam    sejarah    ketatanegaraanIndonesia,    pada    saat penyusunan   UUD   1945oleh   Badan   Penyelidik   Usaha-Usaha Persiapan  Kemerdekaan  Indonesia atau  biasa  di  singkat  BPUPKI, maupun  dalam  perdebatan  di sidang-sidang Dewan Konstituante, persoalan susunannegara menjadi   sebuah   perdebatan   yang sangat   menarik   pada   saat   itu,   meskipuntidak   semenarikperdebatan  dalam pembahasan  dasar  Negara,3tetapi  perdebatan tentang susunannegara patut untuk mendapatkan perhatianyang sangat     serius, karena dari aspek perjalanan sejarahketatanegaraanRepublik Indonesia  pernah mengalami  perubahan ke susunannegarafederal,  yaitu  menjadi  Republik  Indonesia Serikat   (RIS) dengan   Konstitusi   RIS   tahun   1949, disamping susunannegara kesatuan dalam UUD 1945 dan UUDS 1950. '),
(2, 'Makalah PENATAAN KEWENANGAN MPR', 'gambar.jpg', 'Perdebatan  yangselalu  muncul akhir-akhir  inidiranah  publik, terkait  denganposisi  dan  kewenangan  Majelis  Permusyawaratan Rakyat  (MPR) yang  tidak lagidalam posisi  strategis  dalam  sistem  ketatanegaraan  Indonesia.  Padahal,  apabila  dilihat  dalampasal  3  ayat  (1)  UUD  Negara  RI  Tahun  1945  secara  tegas  menyebutkan  bahwa  Majelis Permusyawaratan Rakyat berwenang mengubah dan menetapkan Undang-Undang Dasar. Itu  artinya,  posisi  MPR  adalah supreme-tertinggi,  karena    hanya  MPR  lah  yang  memilikikewenangan  untuk  mengubah  dan  menetapkan  konstitusi  Negara.  Mingingat  konstitusi dalam  pandangan  Herman  Finer  sebagai “the autobiography of a power relationship”,  yaitu merupakan   riwayat   hidup   suatu   hubungan   kekuasaan.3Maka,   tidak   tepat   kalau memposisikan  MPR  sebagai  lembaga  Negara  yang  posisinya  sejajar  dengan lembaga lainnya,  sementara  MPR  merupakan  lembaga  Negara  yang memiliki  kewenangan  untuk mengubah dan menetapkan UUD Negara RI Tahun 1945.'),
(3, 'Makalah PENGUATAN SISTEM DEMOKRASIe PANCASILA', 'gambar.jpg', '<p>Pasca perubahan rumusan Pasal 1 ayat (2) UUD 1945 yang tidak lagi menempatkan Majelis Permusyawaratan Rakyat (MPR) sebagai penjelmaan rakyat yang memegang kedaulatan negara,4berimplikasi pada perubahan sistem ketatanegaraan RI, khususnya pergeseran kekuasaan tertinggi dalam Negara Kesatuan RI yang tidak lagi menempatkan MPR sebagai pelaksana sepenuhnya kedaulatan rakyat. Implikasinya setidaknyapada 3 (tiga) hal, yaitu:Pertama, keberadaan lembaga-lembaga negara dalam menjalankan fungsi-fungsi konstitusionalnya &bdquo;seolah-seolah? tidak ada lagi yang mengawasi, hal ini disebabkan tidak adanya aturan lagi yang mewajibkan bagi lembaga-lembaga negara untuk melaporkan ataupun mempertanggngjawabkan tugas dan kinerjanya seperti era sebelumnya. UUD Negara RI tahun 1945(pasca perubahan) tidak mengatur secara jelas bagaimana mekanisme lembaga-lembaga negara tersebut dalam mempertanggung jawabkan tugas dan kinerjanya, terutama bagaimana pertanggungjawaban Presiden, kepada siapa atau badan mana Presiden harus memberikan pertanggungan jawabnya,</p>'),
(35, 'Tour', 'Tour.jpg', '<p>Tour Indonesia</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_beranda`
--

CREATE TABLE `tb_beranda` (
  `id_beranda` int(11) NOT NULL,
  `file_slider1` text NOT NULL,
  `file_slider2` text NOT NULL,
  `file_slider3` text NOT NULL,
  `file_slider4` text NOT NULL,
  `file_slider5` text NOT NULL,
  `file_slider6` text NOT NULL,
  `file_slider7` text NOT NULL,
  `keyword` text NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `foto_tentang` text NOT NULL,
  `judul_tentang` text NOT NULL,
  `deskripsi_tentang` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_beranda`
--

INSERT INTO `tb_beranda` (`id_beranda`, `file_slider1`, `file_slider2`, `file_slider3`, `file_slider4`, `file_slider5`, `file_slider6`, `file_slider7`, `keyword`, `jumlah_produk`, `foto_tentang`, `judul_tentang`, `deskripsi_tentang`) VALUES
(1, 'slider1.jpg', 'slider2.jpg', 'slider3.jpg', 'slider4.jpg', 'slider5.jpg.jpg', 'slider6.jpg', 'slider7.jpg', 'AMA Malang', 4, 'ama-logo.png', 'AMA Malang', '<p>Asosiasi Manajemen Indonesia (AMA) adalah perkumpulan para pelaku bisnis kelas atas Indonesia yang telah memiliki 9 cabang di kota-kota besar Indonesia dan berpusat di Jakarta.</p>\r\n<p>Di kota Malang sendiri AMA telah memiliki anggota lebih dari 200 orang yang terdiri para General Manager, Entrepreneur, para Profesional perusahaan besar serta mahasiswa di wilayah malang dan sekitarnya.</p>\r\n<p>Sekretariat AMA Malang bertempat di Ruko STIKI Malang no 101B (warna biru muda)</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_beranda_`
--

CREATE TABLE `tb_beranda_` (
  `id_beranda` int(11) NOT NULL,
  `file_slider1` text NOT NULL,
  `file_slider2` text NOT NULL,
  `file_slider3` text NOT NULL,
  `file_slider4` text NOT NULL,
  `file_slider5` text NOT NULL,
  `keyword` text NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `foto_tentang` text NOT NULL,
  `judul_tentang` text NOT NULL,
  `deskripsi_tentang` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_beranda_`
--

INSERT INTO `tb_beranda_` (`id_beranda`, `file_slider1`, `file_slider2`, `file_slider3`, `file_slider4`, `file_slider5`, `keyword`, `jumlah_produk`, `foto_tentang`, `judul_tentang`, `deskripsi_tentang`) VALUES
(1, 'Bumbu-Masak-Bubuk-NAKAM-memiliki-versi-Premium-dan-Non---Premium-Varian-yang-tersedia-adalah-Bumbu-Rendang-Padang-dan-Rawon-Malang-11549511946.jpg', '2.jpg', '3.jpg', 'Bumbu-Masak-Bubuk-NAKAM-memiliki-versi-Premium-dan-Non---Premium-Varian-yang-tersedia-adalah-Bumbu-Rendang-Padang-dan-Rawon-Malang-41549511992.jpg', '', 'Bumbu Masak Bubuk \"NAKAM\" memiliki versi Premium dan Non - Premium. Varian yang tersedia adalah Bumbu Rendang Padang dan Rawon Malang', 3, 'Bumbu-Masak-Bubuk-NAKAM1549512007.jpg', 'Bumbu Masak Bubuk \"NAKAM\"', '<h5>Pendidikan Terakhir :</h5>\r\n\r\n				<ul>\r\n\r\n					<li>S3 Universitas Airlangga (UNAIR) Surabaya, Program Studi Ilmu Hukum Tata Negara.</li>\r\n\r\n				</ul>\r\n\r\n					<h5>Riwayat Pekerjaan :</h5>\r\n\r\n				<ul>\r\n\r\n					<li>Anggota Komisi Pemilihan Umum (KPU) Kota Malang pada periode tahun 2003-2006.</li>\r\n\r\n					<li>Menjadi dosen Luar Biasa di Universitas Muhammadiyah Malang pada tahun 2005-2006.</li>\r\n\r\n					<li>Ketua Panitia Pengawas Pemilihan Umum (Panwaslu) Pilgub Jawa Timur Tahun 2008, dll.</li>\r\n\r\n					<li>Ketua Panitia Pengawas Pemilihan Umum (Panwaslu) Pilkada Kota Malang Tahun 2008.</li>\r\n\r\n					<li>Pengurus Laboratorium Pancasila Universitas Negeri Malang periode tahun 2009-2014.</li>\r\n\r\n				</ul>\r\n\r\n					<h5>Mata Kuliah Yang Diajarkan (S1 dan S2) :</h5>\r\n\r\n				<ul>\r\n\r\n					<li>TEORI DEMOKRASI, HAM DAN CIVIL SOCIETY (S2).</li>\r\n\r\n					<li>TEORI KONSTITUSI &amp; UUD NEGARA RI TAHUN 1945 (S1);</li>\r\n\r\n					<li>HAK ASASI MANUSIA (S1);</li>\r\n\r\n					<li>POLITIK HUKUM DAN PEMBENTUKAN PERATURAN PERUNDANG-UNDANGAN (S1);</li>\r\n\r\n					<li>5. PENDIDIKAN PANCASILA (S1); DAN</li>\r\n\r\n					<li>6. PENDIDIKAN KEWARGANEGARAAN (S1).</li>\r\n\r\n				</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id_foto` int(11) NOT NULL,
  `file_foto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id_foto`, `file_foto`) VALUES
(1, 'Family-Tours-11554356735.jpg'),
(2, 'Family-Tours-21554357161.jpg'),
(3, 'Family-Tours-31554357161.jpg'),
(4, 'Family-Tours-41554357161.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `id_kontak` int(11) NOT NULL,
  `deskripsi_kontak` text NOT NULL,
  `script_embed_code` text NOT NULL,
  `nomor_wa` char(30) NOT NULL,
  `akun_ig` text NOT NULL,
  `akun_fb` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kontak`
--

INSERT INTO `tb_kontak` (`id_kontak`, `deskripsi_kontak`, `script_embed_code`, `nomor_wa`, `akun_ig`, `akun_fb`) VALUES
(1, '<p style=\"text-align: center;\">Family Tour Agency</p>\r\n<p style=\"text-align: center;\">\"Will be an unforgottable travel experience\"</p>\r\n<p style=\"text-align: center;\">Jalan Sidomulyo No. 62 Batu, Jawa timur</p>\r\n<p style=\"text-align: center;\">No. HP: 0821-4332-6350</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.40861313998!2d112.52555206591695!3d-7.852232474319648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e787e01185167f3%3A0xf5f1563f524cb3a9!2sJl.+Bukit+Berbunga%2C+Sidomulyo%2C+Kec.+Batu%2C+Kota+Batu%2C+Jawa+Timur!5e0!3m2!1sid!2sid!4v1553740145574\" width=\"500\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '082324320856', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kel` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `alamat_email` text NOT NULL,
  `telepon` int(13) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `pend_terakhir` text NOT NULL,
  `pekerjaan` text NOT NULL,
  `perusahaan` text NOT NULL,
  `alamat_kantor` text NOT NULL,
  `telepon_kantor` int(13) NOT NULL,
  `bidang_usaha` text NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_user`, `nama_lengkap`, `tempat`, `tanggal_lahir`, `jenis_kel`, `alamat`, `alamat_email`, `telepon`, `no_hp`, `pend_terakhir`, `pekerjaan`, `perusahaan`, `alamat_kantor`, `telepon_kantor`, `bidang_usaha`, `jabatan`, `foto`) VALUES
(1, 'John ', 'Malang', '1980-09-01', 'Perempuan', 'Jl. Danau Sentani', 'jhon@gmail.com', 341367282, 834362563, 'S1', 'Pemilik Perusahaan', 'DD', 'Jl. danau', 341764724, 'Bisnis', 'Direktur', 'John-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` text NOT NULL,
  `file_foto_produk` text NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `file_foto_produk`, `deskripsi_produk`, `tanggal`) VALUES
(1, 'Public Relation via Media Social', 'Public-Relation-via-Media-Social.jpg', '<div class=\"content-entry\">\r\n<p>Pada akhir bulan April tepatnya tanggal 24 April 2018, AMA Malang mendatangkan Muhammad Farhan yang merupakan seorang announcer, MC dan public relation ternama Indonesia untuk memberikan seminar tentang Public Relation via Social Media. Seminar diawali dengan ice breaking yang bagus dan keseluruhannya dikemas secara apik dan menarik sehingga peserta seminar tidak bosan. Pembahasan seminar dimulai dengan pemaparan fakta-fakta tentang seberapa cepatnya dunia digital meningkat dan mengambil alih perekonomian. Target market dalam dunia digital baik social media maupun web browser didominasi generasi yang lahir pada tahun sekitar 1985-2005. Di Indonesia pengguna internet sudah sekitar 143 juta orang, 56% nya hidup di perkotaan dan 90% pengguna mengakses internet menggunaan smartphones.</p>\r\n<p>&nbsp;</p>\r\n<p>Sebagai pelaku ekonomi kita harus memahami kemana arus Online Activies dari masa ke masa. Sekarang Online Activities didominasi oleh penggunaan aplikasi online dengan presentase sebesar 88% diikuti aktivitas browsing online dengan presentase 12%. Dengan data sebagai berikut bila kita ingin memasang iklan, sebagai pelaku ekonomi kita bisa menyimpulkan pemasangan iklan di web browsing kalah efektif dengan pemasangan iklan pada aplikasi online.</p>\r\n<p>&nbsp;</p>\r\n<p>Tiga Online Activites terbaik diantaranya adalah penggunaan social media, media chatting online dan media music /video online. Aktivitas penggunaan social media dijuarai Youtube dengan pengguna sebanyak 39.3mio (dominasi pengguna kelahiran diatas 1985), diikuti Instagram dengan pengguna sebanyak 36.8mio dan facebook dengan pengguna sebanyak 28.3mio (kebanyakan kelahiran 1984 kebawah). Aktivitas media chatting online dikuasai whatsapp (52.7mio users) dan line (31.2mio users). Tentu hal tersebut mempengaruhi kita untuk memutuskan media mana yang akan kita pilih untuk mengiklankan produk kita. Pada masa kini video berdurasi 1 menit sangat efektif untuk menjadi sarana iklan produk, hal ini disebut juga social video explosion (dalam 1 menit bisa memuat 1,8 juta kata).</p>\r\n<p>&nbsp;</p>\r\n<p>Selain tiga online activites terbaik, kita tidak bisa menyangkal ketenaran online activities dalam bentuk aplikasi gaming, ojek dan taksi online serta fintech dengan berbagai bentuk media dan penawaran. Media game online mendapat perhatian yang cukup banyak terutama di kalangan muda-mudi. Untuk saat ini game online berbasis aplikasi mobile phone yang terpopuler adalah Mobile Legend. Selain game online penggunaan aplikasi ojek dan taksi online di Indonesia juga tidak kalah saing dengan diwarnai persaingan antara Grab dan Gojek. Beberapa aplikasi tersebut banyak yang sudah dilengkapi dengan sarana pembayaran online. Sarana pembayaran online yang dimaksud merupakan perkembangan fintech di Indonesia yang sekarang sedang digencarkan antara lain adalah GoPay, e-money, T-Cash, Flazz, LinePay, OVO, Brizzi, dll.</p>\r\n<p>&nbsp;</p>\r\n<p>Pada akhir seminar Bapak Farhan menambahkan tentang batapa berharganya informasi data diri perorangan yang ditampung oleh media online yang kita gunakan. Data diri dan aktivitas yang kita lakukan di media online dapat menjadi suatu database yang berharga, yang mana database tersebut dimiliki oleh media online yang kita gunakan. Untuk kedepannya kita sebagai pelaku ekonomi diharapkan untuk lebih mawas dan sadar akan perkembangan era digital.</p>\r\n</div>', '2018-07-07'),
(4, 'Exponential Thinking in Digital Revolution', 'Public-Relation-via-Media-Social3.jpg', '<div class=\"content-entry\">\r\n<p>Pada seminar kali ini Bapak Bayu Prawira Hie membahas tentang pola pikir exponential untuk menghadapi revolusi digital. Presentasi diawali dengan pembahasan tentang revolusi atau perubahan yang dapat dibagi menjadi &nbsp;revolusi secara linear dan exponential. Dalam diagram perbedaan jarak antara alur exponential dan linear menimbulkan disruption. Kebanyakan perusahaan sebenarnya sudah menyadari adanya musuh baru yang harus dihadapi yaitu era digital. Keberadaan musuh tersebut telah kita ketahui tanpa sadar bahwa perkembangan era digital sangatlah cepat. Kita berpikir bahwa era digital masih jauh didepan padahal kita harus siap menghadapinya kapan saja.</p>\r\n<p>Alur perubahan digital diawali dengan digitalization lalu deception, disruption, dematerialization, demonetization sampai ke democration. Organisasi exponential (Exponential Organization) adalah organisasi yang hasil produk/outputnya sangat lebih besar dibandingkan organisasi di bidang yang sama lainnya. Hal itu dikarenakan penggunaan teknik organisasi yang inovatif yang memaksimalkan penggunaan teknologi exponential. Beberapa contoh exponential Organization yaitu Uber, Apple, Ted, Amazon, Microsoft dan Airbnb.</p>\r\n<p>Perbedaan antara Organisasi Konvesional/Tradisional dan Organisasi Exponential antara lain dalam bidang management, objectives, dominant train of thought, innovation sources, planning, risk tolerance, flexibility, staffing level, ownership dan time horizon. Dalam bidang management traditional organization atau liner organization berdasarkan hirarki dan tinggi rendah jabatan sedang dalam exponential organization management secara autonomy dan social technology. Planning dalam Organisasi Exponential berdasarkan experimental sedangkan pada organisasi tradisional hanya berdasarkan pengalaman. Dalam Exponential Organization dikenal istilah Massive Transformative Purpose (MTP) ynag terdiri dari I.D.E.A dan S.C.A.L.E. Contoh perusahaan yang merupakan exponential organization (Airbnb, uber, dll), telah menerapkan Massive Transformative Purpose tersebut. I.D.E.A yang adalah bagian dari MTP merupakan internal characteristics Exponential Organization dan S.C.A.L.E adalah external characteristics dari Exponential Organization. I.D.E.A merupakan singkatan dari Interfaces, Dashboards, Experimentation, Autonomy dan Social Technology. Terakhir Bapak Bayu menambahkan tips untuk mengatasi Revolusi Digital adalah jangan menambahkan outlet yang perlu ditambah adalah kualitas dan meningkatkan user experience.</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<address><strong>-Baby Arabella Dayantha-</strong></address><address><strong>Member AMA Indonesia Chapter Malang</strong></address></div>', '2018-03-16'),
(2, 'DIGITAL DISRUPTION', 'Public-Relation-via-Media-Social2.jpg', '<p>Apakah kita semua menyadari bahwa sekarang dunia tengah mengalami disruption yang mengakibatkan cara berkomunikasi, beraktifitas dan berekonomi menjadi berubah. Disruption disini bermakna inovasi yang mengguncangkan pola kerja lama dengan kondisi stabil dan permainan aman yang memiliki resiko rendah. Disruption dipicu oleh beberapa faktor antara lain perkembangan di bidang IT, urbanisasi, megacities, cyberplaces, demokratisasi dalam segala bidang dan munculnya generasi C atau Gen-C. Hal ini mengakibatkan produk peradaban manusia berubah, interaksi dan komunitas baru bermunculan, perubahan cara berkomunikasi dan berbisnis serta jarak dan waktu yang dapat ditempuh<br /> dengan pendekatan berbeda dan lebih efisien. Pertarungan dari zaman ke zaman berubah dari pertarungan antar bangsa ke pertarungan antar produk/ korporasi menjadi pertarungan antar business model. Pola pikir lama tidak dapat mengimbangi perkembangan teknologi yang semakin pesat.</p>\r\n<p>Di abad 21 ini, tantangan yang harus diperhatikan adalah <em>volatility, uncertainity, complexity </em>dan<em> ambiguity</em> karena <em>digital</em> <em>disruption</em> sudah dimulai. Perlu kita sadari bahwa sekarang bermunculan perusahan dengan teknologi maju yang dengan idenya melampaui cara pandang kita contohnya netflix yang termasuk <em>movie&nbsp;</em> <em>house</em> terbesar bahkan tidak perlu media tayang bioskop, uber yang termasuk perusahan taxi terbesar tidak memerlukan kepemilikan kendaraan, facebook sebagai pemilik <em>media&nbsp;</em> <em>social</em> terpopular tidak membuat kontennya sendiri dan Airbnb yang termasuk penyedia akomodasi terbesar bahkan tidak perlu kepemilikan <em>real&nbsp;</em> <em>estate</em>.</p>\r\n<p>Pengaruh digital disruption dapat kita rasakan pula pada bidang marketing, real sector, financial sector dan the selling process. Dengan adanya digital disruption marketing konvensional berkembang secara media yaitu dengan optimalisasi marketing melalui search engine optimization, search engine marketing, email marketing serta SMS marketing. <em>Real</em> <em>sector</em> dan <em>financial&nbsp;</em> <em>sector</em> masih senantiasa berkembang, yang berubah hanya automatisasi sehingga berdampak pada pengurangan tenaga kerja, peningkatan skill tenaga kerja dan perkembangan financial teknologi dalam bentuk e.banking, e.commerce. Pada bidang selling process terdapat banyak perubahan yaitu beralihnya perdagangan konvensial menjadi online.</p>\r\n<p>Untuk mengatasi tantangan yang ada harus diimbangi dengan sikap leadership yang didukung dengan vision, understanding, clarity dan agility. Perusahaan konvensional atau lazy company sangat memerlukan perubahan agar dapat mengatasi disruption yang telah terjadi. Lazy company memiliki ciri-ciri tidak melakukan perubahan dan inovasi, merasa nyaman dengan apa yang telah dimiliki, mendapatkan pemasukan tanpa berinvestasi dan bermain aman. Hal tersebut disebabkan pola pikir yang konvensional, inovasi yang kurang berkembang, sikap tidak sportif dan lain lain. Untuk memperbaiki hal tersebut yang harus perusahaan lakukan di era disruption adalah terbebas dari perangkap masa lalu dan memiliki pandangan jauh kedepan.</p>\r\n<address>Terakhir bapak Frans Budi Pranata mengingatkan 12 hal yang harus diingat di zaman digital ekonomi yaitu :</address><address>1. <em>The new economy is a knowledge economy (knowledge)</em></address><address>2. <em>Everything become digital (digitalization)</em></address><address>3. <em>Physical things can become virtual (virtualization)</em></address><address>4. <em>The economy is molecular econoy (molecularization)</em></address><address>5. <em>The new economy is networked economy (internetworking)</em></address><address>6. <em>Disintermediation</em></address><address>7. <em>Computing, communication and content (convergence)</em></address><address>8. <em>In the new economy, the gap between consumers and producers is blurred (presumption)</em></address><address>9.<em> Real time, just in time (immediacy)</em></address><address>10. <em>Globalization</em></address><address>11. <em>The new economy is an innovation-based economy (Innovation)</em></address><address>12. <em>Unexpected social issues are beginning to arise (discordance)</em></address><address>&nbsp;</address><address><strong>-Baby Arabella Dayantha-</strong></address><address><strong>Member AMA Indonesia Chapter Malang</strong></address><address><strong>Owner PopArte</strong></address>', '2018-02-27'),
(3, 'Anticipating Disruption in Human Capital', 'Public-Relation-via-Media-Social1.jpg', '<div class=\"content-entry\">\r\n<p>Pada seminar AMA Indonesia Cabang Malang kali ini, Dr. Alex Denni (Chief Human Capital Officer BNI) diundang untuk menyampaikan presentasi di bidang Human Capital. Topik yang di bahas adalah mengenai &ldquo;Anticipating Disruption in Human Capital&rdquo;. Presentasi sangat menggugah diawali dengan pembahasan tentang perkembangan ekonomi Indonesia yang pesat. Diperkirakan pada tahun 2030, Indonesia menjadi salah satu dari 7 negara dengan pengaruh ekonomi terbesar di dunia.<br /> Seiring dengan perkembangan ekonomi, dibahas pula tentang ASEAN Economic Community dengan 4 pilar utama yaitu : (1) <em>Single market and production base</em>; (2) <em>Competitive economic region</em>; (3) <em>Equitable economic development</em>; dan (4) <em>Integration into the Global Economy</em> yang didukung dengan konsep <em>free flow of goods, free flow of services, free flow of investment, free flow of capital</em> dan <em>free flow of skilled labour</em>.</p>\r\n<p>Semakin berkembangnya perekonomian Indonesia dan dengan adanya ASEAN <em>Economic Community</em> maka <em>demand human capital</em> di Indonesia semakin naik, sedangkan kenyataannya sekarang, <em>supply</em> tenaga kerja tidak dapat memenuhi <em>demand</em> tersebut, padahal banyak sarjana yang belum mendapat pekerjaan. Hal itu nampaknya dipangaruhi oleh mentalitas yang kurang kompetitif dan pendidikan yang kurang berkembang dari masa ke masa. Kualitas <em>human capital</em> sangat penting untuk ditingkatkan karena kedepannya banyak pekerjaan yang akan diautomatisasi secara digital.<br /> Menanggapi hal tersebut, Alex Denni menerapkan<em> Human Capital Architecture</em> dan diharapkan setiap pekerja dapat menjadi <em>leader</em>. Dalam <em>Human Capital Architecture</em>, untuk meningkatkan kualitas <em>Human Capital</em> dilakukan 3 langkah utama yaitu <em>Talent &amp; Sucession</em>, <em>Learning &amp; Development</em> dan <em>Reward &amp; Recognition</em>. Dalam <em>Talent &amp; Sucession</em> dilakukan <em>talent mobility</em> sesuai dengan kinerjanya. Semakin bagus kinerja dan semakin berkembang kualitas bekerjanya, maka jenjang karirnya semakin tinggi. Untuk mengembangkan kualitas pekerja maka terdapat langkah <em>Learning &amp; Development</em> yang diterapkan dengan <em>Center of Digital Asessment and Evaluation</em>, dimana pekerja diberikan kesempatan untuk belajar dan bereksperimen yang nantinya akan dievaluasi kembali. Terakhir, <em>Reward &amp; Recognition</em> merupakan pemberian benefit pada pekerja atas usaha/<em>effort</em> yang telah dilakukan dan tersedianya fasilitas yang mendukung lingkungan kerja seperti <em>shared office, daycare</em> dan <em>appreciation day</em>. Reward tersebut juga bersifat fleksibel yang artinya pekerja dapat memilih sendiri sesuai dengan kebutuhan.</p>\r\n<p>.<br /> <strong>Berbagai cara dapat dilakukan untuk membangun Indonesia lebih baik, so what&nbsp;</strong><strong>are you waiting for? THE FUTURE IS NOW.</strong></p>\r\n<p>&nbsp;</p>\r\n<address style=\"text-align: right;\"><strong>-Baby Arabella Dayantha-</strong></address><address style=\"text-align: right;\"><strong>Member AMA Indonesia Chapter Malang</strong></address><address style=\"text-align: right;\"><strong>Owner PopArte</strong></address></div>', '2018-02-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `mainmenu`
--
ALTER TABLE `mainmenu`
  ADD PRIMARY KEY (`seq`);

--
-- Indexes for table `meta_beranda`
--
ALTER TABLE `meta_beranda`
  ADD PRIMARY KEY (`id_meta_beranda`);

--
-- Indexes for table `meta_galeri`
--
ALTER TABLE `meta_galeri`
  ADD PRIMARY KEY (`id_meta_galeri`);

--
-- Indexes for table `meta_kontak`
--
ALTER TABLE `meta_kontak`
  ADD PRIMARY KEY (`id_meta_kontak`);

--
-- Indexes for table `meta_produk`
--
ALTER TABLE `meta_produk`
  ADD PRIMARY KEY (`id_meta_produk`);

--
-- Indexes for table `setting_ukuran`
--
ALTER TABLE `setting_ukuran`
  ADD PRIMARY KEY (`id_setting_ukuran`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `tab_akses_mainmenu`
--
ALTER TABLE `tab_akses_mainmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_akses_submenu`
--
ALTER TABLE `tab_akses_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indexes for table `tb_beranda`
--
ALTER TABLE `tb_beranda`
  ADD PRIMARY KEY (`id_beranda`);

--
-- Indexes for table `tb_beranda_`
--
ALTER TABLE `tb_beranda_`
  ADD PRIMARY KEY (`id_beranda`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mainmenu`
--
ALTER TABLE `mainmenu`
  MODIFY `seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `meta_beranda`
--
ALTER TABLE `meta_beranda`
  MODIFY `id_meta_beranda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meta_galeri`
--
ALTER TABLE `meta_galeri`
  MODIFY `id_meta_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meta_kontak`
--
ALTER TABLE `meta_kontak`
  MODIFY `id_meta_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meta_produk`
--
ALTER TABLE `meta_produk`
  MODIFY `id_meta_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_ukuran`
--
ALTER TABLE `setting_ukuran`
  MODIFY `id_setting_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tab_akses_mainmenu`
--
ALTER TABLE `tab_akses_mainmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tab_akses_submenu`
--
ALTER TABLE `tab_akses_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_beranda`
--
ALTER TABLE `tb_beranda`
  MODIFY `id_beranda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_beranda_`
--
ALTER TABLE `tb_beranda_`
  MODIFY `id_beranda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
