-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Lut 2020, 16:15
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `verbs`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statusy`
--

CREATE TABLE `statusy` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `verb`
--

CREATE TABLE `verb` (
  `id` int(11) NOT NULL,
  `pl` varchar(100) NOT NULL,
  `plAdditional` varchar(255) DEFAULT NULL,
  `inf` varchar(100) NOT NULL,
  `pastSimp1` varchar(100) NOT NULL,
  `pastSimp2` varchar(100) DEFAULT NULL,
  `pastPrac1` varchar(100) NOT NULL,
  `pastPrac2` varchar(100) DEFAULT NULL,
  `pronunciation` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `verb`
--

INSERT INTO `verb` (`id`, `pl`, `plAdditional`, `inf`, `pastSimp1`, `pastSimp2`, `pastPrac1`, `pastPrac2`, `pronunciation`, `status`) VALUES
(1, 'asd', '', '', '', '', '', '', '', 0),
(2, 'wiedzieć', NULL, 'know', 'knew', NULL, 'known', NULL, NULL, NULL),
(3, 'wiedzieć', NULL, 'know', 'knew', NULL, 'noł / new/ nołn', NULL, NULL, NULL),
(4, 'wiedzieć', NULL, 'know', 'knew', NULL, 'noł / new/ nołn', NULL, NULL, NULL),
(5, 'wiedzieć', NULL, 'know', 'aaa', NULL, 'noł / new/ nołn', NULL, NULL, NULL),
(6, 'wiedzieć', 'wiedzieć coś o czymś', 'know', 'knew', 'aaa', 'known', 'sss', 'noł / new/ nołn', NULL),
(7, 'asd', 'wiedzieć coś o czymś', 'know', 'knew', 'aaa', 'known', 'sss', 'noł / new/ nołn', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `statusy`
--
ALTER TABLE `statusy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `verb`
--
ALTER TABLE `verb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `statusy`
--
ALTER TABLE `statusy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `verb`
--
ALTER TABLE `verb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
