-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2021 at 08:45 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `PASS` varchar(255) DEFAULT NULL,
  `active` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`NIP`, `NAMA`, `PASS`, `active`) VALUES
('100000', 'Fadil Husin, M.Kom', '$2y$10$/oGTcT.zYURIpb8hMa1JduHMzZItpe0j8oisxiF8ouWbAop.C0y/.', 1),
('200000', 'Ade Mirna Humaira, S.Pd', '$2y$10$6GJiiaGZNg/oFVhQ7j6TguA6ZW3GckkbrPwzE7bGmOaFOCyhwwiYC', 1),
('300000', 'Mahud, S.Kom', '$2y$10$ZvSZcj3Id2rdMPviFxboGuzwIt5ISCkJqB8JhgAmkssIGv.DTs5dq', 0),
('990601', 'Egy Ijaa', '$2y$10$s9G73Doj7pmXFp7w9y55debVJD4rSpdxLOOXECsviIGc5vYOBb02e', 1);

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
  `USERNAME` varchar(15) NOT NULL,
  `NAMA` varchar(90) DEFAULT NULL,
  `PASS` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`USERNAME`, `NAMA`, `PASS`, `active`) VALUES
('Adawiyya', 'Adawiyah', '$2y$10$dhFXZW2zIbCamFj7XNKJd./s.4DQtSn.3lr7/F/ClqQztN/JsXMHO', 0),
('aditya', 'Aditya Kusuma Putra', '$2y$10$zxzP3YaNGDb/IUNcE85Ag.PQluteyhxGvyUmH71DtjD6Ys1abM3kC', 0),
('agungbaru', 'Agung', '$2y$10$WuplF5bKNFwsAA1nURZ5QOgUGmDFxhfac3Bv4sQDWpeDYePQ4qvWG', 0),
('aldiaufa', 'Aldi Aufa Augusta', '$2y$10$KnU4fuIBp.gJMhEjKNgtvOyfVIYiStctcAG6s5z9q7N7DO7AvUZfK', 1),
('almira', 'Almira Levina Suryana', '$2y$10$47RCffwfKnGPeVC3iWgf.O/cNQumfUYuBjwWpMPwNCTKyhqxYAkJ2', 1),
('altafsy_', 'Altaf Syahrastani', '$2y$10$v/0Kh80prQItie0V0xWfCOnSTDgAaz/k.LWAXx9eDQ5OEhRsNwOnq', 0),
('alvinabaru19', 'Alvina Tantriati', '$2y$10$fGRqErbnQSMP0vNaPmBPIOjgr6MdXOyvduwsKHxPhYa/dTcatl5Du', 0),
('alvinr', 'Alvin Ichwannur Ridho', '$2y$10$L2F3fvxlRFpntQV3wAxbqeRNsTHTtTSsgPZpnx76svj2MCqnZFG.6', 0),
('amelia', 'Amelia Tri Puspita', '$2y$10$xTZE8z3e.3QLa8yGLGt6n.zR/.CLjkX1Ai1I0S4AjWc3/uLcgQk9G', 0),
('antocuy', 'Laksono Widiyanto', '$2y$10$lVaw3qSZnO.SoMOJIyewDe.nm5X1zigpWuqR8p4JLg0QsYj9TFLWG', 0),
('arizkirh', 'Arizki Rahman Hakim', '$2y$10$/iv3hZLT5girEltDE.dCJed1hUQCTC2y2R0jVjCu6j4SrnsxG8fKe', 0),
('ateng1', 'Fiqri Yuda Perdana', '$2y$10$hrsHARljkQDuU.d6QplPH.5wqK8vuR.AEutyQdV8aKvH1f./rdezS', 0),
('ayong2', 'Ayong Putra', '$2y$10$kCszosHM9YTq6WULj2Q2Ie5PaO6xQKYRNtbpGARz189/EjXhnH8vi', 0),
('bagas15', 'Bagas Putra', '$2y$10$KmSpjN8d.X7DMwl9vlERd.wZNGzkS0hhTeO2CCBRMuosbxUa9YBi.', 0),
('Basil5', 'Basil', '$2y$10$GXBcVVgKqJ6JHAzEsWGXiu06h3/TRmWHuSqQ3cAOFZfAIKP7rxXqa', 0),
('bowopra', 'Bowo Prasetyo', '$2y$10$yGDYiWoBiQnc1pwC3M3.3uTbM9aPBapXd7eP8lAc3aNtXhI4eHTbS', 0),
('BungaH', 'Bunga Harevka', '$2y$10$93oheDXClG.ccZXVO6kuY.zegYrPPwLKvufPYEVS0E7rOeovMxjZu', 0),
('chaerani', 'Chaerani', '$2y$10$FBF1l40j6YKInbKj5ulFsOEQyshL74NDteuJJ.FskHR2c0UWERwj.', 0),
('debisah', 'Deby Shafira', '$2y$10$5cA6nhAS8dxlRIIZSRoS6OZS9DXipJiuf80t1tefiZtDGeEYbs7ey', 0),
('derbyhar', 'Deby Harfiani', '$2y$10$DwGiFF8sch7jhW68m7sj9.CHkAqO2hITRZVF26eCzrOcnlDMZzfxC', 0),
('destio', 'Destio ilham Ramadhan', '$2y$10$8cDZS1p0nNWxt9c8nFZDceDKI6rN/SI7bmW8tfGqaNPC0Q1Fd4yiu', 1),
('donimarwansyah', 'Muhammad Doni Marwansyah', '$2y$10$SO00gP44T.AmCBwDin9.BuiofmW0AjkL4Kq9SV3YXy82DdXzYU4hi', 0),
('egyijaa', 'Egy Ihza Madhani', '$2y$10$zzXsKDq9FpKUU.cRRkO/n.LlrNL8GmrcMsc/RaBZUOHU3mI7rp83S', 1),
('fadhil', 'Fadhil Dhani', '$2y$10$i9HqRvCr/dxwpZZm4jNSDeP3xAB3dusDiHyhDlsS96Z62eNvOSx8S', 0),
('Faizah', 'Hani Faizah', '$2y$10$jT1bDKQFAK5xLA2m2M9zeenDk7sTpcUaJ2d1cDobrjRdlqPQeli4e', 0),
('faridbaru', 'Farid Maulana', '$2y$10$Shd7CTbNd2m1lu69w1BsEedTxfMcS8NQEbudXwfpkcSxnAVWodVGu', 0),
('ferdi17', 'Ferdi Lasdiantoro', '$2y$10$u92RVYW0Ucf/BrpDx1g82OQKPDeJoznqnppn9bAO5J/a5yagqBjea', 0),
('fikribaru', 'Fikri Abdillah', '$2y$10$wnBb5Qn6OGh0ifogP4aWr.HS9NzyDUbNtMqIB3VitxI9DP.wj1fnK', 0),
('fitrah', 'Fitrah Subakti', '$2y$10$BRQ4734ez5JIuhybKvMdEOZ4O7fYFoW12Dd54a230TXhLmWcPOnxS', 1),
('ghifary', 'Ghifary Dzulfikar', '$2y$10$WsDXzuDNGAlSH83wlirroOhCujDW2vvnd7W4IBPdHldJ8OxGggr6m', 0),
('haryo15', 'Haryo Amrizal', '$2y$10$Qo2UaBdoqQnz/LtcosgNIuYYLFvUSAJbNi4iVA3KWDgk7vMRpCaU6', 0),
('ichansmanta', 'Ichsannur Riyadiantoro', '$2y$10$WgGHKh0/MPQJ3ySqZbsSku3lkUIu9hrRuZuTW9C1Jq6p1fbfCsTOu', 0),
('IndahC', 'Indah', '$2y$10$9mMgjMRe8e5aBtoN1vOcgeHSh2vWjdjeWmGoY5MQ0DR6Im4wqARIi', 0),
('jaidpunye', 'Mujahid Habibie', '$2y$10$p8SDvd0PGrFz1gTv04hpNOQ7yeHthOSzD3wPz9DXl9D2TqSGX25m.', 0),
('javier', 'Javier Mellynia', '$2y$10$jaz8sklGb6e4IME3LeUkruk6PRPThqnA/0zem5kWSsvBuZPPmmT0K', 0),
('Juliaisti', 'Julia Isti Anatunnisa', '$2y$10$rsxzzXMbcR3/iMGXn0taq.x/PrtMVRSvhU38qXQfYH13Cd.w3ZZJO', 0),
('kemal17', 'Muhammad Kemal Ramadhan', '$2y$10$mzZXGfIGdCcDnYNq0TfkS.JhRj1E7PZ9JVcdWPFKcfB0rmd5ouD9y', 0),
('kintan', 'Kintan Renika Putri', '$2y$10$EE.HCOwXxTdSeuBlDQc80uVZUrZmTywwBtms6g.7z5pQ83T2LVVx2', 0),
('Krisna', 'Krisna', '$2y$10$JMv4dA7TrXJU2yQQeKouj.f1WOWhELImTYrx/zTlnW.yMNfrtDqD2', 0),
('lutfismanta', 'Muhammad Lutfi', '$2y$10$jAtBTjFdeXBajGW2KU3GvuonhsjcEYjP6F.qf6phLpuCCfAgNT8eG', 0),
('maradilla', 'Laras Maradilla Wilujeng', '$2y$10$1.jsW222q9yBUyH7MwMhvu4oDZCtuuSyyaL2wYpwmzjOIvFZbvM5S', 1),
('mbaiya', 'Febya Tristinchia Ningrum', '$2y$10$bmrGfCQLXHpLAAu6KSyFROaSiguA2N3ZgENXfoneDVVt2iKlIcipq', 0),
('melani17', 'Melani', '$2y$10$sdaN4MPDAXP4TQNse0ebbufCFnSxRf9aErLqoMl2a8xeAPefJEkFy', 0),
('miaislami', 'Mia Islami Dewi', '$2y$10$XCFFMtCFOlS5w0b9ehVKQeEDdv8pXcS0tExY0IcPGZquM2v2mYk76', 0),
('myunus', 'Muhammad Yunus', '$2y$10$ZWVpg7.3cR79ku14hJzQYO15NYJZEakji4tgRjQZU.HwDEKE5coQu', 0),
('Nabila', 'Nabila', '$2y$10$w3ZQmnNB9kIuBEV9ZDyMAeDDfDWnUZbOdPhQdVSO.AHfeo4NJKAl.', 0),
('namira', 'Ine Namira', '$2y$10$0zH2/AZ5yb8ckjzId3LWkufzeQeUYw70RQeFZhC.KR/KLBvnHw9HS', 0),
('Naufal', 'Naufal Diyanggara', '$2y$10$oulWMbKEJackBzh2qqDMA.qzQWu9EV7mNFMRiKdh0UunB4xG0rNLG', 1),
('nurafera', 'Nuraferazan', '$2y$10$K2CpxtmjV1PrizAfTftUbu/chPcRhCKtnPLgIighD1KlCL3YKf7Xq', 0),
('nuruldwi', 'Nurul Dwi Fitria', '$2y$10$lm1ePt.JLJZtwmjd0Ctp2u6K/97/MxJNbHtPAwFPMvZ3KIHJrWSaK', 0),
('nury17', 'Nury Kamelia', '$2y$10$HbQAfwjNYJp/Do0Wp0mJ4eFQO.E6.RI33YL1Q3mjkYdHdd/A74fBy', 0),
('Rahmana', 'Rahmanadanti Daud', '$2y$10$wEjZ4VKDnw2zRvfGyjN5zuTF0C3Qdws6iZr/Uf4czn7wKb/DDyPUO', 0),
('rakadi', 'Rakaditya', '$2y$10$lSpjeGesv0gleP/pgq1B1uNkD8wmR1n9z9cgltdlGcwtTnveDnyHS', 0),
('RezaTama', 'Reza Tama', '$2y$10$QYWO068AxB2/sM77ANZkoO/J/dnR7kJkz.TBK70BP8Af2EI9hcI8C', 0),
('Ridzaty', 'Ridzaty Almira', '$2y$10$Xj0EGsd0/rTyMdqIRWbpw.vVs0gNynz3Xyexvb1ACqga5B7HYFzIO', 0),
('rifqiM', 'Muhammad Rifqi Maulana', '$2y$10$heHJO5TwDXC.i.SMcC97N.49EX8U4CLKnR0RakZnOrJLr7K8BtH5e', 0),
('robianbaru', 'Robian Aulia', '$2y$10$qxLiIQ4iSaYRtAtZ3/j2aesk9lJ6Qwmc4qRqiye819DzwMl4/5LKi', 0),
('Taudiq', 'Taufiq Waluya', '$2y$10$/JBiY49GurvauvL.AMd4N.WEYBfWJNLW/RahaxUejgmvKK8tGAYhK', 0),
('tiarabaru', 'Tiara Nur Aulia', '$2y$10$3HZDofjmNMFhKxhUKQKa7ushCfnWdyJughw/icQSZqRo8hn8QpdJ6', 0),
('tiwidea', 'Tiwi Dea Pratiwi', '$2y$10$YalXxrKWSJlbSJs878FBxuP0veck1rIKCBUBZfQ1iXc.X1VyYjQyW', 0),
('vianadita', 'Via Nadita', '$2y$10$SivruUdY3dwR6ysbc7/a2OJJEoWF7ZXuuVYMLVpSYk3mgq29z0Euq', 0),
('wahyu16', 'Wahyu Tsary Naufal', '$2y$10$QVR/C11LV60U/IhkS3YsoOLWrcT.07ixSmpORcsEzLJp/iXk0ccTe', 1),
('Whayupunye', 'Wahyu Titianto Nugroho', '$2y$10$JaYrF7zX.RRnF8pj6JR4LOjkRZRpgnnyxU98pakFpcFBEvjtJx8BG', 1),
('wildan', 'Muhammad Wildan', '$2y$10$bSYNpZr56epZ5FvfJA4A/OwzS5BGwJIzLiz64wnh2UUTPnfCqIaL6', 0),
('winaldy27', 'Winaldy Maulidan', '$2y$10$3E9s4eW.vk.MuQLe1Y6dA.iSE1jbL5yZehhXrhg8/N1JzbYzsyJCG', 1),
('yeni17', 'Yeni Qotrunada', '$2y$10$E0PcLPlrSMeazFx7N7bkSuBCoZNkJSfDf7gRiVCNKHlzbQPls.Z0O', 0),
('zico17', 'Zico Andika Tama', '$2y$10$u5bfxSuI8SCkrefoGpjb8.JRUktHSHOFwXMxbUcnBo1u46KJGPmIC', 0),
('zulfikar', 'Akmal Dzulfikar', '$2y$10$p8pLD7VkNFFsu9lmj.4GoO/Ta2hAQ3w.hzVWNJu5.r4n7tUnk2d9i', 0);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_profil`
--

CREATE TABLE `alumni_profil` (
  `USERNAME` varchar(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `FOTO_PROFIL` varchar(255) DEFAULT NULL,
  `ANGKATAN` smallint(4) DEFAULT NULL,
  `AGAMA` tinyint(4) DEFAULT NULL,
  `ALAMAT_ASAL` varchar(200) NOT NULL,
  `ALAMAT_SEKARANG` varchar(200) NOT NULL,
  `KOTA_SEKARANG` smallint(6) DEFAULT NULL,
  `NO_TELEPON` varchar(20) NOT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  `KETERANGAN` varchar(200) NOT NULL,
  `LATEST` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_profil`
