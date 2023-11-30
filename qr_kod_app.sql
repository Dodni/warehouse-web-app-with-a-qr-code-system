-- Az adatbázist fontos, hogy qr_kod_app néven hozza létre
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2023 at 11:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr_kod_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `felhasznalo_id` int(10) NOT NULL,
  `felhasznalo_nev` varchar(20) NOT NULL,
  `felhasznalo_jelszo` varchar(20) NOT NULL,
  `felhasznalo_jog` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `felhasznalok`
--

INSERT INTO `felhasznalok` (`felhasznalo_id`, `felhasznalo_nev`, `felhasznalo_jelszo`, `felhasznalo_jog`) VALUES
(1, 'admin', 'admin', '3'),
(2, 'latogato1', 'latogato1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `oldalak`
--

CREATE TABLE `oldalak` (
  `oldal_id` int(10) NOT NULL,
  `oldal_nev` varchar(50) DEFAULT NULL,
  `oldal_jog` varchar(1) NOT NULL DEFAULT '0',
  `oldal_sorend` int(10) DEFAULT NULL,
  `oldal_menu` varchar(1) NOT NULL DEFAULT 'N',
  `oldal_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `oldalak`
--

INSERT INTO `oldalak` (`oldal_id`, `oldal_nev`, `oldal_jog`, `oldal_sorend`, `oldal_menu`, `oldal_url`) VALUES
(1, 'Error', '1', 1, 'N', 'error'),
(2, 'QR kód', '1', 3, 'I', 'qr_kod'),
(3, 'Főoldal', '1', 2, 'I', 'home'),
(4, 'Bejelentkezés', '1', 5, 'I', 'login'),
(5, 'Rólunk', '1', 4, 'I', 'about'),
(6, 'Raktárkészlet', '2', 6, 'I', 'raktarkeszlet'),
(7, 'Raktárkészlet új termékek hozzáadása', '2', 7, 'N', 'raktarkeszlet_uj_termekek_hozzaadasa'),
(8, 'Egyke termék', '2', 8, 'N', 'egyke_termek'),
(9, 'Admin', '3', 9, 'I', 'admin'),
(10, 'Admin - Felhasználó regisztrálása', '3', 10, 'N', 'admin_felhasznalo_regisztralasa'),
(11, 'Admin- Felhasználó megváltoztatása', '3', 11, 'N', 'admin_felhasznalo_megvaltoztatasa'),
(12, 'Admin - Csoportosított termékek', '3', 12, 'N', 'Admin_csoportositott_termekek'),
(13, 'Admin - Termék szerkesztése', '3', 13, 'N', 'admin_termek_szerkesztese'),
(14, 'Kijelentkezés', '2', 14, 'I', 'logout');

-- --------------------------------------------------------

--
-- Table structure for table `termekek`
--

CREATE TABLE `termekek` (
  `termek_id` int(10) NOT NULL,
  `termek_nev` varchar(50) NOT NULL,
  `termek_szarmazas` varchar(50) NOT NULL,
  `termek_erkezesi_datum` date NOT NULL,
  `termek_ewc_kod` varchar(10) NOT NULL,
  `termek_darabszam` int(10) NOT NULL,
  `termek_suly` int(10) NOT NULL,
  `termek_logisztikara_kuldve` varchar(1) NOT NULL,
  `termek_kep_neve` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `termekek`
--

INSERT INTO `termekek` (`termek_id`, `termek_nev`, `termek_szarmazas`, `termek_erkezesi_datum`, `termek_ewc_kod`, `termek_darabszam`, `termek_suly`, `termek_logisztikara_kuldve`, `termek_kep_neve`) VALUES
(25, 'nyomdafestek', 'Másik Cégnév Zrt', '2023-11-28', '080312', 20, 8, '0', ''),
(26, 'nyomdafestek', 'Egyéb Cég Bt', '2023-11-29', '080312', 15, 6, '0', ''),
(27, 'nyomdafestek', 'Cég XYZ Kft', '2023-11-30', '080312', 12, 4, '0', ''),
(28, 'nyomdafestek', 'Cég ABC Zrt', '2023-12-01', '080312', 8, 7, '0', ''),
(29, 'szerves oldoszer', 'Másik Cég Kft', '2023-12-02', '040214', 25, 9, '0', ''),
(30, 'szerves oldoszer', 'Egyéb Cég Zrt', '2023-12-03', '040214', 18, 6, '0', ''),
(31, 'szerves oldoszer', 'Cég KJK Zrt', '2023-12-04', '040214', 14, 5, '0', ''),
(32, 'szerves oldoszer', 'Cég RTY Kft', '2023-12-05', '040214', 17, 6, '0', ''),
(33, 'szerves oldoszer', 'Cég KLM Bt', '2023-12-06', '040214', 22, 7, '0', ''),
(34, 'füstgáz por', 'Cég PLM Zrt', '2023-12-07', '100603', 11, 4, '0', ''),
(35, 'füstgáz por', 'Másik Cégnév Kft', '2023-12-08', '100603', 16, 6, '0', ''),
(36, 'füstgáz por', 'Egyéb Cég Zrt', '2023-12-09', '100603', 19, 8, '0', ''),
(37, 'füstgáz por', 'Cég XYZ Kft', '2023-12-10', '100603', 23, 9, '0', ''),
(38, 'füstgáz por', 'Cég ABC Zrt', '2023-12-11', '100603', 21, 7, '0', ''),
(39, 'veszélyes anyagokkal szennyezett ruha', 'Másik Cég Bt', '2023-12-12', '150202', 13, 5, '0', ''),
(40, 'veszélyes anyagokkal szennyezett ruha', 'Egyéb Cég Zrt', '2023-12-13', '150202', 20, 6, '0', ''),
(41, 'veszélyes anyagokkal szennyezett ruha', 'Cég KJK Zrt', '2023-12-14', '150202', 24, 8, '0', ''),
(42, 'veszélyes anyagokkal szennyezett ruha', 'Cég RTY Kft', '2023-12-15', '150202', 16, 7, '0', ''),
(43, 'veszélyes anyagokkal szennyezett ruha', 'Cég KLM Bt', '2023-12-16', '150202', 18, 6, '0', ''),
(44, 'nyomdafestek', 'Cégnév Kft', '2023-11-27', '080312', 10, 5, '0', ''),
(45, 'nyomdafestek', 'Cégnév Kft', '2023-11-27', '080312', 10, 5, '0', ''),
(46, 'nyomdafestek', 'Cégnév Kft', '2023-11-27', '080312', 10, 5, '0', ''),
(47, 'nyomdafestek', 'Cégnév Kft', '2023-11-27', '080312', 10, 5, '0', ''),
(48, 'nyomdafestek', 'Cégnév Kft', '2023-11-27', '080312', 10, 5, '0', ''),
(49, 'nyomdafestek', 'Cégnév Kft', '2023-11-27', '080312', 10, 5, '0', ''),
(50, 'nyomdafestek', 'Cégnév Kft', '2023-11-27', '080312', 10, 5, '0', ''),
(51, 'Palack', 'asd Kft.', '2023-11-12', '222211*', 55, 66, '0', ''),
(52, 'Palack', 'asd Kft.', '2023-11-12', '222211*', 55, 66, '0', ''),
(53, 'Palack', 'asd Kft.', '2023-11-12', '222211*', 55, 66, '0', ''),
(54, 'Palack', 'asd Kft.', '2023-11-12', '222211*', 55, 66, '0', ''),
(55, 'Palack', 'asd Kft.', '2023-11-12', '222211*', 55, 66, '0', ''),
(56, 'Palack', 'asd Kft.', '2023-11-12', '222211*', 55, 66, '0', ''),
(57, 'teszt', 'teszt', '2222-02-12', '112211', 1, 1, '0', ''),
(58, 'teszt', 'teszt', '1111-01-01', '112211', 1, 1, '0', 'teszt.png'),
(59, 'teszt', 'teszt', '1111-01-01', '112211', 1, 1, '0', 'teszt.png'),
(60, 'teszt', 'teszt', '1111-01-01', '112211', 1, 1, '0', 'teszt.png'),
(61, 'teszt', 'teszt', '1111-01-01', '112211', 1, 1, '0', 'teszt.png'),
(62, 'teszt', 'teszt', '0111-01-01', '112211', 1, 1, '0', 'teszt.png'),
(63, 'teszt', 'teszt', '1111-01-01', '112211', 1, 1, '0', 'teszt.png'),
(64, 'teszt', 'teszt', '1111-01-01', '112211', 1, 1, '0', 'teszt.png'),
(65, 'teszt', 'teszt', '1111-01-01', 'teszt', 1, 1, '0', 'teszt.png'),
(66, 'teszt', 'teszt', '0001-01-12', '112211', 1, 1, '0', 'teszt.png'),
(67, 'teszt', 'teszt', '1111-01-01', '112211', 1, 1, '0', 'teszt.png'),
(68, 'teszt', 'teszt', '1111-01-01', '112211', 1, 1, '0', 'teszt.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`felhasznalo_id`);

--
-- Indexes for table `oldalak`
--
ALTER TABLE `oldalak`
  ADD PRIMARY KEY (`oldal_id`);

--
-- Indexes for table `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`termek_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `felhasznalo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oldalak`
--
ALTER TABLE `oldalak`
  MODIFY `oldal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `termekek`
--
ALTER TABLE `termekek`
  MODIFY `termek_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
