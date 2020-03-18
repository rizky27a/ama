-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2019 at 04:29 AM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

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
(19, 16, 'Aktivitas', '', 'fas fa-box-open fa-2x', 'C_aktivitas', '', '2019-02-07 09:59:17', NULL);

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
(23, 16, 1, 0, 1, 0, 0, '2019-02-07 10:00:02', '');

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
  `keyword` text NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `foto_tentang` text NOT NULL,
  `judul_tentang` text NOT NULL,
  `deskripsi_tentang` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_beranda`
--

INSERT INTO `tb_beranda` (`id_beranda`, `file_slider1`, `file_slider2`, `file_slider3`, `file_slider4`, `file_slider5`, `keyword`, `jumlah_produk`, `foto_tentang`, `judul_tentang`, `deskripsi_tentang`) VALUES
(1, 'Family-Tours-11554356735.jpg', 'Family-Tours-21554357161.jpg', 'Family-Tours-31554357161.jpg', 'Family-Tours-41554357161.jpg', 'Family-Tours-51554357161.jpg', 'Family Tours', 4, 'logo.png', 'Family Tour', '<p>Family Tour adalah penyedia perjalanan wisata dengan tenaga profesional.Kami menyediakan berbagai bentuk paket wisata yang akan menyesuaikan permintaan customer, diantaranya paket yang kami tawarkan adalah Hotel Reservation,Rent Private Car,Rent Bus,Gathering Group,Honeymoon Package,Education Tour,Personal atau Group Transportasi baik dalam rangka perjalanan wisata ataupun untuk tujuan bisnis</p>\r\n<p>Family Tour di desain dengan tampilan yang sederhana sehingga memudahkan customer mendapatkan paket wisata yang diharapkan dengan harga yang bersahabat tanpa mengurangi pelayanan (SOP) dan fasilitas yang diberikan</p>\r\n<p>VISI</p>\r\n<p>\"WILL &nbsp;BE AN UNFORGETTABLE TRAVEL EXPERIENCE\"</p>\r\n<p>Family Tour mampu sebagai perusahaan yang memastikan anda mendapatkan pelayanan yang terbaik dan tidak akan terlupakan</p>\r\n<p>MISI</p>\r\n<p>1.Membantu mencarikan solusi terbaik bagi anda para pelaku bisnis atau wisatawan untuk melakukan</p>\r\n<p>&nbsp; &nbsp;perjalanan wisata dengan harga terbaik</p>\r\n<p>2.Menjadi perusahaan penyedia jasa transportasi dengan layanan yang berkualitas,ramah,sopan dan</p>\r\n<p>&nbsp; &nbsp;nyaman</p>\r\n<p>3. Menjadi mitra strategis bagi anda yang memiliki kesibukan di balik meja kerja</p>');

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
(1, '<p>Family Tour Agency</p>\r\n<p>\"Will be an unforgottable travel experience\"</p>\r\n<p>Jalan Sidomulyo No. 62 Batu, Jawa timur</p>\r\n<p>No. HP: 0821-4332-6350</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.40861313998!2d112.52555206591695!3d-7.852232474319648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e787e01185167f3%3A0xf5f1563f524cb3a9!2sJl.+Bukit+Berbunga%2C+Sidomulyo%2C+Kec.+Batu%2C+Kota+Batu%2C+Jawa+Timur!5e0!3m2!1sid!2sid!4v1553740145574\" width=\"500\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '082324320856', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` text NOT NULL,
  `file_foto_produk` text NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `file_foto_produk`, `deskripsi_produk`) VALUES
(1, 'Blue Beach', 'destination-1.jpg', 'Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing.'),
(4, 'Beautiful ParisS', 'destination-4.jpg', '<p>Ini webtour</p>'),
(2, 'Sydney Tour', 'destination-2.jpg', 'Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing.'),
(3, 'Wild Forest', 'destination-3.jpg', 'Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing.');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mainmenu`
--
ALTER TABLE `mainmenu`
  MODIFY `seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
