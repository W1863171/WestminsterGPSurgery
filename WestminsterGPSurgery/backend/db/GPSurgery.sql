-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2024 at 05:08 AM
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
-- Database: `GPSurgery`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `DoctorID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`DoctorID`, `Username`, `Password`, `Status`) VALUES
(1, 'drsmith', 'password123', 'Active'),
(2, 'drjones', 'password456', 'Active'),
(3, 'drwilson', 'password789', 'Inactive'),
(4, 'drbrown', 'passwordabc', 'Active'),
(5, 'drrobinson', 'passworddef', 'Inactive'),
(6, 'drmartinez', 'passwordghi', 'Active'),
(7, 'drroberts', 'passwordjkl', 'Active'),
(8, 'drclark', 'passwordmno', 'Inactive'),
(9, 'drwalker', 'passwordpqr', 'Active'),
(10, 'drhill', 'passwordstu', 'Active'),
(11, 'drward', 'passwordvwx', 'Inactive'),
(12, 'dryoung', 'passwordyz', 'Active'),
(13, 'drstewart', 'password1234', 'Active'),
(14, 'drscott', 'password5678', 'Inactive'),
(15, 'drking', 'password90ab', 'Active'),
(16, 'drgreen', 'passwordcdef', 'Active'),
(17, 'dradams', 'passwordghij', 'Inactive'),
(18, 'drbaker', 'passwordklmn', 'Active'),
(19, 'drhall', 'passwordpqrs', 'Active'),
(20, 'drcook', 'passwordtuvw', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `RecordID` int(11) NOT NULL,
  `NHSNumber` bigint(20) NOT NULL,
  `DoseNo` int(11) NOT NULL,
  `VaccinationDate` date NOT NULL,
  `VaccineManufacturer` text NOT NULL,
  `DiseaseTargeted` text NOT NULL,
  `VaccineType` text NOT NULL,
  `Product` text NOT NULL,
  `VaccineBatchNumber` text NOT NULL,
  `CountryOfVaccination` text NOT NULL,
  `Authority` text NOT NULL,
  `Site` text NOT NULL,
  `TotalSeriesOfDoses` int(11) NOT NULL,
  `DisplayName` text NOT NULL,
  `SnomedCode` bigint(20) NOT NULL,
  `DateEntered` date NOT NULL,
  `ProcedureCode` bigint(20) NOT NULL,
  `Booster` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`RecordID`, `NHSNumber`, `DoseNo`, `VaccinationDate`, `VaccineManufacturer`, `DiseaseTargeted`, `VaccineType`, `Product`, `VaccineBatchNumber`, `CountryOfVaccination`, `Authority`, `Site`, `TotalSeriesOfDoses`, `DisplayName`, `SnomedCode`, `DateEntered`, `ProcedureCode`, `Booster`) VALUES
(2, 94627888551, 1, '2000-02-06', '(AstraZeneca AB, ORG-100001699)', '(COVID-19, 840539006)', '(AstraZeneca, 39115011000001105)', '(Vaxzevria, EU/1/21/1529)', '346753P1', 'UK', 'Hospital', 'Left Arm', 2, 'COVID-19 Vaccine AstraZeneca', 39114900000000000, '1999-02-07', 1324680000000000, 0),
(3, 94627888551, 2, '2001-02-06', '(AstraZeneca AB, ORG-100001699)', '(COVID-19, 840539006)', '(AstraZeneca, 39115011000001105)', '(Vaxzevria, EU/1/21/1529)', '347442P', 'UK', 'Hospital', 'Left Arm', 2, 'COVID-19 Vaccine AstraZeneca', 39114900000000000, '2001-02-10', 1324690000000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `NHSNumber` bigint(20) NOT NULL,
  `Forename` text NOT NULL,
  `Surname` text NOT NULL,
  `PersonDOB` date NOT NULL,
  `GenderCode` text NOT NULL,
  `Postcode` text NOT NULL,
  `Address` text NOT NULL,
  `MobileNumber` text NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`NHSNumber`, `Forename`, `Surname`, `PersonDOB`, `GenderCode`, `Postcode`, `Address`, `MobileNumber`, `Password`) VALUES
(92233359811, 'MUHAMMAD', 'JENNINGS', '1995-09-03', '1', 'NP225AW', '1 Poplar Lane', '123456789', '123'),
(94627888551, 'HAFREN', 'LOSCE', '1994-02-24', '2', 'CF356RL', '10 Cobblers Lane', '4568939280', 'Password123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`DoctorID`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`RecordID`),
  ADD KEY `NHSNumber` (`NHSNumber`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`NHSNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `RecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_records_ibfk_1` FOREIGN KEY (`NHSNumber`) REFERENCES `patients` (`NHSNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
