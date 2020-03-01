-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Mar 2020, 23:57
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.9

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
  `groupName` varchar(100) NOT NULL,
  `groupAdditional` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`id`, `groupName`, `groupAdditional`) VALUES
(33, 'Umiem na 100%', NULL),
(36, 'gruuup2', NULL),
(44, 'sad', NULL),
(45, 'xcc', NULL);

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
(2, 'wiedzieć', NULL, 'know', 'knew', NULL, 'known', NULL, NULL, NULL),
(3, 'wiedzieć', 'ddddddddddddd', 'know', 'knew', NULL, 'noł / new/ nołn', NULL, NULL, NULL),
(5, 'wiedzieć', NULL, 'know', 'aaa', NULL, 'noł / new/ nołn', NULL, NULL, NULL),
(6, 'wiedzieć', 'wiedzieć coś o czymś', 'know', 'knew', 'aaa', 'known', 'sss', 'noł / new/ nołn', NULL),
(7, 'asd', 'wiedzieć coś o czymś', 'know', 'knew', 'aaa', 'known', 'sss', 'noł / new/ nołn', NULL),
(9, 'adam', NULL, 'adm', 'adm', NULL, 'adm', NULL, NULL, NULL),
(10, 'rower', NULL, 'wer', 'rty', NULL, 'rty', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `verb_group_relation`
--

CREATE TABLE `verb_group_relation` (
  `id` int(11) NOT NULL,
  `verb_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `verb_group_relation`
--

INSERT INTO `verb_group_relation` (`id`, `verb_id`, `group_id`) VALUES
(1, 0, 0),
(2, 0, 0),
(3, 3, 32),
(4, 9, 0),
(6, 9, 32),
(8, 9, 31),
(10, 9, 22),
(11, 9, 0),
(17, 5, 33),
(18, 5, 31),
(19, 5, 32),
(20, 4, 32),
(21, 4, 33),
(22, 4, 29),
(23, 6, 22),
(28, 9, 29),
(29, 7, 33),
(31, 7, 29),
(33, 2, 31),
(34, 2, 29),
(35, 2, 33),
(37, 10, 29),
(38, 2, 36),
(39, 10, 36),
(41, 6, 33),
(43, 7, 45);

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
-- Indeksy dla tabeli `verb_group_relation`
--
ALTER TABLE `verb_group_relation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT dla tabeli `statusy`
--
ALTER TABLE `statusy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `verb`
--
ALTER TABLE `verb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `verb_group_relation`
--
ALTER TABLE `verb_group_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
