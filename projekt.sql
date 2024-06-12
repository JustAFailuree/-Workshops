-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 12, 2024 at 11:09 AM
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
(1, 'Jan', 'Kowalski', 23, 123123123, 'aaaa', 'A', 'Jan', '123'),
(2, 'Karol', 'Biały', 21, 123456789, 'asdgfdg@gmail.com', 'P', '124fgdswag', '123456'),
(3, 'Tomasz', 'Nowak', 34, 213123123, 'sdsdds', 'P', 'Tomasz', '123'),
(15, 'dasdasd', 'asdasd', 20, 566656545, 'asdasdasd@gmail.com', 'P', 'asdasdasd', '$2y$10$bkhAYOdVz72izagIWHrkbeUBC31c/7dKeECYevBHPF4h93OWYdKM.');

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
(1, 3, '2024-06-06', '16:23:00', 'Company a', 'nic'),
(2, 1, '2024-06-06', '20:42:00', 'Company b', 'fdsa'),
(8, 1, '2024-07-12', '15:11:00', 'asgdfgfdgs', 'threhrejeytj'),
(11, 1, '2024-06-13', '15:06:00', 'dhshtrhrth', 'rtjhrjrtjrtj');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
