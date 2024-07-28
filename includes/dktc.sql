-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 06:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dktc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `_id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`_id`, `username`, `pass`) VALUES
(1, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `arksaji`
--

CREATE TABLE `arksaji` (
  `_id` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `noe` int(3) NOT NULL,
  `nod` float(5,3) NOT NULL,
  `salPerDay` float(5,2) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dawasaji`
--

CREATE TABLE `dawasaji` (
  `_id` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `noe` int(3) NOT NULL,
  `nod` float(5,2) NOT NULL,
  `salPerDay` float(5,2) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desig` varchar(100) NOT NULL,
  `gross_salary` float(10,2) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`_id`, `name`, `desig`, `gross_salary`, `addedOn`) VALUES
(3, 'Mohammad Sarim', 'MTS', 123.00, '2024-07-28 21:36:30'),
(4, 'Hamza', 'Daily Wager', 69.00, '2024-07-28 21:36:30'),
(5, 'Shibli', 'Daily Wager', 100.00, '2024-07-28 21:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `grinding`
--

CREATE TABLE `grinding` (
  `_id` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `input` float(5,2) NOT NULL,
  `output` float(5,2) NOT NULL,
  `noe` int(2) NOT NULL,
  `hid` float(5,2) NOT NULL,
  `spd` float(5,2) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labour_in_packing`
--

CREATE TABLE `labour_in_packing` (
  `_id` int(3) NOT NULL,
  `pid` int(5) NOT NULL,
  `input` float(7,2) NOT NULL,
  `filling` float(7,3) NOT NULL,
  `sealing` float(7,3) NOT NULL,
  `packing` float(7,3) NOT NULL,
  `other` float(7,2) NOT NULL,
  `unit_prds_per_ghan` float(10,2) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lot_ghan`
--

CREATE TABLE `lot_ghan` (
  `_id` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `sts_output` float(5,3) NOT NULL,
  `sts_input` float(5,3) NOT NULL,
  `prs_output` float(5,3) NOT NULL,
  `prs_input` float(5,3) NOT NULL,
  `pks_output` float(5,3) NOT NULL,
  `pks_input` float(5,3) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packaging_material`
--

CREATE TABLE `packaging_material` (
  `_id` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `cover_box` float(5,3) NOT NULL,
  `label` float(5,3) NOT NULL,
  `jar` float(5,3) NOT NULL,
  `cartoon` float(5,3) NOT NULL,
  `cap` float(5,3) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(2) NOT NULL,
  `sizes` varchar(10) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `_id` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `raw_id` int(5) NOT NULL,
  `qty` int(11) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `_id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `old_rate` float(8,2) NOT NULL,
  `final_rate` float(8,2) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`_id`, `name`, `old_rate`, `final_rate`, `addedOn`) VALUES
(37, 'Shibli', 10.00, 10.00, '2024-07-28 21:42:29'),
(38, 'Ahmad', 20.00, 20.00, '2024-07-28 21:42:29'),
(39, 'Raza', 30.00, 30.00, '2024-07-28 21:42:29'),
(40, 'Mohammad', 90.00, 90.00, '2024-07-28 21:42:29'),
(41, 'Sarim', 40.00, 40.00, '2024-07-28 21:42:29'),
(42, 'Syed', 80.00, 80.00, '2024-07-28 21:42:29'),
(43, 'Hamza', 100.00, 100.00, '2024-07-28 21:42:29'),
(44, 'Hussain', 200.00, 200.00, '2024-07-28 21:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `syrup`
--

CREATE TABLE `syrup` (
  `_id` int(3) NOT NULL,
  `pid` int(5) NOT NULL,
  `sup_noe` int(2) NOT NULL,
  `sup_nod` int(2) NOT NULL,
  `igp_noe` int(2) NOT NULL,
  `igp_nod` int(2) NOT NULL,
  `if_noe` int(2) NOT NULL,
  `if_nod` int(2) NOT NULL,
  `is_noe` int(2) NOT NULL,
  `is_nod` int(2) NOT NULL,
  `ic_noe` int(2) NOT NULL,
  `ic_nod` int(2) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tablet`
--

CREATE TABLE `tablet` (
  `_id` int(3) NOT NULL,
  `pid` int(5) NOT NULL,
  `lc_noe` int(2) NOT NULL,
  `lc_nod` float(5,3) NOT NULL,
  `mx_noe` int(2) NOT NULL,
  `mx_nod` float(5,3) NOT NULL,
  `gr_noe` int(2) NOT NULL,
  `gr_nod` float(5,3) NOT NULL,
  `tb_noe` int(2) NOT NULL,
  `tb_nod` float(5,3) NOT NULL,
  `spd` float(7,2) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `work` varchar(100) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `final` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `arksaji`
--
ALTER TABLE `arksaji`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_arksaji_product` (`pid`);

--
-- Indexes for table `dawasaji`
--
ALTER TABLE `dawasaji`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_dawasaji_product` (`pid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `grinding`
--
ALTER TABLE `grinding`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_grinding_product` (`pid`);

--
-- Indexes for table `labour_in_packing`
--
ALTER TABLE `labour_in_packing`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_labour_in_packing_product` (`pid`);

--
-- Indexes for table `lot_ghan`
--
ALTER TABLE `lot_ghan`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_lot_ghan_product` (`pid`);

--
-- Indexes for table `packaging_material`
--
ALTER TABLE `packaging_material`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_packagin_material_product` (`pid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `syrup`
--
ALTER TABLE `syrup`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_syrup_product` (`pid`);

--
-- Indexes for table `tablet`
--
ALTER TABLE `tablet`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `fk_tablet_product` (`pid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arksaji`
--
ALTER TABLE `arksaji`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dawasaji`
--
ALTER TABLE `dawasaji`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grinding`
--
ALTER TABLE `grinding`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labour_in_packing`
--
ALTER TABLE `labour_in_packing`
  MODIFY `_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lot_ghan`
--
ALTER TABLE `lot_ghan`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packaging_material`
--
ALTER TABLE `packaging_material`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `syrup`
--
ALTER TABLE `syrup`
  MODIFY `_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tablet`
--
ALTER TABLE `tablet`
  MODIFY `_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arksaji`
--
ALTER TABLE `arksaji`
  ADD CONSTRAINT `fk_arksaji_product` FOREIGN KEY (`pid`) REFERENCES `product` (`_id`) ON UPDATE CASCADE;

--
-- Constraints for table `dawasaji`
--
ALTER TABLE `dawasaji`
  ADD CONSTRAINT `fk_dawasaji_product` FOREIGN KEY (`pid`) REFERENCES `product` (`_id`);

--
-- Constraints for table `grinding`
--
ALTER TABLE `grinding`
  ADD CONSTRAINT `fk_grinding_product` FOREIGN KEY (`pid`) REFERENCES `product` (`_id`) ON UPDATE CASCADE;

--
-- Constraints for table `labour_in_packing`
--
ALTER TABLE `labour_in_packing`
  ADD CONSTRAINT `fk_labour_in_packing_product` FOREIGN KEY (`pid`) REFERENCES `product` (`_id`) ON UPDATE CASCADE;

--
-- Constraints for table `lot_ghan`
--
ALTER TABLE `lot_ghan`
  ADD CONSTRAINT `fk_lot_ghan_product` FOREIGN KEY (`pid`) REFERENCES `product` (`_id`) ON UPDATE CASCADE;

--
-- Constraints for table `packaging_material`
--
ALTER TABLE `packaging_material`
  ADD CONSTRAINT `fk_packagin_material_product` FOREIGN KEY (`pid`) REFERENCES `product` (`_id`) ON UPDATE CASCADE;

--
-- Constraints for table `syrup`
--
ALTER TABLE `syrup`
  ADD CONSTRAINT `fk_syrup_product` FOREIGN KEY (`pid`) REFERENCES `product` (`_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tablet`
--
ALTER TABLE `tablet`
  ADD CONSTRAINT `fk_tablet_product` FOREIGN KEY (`pid`) REFERENCES `product` (`_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
