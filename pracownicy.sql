-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 12, 2024 at 10:53 AM
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

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nazwa` (`Nazwa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
