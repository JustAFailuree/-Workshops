-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 18, 2024 at 10:15 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `Id` int(11) NOT NULL,
  `Imie` varchar(255) NOT NULL,
  `Nazwisko` varchar(255) NOT NULL,
  `Wiek` int(11) NOT NULL,
  `Telefon` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Rola` varchar(1) NOT NULL,
  `Nazwa` varchar(255) NOT NULL,
  `Haslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pracownicy`
--

INSERT INTO `pracownicy` (`Id`, `Imie`, `Nazwisko`, `Wiek`, `Telefon`, `Email`, `Rola`, `Nazwa`, `Haslo`) VALUES
(1, 'Ruckus', 'Unlce', 60, 111222333, 'Ruck@freehoodie.yup', 'A', 'UncleRuckus', '$2y$10$rjN6njsA6X522JcJZoUwne5EPmobyXhQdxqqUsKHmTmNkvfkHqrn6'),
(2, 'Adam', 'Adam', 26, 123123123, 'adam@host.com', 'P', 'Adam', '$2y$10$CBbU95yR43V86L2wXxYjW.SWoRcxtP1EaSvCXG.rNi9rX5/9ci81y'),
(3, 'Tomas', 'Lincolm', 31, 123123123, 'Tmas@indiana.engl', 'P', 'Tomas', '$2y$10$FkBPQrViA5iX7Q9zPpVfW.1YDQ6ILB8AJGXnn8oANOXt3tQj1ueW6'),
(4, 'Kevin', 'Clark', 34, 123123123, 'Kevin.aa@gmail.com', 'P', 'Kevin', '$2y$10$wjvuGS6Cc78BuCylYP4dOuY/QDlxmApO9wpGmYsFY3MbN6ntRXNWG'),
(5, 'Daniel', 'Cruse', 29, 123456789, 'Daniel.C@gmail.com', 'P', 'Daniel', '$2y$10$wCXYt5faxn3s2qi/q6Z5p.RtJVaZFUQ4nGEnDR4YFx/8pFFhGheuu'),
(6, 'Adam', 'Davis', 22, 111222333, 'Adam.D@gmail.com', 'P', 'User1', '$2y$10$wgQ8MgfS4a4SwITHQOT9EO09z//laDJAvoQksBTpq3WgwM.d273Wm'),
(7, 'Aaron', 'Brown', 25, 123321111, 'AAron@gmail.com', 'P', 'User2', '$2y$10$Fh7UGEMGh7pStPbNluiu1O61/soGvbNA9cwtAA22ZaHiYNW/0HGsC');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zlecenie`
--

CREATE TABLE `zlecenie` (
  `Id` int(11) NOT NULL,
  `IdPracownika` int(11) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Czas` time DEFAULT NULL,
  `NazwaFirmy` varchar(255) DEFAULT NULL,
  `Opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zlecenie`
--

INSERT INTO `zlecenie` (`Id`, `IdPracownika`, `Data`, `Czas`, `NazwaFirmy`, `Opis`) VALUES
(12, 2, '2024-06-27', '12:59:00', 'TeslaCompany', '\'Developing a budget plan for the next fiscal year.'),
(13, 2, '2024-06-27', '16:00:00', 'Theta Group', 'Testing a new customer relationship management (CRM) system.'),
(14, 2, '2024-06-18', '13:10:00', 'Theta Group', 'Developing a new marketing campaign strategy.'),
(15, 2, '2024-06-19', '14:58:00', 'Alpha Ltd', 'Conducting a customer satisfaction survey.'),
(16, 2, '2024-07-01', '14:09:00', 'Alpha Ltd', 'Creating a social media strategy to boost brand engagement.'),
(17, 3, '2024-06-19', '13:03:00', 'Company 3', 'Analyzing data to improve operational efficiency.'),
(18, 3, '2024-06-19', '16:06:00', 'Company 4', 'Analyzing data to improve operational efficiency.'),
(19, 3, '2024-06-22', '09:30:00', 'GammaInnovations', 'Setting up a new cybersecurity protocol.'),
(20, 3, '2024-06-29', '08:40:00', 'GammaInnovations', 'Implementing a new customer service IT protocol.'),
(21, 3, '2024-07-04', '14:12:00', 'Theta Group', 'Developing a new feature for the company\'s mobile app.'),
(22, 4, '2024-06-18', '13:06:00', 'SkyTech', 'Evaluating the performance of the current IT infrastructure.'),
(23, 4, '2024-06-19', '13:06:00', 'Alpha Ltd', 'Evaluating the performance of the current IT infrastructure.'),
(24, 4, '2024-06-22', '13:06:00', 'GammaInnovations', 'Evaluating the performance of the current IT infrastructure.'),
(25, 4, '2024-06-24', '14:08:00', 'BetaWare', 'Evaluating the performance of the current IT infrastructure.'),
(26, 4, '2024-06-27', '11:05:00', 'NetBuilders', 'Conducting a competitive analysis for the new IT product line.'),
(27, 5, '2024-06-18', '10:05:00', 'XtremeTech', 'Setting up a new cybersecurity protocol.'),
(28, 5, '2024-06-18', '14:20:00', 'QuantumTech', 'Evaluating the performance of the current IT infrastructure.'),
(29, 5, '2024-06-21', '14:10:00', 'TeslaCompany', 'Setting up a new cybersecurity protocol.'),
(30, 5, '2024-06-25', '15:10:00', 'OmegaTech', 'Analyzing the results of the recent IT performance review.'),
(31, 5, '2024-06-30', '15:10:00', 'Company 4', 'Reviewing and approving the new IT project proposal.'),
(32, 5, '2024-07-02', '12:10:00', 'EpsilonTech', 'Developing a security protocol to protect sensitive customer data.'),
(33, 6, '2024-06-18', '13:10:00', 'LambdaCorp', 'Conducting a customer satisfaction survey for the new IT services.'),
(34, 6, '2024-06-20', '16:10:00', 'KappaIndustries', 'Preparing a data migration plan for the client\'s legacy systems.'),
(35, 6, '2024-06-25', '13:10:00', 'Company 5', 'Setting up a new cybersecurity protocol.'),
(36, 6, '2024-06-26', '14:10:00', 'PioneerIT', 'Evaluating the performance of the current IT infrastructure.'),
(37, 6, '2024-06-28', '13:12:00', 'SecureNet', 'Leading a team meeting to brainstorm new IT solutions.'),
(38, 7, '2024-06-19', '08:30:00', 'IotaSolutions', 'Conducting a performance review of the company\'s IT systems.'),
(39, 7, '2024-06-24', '13:13:00', 'YieldTech', 'Preparing the annual IT report for stakeholders.'),
(40, 7, '2024-06-25', '15:15:00', 'GammaInnovations 2', 'Preparing the annual IT report for stakeholders.'),
(41, 7, '2024-07-03', '14:14:00', 'DataDynamics', 'Preparing a data migration plan for the client\'s legacy systems.'),
(42, 7, '2024-07-05', '15:17:00', 'Theta Group', 'Reviewing and approving the new IT project proposal.'),
(43, 7, '2024-07-08', '13:16:00', 'Alpha Ltd', 'Reviewing and approving the new IT project proposal.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nazwa` (`Nazwa`);

--
-- Indeksy dla tabeli `zlecenie`
--
ALTER TABLE `zlecenie`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdPracownika` (`IdPracownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zlecenie`
--
ALTER TABLE `zlecenie`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zlecenie`
--
ALTER TABLE `zlecenie`
  ADD CONSTRAINT `zlecenie_ibfk_1` FOREIGN KEY (`IdPracownika`) REFERENCES `pracownicy` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
