-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2018 at 02:20 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wec_erp`
--
CREATE DATABASE IF NOT EXISTS `wec_erp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wec_erp`;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `agent_id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_name` varchar(45) NOT NULL,
  `agent_email` varchar(60) NOT NULL,
  `agent_phone` varchar(11) DEFAULT NULL,
  `agent_country` varchar(45) NOT NULL,
  `agent_city` varchar(50) NOT NULL,
  PRIMARY KEY (`agent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cargo_sheds`
--

DROP TABLE IF EXISTS `cargo_sheds`;
CREATE TABLE IF NOT EXISTS `cargo_sheds` (
  `cargo_shed_id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_shed_name` varchar(100) NOT NULL,
  `has_account` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cargo_shed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1007 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargo_sheds`
--

INSERT INTO `cargo_sheds` (`cargo_shed_id`, `cargo_shed_name`, `has_account`) VALUES
(1001, 'DHL', 0),
(1002, 'Swiss Port', 0),
(1003, 'Transglobal Cargo center', 0),
(1004, 'Siginon Freight', 0),
(1005, 'Africa Cargo Handling center', 0),
(1006, 'Kenya Airfreight Handling Ltd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(150) DEFAULT NULL,
  `client_phone` varchar(45) DEFAULT NULL,
  `client_email` varchar(45) DEFAULT NULL,
  `client_country` varchar(45) DEFAULT NULL,
  `client_state` varchar(45) DEFAULT NULL,
  `client_city` varchar(45) DEFAULT NULL,
  `client_postal_address` varchar(45) DEFAULT NULL,
  `client_notes` longtext,
  `client_type` int(11) DEFAULT NULL,
  `is_company` int(1) NOT NULL,
  `contact_person_name` varchar(150) NOT NULL,
  `contact_person_email` varchar(50) NOT NULL,
  `contact_person_phone` varchar(15) NOT NULL,
  `contact_person_designation` varchar(30) NOT NULL,
  `client_since` date NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) DEFAULT NULL,
  `cust_currency` varchar(11) DEFAULT NULL,
  `is_customer` int(1) NOT NULL DEFAULT '0',
  `mc_id` int(11) DEFAULT NULL,
  `tariff_block` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY `client_phone` (`client_phone`),
  UNIQUE KEY `client_email` (`client_email`),
  KEY `clients_added_by_fk` (`added_by`),
  KEY `clients_mc_id_fk` (`mc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2207 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`cust_id`, `client_name`, `client_phone`, `client_email`, `client_country`, `client_state`, `client_city`, `client_postal_address`, `client_notes`, `client_type`, `is_company`, `contact_person_name`, `contact_person_email`, `contact_person_phone`, `contact_person_designation`, `client_since`, `added_on`, `added_by`, `cust_currency`, `is_customer`, `mc_id`, `tariff_block`) VALUES
(2193, 'Vector Aviation', '0704051656', 'info@vector.co.ke', 'Kenya', 'Nrb', 'Nrb', NULL, '', 1, 1, 'Ayub Wambulwa', 'ayubwambulwa@vector.co.ke', '0704051656', 'Director', '2017-01-02', '2017-07-06 11:28:36', 1258, 'KES', 1, 222, ''),
(2194, 'Avmax Aviation', '0735046542', 'info@avmax.com', 'Kenya', 'Nrb', 'Nrb', NULL, '<p>Does shipping to Japan weekly. Also, takes their plane engines monthly for repair and servicing. But, has an existing freight service provider whom I find to be offering inferior services</p>', 1, 1, 'Smith', 'smith@avmax.com', '0735046543', 'Director', '2015-01-01', '2017-07-06 15:48:41', 1258, 'KES', 1, 222, ''),
(2195, 'Air Kenya', '0706336225', 'info@airkenya.com', 'Kenya', 'Nrb', 'Nrb', NULL, '', 1, 1, 'Philip Kamaru', 'philip@airkenya.com', '0784587855', 'Manager', '2016-02-02', '2017-07-06 16:52:06', 1258, 'KES', 1, 222, ''),
(2196, 'omenda joseph', '0797654321', 'kissmy@gmaiI.com', 'Kenya', 'NAIROBI', 'Nairobi', NULL, '<p><b><u>First&nbsp;proposal</u></b></p><p>mkora</p><p><b><br></b></p>', 2, 1, 'Shakira', 'wakawaka@eheh', '07911911911', 'Director', '2017-01-09', '2017-07-17 11:02:49', 1259, 'USD', 0, 216, ''),
(2197, 'Hello World', '48759654213', 'hello@abc.com', 'Kenya', 'Nairobi', 'Nairobi', NULL, '', 2, 0, 'Joseph Omena', 'jos@abc.com', '9985746566', 'Manager', '2017-09-01', '2017-09-01 16:39:00', 1259, 'KES', 1, 214, ''),
(2201, 'Wambulwa', '0704051657', 'ayub@willfreight.co.ke', 'Kenya', 'Nairobi', 'Nairobi', NULL, '<p>Test&nbsp;&nbsp;&nbsp;&nbsp;</p>', 1, 1, 'Ayub', 'ayub@pursuit.com', '0707038879', 'Manager', '0000-00-00', '2017-10-02 15:32:13', 1259, 'USD', 1, 216, ''),
(2205, 'Bluebird Aviation', '0756421254', 'info@bluebird.com', 'Kenya', 'Nairobi', 'Nairobi', '3758 - 00200 Nairobi', '', 1, 1, 'Ahmed Ali', 'md@bluebird.com', '0704512545', 'Director', '2017-11-27', '2017-11-27 07:38:12', 1259, 'KES', 1, 219, 'A'),
(2206, 'Albert Freighters', '0728987590', 'alberteshiwani@willfreight.co.ke', 'Kenya', 'Nakuru', 'Nakuru', '3758 - 20100 Nakuru', '', 1, 1, 'Albert Eshiwani', 'alberteshiwani@willfreight.co.ke', '0728987590', 'Director', '2018-01-03', '2018-01-03 17:41:44', 1258, 'USD', 1, 222, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_tariff_blocks`
--

DROP TABLE IF EXISTS `client_tariff_blocks`;
CREATE TABLE IF NOT EXISTS `client_tariff_blocks` (
  `ctb_id` int(11) NOT NULL AUTO_INCREMENT,
  `ctb_name` varchar(100) NOT NULL,
  `ctb_description` text NOT NULL,
  `ctb_table_name` varchar(100) NOT NULL,
  `ctb_added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ctb_added_by` int(11) NOT NULL,
  `ctb_is_active` int(1) NOT NULL DEFAULT '0',
  `ctb_is_assigned` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ctb_id`),
  UNIQUE KEY `ctb_name` (`ctb_name`),
  UNIQUE KEY `ctb_table_name` (`ctb_table_name`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_tariff_blocks`
--

INSERT INTO `client_tariff_blocks` (`ctb_id`, `ctb_name`, `ctb_description`, `ctb_table_name`, `ctb_added_on`, `ctb_added_by`, `ctb_is_active`, `ctb_is_assigned`) VALUES
(19, 'Default', 'This is the default block for all clients. Any client who has not been assigned a tariff block lands here', 'tariff_block_Default', '2017-11-21 11:43:38', 1254, 1, 1),
(20, 'A', 'This has least discount but cheaper than default tariff', 'tariff_block_A', '2017-11-21 11:44:59', 1254, 1, 1),
(21, 'Super', 'Applies to regular, high value & minimum fuss customer', 'tariff_block_Super', '2017-11-24 10:15:34', 1254, 1, 1),
(22, 'Demo', 'Just testing', 'tariff_block_Demo', '2017-11-27 09:38:15', 1254, 1, 1),
(23, 'B', 'Just test block', 'tariff_block_B', '2017-12-20 15:43:08', 1254, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `consignement_parties`
--

DROP TABLE IF EXISTS `consignement_parties`;
CREATE TABLE IF NOT EXISTS `consignement_parties` (
  `cons_id` int(11) NOT NULL,
  `importer_name` varchar(45) DEFAULT NULL,
  `importer_address` varchar(100) DEFAULT NULL,
  `exporter_name` varchar(45) DEFAULT NULL,
  `exporter_address` varchar(100) DEFAULT NULL,
  `clearing_agent_id` int(11) NOT NULL,
  PRIMARY KEY (`cons_id`),
  KEY `fk_Consignement_parties_Agent1_idx` (`clearing_agent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `consignment`
--

DROP TABLE IF EXISTS `consignment`;
CREATE TABLE IF NOT EXISTS `consignment` (
  `cons_id` int(11) NOT NULL AUTO_INCREMENT,
  `cons_cargo_type` varchar(100) NOT NULL,
  `cons_regime` varchar(50) NOT NULL,
  `cons_import_export` varchar(50) NOT NULL,
  `cons_trans_type` varchar(100) NOT NULL,
  `cons_entry_number` int(11) NOT NULL,
  `cons_date_opened` date NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cons_shipper` varchar(100) NOT NULL,
  `cons_consignee` varchar(100) NOT NULL,
  `cons_desc` varchar(200) NOT NULL,
  `cons_urgency` varchar(50) NOT NULL,
  `cons_airline` varchar(100) NOT NULL,
  `cons_no_of_packages` int(11) NOT NULL,
  `cons_comm_inv_no` int(11) NOT NULL,
  `cons_comm_inv_value` int(11) NOT NULL,
  `cons_comm_inv_date` datetime NOT NULL,
  `cons_category` varchar(100) NOT NULL,
  `cons_weight` int(11) NOT NULL,
  `cons_length` int(11) NOT NULL,
  `cons_width` int(11) NOT NULL,
  `cons_height` int(11) NOT NULL,
  `cons_etd` date NOT NULL,
  `cons_eta` date NOT NULL,
  `cons_country_of_origin` varchar(45) DEFAULT NULL,
  `cons_door_of_origin` varchar(100) NOT NULL,
  `cons_country_of_destination` varchar(100) NOT NULL,
  `cons_port_of_delivery` text,
  `cons_door_of_delivery` text,
  `cons_flight_no` int(11) DEFAULT NULL,
  `cons_added_by` int(11) NOT NULL,
  `cons_is_invoiced` int(11) NOT NULL DEFAULT '0',
  `sent_to_accounts` int(11) NOT NULL DEFAULT '0',
  `sent_to_cs` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cons_id`),
  KEY `cons_cust_id_fk` (`cust_id`),
  KEY `cons_cons_added_by_fk` (`cons_added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consignment`
--

INSERT INTO `consignment` (`cons_id`, `cons_cargo_type`, `cons_regime`, `cons_import_export`, `cons_trans_type`, `cons_entry_number`, `cons_date_opened`, `cust_id`, `cons_shipper`, `cons_consignee`, `cons_desc`, `cons_urgency`, `cons_airline`, `cons_no_of_packages`, `cons_comm_inv_no`, `cons_comm_inv_value`, `cons_comm_inv_date`, `cons_category`, `cons_weight`, `cons_length`, `cons_width`, `cons_height`, `cons_etd`, `cons_eta`, `cons_country_of_origin`, `cons_door_of_origin`, `cons_country_of_destination`, `cons_port_of_delivery`, `cons_door_of_delivery`, `cons_flight_no`, `cons_added_by`, `cons_is_invoiced`, `sent_to_accounts`, `sent_to_cs`) VALUES
(1, 'Loose', 'Home use', 'Local', 'Road', 123654, '2017-07-25', 2193, 'Avmax', 'Ayub', 'Plane engine', 'Normal', '', 0, 0, 0, '0000-00-00 00:00:00', '', 10, 12, 12, 12, '2017-07-25', '2017-07-25', NULL, '', '', NULL, 'Wilson Airport', 5487, 1259, 1, 1, 1),
(2, 'Full container', 'Home use', 'Export', 'Seafreight', 5874695, '2017-08-01', 2193, 'Avmax', 'Peter Njeri', 'Plastic Cups', 'Normal', '', 0, 0, 0, '0000-00-00 00:00:00', '', 100, 12, 12, 12, '2017-08-01', '2017-08-22', NULL, '', '', NULL, NULL, 784596658, 1259, 1, 1, 1),
(3, 'Loose', 'Home use', 'Local', 'Road', 25478, '2017-08-25', 2194, 'KenKen', 'Ayub', 'Phones', 'Normal', '', 0, 0, 0, '0000-00-00 00:00:00', '', 120, 12, 12, 12, '2017-08-25', '2017-08-25', NULL, '', '', NULL, NULL, 12344, 1259, 1, 1, 1),
(4, 'Loose', 'Home use', 'Local', 'Road', 12345678, '2017-08-29', 2195, 'KenKen', 'Omenda', 'Transport of iPhones to Nakuru from Nairobi', 'Urgent', '', 0, 0, 0, '0000-00-00 00:00:00', '', 12, 10, 10, 10, '2017-08-29', '2017-08-29', NULL, '', '', NULL, NULL, 6736736, 1259, 1, 1, 1),
(5, 'Loose', 'Home use', 'Local', 'Road', 12345678, '2017-08-29', 2195, 'KenKen', 'Omenda', 'Transport of iPhones to Nakuru from Nairobi', 'Urgent', '', 0, 0, 0, '0000-00-00 00:00:00', '', 12, 10, 10, 10, '2017-08-29', '2017-08-29', NULL, '', '', NULL, NULL, 6736736, 1259, 1, 1, 1),
(6, 'Loose', 'Home use', 'Local', 'Road', 12345678, '2017-08-29', 2195, 'KenKen', 'Omenda', 'Transport of iPhones to Nakuru from Nairobi', 'Urgent', '', 0, 0, 0, '0000-00-00 00:00:00', '', 12, 10, 10, 10, '2017-08-29', '2017-08-29', NULL, '', '', NULL, NULL, 6736736, 1259, 1, 1, 1),
(7, 'Loose', 'Home use', 'Local', 'Road', 12345678, '2017-08-29', 2195, 'KenKen', 'Omenda', 'Transport of iPhones to Nakuru from Nairobi', 'Urgent', '', 0, 0, 0, '0000-00-00 00:00:00', '', 12, 10, 10, 10, '2017-08-29', '2017-08-29', NULL, '', '', NULL, NULL, 6736736, 1259, 1, 1, 1),
(8, 'Loose', 'Home use', 'Import', 'Airfreight', 8976657, '2017-08-29', 2195, 'Avmax', 'Omenda', 'Transport of iPhones to Nakuru from Nairobi', 'Urgent', '', 0, 0, 0, '0000-00-00 00:00:00', '', 9, 10, 10, 10, '2017-08-29', '2017-08-29', NULL, '', '', NULL, NULL, 12344, 1259, 1, 1, 1),
(9, 'Loose', 'Home use', 'Import', 'Airfreight', 8976657, '2017-08-29', 2195, 'Avmax', 'Omenda', 'Transport of iPhones to Nakuru from Nairobi', 'Urgent', '', 0, 0, 0, '0000-00-00 00:00:00', '', 9, 10, 10, 10, '2017-08-29', '2017-08-29', NULL, '', '', NULL, NULL, 12344, 1259, 0, 1, 1),
(10, 'Loose', 'Home use', 'Import', 'Airfreight', 8976657, '2017-08-29', 2195, 'Avmax', 'Omenda', 'Transport of iPhones to Nakuru from Nairobi', 'Urgent', '', 0, 0, 0, '0000-00-00 00:00:00', '', 9, 10, 10, 10, '2017-08-29', '2017-08-29', NULL, '', '', NULL, NULL, 12344, 1259, 0, 1, 1),
(11, 'Loose', 'Home use', 'Import', 'Airfreight', 8976657, '2017-08-29', 2195, 'Avmax', 'Omenda', 'Transport of iPhones to Nakuru from Nairobi', 'Urgent', '', 0, 0, 0, '0000-00-00 00:00:00', '', 9, 10, 10, 10, '2017-08-29', '2017-08-29', NULL, '', '', NULL, NULL, 12344, 1259, 0, 1, 1),
(12, 'Full container', 'Home use', 'Import', 'Seafreight', 8977, '2017-08-29', 2194, 'Avmax', 'Ayub', 'Transport of iPhones to China from Mombasa', 'Normal', '', 0, 0, 0, '0000-00-00 00:00:00', '', 120, 10, 10, 10, '2017-08-29', '2017-08-29', NULL, '', '', NULL, NULL, 12344, 1259, 1, 1, 1),
(13, 'Full container', 'Home use', 'Import', 'Seafreight', 8977, '2017-08-29', 2194, 'Avmax', 'Ayub', 'Transport of iPhones to China from Mombasa', 'Normal', '', 0, 0, 0, '0000-00-00 00:00:00', '', 120, 10, 10, 10, '2017-08-29', '2017-08-29', NULL, '', '', NULL, NULL, 12344, 1259, 0, 1, 1),
(14, 'Full container', 'Home use', 'Import', 'Airfreight', 98765, '2017-08-30', 2195, 'Avmax', 'Ayub', 'Transport of iPhones to Nakuru from Nairobi', 'Urgent', '', 0, 0, 0, '0000-00-00 00:00:00', '', 120, 10, 10, 10, '2017-08-30', '2017-08-30', NULL, '', '', NULL, NULL, 12344, 1259, 0, 1, 1),
(15, 'Full container', 'Home use', 'Import', 'Airfreight', 98765, '2017-08-30', 2195, 'Avmax', 'Ayub', 'Transport of iPhones to Nakuru from Nairobi', 'Urgent', '', 0, 0, 0, '0000-00-00 00:00:00', '', 120, 10, 10, 10, '2017-08-30', '2017-08-30', 'NBO', '', '', NULL, NULL, 12344, 1259, 0, 1, 1),
(16, 'Loose', 'Home use', 'Import', 'Seafreight', 12233, '2017-09-08', 2195, 'Avmax', 'oedna', 'Ferrari', 'Normal', '', 0, 0, 0, '0000-00-00 00:00:00', '', 45, 12, 12, 12, '0000-00-00', '0000-00-00', NULL, '', '', NULL, NULL, 784, 1259, 1, 1, 1),
(17, 'Loose', 'Home use', 'Import', 'Airfreight', 8520147, '2017-09-12', 2194, 'Avmax', 'Peter Njeru', 'Plane engine', 'Urgent', '', 0, 0, 0, '0000-00-00 00:00:00', '', 10, 12, 12, 12, '2017-09-12', '2017-09-12', NULL, '', '', NULL, NULL, 96966, 1259, 1, 1, 1),
(18, 'Loose', 'Home use', 'Import', 'Road', 78688, '0000-00-00', 2201, 'Avmax', 'Ayub', 'Car shipping from German to Mombasa', 'AOG', '', 0, 0, 0, '0000-00-00 00:00:00', '', 1200, 4, 2, 2, '0000-00-00', '0000-00-00', NULL, '', '', NULL, NULL, 85859, 1259, 0, 1, 1),
(19, 'Loose', 'Home use', 'Import', 'Road', 78688, '0000-00-00', 2201, 'Avmax', 'Ayub', 'Car shipping from German to Mombasa', 'AOG', '', 0, 0, 0, '0000-00-00 00:00:00', '', 1200, 4, 2, 2, '0000-00-00', '0000-00-00', NULL, '', '', NULL, NULL, 85859, 1259, 1, 1, 0),
(20, 'Loose', 'Home use', 'Import', 'Airfreight', 555582, '0000-00-00', 2193, 'Vector Aviation', 'Vector Aviation', 'A/C Engine', 'AOG', '', 0, 0, 0, '0000-00-00 00:00:00', '', 120, 2, 1, 1, '0000-00-00', '0000-00-00', NULL, '', '', NULL, NULL, 0, 1259, 1, 1, 1),
(22, 'Loose', 'Home use', 'Import', 'Airfreight', 938383, '0000-00-00', 2194, 'Avmax', 'Vector Aviation', 'A/C Wing', 'Urgent', 'KQ', 2, 1234321, 0, '0000-00-00 00:00:00', '1', 21, 2, 1, 1, '0000-00-00', '0000-00-00', 'LA', '', '', 'NBO', NULL, 123456, 1259, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cons_acc_info`
--

DROP TABLE IF EXISTS `cons_acc_info`;
CREATE TABLE IF NOT EXISTS `cons_acc_info` (
  `cons_cons_id` int(11) NOT NULL,
  `cons_service_id` int(11) NOT NULL,
  `cons_acc_info_amount` int(11) NOT NULL,
  `cai_cargo_shed_id` int(11) DEFAULT NULL,
  `cons_document_id` int(11) NOT NULL,
  `cons_acc_info_added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cons_acc_info_added_by` int(11) NOT NULL,
  UNIQUE KEY `cons_acc_info_service_cons_id_uq` (`cons_service_id`,`cons_cons_id`),
  KEY `cons_cons_charge_added_by_fk` (`cons_acc_info_added_by`),
  KEY `cons_acc_info_cons_id_fk` (`cons_cons_id`),
  KEY `cai_cai_cargo_shed_id_fk` (`cai_cargo_shed_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cons_acc_info`
--

INSERT INTO `cons_acc_info` (`cons_cons_id`, `cons_service_id`, `cons_acc_info_amount`, `cai_cargo_shed_id`, `cons_document_id`, `cons_acc_info_added_on`, `cons_acc_info_added_by`) VALUES
(1, 19, 5800, NULL, 0, '2017-09-18 15:10:35', 1255),
(2, 19, 3500, 1002, 0, '0000-00-00 00:00:00', 1259),
(4, 19, 5222, NULL, 0, '2017-09-19 09:06:29', 1255),
(5, 19, 2500, 1001, 0, '2017-09-20 12:33:19', 1255),
(6, 19, 2500, 1006, 0, '2017-09-26 10:37:22', 1255),
(7, 19, 4500, NULL, 0, '2017-09-01 16:01:43', 1259),
(9, 19, 3850, NULL, 0, '2017-09-06 11:04:03', 1255),
(10, 19, 4500, 1004, 0, '2017-09-06 16:55:04', 1255),
(11, 19, 4500, NULL, 0, '2017-09-06 16:59:05', 1255),
(12, 19, 8500, NULL, 0, '2017-09-07 12:07:51', 1255),
(14, 19, 5520, NULL, 0, '2017-09-11 15:48:03', 1255),
(15, 19, 2000, 1004, 0, '2017-09-04 14:19:49', 1259),
(16, 19, 2000, NULL, 0, '2017-09-01 16:54:31', 1259),
(17, 19, 8520, NULL, 0, '2017-09-12 16:13:26', 1259),
(18, 19, 1254, NULL, 0, '2017-10-03 11:00:59', 1259),
(19, 19, 2500, NULL, 0, '2017-10-02 17:50:36', 1259),
(20, 19, 2500, NULL, 0, '2017-11-30 16:24:19', 1259),
(22, 19, 3500, NULL, 0, '2017-12-07 16:13:42', 1259),
(3, 20, 2000, 1003, 0, '2017-08-25 11:50:55', 1259),
(5, 20, 5000, 1001, 0, '2017-09-20 12:33:19', 1255),
(6, 20, 5000, 1006, 0, '2017-09-26 10:37:22', 1255),
(9, 20, 2500, NULL, 0, '2017-09-04 12:50:38', 1259),
(13, 20, 5642, NULL, 0, '2017-09-07 14:31:07', 1255),
(15, 20, 6500, 1004, 0, '2017-09-12 16:18:56', 1255),
(16, 20, 2500, NULL, 0, '2017-09-01 16:54:31', 1259),
(18, 20, 2500, 1001, 0, '2017-10-05 17:11:53', 1255),
(19, 20, 25000, NULL, 0, '2017-10-02 17:50:36', 1259),
(20, 20, 8500, NULL, 0, '2017-11-30 16:24:19', 1259),
(22, 20, 35000, NULL, 0, '2017-12-05 12:27:41', 1259),
(2, 21, 2100, 1002, 0, '0000-00-00 00:00:00', 1259),
(8, 21, 2000, NULL, 0, '2017-09-01 16:05:42', 1259),
(18, 22, 1200, NULL, 0, '2017-10-31 17:22:12', 1259),
(19, 22, 3000000, NULL, 0, '2017-10-02 17:50:36', 1259),
(2, 23, 1200, 1002, 0, '2017-08-24 16:48:14', 1259),
(2, 26, 1000, 1002, 0, '2017-08-24 16:48:14', 1259),
(18, 27, 2500, NULL, 0, '2017-10-13 16:37:42', 1259),
(17, 32, 2500, NULL, 0, '2017-09-12 16:13:26', 1259),
(19, 32, 25000, NULL, 0, '2017-10-02 17:50:36', 1259),
(18, 35, 10000, NULL, 0, '2017-10-31 17:22:52', 1259),
(18, 36, 1000, NULL, 0, '2017-10-31 17:22:52', 1259),
(3, 39, 20000, 1003, 0, '2017-08-25 11:50:55', 1259),
(5, 45, 2540, 1001, 0, '2017-09-20 12:33:19', 1255),
(10, 45, 300, 1004, 0, '2017-09-06 16:55:04', 1255),
(18, 45, 8500, 1001, 0, '2017-10-05 17:11:53', 1255);

-- --------------------------------------------------------

--
-- Table structure for table `cons_bill_of_landing`
--

DROP TABLE IF EXISTS `cons_bill_of_landing`;
CREATE TABLE IF NOT EXISTS `cons_bill_of_landing` (
  `bill_of_landing_no` int(30) NOT NULL,
  `bill_of_landing_type` varchar(45) DEFAULT NULL,
  `bill_of_landing_charge` int(11) NOT NULL,
  `bol_cons_id` int(11) NOT NULL,
  `bol_added_by` int(11) NOT NULL,
  `bol_added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bol_doc_id` int(11) NOT NULL,
  PRIMARY KEY (`bill_of_landing_no`),
  KEY `bol_bol_added_by_fk` (`bol_added_by`),
  KEY `bol_bol_cons_id_fk` (`bol_cons_id`),
  KEY `cbol_bol_doc_id_fk` (`bol_doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cons_bill_of_landing`
--

INSERT INTO `cons_bill_of_landing` (`bill_of_landing_no`, `bill_of_landing_type`, `bill_of_landing_charge`, `bol_cons_id`, `bol_added_by`, `bol_added_on`, `bol_doc_id`) VALUES
(990, 'HAWB', 9900, 10, 1255, '2017-09-05 15:06:12', 84),
(2202, 'HAWB', 2020, 14, 1255, '2017-09-11 15:44:47', 91),
(2222, 'MAWB', 2200, 12, 1255, '2017-09-07 12:07:39', 89),
(2552, 'HAWB', 5550, 7, 1255, '2017-09-26 16:36:16', 102),
(3333, 'HAWB', 3300, 13, 1255, '2017-09-07 14:29:00', 90),
(3432, 'HAWB', 7800, 15, 1255, '2017-09-12 16:18:17', 92),
(4335, 'HAWB', 3450, 6, 1255, '2017-09-26 10:38:37', 101),
(5615, 'HAWB', 2540, 18, 1255, '2017-10-05 17:08:55', 104),
(5665, 'MAWB', 5660, 5, 1255, '2017-09-20 15:21:41', 99),
(6666, 'MAWB', 66600, 3, 1255, '2017-09-18 17:50:41', 97),
(8764, 'HAWB', 9650, 1, 1255, '2017-09-18 15:10:08', 94),
(8833, 'MAWB', 8900, 4, 1255, '2017-09-19 09:06:11', 98),
(9669, 'MAWB', 9600, 7, 1255, '2017-09-26 16:37:16', 103),
(9778, 'HAWB', 8569, 10, 1255, '2017-09-06 12:05:56', 87),
(9998, 'MAWB', 9990, 10, 1255, '2017-09-05 15:12:39', 85),
(11111, 'MAWB', 11100, 2, 1255, '2017-09-18 17:29:30', 95),
(12361, 'HAWB', 1250, 9, 1255, '2017-09-06 11:06:39', 86),
(25555, 'MAWB', 5200, 6, 1255, '2017-09-26 10:38:04', 100),
(52638, 'HAWB', 2546, 16, 1255, '2017-10-11 10:44:28', 105),
(66566, 'HAWB', 5500, 11, 1255, '2017-09-06 16:52:40', 88),
(222222, 'HAWB', 22200, 8, 1255, '2017-09-18 17:49:09', 96),
(978879, 'HAWB', 87800, 17, 1255, '2017-09-15 14:33:11', 93),
(2147483647, 'MAWB', 0, 20, 1255, '2017-12-01 14:00:58', 106);

-- --------------------------------------------------------

--
-- Table structure for table `cons_comm_invoice`
--

DROP TABLE IF EXISTS `cons_comm_invoice`;
CREATE TABLE IF NOT EXISTS `cons_comm_invoice` (
  `comm_inv_no` int(11) NOT NULL,
  `comm_inv_amount` int(11) NOT NULL,
  `comm_inv_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cons_docs`
--

DROP TABLE IF EXISTS `cons_docs`;
CREATE TABLE IF NOT EXISTS `cons_docs` (
  `cd_cons_id` int(11) NOT NULL,
  `cd_doc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cons_measurement`
--

DROP TABLE IF EXISTS `cons_measurement`;
CREATE TABLE IF NOT EXISTS `cons_measurement` (
  `cons_id` int(11) NOT NULL,
  `cons_weight` int(11) NOT NULL,
  `cons_height` int(11) NOT NULL,
  `cons_width` int(11) NOT NULL,
  `cons_length` int(11) NOT NULL,
  `cons_no_pkgs` int(11) NOT NULL,
  KEY `cons_id` (`cons_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cons_notes`
--

DROP TABLE IF EXISTS `cons_notes`;
CREATE TABLE IF NOT EXISTS `cons_notes` (
  `cons_note_id` int(11) NOT NULL AUTO_INCREMENT,
  `cons_id` int(11) NOT NULL,
  `cons_notes` text NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`cons_note_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cons_notes`
--

INSERT INTO `cons_notes` (`cons_note_id`, `cons_id`, `cons_notes`, `added_on`, `added_by`) VALUES
(1, 1, '<p>Left Bujumbura</p>', '2017-08-18 12:13:01', 1259),
(2, 1, '<p>Landed port of delivery</p>', '2017-08-18 15:00:41', 1259),
(3, 1, '<p>Picked</p>', '2017-08-23 11:38:00', 1259),
(4, 1, '<p>Final documents signed</p>', '2017-08-23 11:55:17', 1259),
(5, 1, '<p>Final documents signed</p>', '2017-08-23 11:57:42', 1259),
(6, 2, '<p>Test</p>', '2017-08-23 12:20:57', 1259),
(7, 2, '<p>Test</p>', '2017-08-23 12:26:43', 1259),
(8, 2, '<p>Test</p>', '2017-08-23 12:27:02', 1259),
(9, 1, '<p>Hello</p>', '2017-08-23 12:28:23', 1259),
(10, 1, '<p>Hello</p>', '2017-08-23 12:37:29', 1259),
(11, 1, '<p>Test</p>', '2017-08-23 15:21:02', 1259),
(12, 1, '<p>Test</p>', '2017-08-23 15:23:36', 1259),
(13, 1, '<p>tEST</p>', '2017-08-23 15:24:57', 1259),
(14, 1, '<p>tEST</p>', '2017-08-23 15:27:11', 1259),
(15, 2, 'Collected by Albert on 5th June', '2017-08-23 15:31:37', 1259),
(16, 2, 'Collected', '2017-08-24 12:24:09', 1259),
(17, 3, '<p>Picked from client premises in the morning today by Albert and packaged for transport at 1300HRS</p>', '2017-08-25 11:46:50', 1259),
(18, 3, '<p>Cargo inspected before leaving by Brian and left for Nakuru. Estimated duration is 3 and half hours</p>', '2017-08-25 11:50:02', 1259),
(19, 3, '<p>Cargo arrived at 1530 HRS today.</p><p>Arrival note given to the team</p>', '2017-08-25 11:51:57', 1259),
(20, 2, '', '2017-09-01 15:02:02', 1259),
(21, 2, '', '2017-09-01 15:03:13', 1259),
(22, 2, '', '2017-09-01 15:03:33', 1259),
(23, 7, '<p>Packgaged today</p>', '2017-09-01 16:01:22', 1259),
(24, 8, '<p>Loaded and packaged</p>', '2017-09-01 16:05:26', 1259),
(25, 16, '<p>Cargo already collected by the operations team<br></p>', '2017-09-01 16:55:21', 1259),
(26, 9, '<p>Test</p>', '2017-09-04 12:50:47', 1259),
(27, 15, '<p>Test</p>', '2017-09-04 14:20:07', 1259),
(28, 11, '<p>test</p>', '2017-09-06 16:58:38', 1255),
(29, 12, '<p>Sample</p>', '2017-09-07 12:07:11', 1255),
(30, 13, '<p>Test</p>', '2017-09-07 14:28:40', 1255),
(31, 14, '<p>None</p>', '2017-09-11 15:48:45', 1255),
(32, 17, '<p>Fumigated at 2 pm. Mwangi was responsible</p>', '2017-09-12 16:12:32', 1259),
(33, 15, '<p>Test again</p>', '2017-09-12 16:20:14', 1259),
(34, 4, '<p>Test sample</p>', '2017-09-19 09:06:41', 1255),
(35, 5, 'Notes here', '2017-09-20 15:21:51', 1255),
(36, 6, '<p>Cleared</p>', '2017-09-26 10:38:57', 1255),
(37, 19, 'Cleared for shipment at port of pickup', '2017-10-02 17:49:56', 1259),
(38, 18, '<p>Just sample note</p>', '2017-10-03 11:00:51', 1259),
(39, 18, '<p>Packaged</p>', '2017-10-05 17:06:15', 1255),
(40, 18, '<p>Shipment arrived today</p>', '2017-10-13 16:36:46', 1259),
(41, 20, 'COLLECTED FROM ACHL', '2017-11-29 13:21:34', 1255),
(42, 20, 'jasper requested for a mis of 1,000,000&nbsp;', '2017-12-01 13:56:37', 1255),
(43, 22, '<p>Consignment picked from Guangzhou</p>', '2017-12-05 12:27:23', 1259),
(44, 22, '<p>Testing</p>', '2017-12-07 16:13:24', 1259);

-- --------------------------------------------------------

--
-- Table structure for table `cons_transportation_details`
--

DROP TABLE IF EXISTS `cons_transportation_details`;
CREATE TABLE IF NOT EXISTS `cons_transportation_details` (
  `cons_id` int(11) NOT NULL,
  `shipper` varchar(45) DEFAULT NULL,
  `mode` varchar(45) DEFAULT NULL,
  `vessel` varchar(45) DEFAULT NULL,
  `routing` varchar(45) DEFAULT NULL,
  `freight_type` varchar(45) DEFAULT NULL COMMENT 'i.e door to door,door to port',
  KEY `ctd_cons_id_fk` (`cons_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(45) DEFAULT NULL,
  `course_description` longtext,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`) VALUES
(124, 'Network Security', 'Gives hands-on training on network security planning, design and implementation techniques');

-- --------------------------------------------------------

--
-- Table structure for table `cs_rbd_docs`
--

DROP TABLE IF EXISTS `cs_rbd_docs`;
CREATE TABLE IF NOT EXISTS `cs_rbd_docs` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_name` text NOT NULL,
  `doc_description` text NOT NULL,
  `doc_added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `doc_added_by` int(11) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_rbd_docs`
--

INSERT INTO `cs_rbd_docs` (`doc_id`, `doc_name`, `doc_description`, `doc_added_on`, `doc_added_by`) VALUES
(14, 'ALS_KCAA_605.pdf', '0', '2017-08-03 12:01:24', 0),
(15, 'ALS_KCAA_6051.pdf', '0', '2017-08-03 12:01:24', 0),
(16, 'Mbaraka_Mwinshehe_Mwaruka_History.pdf', '0', '2017-08-03 12:01:24', 0),
(17, 'Mbaraka_Mwinshehe_Mwaruka_History1.pdf', '0', '2017-08-03 12:01:24', 0),
(18, 'Livestream_Producer-20170515-182101_446.mp4', '0', '2017-08-03 12:01:24', 0),
(19, 'PageSpeed_Insights_Desktop.pdf', '0', '2017-08-03 12:01:24', 0),
(20, 'PageSpeed_Insights_Mobile.pdf', '0', '2017-08-03 12:01:24', 0),
(21, 'img6.jpg', '0', '2017-08-03 12:01:24', 0),
(22, 'IMG_20161112_101549.jpg', '0', '2017-08-03 12:01:24', 0),
(23, '2.PNG', '0', '2017-08-03 12:01:24', 0),
(24, 'companyemails.docx', '0', '2017-08-03 12:01:24', 0),
(25, 'Week_24_WEC_ICT_Service_satisfaction_-_Google_Forms.pdf', '0', '2017-08-03 12:01:24', 0),
(26, 'TIME.JPG', '0', '2017-08-03 12:01:24', 0),
(27, 'Week_24_WEC_ICT_Service_satisfaction_-_Google_Forms1.pdf', '0', '2017-08-03 12:01:24', 0),
(28, 'LIST_OF_STAFF_TO_BE_TRAINED_ON_WEBSITE_ADMINISTRATION_1.doc', '0', '2017-08-03 12:01:24', 0),
(29, 'h1.png', '0', '2017-08-03 12:01:24', 0),
(30, 'Driven_by_downloads.PNG', '0', '2017-08-03 12:01:24', 0),
(31, 'hhh.jpg', '0', '2017-08-03 12:01:24', 0),
(32, 'aaa.jpg', '0', '2017-08-03 12:01:24', 0),
(33, 'Mbaraka_Mwinshehe_Mwaruka_History2.pdf', '0', '2017-08-03 12:01:24', 0),
(34, '21.PNG', '0', '2017-08-03 12:01:24', 0),
(35, '4.PNG', '0', '2017-08-03 12:01:24', 0),
(36, '3.PNG', '0', '2017-08-03 12:01:24', 0),
(37, 'bryan.gif', '0', '2017-08-03 12:01:24', 0),
(38, 'en_Sahih_Al-Bukhari.pdf', '0', '2017-08-03 12:01:24', 0),
(39, 'Week_21_Report.pptx', '0', '2017-08-03 12:01:24', 0),
(40, 'PROJECTS.pptx', '0', '2017-08-03 12:01:24', 0),
(41, 'Week_24_WEC_ICT_Service_satisfaction_-_Google_Forms2.pdf', '0', '2017-08-03 12:01:24', 0),
(42, 'TIME1.JPG', '0', '2017-08-03 12:01:24', 0),
(43, 'TIME2.JPG', '0', '2017-08-03 12:01:24', 0),
(44, 'ICT_Performance_Criteria.docx', '0', '2017-08-03 12:01:24', 0),
(45, 'Suggested_hosts_available_on_the_market.docx', '0', '2017-08-03 12:01:24', 0),
(46, 'CS_RBD.docx', '0', '2017-08-03 12:01:24', 0),
(47, 'ACCOUNTS_MANUAL.docx', '0', '2017-08-03 12:01:24', 0),
(48, 'shipl.jpg', '0', '2017-08-03 12:01:24', 0),
(49, 'shipl1.jpg', '0', '2017-08-03 12:01:24', 0),
(50, 'shipl2.jpg', '0', '2017-08-03 12:01:24', 0),
(51, 'shipl3.jpg', '0', '2017-08-03 12:01:24', 0),
(52, 'shipl4.jpg', '0', '2017-08-03 12:01:24', 0),
(53, 'shipl5.jpg', '0', '2017-08-03 12:01:24', 0),
(54, 'shipl6.jpg', '0', '2017-08-03 12:01:24', 0),
(55, 'shipl7.jpg', '0', '2017-08-03 12:01:24', 0),
(56, 'shipl8.jpg', '0', '2017-08-03 12:01:24', 0),
(57, 'shipl9.jpg', '0', '2017-08-03 12:01:24', 0),
(58, 'shipl12.jpg', 'National ID', '2017-08-03 12:10:00', 0),
(59, 'shipl13.jpg', 'National ID', '2017-08-03 12:14:06', 0),
(60, 'shipl14.jpg', 'National ID', '2017-08-03 12:14:59', 0),
(61, 'shipl15.jpg', 'National ID', '2017-08-03 12:15:40', 0),
(62, 'peslogo.png', 'WEC LOGO', '2017-08-29 10:16:20', 0),
(63, 'peslogo1.png', 'PES LOGO', '2017-08-29 10:20:07', 0),
(83, 'Feminism_v__Femininity__the_Threat_to_Womans_Identity___www_cormacburke_or.pdf', 'Nanana', '2017-09-05 15:04:43', 0),
(84, 'Kalenjin_Dowry_Ceremony__.pdf', 'Hello', '2017-09-05 15:06:12', 0),
(85, 'MARRIAGE_AND_THE_FAMILY_IN_AFRICA__Position_Papers,_April_1988___www_cormacburke_or.pdf', 'MARRIAGE AND THE FAMILY IN AFRICA', '2017-09-05 15:12:39', 0),
(86, '12_Habits_Of_Genuine_People_-_Forbes.pdf', '.', '2017-09-06 11:06:39', 0),
(87, 'Why_Women_Are_Smarter_Than_Men_-_Forbes.pdf', 'None', '2017-09-06 12:05:56', 0),
(88, '12_Habits_Of_Genuine_People_-_Forbes1.pdf', '.', '2017-09-06 16:52:40', 0),
(89, '12_Habits_Of_Genuine_People_-_Forbes2.pdf', 'None', '2017-09-07 12:07:39', 0),
(90, '12_Habits_Of_Genuine_People_-_Forbes3.pdf', '.', '2017-09-07 14:29:00', 0),
(91, 'heading-layouts.jpg', 'None', '2017-09-11 15:44:47', 0),
(92, 'heading-layouts1.jpg', 'N', '2017-09-12 16:18:17', 0),
(93, 'ag.pdf', 'm', '2017-09-15 14:33:11', 0),
(94, 'apr_6_skills_path.pdf', '.', '2017-09-18 15:10:08', 0),
(95, 'F__MATH.pdf', '.', '2017-09-18 17:29:30', 0),
(96, 'F__MATH1.pdf', '0', '2017-09-18 17:49:09', 0),
(97, '1501572278_2_Installation.pdf', '8\r\n', '2017-09-18 17:50:41', 0),
(98, 'IMG_20161112_1015491.jpg', 'N', '2017-09-19 09:06:11', 0),
(99, 'bridge.jpg', ' ', '2017-09-20 15:21:41', 0),
(100, 'savings-interest-calculator.xlsx', ' ', '2017-09-26 10:38:04', 0),
(101, 'pdf.pdf', ' ', '2017-09-26 10:38:37', 0),
(102, 'pdf1.pdf', '', '2017-09-26 16:36:15', 0),
(103, 'MartinLutherKing.jpg', '', '2017-09-26 16:37:16', 0),
(104, 'Koala.jpg', 'R', '2017-10-05 17:08:55', 0),
(105, 'Lighthouse.jpg', '', '2017-10-11 10:44:28', 0),
(106, '12_Habits_Of_Genuine_People_-_Forbes1.pdf', '', '2017-12-01 14:00:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_rates`
--

DROP TABLE IF EXISTS `customer_rates`;
CREATE TABLE IF NOT EXISTS `customer_rates` (
  `cust_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `cust_rate` int(11) DEFAULT NULL,
  UNIQUE KEY `cust_service_uq` (`cust_id`,`service_id`),
  KEY `cr_cust_id_fk_idx` (`cust_id`),
  KEY `cr_service_id_fk_idx` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cust_sess_notes`
--

DROP TABLE IF EXISTS `cust_sess_notes`;
CREATE TABLE IF NOT EXISTS `cust_sess_notes` (
  `cust_id` int(11) NOT NULL,
  `pcn_notes` text NOT NULL,
  `pcn_next_meeting` datetime DEFAULT NULL,
  `pcn_added_on` datetime NOT NULL,
  `pcn_added_by` int(11) NOT NULL,
  KEY `csn_added_by_fk_idx` (`pcn_added_by`),
  KEY `cust_id_fk` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(45) DEFAULT NULL,
  `dept_desc` varchar(45) DEFAULT NULL,
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`, `dept_desc`, `added_on`) VALUES
(214, 'Human Resources', NULL, '2017-06-06 00:00:00'),
(215, 'Accounts', NULL, '2017-06-06 00:00:00'),
(216, 'Management', NULL, '2017-06-06 00:00:00'),
(217, 'Customer Service', NULL, '2017-06-06 16:25:18'),
(218, 'RBD', 'Sales (Research & Business Development', '2017-06-06 16:25:33'),
(219, 'Operations', 'Air Freight', '2017-06-06 16:25:43'),
(220, 'Sea Freight', NULL, '2017-06-06 16:25:51'),
(221, 'ICT', NULL, '2017-06-06 16:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `staff_wec_emp_no` int(11) NOT NULL AUTO_INCREMENT,
  `staff_fname` varchar(45) NOT NULL,
  `staff_sname` varchar(45) NOT NULL,
  `staff_mname` varchar(45) DEFAULT NULL,
  `staff_tel` varchar(45) NOT NULL,
  `staff_email` varchar(45) NOT NULL,
  `staff_country` varchar(45) DEFAULT 'KENYA',
  `staff_county` varchar(45) NOT NULL,
  `staff_residence` varchar(45) NOT NULL,
  `staff_nid` varchar(45) NOT NULL,
  `staff_photo` varchar(45) DEFAULT NULL,
  `staff_nhif` varchar(45) DEFAULT NULL,
  `staff_nssf` varchar(45) DEFAULT NULL,
  `staff_kra_pin` varchar(45) DEFAULT NULL,
  `staff_position` varchar(45) NOT NULL,
  `staff_start_date` varchar(45) NOT NULL,
  `staff_end_date` varchar(45) DEFAULT NULL,
  `staff_emp_type_id` int(11) NOT NULL,
  `staff_dob` date NOT NULL,
  `staff_gender` varchar(6) NOT NULL,
  `emp_marital_status` varchar(45) NOT NULL,
  `emp_no_of_dependants` int(11) DEFAULT NULL,
  `staff_level` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `is_invoice_approver` int(1) NOT NULL DEFAULT '0',
  `staff_termination_id` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`staff_wec_emp_no`),
  UNIQUE KEY `staff_wec_emp_no_UNIQUE` (`staff_wec_emp_no`),
  UNIQUE KEY `staff_email` (`staff_email`),
  UNIQUE KEY `staff_tel` (`staff_tel`),
  UNIQUE KEY `staff_nid` (`staff_nid`),
  UNIQUE KEY `staff_nhif` (`staff_nhif`),
  UNIQUE KEY `staff_nssf` (`staff_nssf`),
  UNIQUE KEY `staff_kra_pin` (`staff_kra_pin`),
  UNIQUE KEY `staff_termination_id` (`staff_termination_id`),
  KEY `employee_fk_1` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1260 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`staff_wec_emp_no`, `staff_fname`, `staff_sname`, `staff_mname`, `staff_tel`, `staff_email`, `staff_country`, `staff_county`, `staff_residence`, `staff_nid`, `staff_photo`, `staff_nhif`, `staff_nssf`, `staff_kra_pin`, `staff_position`, `staff_start_date`, `staff_end_date`, `staff_emp_type_id`, `staff_dob`, `staff_gender`, `emp_marital_status`, `emp_no_of_dependants`, `staff_level`, `dept_id`, `is_invoice_approver`, `staff_termination_id`, `active`) VALUES
(1254, 'Wambulwa', 'Ayub', NULL, '0704051656', 'wambulwaayub@gmail.com', 'KENYA', 'Nairobi', 'Ruaka', '30364852', NULL, NULL, NULL, NULL, '', '', NULL, 0, '0000-00-00', '', '', NULL, 1, 214, 1, NULL, 1),
(1255, 'Ayub', 'Sikuku', NULL, '0704051657', 'ayubwambulwa@willfreight.co.ke', 'KENYA', 'Nairobi', 'Ruaka', '30364853', NULL, NULL, NULL, NULL, '', '', NULL, 0, '0000-00-00', '', '', NULL, 4, 215, 0, NULL, 1),
(1258, 'Veronica', 'Mueni', NULL, '0704051658', 'veronicamueni@willfreight.co.ke', 'KENYA', 'Nairobi', 'Ruaka', '30364854', NULL, NULL, NULL, NULL, '', '', NULL, 0, '0000-00-00', '', '', NULL, 2, 218, 0, NULL, 1),
(1259, 'Mirriam', 'Ndunge', NULL, '0704051659', 'mirriamndunge@willfreight.co.ke', 'KENYA', 'Nairobi', 'Ruaka', '30364855', NULL, NULL, NULL, NULL, '', '', NULL, 0, '0000-00-00', '', '', NULL, 3, 217, 0, NULL, 1);

--
-- Triggers `employee`
--
DROP TRIGGER IF EXISTS `staff_login_insert`;
DELIMITER $$
CREATE TRIGGER `staff_login_insert` AFTER INSERT ON `employee` FOR EACH ROW INSERT INTO staff_login(staff_id,staff_email,password) VALUES(new.staff_wec_emp_no, new.staff_email,md5(123))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employment_type`
--

DROP TABLE IF EXISTS `employment_type`;
CREATE TABLE IF NOT EXISTS `employment_type` (
  `et_id` int(11) NOT NULL AUTO_INCREMENT,
  `et_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`et_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employment_type`
--

INSERT INTO `employment_type` (`et_id`, `et_name`) VALUES
(1, 'Contract');

-- --------------------------------------------------------

--
-- Table structure for table `emp_docs`
--

DROP TABLE IF EXISTS `emp_docs`;
CREATE TABLE IF NOT EXISTS `emp_docs` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `doc_path` varchar(200) NOT NULL,
  `doc_type` varchar(45) DEFAULT NULL,
  `doc_notes` varchar(45) DEFAULT NULL,
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`doc_id`),
  KEY `emp_id_fk_idx` (`emp_id`),
  KEY `emp_docs_added_by_fk_idx` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_docs`
--

INSERT INTO `emp_docs` (`doc_id`, `emp_id`, `doc_path`, `doc_type`, `doc_notes`, `added_on`, `added_by`) VALUES
(12, 1254, 'cv1254.pdf', 'CV', 'Curriculum vitae', '2017-04-27 11:15:28', 1254);

-- --------------------------------------------------------

--
-- Table structure for table `emp_education`
--

DROP TABLE IF EXISTS `emp_education`;
CREATE TABLE IF NOT EXISTS `emp_education` (
  `emp_id` int(11) NOT NULL,
  `ee_institution` varchar(45) DEFAULT NULL,
  `ee_graduation_year` varchar(45) DEFAULT NULL,
  `ee_qualification` varchar(45) DEFAULT NULL,
  `ee_desc_qualification` varchar(100) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  KEY `ee_emp_id_fk_idx` (`emp_id`),
  KEY `ee_added_by_fk_idx` (`added_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_education`
--

INSERT INTO `emp_education` (`emp_id`, `ee_institution`, `ee_graduation_year`, `ee_qualification`, `ee_desc_qualification`, `added_by`, `added_on`) VALUES
(1254, 'Strathmore University', '2017', 'Bachelors', 'Scored 2nd upper', 1254, '2017-04-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave_applications`
--

DROP TABLE IF EXISTS `emp_leave_applications`;
CREATE TABLE IF NOT EXISTS `emp_leave_applications` (
  `ela_id` int(11) NOT NULL AUTO_INCREMENT,
  `lt_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `ela_start_date` date NOT NULL,
  `ela_end_date` date NOT NULL,
  `ela_approver_1` int(11) DEFAULT NULL,
  `ela_approver_2` int(11) DEFAULT NULL,
  `ela_approver_3` int(11) DEFAULT NULL,
  `ela_added_on` datetime NOT NULL,
  PRIMARY KEY (`ela_id`),
  KEY `ela_lt_id_idx` (`lt_id`),
  KEY `ela_emp_id_fk_idx` (`emp_id`),
  KEY `ela_approver_1_fk_idx` (`ela_approver_1`),
  KEY `ela_approver_2_fk_idx` (`ela_approver_2`),
  KEY `ela_approver_3_fk_idx` (`ela_approver_3`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_leave_applications`
--

INSERT INTO `emp_leave_applications` (`ela_id`, `lt_id`, `emp_id`, `ela_start_date`, `ela_end_date`, `ela_approver_1`, `ela_approver_2`, `ela_approver_3`, `ela_added_on`) VALUES
(2, 123, 1255, '2017-05-01', '2017-05-04', 1254, 1255, 1254, '2017-04-27 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `emp_nextofkin`
--

DROP TABLE IF EXISTS `emp_nextofkin`;
CREATE TABLE IF NOT EXISTS `emp_nextofkin` (
  `nok_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `nok_fname` varchar(45) DEFAULT NULL,
  `nok_sname` varchar(45) DEFAULT NULL,
  `nok_mname` varchar(45) DEFAULT NULL,
  `nok_relation` varchar(45) DEFAULT NULL,
  `nok_phone` varchar(45) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`nok_id`),
  UNIQUE KEY `emp_id_UNIQUE` (`emp_id`),
  KEY `emp_nok_added_by_fk_idx` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_nextofkin`
--

INSERT INTO `emp_nextofkin` (`nok_id`, `emp_id`, `nok_fname`, `nok_sname`, `nok_mname`, `nok_relation`, `nok_phone`, `added_on`, `added_by`) VALUES
(12, 1254, 'Olive', 'Mwikali', NULL, 'Spouse', '0706336222', '2017-04-06 00:00:00', 1254);

-- --------------------------------------------------------

--
-- Table structure for table `emp_salary`
--

DROP TABLE IF EXISTS `emp_salary`;
CREATE TABLE IF NOT EXISTS `emp_salary` (
  `emp_id` int(11) NOT NULL,
  `es_starting_sal` int(11) DEFAULT NULL,
  `es_current_sal` int(11) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  KEY `es_emp_id_fk_idx` (`emp_id`),
  KEY `es_added_by_fk_idx` (`added_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_salary`
--

INSERT INTO `emp_salary` (`emp_id`, `es_starting_sal`, `es_current_sal`, `added_on`, `added_by`) VALUES
(1254, 50000, 50000, '2017-04-25 00:00:00', 1254);

-- --------------------------------------------------------

--
-- Table structure for table `emp_training`
--

DROP TABLE IF EXISTS `emp_training`;
CREATE TABLE IF NOT EXISTS `emp_training` (
  `emp_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_start_date` date DEFAULT NULL,
  `course_end_date` date DEFAULT NULL,
  `et_institution` varchar(45) DEFAULT NULL,
  `et_notes` longtext,
  KEY `et_course_id_fk_idx` (`course_id`),
  KEY `et_emp_id_fk_idx` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_training`
--

INSERT INTO `emp_training` (`emp_id`, `course_id`, `course_start_date`, `course_end_date`, `et_institution`, `et_notes`) VALUES
(1254, 124, '2017-05-31', '2017-06-30', 'Strathmore University', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `import_declaration_form`
--

DROP TABLE IF EXISTS `import_declaration_form`;
CREATE TABLE IF NOT EXISTS `import_declaration_form` (
  `form_id` varchar(15) NOT NULL,
  `form_directory` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `idf_image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `cons_id` int(11) NOT NULL,
  `inv_date` date NOT NULL,
  `inv_due_date` date NOT NULL,
  `inv_currency` varchar(10) NOT NULL DEFAULT 'KES',
  `amount_paid` int(11) NOT NULL DEFAULT '0',
  `service_type` varchar(100) NOT NULL,
  `regime` varchar(100) DEFAULT NULL,
  `urgency` varchar(100) DEFAULT NULL,
  `shipper` varchar(100) DEFAULT NULL,
  `consignee` varchar(100) DEFAULT NULL,
  `your_ref` varchar(100) DEFAULT NULL,
  `our_ref` varchar(100) DEFAULT NULL,
  `goods_desc` varchar(100) DEFAULT NULL,
  `shipment` int(11) NOT NULL,
  `vessel_no` varchar(100) DEFAULT NULL,
  `mawb` int(100) DEFAULT NULL,
  `origin` varchar(100) DEFAULT NULL,
  `etd` date DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `eta` date DEFAULT NULL,
  `hawb` int(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sent_to_cs` int(1) NOT NULL DEFAULT '0',
  `inv_sent` int(1) NOT NULL DEFAULT '0',
  `inv_delivered` int(11) NOT NULL DEFAULT '0',
  `approvals` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`),
  UNIQUE KEY `shipment` (`shipment`),
  KEY `inv_cust_id_fk` (`cust_id`),
  KEY `inv_created_by_fk` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `cust_id`, `cons_id`, `inv_date`, `inv_due_date`, `inv_currency`, `amount_paid`, `service_type`, `regime`, `urgency`, `shipper`, `consignee`, `your_ref`, `our_ref`, `goods_desc`, `shipment`, `vessel_no`, `mawb`, `origin`, `etd`, `destination`, `eta`, `hawb`, `created_at`, `sent_to_cs`, `inv_sent`, `inv_delivered`, `approvals`, `created_by`) VALUES
(66, 2193, 2, '2017-10-31', '2017-11-09', 'KES', 5000, 'Road Local', 'Home use', 'Normal', 'Avmax', 'Ayub', 'Ayub', 'Tuma', 'Plane engine', 1, '5487', 0, 'LA', NULL, 'NBO', NULL, 0, '2017-10-31 15:02:15', 1, 1, 1, 1, 1254),
(67, 2193, 0, '2017-10-31', '2017-10-31', 'KES', 0, 'Seafreight Export', 'Home use', 'Normal', 'Avmax', 'Peter Njeri', 'Ayub', 'Tuma', 'Plastic Cups', 2, '784596658', 0, 'LA', NULL, 'NBO', NULL, 0, '2017-10-31 15:16:57', 1, 0, 0, 0, 1254),
(68, 2194, 0, '2017-10-31', '2017-08-25', 'KES', 0, 'Road Local', 'Home use', 'Normal', 'KenKen', 'Ayub', 'Ayub', 'Tuma', 'Phones', 3, '12344', 0, 'LA', NULL, 'NBO', NULL, 0, '2017-10-31 16:14:22', 0, 0, 0, 0, 1254),
(69, 2195, 0, '2017-10-31', '2017-10-31', 'KES', 0, 'Road Local', 'Home use', 'Urgent', 'KenKen', 'Omenda', 'Ayub', 'Tuma', 'Transport of iPhones to Nakuru from Nairobi', 4, '6736736', 0, 'LA', NULL, 'NBO', NULL, 0, '2017-10-31 16:20:00', 1, 0, 0, 0, 1254),
(70, 2195, 0, '2017-10-31', '2017-08-29', 'KES', 0, 'Road Local', 'Home use', 'Urgent', 'KenKen', 'Omenda', 'Ayub', 'Tuma', 'Transport of iPhones to Nakuru from Nairobi', 6, '6736736', 0, 'LA', NULL, 'NBO', NULL, 0, '2017-10-31 17:03:42', 1, 1, 0, 1, 1254),
(71, 2195, 0, '2017-10-31', '2017-08-29', 'KES', 0, 'Road Local', 'Home use', 'Urgent', 'KenKen', 'Omenda', 'Ayub', 'Tuma', 'Transport of iPhones to Nakuru from Nairobi', 5, '6736736', 0, 'LA', NULL, 'NBO', NULL, 0, '2017-10-31 17:48:12', 1, 1, 0, 1, 1254),
(72, 2195, 0, '2017-10-31', '2017-10-31', 'KES', 0, 'Road Local', 'Home use', 'Urgent', 'KenKen', 'Omenda', 'Ayub', 'Tuma', 'Transport of iPhones to Nakuru from Nairobi', 7, '6736736', 0, 'LA', NULL, 'NBO', NULL, 0, '2017-10-31 17:51:17', 0, 0, 0, 0, 1254),
(73, 2195, 0, '2017-11-01', '2017-11-01', 'KES', 5500, 'Airfreight Import', 'Home use', 'Urgent', 'Avmax', 'Omenda', 'Ayub', 'Tuma', 'Transport of iPhones to Nakuru from Nairobi', 8, '12344', 0, 'LA', '2017-08-29', 'NBO', '2017-08-29', 0, '2017-11-01 09:56:24', 0, 0, 0, 0, 1254),
(74, 2195, 0, '2017-11-02', '2017-11-02', 'KES', 0, 'Seafreight Import', 'Home use', 'Normal', 'Avmax', 'oedna', 'Ayub', 'Tuma', 'Ferrari', 16, '784', 0, 'LA', '2017-11-02', 'NBO', '2017-11-02', 0, '2017-11-02 11:58:41', 1, 1, 0, 1, 1254),
(75, 2194, 0, '2017-11-09', '2017-11-09', 'KES', 0, 'Airfreight Import', 'Home use', 'Urgent', 'Avmax', 'Peter Njeru', 'Ayub', 'Tuma', 'Plane engine', 17, '96966', 0, 'LA', '2017-09-12', 'NBO', '2017-09-12', 0, '2017-11-09 15:14:02', 0, 0, 0, 1, 1254),
(76, 2201, 0, '2017-11-27', '2017-12-11', 'KES', 0, 'Road Import', 'Home use', 'AOG', 'Avmax', 'Ayub', 'Salma', 'Phoebe', 'Car shipping from German to Mombasa', 19, '85859', 3652577, 'German', '2017-11-27', 'Mombasa', '2018-01-15', 8897777, '2017-11-27 11:08:57', 1, 0, 0, 0, 1254),
(77, 2194, 0, '2017-12-19', '2017-12-26', '', 0, 'Seafreight Import', 'Home use', 'Normal', 'Avmax', 'Ayub', 'Salma', 'Phoebe', 'Transport of iPhones to China from Mombasa', 12, '12344', 36525778, 'German', '2017-08-29', 'Mombasa', '2017-08-29', 88977779, '2017-12-19 17:41:31', 0, 0, 0, 1, 1254),
(78, 2193, 0, '2017-12-20', '2018-01-03', '', 0, 'Airfreight Import', 'Home use', 'AOG', 'Vector Aviation', 'Vector Aviation', 'Salma', 'Phoebe', 'A/C Engine', 20, '01245', 36525779, 'German', '2017-12-20', 'Mombasa', '2017-12-20', 88977780, '2017-12-20 11:01:44', 1, 0, 0, 1, 1254);

--
-- Triggers `invoice`
--
DROP TRIGGER IF EXISTS `mark_as_invoiced`;
DELIMITER $$
CREATE TRIGGER `mark_as_invoiced` AFTER INSERT ON `invoice` FOR EACH ROW UPDATE consignment SET consignment.cons_is_invoiced=1 where consignment.cons_is_invoiced=0 AND NEW.shipment=consignment.cons_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_approval`
--

DROP TABLE IF EXISTS `invoice_approval`;
CREATE TABLE IF NOT EXISTS `invoice_approval` (
  `invoice_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `approval_status` int(1) NOT NULL,
  `approved_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comments` text,
  UNIQUE KEY `inv_app_uq` (`invoice_id`,`staff_id`,`approval_status`,`approved_at`),
  KEY `inv_app_staff_id_fk` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_approval`
--

INSERT INTO `invoice_approval` (`invoice_id`, `staff_id`, `approval_status`, `approved_at`, `comments`) VALUES
(66, 1254, 1, '2017-11-01 16:23:32', ''),
(67, 1254, 1, '2017-11-01 17:15:24', ''),
(69, 1254, 0, '2017-11-15 16:59:12', '<p>Test</p><p>Hello</p><p>Come</p>'),
(69, 1254, 1, '2017-11-15 17:06:14', ''),
(70, 1254, 1, '2017-12-20 10:49:49', ''),
(71, 1254, 1, '2017-12-20 10:50:00', ''),
(74, 1254, 1, '2017-12-20 10:49:55', ''),
(75, 1254, 1, '2017-12-20 10:48:37', ''),
(76, 1254, 1, '2017-11-27 11:09:23', ''),
(77, 1254, 1, '2017-12-20 10:48:16', ''),
(78, 1254, 1, '2017-12-20 11:02:00', '');

--
-- Triggers `invoice_approval`
--
DROP TRIGGER IF EXISTS `insert_approvals_count`;
DELIMITER $$
CREATE TRIGGER `insert_approvals_count` AFTER INSERT ON `invoice_approval` FOR EACH ROW UPDATE invoice SET invoice.approvals=invoice.approvals+1 WHERE NEW.invoice_id=invoice.invoice_id AND NEW.approval_status=1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_charges`
--

DROP TABLE IF EXISTS `invoice_charges`;
CREATE TABLE IF NOT EXISTS `invoice_charges` (
  `invoice_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  UNIQUE KEY `invoice_charges_uq_cons` (`invoice_id`,`service_id`),
  KEY `invoice_charges_serv_id_fk` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_charges`
--

INSERT INTO `invoice_charges` (`invoice_id`, `service_id`, `amount`) VALUES
(66, 19, 5800),
(66, 20, 2500),
(67, 19, 3500),
(67, 21, 2100),
(67, 25, 1000),
(67, 26, 1000),
(69, 20, 8500),
(70, 21, 2200),
(71, 19, 2500),
(71, 20, 5000),
(71, 45, 2540),
(73, 20, 3500),
(73, 21, 2000),
(74, 19, 2000),
(74, 20, 2500),
(74, 21, 2200),
(75, 19, 8520),
(75, 20, 3600),
(75, 32, 2500),
(76, 19, 2500),
(76, 20, 25000),
(76, 22, 3000000),
(76, 23, 6500),
(76, 32, 25000),
(77, 19, 8500),
(77, 20, 3650),
(78, 21, 5200);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_dispatch_from_acc`
--

DROP TABLE IF EXISTS `invoice_dispatch_from_acc`;
CREATE TABLE IF NOT EXISTS `invoice_dispatch_from_acc` (
  `id_invoice_id` int(11) NOT NULL,
  `dispatched_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dispatched_by` int(11) NOT NULL,
  KEY `id_invoice_id_fk` (`id_invoice_id`),
  KEY `dispatched_by_fk` (`dispatched_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_dispatch_from_acc`
--

INSERT INTO `invoice_dispatch_from_acc` (`id_invoice_id`, `dispatched_at`, `dispatched_by`) VALUES
(67, '2017-11-07 11:53:11', 1254),
(66, '2017-11-08 15:50:15', 1254),
(69, '2017-11-15 17:06:36', 1254),
(76, '2017-11-27 11:09:33', 1254),
(70, '2017-12-20 10:50:39', 1254),
(71, '2017-12-20 10:50:54', 1254),
(74, '2017-12-20 10:59:00', 1254),
(78, '2017-12-20 11:02:09', 1254);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_dispatch_to_client`
--

DROP TABLE IF EXISTS `invoice_dispatch_to_client`;
CREATE TABLE IF NOT EXISTS `invoice_dispatch_to_client` (
  `idtc_invoice_id` int(11) NOT NULL,
  `dispatched_by` varchar(100) NOT NULL,
  `dispatch_notes` text NOT NULL,
  `recorded_by` int(11) NOT NULL,
  UNIQUE KEY `idtc_invoice_id` (`idtc_invoice_id`),
  KEY `idtc_recorded_by_fk` (`recorded_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_dispatch_to_client`
--

INSERT INTO `invoice_dispatch_to_client` (`idtc_invoice_id`, `dispatched_by`, `dispatch_notes`, `recorded_by`) VALUES
(66, 'Mwangi', 'Test note\r\n', 1259),
(70, 'Mirriam Ndunge (1259)', 'Call client on +254704051656 when there', 1259),
(71, 'Mirriam Ndunge (1259)', 'Test', 1259),
(74, 'Veronica Mueni (1258)', 'Test', 1259);

--
-- Triggers `invoice_dispatch_to_client`
--
DROP TRIGGER IF EXISTS `mark_invoice_as_sent`;
DELIMITER $$
CREATE TRIGGER `mark_invoice_as_sent` AFTER INSERT ON `invoice_dispatch_to_client` FOR EACH ROW UPDATE invoice SET invoice.inv_sent=1 WHERE invoice.inv_sent=0 AND invoice.invoice_id=NEW.idtc_invoice_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

DROP TABLE IF EXISTS `invoice_payments`;
CREATE TABLE IF NOT EXISTS `invoice_payments` (
  `transaction_id` int(100) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `date_paid` date NOT NULL,
  `recorded_by` int(11) NOT NULL,
  `recorded_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`),
  KEY `inv_payment_invoice_id_fk` (`invoice_id`),
  KEY `inv_p_recorded_by_fk` (`recorded_by`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_payments`
--

INSERT INTO `invoice_payments` (`transaction_id`, `invoice_id`, `amount_paid`, `date_paid`, `recorded_by`, `recorded_at`) VALUES
(1, 73, 5500, '2017-11-01', 1254, '2017-11-01 10:29:21'),
(3, 66, 5000, '2017-12-09', 1254, '2017-11-09 14:21:58');

--
-- Triggers `invoice_payments`
--
DROP TRIGGER IF EXISTS `update_amount_due`;
DELIMITER $$
CREATE TRIGGER `update_amount_due` AFTER INSERT ON `invoice_payments` FOR EACH ROW UPDATE invoice SET invoice.amount_paid=invoice.amount_paid+new.amount_paid WHERE invoice.invoice_id=new.invoice_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
  `cust_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_prospect` int(1) NOT NULL DEFAULT '0',
  `is_customer` int(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `cust_id_UNIQUE` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`cust_id`, `added_on`, `is_prospect`, `is_customer`) VALUES
(2195, '2017-07-06 16:52:06', 1, 1),
(2197, '2017-09-01 16:39:00', 1, 1);

--
-- Triggers `leads`
--
DROP TRIGGER IF EXISTS `convert_lead_to_customer`;
DELIMITER $$
CREATE TRIGGER `convert_lead_to_customer` AFTER UPDATE ON `leads` FOR EACH ROW UPDATE clients SET clients.is_customer=new.is_customer WHERE clients.cust_id=new.cust_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

DROP TABLE IF EXISTS `leave_types`;
CREATE TABLE IF NOT EXISTS `leave_types` (
  `lt_id` int(11) NOT NULL AUTO_INCREMENT,
  `lt_name` varchar(45) DEFAULT NULL,
  `lt_description` varchar(45) DEFAULT NULL,
  `lt_max_days` int(11) DEFAULT NULL,
  `lt_min_qualificatication` int(11) DEFAULT NULL,
  PRIMARY KEY (`lt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`lt_id`, `lt_name`, `lt_description`, `lt_max_days`, `lt_min_qualificatication`) VALUES
(123, 'Annual leave', 'Awarded annually', 21, 3),
(124, 'Maternity leave', 'Awarded to maternity female employees', 56, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marketing_campaigns`
--

DROP TABLE IF EXISTS `marketing_campaigns`;
CREATE TABLE IF NOT EXISTS `marketing_campaigns` (
  `campaign_id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_name` varchar(100) NOT NULL,
  `campaign_beneficiary` varchar(100) NOT NULL,
  `mc_id` int(11) NOT NULL,
  `campaign_budget` int(11) NOT NULL,
  `campaign_start_date` date NOT NULL,
  `campaign_end_date` date NOT NULL,
  `campaign_goals` text NOT NULL,
  `campaign_added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `campaign_added_by` int(11) NOT NULL,
  `campaign_started` int(11) NOT NULL DEFAULT '0',
  `campaign_stopped` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marketing_channels`
--

DROP TABLE IF EXISTS `marketing_channels`;
CREATE TABLE IF NOT EXISTS `marketing_channels` (
  `ch_id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_name` varchar(45) NOT NULL,
  `ch_notes` longtext,
  PRIMARY KEY (`ch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marketing_channels`
--

INSERT INTO `marketing_channels` (`ch_id`, `ch_name`, `ch_notes`) VALUES
(214, 'Newsletters', 'Sending monthly newsletters to customers'),
(215, 'Facebook Ads', 'Running Facebook campaigns'),
(216, 'Google Ads', 'Running Google Ad campaigns e.g. Paid Search, Ad Words'),
(217, 'Exhibitions', 'Going to trade exhibitions and showcasing our services and meeting with prospects'),
(218, 'Willfreight Website', 'Contact us and live-chat support from the Willfreight Website'),
(219, 'Client Visit', 'One-on-one visiting of clients. This in turn makes leads for us and gives us an opportunity to showcase our services one-on-one'),
(220, 'Marketing Banners & Business Cards', 'This involves printing Willfreight banners on TALC Building, our Fleet and cars and T-Shirts worn by staff'),
(221, 'Newspapers & Maganzines', 'Adverts run on Daily Newspapers and magazines'),
(222, 'Referral', 'Existing clients refer other potential clients to us');

-- --------------------------------------------------------

--
-- Table structure for table `prospects`
--

DROP TABLE IF EXISTS `prospects`;
CREATE TABLE IF NOT EXISTS `prospects` (
  `cust_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_customer` int(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `cust_id_UNIQUE` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prospects`
--

INSERT INTO `prospects` (`cust_id`, `added_on`, `is_customer`) VALUES
(2194, '2017-07-06 15:48:42', 1),
(2196, '2017-07-17 11:02:50', 0);

--
-- Triggers `prospects`
--
DROP TRIGGER IF EXISTS `convert_prospect_to_customer`;
DELIMITER $$
CREATE TRIGGER `convert_prospect_to_customer` AFTER UPDATE ON `prospects` FOR EACH ROW UPDATE clients SET clients.is_customer=new.is_customer WHERE clients.cust_id=new.cust_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `quote_air`
--

DROP TABLE IF EXISTS `quote_air`;
CREATE TABLE IF NOT EXISTS `quote_air` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_date` datetime DEFAULT NULL,
  `quote_regime` varchar(45) DEFAULT NULL,
  `quote_origin` varchar(45) DEFAULT NULL,
  `quote_destination` varchar(45) DEFAULT NULL,
  `quote_import_duty` int(11) DEFAULT NULL,
  `quote_rdl` int(11) DEFAULT NULL,
  `quote_vat` int(11) DEFAULT NULL,
  `quote_idf` int(11) DEFAULT NULL,
  `quote_kcaa` int(11) DEFAULT NULL,
  `quote_kebs` int(11) DEFAULT NULL,
  `quote_marine_insurance` int(11) DEFAULT NULL,
  `quote_kaa_levy` int(11) DEFAULT NULL,
  `quote_break_bulk_fee` int(11) DEFAULT NULL,
  `quote_handling_charges` int(11) DEFAULT NULL,
  `quote_dgr_handling` int(11) DEFAULT NULL,
  `quote_storage_charges` int(11) DEFAULT NULL,
  `quote_customes_and_port_doc` int(11) DEFAULT NULL,
  `quote_kcaa_processing` int(11) DEFAULT NULL,
  `quote_ucr_processing` int(11) DEFAULT NULL,
  `quote_wec_handling` int(11) DEFAULT NULL,
  `quote_cargo_delivery` int(11) DEFAULT NULL,
  `quote_agency_fee` int(11) DEFAULT NULL,
  `quote_added_by` int(11) DEFAULT NULL,
  `quote_converted_to_invoice` int(1) DEFAULT NULL,
  `quote_type` int(2) DEFAULT NULL,
  `quote_item_type` varchar(45) DEFAULT NULL,
  `quote_sent` int(1) DEFAULT NULL,
  `quote_status` int(11) DEFAULT NULL,
  `quote_notes` longtext,
  PRIMARY KEY (`quote_id`),
  UNIQUE KEY `quote_id_UNIQUE` (`quote_id`),
  KEY `quote_air_quote_added_by_fk_idx` (`quote_added_by`),
  KEY `quote_air_quote_type_fk_idx` (`quote_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quote_sea`
--

DROP TABLE IF EXISTS `quote_sea`;
CREATE TABLE IF NOT EXISTS `quote_sea` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_date` datetime DEFAULT NULL,
  `quote_regime` varchar(45) DEFAULT NULL,
  `quote_origin` varchar(45) DEFAULT NULL,
  `quote_destination` varchar(45) DEFAULT NULL,
  `quote_import_duty` int(11) DEFAULT NULL,
  `quote_rdl` int(11) DEFAULT NULL,
  `quote_vat` int(11) DEFAULT NULL,
  `quote_idf` int(11) DEFAULT NULL,
  `quote_kcaa` int(11) DEFAULT NULL,
  `quote_kebs` int(11) DEFAULT NULL,
  `quote_marine_insurance` int(11) DEFAULT NULL,
  `quote_kaa_levy` int(11) DEFAULT NULL,
  `quote_break_bulk_fee` int(11) DEFAULT NULL,
  `quote_handling_charges` int(11) DEFAULT NULL,
  `quote_dgr_handling` int(11) DEFAULT NULL,
  `quote_storage_charges` int(11) DEFAULT NULL,
  `quote_customes_and_port_doc` int(11) DEFAULT NULL,
  `quote_kcaa_processing` int(11) DEFAULT NULL,
  `quote_ucr_processing` int(11) DEFAULT NULL,
  `quote_wec_handling` int(11) DEFAULT NULL,
  `quote_cargo_delivery` int(11) DEFAULT NULL,
  `quote_agency_fee` int(11) DEFAULT NULL,
  `quote_added_by` int(11) DEFAULT NULL,
  `quote_converted_to_invoice` int(1) DEFAULT NULL COMMENT '1 means quote converted to invoice\n0 means no',
  `quote_type` int(11) DEFAULT NULL,
  `quote_item_type` varchar(45) DEFAULT NULL COMMENT 'Loose cargo or Normal cargo',
  `quote_is_import` int(1) DEFAULT NULL COMMENT 'To check if item is import.\n1 means Import,\n0 means no',
  `quote_sent` int(1) DEFAULT NULL COMMENT '1 means sent.\n0 means not sent.',
  `quote_notes` longtext COMMENT 'Terms and conditions and notes to the customer',
  `quote_status` int(11) DEFAULT NULL COMMENT '1. MEANS Accepted\n2. Means Requested for Bargain\n3. On hold\n4. Rejected',
  PRIMARY KEY (`quote_id`),
  UNIQUE KEY `quote_id_UNIQUE` (`quote_id`),
  KEY `quote_air_quote_added_by_fk_idx` (`quote_added_by`),
  KEY `quote_sea_quote_type_fk_idx` (`quote_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quote_type`
--

DROP TABLE IF EXISTS `quote_type`;
CREATE TABLE IF NOT EXISTS `quote_type` (
  `qt_id` int(11) NOT NULL AUTO_INCREMENT,
  `qt_name` varchar(45) DEFAULT NULL COMMENT 'Can be Import or export',
  `qt_desc` longtext,
  PRIMARY KEY (`qt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_type`
--

INSERT INTO `quote_type` (`qt_id`, `qt_name`, `qt_desc`) VALUES
(1, 'Import', 'For imports only'),
(2, 'Exports', 'For exports only');

-- --------------------------------------------------------

--
-- Table structure for table `service_charges`
--

DROP TABLE IF EXISTS `service_charges`;
CREATE TABLE IF NOT EXISTS `service_charges` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(45) NOT NULL,
  `service_max_rate` int(11) NOT NULL,
  `service_min_rate` int(11) NOT NULL,
  `service_category` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `service_notes` text,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`service_id`),
  UNIQUE KEY `service_name_2` (`service_name`,`service_category`),
  KEY `service_name` (`service_name`,`service_category`),
  KEY `added_by_fk` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_charges`
--

INSERT INTO `service_charges` (`service_id`, `service_name`, `service_max_rate`, `service_min_rate`, `service_category`, `is_active`, `service_notes`, `added_on`, `added_by`) VALUES
(19, 'Break bulk fee', 5000, 2100, 'Airfreight Import', 1, NULL, '2017-05-16 09:09:07', 1254),
(20, 'Freight and Handling charges @ origin', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(21, 'Customs Duty', 5000, 2000, 'Airfreight Import', 1, NULL, '2017-05-16 09:09:07', 1254),
(22, 'VAT', 5000, 2000, 'Airfreight Import', 1, NULL, '2017-05-16 09:09:07', 1254),
(23, 'I.D.F./G.O.K. @ 2.25% of CIF', 5000, 2000, 'Airfreight Import', 1, NULL, '2017-05-16 09:09:07', 1254),
(24, 'Customs Bond Security on B.I.F', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(25, 'Port Charges', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(26, 'KCAA Exemption Recommending Fee', 5000, 2000, 'Airfreight Import', 1, NULL, '2017-05-16 09:09:07', 1254),
(27, 'KAA Concessions', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(28, 'Kenya Bureau of Standards (KEBS)', 5000, 2000, 'Airfreight Import', 1, NULL, '2017-05-16 09:09:07', 1254),
(29, 'Customs Alteration Fees & I.M.F', 5000, 2000, 'NA', 1, NULL, '2017-05-16 09:09:07', 1254),
(30, 'Penalty Local inspection', 5000, 2000, 'Airfreight Import', 1, NULL, '2017-05-16 09:09:07', 1254),
(31, 'M/V Registration Fee & Charges', 5000, 2000, 'NA', 1, NULL, '2017-05-16 09:09:07', 1254),
(32, 'Willfreight Handling', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(33, 'IDF Processing Fee', 5000, 2000, 'Airfreight Import', 1, NULL, '2017-05-16 09:09:07', 1254),
(34, 'Exemption Processing (KCAA-KRA)', 5000, 2000, 'Airfreight Import', 1, NULL, '2017-05-16 09:09:07', 1254),
(35, 'Insurance', 5000, 2000, 'Airfreight Export', 1, NULL, '2017-05-16 09:09:07', 1254),
(36, 'Verification Charges', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(37, 'Customs & Port Documentation', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(38, 'Special Clearance', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(39, 'Road Transport', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(40, 'Agency Fee on Value', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(41, 'Communication & Petties', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(42, 'Bank Charges on Cheque', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(43, 'Heavylift Charges', 5000, 2000, 'All', 1, NULL, '2017-05-16 09:09:07', 1254),
(44, 'Commission on Disbursement', 5000, 2000, 'Willfreight Handling', 1, NULL, '2017-05-16 09:09:07', 0),
(45, 'Other Charges', 5000, 2000, 'Willfreight Handling', 1, NULL, '2017-05-16 09:09:07', 0),
(46, 'VAT on Agency Fee', 5000, 2000, 'Willfreight Handling', 1, NULL, '2017-05-16 09:09:07', 0),
(47, 'TestOne', 7500, 1250, '', 0, '<p>TestNote</p>', '2017-11-14 16:33:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_login`
--

DROP TABLE IF EXISTS `staff_login`;
CREATE TABLE IF NOT EXISTS `staff_login` (
  `staff_id` int(11) NOT NULL,
  `staff_email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  UNIQUE KEY `staff_email` (`staff_email`),
  UNIQUE KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_login`
--

INSERT INTO `staff_login` (`staff_id`, `staff_email`, `password`) VALUES
(1255, 'ayubwambulwa@willfreight.co.ke', '202cb962ac59075b964b07152d234b70'),
(1259, 'mirriamndunge@willfreight.co.ke', '202cb962ac59075b964b07152d234b70'),
(1258, 'veronicamueni@willfreight.co.ke', '202cb962ac59075b964b07152d234b70'),
(1254, 'wambulwaayub@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `staff_notes`
--

DROP TABLE IF EXISTS `staff_notes`;
CREATE TABLE IF NOT EXISTS `staff_notes` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `note_category` int(11) NOT NULL,
  `notes` text NOT NULL,
  `time_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`note_id`),
  KEY `staff_id` (`staff_id`),
  KEY `note_category` (`note_category`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_notes`
--

INSERT INTO `staff_notes` (`note_id`, `staff_id`, `note_category`, `notes`, `time_created`, `deleted`) VALUES
(1, 1255, 2, 'Delete this text to replace with your note here...', '2017-06-21 18:12:25', 0),
(2, 1255, 1, 'Delete this text to replace with your note here...', '2017-06-21 18:16:20', 0),
(3, 1255, 3, 'Delete this text to replace with your note here...', '2017-06-21 18:18:15', 0),
(4, 1258, 2, 'Delete this text to replace with your note here...', '2017-06-22 10:21:43', 0),
(5, 1255, 1, 'Hello', '2017-09-08 10:53:16', 0),
(7, 1255, 1, '<p style=\"text-align: justify;\"><font face=\"Comic Sans MS\" style=\"\">Delete this text to replace with your note here...\r\n<a href=\"mailto:a@a.a\" style=\"\">a@a.a</a></font></p><p style=\"text-align: justify;\"><font face=\"Comic Sans MS\" style=\"\"><br></font></p><table class=\"table table-bordered\"><tbody><tr><td>NAME</td><td><p>TEL</p></td><td><br></td></tr><tr><td>Ayub</td><td>0704051656</td><td><br></td></tr><tr><td>Philis</td><td>0701353781</td><td><br></td></tr></tbody></table><p style=\"text-align: justify;\"><font face=\"Comic Sans MS\" style=\"\"><br></font></p>', '2017-09-08 13:30:55', 0),
(8, 1255, 1, 'Delete this text to replace with your note here...', '2017-09-08 14:25:06', 0),
(9, 1255, 3, '<p>Test</p>', '2017-09-08 15:48:41', 0),
(10, 1255, 1, '<p>Sample notes</p>', '2017-09-11 16:29:17', 0),
(11, 1255, 4, '<p>Made a cellphone with Ayub of Vector Aviation. We agreed on new rates and their VAT issue as follows</p><p><br></p><table class=\"table table-bordered\"><tbody><tr><td><p><b>Issue</b></p><p>VAT</p></td><td><p><b>What was discussed</b></p><p>Remove it</p></td></tr></tbody></table><p><br></p>', '2017-09-11 17:34:47', 0),
(12, 1255, 1, '<p>Test expire</p>', '2017-09-11 17:55:44', 0),
(13, 1255, 1, '<p>Test note</p>', '2017-09-26 11:33:04', 0),
(14, 1255, 4, '<p>gtggygygygy</p>', '2017-10-05 10:38:12', 0),
(15, 1255, 1, '<p>weve contacted mr Omenda Joseph</p><p>hes agreed to let us transport his iphone x on a private jet</p>', '2017-10-05 10:39:40', 0);

--
-- Triggers `staff_notes`
--
DROP TRIGGER IF EXISTS `staff_notes_read_insert`;
DELIMITER $$
CREATE TRIGGER `staff_notes_read_insert` AFTER INSERT ON `staff_notes` FOR EACH ROW INSERT INTO staff_notes_read(note_id,staff_id) VALUES(new.note_id,new.staff_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `staff_notes_category`
--

DROP TABLE IF EXISTS `staff_notes_category`;
CREATE TABLE IF NOT EXISTS `staff_notes_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_desc` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_notes_category`
--

INSERT INTO `staff_notes_category` (`category_id`, `category_name`, `category_desc`) VALUES
(1, 'Team update', 'Only appears within your departmental team'),
(2, 'Personal note', 'Only you can see this. Use it just like sticky note'),
(3, 'Organizational update', 'Use this to send a note to everyone in the organization.This will be seen by everyone in the organization for a period of two days'),
(4, 'Client note', 'This is used when recording some notes about a client. e.g. last visit, call made and what was discussed, meeting, etc');

-- --------------------------------------------------------

--
-- Table structure for table `staff_notes_read`
--

DROP TABLE IF EXISTS `staff_notes_read`;
CREATE TABLE IF NOT EXISTS `staff_notes_read` (
  `note_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT '0',
  `note_deleted` int(1) NOT NULL DEFAULT '0',
  `time_read` datetime DEFAULT NULL,
  UNIQUE KEY `snr_note_staff_id_uq` (`note_id`,`staff_id`),
  KEY `snr_staff_id_fk` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_notes_read`
--

INSERT INTO `staff_notes_read` (`note_id`, `staff_id`, `read_status`, `note_deleted`, `time_read`) VALUES
(1, 1255, 0, 0, NULL),
(2, 1255, 0, 0, NULL),
(3, 1255, 0, 0, NULL),
(4, 1258, 0, 0, NULL),
(5, 1255, 0, 0, NULL),
(7, 1255, 0, 0, NULL),
(8, 1255, 0, 0, NULL),
(9, 1255, 0, 0, NULL),
(10, 1255, 0, 0, NULL),
(11, 1255, 0, 0, NULL),
(12, 1255, 0, 0, NULL),
(13, 1255, 0, 0, NULL),
(14, 1255, 0, 0, NULL),
(15, 1255, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_notes_visibility`
--

DROP TABLE IF EXISTS `staff_notes_visibility`;
CREATE TABLE IF NOT EXISTS `staff_notes_visibility` (
  `note_id` int(11) NOT NULL,
  `visible_from` date NOT NULL,
  `visible_to` date NOT NULL,
  UNIQUE KEY `snv_note_id_uq` (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_notes_visibility`
--

INSERT INTO `staff_notes_visibility` (`note_id`, `visible_from`, `visible_to`) VALUES
(12, '2017-09-11', '2017-09-18'),
(13, '0000-00-00', '0000-00-00'),
(14, '0000-00-00', '0000-00-00'),
(15, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tariff_block_a`
--

DROP TABLE IF EXISTS `tariff_block_a`;
CREATE TABLE IF NOT EXISTS `tariff_block_a` (
  `tb_service_id` int(11) NOT NULL,
  `tb_service_charge` int(11) NOT NULL,
  UNIQUE KEY `tb_service_id` (`tb_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tariff_block_a`
--

INSERT INTO `tariff_block_a` (`tb_service_id`, `tb_service_charge`) VALUES
(19, 3550),
(20, 3500),
(21, 3500),
(22, 3500),
(23, 3500),
(24, 3500),
(25, 3500),
(26, 3500),
(27, 3500),
(28, 3500),
(29, 3500),
(30, 3500),
(31, 3500),
(32, 3500),
(33, 3500),
(34, 3500),
(35, 3500),
(36, 3500),
(37, 3500),
(38, 3500),
(39, 3500),
(40, 3500),
(41, 3500),
(42, 3500),
(43, 3500),
(44, 3500),
(45, 3500),
(46, 3500),
(47, 4375);

-- --------------------------------------------------------

--
-- Table structure for table `tariff_block_b`
--

DROP TABLE IF EXISTS `tariff_block_b`;
CREATE TABLE IF NOT EXISTS `tariff_block_b` (
  `tb_service_id` int(11) NOT NULL,
  `tb_service_charge` int(11) NOT NULL,
  UNIQUE KEY `tb_service_id` (`tb_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tariff_block_default`
--

DROP TABLE IF EXISTS `tariff_block_default`;
CREATE TABLE IF NOT EXISTS `tariff_block_default` (
  `tb_service_id` int(11) NOT NULL,
  `tb_service_charge` int(11) NOT NULL,
  UNIQUE KEY `tb_service_id` (`tb_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tariff_block_default`
--

INSERT INTO `tariff_block_default` (`tb_service_id`, `tb_service_charge`) VALUES
(19, 3550),
(20, 3500),
(21, 3500),
(22, 3500),
(23, 3500),
(24, 3500),
(25, 3500),
(26, 3500),
(27, 3500),
(28, 3500),
(29, 3500),
(30, 3500),
(31, 3500),
(32, 3500),
(33, 3500),
(34, 3500),
(35, 3500),
(36, 3500),
(37, 3500),
(38, 3500),
(39, 3500),
(40, 3500),
(41, 3500),
(42, 3500),
(43, 3500),
(44, 3500),
(45, 3500),
(46, 3500),
(47, 4375);

-- --------------------------------------------------------

--
-- Table structure for table `tariff_block_demo`
--

DROP TABLE IF EXISTS `tariff_block_demo`;
CREATE TABLE IF NOT EXISTS `tariff_block_demo` (
  `tb_service_id` int(11) NOT NULL,
  `tb_service_charge` int(11) NOT NULL,
  UNIQUE KEY `tb_service_id` (`tb_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tariff_block_demo`
--

INSERT INTO `tariff_block_demo` (`tb_service_id`, `tb_service_charge`) VALUES
(19, 2620),
(20, 3675),
(21, 4960),
(22, 2000),
(23, 5000),
(24, 3200),
(25, 3300),
(26, 3500),
(27, 3500),
(28, 3500),
(29, 3500),
(30, 3500),
(31, 3500),
(32, 3500),
(33, 3500),
(34, 3500),
(35, 3500),
(36, 3500),
(37, 3500),
(38, 3500),
(39, 3500),
(40, 3500),
(41, 3500),
(42, 3500),
(43, 3500),
(44, 3500),
(45, 3500),
(46, 3500),
(47, 4375);

-- --------------------------------------------------------

--
-- Table structure for table `tariff_block_super`
--

DROP TABLE IF EXISTS `tariff_block_super`;
CREATE TABLE IF NOT EXISTS `tariff_block_super` (
  `tb_service_id` int(11) NOT NULL,
  `tb_service_charge` int(11) NOT NULL,
  UNIQUE KEY `tb_service_id` (`tb_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tariff_block_super`
--

INSERT INTO `tariff_block_super` (`tb_service_id`, `tb_service_charge`) VALUES
(19, 3550),
(20, 3500),
(21, 3500),
(22, 3500),
(23, 3500),
(24, 3500),
(25, 3500),
(26, 3500),
(27, 3500),
(28, 3500),
(29, 3500),
(30, 3500),
(31, 3500),
(32, 3500),
(33, 3500),
(34, 3500),
(35, 3500),
(36, 3500),
(37, 3500),
(38, 3500),
(39, 3500),
(40, 3500),
(41, 3500),
(42, 3500),
(43, 3500),
(44, 3500),
(45, 3500),
(46, 3500),
(47, 4375);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_added_by_fk` FOREIGN KEY (`added_by`) REFERENCES `employee` (`staff_wec_emp_no`),
  ADD CONSTRAINT `clients_mc_id_fk` FOREIGN KEY (`mc_id`) REFERENCES `marketing_channels` (`ch_id`);

--
-- Constraints for table `consignement_parties`
--
ALTER TABLE `consignement_parties`
  ADD CONSTRAINT `cp_clearing_agent_id_fk` FOREIGN KEY (`clearing_agent_id`) REFERENCES `agent` (`agent_id`),
  ADD CONSTRAINT `fk_Consignement_parties_Agent1` FOREIGN KEY (`clearing_agent_id`) REFERENCES `agent` (`agent_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `consignment`
--
ALTER TABLE `consignment`
  ADD CONSTRAINT `cons_cons_added_by_fk` FOREIGN KEY (`cons_added_by`) REFERENCES `employee` (`staff_wec_emp_no`),
  ADD CONSTRAINT `cons_cust_id_fk` FOREIGN KEY (`cust_id`) REFERENCES `clients` (`cust_id`);

--
-- Constraints for table `cons_acc_info`
--
ALTER TABLE `cons_acc_info`
  ADD CONSTRAINT `cai_cai_cargo_shed_id_fk` FOREIGN KEY (`cai_cargo_shed_id`) REFERENCES `cargo_sheds` (`cargo_shed_id`),
  ADD CONSTRAINT `cons_acc_info_cons_id_fk` FOREIGN KEY (`cons_cons_id`) REFERENCES `consignment` (`cons_id`),
  ADD CONSTRAINT `cons_acc_info_service_id_fk` FOREIGN KEY (`cons_service_id`) REFERENCES `service_charges` (`service_id`),
  ADD CONSTRAINT `cons_cons_charge_added_by_fk` FOREIGN KEY (`cons_acc_info_added_by`) REFERENCES `employee` (`staff_wec_emp_no`);

--
-- Constraints for table `cons_bill_of_landing`
--
ALTER TABLE `cons_bill_of_landing`
  ADD CONSTRAINT `bol_bol_added_by_fk` FOREIGN KEY (`bol_added_by`) REFERENCES `employee` (`staff_wec_emp_no`),
  ADD CONSTRAINT `bol_bol_cons_id_fk` FOREIGN KEY (`bol_cons_id`) REFERENCES `consignment` (`cons_id`),
  ADD CONSTRAINT `cbol_bol_doc_id_fk` FOREIGN KEY (`bol_doc_id`) REFERENCES `cs_rbd_docs` (`doc_id`);

--
-- Constraints for table `cons_measurement`
--
ALTER TABLE `cons_measurement`
  ADD CONSTRAINT `cons_measurement_ibfk_1` FOREIGN KEY (`cons_id`) REFERENCES `consignment` (`cons_id`);

--
-- Constraints for table `cons_transportation_details`
--
ALTER TABLE `cons_transportation_details`
  ADD CONSTRAINT `ctd_cons_id_fk` FOREIGN KEY (`cons_id`) REFERENCES `consignment` (`cons_id`);

--
-- Constraints for table `customer_rates`
--
ALTER TABLE `customer_rates`
  ADD CONSTRAINT `cr_cust_id_fk` FOREIGN KEY (`cust_id`) REFERENCES `clients` (`cust_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cr_service_id_fk` FOREIGN KEY (`service_id`) REFERENCES `service_charges` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cust_sess_notes`
--
ALTER TABLE `cust_sess_notes`
  ADD CONSTRAINT `csn_added_by_fk` FOREIGN KEY (`pcn_added_by`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cust_id_fk` FOREIGN KEY (`cust_id`) REFERENCES `clients` (`cust_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_fk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`);

--
-- Constraints for table `emp_docs`
--
ALTER TABLE `emp_docs`
  ADD CONSTRAINT `emp_docs_added_by_fk` FOREIGN KEY (`added_by`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_docs_emp_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emp_education`
--
ALTER TABLE `emp_education`
  ADD CONSTRAINT `ee_added_by_fk` FOREIGN KEY (`added_by`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ee_emp_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emp_leave_applications`
--
ALTER TABLE `emp_leave_applications`
  ADD CONSTRAINT `ela_approver_1_fk` FOREIGN KEY (`ela_approver_1`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ela_approver_2_fk` FOREIGN KEY (`ela_approver_2`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ela_approver_3_fk` FOREIGN KEY (`ela_approver_3`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ela_emp_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ela_lt_id_fk` FOREIGN KEY (`lt_id`) REFERENCES `leave_types` (`lt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emp_nextofkin`
--
ALTER TABLE `emp_nextofkin`
  ADD CONSTRAINT `emp_nok_added_by_fk` FOREIGN KEY (`added_by`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_nok_emp_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emp_salary`
--
ALTER TABLE `emp_salary`
  ADD CONSTRAINT `es_added_by_fk` FOREIGN KEY (`added_by`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `es_emp_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emp_training`
--
ALTER TABLE `emp_training`
  ADD CONSTRAINT `et_course_id_fk` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `et_emp_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `inv_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `employee` (`staff_wec_emp_no`),
  ADD CONSTRAINT `inv_cust_id_fk` FOREIGN KEY (`cust_id`) REFERENCES `clients` (`cust_id`);

--
-- Constraints for table `invoice_approval`
--
ALTER TABLE `invoice_approval`
  ADD CONSTRAINT `inv_app_inv_id_fk` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`),
  ADD CONSTRAINT `inv_app_staff_id_fk` FOREIGN KEY (`staff_id`) REFERENCES `employee` (`staff_wec_emp_no`);

--
-- Constraints for table `invoice_charges`
--
ALTER TABLE `invoice_charges`
  ADD CONSTRAINT `invoice_charges_inv_id_fk` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`),
  ADD CONSTRAINT `invoice_charges_serv_id_fk` FOREIGN KEY (`service_id`) REFERENCES `service_charges` (`service_id`);

--
-- Constraints for table `invoice_dispatch_from_acc`
--
ALTER TABLE `invoice_dispatch_from_acc`
  ADD CONSTRAINT `dispatched_by_fk` FOREIGN KEY (`dispatched_by`) REFERENCES `employee` (`staff_wec_emp_no`),
  ADD CONSTRAINT `id_invoice_id_fk` FOREIGN KEY (`id_invoice_id`) REFERENCES `invoice` (`invoice_id`);

--
-- Constraints for table `invoice_dispatch_to_client`
--
ALTER TABLE `invoice_dispatch_to_client`
  ADD CONSTRAINT `idtc_invoice_id_fk` FOREIGN KEY (`idtc_invoice_id`) REFERENCES `invoice` (`invoice_id`),
  ADD CONSTRAINT `idtc_recorded_by_fk` FOREIGN KEY (`recorded_by`) REFERENCES `employee` (`staff_wec_emp_no`);

--
-- Constraints for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD CONSTRAINT `inv_p_recorded_by_fk` FOREIGN KEY (`recorded_by`) REFERENCES `employee` (`staff_wec_emp_no`),
  ADD CONSTRAINT `inv_payment_invoice_id_fk` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`);

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `cust_id_fk_2` FOREIGN KEY (`cust_id`) REFERENCES `clients` (`cust_id`);

--
-- Constraints for table `marketing_campaigns`
--
ALTER TABLE `marketing_campaigns`
  ADD CONSTRAINT `mc_campaign_id_fk` FOREIGN KEY (`campaign_id`) REFERENCES `marketing_channels` (`ch_id`);

--
-- Constraints for table `prospects`
--
ALTER TABLE `prospects`
  ADD CONSTRAINT `cust_id_fk_3` FOREIGN KEY (`cust_id`) REFERENCES `clients` (`cust_id`);

--
-- Constraints for table `quote_air`
--
ALTER TABLE `quote_air`
  ADD CONSTRAINT `quote_air_quote_added_by_fk` FOREIGN KEY (`quote_added_by`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `quote_air_quote_type_fk` FOREIGN KEY (`quote_type`) REFERENCES `quote_type` (`qt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quote_sea`
--
ALTER TABLE `quote_sea`
  ADD CONSTRAINT `quote_sea_quote_added_by_fk` FOREIGN KEY (`quote_added_by`) REFERENCES `employee` (`staff_wec_emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `quote_sea_quote_type_fk` FOREIGN KEY (`quote_type`) REFERENCES `quote_type` (`qt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_charges`
--
ALTER TABLE `service_charges`
  ADD CONSTRAINT `added_by_fk` FOREIGN KEY (`added_by`) REFERENCES `employee` (`staff_wec_emp_no`);

--
-- Constraints for table `staff_login`
--
ALTER TABLE `staff_login`
  ADD CONSTRAINT `staff_login_staff_id_fk` FOREIGN KEY (`staff_id`) REFERENCES `employee` (`staff_wec_emp_no`);

--
-- Constraints for table `staff_notes`
--
ALTER TABLE `staff_notes`
  ADD CONSTRAINT `staff_notes_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `employee` (`staff_wec_emp_no`),
  ADD CONSTRAINT `staff_notes_ibfk_2` FOREIGN KEY (`note_category`) REFERENCES `staff_notes_category` (`category_id`);

--
-- Constraints for table `staff_notes_read`
--
ALTER TABLE `staff_notes_read`
  ADD CONSTRAINT `snr_note_id_uq` FOREIGN KEY (`note_id`) REFERENCES `staff_notes` (`note_id`),
  ADD CONSTRAINT `snr_staff_id_fk` FOREIGN KEY (`staff_id`) REFERENCES `employee` (`staff_wec_emp_no`);

--
-- Constraints for table `staff_notes_visibility`
--
ALTER TABLE `staff_notes_visibility`
  ADD CONSTRAINT `snv_note_id_fk` FOREIGN KEY (`note_id`) REFERENCES `staff_notes` (`note_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
