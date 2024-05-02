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
-- Database: `vaccines`
--

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
  `Postcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`NHSNumber`, `Forename`, `Surname`, `PersonDOB`, `GenderCode`, `Postcode`) VALUES
(92233359811, 'MUHAMMAD', 'JENNINGS', '1995-09-03', '1', 'NP225AW'),
(92233668361, 'JOHN', 'COUNSELL', '1991-09-12', '1', 'LL303HE'),
(94300409281, 'NAMROOP', 'NAIK', '1991-02-04', '2', 'CF314BH'),
(94627888551, 'HAFREN', 'LOSCE', '1994-02-24', '2', 'CF356RL'),
(94627899401, 'EIGR', 'JONES', '1993-03-15', '2', 'CF141DD'),
(94627903611, 'MARED', 'BEDORTHA', '1991-11-03', '2', 'CF235EL'),
(94627928871, 'ARANRHOD', 'RINGGOLD', '1990-11-07', '2', 'CF356DB'),
(94648146751, 'BRAITH', 'DIBDIN', '1996-07-20', '2', 'CF235RH'),
(94648186381, 'NIMUE', 'MOUSLEY', '1990-05-08', '2', 'NP70ES'),
(94648194561, 'RHIANU', 'BREESE', '1992-10-22', '2', 'CF119QA'),
(94648201441, 'BRONWEN', 'WARING-JONES', '1994-05-28', '2', 'CF334PN'),
(94648205861, 'GWENER', 'CADWALLADER', '1994-03-15', '2', 'CF372SA'),
(96937584471, 'SIAN', 'WINROW', '1989-01-04', '2', 'IM15TY'),
(96937978171, 'BLANCH', 'RONNAN', '1990-08-08', '2', 'IM13LX'),
(96937978331, 'JAMES', 'LISTON', '1993-12-05', '1', 'IM81AJ'),
(96938548531, 'DOUG', 'HOWITT', '1988-03-29', '1', 'DN357RG'),
(96938554691, 'STEVEN', 'SYBIL', '1983-08-28', '1', 'DN364QY'),
(96938560901, 'ARNOLD', 'THRUSH', '1982-10-02', '1', 'DN401DL');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
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
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`NHSNumber`, `DoseNo`, `VaccinationDate`, `VaccineManufacturer`, `DiseaseTargeted`, `VaccineType`, `Product`, `VaccineBatchNumber`, `CountryOfVaccination`, `Authority`, `Site`, `TotalSeriesOfDoses`, `DisplayName`, `SnomedCode`, `DateEntered`, `ProcedureCode`, `Booster`) VALUES
(94627888551, 1, '2000-02-06', '(AstraZeneca AB, ORG-100001699)', '(COVID-19, 840539006)', '(AstraZeneca, 39115011000001105)', '(Vaxzevria, EU/1/21/1529)', '346753P1', 'UK', 'Hospital', 'Left Arm', 2, 'COVID-19 Vaccine AstraZeneca', 39114900000000000, '1999-02-07', 1324680000000000, 0),
(94627888551, 2, '2001-02-06', '(AstraZeneca AB, ORG-100001699)', '(COVID-19, 840539006)', '(AstraZeneca, 39115011000001105)', '(Vaxzevria, EU/1/21/1529)', '347442P', 'UK', 'Hospital', 'Left Arm', 2, 'COVID-19 Vaccine AstraZeneca', 39114900000000000, '2001-02-10', 1324690000000000, 0),
(94627899401, 1, '2000-01-06', '(Janssen-Cilag International, ORG-100001417)', '(COVID-19, 840539006)', '(Janssen, 39230211000001104)', '(Jcovden, EU/1/20/1525)', 'XE393', 'UK', 'Hospital', 'Left Arm', 1, 'COVID-19 Vaccine Janssen', 39233900000000000, '2000-01-11', 1324680000000000, 0),
(94627899401, 2, '2001-03-06', '(Janssen-Cilag International, ORG-100001417)', '(COVID-19, 840539006)', '(Janssen, 39230211000001104)', '(Jcovden, EU/1/20/1525)', '202A21A', 'UK', 'Pharmacy', 'Left Arm', 1, 'COVID-19 Vaccine Janssen', 39233900000000000, '2001-03-09', 1324680000000000, 1),
(94627903611, 1, '2001-03-06', '(Moderna Biotech Spain S.L., ORG-100031184)', '(COVID-19, 840539006)', '(SpikevaxBivalent, 40801911000001102)', '(Spikevax, EU/1/20/1507)', '039K20A', 'UK', 'Hospital', 'Left Arm', 2, 'COVID-19 Vaccine Moderna', 39326800000000000, '2001-03-10', 1324680000000000, 0),
(94627903611, 2, '2002-04-06', '(Moderna Biotech Spain S.L., ORG-100031184)', '(COVID-19, 840539006)', '(SpikevaxBivalent, 40801911000001102)', '(Spikevax, EU/1/20/1507)', '039K20A', 'UK', 'Hospital', 'Left Arm', 2, 'COVID-19 Vaccine Moderna', 39326800000000000, '2002-04-06', 1324690000000000, 0),
(94627928871, 1, '2001-05-06', '(Biontech Manufacturing GmbH, ORG-100030215)', '(COVID-19, 840539006)', '(Pfizer, 39115711000001107)', '(Comirnaty, EU/1/20/1528)', 'EM0477', 'UK', 'Pharmacy', 'Left Arm', 2, 'Pfizer/BioNTech COVID-19 vaccine', 39116100000000000, '2001-05-12', 1324680000000000, 0),
(94627928871, 2, '2002-02-10', '(Biontech Manufacturing GmbH, ORG-100030215)', '(COVID-19, 840539006)', '(Pfizer, 39115711000001107)', '(Comirnaty, EU/1/20/1528)', 'ER8731', 'UK', 'Hospital', 'Left Arm', 2, 'Pfizer/BioNTech COVID-19 vaccine', 39116100000000000, '2002-02-28', 1324690000000000, 0),
(94648146751, 1, '2001-02-20', '(Novavax CZ a.s., ORG-100032020)', '(COVID-19, 840539006)', '(Novavax, 39473011000001103)', '(Nuvaxovid, EU/1/21/1618)', '4302MF031', 'UK', 'Hospital', 'Left Arm', 2, 'COVID-19 Vaccine Novavax', 999001000000000000, '2001-08-20', 1324680000000000, 0),
(94648146751, 2, '2000-02-25', '(Novavax CZ a.s., ORG-100032020)', '(COVID-19, 840539006)', '(Novavax, 39473011000001103)', '(Nuvaxovid, EU/1/21/1618)', '4302MF032', 'UK', 'Hospital', 'Left Arm', 2, 'COVID-19 Vaccine Novavax', 999001000000000000, '2000-04-30', 1324690000000000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`NHSNumber`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`NHSNumber`,`DoseNo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD CONSTRAINT `vaccines_ibfk_1` FOREIGN KEY (`NHSNumber`) REFERENCES `patients` (`NHSNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
