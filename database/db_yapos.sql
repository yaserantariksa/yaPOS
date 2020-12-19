-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2020 pada 15.14
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_yapos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `supplier_id` int(11) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_phone` varchar(20) NOT NULL,
  `sup_address` varchar(255) NOT NULL,
  `sup_desc` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`supplier_id`, `sup_name`, `sup_phone`, `sup_address`, `sup_desc`, `created`, `updated`) VALUES
(1, 'Toko A', '82432948279', 'Alamat Toko A di Kota Bandung', 'menjual sembako', '2020-12-17 21:15:49', NULL),
(8, 'Toko B', '0888811112222', 'bandung', 'jual cat tembok', '2020-12-18 23:27:18', NULL),
(9, 'Toko C', '088822222333', 'jakarta', NULL, '2020-12-18 23:27:42', NULL),
(10, 'Toko D', '28437923847', 'Bandung Selatan', 'Jual regulator gas', '2020-12-19 00:29:03', NULL),
(11, 'Toko E', '98462386416565', 'banjaran', 'jual minyak goreng', '2020-12-19 21:02:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1 : user admin , 2 : user kasir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `name`, `phone`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'A Yaser Antariksa', '081395458208', 'Komplek GPA Baleendah, Kab.Bandung', 1),
(2, 'kasir01', '70f089b876277b1d20134b170b5b06ba5b58a7c6', 'Nama Kasir Area 1', '0888899991111', 'Area Kasir 1 Baleendah, Kab Bandung', 2),
(6, 'admin01', 'cb0ef4c7be04ff1bf4cfcd104ef8df03251266ab', 'yaser antariksa', '03720735290489', 'sad;fhs;dkfjk', 1),
(7, 'kasir02', '831b492dcc7c8812045f0a9be271e92c01d53951', 'kasir nol dua', '925027500', 'rumah kasir nol dua', 2),
(8, 'kasir03', '6646d5d654370ec83b032355d0b86f8ed370f9a8', 'kasir nol tiga', '920384738', 'sdf;a;fjslkdjfk', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