--

INSERT INTO `alumni_profil` (`USERNAME`, `EMAIL`, `FOTO_PROFIL`, `ANGKATAN`, `AGAMA`, `ALAMAT_ASAL`, `ALAMAT_SEKARANG`, `KOTA_SEKARANG`, `NO_TELEPON`, `TANGGAL_LAHIR`, `STATUS`, `KETERANGAN`, `LATEST`) VALUES
('Adawiyya', 'ummuadibah13@gmail.com', 'default.jpg', 17, 1, '', '', 192, '0895600410820', NULL, 5, '', '2021-10-30 17:50:09'),
('aditya', 'adit@gmail.com', 'default.jpg', 15, 1, '', '', 192, '088623136598', NULL, 7, '', '2021-07-17 18:21:26'),
('agungbaru', 'agung@gmail.com', 'default.jpg', 19, 1, '', '', 192, '089578784512', NULL, 3, '', '2021-07-17 17:42:26'),
('aldiaufa', 'aldi@gamil.com', 'default.jpg', 17, 1, '', '', 192, '085656230012', NULL, 11, '', '2021-07-17 18:28:00'),
('almira', 'mira@gmail.com', 'default.jpg', 17, 3, '', '', 97, '089396002303', NULL, 3, '', '2021-07-17 18:27:26'),
('altafsy_', 'gantengorang461@gmail.com', 'default.jpg', 19, 1, '', '', 192, '085821461898', NULL, 3, '', '2021-07-16 06:21:56'),
('alvinabaru19', 'vina@gmail.com', 'default.jpg', 19, 1, '', '', NULL, '085759898784', NULL, NULL, '', '2021-10-02 03:15:25'),
('alvinr', 'alvinridho01@gmail.com', 'default.jpg', 17, 1, '', '', 139, '081350952656', NULL, 3, '', '2021-07-16 22:02:35'),
('amelia', 'amel@gmail.com', 'default.jpg', 16, 1, '', '', 192, '084512003256', NULL, 7, '', '2021-07-17 18:32:33'),
('antocuy', 'laksono@gmail.com', 'default.jpg', 17, 1, '', '', 192, '081312465712', NULL, 3, '', '2021-07-17 03:56:33'),
('arizkirh', 'rizkiq@gmail.com', 'default.jpg', 18, 1, '', '', 192, '085656890013', NULL, 3, '', '2021-07-17 18:29:57'),
('ateng1', 'ateng@gmail.com', 'default.jpg', 17, 1, '', '', 97, '083265987845', NULL, 3, '', '2021-07-17 03:58:52'),
('ayong2', 'putra@gmail.com', 'default.jpg', 13, 1, '', '', 192, '089696951242', NULL, 6, '', '2021-07-17 18:22:54'),
('bagas15', 'bagas@gmail.com', 'default.jpg', 15, 1, '', '', 174, '083232120202', NULL, 7, '', '2021-07-17 18:20:29'),
('Basil5', 'basil@gmail.com', 'default.jpg', 17, 1, '', '', 294, '081213121212', NULL, 4, '', '2021-07-17 03:59:22'),
('bowopra', 'bowo@gmail.com', 'default.jpg', 17, 1, '', '', 292, '088979465124', NULL, 4, '', '2021-07-17 17:33:43'),
('BungaH', 'bunga@gmail.com', 'default.jpg', 16, 1, '', '', 402, '081231456498', NULL, 3, '', '2021-07-17 03:54:27'),
('chaerani', 'chae@gmail.com', 'default.jpg', 17, 1, '', '', NULL, '0895606068320', NULL, NULL, '', '2021-10-19 10:59:06'),
('debisah', 'deby@gmail.com', 'default.jpg', 18, 1, '', '', 192, '0845464578451', NULL, 3, '', '2021-07-17 17:35:12'),
('derbyhar', 'harfiani@gmail.com', 'default.jpg', 17, 1, '', '', 138, '087898784565', NULL, 11, '', '2021-07-17 18:15:50'),
('destio', 'egygsg22@yahoo.com', 'default.jpg', 17, 1, '', '', 192, '089667784446', NULL, 3, '', '2021-07-16 22:02:03'),
('donimarwansyah', 'doni@gmail.com', 'default.jpg', 17, 1, '', '', 192, '086532659878', NULL, 5, '', '2021-07-16 06:21:01'),
('egyijaa', 'egyijaa@gmail.com', 'egyijaa.jpg', 17, 1, 'Jl. Budi Utomo, Taman Anggrek, G.17, Kota Pontianak', 'Jalan Candi Bajang Ratu I, Kost Basecamp Nomor 15AA', 174, '0895606068325', '1999-01-06', 3, 'Mahasiswa Prodi Pendidikan Teknologi Informasi Universitas Brawijaya ', '2021-10-31 14:37:22'),
('fadhil', 'fadhildhani22@gmail.com', 'default.jpg', 19, 1, '', '', 174, '0895364430397', NULL, 3, '', '2021-07-16 22:04:56'),
('Faizah', 'hani@gmail.com', 'default.jpg', 17, 1, '', '', 192, '087879784565', NULL, 6, '', '2021-07-17 03:57:14'),
('faridbaru', 'farid@gmail.com', 'default.jpg', 16, 1, '', '', 192, '089693958760', NULL, 5, '', '2021-07-16 06:20:18'),
('ferdi17', 'ferdi@gmail.com', 'default.jpg', 17, 1, '', '', NULL, '089696969587', NULL, NULL, '', '2021-10-02 02:22:13'),
('fikribaru', 'fikri@gmail.com', 'default.jpg', 16, 1, '', '', 192, '086565238989', NULL, 7, '', '2021-07-17 17:41:51'),
('fitrah', 'bakti@gmail.com', 'default.jpg', 15, 1, '', '', 97, '089898659878', NULL, 7, '', '2021-07-17 17:36:44'),
('ghifary', 'gifar@gmail.com', 'default.jpg', 16, 1, '', '', 100, '087879791312', NULL, 7, '', '2021-07-17 18:20:07'),
('haryo15', 'aryo@gmail.com', 'default.jpg', 17, 1, '', '', 192, '089696984512', NULL, 12, '', '2021-07-17 18:26:47'),
('ichansmanta', 'inchan@gmail.com', 'default.jpg', 17, 1, '', '', 59, '088912003202', NULL, 7, '', '2021-07-17 18:34:07'),
('IndahC', 'indah@gmail.com', 'default.jpg', 17, 1, '', '', 192, '089865659865', NULL, 4, '', '2021-07-17 03:59:50'),
('jaidpunye', 'jaid@gmail.com', 'default.jpg', 18, 1, '', '', 192, '084645469878', NULL, 6, '', '2021-07-17 17:36:03'),
('javier', 'melin@gmail.com', 'default.jpg', 17, 1, '', '', 192, '087878459878', NULL, 6, '', '2021-07-17 18:31:07'),
('Juliaisti', 'julia@gmail.com', 'default.jpg', 17, 1, '', '', 138, '087979467845', NULL, 11, '', '2021-07-17 18:18:55'),
('kemal17', 'donikemal@gmail.com', 'default.jpg', 17, 1, '', '', NULL, '08959587874', NULL, NULL, '', '2021-10-02 02:18:26'),
('kintan', 'kintan@gmail.com', 'default.jpg', 17, 1, '', '', 459, '089223230212', NULL, 2, '', '2021-07-17 18:25:51'),
('Krisna', 'krisna@gmail.com', 'default.jpg', 17, 1, '', '', 192, '086532124578', NULL, 4, '', '2021-07-17 04:00:28'),
('lutfismanta', 'lutfi@gmail.com', 'default.jpg', 17, 1, '', '', 192, '087878451245', NULL, 3, '', '2021-07-17 18:14:57'),
('maradilla', 'laras@gmail.com', 'default.jpg', 15, 1, '', '', 174, '081346784512', NULL, 11, '', '2021-07-17 17:37:16'),
('mbaiya', 'febya@gmail.com', 'default.jpg', 17, 1, '', '', 192, '084546457845', NULL, 3, '', '2021-07-17 03:57:56'),
('melani17', 'melani@gmail.com', 'default.jpg', 17, 1, '', '', NULL, '087454545123', NULL, NULL, '', '2021-10-02 06:25:39'),
('miaislami', 'mia@gmail.com', 'default.jpg', 16, 1, '', '', 192, '089865659878', NULL, 12, '', '2021-07-17 17:41:03'),
('myunus', 'yunus@gmail.com', 'default.jpg', 16, 1, '', '', 192, '086565988945', NULL, 11, '', '2021-07-17 18:17:45'),
('Nabila', 'nabila@gmail.com', 'default.jpg', 16, 1, '', '', 192, '083526352612', NULL, 7, '', '2021-07-17 04:02:17'),
('namira', 'ine@gmail.com', 'default.jpg', 18, 1, '', '', 55, '089595784600', NULL, 3, '', '2021-07-17 18:30:24'),
('Naufal', 'nopal@gmail.com', 'default.jpg', 17, 1, '', '', 192, '081312454578', NULL, 3, '', '2021-07-17 17:34:25'),
('nurafera', 'nura@gmail.com', 'default.jpg', 17, 1, '', '', 192, '087878457845', NULL, 7, '', '2021-07-17 17:40:38'),
('nuruldwi', 'nurul@gmail.com', 'default.jpg', 17, 1, '', '', 55, '089595989878', NULL, 3, '', '2021-07-17 18:16:22'),
('nury17', 'nurybaru@gmail.com', 'default.jpg', 17, 1, '', '', NULL, '087848575926', NULL, NULL, '', '2021-10-02 02:24:23'),
('Rahmana', 'danti@gmail.com', 'default.jpg', 17, 1, '', '', 192, '089562626568', NULL, 11, '', '2021-07-17 17:39:24'),
('rakadi', 'raka@gmail.com', 'default.jpg', 15, 1, '', '', 192, '089693969695', NULL, 6, '', '2021-07-17 18:22:05'),
('RezaTama', 'reza@gmail.com', 'default.jpg', 18, 1, '', '', 138, '081312131213', NULL, 3, '', '2021-07-17 03:55:18'),
('Ridzaty', 'almira@gmail.com', 'default.jpg', 16, 1, '', '', 174, '081213145678', NULL, 5, '', '2021-07-16 21:59:07'),
('rifqiM', 'rifqi@gmail.com', 'default.jpg', 17, 1, '', '', 292, '085878784512', NULL, 4, '', '2021-07-17 04:01:19'),
('robianbaru', 'aulia@gmail.com', 'default.jpg', 17, 1, '', '', 192, '089636562358', NULL, 3, '', '2021-07-17 17:42:53'),
('Taudiq', 'taufiq@gmail.com', 'default.jpg', 17, 1, '', '', 192, '089898976457', NULL, 3, '', '2021-07-17 03:55:49'),
('tiarabaru', 'tiara@gmail.com', 'default.jpg', 17, 1, '', '', 192, '089898784545', NULL, 7, '', '2021-07-17 17:39:52'),
('tiwidea', 'tiwi@gmail.com', 'default.jpg', 17, 1, '', '', 192, '089393626212', NULL, 3, '', '2021-07-17 18:25:15'),
('vianadita', 'via@gmail.com', 'default.jpg', 18, 1, '', '', 192, '0857504412323', NULL, 3, '', '2021-07-17 18:33:09'),
('wahyu16', 'wahyu@gmail.com', 'default.jpg', 16, 1, '', '', 192, '08787974757671', NULL, 4, '', '2021-07-16 21:58:32'),
('Whayupunye', 'wahyumarkaz@gmail.com', 'default.jpg', 12, 1, '', '', 192, '089832321245', NULL, 5, '', '2021-07-17 17:38:27'),
('wildan', 'wildan@gmail.com', 'default.jpg', 16, 1, '', '', 192, '089595656512', NULL, 11, '', '2021-07-17 18:17:19'),
('winaldy27', 'maulidan.winaldy@gmail.com', 'default.jpg', 19, 1, '', '', 55, '082151676287', NULL, 5, '', '2021-07-16 06:22:32'),
('yeni17', 'yeni@gmail.com', 'default.jpg', 17, 1, '', '', NULL, '089568978451', NULL, NULL, '', '2021-10-02 04:33:51'),
('zico17', 'zicobaru@gmail.com', 'default.jpg', 17, 1, '', '', NULL, '0859683254578', NULL, NULL, '', '2021-10-02 02:26:01'),
('zulfikar', 'akmal@gmail.com', 'default.jpg', 17, 1, '', '', 192, '089393656256', NULL, 3, '', '2021-07-17 18:18:16');

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
(21, 2021),
(22, 2022);

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
  `PUBLISHED` datetime NOT NULL DEFAULT current_timestamp(),
  `expired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `broadcast`
--

INSERT INTO `broadcast` (`ID_BROADCAST`, `NIP`, `JUDUL`, `GAMBAR`, `KONTEN`, `PUBLISHED`, `expired`) VALUES
(3, '100000', 'Pentas Seni Smanta Angkatan 51', '55770606_309931626347924_261177475337214420_n.jpg', '<p>&nbsp;</p>\r\n\r\n<p>???? SMA NEGERI 3 PONTIANAK ????<br />\r\n.<br />\r\nProudly ???? Present :<br />\r\nPentas Seni Smanta Angkatan 51<br />\r\n.<br />\r\n????Will be held on :<br />\r\nSaturday,20 &amp; Sunday,21 April 2019<br />\r\n???? Open Doors at 9 Am ????TAMAN BUDAYA PONTIANAK (Jl.Jenderal Ahmad Yani)<br />\r\n???? OTS : 10k Presale : 8k<br />\r\n.<br />\r\nFor more Info,Contact us at :<br />\r\nWhatsapp : 083125911621<br />\r\nLine : dheiaa. [use (.)]<br />\r\n.<br />\r\nAjak teman dan kerabat kalian untuk ikut memeriahkan PESTA AKT 51<br />\r\n.<br />\r\nWe&rsquo;re Waiting For Your Presence??</p>\r\n', '2021-06-25 23:25:22', '2021-09-01 20:26:57'),
(5, '100000', 'Reuni Akbar Smanta', 'reuni.jpg', '<p>Segera datang ya!</p>\r\n\r\n<p>We miss uu all!!</p>\r\n', '2021-06-26 23:01:08', '2021-09-20 20:45:28'),
(6, '100000', 'HUT ke 50 OSNO', 'hutSMANTA50.jpg', '<p>SMANTA 50th ANNIVERSARY</p>\r\n\r\n<p>-OLD SCHOOL NEVER OLD-</p>\r\n\r\n<p>Guest Star : Fourtwnty<br />\r\nSpecial Performance : Coffternoon, LAS!, Parkinson<br />\r\nOpening Act : Long Live The Queen, Sepertiga Semester, Merahjingga, Linimasa, Reza &amp; Miranda</p>\r\n\r\n<p>Minggu, 26 Februari 2017<br />\r\nLapangan SMA Negeri 3 Pontianak<br />\r\nTicket Price : 30K (OTS)</p>\r\n\r\n<p>More Information : 08985722473<br />\r\nID Line : bugtwitter</p>\r\n', '2021-06-26 23:25:04', '2021-09-17 01:50:00'),
(7, '100000', 'HUT Smanta 53', 'hut53.jpg', '<p>SMA NEGERI 3 PONTIANAK<br />\r\n.<br />\r\nDalam rangka memeriahkan HUT SMA Negeri 3 Pontianak<br />\r\n.<br />\r\n.<br />\r\nClassical and Precious Momentum<br />\r\n.<br />\r\nDengan Bintang Tamu Utama :<br />\r\nK U N T O A J I<br />\r\n.<br />\r\nYang akan diselenggarakan pada FEBRUARI 2020<br />\r\n.<br />\r\nPantau terus instagram kami untuk info info selanjutnya<br />\r\n.<br />\r\nJangan sampai ketinggalan<br />\r\n<br />\r\n#hutsmanta53 #smanta53 #smantaptk #classicoum #kuntoaji #pensisekolah #eventsekolah #pontianak\r\n', '2021-06-27 01:41:41', '2021-09-20 20:16:14'),
(10, '200000', 'HUT52 YAAA', 'hut52.jpg', '<p>I&rsquo;m a big real-life laugher, and in recent years, in e-mails, chats, and texts, I&rsquo;ve become a big &ldquo;haha&rdquo;-er. You say something hilarious, I&rsquo;ll write a few &ldquo;ha&rdquo;s. That&rsquo;s how I e-laugh. I realize that this isn&rsquo;t especially dignified. My &ldquo;haha&rdquo;s make me look the way I do in party photos: open-mouthed, loud, a little vulgar. Writing &ldquo;hahaha&rdquo; makes</p>\r\n\r\n<p><s>you look deranged, but, then again, so does laughing. I&rsquo;ve accepted this state of affairs, and my friends have, too, for the most part. I like a good-faith representation of how much laughing we&rsquo;re doing and how hard we&rsquo;re doing it. Some of my friends are above it&mdash;they don&rsquo;t &ldquo;ha&rdquo; much or at all, which makes me self-conscious. They accept an amusing back-and-forth as a normal course of events and press on hilariously, without a lot of ha-ha goofery. I can&rsquo;t do that. Even among those regal beagles, I have to laugh away.</s></p>\r\n', '2021-09-18 00:30:13', '2021-10-31 00:30:00'),
(14, '200000', 'dfgdgfdgfdg', 'photo-1601902572612-3c850fab3ad8.jpg', '<p>45647665765867</p>\r\n', '2021-09-18 00:53:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` bigint(20) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 NOT NULL,
  `comments` text NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comment`, `post_id`, `username`, `comments`, `createdOn`) VALUES
(1, 10, 'egyijaa', 'wahh bagus ni ikot dong', '2021-10-27 14:21:03'),
(2, 14, 'egyijaa', 'Bagus sepertinya', '2021-10-27 14:43:55'),
(3, 7, 'antocuy', 'masedh ade ke min?', '2021-10-27 14:46:10'),
(4, 7, 'egyijaa', 'ngericoyyy', '2021-10-27 20:24:15'),
(5, 6, 'egyijaa', 'nanti pecah macam osno!', '2021-10-27 20:30:58'),
(6, 14, 'destio', 'udah leawt dah bang eh', '2021-10-28 00:27:38'),
(7, 10, 'destio', 'uhhhhh keren', '2021-10-28 00:46:50'),
(8, 7, 'destio', 'haa uyelah', '2021-10-28 00:48:46'),
(9, 14, 'egyijaa', 'aoklah tuuu', '2021-10-28 02:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `comments_replies`
--

CREATE TABLE `comments_replies` (
  `id_replies` bigint(20) NOT NULL,
  `comment_id` bigint(20) NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 NOT NULL,
  `reply` text NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments_replies`
