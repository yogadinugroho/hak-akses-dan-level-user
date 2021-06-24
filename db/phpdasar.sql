-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Mei 2021 pada 09.20
-- Versi Server: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` char(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nrp`, `nama`, `email`, `jurusan`, `gambar`) VALUES
(1, '197101030', 'Choi Yeonjun', 'choiyeonjun@gmail.com', 'Teknik Informatika', 'yeonjun.jpg'),
(2, '197101031', 'Choi Soobin', 'choisoobin@gmail.com', 'Teknik Industri', 'soobin.jpg'),
(3, '197101032', 'Choi Beomgyu', 'choibeomgyu@gmail.com', 'Teknik Sipil', 'beomgyu.jpg'),
(4, '197101033', 'Kang Taehyun', 'kangtaehyun@gmail.com', 'Teknik Geologi', 'taehyun.jpg'),
(5, '197101034', 'Hueningkai', 'hueningkai@gmail.com', 'Teknik Industri', 'hueningkai.jpg'),
(7, '199990', 'Kai Kamal', 'kamal@gmail.com', 'Kimia Murni', '608d003e83225.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(1, 'yoga', '$2y$10$o5V.WChGtIk7adOYlNMpoeX/hn9xnkYr4RZ9VWjFQk.5Qfa3KfOfe', 0),
(3, 'adi', '$2y$10$hcv1LZ/RF6xVb4eBta2YgOEXmiyA4JjLauzkSxMqtv8u1VV/TBVVe', 1),
(4, 'nugroho', '$2y$10$puBfwPvcUXzuQVkUCoTiN.ToK/uDh7UHXLnbDyow5tumz25SikW0O', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
