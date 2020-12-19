-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2020 pada 17.54
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
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `cust_id` int(10) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_membercard` varchar(10) NOT NULL,
  `cust_phone` varchar(20) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_ktp` varchar(50) NOT NULL,
  `cust_birthday` date NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cust_category` varchar(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`cust_id`, `cust_name`, `cust_membercard`, `cust_phone`, `cust_email`, `cust_ktp`, `cust_birthday`, `cust_address`, `cust_category`, `created`, `updated`) VALUES
(1, 'Jajang Nurjaman', '', '7252834930', '', '', '1980-08-11', 'jhfdjhasljfandflahaksl', 'UMUM', '2020-12-19 22:39:45', NULL),
(2, 'Ecep Supriatna', 'M00000001', '723469284981676392', '', '', '1973-06-08', 'ksdfjklajfkjsd;fj', 'MEMBER', '2020-12-19 22:41:08', NULL),
(3, 'Suprianto', '', '9823479236472638', '', '', '1980-01-10', 'lsfkdahsdfa;sldkjfk', 'RESELLER', '2020-12-19 22:41:53', NULL),
(5, 'ALAM SETIABAKTI', '', '28349284893', '', '', '0000-00-00', '', 'MEMBER', '2020-12-19 23:44:40', '2020-12-19 17:45:02'),
(6, 'maman abdurahman', '', '986476394872348', 'maman@man.com', '34692834', '0000-00-00', '', 'RESELLER', '2020-12-19 23:46:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product_category`
--

CREATE TABLE `tb_product_category` (
  `product_cat_id` int(11) NOT NULL,
  `product_cat_code` varchar(10) NOT NULL,
  `product_cat_name` varchar(100) NOT NULL,
  `product_cat_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(8, 'Toko B', '0888811112222', 'bandung selatan', 'jual cat tembok , punya pa haji jajang', '2020-12-18 23:27:18', '2020-12-19 15:34:40'),
(9, 'Toko C', '088822222333', 'jakarta', 'jual alat kesehatan', '2020-12-18 23:27:42', '2020-12-19 15:32:54'),
(10, 'Toko D', '28437923847', 'Bandung Selatan', 'Jual regulator gas', '2020-12-19 00:29:03', NULL),
(11, 'Toko E', '98462386416565', 'banjaran', 'jual minyak goreng', '2020-12-19 21:02:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_unit`
--

CREATE TABLE `tb_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_code` varchar(10) NOT NULL,
  `unit_name` varchar(20) NOT NULL,
  `unit_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indeks untuk tabel `tb_product_category`
--
ALTER TABLE `tb_product_category`
  ADD PRIMARY KEY (`product_cat_id`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_product_category`
--
ALTER TABLE `tb_product_category`
  MODIFY `product_cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
