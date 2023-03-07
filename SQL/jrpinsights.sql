-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2023 at 03:44 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jrpinsights`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_account`
--

DROP TABLE IF EXISTS `billing_account`;
CREATE TABLE IF NOT EXISTS `billing_account` (
  `billing_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_account` varchar(150) NOT NULL,
  `category` varchar(15) NOT NULL,
  `note` varchar(150) NOT NULL,
  `flag` int(5) NOT NULL,
  `sender_id` varchar(50) NOT NULL,
  `return_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `col_1` varchar(50) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`billing_account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_account`
--

INSERT INTO `billing_account` (`billing_account_id`, `billing_account`, `category`, `note`, `flag`, `sender_id`, `return_id`, `user_id`, `col_1`, `date`) VALUES
(3, '761971', 'Parcel', 'JRP', 1, '5', '1', '56', '', '2023-01-19 17:24:45'),
(4, '14358256', 'Freight', 'Sheridan Way', 1, '5', '1', '56', '', '2022-12-08 17:07:29'),
(6, '16910773', 'Freight', 'Calgary AB', 1, '7', '3', '56', '', '2023-02-01 23:17:56'),
(7, '16463403', 'Freight', 'Oakville ON', 1, '6', '2', '56', '', '2023-02-01 23:18:23'),
(8, '481351', 'Parcel', 'Oakville ON', 1, '6', '2', '56', '', '2023-02-01 23:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `bv_customer`
--

DROP TABLE IF EXISTS `bv_customer`;
CREATE TABLE IF NOT EXISTS `bv_customer` (
  `bv_user_id` int(100) NOT NULL AUTO_INCREMENT,
  `jrp_account_no` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(200) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `state` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `col_1` varchar(200) NOT NULL,
  `col_2` varchar(200) NOT NULL,
  `col_3` varchar(200) NOT NULL,
  `col_4` varchar(200) NOT NULL,
  `col_5` varchar(200) NOT NULL,
  `last_import` timestamp NOT NULL,
  PRIMARY KEY (`bv_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consignee`
--

DROP TABLE IF EXISTS `consignee`;
CREATE TABLE IF NOT EXISTS `consignee` (
  `consignee_id` int(50) NOT NULL AUTO_INCREMENT,
  `addressLine1` varchar(255) NOT NULL,
  `addressLine2` varchar(200) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postalCode` varchar(50) NOT NULL,
  `countryCode` varchar(50) NOT NULL,
  `customerName` varchar(120) NOT NULL,
  `fullName` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `department` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `jrp_acc_no` varchar(50) NOT NULL,
  `col_2` varchar(50) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`consignee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consignee`
--

INSERT INTO `consignee` (`consignee_id`, `addressLine1`, `addressLine2`, `province`, `city`, `postalCode`, `countryCode`, `customerName`, `fullName`, `email`, `department`, `telephone`, `jrp_acc_no`, `col_2`, `date`) VALUES
(5, '201 Rue Principale', '', 'QC', 'Frampton', 'G0R1M0', 'CA', 'Jack Performance', 'Jacques Gaulin', 'info@jackperformance.com', 'none', '4184795359', 'JACPER', '', '2023-02-17 15:49:41'),
(7, '201 Rue Principale', '', 'QC', 'Frampton', 'G0R1M0', 'CA', 'Jack Performance', 'Jacques Gaulin', 'info@jackperformance.com', 'none', '4184795359', 'JACPER', '', '2023-02-17 16:08:45'),
(8, '201 Rue Principale', '', 'QC', 'Frampton', 'G0R1M0', 'CA', 'Jack Performance', 'Jacques Gaulin', 'info@jackperformance.com', 'none', '4184795359', 'JACPER', '', '2023-02-17 16:13:06'),
(10, '201 Rue Principale', '', 'QC', 'Frampton', 'G0R1M0', 'CA', 'Jack Performance', 'Jacques Gaulin', 'info@jackperformance.com', 'none', '4184795359', 'JACPER', '', '2023-02-17 16:20:24'),
(13, '201 Rue Principale', '', 'QC', 'Frampton', 'G0R1M0', 'CA', 'Jack Performance', 'Jacques Gaulin', 'info@jackperformance.com', 'none', '4184795359', 'JACPER', '', '2023-02-17 16:57:46'),
(15, '87 Av dAmours', '', 'QC', 'Matane', 'G4W2X5', 'CA', 'Tech Pro', 'David Marco', 'techpro2507@gmail.com', 'none', '5812324303', 'TECPRO', '', '2023-02-17 17:21:49'),
(17, '201 Rue Principale', '', 'QC', 'Frampton', 'G0R1M0', 'CA', 'Jack Performance', 'Jacques Gaulin', 'info@jackperformance.com', 'none', '4184795359', 'JACPER', '', '2023-02-17 17:36:02'),
(20, '1990 Cyrille Duquet  110', '', 'QC', 'Quebec', 'G1N4K8', 'CA', 'DM Performance  9473 6592 Qu  bec inc', 'Dany Flibotte', 'dany.flibotte@gmail.com', 'none', '4186092613', 'DMPERF', '', '2023-02-17 17:40:44'),
(23, '201 Rue Principale', '', 'QC', 'Frampton', 'G0R1M0', 'CA', 'Jack Performance', 'Jacques Gaulin', 'info@jackperformance.com', 'none', '4184795359', 'JACPER', '', '2023-02-17 18:16:03'),
(27, '332 2e Avenue', '', 'QC', 'Portneuf', 'G0A2Y0', 'CA', 'Rivard Competittion', 'Jacques Rivard Oliver Rivard', 'jacques@rivardcompetition.com', 'none', '4182863930', 'RIVCOM', '', '2023-02-17 18:45:39'),
(28, '108A rue Paradis', '', 'QC', 'Saint-Antonin', 'G0L2J0', 'CA', 'Precision Auto Canada', 'Eric April', 'info@precisionautocanada.com', 'none', '4188668477', 'PRECAN', '', '2023-02-17 18:56:07'),
(32, '87 Av dAmours', '', 'QC', 'Matane', 'G4W2X5', 'CA', 'Tech Pro', 'David Marco', 'techpro2507@gmail.com', 'none', '5812324303', 'TECPRO', '', '2023-02-17 19:07:58'),
(35, '201 Rue Principale', '', 'QC', 'Frampton', 'G0R1M0', 'CA', 'Jack Performance', 'Jacques Gaulin', 'info@jackperformance.com', 'none', '4184795359', 'JACPER', '', '2023-02-17 20:14:09'),
(39, '201 Rue Principale', '', 'QC', 'Frampton', 'G0R1M0', 'CA', 'Jack Performance', 'Jacques Gaulin', 'info@jackperformance.com', 'none', '4184795359', 'JACPER', '', '2023-02-27 15:08:15'),
(40, '201 Rue Principale', '', 'QC', 'Frampton', 'G0R1M0', 'CA', 'Jack Performance', 'Jacques Gaulin', 'info@jackperformance.com', 'none', '4184795359', 'JACPER', '', '2023-02-27 15:09:15'),
(41, '201 Rue Principale', '', 'QC', 'Frampton', 'G0R1M0', 'CA', 'Jack Performance', 'Jacques Gaulin', 'info@jackperformance.com', 'none', '4184795359', 'JACPER', '', '2023-02-27 15:10:22'),
(42, '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-03-03 16:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `gls_tracking`
--

DROP TABLE IF EXISTS `gls_tracking`;
CREATE TABLE IF NOT EXISTS `gls_tracking` (
  `invoice` varchar(100) NOT NULL,
  `tracking` varchar(100) NOT NULL,
  `sub_total` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manifest`
--

DROP TABLE IF EXISTS `manifest`;
CREATE TABLE IF NOT EXISTS `manifest` (
  `manifest_id` int(11) NOT NULL AUTO_INCREMENT,
  `pickup_id` varchar(15) NOT NULL,
  `shipment_id` varchar(15) NOT NULL,
  `sender_id` varchar(15) NOT NULL,
  `date` varchar(15) NOT NULL COMMENT 'pickup date',
  `time` varchar(8) NOT NULL COMMENT 'pickup time',
  `category` varchar(15) NOT NULL COMMENT 'freight/parcel',
  `create_date` timestamp NOT NULL,
  PRIMARY KEY (`manifest_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manifest`
--

INSERT INTO `manifest` (`manifest_id`, `pickup_id`, `shipment_id`, `sender_id`, `date`, `time`, `category`, `create_date`) VALUES
(9, '', '1597029', '6', '2023-03-03', '16:00', 'Freight', '2023-03-03 19:30:07'),
(10, '', '1597028', '6', '2023-03-03', '18:00', 'Freight', '2023-03-03 19:30:51'),
(11, '130908', '1597026', '6', '2023-03-03', '18:15', 'Freight', '2023-03-03 19:33:42'),
(12, '130909', '1596690', '5', '2023-03-03', '17:00', 'Freight', '2023-03-03 19:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `minimum_shipping_cost`
--

DROP TABLE IF EXISTS `minimum_shipping_cost`;
CREATE TABLE IF NOT EXISTS `minimum_shipping_cost` (
  `minimum_cost` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minimum_shipping_cost`
--

INSERT INTO `minimum_shipping_cost` (`minimum_cost`) VALUES
('18');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_tracking`
--

DROP TABLE IF EXISTS `multiple_tracking`;
CREATE TABLE IF NOT EXISTS `multiple_tracking` (
  `multiple_tracking_id` int(11) NOT NULL AUTO_INCREMENT,
  `trackingNumber` varchar(150) NOT NULL,
  `subtrackingNumber` varchar(150) NOT NULL,
  `order_number` varchar(150) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`multiple_tracking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multiple_tracking`
--

INSERT INTO `multiple_tracking` (`multiple_tracking_id`, `trackingNumber`, `subtrackingNumber`, `order_number`, `date`) VALUES
(1, 'W01344324', 'W0134432401', '0001221459', '2023-02-16 15:40:22'),
(2, 'W01344324', 'W0134432402', '0001221459', '2023-02-16 15:40:22'),
(3, 'W01344324', 'W0134432403', '0001221459', '2023-02-16 15:40:22'),
(4, 'W01344324', 'W0134432404', '0001221459', '2023-02-16 15:40:22'),
(5, 'W01344324', 'W0134432405', '0001221459', '2023-02-16 15:40:22'),
(6, 'W01344324', 'W0134432406', '0001221459', '2023-02-16 15:40:22'),
(7, 'W01344324', 'W0134432407', '0001221459', '2023-02-16 15:40:22'),
(8, 'W01344324', 'W0134432408', '0001221459', '2023-02-16 15:40:22'),
(9, 'W01344324', 'W0134432409', '0001221459', '2023-02-16 15:40:22'),
(10, 'W01344324', 'W0134432410', '0001221459', '2023-02-16 15:40:22'),
(11, 'W01344324', 'W0134432411', '0001221459', '2023-02-16 15:40:22'),
(12, 'W01344324', 'W0134432412', '0001221459', '2023-02-16 15:40:22'),
(13, 'W01344324', 'W0134432413', '0001221459', '2023-02-16 15:40:22'),
(14, 'W01344420', 'W0134442001', '0001221459', '2023-02-16 19:16:49'),
(15, 'W01344420', 'W0134442002', '0001221459', '2023-02-16 19:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `new_shipment`
--

DROP TABLE IF EXISTS `new_shipment`;
CREATE TABLE IF NOT EXISTS `new_shipment` (
  `new_shipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_account_id` int(150) NOT NULL,
  `sender_id` int(150) NOT NULL,
  `consignee_id` int(255) NOT NULL,
  `division` varchar(150) NOT NULL,
  `category` varchar(150) NOT NULL,
  `paymentType` varchar(150) NOT NULL,
  `note` varchar(150) NOT NULL,
  `unitOfMeasurement` varchar(150) NOT NULL,
  `parcelType` varchar(150) NOT NULL,
  `quantity` int(150) NOT NULL,
  `weight` varchar(150) NOT NULL,
  `length` varchar(150) NOT NULL,
  `depth` varchar(150) NOT NULL,
  `width` varchar(150) NOT NULL,
  `hazmat` varchar(150) NOT NULL,
  `h_phone` varchar(150) NOT NULL,
  `h_erapReference` varchar(150) NOT NULL,
  `h_number` varchar(150) NOT NULL,
  `h_shippingName` varchar(150) NOT NULL,
  `h_primaryClass` varchar(150) NOT NULL,
  `h_subsidiaryClass` varchar(150) NOT NULL,
  `h_toxicByInhalation` varchar(150) NOT NULL,
  `h_packingGroup` varchar(150) NOT NULL,
  `h_description` varchar(150) NOT NULL,
  `h_hazmatType` varchar(150) NOT NULL,
  `requestReturnLabel` varchar(150) NOT NULL,
  `returnWaybill` varchar(150) NOT NULL,
  `surcharges_type` varchar(150) NOT NULL,
  `surcharges_value` varchar(150) NOT NULL,
  `promoCodes_status` varchar(15) NOT NULL,
  `promoCodes` varchar(15) NOT NULL,
  `createDate` timestamp NOT NULL,
  `deliveryType` varchar(150) NOT NULL,
  `references_type` varchar(150) NOT NULL,
  `references_code` varchar(150) NOT NULL,
  `return_id` varchar(150) NOT NULL,
  `col_1` varchar(150) NOT NULL COMMENT 'Appointment_phone',
  `col_2` varchar(150) NOT NULL COMMENT 'appointment_type',
  `col_3` varchar(150) NOT NULL COMMENT 'app_date',
  `col_4` varchar(200) NOT NULL COMMENT 'app_time',
  `col_5` varchar(200) NOT NULL,
  `col_6` varchar(200) NOT NULL,
  `col_7` varchar(200) NOT NULL,
  `col_8` varchar(200) NOT NULL,
  PRIMARY KEY (`new_shipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_shipment`
--

INSERT INTO `new_shipment` (`new_shipment_id`, `billing_account_id`, `sender_id`, `consignee_id`, `division`, `category`, `paymentType`, `note`, `unitOfMeasurement`, `parcelType`, `quantity`, `weight`, `length`, `depth`, `width`, `hazmat`, `h_phone`, `h_erapReference`, `h_number`, `h_shippingName`, `h_primaryClass`, `h_subsidiaryClass`, `h_toxicByInhalation`, `h_packingGroup`, `h_description`, `h_hazmatType`, `requestReturnLabel`, `returnWaybill`, `surcharges_type`, `surcharges_value`, `promoCodes_status`, `promoCodes`, `createDate`, `deliveryType`, `references_type`, `references_code`, `return_id`, `col_1`, `col_2`, `col_3`, `col_4`, `col_5`, `col_6`, `col_7`, `col_8`) VALUES
(7, 3, 5, 5, 'Express', 'Parcel', 'Prepaid', '', 'LI', 'Box', 1, '11', '11', '11', '11', 'no', '', '', '', '', '', '', '', '', '', '', 'false', '', 'SNR', '', 'no', '', '2023-02-17 15:49:41', 'GRD', 'INV', '91022', '1', '', '', '', '', '1676648981-1493514919', '', '', ''),
(8, 3, 5, 5, 'Express', 'Parcel', 'Prepaid', '', 'LI', 'Box', 1, '22', '22', '22', '22', 'no', '', '', '', '', '', '', '', '', '', '', 'false', '', 'SNR', '', 'no', '', '2023-02-17 15:49:41', 'GRD', 'INV', '91022', '1', '', '', '', '', '1676648981-1493514919', '', '', ''),
(11, 3, 5, 7, 'Express', 'Parcel', 'Prepaid', 'testing', 'LI', 'Box', 1, '11', '11', '11', '11', 'yes', '', '', '', '', '', '', '', '', 'test des 9th jan', 'NonRegulated', 'false', '', 'DGG', '', 'no', '', '2023-02-17 16:08:45', 'GRD', 'INV', '91022', '1', '', '', '', '', '1676650125-1335754060', '', '', ''),
(12, 3, 5, 8, 'Express', 'Parcel', 'Prepaid', '', 'LI', 'Box', 1, '11', '11', '11', '11', 'yes', '', '', '', '', '', '', '', '', 'testing', 'NonRegulated', 'false', '', 'DGG', '', 'no', '', '2023-02-17 16:13:06', 'GRD', 'INV', '1223', '1', '', '', '', '', '1676650386-1168536407', '', '', ''),
(13, 3, 5, 8, 'Express', 'Parcel', 'Prepaid', '', 'LI', 'Box', 1, '12', '12', '12', '12', 'yes', '', '', '', '', '', '', '', '', 'testing', 'NonRegulated', 'false', '', 'DGG', '', 'no', '', '2023-02-17 16:13:06', 'GRD', 'INV', '1223', '1', '', '', '', '', '1676650386-1168536407', '', '', ''),
(16, 3, 5, 10, 'Express', 'Parcel', 'Prepaid', '', 'LI', 'Box', 1, '11', '11', '11', '11', 'no', '', '', '', '', '', '', '', '', '', '', 'true', 'Q1234568', 'SNR', '', 'no', '', '2023-02-17 16:20:24', 'GRD', 'INV', '91022', '1', '', '', '', '', '1676650824-1220183597', '', '', ''),
(21, 3, 5, 13, 'Express', 'Parcel', 'Prepaid', '', 'LI', 'Box', 1, '11', '11', '11', '11', 'yes', '4156325698', '', 'UN1993', 'Flammable Liquids', '', '', 'false', '', '', 'Regulated', 'false', '', 'DGG', '', 'no', '', '2023-02-17 16:57:46', 'GRD', 'INV', '1223', '1', '', '', '', '', '1676653066-804242275', '', '', ''),
(22, 3, 5, 13, 'Express', 'Parcel', 'Prepaid', '', 'LI', 'Box', 1, '12', '12', '12', '12', 'yes', '4156325698', '', 'UN1993', 'Flammable Liquids', '', '', 'false', '', '', 'Regulated', 'false', '', 'DGG', '', 'no', '', '2023-02-17 16:57:46', 'GRD', 'INV', '1223', '1', '', '', '', '', '1676653066-804242275', '', '', ''),
(25, 7, 6, 15, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Skid', 1, '12', '12', '12', '12', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'TGT', '', 'no', '', '2023-02-17 17:21:49', 'GRD', '', '', '2', '', 'None', '', '00:00', '1676654509-356671116', '', '', ''),
(26, 7, 6, 15, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Skid', 1, '13', '13', '13', '13', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'TGT', '', 'no', '', '2023-02-17 17:21:49', 'GRD', '', '', '2', '', 'None', '', '00:00', '1676654509-356671116', '', '', ''),
(29, 6, 7, 17, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Skid', 1, '12', '12', '12', '12', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'TGT', '', 'no', '', '2023-02-17 17:36:02', 'GRD', '', '', '3', '', 'None', '', '00:00', '1676655362-967719683', '', '', ''),
(30, 6, 7, 17, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Skid', 1, '13', '13', '13', '13', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'TGT', '', 'no', '', '2023-02-17 17:36:02', 'GRD', '', '', '3', '', 'None', '', '00:00', '1676655362-967719683', '', '', ''),
(35, 7, 6, 20, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Skid', 1, '23', '23', '23', '23', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'TGT', '', 'no', '', '2023-02-17 17:40:44', 'GRD', '', '', '2', '4161111111', 'Scheduled', '2023-02-20', '11:40', '1676655644-773337006', '', '', ''),
(36, 7, 6, 20, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Skid', 1, '32', '32', '32', '32', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'TGT', '', 'no', '', '2023-02-17 17:40:44', 'GRD', '', '', '2', '4161111111', 'Scheduled', '2023-02-20', '11:40', '1676655644-773337006', '', '', ''),
(41, 7, 6, 23, 'Freight', 'Freight', 'Prepaid', 'Delivery Ins.', 'LI', 'Skid', 1, '12', '12', '12', '12', 'yes', '', '', '', '', '', '', '', '', 'test des 16th Feb fr', 'NonRegulated', '', '', 'DGG', '', 'no', '', '2023-02-17 18:16:03', 'GRD', '', '', '2', '4161111111', 'Required', '', '00:00', '1676657763-735081727', '', '', ''),
(42, 7, 6, 23, 'Freight', 'Freight', 'Prepaid', 'Delivery Ins.', 'LI', 'Crate', 1, '34', '12', '12', '12', 'yes', '', '', '', '', '', '', '', '', 'test des 16th Feb fr', 'NonRegulated', '', '', 'DGG', '', 'no', '', '2023-02-17 18:16:03', 'GRD', '', '', '2', '4161111111', 'Required', '', '00:00', '1676657763-735081727', '', '', ''),
(49, 7, 6, 27, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Box', 1, '15', '22', '22', '22', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'TGT', '', 'no', '', '2023-02-17 18:45:39', 'GRD', '', '', '2', '4161111111', 'Required', '', '00:00', '1676659539-975725554', '', '', ''),
(50, 7, 6, 27, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Skid', 1, '15', '33', '22', '45', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'TGT', '', 'no', '', '2023-02-17 18:45:39', 'GRD', '', '', '2', '4161111111', 'Required', '', '00:00', '1676659539-975725554', '', '', ''),
(51, 6, 7, 28, 'Freight', 'Freight', 'Prepaid', 'Freight note testing.....', 'LI', 'Skid', 1, '12', '12', '12', '12', 'yes', '', '', '', '', '', '', '', '', 'testing', 'NonRegulated', '', '', 'DGG', '', 'no', '', '2023-02-17 18:56:07', 'GRD', '', '', '3', '4161111111', 'Required', '', '00:00', '1676660167-1892257366', '', '', ''),
(52, 6, 7, 28, 'Freight', 'Freight', 'Prepaid', 'Freight note testing.....', 'LI', 'Skid', 1, '23', '23', '23', '23', 'yes', '', '', '', '', '', '', '', '', 'testing', 'NonRegulated', '', '', 'DGG', '', 'no', '', '2023-02-17 18:56:07', 'GRD', '', '', '3', '4161111111', 'Required', '', '00:00', '1676660167-1892257366', '', '', ''),
(58, 7, 6, 32, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Skid', 1, '13', '13', '13', '13', 'yes', '4156325698', '', 'UN1993', 'Flammable Liquids', '', '', 'true', '', '', 'Regulated', '', '', 'DGG', '', 'no', '', '2023-02-17 19:07:58', 'GRD', '', '', '2', '', 'None', '', '00:00', '1676660878-453559682', '', '', ''),
(63, 4, 5, 35, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Skid', 1, '12', '12', '12', '12', 'yes', '4156325698', '', 'UN1993', 'Flammable Liquids', '', '', 'true', '', '', 'Regulated', '', '', 'DGG', '', 'no', '', '2023-02-17 20:14:09', 'GRD', '', '', '1', '', 'None', '', '00:00', '1676664849-2040487806', '', '', ''),
(68, 7, 6, 39, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Skid', 1, '22', '22', '22', '22', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'TGT', '', 'no', '', '2023-02-27 15:08:15', 'GRD', '', '', '2', '', 'None', '', '00:00', '1677510495-1581935718', '', '', ''),
(69, 7, 6, 40, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Box', 1, '33', '33', '33', '33', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'TGT', '', 'no', '', '2023-02-27 15:09:15', 'GRD', '', '', '2', '', 'None', '', '00:00', '1677510555-1327858089', '', '', ''),
(70, 7, 6, 40, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Skid', 1, '12', '12', '12', '12', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'TGT', '', 'no', '', '2023-02-27 15:09:15', 'GRD', '', '', '2', '', 'None', '', '00:00', '1677510555-1327858089', '', '', ''),
(71, 7, 6, 41, 'Freight', 'Freight', 'Prepaid', '', 'LI', 'Skid', 1, '44', '44', '44', '44', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'TGT', '', 'no', '', '2023-02-27 15:10:22', 'GRD', '', '', '2', '', 'Scheduled', '2023-02-28', '16:00', '1677510622-862789205', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

DROP TABLE IF EXISTS `return`;
CREATE TABLE IF NOT EXISTS `return` (
  `return_id` int(11) NOT NULL AUTO_INCREMENT,
  `addressLine1` varchar(255) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postalCode` varchar(50) NOT NULL,
  `countryCode` varchar(50) NOT NULL,
  `customerName` varchar(120) NOT NULL,
  `fullName` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `department` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `col_1` varchar(50) NOT NULL,
  `col_2` varchar(50) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`return_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return`
--

INSERT INTO `return` (`return_id`, `addressLine1`, `province`, `city`, `postalCode`, `countryCode`, `customerName`, `fullName`, `email`, `department`, `telephone`, `col_1`, `col_2`, `date`) VALUES
(1, '2344 S Sheridan Way', 'ON', 'Toronto', 'L5J2M4', 'CA', 'JRP Inc.', 'JRP Inc.', 'info@jrponline.com', 'Accounts', '9058227223', '', '', '2023-02-01 15:23:51'),
(2, '1182 S Service Road West', 'ON', 'Oakville', 'L6L5T7', 'CA', 'SONAX Canada', 'Josh Dugglebly1', 'josh@jrponline.com', 'Shipping', '9058227223', '', '', '2023-02-01 23:29:55'),
(3, 'JRP Canada West', 'AB', '250007 Mountain View Trail', 'T3Z3S3', 'CA', 'JRP Canada West', 'Andrew Yarish', 'andrew@jrponline.com', 'Shipping', '9058227223', '', '', '2023-02-01 23:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `review_shipping`
--

DROP TABLE IF EXISTS `review_shipping`;
CREATE TABLE IF NOT EXISTS `review_shipping` (
  `review_shipping_id` int(11) NOT NULL AUTO_INCREMENT,
  `OrderNumber` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `CustomerName` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Address1` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Address2` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `City` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Province` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `PostalCode` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Date` timestamp NOT NULL,
  PRIMARY KEY (`review_shipping_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sender`
--

DROP TABLE IF EXISTS `sender`;
CREATE TABLE IF NOT EXISTS `sender` (
  `sender_id` int(11) NOT NULL AUTO_INCREMENT,
  `addressline1` varchar(255) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postalCode` varchar(50) NOT NULL,
  `countryCode` varchar(50) NOT NULL,
  `customerName` varchar(120) NOT NULL,
  `fullName` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `department` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `col_1` varchar(50) NOT NULL,
  `col_2` varchar(50) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`sender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sender`
--

INSERT INTO `sender` (`sender_id`, `addressline1`, `province`, `city`, `postalCode`, `countryCode`, `customerName`, `fullName`, `email`, `department`, `telephone`, `col_1`, `col_2`, `date`) VALUES
(5, '2344 S Sheridan Way,  ON.', 'ON', 'Mississauga', 'L5J 2M4', 'CA', 'JRP Inc.', 'JRP Inc.', 'wahida1@jrponline.com', 'accounts', '4194971550', '', '', '2023-01-23 20:47:32'),
(6, '1182 S Service Road West', 'ON', 'Oakville', 'L6L5T7', 'CA', 'SONAX Canada', 'Josh Dugglebly', 'josh@jrponline.com', 'Shipping', '9058227223', '', '', '2023-02-01 18:29:55'),
(7, '250007 Mountain View Trail', 'AB', 'Calgary', 'T3Z3S3', 'CA', 'JRP Canada West', 'Andrew Yarish', 'andrew@jrponline.com', 'Shipping', '9058227223', '', '', '2023-02-02 04:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `trackingnumber`
--

DROP TABLE IF EXISTS `trackingnumber`;
CREATE TABLE IF NOT EXISTS `trackingnumber` (
  `trackingNumber_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(150) NOT NULL,
  `trackingNumber` varchar(150) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `new_shipment_id` varchar(50) NOT NULL COMMENT 'new_shipment_id',
  `order_number` varchar(50) NOT NULL,
  `col_1` varchar(255) NOT NULL COMMENT 'Unique ID for multiple shipment No.',
  `col_2` varchar(50) NOT NULL COMMENT 'added_by',
  `col_3` varchar(50) NOT NULL COMMENT 'bv_rate',
  `date` timestamp NOT NULL,
  PRIMARY KEY (`trackingNumber_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trackingnumber`
--

INSERT INTO `trackingnumber` (`trackingNumber_id`, `id`, `trackingNumber`, `rate`, `new_shipment_id`, `order_number`, `col_1`, `col_2`, `col_3`, `date`) VALUES
(2, '1596669', 'W01344836', '31.1', '8', '0001221459', '1676648981-1493514919', '56', '31.1', '2023-02-17 15:49:41'),
(3, '1596670', 'W01344840', '69.28', '11', '0001221459', '1676650125-1335754060', '56', '69.28', '2023-02-17 16:08:45'),
(4, '1596671', 'W01344851', '72.95', '13', '0001221459', '1676650386-1168536407', '56', '72.95', '2023-02-17 16:13:07'),
(5, '1596672', 'W01344862', '9.74', '16', '0001221459', '1676650824-1220183597', '56', '18', '2023-02-17 16:20:25'),
(6, '1596675', 'W01344895', '72.95', '22', '0001221459', '1676653066-804242275', '56', '72.95', '2023-02-17 16:57:46'),
(8, '1596678', 'WA0024721', '236.06', '26', '0001215867', '1676654509-356671116', '56', '236.06', '2023-02-17 17:21:51'),
(9, '1596679', 'WA0024732', '332.52', '30', '0001221459', '1676655362-967719683', '56', '332.52', '2023-02-17 17:36:02'),
(10, '1596680', 'WA0024743', '231.68', '36', '0001224869', '1676655644-773337006', '56', '231.68', '2023-02-17 17:40:45'),
(11, '1596681', 'WA0024754', '171.35', '42', '0001221459', '1676657763-735081727', '56', '171.35', '2023-02-17 18:16:04'),
(12, '1596684', 'WA0024765', '229.43', '50', '0001218627', '1676659539-975725554', '56', '229.43', '2023-02-17 18:45:39'),
(13, '1596685', 'WA0024776', '259.97', '52', '0001085140', '1676660167-1892257366', '56', '259.97', '2023-02-17 18:56:08'),
(15, '1596687', 'WA0024791', '180.64', '58', '0001215867', '1676660878-453559682', '56', '180.64', '2023-02-17 19:07:59'),
(16, '1596690', 'WA0024802', '171.35', '63', '0001221459', '1676664849-2040487806', '56', '171.35', '2023-02-17 20:14:09'),
(18, '1597026', 'WA0024964', '226.77', '68', '0001221459', '1677510495-1581935718', '56', '226.77', '2023-02-27 15:08:15'),
(19, '1597028', 'WA0024986', '226.77', '70', '0001221459', '1677510555-1327858089', '56', '226.77', '2023-02-27 15:09:16'),
(20, '1597029', 'WA0024990', '336.38', '71', '0001221459', '1677510622-862789205', '56', '336.38', '2023-02-27 15:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `account_status` varchar(10) NOT NULL,
  `logcount` varchar(100) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(100) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `user_excol1` varchar(100) NOT NULL,
  `user_excol2` varchar(100) NOT NULL,
  `user_excol3` varchar(100) NOT NULL,
  `user_excol4` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `account_status`, `logcount`, `last_login`, `ip`, `account_type`, `user_excol1`, `user_excol2`, `user_excol3`, `user_excol4`) VALUES
(1, 'Wahida ', 'Hossain', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'wahida1@jrponline.com', '1', '177', '2023-03-03 19:37:12', '::1', 'superadmin', 'unblock', '1010RI', '$user_excol3', '$user_excol4'),
(2, 'John', 'Montgomery', 'john', '8429890e896ddc373c58002f92f6b9af', 'monty@jrponline.com', '1', '42', '2023-01-11 21:39:57', '127.0.0.1', 'staff', 'unblock', '', '', ''),
(55, 'scott', 'scott', 'scott', 'b5e010db004fd827a907642a5454467f', 'scott@jrponline.com', '1', '3', '2023-01-18 18:12:46', '127.0.0.1', 'staff', 'unblock', '', '', ''),
(56, 'wahida', 'hossain', 'dev', '55bf491e3a9e8d733cfc0375176363be', 'wahida@jrponline.com', '1', '35', '2023-03-03 15:19:31', '127.0.0.1', 'dev', 'unblock', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
