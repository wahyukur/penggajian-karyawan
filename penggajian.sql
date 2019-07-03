-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 02:52 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kd_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `masa_kerja` int(11) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `gaji_lembur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kd_jabatan`, `nama_jabatan`, `masa_kerja`, `gaji_pokok`, `gaji_lembur`) VALUES
(1, 'Manager Proyek', 0, 15000000, 86705),
(2, 'Administrasi dan Kepegawaian', 0, 5000000, 28902),
(3, 'Arsitek', 0, 8000000, 46243),
(4, 'Surveyor', 0, 3700000, 21387),
(5, 'Promosi', 0, 2500000, 14451);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kd_karyawan` varchar(255) NOT NULL,
  `kd_jabatan` int(11) DEFAULT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kd_karyawan`, `kd_jabatan`, `nama_jabatan`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `pendidikan`, `alamat`) VALUES
('K00001', 1, 'Manager Proyek', 'Sebastian Purnama', 'Laki-laki', 'Surabaya', '1989-11-11', 'Islam', 'S1 Teknik Arsitektur', 'Jl. Simo Sidomulyo Baru No.27-C, RT.001/RW.16'),
('K00002', 2, 'Administrasi dan Kepegawaian', 'Lilis Sulistiowati', 'Perempuan', 'Sidoarjo', '1990-07-17', 'Islam', 'D3 Administrasi Negara', 'Perumahan Puri Indah Blok R-12, Sidoarjo, Jawa Timur'),
('K00003', 3, 'Arsitek', 'Alfan Rahmandika', 'Laki-laki', 'Surabaya', '1989-06-08', 'Islam', 'S1 Teknik Arsitektur', 'Jl. Karangrejo VI No.85, RT.001/RW.003'),
('K00004', 4, 'Surveyor', 'Adi Dirgantara', 'Laki-laki', 'Sidoarjo', '1990-03-14', 'Islam', 'D3 Konstruksi Sipil', 'Jl. Ki Demang No.52, RT.002/RW.005 Sidoarjo'),
('K00005', 5, 'Promosi', 'Joko Susilo', 'Laki-laki', 'Surabaya', '1986-05-07', 'Islam', 'SMA', 'Jl. Ketintang IV No.15, RT.012/RW.005');

-- --------------------------------------------------------

--
-- Table structure for table `lembur`
--

CREATE TABLE `lembur` (
  `kd_lembur` int(11) NOT NULL,
  `kd_karyawan` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `tgl_lembur` date NOT NULL,
  `lama_lembur` int(11) NOT NULL,
  `gaji_lembur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lembur`
--

INSERT INTO `lembur` (`kd_lembur`, `kd_karyawan`, `nama`, `nama_jabatan`, `tgl_lembur`, `lama_lembur`, `gaji_lembur`) VALUES
(1, 'K00003', 'Alfan Rahmandika', 'Arsitek', '2018-01-08', 4, 346823),
(2, 'K00002', 'Lilis Sulistiowati', 'Administrasi dan Kepegawaian', '2018-01-10', 6, 332373),
(3, 'K00002', 'Lilis Sulistiowati', 'Administrasi dan Kepegawaian', '2018-01-11', 6, 332373),
(4, 'K00001', 'Sebastian Purnama', 'Manager Proyek', '2018-01-16', 5, 823698),
(5, 'K00005', 'Joko Susilo', 'Promosi', '2018-01-22', 5, 137285),
(6, 'K00001', 'Sebastian Purnama', 'Manager Proyek', '2018-02-01', 4, 650288),
(7, 'K00003', 'Alfan Rahmandika', 'Arsitek', '2018-02-03', 7, 624281),
(8, 'K00004', 'Adi Dirgantara', 'Surveyor', '2018-02-06', 5, 203177);

-- --------------------------------------------------------

--
-- Table structure for table `pencairan`
--

CREATE TABLE `pencairan` (
  `kd_cair` int(11) NOT NULL,
  `kd_karyawan` varchar(255) DEFAULT NULL,
  `gaji_lembur` int(11) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `jkk` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `biaya_jabatan` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `tgl_ambil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencairan`
--

INSERT INTO `pencairan` (`kd_cair`, `kd_karyawan`, `gaji_lembur`, `gaji_pokok`, `jkk`, `potongan`, `biaya_jabatan`, `total_gaji`, `tgl_ambil`) VALUES
(1, 'K00001', 650288, 15000000, 36000, 0, 784314, 14901974, '2018-02-28'),
(2, 'K00002', 0, 5000000, 12000, 50000, 250600, 4711400, '2018-02-28'),
(3, 'K00003', 624281, 8000000, 19200, 0, 432174, 8211307, '2018-02-28'),
(4, 'K00004', 203177, 3700000, 8880, 0, 195603, 3716454, '2018-02-28'),
(5, 'K00005', 0, 2500000, 6000, 25000, 125300, 2355700, '2018-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `kd_presensi` int(11) NOT NULL,
  `kd_karyawan` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_presensi` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`kd_presensi`, `kd_karyawan`, `nama`, `tgl_presensi`, `keterangan`, `potongan`) VALUES
(1, 'K00003', 'Alfan Rahmandika', '2018-01-09', 'I', 0),
(2, 'K00002', 'Lilis Sulistiowati', '2018-01-12', 'S', 0),
(3, 'K00002', 'Lilis Sulistiowati', '2018-01-13', 'S', 0),
(4, 'K00001', 'Sebastian Purnama', '2018-01-15', 'A', 150000),
(5, 'K00005', 'Joko Susilo', '2018-01-23', 'S', 0),
(6, 'K00004', 'Adi Dirgantara', '2018-02-02', 'I', 0),
(7, 'K00002', 'Lilis Sulistiowati', '2018-02-05', 'A', 50000),
(8, 'K00005', 'Joko Susilo', '2018-02-06', 'A', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kd_karyawan`),
  ADD KEY `kd_jabatan` (`kd_jabatan`);

--
-- Indexes for table `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`kd_lembur`),
  ADD KEY `kd_karyawan` (`kd_karyawan`);

--
-- Indexes for table `pencairan`
--
ALTER TABLE `pencairan`
  ADD PRIMARY KEY (`kd_cair`),
  ADD KEY `kd_karyawan` (`kd_karyawan`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`kd_presensi`),
  ADD KEY `kd_karyawan` (`kd_karyawan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `kd_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lembur`
--
ALTER TABLE `lembur`
  MODIFY `kd_lembur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pencairan`
--
ALTER TABLE `pencairan`
  MODIFY `kd_cair` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `kd_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`kd_jabatan`) REFERENCES `jabatan` (`kd_jabatan`);

--
-- Constraints for table `lembur`
--
ALTER TABLE `lembur`
  ADD CONSTRAINT `lembur_ibfk_1` FOREIGN KEY (`kd_karyawan`) REFERENCES `karyawan` (`kd_karyawan`);

--
-- Constraints for table `pencairan`
--
ALTER TABLE `pencairan`
  ADD CONSTRAINT `pencairan_ibfk_1` FOREIGN KEY (`kd_karyawan`) REFERENCES `karyawan` (`kd_karyawan`);

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`kd_karyawan`) REFERENCES `karyawan` (`kd_karyawan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
