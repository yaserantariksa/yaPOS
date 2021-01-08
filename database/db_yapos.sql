-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2021 pada 20.09
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

--
-- Dumping data untuk tabel `tb_product_category`
--

INSERT INTO `tb_product_category` (`product_cat_id`, `product_cat_code`, `product_cat_name`, `product_cat_desc`) VALUES
(1, 'SEMBAKO', 'SEMBAKO', 'BERAS, GULA, TEPUNG, MINYAK, GARAM, '),
(2, 'CEMILAN', 'CEMILAN', 'CEMILAN DAN MAKANAN RINGAN'),
(3, 'BUMBU', 'BUMBU DAPUR DAN BUMBU MASAK', 'BUMBU DAPUR DAN BUMBU MASAK OLAHAN ATAUPUN INSTANT'),
(4, 'NOODLE', 'MIE INSTANT', 'MIE INSTANT'),
(5, 'TOOLS', 'TOOLS PERKAKAS', 'PERKAKAS RUMAH TANGGA'),
(11, 'tes', 'tes', 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product_item`
--

CREATE TABLE `tb_product_item` (
  `item_id` int(11) NOT NULL,
  `item_barcode` varchar(20) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `product_cat_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `item_harbel` int(11) DEFAULT NULL,
  `item_harjual1` int(11) DEFAULT NULL,
  `item_harjual2` int(11) DEFAULT NULL,
  `item_stock` int(11) NOT NULL DEFAULT 0,
  `item_img` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_product_item`
--

INSERT INTO `tb_product_item` (`item_id`, `item_barcode`, `item_name`, `product_cat_id`, `unit_id`, `item_harbel`, `item_harjual1`, `item_harjual2`, `item_stock`, `item_img`, `created`, `updated`) VALUES
(4, '000111111', 'Indomie Rebus Ayam Bawang', 4, 1, 1900, 2500, 2000, 0, 'item-201228-870cee70b4.jpg', '2020-12-22 16:14:44', '2020-12-28 13:19:00'),
(5, '000111112', 'Indomie Rabus Soto Ayam', 4, 1, 2000, 2500, 2000, 0, 'item-201228-e3cdc9021b.jpg', '2020-12-22 16:15:28', '2020-12-28 13:19:49'),
(6, '000111113', 'Indomie Goreng Ayam Bawang', 4, 1, 1900, 3000, 2500, 0, 'item-201228-2ace13a5fa.jpg', '2020-12-22 16:16:04', '2020-12-28 13:19:15'),
(7, '000111114', 'Indomie Goreng Mie Aceh', 4, 1, 2000, 3000, 2500, 0, 'item-201228-36a16f9702.jpg', '2020-12-22 16:18:05', '2020-12-28 13:21:21'),
(8, '000112111', 'Minyak Goreng Fortune 2Lt', 1, 1, 20000, 22000, 21000, 0, 'item-201228-506763dd66.jpg', '2020-12-22 16:20:49', '2020-12-28 13:21:32'),
(9, '000112112', 'Minyak Goreng Fortune 1Lt', 1, 1, 11000, 13000, 12000, 0, 'item-201228-165a1e2d1f.jpg', '2020-12-22 16:21:52', '2020-12-28 13:21:48'),
(10, '000112113', 'Minyak Goreng Bimoli 2Lt', 1, 1, 25000, 28000, 26000, 0, 'item-201228-48ef1de7fe.jpg', '2020-12-22 16:22:54', '2020-12-28 13:22:37'),
(11, '000112114', 'Minyak Goreng Bimoli 1Lt', 1, 1, 14000, 17000, 15000, 0, 'item-201228-f3c094984b.jpg', '2020-12-22 16:24:01', '2020-12-28 13:22:48'),
(19, '2384', 'sdjflkj', 1, 1, 83247, 9234, 423489, 0, NULL, '2020-12-29 16:01:50', NULL),
(20, '8234', 'ksdfjksjk', 1, 1, 72384, 274598273, 87293784, 0, NULL, '2020-12-30 03:52:48', NULL),
(21, '374892', 'kljsdfkj', 1, 1, 8348759, 9823, 927598, 0, NULL, '2020-12-30 03:53:05', NULL),
(22, '7346', 'sjdhfj', 1, 1, 2347, 82368, 8723647, 0, NULL, '2020-12-30 03:53:19', NULL),
(23, '2839', 'sdfjklj', 3, 1, 894357, 9823, 9283, 0, NULL, '2020-12-30 03:55:15', NULL),
(24, '867', 'jhghjg', 1, 1, 764, 6576, 75675, 0, NULL, '2020-12-30 03:55:42', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stock`
--

CREATE TABLE `tb_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `stock_type` enum('in','out') NOT NULL,
  `stock_detail` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `stock_date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
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
(11, 'Toko E', '98462386416565', 'banjaran', 'jual minyak goreng', '2020-12-19 21:02:26', NULL),
(13, 'Toko F', '3874723429489', 'dimana saja', 'jual gelas ', '2020-12-28 19:16:31', NULL);

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

--
-- Dumping data untuk tabel `tb_unit`
--

INSERT INTO `tb_unit` (`unit_id`, `unit_code`, `unit_name`, `unit_desc`) VALUES
(1, 'PCS', 'PIECES', 'SATUAN PIECES'),
(2, 'KG', 'KILOGRAM', 'SATUAN KILOGRAM BERAT'),
(3, 'LTR', 'LITER', 'SATUAN UKURAN VOLUME DALAM LITER');

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
-- Indeks untuk tabel `tb_product_item`
--
ALTER TABLE `tb_product_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_barcode` (`item_barcode`),
  ADD KEY `product_cat_id` (`product_cat_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indeks untuk tabel `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_product_category`
--
ALTER TABLE `tb_product_category`
  MODIFY `product_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_product_item`
--
ALTER TABLE `tb_product_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_stock`
--
ALTER TABLE `tb_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_product_item`
--
ALTER TABLE `tb_product_item`
  ADD CONSTRAINT `tb_product_item_ibfk_1` FOREIGN KEY (`product_cat_id`) REFERENCES `tb_product_category` (`product_cat_id`),
  ADD CONSTRAINT `tb_product_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `tb_unit` (`unit_id`);

--
-- Ketidakleluasaan untuk tabel `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD CONSTRAINT `tb_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tb_product_item` (`item_id`),
  ADD CONSTRAINT `tb_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `tb_supplier` (`supplier_id`),
  ADD CONSTRAINT `tb_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
