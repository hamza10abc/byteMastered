-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 12:39 PM
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
  `salPerDay` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arksaji`
--

INSERT INTO `arksaji` (`_id`, `pid`, `noe`, `nod`, `salPerDay`) VALUES
(3, 42, 1, 2.000, 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `dawasaji`
--

CREATE TABLE `dawasaji` (
  `_id` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `noe` int(3) NOT NULL,
  `nod` float(5,2) NOT NULL,
  `salPerDay` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desig` varchar(100) NOT NULL,
  `gross_salary` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`_id`, `name`, `desig`, `gross_salary`) VALUES
(3, 'Sarim', 'MTS', 123.00),
(4, 'Hamza', 'Daily Wager', 69.00),
(5, 'Shibli', 'Daily Wager', 100.00);

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
  `spd` float(5,2) NOT NULL
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
  `unit_prds_per_ghan` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labour_in_packing`
--

INSERT INTO `labour_in_packing` (`_id`, `pid`, `input`, `filling`, `sealing`, `packing`, `other`, `unit_prds_per_ghan`) VALUES
(3, 61, 1.00, 2.000, 3.000, 4.000, 5.00, 6.00),
(4, 55, 1.00, 2.000, 3.000, 4.000, 5.00, 6.00),
(5, 62, 1.00, 3.000, 4.000, 5.000, 6.00, 2.00);

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
  `pks_input` float(5,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lot_ghan`
--

INSERT INTO `lot_ghan` (`_id`, `pid`, `sts_output`, `sts_input`, `prs_output`, `prs_input`, `pks_output`, `pks_input`) VALUES
(3, 59, 22.000, 11.000, 66.000, 4.000, 55.000, 33.000);

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
  `cap` float(5,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packaging_material`
--

INSERT INTO `packaging_material` (`_id`, `pid`, `qty`, `cover_box`, `label`, `jar`, `cartoon`, `cap`) VALUES
(2, 61, '1', 2.000, 3.000, 4.000, 5.000, 6.000),
(3, 54, '1', 2.000, 34.000, 5.000, 6.000, 8.000),
(4, 62, '100 ML', 1.000, 2.000, 3.000, 4.000, 5.000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(2) NOT NULL,
  `sizes` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`_id`, `name`, `type`, `sizes`) VALUES
(35, 'Hamza', 'P', '10 GM'),
(36, 'Hamza', 'As', '10 GM'),
(37, 'Hamza', 'As', '10 GM'),
(38, 'testing now', 'T', '50 ML'),
(39, 'testing now', 'T', '50 ML'),
(40, 'kj', 'P', '50 ML'),
(41, 'test now', 'Ds', '100 ML'),
(42, 'test now', 'Ds', '100 ML'),
(43, 'Sarim test', 'Ds', '100 ML'),
(44, 'sarim sexy boi', 'P', '10 GM'),
(45, 'shibli sexy boi', 'Ds', '100 ML'),
(46, 'takd', 'P', '100 ML'),
(47, 'kjwd', 'T', '10 ML'),
(48, 'test', 'S', '100 ML'),
(49, 'Hamza', 'T', '100 ML'),
(50, 'lsjds', 'S', '50 ML'),
(51, 'ljksd', 'As', '100 ML'),
(52, 'sexy horia hai', 'S', '50 ML'),
(53, 'tsasajksasa', 'T', '50 ML'),
(54, 'tueqa', 'As', '50 GM'),
(55, 'test1 with AS', 'As', '10 GM'),
(56, 'testing for dawasaji', 'Ds', '100 ML'),
(57, 'testing arksaji', 'As', '10 ML'),
(58, 'testing Dawa saji', 'Ds', '100 ML'),
(59, 'testing tablet', 'T', '10 GM'),
(60, 'syrup test', 'S', '100 ML'),
(61, 'powder test', 'P', '50 ML'),
(62, 'Sarim and Hamza Sexy horia hai', 'T', '100 ML');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `_id` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `raw_id` int(5) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`_id`, `pid`, `raw_id`, `qty`) VALUES
(2, 57, 11, 10),
(3, 57, 12, 0),
(4, 57, 13, 0),
(5, 57, 14, 0),
(6, 57, 15, 0),
(8, 58, 11, 20),
(9, 58, 32, 0),
(10, 59, 11, 10),
(12, 59, 13, 10),
(13, 60, 12, 10),
(15, 60, 14, 20),
(16, 61, 11, 10),
(18, 62, 10, 10),
(19, 62, 11, 20),
(21, 62, 13, 22);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `_id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `old_rate` float(8,2) NOT NULL,
  `final_rate` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`_id`, `name`, `old_rate`, `final_rate`) VALUES
