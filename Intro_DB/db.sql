-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 02:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `address_book`
--
CREATE DATABASE IF NOT EXISTS `address_book` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `address_book`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `addressID` int(3) UNSIGNED NOT NULL,
  `houseNumName` varchar(255) NOT NULL,
  `addressOne` varchar(255) NOT NULL,
  `addressTwo` varchar(255) DEFAULT NULL,
  `addressThree` varchar(255) DEFAULT NULL,
  `townCity` varchar(255) NOT NULL,
  `postCode` varchar(255) NOT NULL,
  `status` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `houseNumName`, `addressOne`, `addressTwo`, `addressThree`, `townCity`, `postCode`, `status`) VALUES
(1, 'Bamborough Castle', 'Bamborough Lane', NULL, NULL, 'Bamborough', 'BA98GH', 1),
(2, 'TARDIS', 'Blue Box', NULL, NULL, 'Galifrey', 'GA13EY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `personID` int(3) UNSIGNED NOT NULL,
  `addressID` int(3) UNSIGNED NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `secondName` varchar(255) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `status` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personID`, `addressID`, `firstName`, `secondName`, `surname`, `status`) VALUES
(1, 1, 'Uhtred', 'Of', 'Bebbanburg', 1),
(2, 1, 'Father', NULL, 'Beocca', 1),
(3, 2, 'The Doctor', NULL, 'Smith', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personID`),
  ADD KEY `fk_address_id` (`addressID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `personID` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `fk_address_id` FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
