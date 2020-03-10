-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Mar 2020, 10:47
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
  `groupName` varchar(100) NOT NULL,
  `groupAdditional` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`id`, `groupName`, `groupAdditional`) VALUES
(49, 'Trudne', NULL),
(50, 'Umiem na 100%', NULL);

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
(13, 'być', 'dodatkowy opis do czasownika', 'be', 'was', 'were', 'been', NULL, NULL, NULL),
(14, 'bić', NULL, 'beat', 'beat', NULL, 'beaten', NULL, NULL, NULL),
(15, 'stawać się', NULL, 'become', 'became', NULL, 'become', NULL, NULL, NULL),
(16, 'zaczynać', NULL, 'begin', 'began', NULL, 'begun', NULL, NULL, NULL),
(17, 'łamać', NULL, 'break', 'broke', NULL, 'broken', NULL, NULL, NULL),
(18, 'przynosić', NULL, 'bring', 'brought', NULL, 'brought', NULL, NULL, NULL),
(19, 'budować', NULL, 'build', 'built', NULL, 'built', NULL, NULL, NULL),
(20, 'spalić', NULL, 'burn', 'burnt', NULL, 'burnt', NULL, NULL, NULL),
(21, 'kupować', NULL, 'buy', 'bought', NULL, 'bought', NULL, NULL, NULL),
(22, 'wybuchać, pękać', NULL, 'burst', 'burst', NULL, 'burst', NULL, NULL, NULL),
(23, 'umieć, móc, potrafić', NULL, 'can', 'could', NULL, 'been able to', NULL, NULL, NULL),
(24, 'chwytać, łapać', NULL, 'catch', 'caught', NULL, 'caught', NULL, NULL, NULL),
(25, 'wybierać', NULL, 'choose', 'chose', NULL, 'chosen', NULL, NULL, NULL),
(26, 'przybywać', NULL, 'come', 'came', NULL, 'come', NULL, NULL, NULL),
(27, 'kosztować', NULL, 'cost', 'cost', NULL, 'cost', NULL, NULL, NULL),
(28, 'ciąć', NULL, 'cut', 'cut', NULL, 'cut', NULL, NULL, NULL),
(29, 'robić', NULL, 'do', 'did', NULL, 'done', NULL, NULL, NULL),
(30, 'śnić', NULL, 'dream', 'dreamt', NULL, 'dreamt', NULL, NULL, NULL),
(31, 'pić', NULL, 'drink', 'drank', NULL, 'drunk', NULL, NULL, NULL),
(32, 'wykopywać / kopać', NULL, 'dig', 'dug', NULL, 'dug', NULL, NULL, NULL),
(33, 'narysować / naszkicować', NULL, 'draw', 'drew', NULL, 'drawn', NULL, NULL, NULL),
(34, 'kierować', NULL, 'drive', 'drove', NULL, 'driven', NULL, NULL, NULL),
(35, 'jeść', NULL, 'eat', 'ate', NULL, 'eaten', NULL, NULL, NULL),
(36, 'upadać', NULL, 'fall', 'fell', NULL, 'fallen', NULL, NULL, NULL),
(37, 'żywić / karmić', NULL, 'feed', 'fed', NULL, 'fed', NULL, NULL, NULL),
(38, 'czuć', NULL, 'feel', 'felt', NULL, 'felt', NULL, NULL, NULL),
(39, 'walczyć', NULL, 'fight', 'fought', NULL, 'fought', NULL, NULL, NULL),
(40, 'znajdować', NULL, 'find', 'found', NULL, 'found', NULL, NULL, NULL),
(41, 'latać', NULL, 'fly', 'flew', NULL, 'flown', NULL, NULL, NULL),
(42, 'zapominać', NULL, 'forget', 'forgot', NULL, 'forgotten', NULL, NULL, NULL),
(43, 'wybaczać', NULL, 'forgive', 'forgave', NULL, 'forgiven', NULL, NULL, NULL),
(44, 'dostawać', NULL, 'get', 'got', NULL, 'got', NULL, NULL, NULL),
(45, 'dawać', NULL, 'give', 'gave', NULL, 'given', NULL, NULL, NULL),
(46, 'iść / jechać', NULL, 'go', 'went', NULL, 'gone/been', NULL, NULL, NULL),
(47, 'rosnąć', NULL, 'grow', 'grew', NULL, 'grown', NULL, NULL, NULL),
(48, 'wieszać / się (kogoś / coś)', NULL, 'hang', 'hung', 'hanged', 'hung', 'hanged', NULL, NULL),
(49, 'mieć', NULL, 'have', 'had', NULL, 'had', NULL, NULL, NULL),
(50, 'słyszeć', NULL, 'hear', 'heard', NULL, 'heard', NULL, NULL, NULL),
(51, 'ukrywać / się', NULL, 'hide', 'hid', NULL, 'hid', NULL, NULL, NULL),
(52, 'uderzać', NULL, 'hit', 'hit', NULL, 'hit', NULL, NULL, NULL),
(53, 'trzymać', NULL, 'hold', 'held', NULL, 'held', NULL, NULL, NULL),
(54, 'ranić', NULL, 'hurt', 'hurt', NULL, 'hurt', NULL, NULL, NULL),
(55, 'trzymać', NULL, 'keep', 'kept', NULL, 'kept', NULL, NULL, NULL),
(56, 'znać / wiedzieć', NULL, 'know', 'knew', NULL, 'known', NULL, NULL, NULL),
(57, 'prowadzić', NULL, 'lead', 'led', NULL, 'led', NULL, NULL, NULL),
(58, 'uczyc / się', NULL, 'learn', 'learnt', 'learned', 'learnt', 'learned', NULL, NULL),
(59, 'opuszczać/wyjeżdżać', NULL, 'leave', 'left', NULL, 'left', NULL, NULL, NULL),
(60, 'pożyczać / komuś', NULL, 'lend', 'lent', NULL, 'lent', NULL, NULL, NULL),
(61, 'pozwalać', NULL, 'let', 'let', NULL, 'let', NULL, NULL, NULL),
(62, 'leżeć', NULL, 'lie', 'lay', NULL, 'lain', NULL, NULL, NULL),
(63, 'zapalać / podpalać', NULL, 'light', 'lit', NULL, 'lighted', NULL, NULL, NULL),
(64, 'gubic/tracić', NULL, 'lose', 'lost', NULL, 'lost', NULL, NULL, NULL),
(65, 'robić', NULL, 'make', 'made', NULL, 'made', NULL, NULL, NULL),
(66, 'znaczyć', NULL, 'mean', 'mean', NULL, 'meant', NULL, NULL, NULL),
(67, 'spotykać', NULL, 'meet', 'met', NULL, 'met', NULL, NULL, NULL),
(68, 'musieć', NULL, 'must/have to', 'had to', NULL, 'had to', NULL, NULL, NULL),
(69, 'płacić', NULL, 'pay', 'paid', NULL, 'paid', NULL, NULL, NULL),
(70, 'kłaść', NULL, 'put', 'put', NULL, 'put', NULL, NULL, NULL),
(71, 'czytać', NULL, 'read', 'read', NULL, 'read', NULL, NULL, NULL),
(72, 'jeździć (na czymś)', NULL, 'ride', 'rode', NULL, 'ridden', NULL, NULL, NULL),
(73, 'dzwonić', NULL, 'ring', 'rang', NULL, 'rung', NULL, NULL, NULL),
(74, 'biec', NULL, 'run', 'ran', NULL, 'run', NULL, NULL, NULL),
(75, 'mówić', NULL, 'say', 'said', NULL, 'said', NULL, NULL, NULL),
(76, 'widzieć', NULL, 'see', 'saw', NULL, 'seen', NULL, NULL, NULL),
(77, 'sprzedawać', NULL, 'sell', 'sold', NULL, 'sold', NULL, NULL, NULL),
(78, 'wysyłać', NULL, 'send', 'sent', NULL, 'sent', NULL, NULL, NULL),
(79, 'umieszczać / postawić', NULL, 'set', 'set', NULL, 'set', NULL, NULL, NULL),
(80, 'zaświecić (czymś)', NULL, 'shine', 'shone', NULL, 'shone', NULL, NULL, NULL),
(81, 'pokazywać', NULL, 'show', 'showed', NULL, 'shown', NULL, NULL, NULL),
(82, 'zamykać / zatrzaskiwać', NULL, 'shut', 'shut', NULL, 'shut', NULL, NULL, NULL),
(83, 'śpiewać', NULL, 'sing', 'sang', NULL, 'sung', NULL, NULL, NULL),
(84, 'tonąć', NULL, 'sink', 'sank', NULL, 'sunk', NULL, NULL, NULL),
(85, 'siedzieć', NULL, 'sit', 'sat', NULL, 'sat', NULL, NULL, NULL),
(86, 'spać', NULL, 'sleep', 'slept', NULL, 'slept', NULL, NULL, NULL),
(87, 'wąchać / pachnieć', NULL, 'smell', 'smelled', NULL, 'smelt', NULL, NULL, NULL),
(88, 'mówić', NULL, 'speak', 'spoke', NULL, 'spoken', NULL, NULL, NULL),
(89, 'spędzać', NULL, 'spend', 'spent', NULL, 'spent', NULL, NULL, NULL),
(90, 'rozlewać', NULL, 'spill', 'spilt', NULL, 'spilled', NULL, NULL, NULL),
(91, 'stać', NULL, 'stand', 'stood', NULL, 'stood', NULL, NULL, NULL),
(92, 'kraść', NULL, 'steal', 'stole', NULL, 'stolen', NULL, NULL, NULL),
(93, 'pływać', NULL, 'swim', 'swam', NULL, 'swum', NULL, NULL, NULL),
(94, 'brać', NULL, 'take', 'took', NULL, 'taken', NULL, NULL, NULL),
(95, 'uczyć', NULL, 'teach', 'taught', NULL, 'taught', NULL, NULL, NULL),
(96, 'drzeć / rozrywać', NULL, 'tear', 'torn', NULL, 'torn', NULL, NULL, NULL),
(97, 'mówić', NULL, 'tell', 'told', NULL, 'told', NULL, NULL, NULL),
(98, 'mysleć', NULL, 'think', 'thought', NULL, 'thought', NULL, NULL, NULL),
(99, 'wyrzucać', NULL, 'throw', 'threw', NULL, 'thrown', NULL, NULL, NULL),
(100, 'rozumieć', NULL, 'understand', 'understood', NULL, 'understood', NULL, NULL, NULL),
(101, 'budzić się', NULL, 'wake', 'woke', NULL, 'woken', NULL, NULL, NULL),
(102, 'być ubranym w coś', NULL, 'wear', 'wore', NULL, 'wore', NULL, NULL, NULL),
(103, 'wygrywać', NULL, 'win', 'won', NULL, 'won', NULL, NULL, NULL),
(104, 'pisać', NULL, 'write', 'wrote', NULL, 'written', NULL, NULL, NULL);

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
(51, 54, 50),
(52, 76, 50),
(53, 56, 50),
(54, 28, 50),
(55, 88, 50),
(56, 91, 50),
(57, 64, 50),
(58, 49, 50),
(59, 59, 50),
(60, 83, 50),
(61, 43, 50),
(62, 95, 49),
(63, 79, 49),
(64, 33, 49),
(65, 60, 50),
(66, 23, 49),
(67, 84, 50),
(68, 87, 49),
(69, 21, 50),
(70, 19, 50),
(71, 68, 49),
(72, 42, 50),
(73, 15, 50),
(74, 93, 50),
(75, 71, 50),
(76, 63, 49),
(77, 37, 50),
(78, 52, 50),
(79, 20, 50),
(80, 26, 50),
(81, 22, 50),
(82, 96, 49),
(83, 40, 50),
(84, 13, 50),
(85, 100, 50),
(86, 47, 50),
(87, 77, 50),
(88, 35, 50),
(89, 27, 50),
(90, 89, 50),
(91, 31, 50),
(92, 74, 50),
(93, 66, 49),
(94, 69, 50),
(95, 80, 49),
(96, 62, 49),
(97, 78, 50),
(98, 73, 50),
(99, 30, 50),
(100, 99, 50),
(101, 70, 50);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT dla tabeli `statusy`
--
ALTER TABLE `statusy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `verb`
--
ALTER TABLE `verb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT dla tabeli `verb_group_relation`
--
ALTER TABLE `verb_group_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