(10, 'test', 455.00, 11.00),
(11, 'Shibli', 22.00, 11.00),
(12, 'test', 455.00, 45.00),
(13, 'test', 455.00, 45.00),
(14, 'Hamza', 455.00, 45.00),
(15, 'test', 455.00, 450.00),
(16, 'test', 455.00, 45.00),
(17, 'test', 455.00, 45.00),
(18, 'test', 455.00, 45.00),
(19, 'test', 455.00, 45.00),
(20, 'test', 455.00, 45.00),
(21, 'test', 455.00, 45.00),
(22, 'test', 455.00, 45.00),
(23, 'test', 455.00, 45.00),
(24, 'test', 455.00, 45.00),
(25, 'test', 455.00, 45.00),
(26, 'test', 455.00, 45.00),
(27, 'test', 455.00, 45.00),
(28, 'test', 455.00, 45.00),
(29, 'test', 455.00, 45.00),
(30, 'test', 455.00, 45.00),
(31, 'test ahmad', 123.00, 123.00),
(32, 'Edit', 12.00, 12.00),
(33, 'test,Shibli', 0.00, 0.00),
(34, 'test,Shibli,test ahmad,test,Shibli', 0.00, 0.00),
(35, 'test,Hamza', 0.00, 0.00),
(36, 'testing error', 456.00, 456.00);

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
  `ic_nod` int(2) NOT NULL
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
  `spd` float(7,2) NOT NULL
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
-- Dumping data for table `test`
--

INSERT INTO `test` (`_id`, `name`, `value`, `work`, `cost`, `price`, `final`) VALUES
(1, '31', '35', '', 0.00, 0.00, ''),
(2, '32', '35', '', 0.00, 0.00, ''),
(3, '13', '36', '', 0.00, 0.00, ''),
(4, '14', '36', '', 0.00, 0.00, ''),
(5, '15', '36', '', 0.00, 0.00, ''),
(6, '16', '36', '', 0.00, 0.00, ''),
(7, '17', '36', '', 0.00, 0.00, ''),
(8, '14', '37', '', 0.00, 0.00, ''),
(9, '15', '37', '', 0.00, 0.00, ''),
(10, '14', '37', '', 0.00, 0.00, ''),
(11, '15', '37', '', 0.00, 0.00, ''),
(12, '14', '37', '', 0.00, 0.00, ''),
(13, '15', '37', '', 0.00, 0.00, ''),
(14, '33', '39', '', 0.00, 0.00, ''),
(15, '33', '39', '', 0.00, 0.00, ''),
(16, '11', '44', '', 0.00, 0.00, ''),
(17, '24', '45', '', 0.00, 0.00, ''),
(18, '31', '45', '', 0.00, 0.00, ''),
(19, '32', '45', '', 0.00, 0.00, ''),
(20, '10', '46', '', 0.00, 0.00, ''),
(21, '11', '46', '', 0.00, 0.00, ''),
(22, '12', '46', '', 0.00, 0.00, ''),
(23, '14', '47', '', 0.00, 0.00, ''),
(24, '15', '47', '', 0.00, 0.00, ''),
(25, '16', '47', '', 0.00, 0.00, ''),
(26, '14', '47', '', 0.00, 0.00, ''),
(27, '15', '47', '', 0.00, 0.00, ''),
(28, '16', '47', '', 0.00, 0.00, '');

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
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dawasaji`
--
ALTER TABLE `dawasaji`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grinding`
--
ALTER TABLE `grinding`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `labour_in_packing`
--
ALTER TABLE `labour_in_packing`
  MODIFY `_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lot_ghan`
--
ALTER TABLE `lot_ghan`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packaging_material`
--
ALTER TABLE `packaging_material`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `syrup`
--
ALTER TABLE `syrup`
  MODIFY `_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tablet`
--
ALTER TABLE `tablet`
  MODIFY `_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
