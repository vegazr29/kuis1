-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 08:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_mahasiswa`
--

-- --------------------------------------------------------

--
-- Structure for view `student_data`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_data`  AS SELECT `siswa`.`StudentID` AS `student_id`, `siswa`.`Nama` AS `nama`, `krs`.`kode_term` AS `term`, sum(coalesce(`m`.`sks`,0)) AS `total_sks` FROM (((`mahasiswa` `siswa` left join `krs` on(`siswa`.`StudentID` = `krs`.`StudentID`)) left join `krs_detail` `kd` on(`krs`.`kode_krs` = `kd`.`kode_krs`)) left join `matakuliah` `m` on(`kd`.`kode_matakuliah` = `m`.`kode_matakuliah`)) GROUP BY `siswa`.`StudentID`, `siswa`.`Nama`, `krs`.`kode_term` ;

--
-- VIEW `student_data`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
