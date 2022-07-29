-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 02:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumnidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `NIP` varchar(15) NOT NULL,
  `NAMA` varchar(90) DEFAULT NULL,
  `PASS` varchar(40) DEFAULT NULL,
  `active` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`NIP`, `NAMA`, `PASS`, `active`) VALUES
('100001', 'admin', 'admin', 1),
('300000', 'Fadil Husen, S.Kom', '1234', 1),
('990601', 'Egy Ijaa', '08575044492z', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` tinyint(4) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Protestan'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Buddha'),
(6, 'Khonghucu');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `NIS` varchar(15) NOT NULL,
  `NAMA` varchar(90) DEFAULT NULL,
  `PASS` varchar(40) DEFAULT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `alumni_profil`
--

CREATE TABLE `alumni_profil` (
  `NIS` varchar(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `FOTO_PROFIL` varchar(255) DEFAULT NULL,
  `ANGKATAN` smallint(4) DEFAULT NULL,
  `AGAMA` tinyint(4) DEFAULT NULL,
  `ALAMAT_ASAL` varchar(100) NOT NULL,
  `ALAMAT_SEKARANG` varchar(100) NOT NULL,
  `KOTA_SEKARANG` smallint(6) DEFAULT NULL,
  `NO_TELEPON` varchar(20) NOT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  `KETERANGAN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE `angkatan` (
  `ID_ANGKATAN` smallint(4) NOT NULL,
  `angkatan` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`ID_ANGKATAN`, `angkatan`) VALUES
(1, 2001),
(2, 2002),
(3, 2003),
(4, 2004),
(5, 2005),
(6, 2006),
(7, 2007),
(8, 2008),
(9, 2009),
(10, 2010),
(11, 2011),
(12, 2012),
(13, 2013),
(14, 2014),
(15, 2015),
(16, 2016),
(17, 2017),
(18, 2018),
(19, 2019),
(20, 2020),
(21, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `broadcast`
--

CREATE TABLE `broadcast` (
  `ID_BROADCAST` int(8) NOT NULL,
  `NIP` varchar(15) DEFAULT NULL,
  `JUDUL` varchar(100) NOT NULL,
  `GAMBAR` varchar(100) NOT NULL,
  `KONTEN` text NOT NULL,
  `PUBLISHED` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `ID_KOTA` smallint(6) NOT NULL,
  `KOTA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`ID_KOTA`, `KOTA`) VALUES
(1, 'Aceh Barat'),
(2, 'Aceh Barat Daya'),
(3, 'Aceh Besar'),
(4, 'Aceh Jaya'),
(5, 'Aceh Selatan'),
(6, 'Aceh Singkil'),
(7, 'Aceh Tamiang'),
(8, 'Aceh Tengah'),
(9, 'Aceh Tenggara'),
(10, 'Aceh Timur'),
(11, 'Aceh Utara'),
(12, 'Bener Meriah'),
(13, 'Bireuen'),
(14, 'Gayo Lues'),
(15, 'Nagan Raya'),
(16, 'Pidie'),
(17, 'Pidie Jaya'),
(18, 'Simeulue'),
(19, 'Banda Aceh'),
(20, 'Langsa'),
(21, 'Lhokseumawe'),
(22, 'Sabang'),
(23, 'Subulussalam'),
(24, 'Badung'),
(25, 'Bangil'),
(26, 'Buleleng'),
(27, 'Gianyar'),
(28, 'Jembrana'),
(29, 'Karangasem'),
(30, 'Klungkung'),
(31, 'Tabanan'),
(32, 'Denpasar'),
(33, 'Lebak'),
(34, 'Pandeglang'),
(35, 'Serang (Kabupaten)'),
(36, 'Tangerang (Kabupaten)'),
(37, 'Cilegon'),
(38, 'Serang (Kota)'),
(39, 'Tangerang (Kota)'),
(40, 'Tangerang selatan'),
(41, 'Bengkulu Selatan'),
(42, 'Bengkulu Tengah'),
(43, 'Bengkulu Utara'),
(44, 'Kaur'),
(45, 'Kapahiang'),
(46, 'Lebong'),
(47, 'Mukomuko'),
(48, 'Rejang Lebong'),
(49, 'Seluma'),
(50, 'Bengkulu'),
(51, 'Bantul'),
(52, 'Gunung kildul'),
(53, 'Kulon Progo'),
(54, 'Sleman'),
(55, 'Yogyakarta'),
(56, 'Kepulauan Seribu'),
(57, 'Jakarta Barat'),
(58, 'Jakarta Pusat'),
(59, 'Jakarta Selatan'),
(60, 'Jakarta Timur'),
(61, 'Jakarta Utara'),
(62, 'Boalemo'),
(63, 'Bone Bolango'),
(64, 'Gorontalo (Kabupaten)'),
(65, 'gorontalo Utara'),
(66, 'Pahuwato'),
(67, 'Gorontalo (Kota)'),
(68, 'Batanghari'),
(69, 'Bungo'),
(70, 'Kerinci'),
(71, 'Merangin'),
(72, 'Muaro Jambi'),
(73, 'Sarolangun'),
(74, 'Tanjung Jabung Barat'),
(75, 'Tanjung Jabung Timur'),
(76, 'Tebo'),
(77, 'Jambi'),
(78, 'Sungai Penuh'),
(79, 'Bandung (Kabupaten)'),
(80, 'Bandung Barat'),
(81, 'Bekasi (Kabupaten)'),
(82, 'Bogor (Kabupaten)'),
(83, 'Ciamis'),
(84, 'Cianjur'),
(85, 'Cirebon (Kabupaten)'),
(86, 'Garut'),
(87, 'Indramayu'),
(88, 'Karawang'),
(89, 'Kuningan'),
(90, 'Majalengka'),
(91, 'Pangandaran'),
(92, 'Purwakarta'),
(93, 'Subang'),
(94, 'Sukabumi (Kabupaten)'),
(95, 'Sumedang'),
(96, 'Tasikmalaya (Kabupaten)'),
(97, 'Bandung (Kota)'),
(98, 'Banjar'),
(99, 'Bekasi (Kota)'),
(100, 'Bogor (Kota)'),
(101, 'Cimahi'),
(102, 'Cirebon (Kota)'),
(103, 'Depok'),
(104, 'Sukabumi (Kota)'),
(105, 'Tasikmalaya (Kota)'),
(106, 'Banjarnegara'),
(107, 'Banyumas'),
(108, 'Batang'),
(109, 'Blora'),
(110, 'Boyolali'),
(111, 'Brebes'),
(112, 'Cilacap'),
(113, 'Demak'),
(114, 'Grobogan'),
(115, 'Jepara'),
(116, 'Karanganyar'),
(117, 'Kebumen'),
(118, 'Kendal'),
(119, 'Klaten'),
(120, 'Kudus'),
(121, 'Magelang (Kabupaten)'),
(122, 'Pati'),
(123, 'Pekalongan (Kabupaten)'),
(124, 'Pemalang'),
(125, 'Purbalingga'),
(126, 'Purworejo'),
(127, 'Rembang'),
(128, 'Semarang (Kabupaten)'),
(129, 'Sragen'),
(130, 'Sukoharjo'),
(131, 'Tegal (Kabupaten)'),
(132, 'Temanggung'),
(133, 'Wonogiri'),
(134, 'Wonosobo'),
(135, 'Magelang (Kota)'),
(136, 'Pekalongan (Kota)'),
(137, 'Salatiga'),
(138, 'Semarang (Kota)'),
(139, 'Surakarta'),
(140, 'Tegal (Kota)'),
(141, 'Bangkalan'),
(142, 'Banyuwangi'),
(143, 'Blitar (Kabupaten)'),
(144, 'Bojonegoro'),
(145, 'Bondowoso'),
(146, 'Gresik'),
(147, 'Jember'),
(148, 'Jombang'),
(149, 'Kediri (Kabupaten)'),
(150, 'Lamongan'),
(151, 'Lumajang'),
(152, 'Madiun (Kabupaten)'),
(153, 'Magetan'),
(154, 'Malang (Kabupaten)'),
(155, 'Mojokerto (Kabupaten)'),
(156, 'Nganjuk'),
(157, 'Ngawi'),
(158, 'Pacitan'),
(159, 'Pamekasan'),
(160, 'Pasuruan (Kabupaten)'),
(161, 'Ponorogo'),
(162, 'Probolinggo (Kabupaten)'),
(163, 'Sampang'),
(164, 'Sidoarjo'),
(165, 'Situbondo'),
(166, 'Sumenep'),
(167, 'Trenggalek'),
(168, 'Tuban'),
(169, 'Tulungagung'),
(170, 'Batu'),
(171, 'Blitar (Kota)'),
(172, 'Kediri (Kota)'),
(173, 'Madiun (Kota)'),
(174, 'Malang (Kota)'),
(175, 'Mojokerto (Kota)'),
(176, 'Pasuruan (Kota)'),
(177, 'Probolinggo (Kota)'),
(178, 'Surabaya'),
(179, 'Bengkayang'),
(180, 'Kapuas Hulu'),
(181, 'Kayong Utara'),
(182, 'Ketapang'),
(183, 'Kubu Raya'),
(184, 'Landak'),
(185, 'Melawi'),
(186, 'Pontianak (Kabupaten)'),
(187, 'Sambas'),
(188, 'Sanggau'),
(189, 'Sekadau'),
(190, 'Sintang'),
(192, 'Pontianak (Kota)'),
(193, 'Singkawang'),
(194, 'Balangan'),
(197, 'Banjar'),
(198, 'Barito Kuala'),
(199, 'Hulu Sungai Selatan'),
(200, 'Hulu Sungai Tengah'),
(201, 'Hulu Sungai Utara'),
(202, 'Kotabaru'),
(203, 'Tabalong'),
(204, 'Tanah Bumbu'),
(205, 'Tanah Laut'),
(206, 'Tapin'),
(207, 'Banjarbaru'),
(208, 'Banjarmasin'),
(209, 'Barito Selatan'),
(210, 'Barito Timur'),
(211, 'Barito Utara'),
(212, 'Gunung Mas'),
(213, 'Kapuas'),
(214, 'Katingan'),
(215, 'Kotawaringin Barat'),
(216, 'Kotawaringin Timur'),
(217, 'Lamandau'),
(218, 'Murung Raya'),
(219, 'Pulang Pisau'),
(220, 'Sukamara'),
(221, 'Seruyan'),
(222, 'Palangka Raya'),
(223, 'Berau'),
(224, 'Kutai Barat'),
(225, 'Kutai Kartanegara'),
(226, 'Kutai Timur'),
(227, 'Paser'),
(228, 'Penajam Paser Utara'),
(229, 'Mahakam Ulu'),
(230, 'Balikpapan'),
(231, 'Bontang'),
(232, 'Samarinda'),
(233, 'Bulungan'),
(234, 'Malinau'),
(235, 'Nunukan'),
(236, 'Tana Tidung'),
(237, 'Tarakan'),
(238, 'Bangka'),
(239, 'Bangka Barat'),
(240, 'Bangka Selatan'),
(241, 'Bangka Tengah'),
(242, 'Belitung'),
(243, 'Belitung Timur'),
(244, 'Pangkal Pinang'),
(245, 'Bintan'),
(246, 'Karimun'),
(247, 'Kepulauan Anambas'),
(248, 'Lingga'),
(249, 'Natuna'),
(250, 'Batam'),
(251, 'Tanjung Pinang'),
(252, 'Lampung Barat'),
(253, 'Lampung Selatan'),
(254, 'Lampung Tengah'),
(255, 'Lampung Timur'),
(256, 'Lampung Utara'),
(257, 'Mesuji'),
(258, 'Pesawaran'),
(259, 'Pringsewu'),
(260, 'Tanggamus'),
(261, 'Tulang Bawang'),
(262, 'Tulang Bawang Barat'),
(263, 'Way Kanan'),
(264, 'Pesisir Barat'),
(265, 'Bandar Lampung'),
(266, 'Kotabumi'),
(267, 'Liwa'),
(268, 'Metro'),
(269, 'Buru'),
(270, 'Buru Selatan'),
(271, 'Kepulauan Aru'),
(272, 'Maluku Barat Daya'),
(273, 'Maluku Tengah'),
(274, 'Maluku Tenggara'),
(275, 'Maluku Tenggara Barat'),
(276, 'Seram Bagian Barat'),
(277, 'Seram Bagian Timur'),
(278, 'Ambon'),
(279, 'Tual'),
(280, 'Halmahera Barat'),
(281, 'Halmahera Tengah'),
(282, 'Halmahera Utara'),
(283, 'Halmahera Selatan'),
(284, 'Halmahera Timur'),
(285, 'Kepulauan Sula'),
(286, 'Pulau Morotai'),
(287, 'Pulau Taliabu'),
(288, 'Ternate'),
(289, 'Tidore Kepulauan'),
(290, 'Bima (Kabupaten)'),
(291, 'Dompu'),
(292, 'Lombok Barat'),
(293, 'Lombok Tengah'),
(294, 'Lombok Timur'),
(295, 'Lombok Utara'),
(296, 'Sumbawa'),
(297, 'Sumbawa Barat'),
(298, 'Bima (Kota)'),
(299, 'Mataram'),
(300, 'Alor'),
(301, 'Belu'),
(302, 'Ende'),
(303, 'Flores Timur'),
(304, 'Kupang (Kabupaten)'),
(305, 'Lembata'),
(306, 'Manggarai'),
(307, 'Manggarai Barat'),
(308, 'Manggarai Timur'),
(309, 'Ngada'),
(310, 'Nagekeo'),
(311, 'Rote Ndao'),
(312, 'Sabu Raijua'),
(313, 'Sikka'),
(314, 'Sumba Barat'),
(315, 'Sumba Barat Daya'),
(316, 'Sumba Tengah'),
(317, 'Sumba Timur'),
(318, 'Timor Tengah Selatan'),
(319, 'Timor Tengah Utara'),
(320, 'Kupang (Kota)'),
(321, 'Asmat'),
(322, 'Biak Numfor'),
(323, 'Boven Digoel'),
(324, 'Deiyai'),
(325, 'Dogiyai'),
(326, 'Intan Jaya'),
(327, 'Jayapura (Kabupaten)'),
(328, 'Jayawijaya'),
(329, 'Keerom'),
(330, 'Kepulauan Yapen'),
(331, 'Lanny Jaya'),
(332, 'Mamberamo Raya'),
(333, 'Mamberamo Tengah'),
(334, 'Mappi'),
(335, 'Merauke'),
(336, 'Mimika'),
(337, 'Nabire'),
(338, 'Nduga'),
(339, 'Paniai'),
(340, 'Pegunungan Bintang'),
(341, 'Puncak'),
(342, 'Puncak Jaya'),
(343, 'Sarmi'),
(344, 'Supiori'),
(345, 'Tolikara'),
(346, 'Waropen'),
(347, 'Yahukimo'),
(348, 'Yalimo'),
(349, 'Jayapura (Kota)'),
(350, 'Fakfak'),
(351, 'Kaimana'),
(352, 'Manokwari'),
(353, 'Manokwari Selatan'),
(354, 'Maybrat'),
(355, 'Pegunungan Arfak'),
(356, 'Raja Ampat'),
(357, 'Sorong (Kabupaten)'),
(358, 'Sorong Selatan'),
(359, 'Tambrauw'),
(360, 'Teluk Bintuni'),
(361, 'Teluk Wondama'),
(362, 'Sorong (Kota)'),
(363, 'Bengkalis'),
(364, 'Indragiri Hilir'),
(365, 'Indragiri Hulu'),
(366, 'Kampar'),
(367, 'Kuantan Singingi'),
(368, 'Pelalawan'),
(369, 'Rokan Hilir'),
(370, 'Rokan Hulu'),
(371, 'Siak'),
(372, 'Kepulauan Meranti'),
(373, 'Dumai'),
(374, 'Pekanbaru'),
(375, 'Majene'),
(376, 'Mamasa'),
(377, 'Mamuju'),
(378, 'Mamuju Utara'),
(379, 'Mamuju Tengah'),
(380, 'Polewali Mandar'),
(381, 'Bantaeng'),
(382, 'Barru'),
(383, 'Bone	Watampone'),
(384, 'Bulukumba'),
(385, 'Enrekang'),
(386, 'Gowa'),
(387, 'Jeneponto'),
(388, 'Kepulauan Selayar'),
(389, 'Luwu'),
(390, 'Luwu Timur'),
(391, 'Luwu Utara'),
(392, 'Maros'),
(393, 'Pangkajene dan Kepulauan'),
(394, 'Pinrang'),
(395, 'Sidenreng Rappang'),
(396, 'Sinjai'),
(397, 'Soppeng'),
(398, 'Takalar'),
(399, 'Tana Toraja'),
(400, 'Toraja Utara'),
(401, 'Wajo'),
(402, 'Makassar'),
(403, 'Palopo'),
(404, 'Parepare'),
(405, 'Banggai'),
(406, 'Banggai Kepulauan'),
(407, 'Banggai Laut'),
(408, 'Buol'),
(409, 'Donggala'),
(410, 'Morowali'),
(411, 'Parigi Moutong'),
(412, 'Poso'),
(413, 'Sigi'),
(414, 'Tojo Una-Una'),
(415, 'Tolitoli'),
(416, 'Palu'),
(417, 'Bombana'),
(418, 'Buton'),
(419, 'Buton Utara'),
(420, 'Kolaka'),
(421, 'Kolaka Timur'),
(422, 'Kolaka Utara'),
(423, 'Konawe'),
(424, 'Konawe Selatan'),
(425, 'Konawe Utara'),
(426, 'Konawe Kepulauan'),
(427, 'Muna'),
(428, 'Wakatobi'),
(429, 'Bau-Bau'),
(430, 'Kendari'),
(431, 'Bolaang Mongondow'),
(432, 'Bolaang Mongondow Selatan'),
(433, 'Bolaang Mongondow Timur'),
(434, 'Bolaang Mongondow Utara'),
(435, 'Kepulauan Sangihe'),
(436, 'Kepulauan Siau Tagulandang Bia'),
(437, 'Kepulauan Talaud'),
(438, 'Minahasa'),
(439, 'Minahasa Selatan'),
(440, 'Minahasa Tenggara'),
(441, 'Minahasa Utara'),
(442, 'Bitung'),
(443, 'Kotamobagu'),
(444, 'Manado'),
(445, 'Tomohon'),
(446, 'Agam'),
(447, 'Dharmasraya'),
(448, 'Kepulauan Mentawai'),
(449, 'Lima Puluh Kota'),
(450, 'Padang Pariaman'),
(451, 'Pasaman'),
(452, 'Pasaman Barat'),
(453, 'Pesisir Selatan'),
(454, 'Sijunjung'),
(455, 'Solok (Kabupaten)'),
(456, 'Solok Selatan'),
(457, 'Tanah Datar'),
(458, 'Bukittinggi'),
(459, 'Padang'),
(460, 'Padangpanjang'),
(461, 'Pariaman'),
(462, 'Payakumbuh'),
(463, 'Sawahlunto'),
(464, 'Solok (Kota)'),
(465, 'Banyuasin'),
(466, 'Empat Lawang'),
(467, 'Lahat'),
(468, 'Muara Enim'),
(469, 'Musi Banyuasin'),
(470, 'Musi Rawas'),
(471, 'Ogan Ilir'),
(472, 'Ogan Komering Ilir'),
(473, 'Ogan Komering Ulu'),
(474, 'Ogan Komering Ulu Selatan'),
(475, 'Penukal Abab Lematang Ilir'),
(476, 'Ogan Komering Ulu Timur'),
(477, 'Lubuklinggau'),
(478, 'Pagar Alam'),
(479, 'Palembang'),
(480, 'Prabumulih'),
(481, 'Asahan'),
(482, 'Batubara'),
(483, 'Dairi'),
(484, 'Deli Serdang'),
(485, 'Humbang Hasundutan'),
(486, 'Karo	Kabanjahe'),
(487, 'Labuhanbatu'),
(488, 'Labuhanbatu Selatan'),
(489, 'Labuhanbatu Utara'),
(490, 'Langkat'),
(491, 'Mandailing Natal'),
(492, 'Nias'),
(493, 'Nias Barat'),
(494, 'Nias Selatan'),
(495, 'Nias Utara'),
(496, 'Padang Lawas'),
(497, 'Padang Lawas Utara'),
(498, 'Pakpak Bharat'),
(499, 'Samosir'),
(500, 'Serdang Bedagai'),
(501, 'Simalungun'),
(502, 'Tapanuli Selatan'),
(503, 'Tapanuli Tengah'),
(504, 'Tapanuli Utara'),
(505, 'Toba Samosir'),
(506, 'Binjai'),
(507, 'Gunungsitoli'),
(508, 'Medan'),
(509, 'Padangsidempuan'),
(510, 'Pematangsiantar'),
(511, 'Sibolga'),
(512, 'Tanjungbalai'),
(513, 'Tebing Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan_pekerjaan`
--

CREATE TABLE `lowongan_pekerjaan` (
  `ID_LOWONGAN_PEKERJAAN` int(8) NOT NULL,
  `NIP` varchar(15) DEFAULT NULL,
  `NIS` varchar(15) DEFAULT NULL,
  `JUDUL` varchar(50) NOT NULL,
  `GAMBAR` varchar(100) DEFAULT NULL,
  `DESKRIPSI` text NOT NULL,
  `PUBLISHED` datetime NOT NULL,
  `ANGKATAN` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `ID_STATUS` smallint(6) NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID_STATUS`, `STATUS`) VALUES
(1, 'Bekerja'),
(2, 'Tidak Bekerja'),
(3, 'Kuliah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`NIS`);

--
-- Indexes for table `alumni_profil`
--
ALTER TABLE `alumni_profil`
  ADD PRIMARY KEY (`NIS`),
  ADD KEY `STATUS` (`STATUS`),
  ADD KEY `KOTA_SEKARANG` (`KOTA_SEKARANG`),
  ADD KEY `ANGKATAN` (`ANGKATAN`) USING BTREE,
  ADD KEY `AGAMA` (`AGAMA`) USING BTREE;

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`ID_ANGKATAN`);

--
-- Indexes for table `broadcast`
--
ALTER TABLE `broadcast`
  ADD PRIMARY KEY (`ID_BROADCAST`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`ID_KOTA`);

--
-- Indexes for table `lowongan_pekerjaan`
--
ALTER TABLE `lowongan_pekerjaan`
  ADD PRIMARY KEY (`ID_LOWONGAN_PEKERJAAN`),
  ADD KEY `ANGKATAN` (`ANGKATAN`),
  ADD KEY `NIS` (`NIS`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_STATUS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `ID_ANGKATAN` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `broadcast`
--
ALTER TABLE `broadcast`
  MODIFY `ID_BROADCAST` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `ID_KOTA` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT for table `lowongan_pekerjaan`
--
ALTER TABLE `lowongan_pekerjaan`
  MODIFY `ID_LOWONGAN_PEKERJAAN` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `ID_STATUS` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni_profil`
--
ALTER TABLE `alumni_profil`
  ADD CONSTRAINT `alumni_profil_ibfk_1` FOREIGN KEY (`NIS`) REFERENCES `alumni` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumni_profil_ibfk_2` FOREIGN KEY (`STATUS`) REFERENCES `status` (`ID_STATUS`),
  ADD CONSTRAINT `alumni_profil_ibfk_3` FOREIGN KEY (`ANGKATAN`) REFERENCES `angkatan` (`ID_ANGKATAN`),
  ADD CONSTRAINT `alumni_profil_ibfk_4` FOREIGN KEY (`KOTA_SEKARANG`) REFERENCES `kota` (`ID_KOTA`),
  ADD CONSTRAINT `alumni_profil_ibfk_5` FOREIGN KEY (`AGAMA`) REFERENCES `agama` (`id_agama`);

--
-- Constraints for table `broadcast`
--
ALTER TABLE `broadcast`
  ADD CONSTRAINT `broadcast_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `admin` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lowongan_pekerjaan`
--
ALTER TABLE `lowongan_pekerjaan`
  ADD CONSTRAINT `lowongan_pekerjaan_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `admin` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lowongan_pekerjaan_ibfk_2` FOREIGN KEY (`NIS`) REFERENCES `alumni` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lowongan_pekerjaan_ibfk_3` FOREIGN KEY (`ANGKATAN`) REFERENCES `angkatan` (`ID_ANGKATAN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