--

INSERT INTO `comments_replies` (`id_replies`, `comment_id`, `username`, `reply`, `createdOn`) VALUES
(1, 6, 'egyijaa', 'sok tau dessss', '2021-10-28 02:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` smallint(5) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `no_telepon`, `instagram`, `twitter`) VALUES
(1, '0895606068325', 'smanta_ptk', ''),
(2, '0895606068325', 'egyijaa_', '@egyijaa_'),
(3, '', 'smanta_pontianak', ''),
(6, '0895606068325', '', '@egyijaa_'),
(7, '0895606068325', '', ''),
(8, '', 'egyijaa_', ''),
(9, '0895606068325', '', ''),
(10, '085750444927', 'smanta_pontianak', ''),
(13, '', '', ''),
(14, '', '', ''),
(15, '', '', ''),
(16, '', '', ''),
(17, '', '', ''),
(18, '', '', ''),
(19, '', '', ''),
(20, '', '', ''),
(21, '', '', ''),
(22, '', '', ''),
(23, '', '', ''),
(24, '', '', ''),
(25, '', '', ''),
(26, '', '', ''),
(27, '', '', ''),
(28, '', '', ''),
(29, '', '', ''),
(30, '', '', ''),
(31, '', '', ''),
(46, '', '', ''),
(48, '0895606068325', '', '');

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
  `ID_LOWONGAN_PEKERJAAN` smallint(5) NOT NULL,
  `NIP` varchar(15) DEFAULT NULL,
  `USERNAME` varchar(15) DEFAULT NULL,
  `JUDUL` varchar(70) NOT NULL,
  `GAMBAR` varchar(100) DEFAULT NULL,
  `DESKRIPSI` text NOT NULL,
  `PUBLISHED` datetime NOT NULL,
  `EXPIRED` datetime NOT NULL,
  `PENDIDIKAN` tinyint(3) DEFAULT NULL,
  `ACTIVE` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan_pekerjaan`
--

INSERT INTO `lowongan_pekerjaan` (`ID_LOWONGAN_PEKERJAAN`, `NIP`, `USERNAME`, `JUDUL`, `GAMBAR`, `DESKRIPSI`, `PUBLISHED`, `EXPIRED`, `PENDIDIKAN`, `ACTIVE`) VALUES
(1, '100000', NULL, 'Back End Developer', 'Poster-Lowongan-Kerja-IT.jpeg', '<p>Tanggung Jawab Pekerjaan :</p>\r\n\r\n<p>Responsibility :<br />\r\n&bull; Developing advanced applications for enterprise platform.<br />\r\n&bull; Develop integrated plan across multiple workstream in the project<br />\r\n&bull; Interact with project manager, developers, and cross-functional teams.<br />\r\n&bull; Write unit-testing code for robustness, including edge cases, usability, and general reliability.<br />\r\n&bull; Help maintain code quality, organization, and automatization.</p>\r\n\r\n<p>Syarat Pengalaman :</p>\r\n\r\n<p>Minimum 5 years of experience in the related field.</p>\r\n\r\n<p>Keahlian :</p>\r\n\r\n<p>Requirement :<br />\r\n&bull; Bachelor&rsquo;s Degree in Computer Science, Computer Engineering or related disciplines.<br />\r\n&bull; Minimum 5 years of experience in the related field.<br />\r\n&bull; Highly skilled in Java or C++<br />\r\n&bull; Strong knowledges in PosgresSQL is a plus</p>\r\n\r\n<p>Kualifikasi :</p>\r\n\r\n<p>Requirement :<br />\r\n&bull; Bachelor&rsquo;s Degree in Computer Science, Computer Engineering or related disciplines.<br />\r\n&bull; Minimum 5 years of experience in the related field.<br />\r\n&bull; Highly skilled in Java or C++<br />\r\n&bull; Strong knowledges in PosgresSQL is a plus</p>\r\n', '2021-06-30 18:13:15', '2021-07-10 18:12:00', 5, 1),
(2, NULL, 'egyijaa', 'Videographer dan Desain Grafis', 'lowongan-pekerjaan.jpeg', '<p>Di butuhkan segara pria atau wanita tanpa pengalaman dan siap di tempatkan di lokasi kerja yang telah di tentukan oleh perusahaanDapatkan info lowongan baru untuk pencarian ini. Lowongan kerja terbaru di tangerang selatan. Idlowonganke<strong>rja adalah website yang menyediakan informasi lowongan kerja terlengkap dan terupdate. Lowongan Kerja Videographer Gaji Tinggi</strong>.</p>\r\n', '2021-07-01 01:08:59', '2021-09-18 16:40:00', 5, 1),
(3, '200000', NULL, 'Staff Penerjemah', '21448_medium_photo_2018-02-10_21-30-18.jpg', '<p>HARUSNYA ADA INI WOY</p>\r\n', '2021-07-01 01:29:14', '2021-07-15 01:28:00', 5, 1),
(6, NULL, 'egyijaa', 'Lowongan HRD', 'contoh-iklan-lowongan-pekerjaan-dalam-bahasa-inggris-8.jpg', '<p>sadfsgdfghhrtyry565756756757567512131312312321<strong>asahsuashuashuhsahsu<em>adaksdksafnasdkanfkjajfksnakfnaskfkasfn</em></strong><em>ajsajsajsajsasshasj</em></p>\r\n', '2021-07-02 01:58:41', '2021-09-15 16:37:00', 4, 1),
(7, NULL, 'egyijaa', 'Graphic Desainer', '3_Lowongan_Kerja_Pendidikan_Minimal_D3_Fresh_Graduate.jpg', '<p>Cepat hee</p>\r\n', '2021-09-13 18:05:55', '2021-09-24 18:05:00', 1, 1),
(8, NULL, 'egyijaa', 'Marketing Digital', '49f6c217ed44069306d93bf30134f924.jpg', '<p>asdsadsadsadadasdsad</p>\r\n', '2021-09-13 18:06:28', '2021-09-30 18:06:00', 1, 1),
(9, NULL, 'egyijaa', 'Marketing (Manajer)', 'default.jpg', '<p>Expedita&nbsp;quod,&nbsp;illo&nbsp;rerum&nbsp;et&nbsp;enim&nbsp;est&nbsp;laboriosam&nbsp;iure&nbsp;amet&nbsp;voluptates?&nbsp;Ullam&nbsp;cumque&nbsp;architecto&nbsp;labore&nbsp;ratione&nbsp;vitae&nbsp;minus&nbsp;harum&nbsp;sint&nbsp;a&nbsp;illo&nbsp;nisi&nbsp;sunt&nbsp;tempore,&nbsp;odio&nbsp;possimus&nbsp;est&nbsp;quo&nbsp;sit&nbsp;quaerat&nbsp;repellat&nbsp;nulla&nbsp;nobis?&nbsp;Earum&nbsp;reiciendis&nbsp;beatae&nbsp;adipisci&nbsp;ipsum&nbsp;molestiae&nbsp;repudiandae&nbsp;aliquam&nbsp;molestias&nbsp;eum,&nbsp;dolorem&nbsp;voluptatibus&nbsp;laudantium&nbsp;explicabo&nbsp;vero&nbsp;minima&nbsp;ducimus&nbsp;qui&nbsp;dolore&nbsp;ut&nbsp;accusantium&nbsp;magnam&nbsp;rem!&nbsp;Iure&nbsp;magnam&nbsp;velit&nbsp;molestias&nbsp;nesciunt&nbsp;cum&nbsp;quod&nbsp;repellat&nbsp;facilis&nbsp;voluptates&nbsp;molestiae,&nbsp;non&nbsp;ad&nbsp;tempora&nbsp;quisquam&nbsp;sequi&nbsp;corrupti&nbsp;cupiditate&nbsp;magni&nbsp;quia&nbsp;voluptate,&nbsp;aperiam&nbsp;illo&nbsp;totam&nbsp;assumenda&nbsp;voluptatem&nbsp;in&nbsp;animi.&nbsp;Maxime&nbsp;tempora&nbsp;harum&nbsp;quia&nbsp;dicta&nbsp;ipsum&nbsp;debitis&nbsp;natus&nbsp;deleniti,&nbsp;temporibus&nbsp;non.&nbsp;Consequatur&nbsp;magni&nbsp;nemo&nbsp;cupiditate&nbsp;nesciunt&nbsp;saepe&nbsp;unde&nbsp;explicabo&nbsp;dicta&nbsp;optio&nbsp;error&nbsp;veritatis&nbsp;praesentium&nbsp;odio&nbsp;voluptatibus,&nbsp;ipsa&nbsp;cum&nbsp;autem&nbsp;eum.&nbsp;Optio&nbsp;earum&nbsp;minus&nbsp;maxime&nbsp;reiciendis,&nbsp;repellat&nbsp;odit.&nbsp;Praesentium,&nbsp;ut!&nbsp;Vero&nbsp;suscipit&nbsp;saepe&nbsp;facilis&nbsp;quam&nbsp;commodi&nbsp;reprehenderit&nbsp;aliquam&nbsp;dicta.&nbsp;Nobis&nbsp;reprehenderit&nbsp;iusto&nbsp;cum,&nbsp;eius&nbsp;libero&nbsp;molestiae&nbsp;voluptatem&nbsp;aspernatur&nbsp;dolore&nbsp;adipisci&nbsp;explicabo&nbsp;reiciendis&nbsp;modi&nbsp;maxime&nbsp;laboriosam&nbsp;ex&nbsp;ea&nbsp;id&nbsp;consectetur&nbsp;rem&nbsp;porro&nbsp;doloribus&nbsp;distinctio&nbsp;ipsum&nbsp;dolor&nbsp;voluptatibus.&nbsp;Porro&nbsp;soluta&nbsp;sed,&nbsp;ipsum&nbsp;molestiae&nbsp;quasi&nbsp;animi.&nbsp;Minus&nbsp;veritatis&nbsp;non&nbsp;reiciendis.&nbsp;Odit,&nbsp;ex&nbsp;dolorem&nbsp;eligendi&nbsp;illo&nbsp;deserunt&nbsp;atque&nbsp;tempora&nbsp;eos.&nbsp;Officia&nbsp;placeat&nbsp;illo&nbsp;unde&nbsp;deserunt?&nbsp;Cumque&nbsp;earum&nbsp;aspernatur&nbsp;error&nbsp;nostrum&nbsp;ipsam&nbsp;mollitia&nbsp;officiis&nbsp;quidem&nbsp;quod&nbsp;ex&nbsp;illum&nbsp;fugit&nbsp;necessitatibus,&nbsp;dicta&nbsp;itaque&nbsp;ea&nbsp;libero&nbsp;dolore&nbsp;dolorum&nbsp;eligendi&nbsp;eveniet&nbsp;accusamus&nbsp;harum&nbsp;sit,&nbsp;sapiente&nbsp;debitis&nbsp;eius&nbsp;natus.&nbsp;Delectus&nbsp;nam&nbsp;pariatur&nbsp;illum&nbsp;dolorem&nbsp;perspiciatis&nbsp;eligendi&nbsp;deserunt&nbsp;quasi&nbsp;nisi&nbsp;explicabo&nbsp;ea,&nbsp;repudiandae,&nbsp;ut&nbsp;quo&nbsp;facilis&nbsp;reprehenderit&nbsp;mollitia.&nbsp;Perspiciatis&nbsp;ullam&nbsp;neque&nbsp;voluptate&nbsp;reprehenderit,&nbsp;voluptatum&nbsp;aspernatur&nbsp;quas&nbsp;voluptates&nbsp;voluptatem&nbsp;corrupti&nbsp;ratione&nbsp;velit&nbsp;qui&nbsp;corporis&nbsp;eveniet&nbsp;iure,&nbsp;fuga&nbsp;ducimus&nbsp;laboriosam&nbsp;excepturi!&nbsp;Rerum&nbsp;ex&nbsp;similique&nbsp;error,&nbsp;eos&nbsp;itaque&nbsp;assumenda&nbsp;exercitationem&nbsp;voluptatem&nbsp;consequatur&nbsp;ratione&nbsp;odit&nbsp;natus&nbsp;dolor&nbsp;ut&nbsp;tempore&nbsp;modi&nbsp;culpa&nbsp;deserunt,&nbsp;fugiat&nbsp;veritatis,&nbsp;id&nbsp;quaerat&nbsp;quas&nbsp;illo&nbsp;distinctio&nbsp;molestias.&nbsp;Similique&nbsp;ipsa&nbsp;vitae&nbsp;hic&nbsp;fugit&nbsp;magnam?&nbsp;Placeat,&nbsp;sequi?&nbsp;Odio,&nbsp;architecto&nbsp;porro?&nbsp;Provident,&nbsp;repudiandae&nbsp;ipsam?&nbsp;Dignissimos&nbsp;excepturi&nbsp;incidunt&nbsp;praesentium&nbsp;a&nbsp;itaque&nbsp;ullam&nbsp;pariatur&nbsp;unde&nbsp;saepe&nbsp;sint&nbsp;quos&nbsp;nobis&nbsp;repellat&nbsp;iste&nbsp;aliquam&nbsp;labore,&nbsp;impedit&nbsp;reprehenderit&nbsp;amet?&nbsp;Enim&nbsp;minima&nbsp;quos&nbsp;cupiditate&nbsp;similique.&nbsp;Quas,&nbsp;delectus&nbsp;facilis&nbsp;quaerat&nbsp;debitis,&nbsp;expedita&nbsp;illum&nbsp;dolores&nbsp;laborum&nbsp;mollitia&nbsp;natus&nbsp;explicabo&nbsp;unde&nbsp;blanditiis&nbsp;soluta&nbsp;ut&nbsp;recusandae&nbsp;cum&nbsp;tenetur&nbsp;ipsum&nbsp;voluptatum&nbsp;placeat&nbsp;earum.&nbsp;Fuga,&nbsp;maxime&nbsp;quos&nbsp;at&nbsp;aspernatur&nbsp;nostrum&nbsp;incidunt&nbsp;libero&nbsp;obcaecati&nbsp;optio,&nbsp;deserunt&nbsp;modi&nbsp;natus&nbsp;sequi&nbsp;quisquam&nbsp;eaque&nbsp;voluptatem&nbsp;reprehenderit&nbsp;rerum&nbsp;atque,&nbsp;porro&nbsp;consectetur&nbsp;quidem&nbsp;quam&nbsp;eveniet?&nbsp;Quasi&nbsp;blanditiis&nbsp;quis&nbsp;rerum&nbsp;magnam.&nbsp;Pariatur&nbsp;delectus&nbsp;velit&nbsp;quaerat&nbsp;aliquid&nbsp;fugit&nbsp;at&nbsp;voluptas&nbsp;provident&nbsp;suscipit&nbsp;tempora&nbsp;quo&nbsp;necessitatibus&nbsp;dolore,&nbsp;porro&nbsp;asperiores&nbsp;sint!&nbsp;Animi,&nbsp;ex&nbsp;vel!</p>\n', '2021-09-13 18:07:31', '2021-09-15 18:07:00', 5, 1),
(10, '200000', NULL, 'DOSEN IT', 'download.jpg', '<p>asd567568585</p>\r\n', '2021-09-13 18:09:15', '2021-09-16 18:09:00', 5, 1),
(13, '200000', NULL, 'Guru Paud', 'poster-lowongan-kerja.jpg', '<p>Bisa berkomunikasi dan berperilaku baik dengan anak kecil</p>\r\n', '2021-09-13 19:59:47', '2021-09-25 19:59:00', 1, 1),
(14, '200000', NULL, 'Marketing', 'CifLiOGVEAAQkIi.jpg', '<p>cepat heee</p>\r\n', '2021-09-13 20:03:36', '2021-09-24 20:03:00', 1, 1),
(15, '200000', NULL, 'TENTOR', 'E-Logics_Job_Vacancy_-_Copy.png', '', '2021-09-13 20:09:27', '2021-09-30 20:09:00', 1, 1),
(16, '100000', NULL, 'Administrator', 'admin.jpg', '<p>3423534543543543</p>\r\n', '2021-09-13 20:13:16', '2021-09-16 20:13:00', 5, 1),
(17, '100000', NULL, 'Jahit  (Supervisor)', 'supervisorlagi.jpg', '<p>asdsad657567568</p>\r\n', '2021-09-13 20:14:13', '2021-09-28 20:14:00', 1, 1),
(18, '100000', NULL, 'Admin Gudang', 'default.jpg', '<p>asdsadsa</p>\n', '2021-09-13 20:15:38', '2021-10-21 20:15:00', 4, 1),
(19, NULL, 'maradilla', 'Desain Grafis', 'desain_gradis.jpg', '<p>65756765756</p>\r\n', '2021-09-13 20:17:47', '2021-10-09 20:17:00', 1, 1),
(20, NULL, 'maradilla', 'Lowowngan (Keshatan/kedokteran)', 'kesehatan.jpg', '', '2021-09-13 20:21:50', '2021-09-16 20:21:00', 5, 1),
(21, NULL, 'Whayupunye', 'Guru Tahfids', 'guru_tahfids.jpg', '<p>asdasdsad</p>\r\n', '2021-09-13 20:23:07', '2021-10-13 20:22:00', 1, 1),
(22, NULL, 'Whayupunye', 'Guru Mahad', 'guru.jpg', '<p>asdasdsad</p>\r\n', '2021-09-13 20:23:41', '2021-09-25 20:23:00', 5, 1),
(23, NULL, 'wahyu16', 'Barista', 'barista.jpg', '<p>asdsada5675</p>\r\n', '2021-09-13 20:26:10', '2021-09-30 20:26:00', 1, 1),
(24, NULL, 'wahyu16', 'Admin', 'adminlagilagi.jpg', '<p>56756567567576</p>\r\n', '2021-09-13 20:26:40', '2021-09-18 20:26:00', 1, 1),
(25, NULL, 'destio', 'Sales', 'sales.jpg', '<p>345646456456</p>\r\n', '2021-09-13 20:28:51', '2021-09-30 20:28:00', 1, 1),
(26, NULL, 'destio', 'Video Editor', 'video_editor.png', '<p>657575675</p>\r\n', '2021-09-13 20:29:19', '2021-09-16 20:29:00', 5, 1),
(27, NULL, 'Naufal', 'Arsitek', 'arsitek.jpg', '<p>456547fgbhgfhgfh</p>\r\n', '2021-09-13 20:30:27', '2021-09-30 20:30:00', 5, 1),
(28, NULL, 'aldiaufa', 'Tenaga Kesehatan', 'esehatan.jpg', '<p>adasdsa</p>\r\n', '2021-09-13 20:32:23', '2021-09-16 20:32:00', 5, 1),
(29, NULL, 'aldiaufa', 'Ahli Gizi', 'ahligizi.jpg', '<p>543535</p>\r\n', '2021-09-13 20:32:46', '2021-09-23 20:32:00', 5, 1),
(30, NULL, 'almira', 'MM', 'mm.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita quod, illo rerum et enim est laboriosam iure amet voluptates? Ullam cumque architecto labore ratione vitae minus harum sint a illo nisi sunt tempore, odio possimus est quo sit quaerat repellat nulla nobis? Earum reiciendis beatae adipisci ipsum molestiae repudiandae aliquam molestias eum, dolorem voluptatibus laudantium explicabo vero minima ducimus qui dolore ut accusantium magnam rem! Iure magnam velit molestias nesciunt cum quod repellat facilis voluptates molestiae, non ad tempora quisquam sequi corrupti cupiditate magni quia voluptate, aperiam illo totam assumenda voluptatem in animi. Maxime tempora harum quia dicta ipsum debitis natus deleniti, temporibus non. Consequatur magni nemo cupiditate nesciunt saepe unde explicabo dicta optio error veritatis praesentium odio voluptatibus, ipsa cum autem eum. Optio earum minus maxime reiciendis, repellat odit. Praesentium, ut! Vero suscipit saepe facilis quam commodi reprehenderit aliquam dicta. Nobis reprehenderit iusto cum, eius libero molestiae voluptatem aspernatur dolore adipisci explicabo reiciendis modi maxime laboriosam ex ea id consectetur rem porro doloribus distinctio ipsum dolor voluptatibus. Porro soluta sed, ipsum molestiae quasi animi. Minus veritatis non reiciendis. Odit, ex dolorem eligendi illo deserunt atque tempora eos. Officia placeat illo unde deserunt? Cumque earum aspernatur error nostrum ipsam mollitia officiis quidem quod ex illum fugit necessitatibus, dicta itaque ea libero dolore dolorum eligendi eveniet accusamus harum sit, sapiente debitis eius natus. Delectus nam pariatur illum dolorem perspiciatis eligendi deserunt quasi nisi explicabo ea, repudiandae, ut quo facilis reprehenderit mollitia. Perspiciatis ullam neque voluptate reprehenderit, voluptatum aspernatur quas voluptates voluptatem corrupti ratione velit qui corporis eveniet iure, fuga ducimus laboriosam excepturi! Rerum ex similique error, eos itaque assumenda exercitationem voluptatem consequatur ratione odit natus dolor ut tempore modi culpa deserunt, fugiat veritatis, id quaerat quas illo distinctio molestias. Similique ipsa vitae hic fugit magnam? Placeat, sequi? Odio, architecto porro? Provident, repudiandae ipsam? Dignissimos excepturi incidunt praesentium a itaque ullam pariatur unde saepe sint quos nobis repellat iste aliquam labore, impedit reprehenderit amet? Enim minima quos cupiditate similique. Quas, delectus facilis quaerat debitis, expedita illum dolores laborum mollitia natus explicabo unde blanditiis soluta ut recusandae cum tenetur ipsum voluptatum placeat earum. Fuga, maxime quos at aspernatur nostrum incidunt libero obcaecati optio, deserunt modi natus sequi quisquam eaque voluptatem reprehenderit rerum atque, porro consectetur quidem quam eveniet? Quasi blanditiis quis rerum magnam. Pariatur delectus velit quaerat aliquid fugit at voluptas provident suscipit tempora quo necessitatibus dolore, porro asperiores sint! Animi, ex vel!', '2021-09-13 20:33:36', '2021-09-30 20:33:00', 5, 1),
(31, NULL, 'almira', 'Accounting', 'accountng.jpg', 'https://getbootstrap.com/docs/4.0/examples/\n\nYummy Blog, from the name itself you can infer that this template is for food-related sites. With this template, you can display mouth-watering food images elegantly to the users. On the clean white background, the colorful food images look more vibrant and visually appealing. Another best part of this template is you get an image pattern option for the background.\n\nThe designer has made this template smart enough to handle content in both the clean background and image background. Just below the header image slider you have a post category banner to directly take the user to the food category they love. In the sidebar, you have the option to add an about section, social media links, popular posts, and newsletter signup form. At the footer, you have a full-width Instagram widget, on hovering you get the link to follow your profile.', '2021-09-13 20:33:55', '2021-09-15 20:33:00', 5, 1),
(46, NULL, 'egyijaa', 'maap yak diedit', 'default.jpg', '<p>asasasasasasasa</p>\n\n<p>$this-&gt;load-&gt;view(&#39;header&#39;);</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $this-&gt;load-&gt;view(&#39;lowongan_dash&#39;, $data);</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $this-&gt;load-&gt;view(&#39;footer&#39;);gsgfdgdfgdfgdfg</p>\n\n<p>$this-&gt;load-&gt;view(&#39;header&#39;);</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $this-&gt;load-&gt;view(&#39;lowongan_dash&#39;, $data);</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $this-&gt;load-&gt;view(&#39;footer&#39;);</p>\n', '2021-10-19 16:08:29', '2021-11-25 16:08:00', 4, 0),
(48, NULL, 'egyijaa', 'coba lagi', 'logo2.png', '<p>segararearaerar!!!!!!!!!!!!!!!!</p>\n\n<p>ayoooo!!!!!!!!!!</p>\n', '2021-10-31 14:38:58', '2021-11-05 14:38:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` tinyint(3) NOT NULL,
  `pendidikan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'SMA'),
(2, 'D1 (Diploma)'),
(3, 'D2 (Diploma)'),
(4, 'D3 (Diploma)'),
(5, 'S1/D4 (Sarjana/Diploma)'),
(6, 'S2 (Magister)'),
(7, 'S3 (Doctor)');

-- --------------------------------------------------------

--
-- Table structure for table `sosmed_alumni`
--

CREATE TABLE `sosmed_alumni` (
  `USERNAME` varchar(15) NOT NULL,
  `whatsapp` varchar(225) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `line` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sosmed_alumni`
--

INSERT INTO `sosmed_alumni` (`USERNAME`, `whatsapp`, `instagram`, `twitter`, `line`) VALUES
('Adawiyya', NULL, NULL, NULL, NULL),
('aditya', NULL, NULL, NULL, NULL),
('agungbaru', NULL, NULL, NULL, NULL),
('aldiaufa', NULL, NULL, NULL, NULL),
('almira', NULL, NULL, NULL, NULL),
('altafsy_', NULL, NULL, NULL, NULL),
('alvinabaru19', NULL, NULL, NULL, NULL),
('alvinr', NULL, NULL, NULL, NULL),
('amelia', NULL, NULL, NULL, NULL),
('antocuy', NULL, NULL, NULL, NULL),
('arizkirh', NULL, NULL, NULL, NULL),
('ateng1', NULL, NULL, NULL, NULL),
('ayong2', NULL, NULL, NULL, NULL),
('bagas15', NULL, NULL, NULL, NULL),
('Basil5', NULL, NULL, NULL, NULL),
('bowopra', NULL, NULL, NULL, NULL),
('BungaH', NULL, NULL, NULL, NULL),
('chaerani', NULL, NULL, NULL, NULL),
('debisah', NULL, NULL, NULL, NULL),
('derbyhar', NULL, NULL, NULL, NULL),
('destio', '089667784446', 'destioir', NULL, NULL),
('donimarwansyah', NULL, NULL, NULL, NULL),
('egyijaa', '0895606068325', 'egyijaa_', '@Ijaa06', NULL),
('fadhil', NULL, NULL, NULL, NULL),
('Faizah', NULL, NULL, NULL, NULL),
('faridbaru', NULL, NULL, NULL, NULL),
('ferdi17', NULL, NULL, NULL, NULL),
('fikribaru', NULL, NULL, NULL, NULL),
('fitrah', NULL, NULL, NULL, NULL),
('ghifary', NULL, NULL, NULL, NULL),
('haryo15', NULL, NULL, NULL, NULL),
('ichansmanta', NULL, NULL, NULL, NULL),
('IndahC', NULL, NULL, NULL, NULL),
('jaidpunye', NULL, NULL, NULL, NULL),
('javier', NULL, NULL, NULL, NULL),
('Juliaisti', NULL, NULL, NULL, NULL),
('kemal17', NULL, NULL, NULL, NULL),
('kintan', NULL, NULL, NULL, NULL),
('Krisna', NULL, NULL, NULL, NULL),
('lutfismanta', NULL, NULL, NULL, NULL),
('maradilla', NULL, NULL, NULL, NULL),
('mbaiya', NULL, NULL, NULL, NULL),
('melani17', NULL, NULL, NULL, NULL),
('miaislami', NULL, NULL, NULL, NULL),
('myunus', NULL, NULL, NULL, NULL),
('Nabila', NULL, NULL, NULL, NULL),
('namira', NULL, NULL, NULL, NULL),
('Naufal', NULL, NULL, NULL, NULL),
('nurafera', NULL, NULL, NULL, NULL),
('nuruldwi', NULL, NULL, NULL, NULL),
('nury17', NULL, NULL, NULL, NULL),
('Rahmana', NULL, NULL, NULL, NULL),
('rakadi', NULL, NULL, NULL, NULL),
('RezaTama', NULL, NULL, NULL, NULL),
('Ridzaty', NULL, NULL, NULL, NULL),
('rifqiM', NULL, NULL, NULL, NULL),
('robianbaru', NULL, NULL, NULL, NULL),
('Taudiq', NULL, NULL, NULL, NULL),
('tiarabaru', NULL, NULL, NULL, NULL),
('tiwidea', NULL, NULL, NULL, NULL),
('vianadita', NULL, NULL, NULL, NULL),
('wahyu16', NULL, NULL, NULL, NULL),
('Whayupunye', NULL, NULL, NULL, NULL),
('wildan', NULL, NULL, NULL, NULL),
('winaldy27', NULL, NULL, NULL, NULL),
('yeni17', NULL, NULL, NULL, NULL),
('zico17', NULL, NULL, NULL, NULL),
('zulfikar', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `ID_STATUS` smallint(6) NOT NULL,
  `STATUS` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID_STATUS`, `STATUS`) VALUES
(1, 'Belum/Tidak Bekerja'),
(2, 'Mengurus Rumah Tangga'),
(3, 'Pelajar/Mahasiswa'),
(4, 'Anggota Aparat/Militer'),
(5, 'Tenaga Pengajar/Pendidik'),
(6, 'Pengusaha/Wiraswasta'),
(7, 'Pegawai (PNS/BUMN/Swasta)'),
(8, 'Pejabat Negara/Daerah'),
(9, 'Pensiunan'),
(10, 'Juru Masak'),
(11, 'Kedokteran/Kesehatan'),
(12, 'Kuasa Hukum');

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
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `alumni_profil`
--
ALTER TABLE `alumni_profil`
  ADD PRIMARY KEY (`USERNAME`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `NO_TELEPON` (`NO_TELEPON`),
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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `broadcast` (`post_id`),
  ADD KEY `nip` (`username`);

--
-- Indexes for table `comments_replies`
--
ALTER TABLE `comments_replies`
  ADD PRIMARY KEY (`id_replies`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `nip_reply` (`username`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

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
  ADD KEY `NIS` (`USERNAME`),
  ADD KEY `NIP` (`NIP`),
  ADD KEY `PENDIDIKAN` (`PENDIDIKAN`) USING BTREE;

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `sosmed_alumni`
--
ALTER TABLE `sosmed_alumni`
  ADD PRIMARY KEY (`USERNAME`),
  ADD UNIQUE KEY `line` (`line`),
  ADD UNIQUE KEY `twitter` (`twitter`),
  ADD UNIQUE KEY `instagram` (`instagram`),
  ADD UNIQUE KEY `whatsapp` (`whatsapp`);

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
  MODIFY `ID_ANGKATAN` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `broadcast`
--
ALTER TABLE `broadcast`
  MODIFY `ID_BROADCAST` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments_replies`
--
ALTER TABLE `comments_replies`
  MODIFY `id_replies` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `ID_KOTA` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT for table `lowongan_pekerjaan`
--
ALTER TABLE `lowongan_pekerjaan`
  MODIFY `ID_LOWONGAN_PEKERJAAN` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `ID_STATUS` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni_profil`
--
ALTER TABLE `alumni_profil`
  ADD CONSTRAINT `alumni_profil_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `alumni` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `broadcast` FOREIGN KEY (`post_id`) REFERENCES `broadcast` (`ID_BROADCAST`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `alumni` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_replies`
--
ALTER TABLE `comments_replies`
  ADD CONSTRAINT `comment_id` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id_comment`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username_reply` FOREIGN KEY (`username`) REFERENCES `alumni` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kontak`
--
ALTER TABLE `kontak`
  ADD CONSTRAINT `lowongan` FOREIGN KEY (`id_kontak`) REFERENCES `lowongan_pekerjaan` (`ID_LOWONGAN_PEKERJAAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lowongan_pekerjaan`
--
ALTER TABLE `lowongan_pekerjaan`
  ADD CONSTRAINT `lowongan_pekerjaan_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `admin` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lowongan_pekerjaan_ibfk_2` FOREIGN KEY (`USERNAME`) REFERENCES `alumni` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lowongan_pekerjaan_ibfk_3` FOREIGN KEY (`PENDIDIKAN`) REFERENCES `pendidikan` (`id_pendidikan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sosmed_alumni`
--
ALTER TABLE `sosmed_alumni`
  ADD CONSTRAINT `alumni_profil` FOREIGN KEY (`USERNAME`) REFERENCES `alumni_profil` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
