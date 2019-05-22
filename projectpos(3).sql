-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 08:49 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` int(11) NOT NULL,
  `id_kategori_bahan_baku` int(11) NOT NULL,
  `nama_bahan_baku` varchar(50) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `stok` float NOT NULL,
  `limit_stok` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan_baku`, `id_kategori_bahan_baku`, `nama_bahan_baku`, `satuan`, `stok`, `limit_stok`) VALUES
(1, 2, 'TES', '1', 10200, 10),
(2, 2, 'ABV', 'Bal', 12, 12),
(3, 2, 'Beras', 'Kilogram', 10, 5),
(4, 2, 'Telur', 'Butir', 100, 10);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `no_hp`) VALUES
(2, '1234', '1234'),
(3, 'Tes', '092');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemasokan_bahan_baku`
--

CREATE TABLE `detail_pemasokan_bahan_baku` (
  `id_detail_pemasokan_bahan_baku` int(11) NOT NULL,
  `id_pemasokan` int(11) NOT NULL,
  `id_bahan_baku` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemasokan_bahan_baku`
--

INSERT INTO `detail_pemasokan_bahan_baku` (`id_detail_pemasokan_bahan_baku`, `id_pemasokan`, `id_bahan_baku`, `qty`, `harga`, `subtotal`) VALUES
(1, 1, 1, 11, 10, 110),
(2, 2, 1, 100, 100, 10000),
(3, 6, 1, 1000, 5000, 5000000),
(4, 7, 1, 1000, 5, 5000),
(5, 8, 1, 100, 5, 500),
(6, 9, 1, 50, 12, 600),
(7, 10, 1, 50, 12, 600),
(8, 11, 1, 100, 10, 1000),
(9, 12, 0, 100, 2, 200),
(10, 13, 3, 10, 1000, 10000),
(11, 13, 4, 10, 1000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemasokan_produk_jadi`
--

CREATE TABLE `detail_pemasokan_produk_jadi` (
  `id_detail_pemasokan_produk_jadi` int(11) NOT NULL,
  `id_pemasokan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemasokan_produk_jadi`
--

INSERT INTO `detail_pemasokan_produk_jadi` (`id_detail_pemasokan_produk_jadi`, `id_pemasokan`, `id_produk`, `qty`, `harga`, `subtotal`) VALUES
(1, 1, 1, 11, 12, 132),
(2, 2, 1, 100, 100, 10000),
(3, 3, 1, 100, 5000, 500000),
(4, 4, 1, 100, 15000, 1500000),
(5, 5, 1, 100, 100, 10000),
(6, 6, 1, 1000, 5000, 5000000),
(7, 7, 1, 1000, 5, 5000),
(8, 8, 1, 100, 5, 500),
(9, 9, 1, 100, 12, 1200),
(10, 10, 1, 100, 12, 1200),
(11, 11, 1, 100, 10, 1000),
(12, 12, 1, 100, 2, 200),
(13, 13, 2, 10, 1000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `takeaway_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_produk`, `qty`, `harga`, `subtotal`, `takeaway_type`) VALUES
(1, 1, 1, 1, 0, 1, 1),
(2, 1, 1, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_roles` int(11) NOT NULL,
  `nama_roles` varchar(30) NOT NULL,
  `permission` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_roles`, `nama_roles`, `permission`) VALUES
(1, 'Superadmin', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16');

-- --------------------------------------------------------

--
-- Table structure for table `history_restock_bahan_baku`
--

CREATE TABLE `history_restock_bahan_baku` (
  `id_restock_bahan_baku` int(11) NOT NULL,
  `id_bahan_baku` int(11) NOT NULL,
  `tipe` enum('+','-') NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_restock_produk`
--

CREATE TABLE `history_restock_produk` (
  `id_restock_produk` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tipe` enum('+','-') NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_bahan_baku`
--

CREATE TABLE `kategori_bahan_baku` (
  `id_kategori_bahan_baku` int(11) NOT NULL,
  `nama_kategori_bahan_baku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_bahan_baku`
--

INSERT INTO `kategori_bahan_baku` (`id_kategori_bahan_baku`, `nama_kategori_bahan_baku`) VALUES
(2, 'OKETEzas'),
(3, 'xxzx');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori_produk` int(3) NOT NULL,
  `nama_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori_produk`, `nama_kategori`) VALUES
(2, 'Testz'),
(3, 'Es');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_pemasukan`
--

CREATE TABLE `keuangan_pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `detail_info` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan_pemasukan`
--

INSERT INTO `keuangan_pemasukan` (`id_pemasukan`, `tanggal`, `detail_info`, `jumlah`) VALUES
(1, '2019-05-15', 'as', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_pengeluaran`
--

CREATE TABLE `keuangan_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `detail_info` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan_pengeluaran`
--

INSERT INTO `keuangan_pengeluaran` (`id_pengeluaran`, `tanggal`, `detail_info`, `jumlah`) VALUES
(1, '2019-05-15', 'Pembayaran Ke Supplier Cv. A', 10000),
(2, '2019-05-15', 'Pembayaran Ke Supplier Cv. A', 10000),
(3, '2019-05-15', 'Pembayaran Ke Supplier Cv. A', 1000),
(4, '2019-05-15', 'Pembayaran Ke Supplier Cv. A', 1000),
(5, '2019-05-15', 'Pembayaran Ke Supplier sasa', 2000),
(6, '2019-05-14', 'Pembayaran Ke Supplier sasa', 300),
(7, '2019-05-15', 'Pelunasan Pembayaran Ke Supplier sasa', 400);

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id_log_activity` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `detail_activity` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemasokan`
--

CREATE TABLE `pemasokan` (
  `id_pemasokan` int(11) NOT NULL,
  `tgl_pemasokan` date NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `status_pasok` enum('0','1','2','3') NOT NULL,
  `grand_total` int(11) NOT NULL,
  `status_bayar` enum('1','2') NOT NULL,
  `jumlah_terbayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasokan`
--

INSERT INTO `pemasokan` (`id_pemasokan`, `tgl_pemasokan`, `id_supplier`, `status_pasok`, `grand_total`, `status_bayar`, `jumlah_terbayar`) VALUES
(1, '2019-05-08', 1, '3', 242, '2', 242),
(2, '2019-05-08', 2, '3', 20000, '2', 20000),
(3, '2019-05-14', 2, '3', 500000, '1', 300000),
(4, '2019-05-14', 1, '2', 1500000, '2', 1500000),
(5, '2019-05-15', 2, '1', 10000, '2', 10000),
(6, '2019-05-14', 1, '3', 10000000, '2', 10000000),
(7, '2019-05-18', 2, '3', 10000, '2', 10000),
(8, '2019-05-14', 2, '1', 1000, '2', 1000),
(9, '2019-05-22', 1, '3', 1800, '2', 1800),
(10, '2019-05-22', 1, '3', 1800, '2', 1800),
(11, '2019-05-17', 1, '3', 2000, '2', 2000),
(12, '2019-05-14', 1, '3', 400, '2', 400),
(13, '2019-05-15', 1, '3', 30000, '1', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_lain`
--

CREATE TABLE `pemasukan_lain` (
  `id_pemasukan_lain` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `judul_pemasukan_lain` varchar(20) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan_lain`
--

INSERT INTO `pemasukan_lain` (`id_pemasukan_lain`, `tanggal`, `judul_pemasukan_lain`, `jumlah`, `keterangan`) VALUES
(1, '2019-05-05 00:00:00', 'Sponsor Djarum', 2000000, 'Oke Bos');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_lain`
--

CREATE TABLE `pengeluaran_lain` (
  `id_pengeluaran_lain` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul_pengeluaran_lain` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran_lain`
--

INSERT INTO `pengeluaran_lain` (`id_pengeluaran_lain`, `tanggal`, `judul_pengeluaran_lain`, `jumlah`, `keterangan`) VALUES
(1, '2019-05-05', 150000, 200000, 1212212);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tgl_penjualan` datetime NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `id_staff` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl_penjualan`, `id_customer`, `id_staff`, `grand_total`) VALUES
(1, '2019-05-15 12:35:00', 2, 2, 1222),
(2, '2019-05-09 00:00:00', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `nama_produk` varchar(40) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `tipe_stok` enum('Produk Jadi','Produk Olahan') NOT NULL,
  `limit_stok` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `image_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori_produk`, `nama_produk`, `harga_jual`, `satuan`, `tipe_stok`, `limit_stok`, `stok`, `image_produk`) VALUES
(1, 2, 'AA', 1200, 1, 'Produk Jadi', 0, 400, ''),
(2, 2, 'BB', 1200, 1, 'Produk Jadi', 0, 0, ''),
(3, 2, 'CC', 12, 12, 'Produk Olahan', 10, 10, ''),
(4, 2, 'AAAS', 12000, 2000, 'Produk Olahan', 13, 10, ''),
(5, 2, 'Nasi Goreng', 12000, 0, 'Produk Olahan', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_bahan_baku` int(11) NOT NULL,
  `jumlah_bb` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `id_produk`, `id_bahan_baku`, `jumlah_bb`) VALUES
(1, 5, 3, 0.2),
(2, 5, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nama_terang` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `id_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nama_terang`, `username`, `password`, `id_roles`) VALUES
(1, 'Ari', 'dyp', '$2y$10$gsIJXUixURcvNQa4aaQwc.Jpk267yzSJUXmSZzz0x260Kp.eH9fay', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(40) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_hp`, `email`, `alamat`) VALUES
(1, 'sasa', 'sas', 'asasas', 'sasas'),
(2, 'Cv. A', '082321190', 'test@gmail.com', 'Lumajang');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_pemasokan`
-- (See below for the actual view)
--
CREATE TABLE `v_detail_pemasokan` (
`id_pemasokan` int(11)
,`item` varchar(50)
,`qty` int(11)
,`harga` int(11)
,`subtotal` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `v_detail_penjualan` (
`id_detail_penjualan` int(11)
,`id_penjualan` int(11)
,`nama_produk` varchar(40)
,`qty` int(11)
,`harga` int(11)
,`subtotal` int(11)
,`takeaway_type` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_keuangan`
-- (See below for the actual view)
--
CREATE TABLE `v_keuangan` (
`tanggal` date
,`detail_info` varchar(50)
,`debit` varchar(11)
,`kredit` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `v_penjualan` (
`id_penjualan` int(11)
,`tgl_penjualan` datetime
,`nama_customer` varchar(30)
,`nama_terang` varchar(50)
,`grand_total` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_produk_not_in_resep`
-- (See below for the actual view)
--
CREATE TABLE `v_produk_not_in_resep` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_tbl_resep`
-- (See below for the actual view)
--
CREATE TABLE `v_tbl_resep` (
`kode_produk` int(11)
,`nama_produk` varchar(40)
,`jml_ingredients` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `v_detail_pemasokan`
--
DROP TABLE IF EXISTS `v_detail_pemasokan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_pemasokan`  AS  select `a`.`id_pemasokan` AS `id_pemasokan`,`p`.`nama_produk` AS `item`,`a`.`qty` AS `qty`,`a`.`harga` AS `harga`,`a`.`subtotal` AS `subtotal` from (`detail_pemasokan_produk_jadi` `a` join `produk` `p` on((`a`.`id_produk` = `p`.`id_produk`))) union select `b`.`id_pemasokan` AS `id_pemasokan`,`bb`.`nama_bahan_baku` AS `item`,`b`.`qty` AS `qty`,`b`.`harga` AS `harga`,`b`.`subtotal` AS `subtotal` from (`detail_pemasokan_bahan_baku` `b` join `bahan_baku` `bb` on((`b`.`id_bahan_baku` = `bb`.`id_bahan_baku`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_detail_penjualan`
--
DROP TABLE IF EXISTS `v_detail_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_penjualan`  AS  select `dp`.`id_detail_penjualan` AS `id_detail_penjualan`,`dp`.`id_penjualan` AS `id_penjualan`,`produk`.`nama_produk` AS `nama_produk`,`dp`.`qty` AS `qty`,`dp`.`harga` AS `harga`,`dp`.`subtotal` AS `subtotal`,`dp`.`takeaway_type` AS `takeaway_type` from (`detail_penjualan` `dp` join `produk` on((`dp`.`id_produk` = `produk`.`id_produk`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_keuangan`
--
DROP TABLE IF EXISTS `v_keuangan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_keuangan`  AS  select `keuangan_pemasukan`.`tanggal` AS `tanggal`,`keuangan_pemasukan`.`detail_info` AS `detail_info`,`keuangan_pemasukan`.`jumlah` AS `debit`,'' AS `kredit` from `keuangan_pemasukan` union select `keuangan_pengeluaran`.`tanggal` AS `tanggal`,`keuangan_pengeluaran`.`detail_info` AS `detail_info`,'' AS `Name_exp_3`,`keuangan_pengeluaran`.`jumlah` AS `jumlah` from `keuangan_pengeluaran` ;

-- --------------------------------------------------------

--
-- Structure for view `v_penjualan`
--
DROP TABLE IF EXISTS `v_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penjualan`  AS  select `p`.`id_penjualan` AS `id_penjualan`,`p`.`tgl_penjualan` AS `tgl_penjualan`,`c`.`nama_customer` AS `nama_customer`,`s`.`nama_terang` AS `nama_terang`,`p`.`grand_total` AS `grand_total` from ((`penjualan` `p` left join `customer` `c` on((`p`.`id_customer` = `c`.`id_customer`))) left join `staff` `s` on((`p`.`id_staff` = `s`.`id_staff`))) order by `p`.`tgl_penjualan` desc,`p`.`id_penjualan` desc ;

-- --------------------------------------------------------

--
-- Structure for view `v_produk_not_in_resep`
--
DROP TABLE IF EXISTS `v_produk_not_in_resep`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_produk_not_in_resep`  AS  select `produk`.`id_produk` AS `id_produk`,`produk`.`nama_produk` AS `nama_produk` from `produk` where ((`produk`.`tipe_stok` = 'Produk Olahan') and (`produk`.`metode_tracking` = '2') and (not(`produk`.`id_produk` in (select distinct `resep`.`id_produk` from `resep`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_tbl_resep`
--
DROP TABLE IF EXISTS `v_tbl_resep`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tbl_resep`  AS  select distinct `resep`.`id_produk` AS `kode_produk`,`produk`.`nama_produk` AS `nama_produk`,(select count(`resep`.`id_bahan_baku`) from `resep` where (`resep`.`id_produk` = `kode_produk`)) AS `jml_ingredients` from (`resep` join `produk` on((`produk`.`id_produk` = `resep`.`id_produk`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_pemasokan_bahan_baku`
--
ALTER TABLE `detail_pemasokan_bahan_baku`
  ADD PRIMARY KEY (`id_detail_pemasokan_bahan_baku`);

--
-- Indexes for table `detail_pemasokan_produk_jadi`
--
ALTER TABLE `detail_pemasokan_produk_jadi`
  ADD PRIMARY KEY (`id_detail_pemasokan_produk_jadi`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `history_restock_bahan_baku`
--
ALTER TABLE `history_restock_bahan_baku`
  ADD PRIMARY KEY (`id_restock_bahan_baku`);

--
-- Indexes for table `history_restock_produk`
--
ALTER TABLE `history_restock_produk`
  ADD PRIMARY KEY (`id_restock_produk`);

--
-- Indexes for table `kategori_bahan_baku`
--
ALTER TABLE `kategori_bahan_baku`
  ADD PRIMARY KEY (`id_kategori_bahan_baku`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indexes for table `keuangan_pemasukan`
--
ALTER TABLE `keuangan_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `keuangan_pengeluaran`
--
ALTER TABLE `keuangan_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id_log_activity`);

--
-- Indexes for table `pemasokan`
--
ALTER TABLE `pemasokan`
  ADD PRIMARY KEY (`id_pemasokan`);

--
-- Indexes for table `pemasukan_lain`
--
ALTER TABLE `pemasukan_lain`
  ADD PRIMARY KEY (`id_pemasukan_lain`);

--
-- Indexes for table `pengeluaran_lain`
--
ALTER TABLE `pengeluaran_lain`
  ADD PRIMARY KEY (`id_pengeluaran_lain`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_pemasokan_bahan_baku`
--
ALTER TABLE `detail_pemasokan_bahan_baku`
  MODIFY `id_detail_pemasokan_bahan_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_pemasokan_produk_jadi`
--
ALTER TABLE `detail_pemasokan_produk_jadi`
  MODIFY `id_detail_pemasokan_produk_jadi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history_restock_bahan_baku`
--
ALTER TABLE `history_restock_bahan_baku`
  MODIFY `id_restock_bahan_baku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_restock_produk`
--
ALTER TABLE `history_restock_produk`
  MODIFY `id_restock_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_bahan_baku`
--
ALTER TABLE `kategori_bahan_baku`
  MODIFY `id_kategori_bahan_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keuangan_pemasukan`
--
ALTER TABLE `keuangan_pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keuangan_pengeluaran`
--
ALTER TABLE `keuangan_pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id_log_activity` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasokan`
--
ALTER TABLE `pemasokan`
  MODIFY `id_pemasokan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pemasukan_lain`
--
ALTER TABLE `pemasukan_lain`
  MODIFY `id_pemasukan_lain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengeluaran_lain`
--
ALTER TABLE `pengeluaran_lain`
  MODIFY `id_pengeluaran_lain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
